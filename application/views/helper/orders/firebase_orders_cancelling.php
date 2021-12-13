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
           
            baseDoc.onSnapshot(function(snapshot) {
                $(".tbBodyCancel").html('');
                $(".tbBodyCancelExport").html('');

                snapshot.data().orderList.forEach(function(change) {
                    if (change.isActive == true && change.status == 'cancel') {
                        showOrdersCancel(change);
                        showOrdersCancelExport(change);
                    }
                });
            });     
            $( "#shippingSort6" ).on('change',function() {
                getOrdersShipByCancel( $(this).val());
            });
    }

    ////////////////////////// Get Orders by Date Range ///////////////////////////////////////
    function getOrdersDate(startDate, endDate) {
        let baseDoc = db.collection("orders").doc(userId);
            $(".tbBodyCancel").html('');
            $(".tbBodyCancelExport").html('');
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
                        showOrdersCancel(change);
                        showOrdersCancelExport(change);
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

    function getOrdersShipByCancel(shippingSort){
    
        let baseDoc = db.collection("orders").doc(userId);
        //All shipping
        if(shippingSort == 'allShipping'){
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyCancel").html('');
                    $(".tbBodyCancelExport").html('');
                }else{
                    $(".tbBodyCancel").html('');  
                    $(".tbBodyCancelExport").html('');           
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == 'cancel' ){
                            showOrdersCancel(change);
                            showOrdersCancelExport(change);
                        }                
                    });
                }
            });
        }else{
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyCancel").html('');
                    $(".tbBodyCancelExport").html('');
                }else{
                    $(".tbBodyCancel").html(''); 
                    $(".tbBodyCancelExport").html('');            
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.shipping == shippingSort && change.status == 'cancel'){
                            showOrdersCancel(change);
                            showOrdersCancelExport(change);
                        }
                    });
                }
            });
        }
    }

    ///////////////////////////////////////Searching Start/////////////////////////////////// 
    $(document).ready(function () {
        "use strict"; 
        // chat search filter
        $("#chat-search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            if (value != "") {
                $(".tbBodyCancel tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
                $(".tbBodyCancelExport tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            } else {
                // if search filter box is empty
                $(".tbBodyCancel tr").show();
                $(".tbBodyCancelExport tr").show();
            }
        });
    });
    ////////////////////////////Searching End//////////////////////////////////////////// 

    function showOrderData(e){
        var key = e.getAttribute('data-key');
        //change to hex key
        window.location.href = contentUrl + 'OrderDetial/' + toHex(key);
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

    function showOrdersCancel(data){
        let key = data.orderNo;
        let date = convertDate2(data.insertDate.seconds);
        let trTable = "<tr>";
        trTable += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + data.orderNo + '</a></td>';
        trTable += "<td>"+ data.total +"</td>";
        trTable += "<td >"+ data.shipping + "#" + data.tracking +"</td>";
        trTable += "<td>"+ data.status +"</td>";
        trTable += "<td>" + date +"</td>";
        trTable += "</tr>";
        $(".tbBodyCancel").append(trTable);
    }

    function showOrdersCancelExport(data){
        let key = data.orderNo;
        let date = convertTHDate(data.insertDate.seconds,'numeric','short','numeric');
        data.orderItem.forEach(function (detail) {
            let trTableCancelExport = "<tr>";
            trTableCancelExport += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + key + '</a></td>';
            trTableCancelExport += "<td>"+ parseFloat(detail.total) +"</td>";
            trTableCancelExport += "<td>"+ data.status +"</td>";
            trTableCancelExport += "<td>" + date +"</td>";
            trTableCancelExport += "<td>" + data.shippingAddress.name +"</td>";
            ////////////// Add on datas /////////// 
            trTableCancelExport += "<td>" + detail.productName +"</td>";
            trTableCancelExport += "<td>" + detail.pricePerUnit +"</td>";
            trTableCancelExport += "<td>" + detail.qty +"</td>";
            trTableCancelExport += "<td>" + parseFloat(detail.total) +"</td>";       
            trTableCancelExport += "<td>" + data.shipping +"</td>";
            trTableCancelExport += "<td>" + data.tracking +"</td>";
            trTableCancelExport += "<td>" + data.shippingAddress.address +"</td>";
            trTableCancelExport += "<td>" + data.shippingAddress.postcode +"</td>";
            trTableCancelExport += "<td>" + data.shippingAddress.phone +"</td>";
            trTableCancelExport += "</tr>";
            $(".tbBodyCancelExport").append(trTableCancelExport); 
        })

        // let key = data.orderNo;
        // let date = convertDate2(data.insertDate.seconds);
        // let trTableCancelExport = "<tr>";
        // trTableCancelExport += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + data.orderNo + '</a></td>';
        // trTableCancelExport += "<td>"+ data.total +"</td>";
        // trTableCancelExport += "<td>"+ data.status +"</td>";
        // trTableCancelExport += "<td>" + date +"</td>";
        // trTableCancelExport += "<td>" + data.shippingAddress.name +"</td>";
        // ////////////// Add on datas /////////// 
        // data.orderItem.forEach(function (detail) {
        //     var priceSum = 0;
        //     console.log('orderList export: ',detail);
        //     priceSum += parseFloat(detail.total);
        //     trTableCancelExport += "<td>" + detail.productName +"</td>";
        //     trTableCancelExport += "<td>" + detail.pricePerUnit +"</td>";
        //     trTableCancelExport += "<td>" + detail.qty +"</td>";
        //     trTableCancelExport += "<td>" + priceSum +"</td>";
        // })

        // trTableCancelExport += "<td>" + data.shipping +"</td>";
        // trTableCancelExport += "<td>" + data.tracking +"</td>";
        // trTableCancelExport += "<td>" + data.shippingAddress.address +"</td>";
        // trTableCancelExport += "<td>" + data.shippingAddress.postcode +"</td>";
        // trTableCancelExport += "<td>" + data.shippingAddress.phone +"</td>";
        // trTableCancelExport += "</tr>";
        // $(".tbBodyCancelExport").append(trTableCancelExport);
    }
</script>