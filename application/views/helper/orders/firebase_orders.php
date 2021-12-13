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
        getOrders();

        getUrlChange();
    }
    function getOrders(){
        $(".tbBody").html('');

            let baseDoc = db.collection("orders");
            baseDoc = baseDoc.where("sellerId", "==", userId);
       
            //Sort by
            baseDoc = baseDoc.limit(12);
            baseDoc.onSnapshot(function(snapshot) {
                snapshot.docChanges().forEach(function(change) {
                    showOrders(change.doc);
                });
            });  

///////////// Shipping Sort ID Lists ////////////////////////////////////         
        $( "#shippingSort1" ).on('change',function() {
            getOrdersByShipping( $(this).val());
        }); 
        $( "#shippingSort2" ).on('change',function() {
            getOrdersByShipping( $(this).val());
        }); 
        $( "#shippingSort3_1" ).on('change',function() {
            getOrdersByShippingStatusSort( $(this).val());
        }); 
        $( "#shippingSort3_2" ).on('change',function() {
            getOrdersByShippingStatusSort( $(this).val());
        }); 
        $( "#shippingSort3_3" ).on('change',function() {
            getOrdersByShippingStatusSort( $(this).val());
        }); 
        $( "#shippingSort4" ).on('change',function() {
            getOrdersByShipping( $(this).val());
        }); 
        $( "#shippingSort5" ).on('change',function() {
            getOrdersByShipping( $(this).val());
        }); 
        $( "#shippingSort6" ).on('change',function() {
            getOrdersByShipping( $(this).val());
        }); 
        $( "#shippingSort7_1" ).on('change',function() {
            getOrdersByShippingStatusSort( $(this).val());
        });    
        $( "#shippingSort7_2" ).on('change',function() {
            getOrdersByShippingStatusSort( $(this).val());
        });    
        $( "#shippingSort7_3" ).on('change',function() {
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
        
        ////////////////Return List//////////////////////////
        $( "#returnAllorders2-tab" ).on('change',function() {
            getOrdersByShippingStatus( $(this).val());
        }); 
        $( "#returnNotprocess2-tab" ).on('change',function() {
            getOrdersByShippingStatus( $(this).val());
        }); 
        $( "#returnProcessed2-tab" ).on('change',function() {
            getOrdersByShippingStatus( $(this).val());
        });
///////////////////Ending of status validiation ////////////////////////////

///////////////////Starting of search validiation ////////////////////////////
        $( "#searchBtn-1" ).on('change',function() {
            getOrdersBySearching( $(this).val());
        });
        $( "#searchBtn-2" ).on('change',function() {
            getOrdersBySearching( $(this).val());
        });
        $( "#searchBtn-3" ).on('change',function() {
            getOrdersBySearching( $(this).val());
        });
        $( "#searchBtn-4" ).on('change',function() {
            getOrdersBySearching( $(this).val());
        });
        $( "#searchBtn-5" ).on('change',function() {
            getOrdersBySearching( $(this).val());
        });
        $( "#searchBtn-6" ).on('change',function() {
            getOrdersBySearching( $(this).val());
        });
        $( "#searchBtn-7" ).on('change',function() {
            getOrdersBySearching( $(this).val());
        });
///////////////////Ending of search validiation ////////////////////////////

    }

    // For normal orders
    function showOrders(data){
        console.log(data.data().orderNo);
        let trTable = "<tr>";
        trTable += '<td><a onclick="showOrderData(this)" data-key="'+ data.id +'">' + data.data().orderNo + '</a></td>';
        trTable += "<td>"+ data.data().subTotal +"</td>";
        trTable += "<td>"+ data.data().status +"</td>";
        trTable += "<td >"+ data.data().shipping + "#" + data.data().tracking +"</td>";
        trTable += "<td>"+ data.data().status +"</td>";
        trTable += "</tr>";
        $(".tbBody").append(trTable);
    }

    // For status filter
    function showOrdersStatus(data){
        let trTable = "<tr>";
        trTable += '<td><a onclick="showOrderData(this)" data-key="' + data.id +'">' + data.data().orderNo + '</a></td>';
        trTable += "<td>" + data.data().subTotal +"</td>";
        trTable += "<td>" + data.data().status +"</td>";
        trTable += "<td >" + data.data().shipping + "#" + data.data().tracking +"</td>";
        trTable += "<td>" + data.data().status +"</td>";
        trTable += "</tr>";
        $(".tbBodyReturn").append(trTable);
    }

    // For date filter
    function showOrdersByDate(data) {
        let trTable = "<tr>";
        trTable += '<td><a onclick="showOrderData(this)" data-key="' + data.id +'">' + data.data().orderNo + '</a></td>';
        trTable += "<td>" + data.data().subTotal +"</td>";
        trTable += "<td>" + data.data().status +"</td>";
        trTable += "<td >" + data.data().shipping + "#" + data.data().tracking +"</td>";
        trTable += "<td>" + data.data().status +"</td>";
        trTable += "</tr>";
        $(".tbBodyDate").append(trTable);
    }


    // Sort by Shipping
    function getOrdersByShipping(shippingSort){
 
            let baseDoc = db.collection("orders");
            //All shipping
            if(shippingSort == 'allShipping'){
                baseDoc = baseDoc.where("sellerId", "==", userId);
            }else{
                baseDoc = baseDoc.where("sellerId", "==", userId);
                baseDoc = baseDoc.where("shipping", "==", shippingSort);
                console.log("Shipping company", shippingSort);
            }
           
            //Sort by
            baseDoc = baseDoc.limit(12);
            baseDoc.onSnapshot(function(snapshot) {

                if(snapshot.docChanges().length == 0){
                    $(".tbBody").html('');
                    $(".tbBodyReturn").html('');
                }else{
                    $(".tbBody").html('');
                    $(".tbBodyReturn").html('');
                    snapshot.docChanges().forEach(function(change) {
                        showOrders(change.doc);
                        showOrdersStatus(change.doc);
                    });
                }
            });
    }

    var shippingStatus;

   // Shipping Status 
    function getOrdersByShippingStatus(shippingStatus) {
        $(".tbBodyReturn").html('');
        let baseDoc = db.collection("orders");

        if (shippingStatus == 'toShipOrders-tab') {
            baseDoc = baseDoc.where("sellerId", "==", userId)
        }else if(shippingStatus == 'toShipNotprocess-tab') {
            baseDoc = baseDoc.where("sellerId", "==", userId);
            baseDoc = baseDoc.where("status", "==", "Not processed")
        }else if(shippingStatus == 'toShipProcessed-tab') {
            baseDoc = baseDoc.where("sellerId", "==", userId);
            baseDoc = baseDoc.where("status", "==", "Processed")
        }else if(shippingStatus == 'returnAllorders2-tab') {
            baseDoc = baseDoc.where("sellerId", "==", userId);
        }else if(shippingStatus == 'returnNotprocess2-tab'){
            baseDoc = baseDoc.where("sellerId", "==", userId);
            baseDoc = baseDoc.where("status", "==", 'Not processed');
        }else if(shippingStatus == 'returnProcessed2-tab'){
            baseDoc = baseDoc.where("sellerId", "==", userId);
            baseDoc = baseDoc.where("status", "==", 'Processed');
        }

            //Sort by
            baseDoc = baseDoc.limit(12);
            baseDoc.onSnapshot(function(snapshot) {
               
                if(snapshot.docChanges().length == 0){
                    $(".tbBodyReturn").html('');
                }else{
                    $(".tbBodyReturn").html('');
                    snapshot.docChanges().forEach(function(change) {
                        showOrdersStatus(change.doc);
                        console.log(change.doc.data());
                 });
                }
            });      
    }


    function getOrdersByShippingStatusSort(shippingStatusSort){
        let baseDoc = db.collection("orders");
        //All shipping
        if(shippingStatusSort == 'allShipping'){
            baseDoc = baseDoc.where("sellerId", "==", userId);
        }else if(shippingStatusSort == 'allShippingNotprocess'){   //All shipping Not Processed
            baseDoc = baseDoc.where("sellerId", "==", userId);
            baseDoc = baseDoc.where("status", "==", 'Not processed');

        }else if(shippingStatusSort == 'Thailand Post Notprocess'){  //Thailand Post Not Processed
            baseDoc = baseDoc.where("sellerId", "==", userId);
            baseDoc = baseDoc.where("shipping", "==", 'Thailand Post');
            baseDoc = baseDoc.where("status", "==", 'Not processed');
        }else if(shippingStatusSort == 'SCG Express Notprocess'){  //SCG Express Not Processed
            baseDoc = baseDoc.where("sellerId", "==", userId);
            baseDoc = baseDoc.where("shipping", "==", 'SCG Express');
            baseDoc = baseDoc.where("status", "==", 'Not processed');
        }else if(shippingStatusSort == 'allShippingProcessed'){  //All shipping Processed
            baseDoc = baseDoc.where("sellerId", "==", userId);
            baseDoc = baseDoc.where("status", "==", 'Processed');
        }else if(shippingStatusSort == 'Thailand Post Processed'){  //Thailand Post Processed
            baseDoc = baseDoc.where("sellerId", "==", userId);
            baseDoc = baseDoc.where("shipping", "==", 'Thailand Post');
            baseDoc = baseDoc.where("status", "==", 'Processed');
        }else if(shippingStatusSort == 'SCG Express Processed'){  //SCG Express Processed
            baseDoc = baseDoc.where("sellerId", "==", userId);
            baseDoc = baseDoc.where("shipping", "==", 'SCG Express');
            baseDoc = baseDoc.where("status", "==", 'Processed');
        }
        else{
            baseDoc = baseDoc.where("sellerId", "==", userId);
            baseDoc = baseDoc.where("shipping", "==", shippingStatusSort);
            console.log("Shipping company", shippingStatusSort);
        }

        //Sort by
        baseDoc = baseDoc.limit(12);
        baseDoc.onSnapshot(function(snapshot) {

            if(snapshot.docChanges().length == 0){
                $(".tbBodyReturn").html('');
            }else{
                $(".tbBodyReturn").html('');
                snapshot.docChanges().forEach(function(change) {
                    showOrdersStatus(change.doc);
                    console.log(change.doc.data());
                });
            }
        });
        }


// *************************************************************************

    function showOrderData(e){
        var key = e.getAttribute('data-key');
        //change to hex key
        window.location.href = contentUrl + 'OrderDetial/' + toHex(key);
    }

    var tabId;
    var tabId2;
    
    function changeUrl(tabId){
            window.history.pushState("object or string", "Title", contentUrl + "ManageOrders/" + tabId);
            console.log(tabId);
            getUrlChange();
    }

    function getUrlChange(){
        let url = window.location.href;     // Returns full URL (https://example.com/path/example.html)
        let lastSegment = url.substring(url.lastIndexOf('/') + 1);
        let lastSegment2 = url.substring(url.lastIndexOf('/' + 1));
        $('.tab-orders').removeClass('active');
        $('.tab-pane').removeClass('active');
        console.log('LAST ',lastSegment2);
        
        if (lastSegment == null && lastSegment2 == null) {
            lastSegment = 'allorders-tab';
            lastSegment2 = 'toShipOrders-tab';
        }
        switch (lastSegment) {       
            case 'allorders-tab':
                $('#allorders-tab').addClass('active');
                $('#allorders').addClass('active');
                break;
            case 'unpaid-tab':
                $('#unpaid-tab').addClass('active');
                $('#unpaid').addClass('active');
                // $('#unpaid-tab').trigger('click');
                break;

            ///////////////////////To Ship Tab/////////////////////////////
            case 'toship-tab':
                $('#toShipOrders-tab').addClass('active');
                $('#toShipOrders').addClass('active');
                $('#toship-tab').addClass('active');
                $('#toship').addClass('active');
                break;
            case 'toShipOrders-tab':
                $('#toShipOrders-tab').addClass('active');
                $('#toShipOrders').addClass('active');
                $('#toship-tab').addClass('active');
                $('#toship').addClass('active');  
                getOrdersByShippingStatus('toShipOrders-tab');
                break;
            case 'toShipNotprocess-tab':
                $('#toShipNotprocess-tab').addClass('active');
                $('#toShipNotprocess').addClass('active');
                $('#toship-tab').addClass('active');
                $('#toship').addClass('active');
                getOrdersByShippingStatus('toShipNotprocess-tab');
                break;
            case 'toShipProcessed-tab':
                $('#toShipProcessed-tab').addClass('active');
                $('#toShipProcessed').addClass('active');
                $('#toship-tab').addClass('active');
                $('#toship').addClass('active');
                getOrdersByShippingStatus('toShipProcessed-tab');   
                break;    
            ////////////////////////To Ship Tab End/////////////////////////////

            case 'shipping-tab':
                $('#shipping-tab').addClass('active');
                $('#shipping').addClass('active');
                // $('#unpaid-tab').trigger('click');
                break;

            case 'completed-tab':
                $('#completed-tab').addClass('active');
                $('#completed').addClass('active');
                // $('#unpaid-tab').trigger('click');
                break;

            case 'cancelled-tab':
                $('#cancelled-tab').addClass('active');
                $('#cancelled').addClass('active');
                // $('#unpaid-tab').trigger('click');
                break;

            //To Return Tab
            case 'returnlist-tab':
                $('#returnlist-tab').addClass('active');
                $('#returnlist').addClass('active');
                $('#returnAllorders2-tab').addClass('active');
                $('#returnAllorders2').addClass('active');
                break;
            case 'returnAllorders2-tab':
                $('#returnAllorders2-tab').addClass('active');
                $('#returnlist').addClass('active');
                $('#returnAllorders2').addClass('active');
                $('#returnlist-tab').addClass('active');
                getOrdersByShippingStatus('returnAllorders2-tab');
                break;
            case 'returnNotprocess2-tab':
                $('#returnNotprocess2-tab').addClass('active');
                $('#returnlist').addClass('active');
                $('#returnNotprocess2').addClass('active');
                $('#returnlist-tab').addClass('active');
                getOrdersByShippingStatus('returnNotprocess2-tab');
                break;
            case 'returnProcessed2-tab':
                $('#returnProcessed2-tab').addClass('active');
                $('#returnlist').addClass('active');
                $('#returnProcessed2').addClass('active');
                $('#returnlist-tab').addClass('active');
                getOrdersByShippingStatus('returnProcessed2-tab');
                break;
            //To Return Tab End

            default:
            
                break;
        }
    }

    function ordersDateFilter(date){   
            let baseDoc = db.collection("orders");

            if(date == 'orderDateO2N_1'){  //All tab
                // alert('Orders old to new 1');
                console.log('Filter type 1', date);
                baseDoc = baseDoc.where("sellerId", "==", userId);
                baseDoc = baseDoc.orderBy("insertDate", "desc" );

            }else if(date == 'orderDateN2O_1'){  //All tab
                // alert('Orders old to new 2');
                console.log('Filter type 1-2', date);
                baseDoc = baseDoc.where("sellerId", "==", userId);
                baseDoc = baseDoc.orderBy("insertDate", "asc");

            }else if(date == 'orderDateO2N_2'){  //Not Processed
                // alert(5);
                console.log('Filter type 2', date);
                baseDoc = baseDoc.where("sellerId", "==", userId);
                baseDoc = baseDoc.where("status", "==", 'Not processed');
                baseDoc = baseDoc.orderBy("insertDate", "desc");
            

            }else if(date == 'orderDateN2O_2'){  //Not Processed
                // alert(6);
                console.log('Filter type 2-1', date);
                baseDoc = baseDoc.where("sellerId", "==", userId);
                baseDoc = baseDoc.where("status", "==", 'Not processed');
                baseDoc = baseDoc.orderBy("insertDate", "asc");
              

            }else if(date == 'orderDateO2N_3'){  //Processed
                console.log('Filter type 3', date);
                baseDoc = baseDoc.where("sellerId", "==", userId);
                baseDoc = baseDoc.where("status", "==", 'Processed');
                baseDoc = baseDoc.orderBy("insertDate", "desc");
              
            }else if(date == 'orderDateN2O_3'){  //Processed
                console.log("Filter type 3-1", date);
                baseDoc = baseDoc.where("sellerId", "==", userId);
                baseDoc = baseDoc.where("status", "==", 'Processed');
                baseDoc = baseDoc.orderBy("insertDate", "asc");
                
            }else{
                baseDoc = baseDoc.where("sellerId", "==", userId);
            }
      
            //Sort by
            baseDoc = baseDoc.limit(12);
            $(".tbBodyReturn").html('');
            baseDoc.onSnapshot(function(snapshot) {
               
                if(snapshot.docChanges().length == 0){
                    $(".tbBodyReturn").html('');
                }else{
                    snapshot.docChanges().forEach(function(change) {
                    showOrdersStatus(change.doc);
                 });
                }
            });     
            }
</script>