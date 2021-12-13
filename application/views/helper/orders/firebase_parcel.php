<?php 
    $url = base_url($lang.'/');
    if($this->uri->segment(1) =='th'){
        $lang_chk = "th";
    } else {
        $lang_chk = "en";
    }
    $get_value = $this->uri->segment(3);    
?>

<script>
    window.onload = async function(){
            userId = await userData();
           
            countUnreadMessage_otherPage();
            dataShowOrders(<?php echo json_encode($get_value); ?>);
            
    }
    window.open();
    window.print();
       ///////////// Time format /////////
    function convertDate2(UNIX_timestamp){
        var a = new Date(UNIX_timestamp * 1000);
        var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        var year = a.getFullYear();
        var month = months[a.getMonth()];
        var date = a.getDate();
        var hour = a.getHours();
        var min = a.getMinutes();
        var sec = a.getSeconds();
        var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
        return time;
    }
    function getOrders(){
        let baseDoc = db.collection("orders").doc(userId);
                
        $(".btnParcel").html('');
        baseDoc.onSnapshot(function(snapshot) {
            snapshot.data().orderList.forEach(function(change) {
                if (change.isActive == true){
                    showOrderParcel(change);
                }
            });
        });   
    }

//Show datas 
function showOrderParcel(keyOrders) {
    let key = fromHex(<?php echo json_encode($get_value); ?>);
    let docRef = db.collection("orders").doc(userId);
    var priceSum = 0;
    var priceService = '';
    var totalAllPrice = '';

    docRef.get().then(function(doc){
        if (doc.exists) {
            let trOrdetail = "<tr>";
           
            doc.data().orderList.forEach(function(value){
                if (value.isActive == true) {
                    let date = convertDate2(value.insertDate.seconds);
                    if (value.orderNo == key){
                    value.orderItem.forEach(function(item) {
                        console.log('orderList : ',item);
                        priceSum += parseFloat(item.total);
                        trOrdetail += "<td>" + item.productName + "\n" + item.pricePerUnit +"\n" + item.qty +"\n" + "</td>";
                        trOrdetail += "</tr>";      
                    })
                }
                    $(".tbOrders").append(trOrdetail);
                    // console.log('view order: ', doc.data());

                    // For order details form
                    $('#btn-tracking').text('# ' + value.tracking);
                    $('#tracking').text(value.tracking);
                    $('#order-no').text(value.orderNo);
                    $('#shippingAddress').text(value.shippingAddress.address);
                    $('#shippingInfo').text(value.shipping);
                    $('#insertDate').text(date);
                    console.log(new Date(value.insertDate.seconds*1000))

                    // Status text
                    if(value.status == 'to_ship'){
                        $('#updateProcess').show();
                    }

                   $('#orderStatus').val(value.status);
                    //console.log('Status: ', value.status);
                    
                    //For show user data
                    $('#customerID').text(value.customerId);
                    $('#customerName').text(value.shippingAddress.name);
                    $('#customerPhone').text(value.shippingAddress.phone);
                    $('#postCode').text(value.shippingAddress.postcode);

                    // For modal form
                    $('#shippingInfoModal').text(value.shipping);
                    $('#shippingAddressModal').text(value.shippingAddress.address);
                    $('#customerNameModal').text(value.shippingAddress.name);
                    $('#trackingModal').text(value.tracking);

                    // Total price
                    priceService += parseFloat(value.serviceCost);
                    totalAllPrice += parseFloat(parseFloat(priceSum) + parseFloat(priceService));
                    // console.log(priceService);   

                    //For Parcel Cover PDF
                    $('.CustomerName').text(value.shippingAddress.name);   

                    $('#OrderNumberParcelShow').val(value.orderNo);
                    $('#OrderNumberParcel').on('value',function() {
                        toGetParcelData( $(this).val());
                    }); 
                }
            })
        }
    })
}

</script>