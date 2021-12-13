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
        getShopData();
        getAddressData();
        // นิติบุคคล, บุคคลธรรมดา
        $('.regis_com').show();
        $('.person_regis').hide();
        $('input[type="radio"][name="type"]').on('ifChecked', function(event){
            if ($(this).val() == "type1"){
                $('.regis_com').show();
                $('.person_regis').hide();
            }else{
                $('.regis_com').hide();
                $('.person_regis').show();
            }
        });
        //end นิติบุคคล, บุคคลธรรมดา

        //image cover & logo
        $('#btn-change-cover').click(function(){
            $('#coverImage').trigger('click');
        })

        $('#logo-shop-img').click(function(){
            $('#logo_shop').trigger('click');
            $('#logo_shop').change(function(val){          
                if ($(this).get(0).files[0]) {
                    var FileSize = $(this).get(0).files[0].size / 1024 / 1024; // in MB
                    if (FileSize > 2) {
                        alert('File size exceeds 2 MB');
                    }else{
                        let reader = new FileReader();               
                        reader.onload = function(e) {
                            $('#logo-shop-img').attr('src', e.target.result);
                            $('#logo_base64').val(e.target.result);
                        }
                        reader.readAsDataURL($(this).get(0).files[0]); // convert to base64 string
                    }

                }
                // $('#logo-shop-img').attr('src',val);
            })
        })        
        //end image cover & logo
    }
    
    // convert cover to base64
    var $uploadCrop,
    tempFilename,
    rawImg,
    imageId;
    function readFiletoBase64(input) {
        if (input.files && input.files[0]) {
            var FileSize = input.files[0].size / 1024 / 1024; // in MB
            if (FileSize > 2) {
                alert('File size exceeds 2 MB');
            }else{
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.upload-demo').addClass('ready');
                    $('#cropImagePop').modal('show');
                    rawImg = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }

        }
        else {
            swal("Sorry - you're browser doesn't support the FileReader API");
        }
    }

    $uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: 980,
            height: 350,
        },
        enforceBoundary: false,
        enableExif: true
    });
    $('#cropImagePop').on('shown.bs.modal', function(){
        $uploadCrop.croppie('bind', {
            url: rawImg
        }).then(function(){
            // console.log('jQuery bind complete');
        });
    });

    $('#coverImage').on('change', function () { 
        imageId = $(this).data('id'); 
        tempFilename = $(this).val();
        $('#cancelCropBtn').data('id', imageId); 
        readFiletoBase64(this); 
    });
    $('#cropImageBtn').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'base64',
            format: 'jpeg',
            size: {width: 980, height: 350}
        }).then(function (resp) {
            $('#back-image-cover').css("background-image", "url('" + resp + "')");
            $('#coverImage_base64').val(resp);
            $('#cropImagePop').modal('hide');
        });
    });
    //

    //form submit
    $( "#form_shop_setting").submit(async function( e ) {
        e.preventDefault();
        var data = $(this).serializeFormJSON();

        var shopData = new Object();
        var contact = new Object();
        var docs = new Object();
        var images = new Object();

        let type = 'นิติบุคคล';
        let nameContact = data.companyName;
        let taxID = '';

        let file1 = $("#form_shop_setting #regis").get(0).files[0];
        let file2 = $("#form_shop_setting #commercial_regis_0403").get(0).files[0];
        let file3 = $("#form_shop_setting #cardID").get(0).files[0];
        let file4 = $("#form_shop_setting #commercial_regis_20").get(0).files[0];

        let fileUrl1 = '';
        let fileUrl2 = '';
        let fileUrl3 = '';
        let fileUrl4 = '';
        if (data.type == 'type2'){
            type = 'บุคคลธรรมดา';
            nameContact = data.nameContact;
        }else{
            if (typeof file1 != "undefined"){
                await uploadFileToFirebase(file1,userId).then(function(url){ fileUrl1 = url; });
            }else{
                if ($('#shop_regis').val() == ""){
                    fileUrl1 = "";
                }else{
                    fileUrl1 = $('#shop_regis').val();
                }
            }  
            if (typeof file2 != "undefined"){
                await uploadFileToFirebase(file2,userId).then(function(url){ fileUrl2 = url; });
            }else{
                if ($('#shop_commercial_regis_0403').val() == ""){
                    fileUrl2 = "";
                }else{
                    fileUrl2 = $('#shop_commercial_regis_0403').val();
                }
            }  
            if (typeof file3 != "undefined"){
                await uploadFileToFirebase(file3,userId).then(function(url){ fileUrl3 = url; });
            }else{
                if ($('#cardID').val() == ""){
                    fileUrl3 = "";
                }else{
                    fileUrl3 = $('#cardID').val();
                }
            }  
            if (typeof file4 != "undefined"){
                await uploadFileToFirebase(file4,userId).then(function(url){ fileUrl4 = url; });
            }else{
                if ($('#shop_commercial_regis_20').val() == ""){
                    fileUrl4 = "";
                }else{
                    fileUrl4 = $('#shop_commercial_regis_20').val();
                }
            } 
            taxID = data.taxID;
        }

        shopData.shopName = data.shopName;
        shopData.taxID = taxID;
        shopData.type = type;
        shopData.description = data.shop_dec;

        contact.address = data.shopAddress;
        contact.subDistrict = data.addresSD;
        contact.district = data.addresD;
        contact.province = data.addresP;
        contact.zipcode = data.zipcode;
        contact.nameContact = nameContact;
        contact.phone = data.shopPhone;
        contact.email = data.shopEmail;
        contact.latitude = null;
        contact.longitude = null;

        let coverImage_file = $("#form_shop_setting #coverImage").get(0).files[0];
        let logo_file = $("#form_shop_setting #logo_shop").get(0).files[0];
        let image1_file = $("#form_shop_setting #inputAddImage1").get(0).files[0];
        let image2_file = $("#form_shop_setting #inputAddImage2").get(0).files[0];
        let image3_file = $("#form_shop_setting #inputAddImage3").get(0).files[0];
        let image4_file = $("#form_shop_setting #inputAddImage3").get(0).files[0];

        let coverImage = $("#form_shop_setting #coverImage_base64").val();  
        let logo = $("#form_shop_setting #logo_base64").val();  
        let image1 = $("#form_shop_setting #inputAddImage1-1").val();  
        let image2 = $("#form_shop_setting #inputAddImage2-1").val();  
        let image3 = $("#form_shop_setting #inputAddImage3-1").val();
        let image4 = $("#form_shop_setting #inputAddImage3-1").val();

        let coverImageUrl = '';
        let logoUrl = '';
        let imageUrl1 = '';
        let imageUrl2 = '';
        let imageUrl3 = '';
        let imageUrl4 = '';

        if (typeof coverImage_file != "undefined"){
           await uploadImageByUID(coverImage,coverImage_file,userId).then(function(url){ coverImageUrl = url; });
        }else{
            if ($('#coverImage_base64').val() == ""){
                coverImageUrl = "";
            }else{
                coverImageUrl = $('#coverImage_base64').val();
            }
        } 
        if (typeof logo_file != "undefined"){
            await uploadImageByUID(logo,logo_file,userId).then(function(url){ logoUrl = url; });
        }else{
            if ($('#logo_base64').val() == ""){
                logoUrl = "";
            }else{
                logoUrl = $('#logo_base64').val();
            }
        } 
        if (typeof image1_file != "undefined"){
            await uploadImageByUID(image1,image1_file,userId).then(function(url){ imageUrl1 = url; });
        }else{
            if ($('#image1').attr('src') == ""){
                imageUrl1 = "";
            }else{
                imageUrl1 = $('#image1').attr('src');
            }
        }   
        if (typeof image2_file != "undefined"){
            await uploadImageByUID(image2,image2_file,userId).then(function(url){ imageUrl2 = url; });
        }else{
            if ($('#image2').attr('src') == ""){
                imageUrl2 = "";
            }else{
                imageUrl2 = $('#image2').attr('src');
            }
        } 
        if (typeof image3_file != "undefined"){
            await uploadImageByUID(image3,image3_file,userId).then(function(url){ imageUrl3 = url; });
        }else{
            if ($('#image3').attr('src') == ""){
                imageUrl3 = "";
            }else{
                imageUrl3 = $('#image3').attr('src');
            }
        }
        if (typeof image4_file != "undefined"){
            await uploadImageByUID(image4,image4_file,userId).then(function(url){ imageUrl4 = url; });
        }else{
            if ($('#image4').attr('src') == ""){
                imageUrl4 = "";
            }else{
                imageUrl4 = $('#image3').attr('src');
            }
        } 
        // setTimeout(() => {
            shopData.images = [
                {imgUrl:imageUrl1},
                {imgUrl:imageUrl2},
                {imgUrl:imageUrl3}
            ];

            docs.cardID =  fileUrl3;
            docs.commercial_regis_0403 =  fileUrl2;
            docs.commercial_regis_20 =  fileUrl4;
            docs.regis =  fileUrl1;

            shopData.logo = logoUrl;
            shopData.coverImage = coverImageUrl;
            shopData.contact = contact;
            shopData.docs = docs;

            db.collection("shops").doc(userId).set(shopData)
            .then(function(data) {
                console.log("Document successfully written!");
                console.log('calback : ',data);
                Swal.fire({
                    text: "You clicked the button!",
                    type: "success",
                    confirmButtonClass: "btn btn-success btn-success-add-product",
                    buttonsStyling: false
                }).then(function(e){ 
                    window.location.href  =  contentUrl + "setting";
                });           
            })
            .catch(function(error) {
                console.error("Error writing document: ", error);
            });
        // }, 2000);
        
    })
    //end submit

    //get shops data
    function getShopData(){
        // let key = fromHex(keyProduct);
        // setTimeout(() => {
            db.collection("shops").doc(userId).get().then(function(doc) {
                if (doc.exists) {
                    let data = doc.data();
                    // console.log('get shop data : ', shopData);
                    $('#title-shop').text(data.shopName);
                    $('#shopName').val(data.shopName);
                    $('#shop_dec').val(data.description);
                    $('#shop_dec').val(data.description);

                    let type = data.type;                   
                    if (type == "นิติบุคคล"){
                        $('#type1').iCheck('check');
                        $('#type2').iCheck('uncheck');
                        
                        //docs
                        let file1 = '';
                        let file2 = '';
                        let file3 = '';
                        let file4 = '';
                        if (data.docs.cardID != ""){
                            file1 = '<li><a href="'+ data.docs.cardID +'" target="_blank">บัตรประชาชนกรรมการผู้มีอำนาจลงนาม</a></li>';
                            $('#shop_cardID').val(data.docs.cardID);
                        }
                            
                        if (data.docs.commercial_regis_0403 != ""){
                            file2 = '<li><a href="'+ data.docs.commercial_regis_0403 +'" target="_blank">ใบทะเบียนพาณิชย์ (แบบ ภพ.0403)</a></li>';
                            $('#shop_commercial_regis_0403').val(data.docs.commercial_regis_0403);
                        }
                            
                        if (data.docs.commercial_regis_20 != ""){
                            file3 = '<li><a href="'+ data.docs.commercial_regis_20 +'" target="_blank">ใบทะเบียนพาณิชย์ (แบบ ภพ.20)</a></li>';
                            $('#shop_commercial_regis_20').val(data.docs.commercial_regis_20);
                        }
                            
                        if (data.docs.regis != ""){
                            file4 = '<li><a href="'+ data.docs.regis +'" target="_blank">หนังสือรับรองการจดทะเบียน</a></li>';
                            $('#shop_regis').val(data.docs.regis);
                        }  
                            
                        $('#file_docs').html('');
                        $('#file_docs').append( file1 + file2 + file3 + file4 );


                    }else{
                        $('#type2').iCheck('check');
                        $('#type1').iCheck('uncheck');
                    }

                    if (data.contact != null){
                        $('#companyName').val(data.contact.nameContact);
                        $('#shopAddress').val(data.contact.address);
                    
                        $('#addresSD').val(data.contact.subDistrict);
                        $('#addresD').val(data.contact.district);
                        $('#addresP').val(data.contact.province);
                        $('#zipcode').val(data.contact.zipcode);
                        $('#shopPhone').val(data.contact.phone);
                        $('#shopEmail').val(data.contact.email);
                    }


                    $('#taxID').val(data.taxID);
                    //สื่อ
                    if (doc.data().images != null){
                        let image1 = doc.data().images[0].imgUrl;
                        if (image1 != ""){
                            $('#form_shop_setting #image1').attr('src',image1);
                            $('#form_shop_setting  #image-holder1').show();
                            $('#form_shop_setting  #addImage1').hide();
                            $('#form_shop_setting  #image1').value = (image1);
                        }
                        let image2 = doc.data().images[1].imgUrl;
                        if (image2 != ""){
                            $('#form_shop_setting  #image2').attr('src',image2);
                            $('#form_shop_setting  #image-holder2').show();
                            $('#form_shop_setting  #addImage2').hide();
                            $('#form_shop_setting  #image2').value = (image2);
                        }
                        let image3 = doc.data().images[2].imgUrl;
                        if (image3 != ""){
                            $('#form_shop_setting  #image3').attr('src',image3);
                            $('#form_shop_setting  #image-holder3').show();
                            $('#form_shop_setting  #addImage3').hide();
                            $('#form_shop_setting  #image3').value = (image3);
                        }
                        let coverImg = doc.data().coverImage;
                        if (coverImg != ""){
                            $('#back-image-cover').css('background-image','url("'+ coverImg +'")');
                            $('#coverImage_base64').val(coverImg);
                        }  
                    }

                    let logo_img = doc.data().logo;
                    if (logo_img != ""){
                        $('#logo-shop-img').attr('src',logo_img);
                        $('#logo_base64').val(logo_img);
                    }

                    
                } else {
                    // window.location.href = contentUrl + 'setting';
                }
            }).catch(function(error) {
                console.log("Error getting document:", error);
            });
        // }, 1000);
    }
    //end get shops data

    //upload file
    async function uploadFileToFirebase(file,uid){

        let ref = firebase.storage().ref();
        let name = new Date()+ '-' + file.name;
        let metadata = {
            contentType:file.type
        }

        const task = ref.child(uid + '/' + name).put(file,metadata);
        return task.then(snapshot => snapshot.ref.getDownloadURL()).then(function(url) {
            console.log(url);
            return url;
        }).catch(function(error) {
            return null;
        });

    }
    //end upload file

    //upload image
    async function uploadImageByUID(strBase64,file,uid){
        // console.log(strBase64);
        let ref = firebase.storage().ref();
        let name = new Date()+ '-' + file.name;
        let message = strBase64;
        
        const task = ref.child(uid + '/' + name).putString(message, 'data_url');
        return task.then(snapshot => snapshot.ref.getDownloadURL()).then(function(url) {
            // console.log(url);
            return url;
        }).catch(function(error) {
            return null;
        });
    }
    //end upload image

//image
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
    PreviewImage("#inputAddImage4","#addImage4","#image-holder4","163","140","delImage4","inputAddImage4-1");
    readfileInput("inputAddImage4","inputAddImage4-1","800","800");
});
//end image
</script>