<?php 
    $url = base_url($lang.'/');
    if($this->uri->segment(1) =='th'){
        $lang_chk = "th";
    } else {
        $lang_chk = "en";
    }
?>
<script>
    var contentUrl = <?php echo json_encode($url); ?>;
    var userId;
    var userEmail;
    window.onload = async function(){
        userId = await userData();
        // getDataOrders_home();
    }
    function userData(){
        // return await 
        return new Promise((resolve, reject) => {
            firebase.auth().onAuthStateChanged(function(user) {
                if (user) {
                    if (user.emailVerified == false) {
                        console.log("Email Verify False.");
                        user.sendEmailVerification().then(function() {
                            window.location.href  = contentUrl + "verifyEmail";
                        }).catch(function(error) {
                            var errorCode = error.code;
                            console.log(errorCode);
                        });
                    }else{
                        console.log("User is signed in.");
                        userEmail = user.email;
                        let name = user.displayName;
                        if (user.displayName == null){
                            name = user.email;
                        }

                        // document.getElementById("userNameDisplay").textContent = name;
                        var element = document.querySelector("#userNameDisplay")
                        if (element) {
                            element.textContent = name;
                        }
                        
                        let isAdmin = false;
                        let getUser = db.collection("admin_").doc('users');
                        getUser.get().then(function(doc){
                            doc.data().userList.forEach(function(item,i){

                                if (user.email == item.email){
                                    if (item.isActive == true){
                                        isAdmin = true;
                                        if (isAdmin == true){
                                            document.getElementById("admin-menu").style.display = 'block';
                                        }else{
                                            document.getElementById("admin-menu").style.display = 'none';
                                        }
                                        if (item.email != 'emarketshops.thai@gmail.com'){
                                            document.getElementById('manageuser').style.display = 'none';
                                        }
                                        return false;
                                    }
                                }
                            })
                        })
                        checkHasPhoneNumber(user.uid)
                        resolve(user.uid);
                        return user.uid;
                    }
                } else {
                    console.log("No user is signed in.");
                    let url      = window.location.href;     // Returns full URL (https://example.com/path/example.html)
                    let lastSegment = url.substring(url.lastIndexOf('/') + 1);
                    if (lastSegment != "register"){
                        openLoginPage();
                    }     
                }      
            });
        });  
    }

    function openLoginPage(){
        let url = contentUrl + "login";
        if (document.URL != url){
            window.location.href  =  url;
        }else{
            return;
        }
    }
    function login(){
        let username = document.getElementById("user-name").value;
        let password = document.getElementById("user-password").value;
        if (username.trim() == ""){
            toastr.error('กรุณากรอกชื่อผู้ใช้', 'Error!');
            return false;
        }
        if (password.trim() == ""){
            toastr.error('กรุณากรอกรหัสผ่าน', 'Error!');
            return false;
        }       
        if (username && password != null){
            firebase.auth().signInWithEmailAndPassword(username, password).then(function(result) {
                var user = result.user;
                if (user.emailVerified == true){
                    // alert(1);
                    checkShops()
                    checkUserProfile();  
                }else{
                    // alert(2);
                    console.log("verifyEmail");
                    user.sendEmailVerification().then(function() {
                        window.location.href  = contentUrl + "verifyEmail";
                    }).catch(function(error) {
                        var errorCode = error.code;
                        console.log(errorCode);
                    });
                }
            }).catch(function(error) {
                var errorCode = error.code;
                var errorMessage = error.message;
                toastr.error(error.message, 'Error!');           
            });
        }
    }
    function loginWithGoogle(){
        var provider = new firebase.auth.GoogleAuthProvider();
        firebase.auth().signInWithPopup(provider).then(function(result) {
          var token = result.credential.accessToken;
          var user = result.user;
          console.log(user);
          checkShops()
          checkUserProfile();
        }).catch(function(error) {
          var errorCode = error.code;
          var errorMessage = error.message;
          var email = error.email;
          var credential = error.credential;
        });
    }
    function loginWithFacebook(){
        var provider = new firebase.auth.FacebookAuthProvider();
        provider.addScope('user_birthday');
        firebase.auth().useDeviceLanguage();
        firebase.auth().signInWithPopup(provider).then(function(result) {
            var token = result.credential.accessToken;
            var user = result.user;
            checkShops()
            checkUserProfile();
        }).catch(function(error) {
            var errorCode = error.code;
            var errorMessage = error.message;
            var email = error.email;
            var credential = error.credential;
            console.log(errorCode);
        });
    }
    function sendVerifyEmail(){
        var user = firebase.auth().currentUser;
        user.sendEmailVerification().then(function(result) {
            console.log(result)
        }).catch(function(error) {
            var errorCode = error.code;
            console.log(errorCode);
        });
    }
    function logout(){
        firebase.auth().signOut().then(function() {
        }).catch(function(error) {
        });
    }
    function checkUserProfile(){
        let user = firebase.auth().currentUser;
        if (user != null) {
            let chk_profile_doc = db.collection('userProfile').doc(user.uid);
            chk_profile_doc.get().then((docSnapshot) => {
                if (docSnapshot.exists) {
                    window.location.href  = contentUrl
                } else {
                    let name = user.displayName;
                    if (user.displayName == null){
                        name = user.email;
                    }
                    chk_profile_doc.set({
                        name: name
                    })
                    .then(function() {
                        console.log("Document userProfile successfully written!");
                        checkHasPhoneNumber(user.uid);
                        window.location.href  = contentUrl
                    })
                    .catch(function(error) {
                        console.error("Error writing document: ", error);
                    });
                }
            });
        }
    }

    function checkShops(){
        let user = firebase.auth().currentUser;
        if (user != null) {
            let chk_profile_doc = db.collection('shops').doc(user.uid);
            chk_profile_doc.get().then((docSnapshot) => {
                if (docSnapshot.exists) {
                    // window.location.href  = contentUrl
                } else {
                    let name = user.displayName;
                    if (user.displayName == null){
                        name = user.email;
                    }
                    chk_profile_doc.set({
                        shopName: name
                    })
                    .then(function() {
                        console.log("Document shops successfully written!");
                        // window.location.href  = contentUrl
                    })
                    .catch(function(error) {
                        console.error("Error writing document: ", error);
                    });
                }
            });
        }
    }

    function checkHasPhoneNumber(uid){
        db.collection("shops").doc(uid).get().then(function(doc) {
            let url = window.location.href;     // Returns full URL (https://example.com/path/example.html)
            let lastSegment = url.substring(url.lastIndexOf('/') + 1);
            if (lastSegment != "setting"){
                if (doc.exists) {
                    let data = doc.data();
                    
                    if (data.contact == null){
                        Swal.fire({
                            // title: "Good job!",
                            text: "กรุณาเพิ่มรายระเอียดร้านค้า!",
                            type: "warning",
                            confirmButtonClass: "btn btn-warning btn-success-add-product",
                            buttonsStyling: false
                        }).then(function(e){ 
                            window.location.href  =  contentUrl + "setting";
                        });
                    }     
                } else {
                    checkShops()
                    checkUserProfile();
                    // window.location.href = contentUrl + 'setting';
                }
            }
            
        }).catch(function(error) {
            console.log("Error getting document:", error);
        });
    }
    function signUpWiteEmailPassword(){
        let email = document.getElementById('user-email').value;
        let password = document.getElementById('user-password').value;
        let confirmPassword = document.getElementById('user-confirm-password').value;
        if (email.trim() == ""){
            toastr.error('กรุณากรอกอีเมล', 'Error!');
            return false;
        }
        if (password.trim() == ""){
            toastr.error('กรุณากรอกรหัสผ่าน', 'Error!');
            return false;
        }
        if (confirmPassword.trim() == ""){
            toastr.error('กรุณายืนยันรหัสผ่าน', 'Error!');
            return false;
        }
        if (password.trim() != confirmPassword.trim()){
            toastr.error('ระบุรหัสผ่านไม่ตรงกัน', 'Error!');
            return false;
        }
        firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;

            console.log(errorMessage)
            if (errorCode == 'auth/invalid-email') {
                alert(errorMessage);
            } else if (errorCode == 'auth/operation-not-allowed'){
                alert(errorMessage);
            } else if (errorCode == 'auth/email-already-in-use'){
                alert(errorMessage);
            } else {
            // console.log(errorMessage)
            }
        });
    }
</script>