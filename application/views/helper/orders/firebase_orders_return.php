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
                getOrdersDate(startDate, endDate); 
        });

    }
    ////////////////////////// Get Orders by Date Range ///////////////////////////////////////
    function getOrdersDate(startDate, endDate) {
        let baseDoc = db.collection("orders").doc(userId);
            $(".tbBodyReturn").html('');
            $(".tbBodyReturnExport").html('');
            let sDate = new Date(startDate._d);
            let eDate = new Date(endDate._d);

            var StartDate = $.datepicker.formatDate('yy-mm-dd', sDate);
            var EndDate = $.datepicker.formatDate('yy-mm-dd', eDate);

           // console.log('Show Date', StartDate, ' & ', EndDate);
        baseDoc.get().then(function (snapshot) {
            baseDoc.onSnapshot(function(snapshot) {
                snapshot.data().orderList.forEach(function(change) {    
                    let insertDate = $.datepicker.formatDate('yy-mm-dd', new Date(change.insertDate.seconds * 1000));
                    if (change.isActive == true && insertDate >= StartDate && insertDate <= EndDate ){
                        showOrdersRefund(change);
                        showOrdersRefundExport(change);
                    }
                    // console.log('Show dwerw3erssssata', convertDate2(change.insertDate.seconds));
                    // console.log('Show date: ', change.insertDate);
                    let iDate_ = new Date( convertDate2(change.insertDate.seconds));
                    let iDate2_ = iDate_.getTime();
                    // console.log('Show Date', iDate2_, ' & ', EndDate);
                });      
            })  
        })
               
    } 
////////////////////////// Get Orders by Date Range END ///////////////////////////////////////

    function getOrders(){
            let baseDoc = db.collection("orders").doc(userId);
            let getValue = <?php echo json_encode($get_value) ?>;
            if(getValue == 'returnAllorders2-tab') {
                baseDoc.onSnapshot(function(snapshot) {
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html('');
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == 'refund' ){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }
                    });
                });
            }else if(getValue == 'returnNotprocess2-tab'){
                baseDoc.onSnapshot(function(snapshot) {
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html('');
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == 'refund' && change.processing == "not processed"){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }
                    });
                });
            }else if(getValue == 'returnProcessed2-tab'){
                baseDoc.onSnapshot(function(snapshot) {
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html('');
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true  && change.status == 'refund' && change.processing == "processing"){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }
                    });
                });
            }
///////////// Shipping Sort ID Lists ////////////////////////////////////         
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


///////////////////Starting of status validiation //////////////////////////
               
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
        $( "#searchBtn-7" ).on('change',function() {
            getOrdersBySearching( $(this).val());
        });
///////////////////Ending of search validiation ////////////////////////////

    }


    // Sort by Shipping
    function getOrdersByShipping(shippingSort){
 
            let baseDoc = db.collection("orders");
            //All shipping
            if(shippingSort == 'allShipping'){
                baseDoc.onSnapshot(function(snapshot) {
                    if(snapshot.data().orderList.length == 0){
                        $(".tbBodyReturn").html('');
                        $(".tbBodyReturnExport").html('');
                    }else{
                        $(".tbBodyReturn").html('');   
                        $(".tbBodyReturnExport").html('');          
                        snapshot.data().orderList.forEach(function(change) {
                            if (change.isActive == true ){
                                showOrdersRefund(change);
                                showOrdersRefundExport(change);
                            }                
                        });
                    }
                });
            }else{
                baseDoc.onSnapshot(function(snapshot) {
                    if(snapshot.data().orderList.length == 0){
                        $(".tbBodyReturn").html('');
                        $(".tbBodyReturnExport").html('');
                    }else{
                        $(".tbBodyReturn").html(''); 
                        $(".tbBodyReturnExport").html('');            
                        snapshot.data().orderList.forEach(function(change) {
                            if (change.isActive == true && change.shipping == shippingSort){
                                showOrdersRefund(change);
                                showOrdersRefundExport(change);
                            }
                        });
                    }
                });
            }
    }
    var shippingStatus;

   // Shipping Status 
    function getOrdersByShippingStatus(shippingStatus) {
        $(".tbBodyReturn").html('');
        let baseDoc = db.collection("orders").doc(userId);

        if(shippingStatus == 'returnAllorders2-tab') {
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html('');
                }else{
                    $(".tbBodyReturn").html('');   
                    $(".tbBodyReturnExport").html('');          
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == 'refund'){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }                
                    });
                }
            });
        }else if(shippingStatus == 'returnNotprocess2-tab'){
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html('');
                }else{
                    $(".tbBodyReturn").html(''); 
                    $(".tbBodyReturnExport").html('');            
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == 'refund' && change.processing == "not processed"){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }                
                    });
                }
            });
        }else if(shippingStatus == 'returnProcessed2-tab'){
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html('');
                }else{
                    $(".tbBodyReturn").html(''); 
                    $(".tbBodyReturnExport").html('');            
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == 'refund' && change.processing == "processing"){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }                
                    });
                }
            });
        }
  
    }


    function getOrdersByShippingStatusSort(shippingStatusSort){
        let baseDoc = db.collection("orders").doc(userId);

        if(shippingStatusSort == 'allShippingNotprocess'){   //All shipping Not Processed
            // alert(2);
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html('');  
                }else{
                    $(".tbBodyReturn").html('');    
                    $(".tbBodyReturnExport").html('');           
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "refund" && change.processing == "not processed"){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }                
                    });
                }
            });
        }else if(shippingStatusSort == 'Thailand Post Notprocess'){  //Thailand Post Not Processed
            // alert(3);
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html(''); 
                }else{
                    $(".tbBodyReturn").html(''); 
                    $(".tbBodyReturnExport").html('');             
                    snapshot.data().orderList.forEach(function(change) {
                        if(change.isActive == true && change.status == "refund" && change.processing == "not processed" && change.shipping == "Thailand Post"){     
                            showOrdersRefund(change);  
                            showOrdersRefundExport(change);
                        }           
                    });
                }
            });
        }else if(shippingStatusSort == 'SCG Express Notprocess'){  //SCG Express Not Processed
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html(''); 
                }else{
                    $(".tbBodyReturn").html('');   
                    $(".tbBodyReturnExport").html('');          
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "refund" && change.processing == "not processed" && change.shipping == "SCG Express"){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }                
                    });
                }
            });
        }else if(shippingStatusSort == 'Inter Express Notprocessed'){  //Inter Express Processed
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html(''); 
                }else{
                    $(".tbBodyReturn").html('');    
                    $(".tbBodyReturnExport").html('');          
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "refund" && change.processing == "not processed" && change.shipping == "Inter Express"){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }                
                    });
                }
            });
        }
        else if(shippingStatusSort == 'allShippingProcessed'){  //All shipping Processed
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html('');
                }else{
                    $(".tbBodyReturn").html('');  
                    $(".tbBodyReturnExport").html('');           
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "refund" && change.processing == "processing"){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }                
                    });
                }
            });
        }else if(shippingStatusSort == 'Thailand Post Processed'){  //Thailand Post Processed
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html('');
                }else{
                    $(".tbBodyReturn").html('');      
                    $(".tbBodyReturnExport").html('');       
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "refund" && change.processing == "processing" && change.shipping == "Thailand Post"){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }                
                    });
                }
            });
        }else if(shippingStatusSort == 'SCG Express Processed'){  //SCG Express Processed
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html('');    
                }else{
                    $(".tbBodyReturn").html('');   
                    $(".tbBodyReturnExport").html('');              
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "refund" && change.processing == "processing" && change.shipping == "SCG Express"){
                            showOrdersRefund(change);  
                            showOrdersRefundExport(change);    
                        }                
                    });
                }
            });
        } 
        else if(shippingStatusSort == 'Inter Express Processed'){  //Inter Express Processed
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html('');    
                }else{
                    $(".tbBodyReturn").html('');  
                    $(".tbBodyReturnExport").html('');               
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "refund" && change.processing == "processing" && change.shipping == "Inter Express"){
                            showOrdersRefund(change); 
                            showOrdersRefundExport(change);
                        }                
                    });
                }
            });
        }
    
        // All shipping
        else if(shippingStatusSort == 'allShipping'){  
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html(''); 
                }else{
                    $(".tbBodyReturn").html('');       
                    $(".tbBodyReturnExport").html('');       
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == "refund"){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }                
                    });
                }
            });
        }
        else if(shippingStatusSort != 'allShipping'){
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyReturn").html('');
                    $(".tbBodyReturnExport").html(''); 
                }else{
                    $(".tbBodyReturn").html('');       
                    $(".tbBodyReturnExport").html('');       
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.shipping == shippingStatusSort && change.status == "refund"){
                            showOrdersRefund(change);
                            showOrdersRefundExport(change);
                        }
                    });
                }
            });
        }
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
                $('.tab-orders').removeClass('active');
                $('#return-main').addClass('active');  
                getOrdersByShippingStatus('returnAllorders2-tab');
                break;
            case 'returnNotprocess2-tab':
                $('#returnNotprocess2-tab').addClass('active');
                $('#returnlist').addClass('active');
                $('#returnNotprocess2').addClass('active');
                $('#returnlist-tab').addClass('active');
                $('.tab-orders').removeClass('active');
                $('#return-main').addClass('active');  
                getOrdersByShippingStatus('returnNotprocess2-tab');
                break;
            case 'returnProcessed2-tab':
                $('#returnProcessed2-tab').addClass('active');
                $('#returnlist').addClass('active');
                $('#returnProcessed2').addClass('active');
                $('#returnlist-tab').addClass('active');
                $('.tab-orders').removeClass('active');
                $('#return-main').addClass('active');  
                getOrdersByShippingStatus('returnProcessed2-tab');
                break;
            //To Return Tab End

            default:
                
                // if (lastSegment == 'allorders-tab') {
                //     $('#' + lastSegment).addClass('active');
                //     let openDiv = $('#' + lastSegment).attr('aria-controls');
                //     $('#' + openDiv).addClass('active');
                // }

                // $('#' + lastSegment).addClass('active');
                // let openDiv = $('#' + lastSegment).attr('aria-controls');
                // $('#' + openDiv).addClass('active');
                // openDiv.addClass('active');
                break;
        }
    }

    ///////////////////////////////////////Searching Start/////////////////////////////////// 
    $(document).ready(function () {
        "use strict"; 
        // chat search filter
        $("#chat-search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            if (value != "") {
                $(".tbBodyReturn tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
                $(".tbBodyReturnExport tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            } else {
                // if search filter box is empty
                $(".tbBodyReturn tr").show();
                $(".tbBodyReturnExport tr").show(''); 
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
    function showOrdersRefund(data){
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
        $(".tbBodyReturn").append(trTable);
    }

        // For status filter
    function showOrdersRefundExport(data){
        let key = data.orderNo;
        let date = convertTHDate(data.insertDate.seconds,'numeric','short','numeric');
        data.orderItem.forEach(function (detail) {
            let trTableReturnExport = "<tr>";
            trTableReturnExport += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + key + '</a></td>';
            trTableReturnExport += "<td>"+ parseFloat(detail.total) +"</td>";
            trTableReturnExport += "<td>"+ data.status +"</td>";
            trTableReturnExport += "<td>" + date +"</td>";
            trTableReturnExport += "<td>" + data.shippingAddress.name +"</td>";
            ////////////// Add on datas /////////// 
            trTableReturnExport += "<td>" + detail.productName +"</td>";
            trTableReturnExport += "<td>" + detail.pricePerUnit +"</td>";
            trTableReturnExport += "<td>" + detail.qty +"</td>";
            trTableReturnExport += "<td>" + parseFloat(detail.total) +"</td>";       
            trTableReturnExport += "<td>" + data.shipping +"</td>";
            trTableReturnExport += "<td>" + data.tracking +"</td>";
            trTableReturnExport += "<td>" + data.shippingAddress.address +"</td>";
            trTableReturnExport += "<td>" + data.shippingAddress.postcode +"</td>";
            trTableReturnExport += "<td>" + data.shippingAddress.phone +"</td>";
            trTableReturnExport += "</tr>";
            $(".tbBodyReturnExport").append(trTableReturnExport); 
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
        // $(".tbBodyReturnExport").append(trTableToshipExport);
    }

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
</script>