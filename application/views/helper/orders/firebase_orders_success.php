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
            $(".tbBodySuccess").html('');
            $(".tbBodySuccessExport").html('');
            baseDoc.onSnapshot(function(snapshot) {
                snapshot.data().orderList.forEach(function(change) {
                    if (change.isActive == true && change.status == 'success'){
                        showOrdersSuccess(change);
                        showOrdersSuccessExport(change);
                    }
                });
            });     
            $( "#shippingSort5" ).on('change',function() {
                getOrdersShipBySuccess( $(this).val());
            });
    }

    ////////////////////////// Get Orders by Date Range ///////////////////////////////////////
    function getOrdersDate(startDate, endDate) {
        let baseDoc = db.collection("orders").doc(userId);
            $(".tbBodyAll").html('');
            $(".tbBodySuccessExport").html('');
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
                        showOrdersSuccess(change);
                        showOrdersSuccessExport(change);
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

   ////////////////Shipping sort//////////////
    function getOrdersShipBySuccess(shippingSort){
    
        let baseDoc = db.collection("orders").doc(userId);
        //All shipping
        if(shippingSort == 'allShipping'){
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodySuccess").html('');
                    $(".tbBodySuccessExport").html('');
                }else{
                    $(".tbBodySuccess").html('');   
                    $(".tbBodySuccessExport").html('');          
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.status == 'success'){
                            showOrdersSuccess(change);
                            showOrdersSuccessExport(change);
                        }                
                    });
                }
            });
        }else{
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodySuccess").html('');
                    $(".tbBodySuccessExport").html('');
                }else{
                    $(".tbBodySuccess").html('');   
                    $(".tbBodySuccessExport").html('');          
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.shipping == shippingSort && change.status == 'success'){
                            showOrdersSuccess(change);
                            showOrdersSuccessExport(change);
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
                $(".tbBodySuccess tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
                $(".tbBodySuccessExport tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            } else {
                // if search filter box is empty
                $(".tbBodySuccess tr").show();
                $(".tbBodySuccessExport tr").show();
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

    function showOrdersSuccess(data){
        let key = data.orderNo;
        let date = convertDate2(data.insertDate.seconds);
        let trTable = "<tr>";
        trTable += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + data.orderNo + '</a></td>';
        trTable += "<td>"+ data.total +"</td>";
        trTable += "<td >"+ data.shipping + "#" + data.tracking +"</td>";
        trTable += "<td>"+ data.status +"</td>";
        trTable += "<td>" + date +"</td>";
        trTable += "</tr>";
        $(".tbBodySuccess").append(trTable);
    }

    function showOrdersSuccessExport(data){
        let key = data.orderNo;
        let date = convertTHDate(data.insertDate.seconds,'numeric','short','numeric');
        data.orderItem.forEach(function (detail) {
            let trTableSuccessExport = "<tr>";
            trTableSuccessExport += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + key + '</a></td>';
            trTableSuccessExport += "<td>"+ parseFloat(detail.total) +"</td>";
            trTableSuccessExport += "<td>"+ data.status +"</td>";
            trTableSuccessExport += "<td>" + date +"</td>";
            trTableSuccessExport += "<td>" + data.shippingAddress.name +"</td>";
            ////////////// Add on datas /////////// 
            trTableSuccessExport += "<td>" + detail.productName +"</td>";
            trTableSuccessExport += "<td>" + detail.pricePerUnit +"</td>";
            trTableSuccessExport += "<td>" + detail.qty +"</td>";
            trTableSuccessExport += "<td>" + parseFloat(detail.total) +"</td>";       
            trTableSuccessExport += "<td>" + data.shipping +"</td>";
            trTableSuccessExport += "<td>" + data.tracking +"</td>";
            trTableSuccessExport += "<td>" + data.shippingAddress.address +"</td>";
            trTableSuccessExport += "<td>" + data.shippingAddress.postcode +"</td>";
            trTableSuccessExport += "<td>" + data.shippingAddress.phone +"</td>";
            trTableSuccessExport += "</tr>";
            $(".tbBodySuccessExport").append(trTableSuccessExport); 
        })
        // let key = data.orderNo;
        // let date = convertDate2(data.insertDate.seconds);
        // let trTableSuccessExport = "<tr>";
        // trTableSuccessExport += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + data.orderNo + '</a></td>';
        // trTableSuccessExport += "<td>"+ data.total +"</td>";
        // trTableSuccessExport += "<td>"+ data.status +"</td>";
        // trTableSuccessExport += "<td>" + date +"</td>";
        // trTableSuccessExport += "<td>" + data.shippingAddress.name +"</td>";
        // ////////////// Add on datas /////////// 
        // data.orderItem.forEach(function (detail) {
        //     var priceSum = 0;
        //     console.log('orderList export: ',detail);
        //     priceSum += parseFloat(detail.total);
        //     trTableSuccessExport += "<td>" + detail.productName +"</td>";
        //     trTableSuccessExport += "<td>" + detail.pricePerUnit +"</td>";
        //     trTableSuccessExport += "<td>" + detail.qty +"</td>";
        //     trTableSuccessExport += "<td>" + priceSum +"</td>";
        // })

        // trTableSuccessExport += "<td>" + data.shipping +"</td>";
        // trTableSuccessExport += "<td>" + data.tracking +"</td>";
        // trTableSuccessExport += "<td>" + data.shippingAddress.address +"</td>";
        // trTableSuccessExport += "<td>" + data.shippingAddress.postcode +"</td>";
        // trTableSuccessExport += "<td>" + data.shippingAddress.phone +"</td>";

        // trTableSuccessExport += "</tr>";
        // $(".tbBodySuccessExport").append(trTableSuccessExport);
    }
</script>