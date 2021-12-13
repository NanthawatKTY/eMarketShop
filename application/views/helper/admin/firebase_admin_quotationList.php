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
        getQuotationList(userId);
    };

    function getQuotationList(uid){
        let ref = db.collection("quotation");
        ref.onSnapshot(function(snapshot){
            $('#table_admin_quotation_list').html('');
            snapshot.docs.forEach(function(doc){
                doc.data().quotation.forEach(function(item,i){
                    if(item.isAdmin == true && item.isActive ==true){
                        // console.log(i);
                        showQuotationList(item,i);
                    }
                })
            })
        })
    };

    function showQuotationList(item,i){
        let tr = "<tr>";
        tr += "<td>"+ (i + 1 ) +"</td>";
        tr += "<td><a class='text-success2' href='#' onclick='toPage(this)' data-key='"+ item.quotationNo +"'>"+ item.quotationNo +"</a></td>";
        tr += "<td>"+ item.subject +"</td>";
        tr += "<td>"+ item.customerName +"</td>";
        tr += "<td>"+ Number(item.total).toLocaleString() +"</td>";
        tr += "<td>"+ item.status +"</td>";
        tr += "<td><a class='text-red font-18'><i class='fa fa-trash-o'></i></a></td>";
        tr += "</tr>";

        $('#table_admin_quotation_list').append(tr);
    }

    function toPage(e){
        // e.preventDefault();
        let key = e.getAttribute('data-key');
        window.location.href = contentUrl + 'adminQuotationDetail/' + key;
    }
</script>