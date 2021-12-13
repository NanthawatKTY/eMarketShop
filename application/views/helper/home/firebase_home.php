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
        await getDataOrders_home();
        await getProductCount();
        $('.set-height').css('min-height','400px');
        
        countUnreadMessage_otherPage();
//+++++++++++++++++++++++++++++++++++++++++++++++++++
        let user = firebase.auth().currentUser;
        if (user != null) {
            // console.log('userData : ',user);
        }
    }
 
    function getDataOrders_home(){
        let count_order = 0
        let count_order_shipping = 0
        let count_order_shipping_ = 0
        let count_invoice = 0
        let count_invoice_product = 0
        let baseDoc = db.collection("orders").doc(userId);
            // baseDoc = baseDoc.where("sellerId", "==", userId);
            // baseDoc = baseDoc.orderBy("insertDate", 'asc');
            $('#home_order').html('');
            $('#recent-buyers').html('');
            baseDoc.get().then(function(snapshot) {
                // const cid = snapshot.id;
                if (snapshot.exists){
                    var indexOf = 0;
                    var indexOf2 = 0;
                    snapshot.data().orderList.forEach(function(change) {
                        // console.log(change.doc.data());
                        if (indexOf2 < 5){
                            getOrder_list(change);
                            indexOf2++;
                        }
                        
                        switch(change.status) {
                        case 'success':
                            count_order += 1;
                            break;
                        case 'to_ship':
                            
                            if (change.processing =='not processed'){
                                count_order_shipping += 1;
                            }else{
                                count_order_shipping_ += 1;
                            }  
                            break;
                        case 'refund':
                            count_invoice_product += 1;
                            break;
                        case 'cancel':
                            count_invoice += 1;
                            break;
                        default:
                            count_order_shipping += 1;
                        }
                        if (change.customerId != null){
                            getCustomerData(change.customerId , change.total, indexOf);
                            indexOf++;
                        }

                    });
                    $('#count_order').text(count_order);
                    $('#count_order_shipping').text(count_order_shipping);
                    $('#count_order_shipping_').text(count_order_shipping_);
                    $('#count_order_invoice_product').text(count_invoice_product);
                    $('#count_order_invoice').text(count_invoice);
                    // $('#count_product_stock').text(count_order);
                }

            });

    }
    function getProductCount(){
        let count_product_stock = 0;
        let baseDoc = db.collection("product");
            baseDoc = baseDoc.where("isActive", "==", true);
            baseDoc = baseDoc.where("userId", "==", userId);
            // baseDoc = baseDoc.limit(12);
            baseDoc.onSnapshot(function(snapshot) {
                snapshot.docChanges().forEach(function(change) {
                    // console.log('data : ', change.doc.data());
                    count_product_stock += 1;
                });            
                // console.log(count_product_stock);
                $('#count_product_stock').text(count_product_stock);
            });

    }
    
    function getOrder_list(doc){
        let data = doc;
        let clssStatus = 'badge-warning';
        if (data.status == 'สำเร็จ'){
            clssStatus = 'badge-success';
        }
       
        let tr = '<tr>';
        tr += '<td><a href="#" onclick="showOrderData(this)" data-key="'+ doc.orderNo +'">'+ data.orderNo +'</a></td>';
        tr += '<td>'+ data.total +'฿</td>';
        tr += '<td><span class="badge '+ clssStatus +'">'+ data.status +'</span></td>';
        tr += '<td>'+ data.shipping +'</td>';
        tr += '</tr>';
        $('#home_order').append(tr);
    }

    function showOrderData(e){
        var key = e.getAttribute('data-key');
        //change to hex key
        window.location.href = contentUrl + 'OrderDetial/' + toHex(key);
    }

    function getCustomerData(uid ,price,i){
        if (i < 4){
                 let docRef = db.collection("userProfile").doc($.trim(uid));
            docRef.get().then(function(doc) {
                if (doc.exists) {
                    
                    let userHtml = '<a href="#" class="media border-0">';
                    userHtml += '<div class="media-left pr-1">'
                    userHtml += '<div class="avatar avatar-online avatar-md"><img class="media-object rounded-circle" src="<?php echo base_url("app-assets/img/user-default.png"); ?>" alt="Generic placeholder image">';
                    userHtml += '<i></i>';
                    userHtml += '</div>';
                    userHtml += '</div>';
                    userHtml += '<div class="media-body w-100">';
                    userHtml += '<h6 class="list-group-item-heading">'+ doc.data().name +'<span class="font-medium-4 float-right pt-1">'+ price +'฿</span></h6>';
                    // userHtml += '<p class="list-group-item-text mb-0"><span class="badge badge-primary">Electronics</span><span class="badge badge-warning ml-1">Decor</span></p>';
                    userHtml += '</div>';
                    userHtml += '</a>';
                $('#recent-buyers').append(userHtml);
                } else {
                    // doc.data() will be undefined in this case
                    console.log("No such document!");
                }
            }).catch(function(error) {
                console.log("Error getting document:", error);
            });   
        }

    }

    // function mockData(){
    //     var docRef = db.collection("quotation").doc(userId);
    //         docRef.get().then(function(doc) {
    //             if (doc.exists) {
    //                 console.log("Document data: sddsf", doc.data());
    //                 db.collection("quotation").doc('R6Ix1QAmgAgoQXn03fvfEp7OQ4f2').set(doc.data()).then(function() {
    //                     console.log("Document successfully written!");
    //                 });
    //             } else {
    //                 // doc.data() will be undefined in this case
    //                 console.log("No such document!");
    //             }
    //         }).catch(function(error) {
    //             console.log("Error getting document:", error);
    //         });
    // }
</script>