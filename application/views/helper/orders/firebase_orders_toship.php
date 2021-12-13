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

    
    ////////////////////////// Get Orders by Date Range ///////////////////////////////////////
    function getOrdersDate(startDate, endDate) {
        let baseDoc = db.collection("orders").doc(userId);
            $(".tbBodyToShip").html('');
            $(".tbBodyToShipExport").html('');
            let sDate = new Date(startDate._d);
            let eDate = new Date(endDate._d);


            var StartDate = $.datepicker.formatDate('yy-mm-dd', sDate);
            // var StartDate = sDate.getTime();
            var EndDate = $.datepicker.formatDate('yy-mm-dd', eDate);

           // console.log('Show Date', StartDate, ' & ', EndDate);
        baseDoc.get().then(function (snapshot) {
            baseDoc.onSnapshot(function(snapshot) {
                snapshot.data().orderList.forEach(function(change) {    
                    let insertDate = $.datepicker.formatDate('yy-mm-dd', new Date(change.insertDate.seconds * 1000));
                    if (change.isActive == true && insertDate >= StartDate && insertDate <= EndDate ){
                        showOrderToShip(change);
                        showOrderToShipExport(change);
                    }
                    // console.log('Show dwerw3erssssata', convertDate2(change.insertDate.seconds));
                    console.log('Show date: ', change.insertDate);
                    let iDate_ = new Date( convertDate2(change.insertDate.seconds));
                    let iDate2_ = iDate_.getTime();
                    console.log('Show Date', iDate2_, ' & ', EndDate);
                });      
            })  
        })
               
    } 
////////////////////////// Get Orders by Date Range END ///////////////////////////////////////

    function getOrders(){

            let baseDoc = db.collection("orders").doc(userId);
            let getValue = <?php echo json_encode($get_value) ?>

            if (getValue == 'toShipOrders-tab') {
                    baseDoc.onSnapshot(function(snapshot) {
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html('');
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == 'to_ship'){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }
                    });
                });
            }else if(getValue == 'toShipNotprocess-tab') {
                baseDoc.onSnapshot(function(snapshot) {
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html('');
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.processing == "not processed" && change.status == 'to_ship'){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }
                    });
                });
            }else if(getValue == 'toShipProcessed-tab') {
                baseDoc.onSnapshot(function(snapshot) {
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html('');
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true  && change.processing == "processing" && change.status == 'to_ship'){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }
                    });
                });
            }
           
        ///////////// Shipping Sort ID Lists ////////////////////////////////////         
        $( "#shippingSort3_1" ).on('change',function() {            //All
            getOrdersByShippingStatusSort( $(this).val());
        }); 
        $( "#shippingSort3_2" ).on('change',function() {            //Not Process
            getOrdersByShippingStatusSort( $(this).val());
        }); 
        $( "#shippingSort3_3" ).on('change',function() {            //Processed
            getOrdersByShippingStatusSort( $(this).val());
        });    
        //////////////////////End of Shipping sort///////////////////////////////////// 


        //////////////////Starting of Date Filter////////////////////////////////////// 
        // Tab 1
        $('#ordersDateFilter_1').on('change',function() {
            ordersDateFilter( $(this).val());
        });
        $('#ordersDateFilter_2').on('change',function() {
            ordersDateFilter( $(this).val());
        });
        $('#ordersDateFilter_3').on('change',function() {
            ordersDateFilter( $(this).val());
        });
        //////////////////Ending of Date Filter////////////////////////////////////// 


        ///////////////////Starting of status validiation //////////////////////////
        
        ////////////////To Ship//////////////////////////
        $( "#toShipOrders-tab" ).on('change',function() {
            getOrdersByShippingStatus( $(this).val());
        }); 
        $( "#toShipNotprocess-tab" ).on('change',function() {
            getOrdersByShippingStatus( $(this).val());
        }); 
        $( "#toShipProcessed-tab" ).on('change',function() {
            getOrdersByShippingStatus( $(this).val());
        });
        
    }


    ////////////////// Sort by Shipping For All Tab - Start ////////////////////
    function getOrdersByShipping(shippingSort){
 
            let baseDoc = db.collection("orders").doc(userId);
            //All shipping
            if(shippingSort == 'allShipping'){
              
                baseDoc.onSnapshot(function(snapshot) {
                    if(snapshot.data().orderList.length == 0){
                        $(".tbBodyToShip").html('');
                        $(".tbBodyToShipExport").html('');
                    }else{
                        $(".tbBodyToShip").html('');      
                        $(".tbBodyToShipExport").html('');       
                        snapshot.data().orderList.forEach(function(change) {
                            if (change.isActive == true && change.status == 'to_ship'){
                             showOrderToShip(change);
                             showOrderToShipExport(change);
                            }               
                        });
                    }
                });
            }else{
                baseDoc.onSnapshot(function(snapshot) {
                    if(snapshot.data().orderList.length == 0){
                        $(".tbBodyToShip").html('');
                        $(".tbBodyToShipExport").html('');
                    }else{
                        $(".tbBodyToShip").html('');      
                        $(".tbBodyToShipExport").html('');       
                        snapshot.data().orderList.forEach(function(change) {
                            if (change.isActive == true && change.shipping == shippingSort && change.status == 'to_ship'){
                             showOrderToShip(change);
                             showOrderToShipExport(change);
                            }
                        });
                    }
                });
            }    
    }

    ////////////////// Sort by Shipping For All Tab - End ////////////////////


    var shippingStatus;

   // Shipping Status 
    function getOrdersByShippingStatus(shippingStatus) {
        $(".tbBodyToShip").html('');
        $(".tbBodyToShipExport").html('');
        let baseDoc = db.collection("orders").doc(userId);

        if (shippingStatus == 'toShipOrders-tab') {
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html('');
                }else{
                    $(".tbBodyToShip").html('');  
                    $(".tbBodyToShipExport").html('');           
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == 'to_ship'){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }                
                    });
                }
            });
        }else if(shippingStatus == 'toShipNotprocess-tab') {
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html('');
                }else{
                    $(".tbBodyToShip").html('');  
                    $(".tbBodyToShipExport").html('');           
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.processing == "not processed" && change.status == 'to_ship'){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }                
                    });
                }
            });
        }else if(shippingStatus == 'toShipProcessed-tab') {
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html('');
                }else{
                    $(".tbBodyToShip").html('');      
                    $(".tbBodyToShipExport").html('');       
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.processing == "processing" && change.status == 'to_ship'){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }                
                    });
                }
            });
        }
    }

  

    function getOrdersByShippingStatusSort(shippingStatusSort){
        let baseDoc = db.collection("orders").doc(userId);
        if(shippingStatusSort == 'allShippingNotprocess'){   //All shipping Not Processed
           
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html('');
                }else{
                    $(".tbBodyToShip").html('');  
                    $(".tbBodyToShipExport").html('');           
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "to_ship" && change.processing == "not processed"){
                            showOrderToShip(change);
                            showOrderToShipExport(change);
                        }                
                    });
                }
            });

        }else if(shippingStatusSort == 'Thailand Post Notprocess'){  //Thailand Post Not Processed
           
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html('');
                }else{
                    $(".tbBodyToShip").html('');     
                    $(".tbBodyToShipExport").html('');        
                    snapshot.data().orderList.forEach(function(change) {
                        if(change.isActive == true && change.status == "to_ship" && change.shipping == "Thailand Post" && change.processing == "not processed"){   
                            showOrderToShip(change);
                            showOrderToShipExport(change);
                        }           
                    });
                }
            });
        }else if(shippingStatusSort == 'SCG Express Notprocess'){  //SCG Express Not Processed
           
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html(''); 
                }else{
                    $(".tbBodyToShip").html('');   
                    $(".tbBodyToShipExport").html('');           
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "to_ship" && change.shipping == "SCG Express" && change.processing == "not processed"){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }                
                    });
                }
            });
        }else if(shippingStatusSort == 'Inter Express Notprocess'){  //SCG Express Not Processed
           
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html(''); 
                }else{
                    $(".tbBodyToShip").html(''); 
                    $(".tbBodyToShipExport").html('');             
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "to_ship" && change.shipping == "Inter Express" && change.processing == "not processed"){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }                
                    });
                }
            });
        }else if(shippingStatusSort == 'allShippingProcessed'){  //All shipping Processed
          
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html('');
                }else{
                    $(".tbBodyToShip").html('');      
                    $(".tbBodyToShipExport").html('');       
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "to_ship" && change.processing == "processing"){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }                
                    });
                }
            });
        }else if(shippingStatusSort == 'Thailand Post Processed'){  //Thailand Post Processed
          
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html('');
                }else{
                    $(".tbBodyToShip").html('');      
                    $(".tbBodyToShipExport").html('');       
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "to_ship" && change.shipping == "Thailand Post" && change.processing == "processing"){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }                
                    });
                }
            });
        }else if(shippingStatusSort == 'SCG Express Processed'){  //SCG Express Processed
                   
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html(''); 
                }else{
                    $(".tbBodyToShip").html('');       
                    $(".tbBodyToShipExport").html('');       
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "to_ship" && change.shipping == "SCG Express" && change.processing == "processing"){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }                
                    });
                }
            });
        }
        else if(shippingStatusSort == 'Inter Express Processed') { //Inter Express Processed
        
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html(''); 
                }else{
                    $(".tbBodyToShip").html('');       
                    $(".tbBodyToShipExport").html('');        
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "to_ship" && change.shipping == "Inter Express" && change.processing == "processing" ){
                            if (change.shipping == "Inter Express") {
                               showOrderToShip(change); 
                               showOrderToShipExport(change);
                            }
                        }                
                    });
                }
            });
            
        }
              // All shipping
        else if(shippingStatusSort == 'allShipping'){  
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html(''); 
                }else{
                    $(".tbBodyToShip").html('');       
                    $(".tbBodyToShipExport").html('');       
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "to_ship"){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }                
                    });
                }
            });
        }
        else if(shippingStatusSort != 'allShipping'){
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyToShip").html('');
                    $(".tbBodyToShipExport").html(''); 
                }else{
                    $(".tbBodyToShip").html('');        
                    $(".tbBodyToShipExport").html('');      
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.shipping == shippingStatusSort && change.status == "to_ship"){
                         showOrderToShip(change);
                         showOrderToShipExport(change);
                        }
                    });
                }
            });
        }
        return shippingStatusSort;
    }

// *************************************************************************

    function showOrderData(e){
        var key = e.getAttribute('data-key');
        //change to hex key
        window.location.href = contentUrl + 'OrderDetial/' + toHex(key);
    }

    window.onpopstate = function() {
        // alert(1);
        getUrlChange();
    }

    var tabId;
    var tabId2;
    
    function changeUrl(tabId){
            if (tabId == null && tabId == 'ManageOrders_toship') {
                tabId = 'toshipOrders-tab';
            }
            else{
                window.history.pushState("object or string", "Title", contentUrl + "ManageOrders/" + tabId);
                console.log('Tab ID', tabId);
                getUrlChange();
            }
    }

    // function changeUrl2(tabId1, tabId2){
    //     window.history.pushState("object or string", "Title", contentUrl + "ManageOrders/" + tabId1 + "/" + tabId2);
    //     console.log(tabId2);
    //     getUrlChange();
    // }

    function getUrlChange(){
        let url = window.location.href;     // Returns full URL (https://example.com/path/example.html)
        let lastSegment = url.substring(url.lastIndexOf('/') + 1);
     
        $('.tab-orders').removeClass('active');
        $('.tab-pane').removeClass('active');
        console.log('LAST 1',lastSegment);
 
        
        if (lastSegment == null && lastSegment == 'ManageOrders_toship') {
            lastSegment = 'toShipOrders-tab';
        }
        console.log('LAST 1',lastSegment);
        switch (lastSegment) {       

            ///////////////////////To Ship Tab/////////////////////////////
            case 'ManageOrders_toship':
                $('#toShipOrders-tab').addClass('active');
                $('#toShipOrders').addClass('active');
                $('#toship-main').addClass('active');
                $('.tab-orders').removeClass('active');
                break;
            case 'toShipOrders-tab':
                $('#toShipOrders-tab').addClass('active');
                $('#toShipOrders').addClass('active');
                $('#toship-tab').addClass('active');
                $('.tab-orders').removeClass('active');
                $('#toship-main').addClass('active');  
                getOrdersByShippingStatus('toShipOrders-tab');
                break;
            case 'toShipNotprocess-tab':
                $('#toShipNotprocess-tab').addClass('active');
                $('#toShipNotprocess').addClass('active');
                $('#toship-tab').addClass('active');
                $('#toship').addClass('active');
                $('.tab-orders').removeClass('active');
                $('#toship-main').addClass('active');  
                getOrdersByShippingStatus('toShipNotprocess-tab');
                break;
            case 'toShipProcessed-tab':
                $('#toShipProcessed-tab').addClass('active');
                $('#toShipProcessed').addClass('active');
                $('#toship-tab').addClass('active');
                $('#toship').addClass('active');
                $('.tab-orders').removeClass('active');
                $('#toship-main').addClass('active');  
                getOrdersByShippingStatus('toShipProcessed-tab');   
                break;    
            ////////////////////////To Ship Tab End////////////////////////////

            // default:
                
            //     if (lastSegment == 'allorders-tab') {
            //         $('#' + lastSegment).addClass('active');
            //         let openDiv = $('#' + lastSegment).attr('aria-controls');
            //         $('#' + openDiv).addClass('active');
            //     }

            //     $('#' + lastSegment).addClass('active');
            //     let openDiv = $('#' + lastSegment).attr('aria-controls');
            //     $('#' + openDiv).addClass('active');
            //     openDiv.addClass('active');
            //     break;
        }
        
    }


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

    function ordersDateFilter(date){   

            let baseDoc = db.collection("orders").doc(userId);
            if(date == 'orderDateO2N_1'){  //All tab ASC

                baseDoc.get().then(function(snapshot){
                    baseDoc.onSnapshot(function(snapshot) {
                        const dataASC =  sortByKeyAsc(snapshot.data().orderList,'insertDate');
                        if(snapshot.data().orderList.length == 0){
                            $(".tbBodyToShip").html('');
                            $(".tbBodyToShipExport").html(''); 
                        }else{
                            $(".tbBodyToShip").html('');    
                            $(".tbBodyToShipExport").html('');          
                            dataASC.forEach(function(change) {
                                if (change.isActive == true && change.status == 'to_ship'){
                                 showOrderToShip(change); 
                                 showOrderToShipExport(change);
                                }                
                            });
                        }
                    });
                });

            }else if(date == 'orderDateN2O_1'){  //All tab DESC

                baseDoc.get().then(function(snapshot){
                    baseDoc.onSnapshot(function(snapshot) {
                        const dataDesc =  sortByKeyDesc(snapshot.data().orderList,'insertDate');
                        if(snapshot.data().orderList.length == 0){
                            $(".tbBodyToShip").html('');
                            $(".tbBodyToShipExport").html('');
                        }else{
                            $(".tbBodyToShip").html('');      
                            $(".tbBodyToShipExport").html('');       
                            dataDesc.forEach(function(change) {
                                if (change.isActive == true && change.status == 'to_ship'){
                                 showOrderToShip(change); 
                                 showOrderToShipExport(change);
                                }                
                            });
                        }
                    });
                });
            }else if(date == 'orderDateO2N_2'){  //Not Processed ASC

                baseDoc.get().then(function(snapshot){
                    baseDoc.onSnapshot(function(snapshot) {
                        const dataASC =  sortByKeyAsc(snapshot.data().orderList,'insertDate');
                        if(snapshot.data().orderList.length == 0){
                            $(".tbBodyToShip").html('');
                            $(".tbBodyToShipExport").html('');
                        }else{
                            $(".tbBodyToShip").html('');  
                            $(".tbBodyToShipExport").html('');           
                            dataASC.forEach(function(change) {
                                if (change.isActive == true && change.status == 'to_ship' && change.processing == 'not processed'){
                                 showOrderToShip(change); 
                                 showOrderToShipExport(change);
                                }                
                            });
                        }
                    });
                });

            }else if(date == 'orderDateN2O_2'){  //Not Processed Desc
                baseDoc.get().then(function(snapshot){
                    baseDoc.onSnapshot(function(snapshot) {
                            const dataDesc =  sortByKeyDesc(snapshot.data().orderList,'insertDate');
                            if(snapshot.data().orderList.length == 0){
                                $(".tbBodyToShip").html('');
                                $(".tbBodyToShipExport").html('');
                            }else{
                                $(".tbBodyToShip").html('');      
                                $(".tbBodyToShipExport").html('');       
                            dataDesc.forEach(function(change) {
                                    if (change.isActive == true && change.status == 'to_ship' && change.processing == 'not processed'){
                                     showOrderToShip(change); 
                                     showOrderToShipExport(change);
                                    }                
                                });
                            }
                        });
                });
            }else if(date == 'orderDateO2N_3'){  //Processed ASC
                baseDoc.get().then(function(snapshot){
                    baseDoc.onSnapshot(function(snapshot) {
                        const dataASC =  sortByKeyAsc(snapshot.data().orderList,'insertDate');
                        if(snapshot.data().orderList.length == 0){
                            $(".tbBodyToShip").html('');
                            $(".tbBodyToShipExport").html('');
                        }else{
                            $(".tbBodyToShip").html('');      
                            $(".tbBodyToShipExport").html('');       
                            dataASC.forEach(function(change) {
                                if (change.isActive == true && change.status == 'to_ship' && change.processing == 'processing'){
                                 showOrderToShip(change); 
                                 showOrderToShipExport(change);
                                }                
                            });
                        }
                    });
                });
            
            }else if(date == 'orderDateN2O_3'){  //Processed DESC
                baseDoc.get().then(function(snapshot){
                    baseDoc.onSnapshot(function(snapshot) {
                            const dataDesc =  sortByKeyDesc(snapshot.data().orderList,'insertDate');
                            if(snapshot.data().orderList.length == 0){
                                $(".tbBodyToShip").html('');
                                $(".tbBodyToShipExport").html('');
                            }else{
                                $(".tbBodyToShip").html('');      
                                $(".tbBodyToShipExport").html('');       
                            dataDesc.forEach(function(change) {
                                    if (change.isActive == true && change.status == 'to_ship' && change.processing == 'processing'){
                                     showOrderToShip(change);
                                     showOrderToShipExport(change); 
                                    }                
                                });
                            }
                        });
                });
            }
            
            // else{
            //     // baseDoc = baseDoc.where("sellerId", "==", userId);
            //     // baseDoc = baseDoc.where("isActive", "==", true);

            //     baseDoc.onSnapshot(function(snapshot) {
            //     if(snapshot.data().orderList.length == 0){
            //         $(".tbBodyToShip").html('');

            //     }else{
            //         $(".tbBodyToShip").html('');             
            //         snapshot.data().orderList.forEach(function(change) {
            //             if (change.isActive == true && change.status == 'to_ship'){
            //              showOrderToShip(change);
            //             }
            //         });
            //     }
            // });
            // }
      
            //Sort by
                // baseDoc = baseDoc.limit(12);
                // $(".tbBodyToShip").html('');
                // baseDoc.onSnapshot(function(snapshot) {
                
                //     if(snapshot.docChanges().length == 0){
                //         $(".tbBodyToShip").html('');
                //     }else{
                //         snapshot.docChanges().forEach(function(change) {
                //         showOrderToShip(change.doc);
                //         console.log('insertDate ', change.doc.data().insertDate);
                //     });
                //     }
                // });     
    }

    ///////////////////////////////////////Searching Start/////////////////////////////////// 
    $(document).ready(function () {
        "use strict"; 
        // chat search filter
        $("#chat-search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            if (value != "") {
                $(".tbBodyToShip tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
                $(".tbBodyToShipExport tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            } else {
                // if search filter box is empty
                $(".tbBodyToShip tr").show();
                $(".tbBodyToShipExport tr").show();
            }
        });
    });

    ////////////////////////////Searching End//////////////////////////////////////////// 

    ///////////////// Export to Excel //////////////////////////
    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
        
        // Specify file name
        filename = filename?filename+'.xls':'Orders report.xls';
        
        // Create download link element
        downloadLink = document.createElement("a");
        
        document.body.appendChild(downloadLink);
        
        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
        
            // Setting the file name
            downloadLink.download = filename;
            
            //triggering the function
            downloadLink.click();
        }
    }

    ////////////////////////////////////////////////////////////
    
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
    function showOrderToShip(data){
        let key = data.orderNo;
        let date = convertDate2(data.insertDate.seconds);
        let trTable = "<tr>";
        trTable += '<td><a onclick="showOrderData(this)" data-key="' + key +'" class="text-success2">' + data.orderNo + '</a></td>';
        trTable += "<td>" + data.total +"</td>";
        trTable += "<td >" + data.shipping + "#" + data.tracking +"</td>";
        trTable += "<td>" + data.processing +"</td>";
        // trTable += "<td>" + data.status +"</td>";
        trTable += "<td>" + date +"</td>";
        trTable += "</tr>";
        $(".tbBodyToShip").append(trTable);
    }

    function showOrderToShipExport(data){

        let key = data.orderNo;
        let date = convertTHDate(data.insertDate.seconds,'numeric','short','numeric');
        data.orderItem.forEach(function (detail) {
            let trTableToshipExport = "<tr>";
            trTableToshipExport += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + key + '</a></td>';
            trTableToshipExport += "<td>"+ parseFloat(detail.total) +"</td>";
            trTableToshipExport += "<td>"+ data.status +"</td>";
            trTableToshipExport += "<td>" + date +"</td>";
            trTableToshipExport += "<td>" + data.shippingAddress.name +"</td>";
            ////////////// Add on datas /////////// 
            trTableToshipExport += "<td>" + detail.productName +"</td>";
            trTableToshipExport += "<td>" + detail.pricePerUnit +"</td>";
            trTableToshipExport += "<td>" + detail.qty +"</td>";
            trTableToshipExport += "<td>" + parseFloat(detail.total) +"</td>";       
            trTableToshipExport += "<td>" + data.shipping +"</td>";
            trTableToshipExport += "<td>" + data.tracking +"</td>";
            trTableToshipExport += "<td>" + data.shippingAddress.address +"</td>";
            trTableToshipExport += "<td>" + data.shippingAddress.postcode +"</td>";
            trTableToshipExport += "<td>" + data.shippingAddress.phone +"</td>";
            trTableToshipExport += "</tr>";
            $(".tbBodyToShipExport").append(trTableToshipExport); 
        })
        // let key = data.orderNo;
        // let date = convertDate2(data.insertDate.seconds);
        // let trTableToshipExport = "<tr>";
        // trTableToshipExport += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + data.orderNo + '</a></td>';
        // trTableToshipExport += "<td>"+ data.total +"</td>";
        // trTableToshipExport += "<td>"+ data.status +"</td>";
        // trTableToshipExport += "<td>" + date +"</td>";
        // trTableToshipExport += "<td>" + data.shippingAddress.name +"</td>";
        // ////////////// Add on datas /////////// 
        // data.orderItem.forEach(function (detail) {
        //     var priceSum = 0;
        //     console.log('orderList export: ',detail);
        //     priceSum += parseFloat(detail.total);
        //     trTableToshipExport += "<td>" + detail.productName +"</td>";
        //     trTableToshipExport += "<td>" + detail.pricePerUnit +"</td>";
        //     trTableToshipExport += "<td>" + detail.qty +"</td>";
        //     trTableToshipExport += "<td>" + priceSum +"</td>";
        // })

        // trTableToshipExport += "<td>" + data.shipping +"</td>";
        // trTableToshipExport += "<td>" + data.tracking +"</td>";
        // trTableToshipExport += "<td>" + data.shippingAddress.address +"</td>";
        // trTableToshipExport += "<td>" + data.shippingAddress.postcode +"</td>";
        // trTableToshipExport += "<td>" + data.shippingAddress.phone +"</td>";
        // trTableToshipExport += "</tr>";
        // $(".tbBodyToShipExport").append(trTableToshipExport);
    }

</script>