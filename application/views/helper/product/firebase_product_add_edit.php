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
        countUnreadMessage_otherPage();
        db.collection("category").get().then(function(snapshot) {
            cateProduct(snapshot);
            // cateProductList = snapshot
        });
        await  loadShippingData();
        await  getUnitList();
        if (get_value_url != "")
        {
           await dataShowProduct(get_value_url);
        }
        
        $("#form_add_Product #add_productSelectionName").keyup(function(){
            $("#form_add_Product #table_select_name").text($(this).val());
        });
        $("#form_view_Product #view_productSelectionName").keyup(function(){
            $("#form_view_Product  #table_select_name").text($(this).val());
        });
        seletionName();

        $("#addImage0").click(function(){
            $("#inputAddImage0").trigger("click");
            PreviewImage("#inputAddImage0","#addImage0","#image-holder-banner","918","420","delImage0","inputAddImage0-1");
            readfileInput("inputAddImage0","inputAddImage0-1","918","420");
        });
        $("#addImage1").click(function(){
            $("#inputAddImage1").trigger("click");
            PreviewImage("#inputAddImage1","#addImage1","#image-holder1","800","800","delImage1","inputAddImage1-1");
            readfileInput("inputAddImage1","inputAddImage1-1","800","800");
        });
        $("#addImage2").click(function(){
            $("#inputAddImage2").trigger("click");
            PreviewImage("#inputAddImage2","#addImage2","#image-holder2","800","800","delImage2","inputAddImage2-1");
            readfileInput("inputAddImage2","inputAddImage2-1","800","800");
        });
        $("#addImage3").click(function(){
            $("#inputAddImage3").trigger("click");
            PreviewImage("#inputAddImage3","#addImage3","#image-holder3","163","140","delImage3","inputAddImage3-1");
            readfileInput("inputAddImage3","inputAddImage3-1","800","800");
        });
        $("#addImage4").click(function(){
            $("#inputAddImage4").trigger("click");
            PreviewImage("#inputAddImage4","#addImage4","#image-holder4","800","800","delImage4","inputAddImage4-1");
            readfileInput("inputAddImage4","inputAddImage4-1","800","800");
        });
        $("#addImage5").click(function(){
            $("#inputAddImage5").trigger("click");
            PreviewImage("#inputAddImage5","#addImage5","#image-holder5","163","800","delImage5","inputAddImage5-1");
            readfileInput("inputAddImage5","inputAddImage5-1","800","800");
        });
        $("#addImage6").click(function(){
            $("#inputAddImage6").trigger("click");
            PreviewImage("#inputAddImage6","#addImage6","#image-holder6","800","800","delImage6","inputAddImage6-1");
            readfileInput("inputAddImage6","inputAddImage6-1","800","800");
        });

        $("#isVariation").change(function() {
            if (this.checked) {
                $('#product_selection').show();
            } else {
                $('#product_selection').hide();
            }
        });

        $('#add_productPrice').keyup(function(e){
            let percent_p = $('#price_fee_percent').text();
            let price = $(this).val();
            if (price.length > 0)
            {
                // $('#price_fee').text(percent_p);
                $('#price_real').text( price - ( (price * percent_p) / 100));
            }else{
                $('#price_real').text(0);
            }
        })
        $('#view_productPrice').keyup(function(e){
            let percent_p = $('#price_fee_percent').text();
            let price = $(this).val();
            if (price.length > 0)
            {
                // $('#price_fee').text(percent_p);
                $('#price_real').text( price - ( (price * percent_p) / 100));
            }else{
                $('#price_real').text(0);
            }
        })
    };

    //view
    function dataShowProduct(keyProduct){
        let key = fromHex(keyProduct);
        var docRef = db.collection("product").doc(key);
        docRef.get().then(function(doc) {
            if (doc.exists) {
                // console.log('view product : ',doc.data());
                // ข้อมูลทั่วไป
                let unit = 0
                if (doc.data().unit)
                    unit = doc.data().unit;
                $('#view_productname').val(doc.data().name);
                $('#view_productCode').val(doc.data().code);
                $('#view_product_dec').val(doc.data().detail);
                $('#view_productBrand').val(doc.data().brand);
                $('#product_view_fda').val(doc.data().FDA);
                $('#product_view_type').val(doc.data().type);
                $('#product_view_Shelflife').val(doc.data().shelfLife);
                $('#view_product_unit').val(unit);
                $('#rating').val(doc.data().rating);
                // หมวดหมู่
                let cateCode = doc.data().categoryCode;
                let mainCateCode = doc.data().categoryMainCode;
                let subCateCode = doc.data().categorySubCode;
                let category = subCateCode;

                // setTimeout(() => {
                    $('#cateProductCode').val(cateCode);
                    $('#cateProductCode2').val(mainCateCode);
                    $('#cateProductCode3').val(subCateCode);
                    $('#cateProductName').val(doc.data().categoryName);
                    let cateName = "";
                    db.collection("category").doc(cateCode).get().then(function(snapshot) {
                        $('#categoryName').text(snapshot.data().nameTH);
                        if (mainCateCode != ''){
                            snapshot.data().subs.forEach(function(item){
                                if (mainCateCode == item.mainCateCode){
                                    $('#categoryName').text($('#categoryName').text() + " > " + item.nameTH);

                                    if (subCateCode != ''){
                                        item.subs.forEach(function(value){
                                            if (subCateCode == value.subCateCode){
                                                $('#categoryName').text($('#categoryName').text() + " > " + value.nameTH);
                                                
                                            }
                                        })
                                    }
                                }
                            })
                        }
                    });
                // }, 500);

                // ข้อมูลขาย
                $('#view_productPrice').val(doc.data().price);
                $('#view_productInventory').val(doc.data().stock);
                $('#view_product_special_Price').val(doc.data().specialPrice);
                $('#price_real').text(doc.data().realPrice);
                // var elem = document.querySelector('');
                let isVariation = false;
                if (!doc.data().variation){
                    isVariation = true;
                    $('#product_selection').show();
                }else{
                    $('#product_selection').hide();
                }               
                $('#form_view_Product .isVariation').prop('checked', isVariation);
                if (Array.prototype.forEach) {
                    var elems = Array.prototype.slice.call(document.querySelectorAll('#form_view_Product .isVariation'));

                    elems.forEach(function (html) {
                        var switchery = new Switchery(html);
                    });
                } else {
                    var elems = document.querySelectorAll('#form_view_Product .isVariation');

                    for (var i = 0; i < elems.length; i++) {
                        var switchery = new Switchery(elems[i]);
                    }
                }

                //ข้อมูลสื่อ
                //cover
                let coverImage = doc.data().coverImage;
                if (coverImage != ""){
                    $('#imageCover').attr('src',coverImage);
                    $('#image-holder-banner').show();
                    $('#addImage0').hide();
                    $('#inputAddImage0').value = (coverImage);
                }
                let image1 = doc.data().images[0].imgUrl;
                if (image1 != ""){
                    $('#image1').attr('src',image1);
                    $('#image-holder1').show();
                    $('#addImage1').hide();
                    $('#image1').value = (image1);
                }
                let image2 = doc.data().images[1].imgUrl;
                if (image2 != ""){
                    $('#image2').attr('src',image2);
                    $('#image-holder2').show();
                    $('#addImage2').hide();
                    $('#image2').value = (image2);
                }
                let image3 = doc.data().images[2].imgUrl;
                if (image3 != ""){
                    $('#image3').attr('src',image3);
                    $('#image-holder3').show();
                    $('#addImage3').hide();
                    $('#image3').value = (image3);
                }
                let image4 = doc.data().images[3].imgUrl;
                if (image4 != ""){
                    $('#image4').attr('src',image4);
                    $('#image-holder4').show();
                    $('#addImage4').hide();
                    $('#image4').value = (image4);
                }
                let image5 = doc.data().images[4].imgUrl;
                if (image5 != ""){
                    $('#image5').attr('src',image5);
                    $('#image-holder5').show();
                    $('#addImage5').hide();
                    $('#image5').value = (image5);
                }
                let image6 = doc.data().images[5].imgUrl;
                if (image6 != ""){
                    $('#image6').attr('src',image6);
                    $('#image-holder6').show();
                    $('#addImage6').hide();
                    $('#image6').value = (image6);
                }
                $('#view_productBrand').val(doc.data().brand);
                $('#view_product_minPurchase').val(doc.data().minPurchase);

                //ข้อมูลการส่ง
                $('#shipping_weight').val(doc.data().shipping.weight);
                $('#shipping_w').val(doc.data().shipping.parcelSize.W);
                $('#shipping_l').val(doc.data().shipping.parcelSize.L);
                $('#shipping_h').val(doc.data().shipping.parcelSize.H);

                // $('#kerry_').prop('checked',doc.data().shipping.shippingFee[0].isActive);
                // $('#thaiPost_').prop('checked',doc.data().shipping.shippingFee[1].isActive);
                // $('#kerry_price').val(doc.data().shipping.shippingFee[0].price);
                // $('#thaiPost_price').val(doc.data().shipping.shippingFee[1].price);

                $.each(doc.data().shipping.shippingFee, function( i, item ){
                    $('#' + item.code).prop('checked', item.isActive);
                    $('#' + item.code + 'price').val(item.price);
                });

                $('#view_productBrand').val(doc.data().brand);
                $('#view_productBrand').val(doc.data().brand);
                $('#view_productBrand').val(doc.data().brand);
                $('#view_productBrand').val(doc.data().brand);
                $('#view_productBrand').val(doc.data().brand);
                $('#view_productBrand').val(doc.data().brand);
                $('#view_productBrand').val(doc.data().brand);
                $('#view_productBrand').val(doc.data().brand);
                $('#view_productBrand').val(doc.data().brand);
                


            } else {
                window.location.href = contentUrl + 'productList';
            }
        }).catch(function(error) {
            console.log("Error getting document:", error);
        });
    }
    
    //update product
    $( "#form_view_Product" ).submit(function( e ) {
        e.preventDefault();
        var data = $(this).serializeFormJSON();
        let key = fromHex(get_value_url);
        var productData = new Object();
        productData.userId = userId;
        productData.name = data.view_productname;
        productData.code = data.view_productCode;
        productData.detail = data.view_product_dec;
        productData.categoryCode = data.cateProductCode;
        productData.categoryMainCode = data.cateProductCode2;
        productData.categorySubCode = data.cateProductCode3;
        productData.categoryName = data.cateProductName;
        productData.brand = data.view_productBrand;

        productData.type = data.product_view_type;

        productData.isActive = true;
        productData.isReady = true;
        productData.shelfLife = data.product_view_Shelflife;
        productData.FDA = data.product_view_fda;
        productData.price = data.view_productPrice;
        productData.specialPrice = data.view_product_special_Price;

        let stockProduct = data.view_productInventory;
        if (stockProduct == ""){
            stockProduct = 0;
        }
        productData.stock = parseInt(stockProduct);
        productData.isUseSPrice = true;
        productData.minPurchase = data.view_product_minPurchase;
        productData.insertDate = firebase.firestore.Timestamp.fromDate(new Date());
        productData.realPrice = $('#price_real').text();
        productData.commission  = $('#price_fee').text();
        productData.rating = data.rating;
        productData.unit = data.view_product_unit;
        var variation = [];
        var options;
        var price;
        var stock;
        var SKU;
        if ($("#form_view_Product #isVariation").is(":checked") == true){
            $('#form_view_Product #table_seletion > tbody > tr').each(function(i,item){
                var optionsData = $(this).find(".options").html();
                var priceData = $(this).find('input[name$="selectionPrice'+ i +'"]').val();
                var stockData = $(this).find('input[name$="selectionPriceInventory'+ i +'"]').val();
                var skuData = $(this).find('input[name$="selectionPriceSKU'+ i +'"]').val();
                variation.push({
                    name : data.add_productSelectionName,
                    options : optionsData,
                    price : priceData,
                    stock : stockData,
                    SKU : skuData
                });
            })
        }

        productData.variation = variation;

        var shippingFeeData = [];
        db.collection("shipping").get()
        .then(function(querySnapshot) {
            querySnapshot.forEach(function(doc) {
                let price = '';
                let checked = ''; 
                $('#'+ doc.data().code +':checked').each(function() 
                {
                    checked =  $(this).val();
                });
                let isActive = false;
                if (checked == "on"){
                    isActive = true;
                    price = $('#'+ doc.data().code + 'price').val();
                }  
                shippingFeeData.push({
                    isActive : isActive,
                    name : doc.data().name,
                    price : price,
                    code : doc.data().code
                });                            
            });
        })
        .catch(function(error) {
            console.log("Error getting documents: ", error);
        });
        productData.shipping = {
            weight : "",
            parcelSize : { 
                W:data.shipping_w,
                L:data.shipping_l,
                H:data.shipping_h
            },
            shippingFee : shippingFeeData
        }

        var coverPhoto_file = $("#form_view_Product #inputAddImage0").get(0).files[0];
        var image1_file = $("#form_view_Product #inputAddImage1").get(0).files[0];
        var image2_file = $("#form_view_Product #inputAddImage2").get(0).files[0];
        var image3_file = $("#form_view_Product #inputAddImage3").get(0).files[0];
        var image4_file = $("#form_view_Product #inputAddImage4").get(0).files[0];
        var image5_file = $("#form_view_Product #inputAddImage5").get(0).files[0];
        var image6_file = $("#form_view_Product #inputAddImage6").get(0).files[0];

        var converPhoto = $("#form_view_Product #inputAddImage0-1").val();  
        var image1 = $("#form_view_Product #inputAddImage1-1").val();  
        var image2 = $("#form_view_Product #inputAddImage2-1").val();  
        var image3 = $("#form_view_Product #inputAddImage3-1").val();  
        var image4 = $("#form_view_Product #inputAddImage4-1").val();  
        var image5 = $("#form_view_Product #inputAddImage5-1").val();  
        var image6 = $("#form_view_Product #inputAddImage6-1").val();  

        var imageCocverUrl = '';
        var imageUrl1 = '';
        var imageUrl2 = '';
        var imageUrl3 = '';
        var imageUrl4 = '';
        var imageUrl5 = '';
        var imageUrl6 = '';

        if (typeof coverPhoto_file != "undefined"){
           uploadImage(converPhoto,coverPhoto_file).then(function(url){ imageCocverUrl = url; });
        }else{
            if ($('#imageCover').attr('src') == ""){
                imageCocverUrl = "";
            }else{
                imageCocverUrl = $('#imageCover').attr('src');
            }
        }   
        if (typeof image1_file != "undefined"){
            uploadImage(image1,image1_file).then(function(url){ imageUrl1 = url; });
        }else{
            if ($('#image1').attr('src') == ""){
                imageUrl1 = "";
            }else{
                imageUrl1 = $('#image1').attr('src');
            }
        } 
        if (typeof image2_file != "undefined"){
            uploadImage(image2,image2_file).then(function(url){ imageUrl2 = url; });
        }else{
            if ($('#image2').attr('src') == ""){
                imageUrl2 = "";
            }else{
                imageUrl2 = $('#image2').attr('src');
            }
        }
        if (typeof image3_file != "undefined"){
            uploadImage(image3,image3_file).then(function(url){ imageUrl3 = url; });
        }else{
            if ($('#image3').attr('src') == ""){
                imageUrl3 = "";
            }else{
                imageUrl3 = $('#image3').attr('src');
            }
        }
        if (typeof image4_file != "undefined"){
            uploadImage(image4,image4_file).then(function(url){ imageUrl4 = url; });
        }else{
            if ($('#image4').attr('src') == ""){
                imageUrl4 = "";
            }else{
                imageUrl4 = $('#image4').attr('src');
            }
        }
        if (typeof image5_file != "undefined"){
            uploadImage(image5,image5_file).then(function(url){ imageUrl5 = url; });
        }else{
            if ($('#image5').attr('src') == ""){
                imageUrl5 = "";
            }else{
                imageUrl5 = $('#image5').attr('src');
            }
        }
        if (typeof image6_file != "undefined"){
            uploadImage(image6,image6_file).then(function(url){ imageUrl6 = url; });
        }else{
            if ($('#image6').attr('src') == ""){
                imageUrl6 = "";
            }else{
                imageUrl6 = $('#image6').attr('src');
            }
        }
        setTimeout(() => {
            productData.coverImage = imageCocverUrl;
            productData.images = [
                {imgUrl:imageUrl1},
                {imgUrl:imageUrl2},
                {imgUrl:imageUrl3},
                {imgUrl:imageUrl4},
                {imgUrl:imageUrl5},
                {imgUrl:imageUrl6},
            ];
            console.log('data : ',productData);
            //update data
            db.collection("product").doc(key).set(productData)
            .then(function(data) {
                console.log("Document successfully written!");
                console.log('calback : ',data);
                Swal.fire({
                    // title: "Good job!",
                    text: "You clicked the button!",
                    type: "success",
                    confirmButtonClass: "btn btn-success btn-success-add-product",
                    buttonsStyling: false
                }).then(function(e){ 
                    window.location.href  =  contentUrl + "productList";
                });           
            })
            .catch(function(error) {
                console.error("Error writing document: ", error);
            });
         }, 1000);
    });

//add and view
async function cateProduct(data){
    // console.log(data);
    var cateProductList1,cateProductList2,cateProductList3 = "";
    var listCate,listSubCate1;
    var getUrl = window.location;
    var lang = getUrl.pathname.split('/')[2];
    let percent_price = 0;
    // $.getJSON("../app-assets/data/cate.json", function (data) {
        //$.each(data, function(i, item) {
            // alert(1);
        let isAdmin = await getIsAdmin();          
        // if (userId == 'GYHZ9VtvXXaTwFmI2y9UtjxAfuW2'){
        //     isAdmin == true;
        // }
        // console.log(isAdmin);
        data.forEach(function(item) {
            var name;
            if (lang == 'en'){
                name = item.data().nameEN;
            }else{
                name =  item.data().nameTH;
            }
            if (item.data().nameEN != 'World.Mall'){
                cateProductList1 += "<option value='"+ item.data().cateCode +"' code='"+ item.data().cateCode +"'>"+ name +"</option>"; 

            }
            if (isAdmin == true){
                if (item.data().nameEN == 'World.Mall'){
                    cateProductList1 += "<option value='"+ item.data().cateCode +"' code='"+ item.data().cateCode +"'>"+ name +"</option>"; 
                }
            }
          
        });
        listCate = data;
        $('#price_fee_percent').text(percent_price);
        $('#price_fee').text(percent_price);
        $('#cateProduct1').html(cateProductList1);
    // })
    $('#cateProduct1').change(function () {
        var str = "";
        var cateCode = "";
        var cateName= "";
        cateProductList2 = "";
        $("#cateProduct1 option:selected" ).each(function() {
            $("#cateProduct3").html("");
            str += $(this).text();
            var subs;
            var code = $(this).attr('code');
            listCate.forEach(function(item) {
            // $.each(listCate, function(i, item) {            
                if (item.data().cateCode == code){  
                    subs = item.data().subs;
                    cateCode = code;
                    var name;
                    if (lang == 'en'){
                        name = item.data().nameEN;
                    }else{
                        name = item.data().nameTH;
                    }
                    // if (item.data().nameTH == 'ผลิตภัณฑ์แปรรูป'){
                    //     percent_price = 25;
                    // }else{
                    //     percent_price = 35;
                    // }
                    cateName = name;
                    percent_price = item.data().commission;
                    return false;      
                }
            });
            if (subs != null){
                subs.forEach(function(item) {
                    var name;
                    if (lang == 'en'){
                        name = item.nameEN;
                    }else{
                        name = item.nameTH;
                    }
                    cateProductList2 += "<option value='"+ item.mainCateCode +"' code='"+ item.mainCateCode +"'>"+ name +"</option>";        
                })
                listSubCate1 = subs; 
            }

        });
        $('#price_fee_percent').text(percent_price);
        $('#price_fee').text(percent_price);
        $("#cateProduct2" ).html(cateProductList2);
        $("#categoryName" ).text(str).css("color", "green");
        $("#cateProductCode").val(cateCode);
        $("#cateProductCode2").val('');
        $("#cateProductCode3").val('');
        $("#cateProductName").val(cateName);
    })
    $('#cateProduct2').change(function () {
        var str = "";
        var cateCode = "";
        var cateName= "";
        var subs = "";
        cateProductList3 = "";
        $("#cateProduct2 option:selected" ).each(function() {
            str += " > " + $(this).text();
            var code = $(this).attr('code');
            listSubCate1.forEach(function(item) {
            // $.each(listSubCate1, function(i, item) {
                if (item.mainCateCode == code){              
                    subs = item.subs
                    cateCode = code;
                    var name;
                    if (lang == 'en'){
                        name = item.nameEN;
                    }else{
                        name = item.nameTH;
                    }
                    cateName = name;
                    percent_price = item.commission;
                    return false;
                }
            });
            if (subs != null){
                subs.forEach(function(item) {  
                // $.each(subs, function(i,value) {
                    var name;
                    if (lang == 'en'){
                        name = item.nameEN;
                    }else{
                        name = item.nameTH;
                    }
                    cateProductList3 += "<option value='"+ item.subCateCode +"' com='"+ item.commission +"' code='"+ item.subCateCode +"'>"+ name +"</option>";
                })
            }   
        });
        $('#price_fee_percent').text(percent_price);
        $('#price_fee').text(percent_price);
        $( "#cateProduct3" ).html(cateProductList3);
        var cateNameLvl1 = $( "#categoryName").text().split(" > ")[0];
        $( "#categoryName").text( cateNameLvl1 + str).css("color", "green");
        $("#cateProductCode2").val(cateCode);
        $("#cateProductName").val(cateName);
    })
    $('#cateProduct3').change(function () {
        var str = "";
        var cateCode = "";
        var cateName= "";   
        var com = "";   
        $("#cateProduct3 option:selected" ).each(function() {
            str +=" > " + $(this).text();
            cateCode = $(this).attr('code');
            cateName = $(this).text();
            com = $(this).attr('com');
        })
        var cateNameLvl1 = $( "#categoryName").text().split(" > ")[0] + " > " + $( "#categoryName").text().split(" > ")[1];
        $('#price_fee_percent').text(com);
        $('#price_fee').text(com);
        $( "#categoryName").text( cateNameLvl1 + str).css("color", "green");
        $("#cateProductCode3").val(cateCode);
        $("#cateProductName").val(cateName);
    })
    // return 1;
}
function seletionName(){
    $("#product_selection .add_productOption").keyup(function(){ 
        var name = $(this).attr('name');//selection[1][]
        var id = name.split('selection[')[1].split(']')[0];
        $("#add_productOption" + id + " > td").first().text($(this).val()); // add_productOption0
    });
}
function addTableSelection(){
    var id = ($("#product_selection .add_productOption").length);
    $("#table_seletion tr:last").after('<tr id="add_productOption'+ id +'"><td class="options">ตัวเลือก</td><td class="price"><input class="form-control" placeholder="ราคา" name="selectionPrice'+ id +'"></input></td><td class="stock"><input class="form-control" placeholder="คลัง" name="selectionPriceInventory'+ id +'"></input></td><td class="sku"><input class="form-control" placeholder="SKU" name="selectionPriceSKU'+ id +'"></td></tr>');
    setTimeout(function wait(){
        seletionName();
    }, 500);
}
function delTableSelection(del){
    var name = del.getAttribute('name');//selection[1][]
    var id = name.split('selection[')[1].split(']')[0];
    $('#add_productOption'+ id).remove();

    $("#table_seletion tbody tr").each(function(i,item){
        item.id = "add_productOption" + i;
    });
}

async function uploadImage(strBase64,file){
    
        // console.log(strBase64);
        let ref = firebase.storage().ref();
        let name = new Date()+ '-' + file.name;
        let message = strBase64;
        
        const task = ref.child('product/' + name).putString(message, 'data_url');
        return task.then(snapshot => snapshot.ref.getDownloadURL()).then(function(url) {
            console.log(url);
            return url;
        }).catch(function(error) {
            return null;
        });
        // return result;
}

$( "#form_add_Product").submit(async function( e ) {
        e.preventDefault();
        var data = $(this).serializeFormJSON();
        console.log(data);
        var productData = new Object();
        productData.userId = userId;
        productData.name = data.add_productname;
        productData.code = data.add_productCode;
        productData.detail = data.add_product_dec;
        productData.categoryCode = data.cateProductCode;
        productData.categoryMainCode = data.cateProductCode2;
        productData.categorySubCode = data.cateProductCode3;
        productData.categoryName = data.cateProductName;
        productData.brand = data.add_productBrand;
        let shopId = "";
        db.collection("shops").where("userId", "==", userId).get().then(function(querySnapshot) {
        querySnapshot.forEach(function(doc) {
            shopId =  doc.id;
        });
        }).catch(function(error) {
            console.log("Error getting documents: ", error);
        });
        productData.shopId = shopId
        productData.type = data.product_add_type; 
        productData.isActive = true;
        productData.isReady = true;
        productData.shelfLife = data.product_add_Shelflife;
        productData.FDA = data.product_add_fda;
        productData.price = data.add_productPrice;
        productData.specialPrice = data.add_product_special_Price;
        let stockProduct = data.add_productInventory;
        if (stockProduct == ""){
            stockProduct = 0;
        }
        productData.stock = parseInt(stockProduct);
        productData.isUseSPrice = true;
        productData.minPurchase = data.add_product_minPurchase;
        productData.realPrice = $('#price_real').text();
        productData.commission  = $('#price_fee').text();
        productData.rating = "";
        productData.unit = data.add_product_unit;
        var variation = [];
        var options;
        var price;
        var stock;
        var SKU;
        if ($("#form_add_Product #isVariation").is(":checked") == true){
            $('#form_add_Product #table_seletion > tbody > tr').each(function(i,item){
                var optionsData = $(this).find(".options").html();
                var priceData = $(this).find('input[name$="selectionPrice'+ i +'"]').val();
                var stockData = $(this).find('input[name$="selectionPriceInventory'+ i +'"]').val();
                var skuData = $(this).find('input[name$="selectionPriceSKU'+ i +'"]').val();
                variation.push({
                    name : data.add_productSelectionName,
                    options : optionsData,
                    price : priceData,
                    stock : stockData,
                    SKU : skuData
                });
            })
        }

        productData.variation = variation;

        var shippingFeeData = [];
        db.collection("shipping").get()
        .then(function(querySnapshot) {
            querySnapshot.forEach(function(doc) {
                let price = '';
                let checked = ''; 
                $('#'+ doc.data().code +':checked').each(function() 
                {
                    checked =  $(this).val();
                });
                let isActive = false;
                if (checked == "on"){
                    isActive = true;
                    price = $('#'+ doc.data().code + 'price').val();
                }  
                shippingFeeData.push({
                    isActive : isActive,
                    name : doc.data().name,
                    price : price,
                    code : doc.data().code
                });                            
            });
        })
        .catch(function(error) {
            console.log("Error getting documents: ", error);
        });
        // var kerryIsActive = false;
        // var thaiPostIsActive = false;
        // var kerry_price = 0;
        // var thaiPost_price = 0;
        // if (data.kerry_ == "on"){
        //     kerryIsActive = true;
        //     kerry_price = data.kerry_price;
        // }
        // if (data.thaiPost_ == "on"){
        //     thaiPostIsActive = true;
        //     thaiPost_price = data.thaiPost_price;
        // }
        // var shippingFeeData = [
        //     {
        //         isActive : kerryIsActive,
        //         name : "Kerry (max 30kg)",
        //         price : kerry_price
        //     },
        //     {
        //         isActive : thaiPostIsActive,
        //         name : "Thailand Post - EMS (min 0.02kg, max 20kg)",
        //         price : thaiPost_price
        //     }
        // ];
        productData.shipping = {
            weight : "",
            parcelSize : { 
                W:data.shipping_w,
                L:data.shipping_l,
                H:data.shipping_h
            },
            shippingFee : shippingFeeData
        }

        var coverPhoto_file = $("#form_add_Product #inputAddImage0").get(0).files[0];
        var image1_file = $("#form_add_Product #inputAddImage1").get(0).files[0];
        var image2_file = $("#form_add_Product #inputAddImage2").get(0).files[0];
        var image3_file = $("#form_add_Product #inputAddImage3").get(0).files[0];
        var image4_file = $("#form_add_Product #inputAddImage4").get(0).files[0];
        var image5_file = $("#form_add_Product #inputAddImage5").get(0).files[0];
        var image6_file = $("#form_add_Product #inputAddImage6").get(0).files[0];

        var converPhoto = $("#form_add_Product #inputAddImage0-1").val();  
        var image1 = $("#form_add_Product #inputAddImage1-1").val();  
        var image2 = $("#form_add_Product #inputAddImage2-1").val();  
        var image3 = $("#form_add_Product #inputAddImage3-1").val();  
        var image4 = $("#form_add_Product #inputAddImage4-1").val();  
        var image5 = $("#form_add_Product #inputAddImage5-1").val();  
        var image6 = $("#form_add_Product #inputAddImage6-1").val();  

        var imageCocverUrl = '';
        var imageUrl1 = '';
        var imageUrl2 = '';
        var imageUrl3 = '';
        var imageUrl4 = '';
        var imageUrl5 = '';
        var imageUrl6 = '';

        if (typeof coverPhoto_file != "undefined"){
          await uploadImage(converPhoto,coverPhoto_file).then(function(url){ imageCocverUrl = url; });
        }   
        // alert(coverPhoto_file);
        // return false;
        if (typeof image1_file != "undefined"){
            await uploadImage(image1,image1_file).then(function(url){ imageUrl1 = url; });
        }  
        if (typeof image2_file != "undefined"){
            await uploadImage(image2,image2_file).then(function(url){ imageUrl2 = url; });
        }
        if (typeof image3_file != "undefined"){
            await uploadImage(image3,image3_file).then(function(url){ imageUrl3 = url; });
        }
        if (typeof image4_file != "undefined"){
            await  uploadImage(image4,image4_file).then(function(url){ imageUrl4 = url; });
        }
        if (typeof image5_file != "undefined"){
            await  uploadImage(image5,image5_file).then(function(url){ imageUrl5 = url; });
        }
        if (typeof image6_file != "undefined"){
            await uploadImage(image6,image6_file).then(function(url){ imageUrl6 = url; });
        }
        // setTimeout(() => {

            productData.coverImage = imageCocverUrl;
            productData.images = [
                {imgUrl:imageUrl1},
                {imgUrl:imageUrl2},
                {imgUrl:imageUrl3},
                {imgUrl:imageUrl4},
                {imgUrl:imageUrl5},
                {imgUrl:imageUrl6},
            ];
            // console.log(productData)
            // return false;
            //insert data
            db.collection("product").doc().set(productData)
            .then(function(data) {
                console.log("Document successfully written!");
                console.log('calback : ',data);
                Swal.fire({
                    // title: "Good job!",
                    text: "You clicked the button!",
                    type: "success",
                    confirmButtonClass: "btn btn-success btn-success-add-product",
                    buttonsStyling: false
                }).then(function(e){ 
                    window.location.href  =  contentUrl + "productList";
                });           
            })
            .catch(function(error) {
                console.error("Error writing document: ", error);
            });
            // console.log(productData);
        //  }, 2000);
    });

    //load shipping data
    function loadShippingData(){
        db.collection("shipping").get()
        .then(function(querySnapshot) {
            let tr = '';
            querySnapshot.forEach(function(doc) {
                tr += '<tr>';
                tr += '<th><input type="checkbox" name="'+ doc.data().code +'" id="'+ doc.data().code +'"></th>';
                tr += '<td id="'+ doc.data().code +'name">'+ doc.data().name +'</td>';
                tr += '<td><input type="text" id="'+ doc.data().code +'price" class="form-control" name="'+ doc.data().code +'price"></td>';
                tr += '</tr>';                                                 
            });
            $('#table_shipping tbody').append(tr);
        })
        .catch(function(error) {
            console.log("Error getting documents: ", error);
        });
    }

    function getUnitList(){
        db.collection("admin_").doc('unit').get().then(function(doc){
            $('.unit_product_list').html('');
            $('.unit_product_list').append('<option value="0">Select Option</option>');
            doc.data().unitList.forEach(function(item){
                $('.unit_product_list').append('<option value="'+ item.nameTH +'">'+ item.nameTH +'</option>');
            })
        })
    }

    function getIsAdmin(){
        return new Promise((resolve, reject) => {
            let isAdmin = false;
            let getUser = db.collection("admin_").doc('users');
            getUser.get().then(function(doc){
            doc.data().userList.forEach(function(item2,i){
                    if (userEmail== item2.email){
                        if (item2.isActive == true){
                            isAdmin = true;
                            return false;
                        }else{
                            // isAdmin = false;
                        }
                    }else{
                        // isAdmin = false;
                        // resolve(true);
                    }
                })
                // console.log(isAdmin);
                resolve(isAdmin);
            })
            
            
        });  
    }
    //end load shipping data
</script>