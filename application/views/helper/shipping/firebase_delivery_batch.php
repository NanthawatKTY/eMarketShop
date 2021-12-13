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
        getOrders();
        $('input[name="daterange"]').daterangepicker({
				opens: 'left'
			}, function(startDate, endDate) {
	            // console.log("A new date selection was made: " + datePicker(startDate.format('DD-MM-YYYY')) + ' to ' + datePicker(endDate.format('DD-MM-YYYY')));
                getOrdersDate(startDate, endDate); 
        });
    }

    function getOrders(){

        let baseDoc = db.collection("orders").doc(userId);
        $(".delivery_batch_tb").html('');
        baseDoc.onSnapshot(function(snapshot) {
             snapshot.data().orderList.forEach(function(change) {
                if (change.isActive == true && change.processing == "not processed" && change.status == 'to_ship'){
                    showDeliveryBatchList(change);
                }
            });
        });   
        
        $( "#shipping_sort" ).on('change',function() {
            getOrdersByShippingSort( $(this).val());
        }); 

        $( "#statusProcess_batch" ).on('change',function() {
            getOrdersByProcessSort( $(this).val());
        }); 
      
    }

//////////////////// For delivery sort //////////////////////////////////

    function getOrdersByShippingSort(shippingStatusSort){
        let baseDoc = db.collection("orders").doc(userId);
        // All shipping
        if(shippingStatusSort == 'allShipping'){  
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".delivery_batch_tb").html('');
                }else{
                    $(".delivery_batch_tb").html('');             
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.processing == "not processed" && change.status == 'to_ship'){
                         showDeliveryBatchList(change);
                        }                
                    });
                }
            });
        }
        else if(shippingStatusSort != 'allShipping'){
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".delivery_batch_tb").html('');
                }else{
                    $(".delivery_batch_tb").html('');             
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.shipping == shippingStatusSort && change.processing == "not processed" && change.status == 'to_ship'){
                         showDeliveryBatchList(change);
                        }
                    });
                }
            });
        }
        return shippingStatusSort;
    }

////////////////////////////////////////////////////////////////////////////

//////////////////// For process sort //////////////////////////////////////
function getOrdersByProcessSort(processStatusSort){
    let baseDoc = db.collection("orders").doc(userId);
        // All shipping
        if(processStatusSort == 'orderBatchAllProcess'){  
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".delivery_batch_tb").html('');
                }else{
                    $(".delivery_batch_tb").html('');             
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == 'to_ship'){
                         showDeliveryBatchList(change);
                        }                
                    });
                }
            });
        }
        else if(processStatusSort == 'orderBatchNotProcess'){
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".delivery_batch_tb").html('');
                }else{
                    $(".delivery_batch_tb").html('');             
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.processing == "not processed" && change.status == 'to_ship'){
                         showDeliveryBatchList(change);
                        }
                    });
                }
            });
        }
    return processStatusSort;
}

////////////////////////////////////////////////////////////////////////////

// *************************************************************************

    function showOrderData(e){
        var key = e.getAttribute('data-key');
        //change to hex key
        window.location.href = contentUrl + 'OrderDetial/' + toHex(key);
    }

    window.onpopstate = function() {
        getUrlChange();
    }

    function changeUrl(tabId){
            if (tabId == null && tabId == 'ManageOrders_toship') {
                tabId = 'toshipOrders-tab';
            }
            else{
                window.history.pushState("object or string", "Title", contentUrl + "Shippings/" + tabId);
                console.log('Tab ID', tabId);
                getUrlChange();
            }
    }


    ///////////////////// Sort DESC and ASC start ///////////////////////
    function sortByKeyDesc(array, key) {
        return array.sort(function (a, b) {
            var x = a[key]; var y = b[key];
            return ((x > y) ? -1 : ((x < y) ? 1 : 0));
        });
    }
    function sortByKeyAsc(array, key) {
        return array.sort(function (a, b) {
            var x = a[key]; var y = b[key];
            return ((x < y) ? -1 : ((x > y) ? 1 : 0));
        });
    }
    ///////////////////// Sort DESC and ASC End ///////////////////////////////

    //////////////////////// Date filter ////////////////////////////////////////
    function ordersDateFilter(date){   

            let baseDoc = db.collection("orders").doc(userId);
            if(date == 'orderDateO2N'){  //All tab ASC

                baseDoc.get().then(function(snapshot){
                    baseDoc.onSnapshot(function(snapshot) {
                        const dataASC =  sortByKeyAsc(snapshot.data().orderList,'insertDate');
                        if(snapshot.data().orderList.length == 0){
                            $(".delivery_batch_tb").html('');
                        }else{
                            $(".delivery_batch_tb").html('');             
                            dataASC.forEach(function(change) {
                                if (change.isActive == true){
                                 showDeliveryBatchList(change); 
                                }                
                            });
                        }
                    });
                });

            }else if(date == 'orderDateN2O'){  //All tab DESC

                baseDoc.get().then(function(snapshot){
                    baseDoc.onSnapshot(function(snapshot) {
                        const dataDesc =  sortByKeyDesc(snapshot.data().orderList,'insertDate');
                        if(snapshot.data().orderList.length == 0){
                            $(".delivery_batch_tb").html('');
                        }else{
                            $(".delivery_batch_tb").html('');             
                           dataDesc.forEach(function(change) {
                                if (change.isActive == true){
                                 showDeliveryBatchList(change); 
                                }                
                            });
                        }
                    });
                });
            }
    }
    //////////////////////// Date filter - End //////////////////////////////////////////

    ///////////////////////////////////////Searching Start/////////////////////////////////// 
    $(document).ready(function () {
        "use strict"; 
        // chat search filter
        $("#chat-search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            if (value != "") {
                $(".delivery_batch_tb").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            } else {
                // if search filter box is empty
                $(".delivery_batch_tb").show();
            }
        });
    });

    ////////////////////////////Searching End//////////////////////////////////////////// 

    
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
    // return formattedTime;
    }

    // For status filter
    function showDeliveryBatchList(data){
        let key = data.orderNo;
        let date = convertDate2(data.insertDate.seconds);
        let trTableBatch = "<tr>";
        trTableBatch += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + data.orderNo + '</a></td>';
        trTableBatch += "<td>" + data.shippingAddress.name +"</td>";
        trTableBatch += "<td>" + data.shipping +"</td>";
        trTableBatch += "<td>"+ data.status +"</td>";
        trTableBatch += "<td>" + date +"</td>";
        trTableBatch += "</tr>";
        $(".delivery_batch_tb").append(trTableBatch);
    }

</script>