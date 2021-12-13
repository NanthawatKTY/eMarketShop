<?php 
    $url = base_url($lang.'/');
    if($this->uri->segment(1) =='th'){
        $lang_chk = "th";
    } else {
        $lang_chk = "en";
    }
    $get_value = "";
    if ($this->uri->segment(3)){
        $get_value = $this->uri->segment(3);
    }    
?>
<script>
    var contentUrl = <?php echo json_encode($url); ?>;
    var get_value_url = <?php echo json_encode($get_value); ?>;
 
    window.onload = async function(){
        userId = await userData();
        getOrdersList();
    };

    async function getOrdersList(){
        let ref = db.collection("orders");
        let i = 0;
        // ref.get().then(function(doc){
        //     if (doc.exists){
        //         doc.data().orderList.forEach(function(orderData){
        //             if (orderData.status == "refund"){
        //                 showData(orderData,i);
        //                 i++;
        //             }
        //         })
        //     }
        // })
        ref.onSnapshot(function(snapshot) {
            $('#table_admin_order_list').html('');
            snapshot.docs.forEach(function(doc){
                if (doc.exists){
                    doc.data().orderList.forEach(function(change) {
                        if (change.status == "refund" && change.processing == "not processed"){
                            showData(change,i,doc.id);
                            i++;
                        }
                    });
                }

            })
        }); 
    }

    async function showData(item,i,docID){
        let tr = "<tr>";
        tr += "<td>"+ (i + 1 ) +"</td>";
        tr += "<td><a class='text-success2' href='#' onclick='openModal(this)' data-docID='"+ docID +"' data-key='"+ item.orderNo +"'>"+ item.orderNo +"</a></td>";
        tr += "<td>#"+ item.tracking +"</td>";

        let ref = db.collection("userProfile").doc(item.customerId);
        await ref.get().then(function(doc){
            if (doc.exists){
                tr += "<td>"+ doc.data().name +"</td>";
            }
        })
        
        tr += "<td>"+ Number(item.total).toLocaleString() +"</td>";
        
        let processing = "badge-success";
        if (item.processing == "not processed"){
            processing = "badge-warning"
        }

        tr += "<td>"+ item.status +"<br><span class='badge badge "+ processing +" badge-pill'>"+ item.processing +"</span></td>";
        tr += "<td><button onclick='getChargeId(this)' data-docID='"+ docID +"' data-order='"+ item.orderNo +"'>refund</button></td>";
        tr += "<td>"+ convertTHDate(item.insertDate.seconds,'numeric','short','numeric') +"</td>";
        tr += "</tr>";

        $('#table_admin_order_list').append(tr);
    }

    function openModal(e){
        $('#amdin_order_detail_table_orderItem').html('');
        let key = e.getAttribute('data-key');
        let docId = e.getAttribute('data-docID');
        let ref = db.collection("orders").doc(docId);
        ref.get().then(function(doc){
            if(doc.exists){
                doc.data().orderList.forEach(function(data){
                    if (data.orderNo == key && data.status == 'refund'){
                        $('#admin_order_no').text(data.orderNo);
                        $('#admin_order_detail_address_customer').text(data.shippingAddress.address);
                        $('#admin_order_detail_customerName').text(data.shippingAddress.name);
                        $('#admin_order_insertDate').text('สั่งซื้อวันที่ : ' + convertTHDate(data.insertDate.seconds,'numeric','short','numeric'))
                        if (data.orderItem){
                            data.orderItem.forEach(function(item){
                                let tr = "<tr>";
                                tr += "<td>"+ item.productName +"</td>";
                                tr += "<td>"+ item.pricePerUnit +"</td>";
                                tr += "<td>"+ item.qty +"</td>";
                                tr += "<td>"+ item.total +"</td>";
                                tr += "</tr>";
                                $('#amdin_order_detail_table_orderItem').append(tr);
                            })
                        }
                        $('#admin_order_detail_total').text(data.total);
                        $('#amin_order_btn').trigger('click');
                        return false;
                    }
                })
            }
        })
    }

    function getChargeId(e){
        let orderNo = e.getAttribute('data-order');
        let docID = e.getAttribute('data-docID');

        let settings_get_charge = {
            "url": "https://dev-kpaymentgateway-services.kasikornbank.com/qr/v2/qr/"+ orderNo,
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json",
                "x-api-key": "skey_test_20650YXYgziqkAKF23bFV8xwqmBarX3xjUL5W"
            }
        };

        $.ajax(settings_get_charge).done().then(function(response){
            console.log('response : ',response);
            voidQR(response.id, orderNo);
        }).catch(function(error){
            console.log('response error: ',error.responseJSON);
        });
    }

    function voidQR(chargeID,orderNo){
        let settings_void = {
            "url": "https://dev-kpaymentgateway-services.kasikornbank.com/qr/v2/qr/"+ chargeID + "/void",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json",
                "x-api-key": "skey_test_20650YXYgziqkAKF23bFV8xwqmBarX3xjUL5W"
            }
        };
        $.ajax(settings_void).done().then(function(response){
            console.log('response : ',response);
            
            if (response.transaction_state == "VOID" && response.status == "success"){
                //update order
                let newData = new Object();
                let dateNow =  firebase.firestore.Timestamp.fromDate(new Date());
                let ref = db.collection("orders").doc(docID);
                ref.get().then(function(doc){
                    if(doc.exists){
                        newData.orderList = [];
                        doc.data().orderList.forEach(function(data){
                            if (data.orderNo == orderNo){

                                let orderItem = data;
                                orderItem.processing = "processing";
                                orderItem.refundDate = dateNow;     
                                orderItem.refundBy = userId;  
                                newData.orderList.push(orderItem);
                            }else{
                                newData.orderList.push(data);
                            }
                        })
                        db.collection("orders").set(newData).then(function(){
                            toastr.success('info', 'Success!');
                            setTimeout(() => {
                                window.location.href = contentUrl + 'adminOrders';
                            }, 1500);  
                        });
                    }
                })
            }
        }).catch(function(error){
            console.log('response error: ',error.responseJSON);
        });
    }
</script>