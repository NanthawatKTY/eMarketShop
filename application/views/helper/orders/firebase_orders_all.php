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
            $(".tbBodyAll").html('');
            $(".tbBodyAllExport").html('');
            baseDoc.onSnapshot(function(snapshot) {
                snapshot.data().orderList.forEach(function(change) {
                    if (change.isActive == true){
                        showOrdersAll(change);
                        showOrdersAllExport(change);
                    }
                });
            });   
        
            $( "#shippingSort1" ).on('change',function() {
                getOrdersAllByShipping( $(this).val());
            }); 
    }

////////////////////////// Get Orders by Date Range ///////////////////////////////////////
    function getOrdersDate(startDate, endDate) {
        let baseDoc = db.collection("orders").doc(userId);
            $(".tbBodyAll").html('');
            $(".tbBodyAllExport").html('');
            let sDate = new Date(startDate._d);
            let eDate = new Date(endDate._d);
            var StartDate = $.datepicker.formatDate('yy-mm-dd', sDate);
            // var StartDate = sDate.getTime();
            var EndDate = $.datepicker.formatDate('yy-mm-dd', eDate);

            baseDoc.get().then(function (snapshot) {
                baseDoc.onSnapshot(function(snapshot) {
                    snapshot.data().orderList.forEach(function(change) {
                        let insertDate = $.datepicker.formatDate('yy-mm-dd', new Date(change.insertDate.seconds * 1000));
                        if (change.isActive == true && insertDate >= StartDate && insertDate <= EndDate ){
                            showOrdersAll(change);
                            showOrdersAllExport(change);
                        }
                    });      
                })  
            })
               
    } 
////////////////////////// Get Orders by Date Range END ///////////////////////////////////////


    ////////////////Shipping sort//////////////
    // Sort by Shipping
    function getOrdersAllByShipping(shippingSort){
    
        let baseDoc = db.collection("orders").doc(userId);
        //All shipping
        if(shippingSort == 'allShipping'){
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyAll").html('');
                    $(".tbBodyAllExport").html('');
                }else{
                    $(".tbBodyAll").html('');  
                    $(".tbBodyAllExport").html('');           
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true ){
                            showOrdersAll(change);
                            showOrdersAllExport(change);
                        }                
                    });
                }
            });
        }else{
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyAll").html('');
                    $(".tbBodyAllExport").html('');
                }else{
                    $(".tbBodyAll").html('');     
                    $(".tbBodyAllExport").html('');        
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.shipping == shippingSort){
                            showOrdersAll(change);
                            showOrdersAllExport(change);
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
                $(".tbBodyAll tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
                $(".tbBodyAllExport tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            } else {
                // if search filter box is empty
                $(".tbBodyAll tr").show();
                $(".tbBodyAllExport").show();
            }
        });
    });

////////////////////////////Searching End/////////////////////////////////////////// 

//////////////////////////// Date picker ////////////////////////////////////////
//   $(docDate).ready(function () {
// 		$("#datePickerRange").daterangepicker({
// 			opens: 'left';
// 		}, function(startDate, endDate, label) { 
//             var start_date = $('#start_date').val();
//            // var end_date = $('#end_date').val();
//             if(value != ""){
//                 if (startdate) {
                    
//                 }
//                 $(".tbBodyAll tr").filter(function(){
//                     $(this).toggle($(this).text().indexOf(start_date) > -1);
//                 });
//             } else {
//                  // if search filter box is empty
//                  $(".tbBodyAll tr").show();
//             }
// 			console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
// 		});
    
//     });
	

function datePicker(date) {
    console.log('Date how',date);
	var myDate  = date;
	myDate = myDate.split("-");
	// var newDate = new Date( myDate[1] - 1, myDate[2], myDate[0]);
	var newDate = new Date( myDate[2], myDate[1] - 1, myDate[0]);
  
	return newDate.getTime(); 
}

//////////////////////////// Date picker End//////////////////////////////////////// 

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
    
    function showOrdersAll(data){
        let key = data.orderNo;
        let date = convertDate2(data.insertDate.seconds);
        let trTable = "<tr>";
        trTable += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + data.orderNo + '</a></td>';
        trTable += "<td>"+ data.total +"</td>";
        trTable += "<td >"+ data.shipping + "#" + data.tracking +"</td>";
        trTable += "<td>"+ data.status +"</td>";
        trTable += "<td>" + date +"</td>";
        trTable += "</tr>";
        $(".tbBodyAll").append(trTable);     
    }

////////////////////// For export to excel ////////////////////////////////////
    function showOrdersAllExport(data){

        let key = data.orderNo;
        let date = convertTHDate(data.insertDate.seconds,'numeric','short','numeric');
        data.orderItem.forEach(function (detail) {
            // var priceSum = 0;
            // console.log('orderList export: ',detail);
            // priceSum += parseFloat(detail.total);
            // trTableExport += "<td>" + detail.productName +"</td>";
            // trTableExport += "<td>" + detail.pricePerUnit +"</td>";
            // trTableExport += "<td>" + detail.qty +"</td>";
            // trTableExport += "<td>" + priceSum +"</td>";

            let trTableExport = "<tr>";
            trTableExport += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + key + '</a></td>';
            trTableExport += "<td>"+ parseFloat(detail.total) +"</td>";
            trTableExport += "<td>"+ data.status +"</td>";
            trTableExport += "<td>" + date +"</td>";
            trTableExport += "<td>" + data.shippingAddress.name +"</td>";
            ////////////// Add on datas /////////// 
            trTableExport += "<td>" + detail.productName +"</td>";
            trTableExport += "<td>" + detail.pricePerUnit +"</td>";
            trTableExport += "<td>" + detail.qty +"</td>";
            trTableExport += "<td>" + parseFloat(detail.total) +"</td>";       
            trTableExport += "<td>" + data.shipping +"</td>";
            trTableExport += "<td>" + data.tracking +"</td>";
            trTableExport += "<td>" + data.shippingAddress.address +"</td>";
            trTableExport += "<td>" + data.shippingAddress.postcode +"</td>";
            trTableExport += "<td>" + data.shippingAddress.phone +"</td>";
            trTableExport += "</tr>";
            $(".tbBodyAllExport").append(trTableExport); 
        })
    }

</script>

