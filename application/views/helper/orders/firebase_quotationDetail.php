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
        getQuotationDetail(userId,<?php echo json_encode($get_value); ?>);
    }

//-----------------------ต่อ ID-----------------------//
    function getQuotationDetail(uid,indxOf){
        $('#quotationm_tb').html('');
        let baseDoc = db.collection("quotation");
        
            // baseDoc = baseDoc.where("sellerId", "==", uid);
            baseDoc = baseDoc.limit(12);
            baseDoc.onSnapshot(function(snapshot) {
                snapshot.docChanges().forEach(function(change,i) {
                    // showQuotationList(change,i);
                    // console.log(change.doc.data());
                    change.doc.data().quotation.forEach(function(item,i){
                        if(item.sellerId == uid){
                            if (item.QuotationNo == indxOf){
                                showDetail(item);
                                $('#quotationEdit').attr('data-key',item.QuotationNo);
                                return false;
                            }   
                        }
                      
                    })
                });
            });

            baseDoc.onSnapshot(function(snapshot) {
                snapshot.docs.forEach(function(doc){
                    let key = doc.id;
                    doc.data().quotation.forEach(function(item,i){
                        if(item.sellerId == uid){
                            if (item.quotationNo == indxOf){
                                showDetail(item,key);
                                $('#quotationEdit').attr('data-key',item.quotationNo);
                                $('#add_approved').attr('data-docs', key);
                                return false;
                            }
                        }
                        // console.log(item);
                    })
                })
            });
    }
//-----------------------ต่อ ID-----------------------// 

//-----------------------แสดงข้อมูล-----------------------// 
    function showDetail(data,key){
        console.log(data);
        $('#quotationNo').text(data.quotationNo);
        // let qDate = getDateFormat(data.QuotationDate.seconds);
        // // let qdate = new Date(data.QuotationDate.toDate());
        // let qDatei = getDateFormat(data.insertDate.seconds);
        
        let  qDate = '';  
        let  qDatei = '';
         if(data.quotationDate.seconds != 'undefined'){
            qDate = getDateFormat(data.quotationDate.seconds);
            qDatei = getDateFormat(data.quotationDate.seconds);
        }
        $('#quotationDate').text(qDate);
        $('#insertDate').text(qDatei);

        $('#view_customerName').text(data.customerName);
        $('#view_subject').text('เสนอราคา : ' + data.subject);

        $('#view_customerName').text(data.customerName);
        $('#view_customerAddress').text(data.customerAddress);
        $('#view_customerEmail').text(data.customerEmail);
        $('#view_customerPhone').text(data.customerPhone);
        
        $('#customerId').text('รหัสลูกค้า : ' + key);


        $('#quotationItem_tb').html('');
        data.quotationItem.forEach(function(item,i){
            let tr ='<tr>';
                tr +='<td> '+ item.productName +'</td>';
                // tr ='<td>'+ item.subject +'</td>';
                tr +='<td>'+ item.priceUnit +'</td>';
                tr +='<td>'+ item.qty +'</td>';
                tr +='<td class="font-weight-bold">'+ item.total +'</td>';
                tr +='</tr>';
                $('#quotationItem_tb').append(tr); 
        })

        var docRef = db.collection("shops").doc(userId);

            docRef.get().then(function(doc) {
                if (doc.exists) {
                    console.log("Document data:", doc.data());

                    $('#sellerName').text(doc.data().contact.nameContact);
                    let sellerAddress  = doc.data().contact.address + ' ' + doc.data().contact.subDistrict + ' ' + doc.data().contact.district + ' ' + doc.data().contact.province + ' ' + doc.data().contact.zipcode
                    $('#addressName').text(sellerAddress);

                    $('#sellerEmail').text(doc.data().contact.email);

                    $('#sellerTel').text(doc.data().contact.phone);

                } else {
                   console.log("No such document!");
                }
            }).catch(function(error) {
                console.log("Error getting document:", error);
            });
            // var docRefC
        $('#total').text(data.total);
        $('#subtotal').text(data.subtotal);
        $('#amountDC').text(data.amountDC);
        $('#tax').text(data.tax);

    }
//-----------------------แสดงข้อมูล-----------------------//

//-----------------------กำหนดตัวแปลแสดงวันที่ (วัน/เดือร/ปี)-----------------------//
    function getDateFormat(date){
        var theDate = new Date(date * 1000);
        let formatted_date = theDate.getDate() + "-" + (theDate.getMonth() + 1) + "-" + theDate.getFullYear()
        return formatted_date;
    }
//-----------------------กำหนดตัวแปลแสดงวันที่ (วัน/เดือร/ปี)-----------------------//

//-----------------------ตั้งค่าไปหน้า Edit-----------------------//
    function QuotationDetailEdit(e) {
        let elm = document.getElementById('quotationEdit');
        let key = elm.getAttribute('data-key');
        console.log(key);

        window.location.href = contentUrl + 'QuotationDetail' + '/' + key;    
    }
//-----------------------ตั้งค่าไปหน้า Edit-----------------------//

//-----------------------ตั้งค่าปริ้น-----------------------//
function printArea(areaID){

    var headstr = "<html><head><title></title></head><body>";
    var footstr = "</body>";
    var newstr = document.all.item(areaID).innerHTML;
    var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
    return false;
}
//-----------------------ตั้งค่าปริ้น-----------------------//

// function genPDF

//-----------------------ปุ่มยืนยัน Approved-----------------------//
function approvedD(e){
    Swal.fire({
        title: "Are you sure to Approved Quotation?",
        text: "You won't be able to revert this!",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes Approved!",
        confirmButtonClass: "btn btn-primary",
        cancelButtonClass: "btn btn-danger ml-1",
        buttonsStyling: false
    }).then(function(result) {
        if (result.value) {
            let docs = $(e).attr('data-docs');
            let newData = new Object();
                newData.quotation = [];
            var docRef = db.collection("quotation").doc(docs);
                docRef.get().then(function(doc) {
                    if (doc.exists) {
                        doc.data().quotation.forEach(function(item){
                            if(item.sellerId == userId){
                                if(item.isAdmin == false && item.quotationNo == get_value_url){
                                let newItemData = item;
                                    newItemData.status = 'approved';
                                    newData.quotation.push(newItemData);
                                }else{
                                    newData.quotation.push(item);
                                }
                            }
                        });       
                        console.log(newData);
                        console.log('dd ',newData);
                        docRef.set(newData).then(function(result) {
                        console.log("Document successfully written!");
                            // console.log('calback : ',data);
                        window.location.href  = contentUrl + 'Quotation/';          
                    })
                        .catch(function(error) {
                        console.log(key);
                        console.error("Error writing document: ", error);
                        });
                    }
                });  
        }
    });
}
//-----------------------ปุ่มยืนยัน Approved-----------------------//
</script>


<!-----------------------var docRefC----------------------->

    <!-- var docRefC = db.collection("quotation").doc(userId); -->
        <!-- docRefC.get().then(function(doc) { -->
            <!-- if (doc.exists) { -->
                <!-- console.log("Document data:", doc.data()); -->
                    <!-- $('#view_customerName').text(data.customerName);  -->
                    <!-- $('#sellerName').text(doc.data().contact.nameContact); -->
                    <!-- let sellerAddress  = doc.data().contact.address + ' ' + doc.data().contact.subDistrict + ' ' + doc.data().contact.district + ' ' + doc.data().contact.province + ' ' + doc.data().contact.zipcode -->
                    <!-- $('#addressName').text(sellerAddress); -->
                    <!-- $('#sellerEmail').text(doc.data().contact.email); -->
                    <!-- $('#sellerTel').text(doc.data().contact.phone); -->
                        <!-- } else { -->
                        <!-- console.log("No such document!"); -->
                    <!-- } -->
                <!-- }).catch(function(error) { -->
            <!-- console.log("Error getting document:", error); -->
        <!-- }); -->

<!-----------------------var docRefC----------------------->

<!-----------------------function genPDF----------------------->

    <!-- function genPDF(){ -->
        <!-- var cache_width = $('#MainPDF').width(); //Criado um cache do CSS -->
        <!-- var a4 = [595.28 ,841.89]; // Widht e Height de uma folha a4 -->

        <!-- $(document).on("click", '#btnPrint', function (){ -->
            <!-- // Setar o width da div no formato a4 -->
            <!-- $("#MainPDF").width((a4[0] * 1.3) - 120).css('max-width', 'none'); -->
            <!-- // Aqui ele cria a imagem e cria o pdf -->
            <!-- html2canvas($('#MainPDF'), { -->
                <!-- onrendered: function (canvas) { -->
                    <!-- var img = canvas.toDataURL("image/png", 0.1); -->
                    <!-- // var doc = new jsPDF({ unit: 'px', format: 'a4' });//this line error -->
                    <!-- var doc = new jsPDF(a4); // default is portrait -->
                    <!-- // doc.fromHTML(img, ReactDOMServer.renderToStaticMarkup(this.render())); -->
                    <!-- doc.addImage(img, 'PNG', 15, 15); -->
                    <!-- doc.save('NOME-DO-PDF.pdf'); -->
                    <!-- //Retorna ao CSS normal -->
                    <!-- $('#MainPDF').width(cache_width); -->
                <!-- } -->
            <!-- }); -->
        <!-- });  -->
    <!-- } -->

<!-----------------------function genPDF----------------------->

<!-----------------------baseDoc----------------------->

    <!-- // baseDoc = baseDoc.where("sellerId", "==", uid); -->
        <!-- baseDoc = baseDoc.limit(12); -->
        <!-- baseDoc.onSnapshot(function(snapshot) { -->
            <!-- snapshot.docChanges().forEach(function(change,i) { -->
                <!-- // showQuotationList(change,i); -->
                <!-- // console.log(change.doc.data()); -->
                <!-- change.doc.data().quotation.forEach(function(item,i){ -->
                    <!-- if(item.sellerId == uid){ -->
                        <!-- if (item.QuotationNo == indxOf){ -->
                            <!-- showDetail(item); -->
                            <!-- $('#quotationEdit').attr('data-key',item.QuotationNo); -->
                            <!-- return false; -->
                        <!-- }    -->
                    <!-- } -->
                <!-- }) -->
            <!-- }); -->
        <!-- }); -->

<!-----------------------baseDoc----------------------->