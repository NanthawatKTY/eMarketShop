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

    window.onload = async function(){
        userId = await userData();
        countUnreadMessage_otherPage();
        dataShowOrders(<?php echo json_encode($get_value); ?>);
        
        updateStatus();
    }


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

//Show datas 
function dataShowOrders(keyOrders) {
    let key = fromHex(keyOrders);
    let docRef = db.collection("orders").doc(userId);
    var priceSum = 0;
    var priceService = '';
    var deliveryCost = '';
    var totalAllPrice = '';

    docRef.get().then(function(doc){
        if (doc.exists) {
            let trOrdetail = "<tr>";
            
           
            doc.data().orderList.forEach(function(value){
                let date = convertDate2(value.insertDate.seconds);
                if (value.orderNo == key){
                    value.orderItem.forEach(function(item) {
                        console.log('orderList : ',item);
                        priceSum += parseFloat(item.total);
                        trOrdetail += "<td>" + item.productName +"</td>";
                        trOrdetail += "<td>" + item.pricePerUnit +"</td>";
                        trOrdetail += "<td>" + item.qty +"</td>";
                        trOrdetail += "<td>" + item.total +"</td>";
                        trOrdetail += "</tr>";      
                    })
           

                    $(".tbOrders").append(trOrdetail);
                    // console.log('view order: ', doc.data());

                    // For order details form
                    $('#btn-tracking').text('# ' + value.tracking);
                    $('#tracking').text(value.tracking);
                    $('#order-no').text(value.orderNo);
                    $('.shippingAddress').text(value.shippingAddress.address);
                    $('.shippingInfo').text(value.shipping);
                    $('.insertDate').text(date);
                    $('.shipCost').text("฿" + value.paymentDetail.shippingCost);
                    console.log(new Date(value.insertDate.seconds*1000))

                    // Status text
                    if(value.status == 'to_ship'){
                        $('#updateProcess').show();
                    }

                   $('#orderStatus').val(value.status);
                    //console.log('Status: ', value.status);
                    
                    //For show user data
                    $('.customerID').text(value.customerId);
                    $('.customerName').text(value.shippingAddress.name);
                    $('.customerPhone').text(value.shippingAddress.phone);
                    $('.postCode').text(value.shippingAddress.postcode);

                    // For modal form
                    $('.shippingInfoModal').text(value.shipping);
                    $('.shippingAddressModal').text(value.shippingAddress.address);
                    $('.customerNameModal').text(value.shippingAddress.name);
                    $('.trackingModal').text(value.tracking);

                    console.log(value.sellerId);

                    // Total price
                    priceService += parseFloat(value.serviceCost);
                    deliveryCost += parseFloat(value.paymentDetail.shippingCost);
                    totalAllPrice += parseFloat(parseFloat(priceSum) + parseFloat(deliveryCost) + parseFloat(priceService));

                    console.log("Price service and Total: ", priceService + ", " + totalAllPrice);
                    console.log("shipping cost: ", value.paymentDetail.shippingCost);
                    $(".priceSum").text("฿" + priceSum);
                    $("#priceService").text("฿" + priceService);
                    $("#totalAllPrice").text("฿" + totalAllPrice);
                
                    //Customer's payment 
                    $("#priceSum_payment").text(priceSum);
                    $("#priceService_payment").text("฿" + priceService);
                    $("#totalAllPrice_payment").text("฿" + totalAllPrice);
                    $("#totalAllPrice_payment_header").text("฿" + totalAllPrice);
                    // console.log(priceService);   
                }


            })
            var docSeller = db.collection("shops").doc(userId);
                    console.log('UID: ' + docSeller);
                docSeller.get().then(function (docSell) {
                    if (docSell.exists) {
                        console.log("Document data:", docSell.data());
                        $('#sellerNameParcel').text(docSell.data().contact.nameContact);
                        
                        let sellerAddress  = docSell.data().contact.address + ' ' + docSell.data().contact.subDistrict + ' ' + docSell.data().contact.district + ' ' + docSell.data().contact.province + ' ' + docSell.data().contact.zipcode
                        $('#addressNameParcel').text(sellerAddress);

                        $('#sellerEmailParcel').text(docSell.data().contact.email);

                        $('#sellerTelParcel').text(docSell.data().contact.phone);
                    }          
                })

        }
    })
    // .then(function () {
    //     $("#priceSum").text(priceSum);
    //     $("#priceService").text("฿" + priceService);
    //     $("#totalAllPrice").text("฿" + totalAllPrice);
                
    //     //Customer's payment 
    //     $("#priceSum_payment").text(priceSum);
    //     $("#priceService_payment").text("฿" + priceService);
    //     $("#totalAllPrice_payment").text("฿" + totalAllPrice);
    //     $("#totalAllPrice_payment_header").text("฿" + totalAllPrice);
    // }) 
}







// function toGetParcelData(orderNum){
//         var key = orderNum.getAttribute('data-key');
//         console.log('Key ' , key);
//         //change to hex key
//         window.location.href = contentUrl + 'OrderDetial/Print_Parcel/' + toHex(key);
//  }

function myPrint(myfrm) {
            var printdata = document.getElementById(myfrm);
            newwin = window.open("");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
        }

//////////// Payment Details ////////////////

function isActiveStatus(activeStatus) {
    let key = fromHex(<?php echo json_encode($get_value); ?>);
    let ref = db.collection("orders").doc(userId);
    if(activeStatus == false){
        ref.get().then(function(value){
            if (value.exists){
                var newData1 = new Object();
                newData1.orderList = [];       
                value.data().orderList.forEach(function(value){
                    if (value.orderNo == key) {
                        let newData = value;
                        newData.isActive = false;
                        newData1.orderList.push(newData);

                    }else{
                        newData1.orderList.push(value);
                    }
              
                })
                console.log('newData ', newData1);                

                Swal.fire({
                    title: "Are you sure to cancel order?",
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
                        ref.set(newData1).then(function(e){
                            Swal.fire({
                                type: "success",
                                title: "Cancelled!",
                                text: "This order has been cancelled.",
                                confirmButtonClass: "btn btn-success"
                            
                            });
                            
                        }).then(function () {
                            setTimeout(() => {
                                // Windows refreshing
                                window.location.href = <?php echo json_encode($url); ?> + "ManageOrders/allorders-tab";
                            }, 2000); 
                        });
                        
                    }
                })
            }
         })
    }
}


///////////////////// Update Order Status //////////////////////
function updateStatus() {
    
    $('#form_orderDetails_edit').submit(function(e){
        e.preventDefault();
        
        let keyOrders = fromHex(<?php echo json_encode($get_value); ?>);
        let newData = new Object();
        var ref = db.collection("orders").doc(userId);
        ref.get().then(function(value) {
            if (value.exists) {
                var newStatusData = new Object();
                newStatusData.orderList = [];  
                value.data().orderList.forEach(function(value){
                    if(value.orderNo == keyOrders){
                        let newItemData = value;                                        
                        newItemData.processing = $('#orderProcessing').val();
                        newStatusData.orderList.push(newItemData);
                    }else{
                        newStatusData.orderList.push(value);
                    }       
                })
                // console.log('dd ',newStatusData);
                ref.set(newStatusData).then(function(result) {
                    console.log("Processing were successfully updated");
                    // console.log('calback : ',data);
                    window.location.reload()  ;
                    //= <?php echo json_encode($url); ?> + 'OrderDetial/' + keyOrders;          
                }).catch(function(error) {
                    console.error("Error updating: ", error);
                });
            }
        })
    })
}

// function showOrdersDetail(data){ 
//         let keyOrders = fromHex(<?php echo json_encode($get_value); ?>);
        
//         btnPrintParcel += '<button onclick="toGetParcelData(this)" data-key="'+ keyOrders +'" class="text-success2">' + data.orderNo + '</button>';
//         $("#btnParcel").append(btnPrintParcel);     
// }

function printParcel(areaID){

var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(areaID).innerHTML;
//var oldstr = document.body.innerHTML;
    document.body.innerHTML = headstr+newstr+footstr;
    window.print();
    document.body.innerHTML = oldstr;
// return false;
}

function closeModal(e){
    $("#printParcelArea").hide('');
    $(".modal-backdrop").remove();
}


</script>