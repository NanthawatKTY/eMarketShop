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
        // userId = 'kfjlZn2gnBR8tHOv3st0FwQ2UDm1'; 
        onLoadData();
    }
    async function onLoadData(){
       await getCustomerChatList();
        setTimeout(() => {
            countUnreadMessage(); 
        }, 1000);
        getUserImageProfile();
    }

    function getCustomerChatList(){ 
        $('#chat_customer_list').html('');
        let ref = firebase.database().ref('friendsList').child(userId);
        var i = 0;
        ref.off();
        ref.on('child_added', function(item) {
            // $('#chat_customer_list').html('');
            // console.log('firend list: ', item.val());
            custList(item,i);
            i++;
            // snapshot.forEach(function(item){
            //     custList(item,i);
            //     i++;
            // })
        }); 
    }

   async function custList(item,i){
        // console.log(item.val());
        let customerId = item.key;
        let customerIdToHex = toHex(customerId);
            
        let customerList = '<li id="chat_customer_'+ i +'" onclick="getChat('+ i +')" data-uid="'+ customerIdToHex +'">';
        
        const username = await getUsername(customerId);
        // const img_url = await getUserImageProfile(customerId);

        customerList += '<div class="d-flex align-items-center">';
        customerList += '<div class="avatar avatar-busy m-0 mr-50" style="width:20%;"><img src="<?php echo base_url('app-assets/img/user-default.png'); ?>" height="36" width="36" alt="sidebar user image">';
        customerList += '<i></i>';
        customerList += '</div>';
        customerList += '<div class="chat-sidebar-name pl-1"  style="width:100%;">';
        customerList += '<div class="float-left">';
        customerList += '<h6 class="mb-0">'+ username +'</h6><span class="text-muted"></span>';
        customerList += '</div>';
        customerList += '<div class="badge badge-pill badge-danger float-right noti_count_chat '+ customerId +'"></div>';
        customerList += '</div>';      
        customerList += '</div>';
        customerList += '</li>';
        $('#chat_customer_list').append(customerList);
        getChatScript();
        countUnreadMessage(); 
    }

    function getUsername(cid){
        return new Promise((resolve, reject) => {
            db.collection("userProfile").doc(cid).get().then(function(user){
                resolve(user.data().name);    
            });
        });  
    }

    function getUserImageProfile(){
        // return new Promise((resolve, reject) => {
            // let user = firebase.auth().currentUser;
            // if (user != null) {
            //     $('.image_r').attr('src',user.photoURL)        
            // }
            db.collection("shops").doc(userId).get().then(function(user){
                if (user.data().logo){
                    $('.image_r').attr('src',user.data().logo); 
                }
            });
        // });
    }

    function getChat(indexOf){
        $('#chat_modal_image').html('');
        $('.chat-container').scrollTop(0);
        var chat_room = document.getElementById('chat_room');
        // document.getElementsByClassName('ps__rail').style.top = chat_room.offsetHeight +'px';
        // alert(chat_room.offsetHeight);
        var customerIdFromHex = document.getElementById('chat_customer_'+ indexOf).getAttribute('data-uid');
        var customerId = fromHex(customerIdFromHex);
        document.getElementById('chat_customerId').value = customerIdFromHex;
        document.getElementById('customer_display_uid').value = customerId;

       
        var check_chat_room = document.getElementById('chat_room-'+ customerId);
        if (!check_chat_room){
            let newChatCustomer = document.createElement('div');
            newChatCustomer.classList.add('chat-content');
            newChatCustomer.id = 'chat_room-'+ customerId;
            chat_room.appendChild(newChatCustomer);
        }

        let chat_room_customer = document.getElementById('chat_room-'+ customerId);

        readMessage(customerId);

        $('#chat_room-'+ customerId).html('');

        // customer profile
        db.collection("userProfile").doc(customerId).get().then(function(doc){
            $('#customer_display').text(doc.data().name);
            $('#profile_customer_name').text(doc.data().name);
            $('#profile_customer_phone').text(doc.data().phone);
            $('#profile_customer_email').text(doc.data().email);
        })

        db.collection("userProfile").doc(userId).get().then(function(doc){
            $('#chat_display_seller').val(doc.data().name);
        })

        $('.chat-content').hide();
        $('#chat_room-'+ customerId).show();

        var i = 0;
        var count_l = 0;  
        var count_r = 0;
        var imag_active_l = '',imag_active_r = '';
        let ref = firebase.database().ref('messages').child(userId).child(customerId);
        ref.off();
        let listener = ref.on('child_added', function(item) {
            // console.log(item.val());
            if(item.exists){
                let chid_uid = item.val().sender;
                let classLeftRight = 'right';

                if (chid_uid == customerId) {
                    classLeftRight = 'left';
                }else{
                    classLeftRight = 'right';
                }
                if (classLeftRight == 'left'){
                        count_r = 0;
                        imag_active_r = '';
                    if (count_l == 0){
                        imag_active_l = 'image_l';
                    }else{
                        imag_active_l = 'displayNone';
                    }

                    if ( item.val().message != null){
                        count_l++;
                    }else{
                        count_l = 0;
                    }
                    
                }else{
                    count_l = 0;

                    imag_active_l = '';
                    if (count_r == 0){  
                        imag_active_r = 'image_r';
                    }else{
                        imag_active_r = 'displayNone';
                    }

                    count_r++;
                }
                const chat_ = getChatMessage(i, item.val(), userId, customerId, count_l, count_r, classLeftRight, imag_active_l ,imag_active_r);
                chat_room_customer.appendChild(chat_);
                i++;
                // $('.chat-container').scrollTop($('#chat_room-' + customerId).height());
                // chat_room_customer.scrollTop = chat_room_customer.scrollHeight;
                // $(".chat-container").scrollTop = $(".chat-container").scrollTop;

                $('.chat-container').scrollTop($($('#chat_room-' + customerId).prop("scrollHeight")));
                $('.chat-container').scrollTop($(".chat-container > .chat-content").height())

                
            }
        });
        // $('.chat-container').scrollTop($($('#chat_room-' + customerId).prop("scrollHeight")));
        // let chat_container = document.getElementsByClassName('chat-container');
        // // chat_container.scrollTop()
        // // $('.chat-container').scrollTop($(".chat-container > .chat-content").height())
        let buttonDiv = document.createElement('div');
        buttonDiv.id = "buttonDiv";
        $('#chat_room-' + customerId).appendChild(buttonDiv)

        var hash = "#buttonDiv";
        window.location.hash = hash;
    }

     function getChatMessage(i, item, userId, customerId, count_l, count_r, classLeftRight, imag_active_l ,imag_active_r ){
            var mainChatDiv = document.createElement('div');
            if (item.productId){
                let pid = item.productId;
                db.collection("product").doc(pid).get().then(function(doc){
                    if (doc.exists){

                        if (doc.data().images){
                            image_ = doc.data().images[0].imgUrl;
                        }

                        let chat_product = document.createElement('div');
                        chat_product.classList.add('product_data')

                        let div_img_product = document.createElement('div');
                        div_img_product.classList.add('avatar','avatar-xl');

                        let img_product = document.createElement('img');
                        img_product.src = image_;

                        let h3_product = document.createElement('h3');
                        h3_product.textContent = doc.data().name;

                        let p_product_detail = document.createElement('p');
                        p_product_detail.classList.add('badge','badge-success');
                        p_product_detail.textContent = '฿' + doc.data().price + '  instock : ' + doc.data().stock;

                        div_img_product.appendChild(img_product);
                        chat_product.appendChild(div_img_product);
                        chat_product.appendChild(h3_product);
                        chat_product.appendChild(p_product_detail);

                        mainChatDiv.appendChild(chat_product);
                    }
                });

            }else{

                
                var time = getTimeAMPM('time',item.time);
                var message_ = item.message;

                // let div_chat_lef_right = document.createElement('div');
                mainChatDiv.classList.add('chat');
                mainChatDiv.classList.add('chat-'+ classLeftRight);


                let div_chat_avatar = document.createElement('div');
                div_chat_avatar.classList.add('chat-avatar');

                let a_chat_avatar = document.createElement('a');
                a_chat_avatar.classList.add('avatar');
                a_chat_avatar.classList.add('m-0');

                let img_avatar = document.createElement('img');
                img_avatar.src = "<?php echo base_url('app-assets/img/user-default.png'); ?>";
                if (imag_active_l !=''){
                   img_avatar.classList.add(imag_active_l); 
                }
                if (imag_active_r !=''){
                    img_avatar.classList.add(imag_active_r);
                }
                
                img_avatar.alt = 'avatar';
                img_avatar.height = '36';
                img_avatar.width = '36';

                a_chat_avatar.appendChild(img_avatar);
                div_chat_avatar.appendChild(a_chat_avatar);

                let div_chat_body = document.createElement('div');
                div_chat_body.classList.add('chat-body', classLeftRight + '-' + i);
                div_chat_body.classList.add('chat-body');
                div_chat_body.classList.add(classLeftRight + '-' + i);

                let div_chat_message = document.createElement('div');
                div_chat_message.classList.add('chat-message');

                let span_chat_message =  document.createElement('span');
                span_chat_message.classList.add('chat-time');
                span_chat_message.textContent = time;

                if (item.type){
                    if(item.type == "img"){
                        let img_chat_message =  document.createElement('img');
                        img_chat_message.src = message_;
                        img_chat_message.width = 200;
                        img_chat_message.setAttribute('data-toggle','modal');
                        img_chat_message.setAttribute('data-target','#modal' + i);

                        let a_img_chat = document.createElement('a');

                        a_img_chat.appendChild(img_chat_message);
                        div_chat_message.appendChild(a_img_chat);

                        let chat_modal_image = document.getElementById('chat_modal_image');
                        let div_modal = document.createElement('div');
                        div_modal.classList.add('modal','fade');
                        div_modal.id = "modal" + i;
                        div_modal.setAttribute('tabindex','-1');
                        div_modal.setAttribute('role','dialog');
                        div_modal.setAttribute('aria-labelledby','myModalLabel');
                        div_modal.setAttribute('aria-hidden','true');

                        let chat_modal_dialog = document.createElement('div');
                        chat_modal_dialog.classList.add('modal-dialog','modal-lg');
                        chat_modal_dialog.setAttribute('role','document');

                        let chat_modal_content = document.createElement('div');
                        chat_modal_content.classList.add('modal-content');

                        let chat_modal_body = document.createElement('div');
                        chat_modal_body.classList.add('modal-body','mb-0','p-0');

                        let chat_modal_img =  document.createElement('img');
                        chat_modal_img.classList.add('img-fluid','z-depth-1');
                        chat_modal_img.src = message_;

                        chat_modal_body.appendChild(chat_modal_img);
                        chat_modal_content.appendChild(chat_modal_body);
                        chat_modal_dialog.appendChild(chat_modal_content);
                        div_modal.appendChild(chat_modal_dialog);

                        chat_modal_image.appendChild(div_modal);
                    }
                }else{
                    let p_chat_message =  document.createElement('p');
                    p_chat_message.textContent = message_;
                    div_chat_message.appendChild(p_chat_message);
                }


    

                
                div_chat_message.appendChild(span_chat_message);
                div_chat_body.appendChild(div_chat_message);

                mainChatDiv.appendChild(div_chat_avatar);
                mainChatDiv.appendChild(div_chat_body);
            }

        return mainChatDiv;
    }

    // // Add message to chat
    $('#chat_send').on('submit', function( e ) { 
        e.preventDefault();
        let message = $('#text_chat_input').val();
        let imgeBase64 = $('#chat-file-input-base64').val();
        let customerID = fromHex($('#chat_customerId').val());
        if (message != "") {


            let time = firebase.database.ServerValue.TIMESTAMP;
            //sender
            let refSender = firebase.database().ref('messages').child(userId).child(customerID);
            let key_ = refSender.push().key;

            if(imgeBase64){
                refSender.child(key_).set({
                    message: imgeBase64,
                    type: "img",
                    messageId: key_,
                    recipient: customerID,
                    sender: userId,
                    time: time
                }, function(error) {
                    if (error) {
                    // The write failed...
                    } else {
                    // Data saved successfully!
                    }
                });
            }else{
                refSender.child(key_).set({
                    message: message,
                    messageId: key_,
                    recipient: customerID,
                    sender: userId,
                    time: time
                }, function(error) {
                    if (error) {
                    // The write failed...
                    } else {
                    // Data saved successfully!
                    }
                });
            }


            //receip
            let refRecipient = firebase.database().ref('messages').child(customerID).child(userId);
            if(imgeBase64){
                refRecipient.child(key_).set({
                    message: imgeBase64,
                    type: "img",
                    messageId: key_,
                    recipient: customerID,
                    sender: userId,
                    time: time
                }, function(error) {
                    if (error) {
                    // The write failed...
                    } else {
                    // Data saved successfully!
                    }
                });
            }else{
                refRecipient.child(key_).set({
                    message: message,
                    messageId: key_,
                    recipient: customerID,
                    sender: userId,
                    time: time
                }, function(error) {
                    if (error) {
                    // The write failed...
                    } else {
                    // Data saved successfully!
                    }
                });
            }
            //unread
            let refUnread = firebase.database().ref('messages').child('unread-Messages').child(customerID).child(userId).child(key_);
            var updates = {};
            updates[key_] = 1;
            refUnread.update(updates);

            $('#text_chat_input').val('');
            $('#chat-file-input-base64').val('');
            // chatContainer.scrollTop($(".chat-container > .chat-content").height());
        }
    })

    async function countUnreadMessage(){

        let refUnread = firebase.database().ref('messages').child('unread-Messages').child(userId);
          refUnread.on('value',function(unread){
            unread.forEach(function(item){
                let docCustomerId = $('.' + item.key);
                if (docCustomerId.length > 0){
                    if (item.numChildren() > 0){
                        $('.' + item.key).html(item.numChildren());                  
                    }
                }

            })
            
        })
    }

    function readMessage(customerID){
        let refUnread = firebase.database().ref('messages').child('unread-Messages').child(userId).child(customerID);
        refUnread.remove().then(function(e){
            $('.' + customerID).html('');
        });
    }

    $('#text_chat_input').mousedown(function(){
        let cid = fromHex($('#chat_customerId').val());
        readMessage(cid);
    })

    $('#chat_file_upload').click(function(e){
        e.preventDefault();
        $('#chat-file-input').trigger('click');
    })
    
    $('#chat-file-input').on('change', function (inp) {
        if (inp.target.files.length != 0){
            var FileSize = inp.target.files[0].size / 1024 / 1024; // in MB
            if (FileSize > 2) {
  
            }else{
                var countFiles = inp.target.files.length;  
                var imgPath = inp.target.value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof (FileReader) != "undefined") {
                        for (var i = 0; i < countFiles; i++) {  
                            var reader = new FileReader();
                            reader.readAsArrayBuffer(inp.target.files[i]);
                            reader.onload = function (event) {
                                var blob = new Blob([event.target.result]);
                                window.URL = window.URL || window.webkitURL;
                                var blobURL = window.URL.createObjectURL(blob);
                                
                                var image = new Image();
                                image.src = blobURL;
                                image.onload = function() {
                                    var resized = resizeMe2(image);
                                    $('#chat-file-input-base64').val(resized);
                                    $('#text_chat_input').val(inp.target.value);
                                }
                            };
                        }
                    } else {
                        console.log("This browser does not support FileReader.");
                    }
                } else {
                    console.log("Pls select only images");
                }
            }
        }
    });

    function resizeMe2(img) {
        var canvas = document.createElement('canvas');
        var width = img.width;
        var height = img.height;
        canvas.width = width;
        canvas.height = height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, width, height);
        return canvas.toDataURL("image/jpeg",0.7); 
    }
</script>