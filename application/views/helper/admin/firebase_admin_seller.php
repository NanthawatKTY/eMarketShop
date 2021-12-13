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
        getSellerList();
    }

    function getSellerList(){
        // let baseDoc = db.collection("shops");
        //     $('#admin_seller_tb').html('');
        //         baseDoc.onSnapshot(function(snapshot) {
        //         snapshot.docChanges().forEach(function(change,i) {
        //             showSellerList(i,change.doc);
        //         });
        //     });

        var settings = {
            "url": "https://asia-east2-emarketshops-c948d.cloudfunctions.net/users",
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/x-www-form-urlencoded"
            },
        };

        $.ajax(settings).done(function (response) {
            response.forEach(function(item,i){
                // console.log(item);
                showSellerList(i,item);
            })
        });
    }
    function showSellerList(i,doc){

        let email = doc.email;
        let isReady= '';
        if (doc.disabled == false){
            isReady = 'checked';
        }

        let key = doc.uid;
        let tr = '<tr>';
        tr += '<td>'+  parseInt(i+ 1)  +'</td>';
        tr += '<td>';
        tr += '<a href="#" onclick="showSellerData(this)" id="ddd" class="show_modal_seller_detail" data-key="'+ key +'">'+ email +'</a>';
        tr += '</td>';
        // tr += '<td><span class="invoice-amount">'+ phone +'</span></td>';
        // tr += '<td><span class="invoice-date">'+ email +'</span></td>';
        let providerData = '';
        doc.providerData.forEach(function(item){
            providerData += ' ' + item.providerId;
        })

        tr += '<td>'+ providerData +'</td>';

        tr += '<td>'+ doc.emailVerified +'</td>';
        tr += '<td><span class="badge badge badge-pill badge-success float-right mr-2">'+ doc.metadata.creationTime +'</span></td>';
        tr += '<td valign="middle"><input type="checkbox" id="isVariation'+ i +'" class="switchery switchery'+ i +'" data-size="xs" '+ isReady +' data-key="'+ doc.uid +'" /></td>';

        // tr += '<td>';
        // tr += '<div class="invoice-action">';   
        // tr += '<a href="#"  onclick="showSellerData(this)" class="show_modal_seller_detail" data-key="'+ key +'" class="invoice-action-view mr-1">';
        // tr += '<i class="feather icon-eye"></i>';
        // tr += '</a>';
        // tr += '</div>';
        // tr += '</td>';

        tr += '</tr>';
        $('#admin_seller_tb').append(tr);

        const elem = document.querySelector('.switchery' + i);
        const init = new Switchery(elem); 

        $('.switchery' + i).on('change',function(e){
            const key = $(this).attr('data-key');
            const id = $(e.currentTarget).is(":checked");
            let disable = false;

            if (id == false){
                disable = true;
            }else{
                disable =  false;
            }
            var settings = {
                "url": "https://asia-east2-emarketshops-c948d.cloudfunctions.net/update/"+ key +"/" + disable,
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
            };

            $.ajax(settings).done(function (response) {
                if (response == "success"){
                    window.location.href = contentUrl + '/manageSeller';
                }
            });
        })
    }

    function showSellerData(e){
        let key = e.getAttribute('data-key');
        $('#btn_show_modal_seller').trigger('click');
        console.log(key);
        let docRef = db.collection("shops").doc(key);
        docRef.get().then(function(doc) {
            if (doc.exists) {
                console.log("Document data:", doc.data());
                if (doc.data().logo != "" && doc.data().logo != null){
                    $('#modal_seller_logo').attr('src', doc.data().logo);
                }else{
                    $('#modal_seller_logo').attr('src', '../app-assets/img/logo-big.png');
                }
                $('#modal_shopName').text('');
                $('#modal_type').text('');
                $('#modal_dec').text('');
                $('#modal_address').text('');
                $('#modal_email').text('');
                $('#modal_phone').text('');
                
                $('#modal_shopName').text(doc.data().shopName);
                $('#modal_type').text(doc.data().type);
                $('#modal_dec').text(doc.data().description);

                let address = doc.data().contact.address + ' ' + doc.data().contact.subDistrict + ' ' + doc.data().contact.district  + ' ' + doc.data().contact.province + ' ' + doc.data().contact.zipcode 
                $('#modal_address').text(address);

                $('#modal_email').text(doc.data().contact.email);
                $('#modal_phone').text(doc.data().contact.phone);
  
                // $('#modal_dec').text(doc.data().description);
                let file1 = '';
                let file2 = '';
                let file3 = '';
                let file4 = ''; 

                if (doc.data().docs.cardID != ""){
                    file1 = '<li><a href="'+ doc.data().docs.cardID +'" target="_blank">บัตรประชาชนกรรมการผู้มีอำนาจลงนาม</a></li>';
                }
                  
                if (doc.data().docs.commercial_regis_0403 != ""){
                    file2 = '<li><a href="'+ doc.data().docs.commercial_regis_0403 +'" target="_blank">ใบทะเบียนพาณิชย์ (แบบ ภพ.0403)</a></li>';
                }
                    
                if (doc.data().docs.commercial_regis_20 != ""){
                    file3 = '<li><a href="'+ doc.data().docs.commercial_regis_20 +'" target="_blank">ใบทะเบียนพาณิชย์ (แบบ ภพ.20)</a></li>';
                }
                    
                if (doc.data().docs.regis != ""){
                    file4 = '<li><a href="'+ doc.data().docs.regis +'" target="_blank">หนังสือรับรองการจดทะเบียน</a></li>';
                }        
                $('#modal_docs').html('');
                $('#modal_docs').append( file1 + file2 + file3 + file4 );

            } 
        }).catch(function(error) {
            // console.log("Error getting document:", error);
        });
    }

    function delSeller(e,i){
        alert('del');
    }

</script>