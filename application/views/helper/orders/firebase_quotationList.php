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

//-----------------------โหลด DataID-------------------------//
    window.onload = async function(){
        userId = await userData();
        getQuotationList(userId);
        
    }
//-----------------------โหลด DataID-----------------------//

//-----------------------ต่อ ID-----------------------//
    function getQuotationList(uid){
        $('#quotationList_tb').html('');
        // let baseDoc
        let baseDoc = db.collection("quotation");
            baseDoc.onSnapshot(function(snapshot) {
                $('#quotationList_tb').html('');
                snapshot.docs.forEach(function(doc){
                    doc.data().quotation.forEach(function(item,i){
                        // console.log(item);
                        if(item.sellerId == uid){
                            // console.log(item);
                            // showQuotationList(item,i);
                            if(item.isAdmin == false){
                                console.log(item);
                                showQuotationList(item,i);
                            }
                        }
                        // console.log(item);
                    });
                });
            });
        // var docRef
    }
    $(document).ready(function () {
    // chat search filter
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            if (value != "") {
                $("#quotationList_tb tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            } else {
                // if search filter box is empty
                $("#quotationList_tb tr").show();
            }
        });
    });
//-----------------------ต่อ ID-----------------------//

//-----------------------ต่อเข้าหน้าแสดงใบเสนอราคา-----------------------//
    function showQuotationData(e){
        var key = e.getAttribute('data-key');
        window.location.href = contentUrl + 'QuotationList/' + (key);
    }
//-----------------------ต่อเข้าหน้าแสดงใบเสนอราคา-----------------------//

//-----------------------ต่อเข้าหน้าแก้ไขใบเสนอราคา-----------------------//
    function editQuotationData(e){
        var key = e.getAttribute('data-key');
        window.location.href = contentUrl + 'QuotationDetail/' + (key);
    }
//-----------------------ต่อเข้าหน้าแก้ไขใบเสนอราคา-----------------------//

//-----------------------format Date (วัน/เดือน/ปี)-----------------------//
    function getDateFormat(date){
        var theDate = new Date(date * 1000);
        let formatted_date = theDate.getDate() + "-" + (theDate.getMonth() + 1) + "-" + theDate.getFullYear()
        return formatted_date;
    }
//-----------------------format Date (วัน/เดือน/ปี)-----------------------//

//-----------------------sortTable-----------------------//
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("myTable");
            switching = true;
            dir = "asc"; 
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].showQuotationList("#quotationList_tb td")[n];
                    y = rows[i + 1].showQuotationList("#quotationList_tb td")[n];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch= true;
                        break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                        break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount ++;      
                } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
                }
            }
    }
//-----------------------sortTable-----------------------//

//-----------------------showQuotationList-----------------------//
    function showQuotationList(data,indexOf) {
            // console.log('listquotation',data);
        //กำหนดแสดงหน้า Status//
            let badge = "";
                    if(data.status === 'pending'){
                    badge = 'badge-danger';
                    // badged = 'enabled';
                } else if(data.status === 'approved'){
                    badge = 'badge-success';
                    // badged = 'disabled';
                }
        //กำหนดแสดงหน้า Status//

        //กำหนดแสดงวันที่//     
            let  qDate = '';   
            if(data.quotationDate.seconds != 'undefined'){
                qDate = getDateFormat(data.quotationDate.seconds);  
            }
        //กำหนดแสดงวันที่//

        //แสดงตารางข้อมูล// 
        // $('#quotationDate').text(qDate);
            let tr = '<tr role="row" class="even">';
                tr += '<td class="control" tabindex="0" style="display: none;"></td>';
                tr +='<td class=" "></td>';
                tr += '<td>';
                tr += '<a style="color:green" onclick="showQuotationData(this)" data-key="'+ data.quotationNo +'" id="myTable">'+ data.quotationNo +'</a>';
                tr += '</td>';
                tr += '<td><span style="color:DarkKhaki" class="invoice-amount" id="myTable">'+ data.total +'</span></td>';
                tr += '<td><span style="color:DodgerBlue" class="invoice-date" id="myTable">'+ qDate +'</span></td>';
                tr += '<td><a style="color:DarkBlue" onclick="showQuotationData(this)" data-key="'+ data.quotationNo +'" class="invoice-customer" id="myTable">'+ data.customerName +'</a></td>';
                // tr += '<td><span class="bullet bullet-primary bullet-sm"></span>Car</td>';
                // tr += '<td><span class="badge badge-pill badge-danger" id="demo">Pending</span></td>';
                tr += '<td><span class="badge badge-pill '+badge+'">' + data.status + '</span></td>';
                tr += '<td>';
                tr += '<div class="invoice-action">';
                tr += '<a style="color:green" onclick="showQuotationData(this)" data-key="'+ data.quotationNo +'" class="invoice-action-view mr-1" id="myTable">';
                tr += '<i class="feather icon-eye"></i>';
                tr += '</a>';
                tr += '<a style="color:DarkOrange" onclick="editQuotationData(this)" data-key="'+ data.quotationNo +'" class="invoice-action-edit cursor-pointer" id="myTable">';
                tr += '<i class="feather icon-edit-1"></i>';
                tr += '</a>';
                tr += '</div>';
                tr += '</td>';
                tr += '</tr>';
                $('#quotationList_tb').append(tr);
            //แสดงตารางข้อมูล// 
    }         
//-----------------------showQuotationList-----------------------//

</script>

<!-- let baseDoc -->

    <!-- // let baseDoc = db.collection("quotation"); -->
        <!-- //     // baseDoc = baseDoc.where("sellerId", "==", uid); -->
        <!-- //     // baseDoc = baseDoc.limit(12); -->
        <!-- //     baseDoc.onSnapshot(function(snapshot) { -->
        <!-- //         snapshot.docChanges().forEach(function(change,i) { -->
        <!-- //             // showQuotationList(change,i); -->
        <!-- //             // console.log(change.doc.data()); -->
        <!-- //             change.doc.data().quotation.forEach(function(item,i){ -->
                        
        <!-- //                 if(item.sellerId == uid){ -->
        <!-- //                     showQuotationList(item,i); -->
        <!-- //                 } -->
                        
        <!-- //             }) -->
        <!-- //         }); -->
    <!-- //     }); -->

<!-- let baseDoc -->

<!-- var docRef -->

    <!-- // var docRef = db.collection("quotation").doc(userId); -->
        <!-- // docRef.get().then(function(doc) { -->
        <!-- //     if (doc.exists) { -->

        <!-- //         doc.data().quotation.forEach(function(item,i){ -->
        <!-- //             showQuotationList(item,i); -->
        <!-- //         }) -->

        <!-- //     } else { -->
        <!-- //         console.log("No such document!"); -->
        <!-- //     } -->
        <!-- // }).catch(function(error) { -->
        <!-- //     console.log("Error getting document:", error); -->
    <!-- // }); -->

<!-- var docRef -->