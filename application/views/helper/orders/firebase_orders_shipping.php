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
}

    function getOrders(){
        $(".tbBodyShipping").html('');

            let baseDoc = db.collection("orders").doc(userId);
          
            baseDoc.onSnapshot(function(snapshot) {
                snapshot.data().orderList.forEach(function(change) {
                    // console.log('User data 222', change.doc.data());
                    if (change.isActive == true) {
                      showOrdersShipping(change);
                    }
                });
            });     
            $( "#shippingSort4" ).on('change',function() {
                getOrdersShipByShipping( $(this).val());
            });
    }

    function getOrdersShipByShipping(shippingSort){
    
        let baseDoc = db.collection("orders").doc(userId);
        //All shipping
        if(shippingSort == 'allShipping'){
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyShipping").html('');
                }else{
                    $(".tbBodyShipping").html('');             
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true ){
                            showOrdersShipping(change);
                        }                
                    });
                }
            });
        }else{
            // Each choice
            baseDoc.onSnapshot(function(snapshot) {
                if(snapshot.data().orderList.length == 0){
                    $(".tbBodyShipping").html('');

                }else{
                    $(".tbBodyShipping").html('');             
                    snapshot.data().orderList.forEach(function(change) {
                        if (change.isActive == true && change.shipping == shippingSort){
                            showOrdersShipping(change);
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
                $(".tbBodyShipping tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            } else {
                // if search filter box is empty
                $(".tbBodyShipping tr").show();
            }
        });
    });
    ////////////////////////////Searching End//////////////////////////////////////////// 

    function showOrderData(e){
        var key = e.getAttribute('data-key');
        //change to hex key
        window.location.href = contentUrl + 'OrderDetial/' + toHex(key);
    }

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
    
    function showOrdersShipping(data){
        let key = data.orderNo;
        let date = convertDate2(data.insertDate.seconds);
        let trTable = "<tr>";
        trTable += '<td><a onclick="showOrderData(this)" data-key="'+ key +'" class="text-success2">' + data.orderNo + '</a></td>';
        trTable += "<td>"+ data.total +"</td>";
        trTable += "<td >"+ data.shipping + "#" + data.tracking +"</td>";
        trTable += "<td>"+ data.status +"</td>";
        trTable += "<td>" + date +"</td>";
        trTable += "</tr>";
        $(".tbBodyShipping").append(trTable);

    }
</script>