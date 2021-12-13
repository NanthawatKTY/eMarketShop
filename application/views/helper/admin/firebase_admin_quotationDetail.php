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
        getQuotationData(get_value_url);
    };

    function getQuotationData(qNo){
        let ref = db.collection("quotation");
        ref.onSnapshot(function(snapshot){
            snapshot.docs.forEach(function(doc){
                doc.data().quotation.forEach(function(item,i){
                    if (item.quotationNo == qNo){
                        showData(item,doc.id);
                        return false;
                    }
                })
            })
        })
    }

    function showData(data,cid){
        let date = convertTHDate(data.insertDate.seconds,'numeric','long','numeric')
        $('#admin_quotation_date').text(date);

        $('#admin_quotation_no').text('Quotation No. #' + data.quotationNo);
        $('#admin_quotation_subject').text(data.subject);

        $('#admin_quotation_customer_name').text(data.customerName);
        $('#admin_quotation_customer_address').text(data.customerAddress);
        $('#admin_quotation_customer_email').text(data.customerEmail);
        $('#admin_quotation_customer_phone').text(data.customerPhone);

        if (data.category){
            $('#admin_quotation_send').attr('data-cate', data.category);
  
        }
        $('#admin_quotation_customerId').val(cid);  
        // if (data.sellerId){
        //     db.collection("shops").doc(data.sellerId).get().then(function(doc){
        //         if (doc.exists){
        //             $('#admin_quotation_name').text(doc.data().shopName);
        //             $('#admin_quotation_address').text(doc.data().contact.address + ' ' + doc.data().contact.subDistrict + ' ' + doc.data().contact.district + ' ' + doc.data().contact.province + ' '  + doc.data().contact.zipcode);
        //             $('#admin_quotation_email').text(doc.data().contact.email);
        //             $('#admin_quotation_phone').text(doc.data().contact.phone);
        //         }
        //     })
        // }
        $('#table_quotation_item tbody').html('');
        if (data.quotationItem){
            data.quotationItem.forEach(function(item){
                let tr = '<tr>';
                tr += '<td>'+ item.productName +'</td>';
                tr += '<td>'+ item.qty +'</td>';
                tr += '<td class="font-weight-bold">'+ Number(item.total).toLocaleString() +'</td>';
                tr += '</tr>';
                $('#table_quotation_item tbody').append(tr);
            })
        }

        $('#admin_quotation_subtotal').text(Number(data.subtotal).toLocaleString());
        let tax = data.tax;
        if (tax == ""){
            tax = 0.00;
        }
        $('#admin_quotation_tax').text(tax);
        $('#admin_quotation_total').text(Number(data.total).toLocaleString());

    }

    function goPage(){
        window.location.href  = contentUrl + 'quotationAddSeller/' + get_value_url;
    }

    function sendQuotation(e){
        // e.preventDefault();
        $('#btnSendQuotation').trigger('click');
        $('#admin_sellerList').html('<option value="0">เลือก Seller</option>');
        let cateName = e.getAttribute('data-cate');
        if (cateName){
            let refCateory = db.collection("category").where('nameTH' ,'==', cateName);
            refCateory.get().then(function(data){
                    data.docs.forEach(function(value){
                        if (value.data().nameTH == cateName){
                            let ref = db.collection("product")
                            .where("categoryCode", "==", value.id);
                            ref.onSnapshot(function(doc){
                                doc.docs.forEach(function(item,i){
                                    if (item.exists){
                                        let sellerId = item.data().userId;
                                        shopData(sellerId);
                                    }
                                })
                            })
                        }
                    })
                
            })
        }
    }

    function shopData(sid){
        db.collection("shops").doc(sid).get().then(function(data){
            if (data.exists){

                let sallerName = data.data().shopName
                let checkexsits = false;
                $('#admin_sellerList > option').each(function(){
                    if (this.value == sid){
                        checkexsits = true;
                        sallerName = data.data().shopName;
                    }
                })

                if (checkexsits==false){
                    $('#admin_sellerList').append('<option value="'+ sid +'">'+ sallerName +'</option>');
                }
            }
        })
    }
    $('#admin_sellerList').change(function(e){
        let values = $(this).val();
        $('#admin_quotation_sellerId').val(values);
    })
    
    $('#btn_admin_submit_send_quotation').click(async function(){
        let sellerId = $('#admin_sellerList').val();
        if (sellerId != "0"){
            let qNo = get_value_url;
            if (qNo){
                let ref = db.collection("quotation");
                let qData = new Object();
                
                let cid = $('#admin_quotation_customerId').val();
                ref.onSnapshot(function(snapshot){
                    snapshot.docs.forEach(function(doc){
                        if (cid == doc.id){
                            // console.log(doc.data());
                            qData.quotation = [];
                            doc.data().quotation.forEach(function(item){
                                if (item.quotationNo == qNo){
                                    
                                    let qItem = item;
                                    qItem.sellerId = sellerId;
                                    qItem.isAdmin = false;     

                                    qData.quotation.push(qItem);

                                }else{

                                    qData.quotation.push(item);

                                }
                            })

                            // console.log('new data : ', qData);
                            ref.doc(cid).set(qData).then(function(){
                                toastr.success('info', 'Success!');
                                setTimeout(() => {
                                    window.location.href = contentUrl + 'adminQuotation';
                                }, 1500);                   
                            });

                        }
                    })
                })
            }
        }
    })

    // function setItem(qNo,sellerId){

    //     return new Promise((resolve, reject) => {
    //         let ref = db.collection("quotation");
    //         let qData = new Object();
    //         qData.quotation = [];

    //         let cid = $('#admin_quotation_customerId').val();
    //         ref.onSnapshot(function(snapshot){
    //             snapshot.docs.forEach(function(doc){
    //                 doc.data().quotation.forEach(function(item){
    //                     if (item.quotationNo == qNo){
    //                         let qItem = item;
    //                         qItem.sellerId = sellerId;
    //                         qItem.isAdmin = false;     
    //                         qData.quotation.push(qItem);

    //                     }else{
    //                         qData.quotation.push(item);
    //                     }
    //                 })  
    //             })
    //         })
    //         resolve(qData);
    //         // return qData;
    //     });
    // }
</script>