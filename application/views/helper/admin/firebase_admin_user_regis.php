<?php 
    $url = base_url($lang.'/');
    if($this->uri->segment(1) =='th'){
        $lang_chk = "th";
    } else {
        $lang_chk = "en";
    }
    $get_value = "";
    if ($this->uri->segment(3))
        $get_value = $this->uri->segment(3);
?>
<script>
    var contentUrl = <?php echo json_encode($url); ?>;
    var get_value_url = <?php echo json_encode($get_value); ?>;
 
    window.onload = async function(){
        userId = await userData();
        // getUserList();
    }
    
    function signUpAsAdmin(){
        let email = $('#user-email').val().trim() ;
        let name = $('#user-name').val().trim() ;
        let phone = $('#user-phone').val().trim() ;
        let password = $('#user-password').val().trim() ;
        let confirm_password = $('#user-confirm-password').val().trim();

        if (email == ''){
            toastr.error('กรุณากรอกอีเมล', 'Error!');
            return false;
        }

        if (password  == ''){
            toastr.error('กรุณากรอกรหัสผ่าน', 'Error!');
            return false;
        }

        if (confirm_password  == ''){
            toastr.error('กรุณายืนยันรหัสผ่าน', 'Error!');
            return false;
        }

        if (password != confirm_password){
            toastr.error('ระบุรหัสผ่านไม่ตรงกัน', 'Error!');
            return false;
        }

        if (name  == ''){
            toastr.error('กรุณากรอกชื่อ - สกุล', 'Error!');
            return false;
        }

        firebase.auth().createUserWithEmailAndPassword(email, password).then(function(data){
            let userData = new Object();
            userData.userList = [];
            let getUser = db.collection("admin_").doc('users');
            getUser.get().then(function(doc){
                userData.userList = doc.data().userList;
                    userData.userList.push({
                        email : email,
                        phone : phone,
                        isActive : true,
                        fullName : name

                    })
                    getUser.set(userData);
            })
           

            Swal.fire({
                // title: "Good job!",
                text: "You clicked the button!",
                type: "success",
                confirmButtonClass: "btn btn-success btn-success-add-product",
                buttonsStyling: false
            }).then(function(e){ 
                window.location.href  =  contentUrl + "manageAdmin";
            }); 

        }).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log(errorMessage)
            if (errorCode == 'auth/invalid-email') {
                let userData = new Object();
                userData.userList = [];
                let getUser = db.collection("admin_").doc('users');
                getUser.get().then(function(doc){
                    userData.userList = doc.data().userList;
                    userData.userList.push({
                        email : email,
                        phone : phone,
                        isActive : true,
                        fullName : name

                    })
                    getUser.set(userData);
                })

                Swal.fire({
                    // title: "Good job!",
                    text: "You clicked the button!",
                    type: "success",
                    confirmButtonClass: "btn btn-success btn-success-add-product",
                    buttonsStyling: false
                }).then(function(e){ 
                    window.location.href  =  contentUrl + "manageAdmin";
                }); 
            } else if (errorCode == 'auth/operation-not-allowed'){
                alert(errorMessage);
            } else if (errorCode == 'auth/email-already-in-use'){
                
                let userData = new Object();
                userData.userList = [];
                let getUser = db.collection("admin_").doc('users');
                getUser.get().then(function(doc){
                    userData.userList = doc.data().userList;
                    userData.userList.push({
                        email : email,
                        phone : phone,
                        isActive : true,
                        fullName : name

                    })
                    getUser.set(userData);
                })

                Swal.fire({
                    // title: "Good job!",
                    text: "You clicked the button!",
                    type: "success",
                    confirmButtonClass: "btn btn-success btn-success-add-product",
                    buttonsStyling: false
                }).then(function(e){ 
                    window.location.href  =  contentUrl + "manageAdmin";
                }); 

            } else {
            }
        });
    }

</script>