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
    //load category add_product page.
    window.onload = async function() {
        userId = await userData();
        getProductList();
        countUnreadMessage_otherPage();
        // db.collection("category").get().then(function(snapshot) {
        //     cateProduct(snapshot);
        //     cateProductList = snapshot
        // });
        // $("#form_add_Product #add_productSelectionName").keyup(function(){
        // $("#form_add_Product #table_select_name").text($(this).val());
        // });
        // $("#form_view_Product #view_productSelectionName").keyup(function(){
        //     $("#form_view_Product  #table_select_name").text($(this).val());
        // });
        // seletionName();
    };

    function getProductList(){
       // console.log(userId);
       let baseDoc = db.collection("product");
            baseDoc = baseDoc.where("isActive", "==", true);
            baseDoc = baseDoc.where("userId", "==", userId);
            // baseDoc = baseDoc.limit(12);
            baseDoc.onSnapshot(function(snapshot) {
                var i=1;
                snapshot.docChanges().forEach(function(change) {
                    if (change.type === "added") {
                        loadProductList(i,change.doc);
                        i++; 
                        // console.log("New product: ", change.doc.data());
                    }else if (change.type === "modified") {
                        // loadProductList(i,change.doc);
                        // i++; 
                        // console.log("Modified city: ", change.doc.data());
                    }else if (change.type === "removed") {
                        // loadProductList(i,change.doc);
                        // i++; 
                        // console.log("Removed city: ", change.doc.data());
                    }else{
                        loadProductList(i,change.doc);
                        i++; 
                    }
                });
            });
    }
    function loadProductList(i,doc){
        let stock = 0;
        if (doc.data().stock != ""){
            stock = doc.data().stock;
        }
        let isReady= '';
        if (doc.data().isReady==true){
            isReady = 'checked';
        }
        // console.log(doc.id);
        console.log();
        let trProductList = '<tr class="productList'+ i +'">';
        trProductList += '<td valign="middle">'+ i +'</td>';
        trProductList += '<td valign="middle">'+ doc.data().code; +'</td>';
        trProductList += '<td valign="middle">'+ doc.data().name; +'</td>';
        trProductList += '<td valign="middle">'+ doc.data().price; +'</td>';
        trProductList += '<td valign="middle">'+ stock +'</td>';
        trProductList += '<td valign="middle">0</td>';
        trProductList += '<td valign="middle"><input type="checkbox" id="isVariation'+ i +'" class="switchery switchery'+ i +'" data-size="xs" '+ isReady +' data-key="'+ doc.id +'" /></td>';
        trProductList += '<td valign="middle" class="del" onclick="delProduct(this,'+ i +')" data-key="'+ doc.id +'"><i class="feather icon-trash-2"></i></td>';
        trProductList += '<td valign="middle" class="showDec" onclick="showProduct(this,'+ i +')" data-key="'+ doc.id +'"><i class="feather icon-eye" id="showDetail"></i></td>';
        trProductList += '</tr>';
        $('#table_body_product_list').append(trProductList);  

        const elem = document.querySelector('.switchery' + i);
        const init = new Switchery(elem);  

        $('.switchery' + i).on('change',function(e){
            const key = $(this).attr('data-key');
            // alert(key);
            const id = e.currentTarget.id;
            db.collection("product").doc(key).update({
                isReady: $(e.currentTarget).is(":checked")
            }).then(function() {
                console.log("Document successfully udpate IsReady!");
            }).catch(function(error) {
                console.error("Error removing document: ", error);
            });
        })

        var imgUrl = '<?php echo base_url("app-assets/img/color-bg.png"); ?>';
        if ((doc.data().images[0].imgUrl != null) && (doc.data().images[0].imgUrl != '')){
            imgUrl = doc.data().images[0].imgUrl
        }
        let divProductList = '<div class="col-lg-3 col-md-12 productList'+ i +'">';
        divProductList += '<div class="card text-center">';
        divProductList += '<div class="card-content">';
        divProductList += '<div class="isActiveProduct"><input type="checkbox" class="switcheryI'+ i +'" id="input-15" '+ isReady +' data-key="'+ doc.id +'" ></div>';
        divProductList += '<img class="card-img-top img-fluid product_img_list" onclick="changeProductStatus(this)" src="'+ imgUrl +'"  alt="Card image cap">';
        divProductList += '<div class="card-body">';
        divProductList += '<h4 class="card-title">'+ doc.data().name; +'</h4>';
        divProductList += '<p class="card-text"></p>';
        divProductList += '<div class="btn-group" role="group" aria-label="Basic example">';
        divProductList += '<span class="btn btn-outline-blue-grey">฿'+ doc.data().price +'</span>';
        divProductList += '<span class="btn btn-outline-blue-grey" onclick="showProduct(this,'+ i +')" data-key="'+ doc.id +'">view</span>';
        divProductList += '</div>';
        divProductList += '</div>';
        divProductList += '</div>';
        divProductList += '</div>';
        divProductList += '</div>';
        $('#productList').append(divProductList);

        const elem2 = document.querySelector('.switcheryI' + i);
        const init2 = new Switchery(elem2);
        $('.switcheryI' + i).on('change',function(e){
            const key = $(this).attr('data-key');
            // alert(key);
            const id = e.currentTarget.id;
            db.collection("product").doc(key).update({
                isReady: $(e.currentTarget).is(":checked")
            }).then(function() {
                console.log("Document successfully udpate IsReady!");
            }).catch(function(error) {
                console.error("Error removing document: ", error);
            });
        })
    }

    function delProduct(e){
        var key = e.getAttribute('data-key');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            confirmButtonClass: "btn btn-warning",
            cancelButtonClass: "btn btn-danger ml-1",
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                db.collection("product").doc(key).update({
                    isActive: false
                }).then(function() {
                    Swal.fire({
                        type: "success",
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        confirmButtonClass: "btn btn-success"
                    }).then(function(){
                        window.location.href = contentUrl + 'productList';
                    });
                    console.log("Document successfully deleted!");
                }).catch(function(error) {
                    console.error("Error removing document: ", error);
                });
            }
        });      
    }
    
    function showProduct(e){
        var key = e.getAttribute('data-key');
        window.location.href = contentUrl + 'productView/' + toHex(key);
    }
    function chageStatusAcitve(e,idDisplay){
        var getMainDiv =  e.parentNode.getElementsByClassName("active");
        if (getMainDiv != null){
            getMainDiv[0].classList.remove('active');
        }   
        e.classList.add('active');
        if (idDisplay == 'product_list'){
            document.getElementById('product_grid').style.display = 'none';  
            document.getElementById('product_list').style.display = 'block'; 
        }else{        
            document.getElementById('product_list').style.display = 'none'; 
            document.getElementById('product_grid').style.display = 'block';  
        }
    }
</script>