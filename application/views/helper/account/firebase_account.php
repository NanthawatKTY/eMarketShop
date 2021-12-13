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
        getSettingData();
    }

    function getSettingData(){

            var docRef = db.collection("setting").doc(userId);
            docRef.get().then(function(doc) {
                if (doc.exists) {
                    
                    //console.log("Document data:", doc.data().chat.isAllowChat);


                    $('#isAllowCall').prop('checked', doc.data().shops.isAllowCallMe);
                    $('#isOTP').prop('checked', doc.data().shops.isOTP);
                    $('#isVacationTime').prop('checked', doc.data().shops.isVacationTime);

                    $('#isAllowChat').prop('checked', doc.data().chat.isAllowChat);
                    $('#isAllowChatProfile').prop('checked', doc.data().chat.isAllowChatProfile);
                    $('#isAutoChat').prop('checked', doc.data().chat.isAutoChat);

                    $('#isNewsEmail').prop('checked', doc.data().email.isNewsEmail);
                    $('#isShowProfile').prop('checked', doc.data().email.isShowProfile);
                    $('#isUpdateOrders').prop('checked', doc.data().email.isUpdateOrders);
                    $('#isUpdateProduct').prop('checked', doc.data().email.isUpdateProduct);

                    $('#isAdsCost').prop('checked', doc.data().notification.isAdsCost);
                    $('#isAllowChat2').prop('checked', doc.data().notification.isAllowChat);
                    $('#isAllowComment').prop('checked', doc.data().notification.isAllowComment);
                    $('#isAllowNoti').prop('checked', doc.data().notification.isAllowNoti);
                    $('#isProduct').prop('checked', doc.data().notification.isProduct);
                    $('#isPromotion').prop('checked', doc.data().notification.isPromotion);
                    $('#isUpdateOrders2').prop('checked', doc.data().notification.isUpdateOrders);
                    $('#isWalletUpdate').prop('checked', doc.data().notification.isWalletUpdate);                    

//-----------------------------------------------function--------------------------------------------------------------------//
                    if (Array.prototype.forEach) {
                        var elems = Array.prototype.slice.call(document.querySelectorAll('.newSwitchery'));
                        elems.forEach(function (html) {
                            var switchery = new Switchery(html);
                        });
                    } else {
                        var elems = document.querySelectorAll('.newSwitchery');

                        for (var i = 0; i < elems.length; i++) {
                            var switchery = new Switchery(elems[i]);
                        }
                    }

                } else {
                    // doc.data() will be undefined in this case
                    db.collection("setting").doc(userId).set({
                            email: {
                                isNewsEmail: true,
                                isShowProfile: true,
                                isUpdateOrders: true,
                                isUpdateProduct: true
                            },
                            chat: {
                                isAllowChat: true,
                                isAllowChatProfile: true,
                                isAutoChat: true
                            },
                            notification: {
                                isAdsCost: true,
                                isAllowChat: true,
                                isAllowComment: true,
                                isAllowNoti: true,
                                isProduct: true,
                                isPromotion: true,
                                isUpdateOrders: true,
                                isWalletUpdate: true
                            },
                            shops: {
                                isAllowCallMe: true,
                                isOTP: true,
                                isVacationTime: true
                            }
                        }).then(function() {
                            console.log("Document successfully udpate IsReady!");
                        }).catch(function(error) {
                            console.error("Error removing document: ", error);
                        });
                        getSettingData();
                }

            }).catch(function(error) {
                console.log("Error getting document:", error);
            });

    }
//-----------------------------------------------function--------------------------------------------------------------------//

//------------SHOP-------------//
    $('#isAllowCall').on('change',function(e){
        db.collection("setting").doc(userId).update({
            shops: {
                isAllowCallMe: $('#isAllowCall').is(":checked"),
                isOTP: $('#isOTP').is(":checked"),
                isVacationTime: $('#isVacationTime').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isOTP').on('change',function(e){
        db.collection("setting").doc(userId).update({
            shops: {
                isAllowCallMe: $('#isAllowCall').is(":checked"),
                isOTP: $('#isOTP').is(":checked"),
                isVacationTime: $('#isVacationTime').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isVacationTime').on('change',function(e){
        db.collection("setting").doc(userId).update({
            shops: {
                isAllowCallMe: $('#isAllowCall').is(":checked"),
                isOTP: $('#isOTP').is(":checked"),
                isVacationTime: $('#isVacationTime').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })
//------------END SHOP-------------//

//------------CHAT-------------//
$('#isAllowChat').on('change',function(e){
        db.collection("setting").doc(userId).update({
            chat: {
                isAllowChat: $('#isAllowChat').is(":checked"),
                isAllowChatProfile: $('#isAllowChatProfile').is(":checked"),
                isAutoChat: $('#isAutoChat').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isAllowChatProfile').on('change',function(e){
        db.collection("setting").doc(userId).update({
            chat: {
                isAllowChat: $('#isAllowChat').is(":checked"),
                isAllowChatProfile: $('#isAllowChatProfile').is(":checked"),
                isAutoChat: $('#isAutoChat').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isAutoChat').on('change',function(e){
        db.collection("setting").doc(userId).update({
            chat: {
                isAllowChat: $('#isAllowChat').is(":checked"),
                isAllowChatProfile: $('#isAllowChatProfile').is(":checked"),
                isAutoChat: $('#isAutoChat').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })
//------------END CHAT-------------//

//------------EMAIL-------------//
$('#isNewsEmail').on('change',function(e){
        db.collection("setting").doc(userId).update({
            email: {
                isNewsEmail: $('#isNewsEmail').is(":checked"),
                isShowProfile: $('#isShowProfile').is(":checked"),
                isUpdateOrders: $('#isUpdateOrders').is(":checked"),
                isUpdateProduct: $('#isUpdateProduct').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isShowProfile').on('change',function(e){
        db.collection("setting").doc(userId).update({
            email: {
                isNewsEmail: $('#isNewsEmail').is(":checked"),
                isShowProfile: $('#isShowProfile').is(":checked"),
                isUpdateOrders: $('#isUpdateOrders').is(":checked"),
                isUpdateProduct: $('#isUpdateProduct').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isUpdateOrders').on('change',function(e){
        db.collection("setting").doc(userId).update({
            email: {
                isNewsEmail: $('#isNewsEmail').is(":checked"),
                isShowProfile: $('#isShowProfile').is(":checked"),
                isUpdateOrders: $('#isUpdateOrders').is(":checked"),
                isUpdateProduct: $('#isUpdateProduct').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isUpdateProduct').on('change',function(e){
        db.collection("setting").doc(userId).update({
            email: {
                isNewsEmail: $('#isNewsEmail').is(":checked"),
                isShowProfile: $('#isShowProfile').is(":checked"),
                isUpdateOrders: $('#isUpdateOrders').is(":checked"),
                isUpdateProduct: $('#isUpdateProduct').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })
//------------END EMAIL-------------//

//------------NOTIFICATION-------------//
$('#isAdsCost').on('change',function(e){
        db.collection("setting").doc(userId).update({
            notification: {
                isAdsCost: $('#isAdsCost').is(":checked"),
                isAllowChat: $('#isAllowChat2').is(":checked"),
                isAllowComment: $('#isAllowComment').is(":checked"),
                isAllowNoti: $('#isAllowNoti').is(":checked"),
                isProduct: $('#isProduct').is(":checked"),
                isPromotion: $('#isPromotion').is(":checked"),
                isUpdateOrders: $('#isUpdateOrders2').is(":checked"),
                isWalletUpdate: $('#isWalletUpdate').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isAllowChat2').on('change',function(e){
        db.collection("setting").doc(userId).update({
            notification: {
                isAdsCost: $('#isAdsCost').is(":checked"),
                isAllowChat: $('#isAllowChat2').is(":checked"),
                isAllowComment: $('#isAllowComment').is(":checked"),
                isAllowNoti: $('#isAllowNoti').is(":checked"),
                isProduct: $('#isProduct').is(":checked"),
                isPromotion: $('#isPromotion').is(":checked"),
                isUpdateOrders: $('#isUpdateOrders2').is(":checked"),
                isWalletUpdate: $('#isWalletUpdate').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isAllowComment').on('change',function(e){
        db.collection("setting").doc(userId).update({
            notification: {
                isAdsCost: $('#isAdsCost').is(":checked"),
                isAllowChat: $('#isAllowChat2').is(":checked"),
                isAllowComment: $('#isAllowComment').is(":checked"),
                isAllowNoti: $('#isAllowNoti').is(":checked"),
                isProduct: $('#isProduct').is(":checked"),
                isPromotion: $('#isPromotion').is(":checked"),
                isUpdateOrders: $('#isUpdateOrders2').is(":checked"),
                isWalletUpdate: $('#isWalletUpdate').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isAllowNoti').on('change',function(e){
        db.collection("setting").doc(userId).update({
            notification: {
                isAdsCost: $('#isAdsCost').is(":checked"),
                isAllowChat: $('#isAllowChat2').is(":checked"),
                isAllowComment: $('#isAllowComment').is(":checked"),
                isAllowNoti: $('#isAllowNoti').is(":checked"),
                isProduct: $('#isProduct').is(":checked"),
                isPromotion: $('#isPromotion').is(":checked"),
                isUpdateOrders: $('#isUpdateOrders2').is(":checked"),
                isWalletUpdate: $('#isWalletUpdate').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isProduct').on('change',function(e){
        db.collection("setting").doc(userId).update({
            notification: {
                isAdsCost: $('#isAdsCost').is(":checked"),
                isAllowChat: $('#isAllowChat2').is(":checked"),
                isAllowComment: $('#isAllowComment').is(":checked"),
                isAllowNoti: $('#isAllowNoti').is(":checked"),
                isProduct: $('#isProduct').is(":checked"),
                isPromotion: $('#isPromotion').is(":checked"),
                isUpdateOrders: $('#isUpdateOrders2').is(":checked"),
                isWalletUpdate: $('#isWalletUpdate').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isPromotion').on('change',function(e){
        db.collection("setting").doc(userId).update({
            notification: {
                isAdsCost: $('#isAdsCost').is(":checked"),
                isAllowChat: $('#isAllowChat2').is(":checked"),
                isAllowComment: $('#isAllowComment').is(":checked"),
                isAllowNoti: $('#isAllowNoti').is(":checked"),
                isProduct: $('#isProduct').is(":checked"),
                isPromotion: $('#isPromotion').is(":checked"),
                isUpdateOrders: $('#isUpdateOrders2').is(":checked"),
                isWalletUpdate: $('#isWalletUpdate').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isUpdateOrders2').on('change',function(e){
        db.collection("setting").doc(userId).update({
            notification: {
                isAdsCost: $('#isAdsCost').is(":checked"),
                isAllowChat: $('#isAllowChat2').is(":checked"),
                isAllowComment: $('#isAllowComment').is(":checked"),
                isAllowNoti: $('#isAllowNoti').is(":checked"),
                isProduct: $('#isProduct').is(":checked"),
                isPromotion: $('#isPromotion').is(":checked"),
                isUpdateOrders: $('#isUpdateOrders2').is(":checked"),
                isWalletUpdate: $('#isWalletUpdate').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })

    $('#isWalletUpdate').on('change',function(e){
        db.collection("setting").doc(userId).update({
            notification: {
                isAdsCost: $('#isAdsCost').is(":checked"),
                isAllowChat: $('#isAllowChat2').is(":checked"),
                isAllowComment: $('#isAllowComment').is(":checked"),
                isAllowNoti: $('#isAllowNoti').is(":checked"),
                isProduct: $('#isProduct').is(":checked"),
                isPromotion: $('#isPromotion').is(":checked"),
                isUpdateOrders: $('#isUpdateOrders2').is(":checked"),
                isWalletUpdate: $('#isWalletUpdate').is(":checked")
            }
        }).then(function() {
            console.log("Document successfully udpate IsReady!");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });  
    })
</script>
<!-- //------------END NOTIFICATION-------------// -->

<!-- //--------------ScriptPopUp1------------------// -->
<script>
        function myFunction() {
            var x = document.getElementById("hide-button");
            var btn = document. getElementById("change-txt");
            var db = document.getElementById("cop-bt");
 
            if (x.style.display === "none") {
                x.style.display = "block";
                btn.value = "Close Curtain";
                btn.innerHTML = "<?php echo lang('notificationsE_close_tab'); ?>";
                //-------------------------DATA-EMAIL-----------------------------//
            } else {
                x.style.display = "none";
                btn.value = "Open Curtain";
                btn.innerHTML = "<?php echo lang('notifications_open_edit_email_tab'); ?>";
            }
        }
</script>
<!-- //--------------End ScriptPopUp1------------------// -->

<!-- //--------------ScriptPopUp2------------------// -->
    <script>
        function myFunction2() {
            var y = document.getElementById("hide-button2");
            var btn = document.getElementById("change-txt2");

            if (y.style.display === "none") {
                y.style.display = "block";
                btn.value = "Close Curtain";
                btn.innerHTML = "<?php echo lang('notifications_off_tab'); ?>";
            } else {
                y.style.display = "none";
                btn.value = "Open Curtain";
                btn.innerHTML = "<?php echo lang('notifications_open_tab'); ?>";
            }
        }
    </script>
<!-- //--------------End ScriptPopUp2------------------// -->