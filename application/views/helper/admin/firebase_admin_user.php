
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
        getUserList();
    }
    
    function getUserList(){
        let getUser = db.collection("admin_").doc('users');
        $('#admin_user_tb').html('');
        getUser.get().then(function(doc){
            let a = 1;
            doc.data().userList.forEach(function(item,i){
                if (item.email != 'emarketshops.thai@gmail.com'){
                    let tr = '<tr>';
                    tr += '<td>'+ (a) +'</td>';
                    tr += '<td>'+ item.fullName +'</td>';
                    tr += '<td>'+ item.phone +'</td>';
                    tr += '<td>'+ item.email +'</td>';
                    let isReady= '';
                    if (item.isActive){
                        isReady = 'checked';
                    }
                    
                    tr += '<td><input type="checkbox" id="admin_isActive'+ i +'" class="switchery admin_isActive'+ i +'" data-size="xs" '+ isReady +' data-email="'+ item.email +'" /></td>';
                    tr += '<td><a href="#" id="del_admin_user'+ i +'" data-email="'+ item.email +'"><i class="fa fa-trash-o" style="font-size:18px;color:red;"></i></a></td>';
                    tr += '</tr>';
                    $('#admin_user_tb').append(tr);

                    const elem = document.querySelector('.admin_isActive' + i);
                    const init = new Switchery(elem);  

                    $('.admin_isActive' + i).on('change',function(e){
                        let email = $(this).attr('data-email');
                        let updateUserData = db.collection("admin_").doc('users');
                        let userData = new Object();
                        let dateNow = new date();
                        userData.userList = [];
                        let isActive = $(e.currentTarget).is(":checked");
                        updateUserData.get().then(function (dataUpdate){
                            dataUpdate.data().userList.forEach(function(value,a){
                                if (email == value.email){
                                    userData.userList.push({
                                        email : value.email,
                                        phone : value.phone,    
                                        isActive : isActive,
                                        fullName : value.fullName,
                                        insertDate : dateNow
                                    });
                                }else{
                                    userData.userList.push(value);
                                }
                               
                            })
                            updateUserData.set(userData);
                        })
                    })

                    $('#del_admin_user'+ i +'').click(function(e){
                        let email = $(this).attr('data-email');
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!",
                            confirmButtonClass: "btn btn-primary",
                            cancelButtonClass: "btn btn-danger ml-1",
                            buttonsStyling: false
                        }).then(function(result) {
                            if (result.value) {       
                                // console.log(email);
                                let userData = new Object();
                                userData.userList = [];
                                let getUser = db.collection("admin_").doc('users');
                                getUser.get().then(function(doc){
                                    // userData.userList = doc.data().userList;
                                    doc.data().userList.forEach(function(item,i){
                                        if (item.email != email)
                                        userData.userList.push(item)
                                    })
                                    // console.log(userData);
                                    getUser.set(userData).then(function() {
                                        window.location.href = contentUrl + 'manageAdmin';
                                    });
                                })
                                Swal.fire({
                                type: "success",
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                confirmButtonClass: "btn btn-success"
                                });
                            }
                        });
                        
                        
                    })

                    a++;
                }
            })
        })
    }

    // function del_admin_user(e){
    //     // let email = e.attr('data-email');
    //     alert(e);
    // }

</script>