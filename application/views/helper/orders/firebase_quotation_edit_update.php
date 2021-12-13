<?php 
    $url = base_url($lang.'/');
    if($this->uri->segment(1) =='th'){
        $lang_chk = "th";
    } else {
        $lang_chk = "en";
    }
    $get_value = "";
    if ($this->uri->segment(3))
        $get_value = $this->uri->segment(3);
?>
<script>
    var contentUrl = <?php echo json_encode($url); ?>;
    var get_value_url = <?php echo json_encode($get_value); ?>;
    window.onload = async function(){
        userId = await userData();
        getQuotationDetail2(userId,<?php echo json_encode($get_value); ?>);
    }
    function getQuotationDetail2(uid,indxOf){
        // $('#quotations_edit').html('');
        let baseDoc = db.collection("quotation");
            // baseDoc = baseDoc.limit(12);
            baseDoc.onSnapshot(function(snapshot) {
                // snapshot.docChanges().forEach(function(change,i) {

                //     baseDoc.onSnapshot(function(snapshot) {
                snapshot.docs.forEach(function(doc){
                    const dataKey = doc.id;
                    doc.data().quotation.forEach(function(item,i){
                        if(item.sellerId == uid){
                            if (item.quotationNo == indxOf){
                                showDetail(item,dataKey);
                                // $('#quotationEdit').attr('data-key',item.quotationNo);
                                return false;
                            }
                        }
                        // console.log(item);
                    })
                })
            });
    }

//-------------------------------------------------------เรียกข้อมูลเก่า-------------------------------------------------------//
    //                 change.doc.data().quotation.forEach(function(item,i){
    //                     if(item.sellerId == uid){
    //                         if (item.QuotationNo == indxOf){
    //                             // console.log(i,item);
    //                             showDetail(item);
    //                             listQproduct(item);

    //                             // console.log(i);
    //                             return false;
    //                         }   
    //                     }
                      
    //                 })
    //             });
    //         });
    // }
//-------------------------------------------------------เรียกข้อมูลเก่า-------------------------------------------------------//

//-------------------------------------------------------เรียกข้อมูลมาแสดง-------------------------------------------------------//
    function showDetail(data,key){
        console.log(data);
        $('#customerID').val(key);
        $('#view_QuotationNo').val(data.quotationNo);
        
        let  qDate = '';  
        let  qDatei = '';
         if(data.quotationDate.seconds != 'undefined'){
            qDate = getDateFormat(data.quotationDate.seconds);
            qDatei = getDateFormat(data.quotationDate.seconds);
        }
        $('#view_QuotationDate').val(qDate);
        $('#view_InsertDate').val(qDatei);


        $('#edit_customerAddress').val(data.customerAddress);
        $('#edit_customerEmail').val(data.customerEmail);
        $('#edit_customerName').val(data.customerName);
        $('#edit_customerPhone').val(data.customerPhone);
        $('#edit_description').val(data.description);
        $('#edit_subject_').val(data.subject);
        $('#customerId').val(key);
        $('#edit_Status').val(data.status);

        data.quotationItem.forEach(function(item,i){
        
            $('#edit_productName').val(item.productName);
            $('#edit_priceUnit').val(item.priceUnit);
            $('#edit_qty').val(item.qty);
            $('#edit_subtotal').val(item.subtotal);
            $('#edit_tax').val(item.tax);
            $('#edit_amountDC').val(item.amountDC);
            $('#edit_total').val(item.total);
            $('#unit').val(item.unit);
           
            
            
            $('#edit_amount').text(item.amountDC);
            $('#vdit_total').text(item.total);
            $('#edit_subtotalT').text(item.subtotal);
            $('#edit_tax').text(item.tax);
            
        
        });
    }
//-------------------------------------------------------เรียกข้อมูลมาแสดง-------------------------------------------------------//

//-------------------------------------------------------เรียกข้อมูลมาแสดง-------------------------------------------------------//
    function getDateFormat(date){
        var theDate = new Date(date * 1000);
        let formatted_date = (theDate.getMonth() + 1) + "/" + theDate.getDate() + "/" + theDate.getFullYear()
        return formatted_date;

    }
//-------------------------------------------------------เรียกข้อมูลมาแสดง-------------------------------------------------------//

//-------------------------------------------------------อัปเดทข้อมูล-------------------------------------------------------//
    $('#form_quotation_edit').on('submit',function(e){
        e.preventDefault();
        let newData = new Object();
        newData.quotation = [];
        // let quoNo = $('#view_QuotationNo').val();
        let customerID = $('#customerID').val();
        var docRef = db.collection("quotation").doc(customerID);
        docRef.get().then(function(doc) {
            if (doc.exists) {
                doc.data().quotation.forEach(function(item){
                    
                    if(item.sellerId == userId){
                        if(item.isAdmin == false){
                            if(item.quotationNo == $('#view_QuotationNo').val()){
                                let newItemData = new Object();
                                // newItemData.quotation = [];
                                let qDate = new Date($('#view_QuotationDate').val());
                                newItemData.quotationItem = item.quotationItem;
                                newItemData.quotationDate = qDate;
                                newItemData.insertDate = item.insertDate;
                                newItemData.quotationNo = $('#view_QuotationNo').val();                                            
                                newItemData.customerName = $('#edit_customerName').val();
                                // newItemData.taxIdentification = data.taxNum;
                                newItemData.customerAddress = $('#edit_customerAddress').val();
                                newItemData.customerEmail = $('#edit_customerEmail').val();
                                newItemData.customerPhone = $('#edit_customerPhone').val();
                                newItemData.subject = $('#edit_subject_').val();
                                newItemData.status = item.status;
                                newItemData.subtotal = item.subtotal;
                                newItemData.tax = item.tax;
                                newItemData.total = item.total;
                                newItemData.amountDC = item.amountDC;
                                newItemData.isActive = item.isActive;
                                newItemData.description = item.description;
                                newItemData.isAdmin = item.isAdmin;
                                
                                if(item.shipping){
                                    newItemData.shipping = item.shipping;
                                }
                                if(item.shippingTime){
                                    newItemData.shippingTime = item.shippingTime;
                                }
                                if(item.subCategory){
                                    newItemData.subCategory = item.subCategory;
                                }

                                newItemData.sellerId = userId;
                                
                                newData.quotation.push(newItemData);
                            }else{
                                newData.quotation.push(item);
                            }
                        }
                    }       
                    
                })
                console.log('dd ',newData);
                docRef.set(newData).then(function(result) {
                    console.log("Document successfully written!");
                    // console.log('calback : ',data);
                    window.location.href  = contentUrl + 'QuotationList/' + $('#view_QuotationNo').val();          
                })
                .catch(function(error) {
                    console.error("Error writing document: ", error);
                });
            }
        });
      
       
    });
//-------------------------------------------------------อัปเดทข้อมูล-------------------------------------------------------//

//-------------------------------------------------------เรียกข้อมูลเก่า-------------------------------------------------------//
        // $('#view_QuotationDate').val(data.QuotationDate);
        // $('#view_InsertDate').val(data.insertDate);

//             $('#quotationItem_edit_tb').html('');
//             data.quotationItem.forEach(function(item,i){
//                 let tr ='<tr>';
//                     tr +='<td> '+ item.productName +'</td>';
//                     // tr ='<td>'+ item.subject +'</td>';
//                     tr +='<td>'+ item.priceUnit +'</td>';
//                     tr +='<td>'+ item.qty +'</td>';
//                     tr +='<td class="font-weight-bold">'+ item.total +'</td>';
//                     tr +='</tr>';

//                     $('#quotationItem_tb').append(tr);
//             })

//         var docRef2 = db.collection("shops").doc(userId);
//         docRef2.get().then(function(doc) {
//             if (doc.exists) {
//                 console.log("Document data:", doc.data());
                

//                 $('#view_sellerName').val(doc.data().contact.nameContact);
//                 $('#view_sellerAddress').val(doc.data().contact.address);
//                 $('#view_sellersubDistrict').val(doc.data().contact.subDistrict);
//                 $('#view_sellerDistrict').val(doc.data().contact.district);
//                 $('#view_sellerProvince').val(doc.data().contact.province);
//                 $('#view_sellerZipcode').val(doc.data().contact.zipcode);
//                 $('#view_sellerEmail').val(doc.data().contact.email);
//                 $('#view_sellerTel').val(doc.data().contact.phone);


//                 } else {
//                     // doc.data() will be undefined in this case
//                     console.log("No such document!");
//                 }
//             }).catch(function(error) {
//                 console.log("Error getting document:", error);
//             });


//-------------------------------------------------------เรียกข้อม฿ลเก่า-------------------------------------------------------//



        // var commentsRef = firebase.database().ref('post-comments/' + postId);
        //     commentsRef.on('child_changed', function(data) {
        //         setCommentValues(postElement, data.key, 
        //                         data.val().text, 
        //                         data.val().author);
        // });
            
    // function listQproduct(data){
    //     var productNameq = db.collection("product").doc(userId);
    //     productNameq.get().then(function(doc){
    //         if(doc.exists){
    //             console.log("Document data:",doc,data());
    //             $('view_productq').val(doc.data().name);
    //         } else {
    //                 // doc.data() will be undefined in this case
    //                 console.log("No such document!");
    //             }
    //         }).catch(function(error) {
    //             console.log("Error getting document:", error);
    //         });
    // }

    // document.getElementById("pushMe").addEventListener("click", function submitForm(){
    // alert("999");
    // console.log(updateContact);
    // docref.set({
    //     updateContact: contact.nameContact
    // }, { merge: true }).then(function(){
    //     console.log("User saved!");
    // }).catch(function(error){
    //     console.log("Error: ", error);
    // });

//    db.collection("test").doc("test_user").get().then(function(doc) {
//         if (doc.exists) {
//             console.log("Document data:", doc.data());
//         } else {
//             // doc.data() will be undefined in this case
//             console.log("No such document!");
//         }
//     }).catch(function(error) {
//         console.log("Error getting document:", error);
//     });

//    console.log("GOODBYE!");
// });

//-------------------------------------------------------เรียกข้อม฿ลเก่า-------------------------------------------------------//
    </script>