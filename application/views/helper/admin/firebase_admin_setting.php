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

        db.collection("category").get().then(function(snapshot) {
            cateProduct(snapshot);
        });

        getUnitList();

        $("#addImage1").click(function(){
            $("#inputAddImage1").trigger("click");
            PreviewImage("#inputAddImage1","#addImage1","#image-holder1","80","100","delImage1","inputAddImage1-1");
            readfileInput2("inputAddImage1","inputAddImage1-1");
        });
    }
    function cateProduct(data){
        let cateProductList1,cateProductList2,cateProductList3 = "";
        let listCate,listSubCate1;
        let getUrl = window.location;
        let lang = getUrl.pathname.split('/')[2];
        let percent_price = 0;
            data.forEach(function(item) {
                let name;
                if (lang == 'en'){
                    name = item.data().nameEN;
                }else{
                    name =  item.data().nameTH;
                }
                cateProductList1 += "<option value='"+ item.data().cateCode +"' code='"+ item.data().cateCode +"'>"+ name +"</option>";
            });
            listCate = data;
            $('#cateProduct1').html(cateProductList1);
            $('#cateProduct1').change(function () {
                let str = "";
                let cateCode = "";
                let cateName= "";
            cateProductList2 = "";
            $("#cateProduct1 option:selected" ).each(function() {
                $("#cateProduct3").html("");
                str += $(this).text();
                let subs;
                let code = $(this).attr('code');
                listCate.forEach(function(item) {    
                    if (item.data().cateCode == code){  
                        subs = item.data().subs;
                        cateCode = code;
                        let name;
                        if (lang == 'en'){
                            name = item.data().nameEN;
                        }else{
                            name = item.data().nameTH;
                        }
                        percent_price = item.data().commission;
                        let image1 = item.data().src;
                        if (image1 != ""){
                            $('#image1').attr('src',image1);
                            $('#image-holder1').show();
                            $('#addImage1').hide();
                            $('#image1').value = (image1);
                        }else{
                            $('#image1').attr('src','');
                            $('#image-holder1').hide();
                            $('#addImage1').show();
                            $('#image1').value = null;
                        }
                        cateName = name;
                        return false;      
                    }
                });
                if (subs != null){
                    subs.forEach(function(item) {
                        let name;
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
            $("#admin_commission_main_cate_code").val(cateCode);
            $("#admin_commission_cate_code").val(cateCode);
            $("#admin_commission_percent").val(percent_price);

            $("#cateProduct2" ).html(cateProductList2);
            $("#categoryName" ).text(str).css("color", "green");
            $("#cateProductCode").val(cateCode);
            $("#cateProductCode2").val('');
            $("#cateProductCode3").val('');
            $("#cateProductName").val(cateName);
        })
        $('#cateProduct2').change(function () {
            let str = "";
            let cateCode = "";
            let cateName= "";
            let subs = "";
            cateProductList3 = "";
            $("#cateProduct2 option:selected" ).each(function() {
                str += " > " + $(this).text();
                let code = $(this).attr('code');
                listSubCate1.forEach(function(item) {
                    if (item.mainCateCode == code){              
                        subs = item.subs
                        cateCode = code;
                        let name;
                        if (lang == 'en'){
                            name = item.nameEN;
                        }else{
                            name = item.nameTH;
                        }
                        cateName = name;
                        percent_price = item.commission;

                        let image1 = item.src;
                        if (image1 != ""){
                            $('#image1').attr('src',image1);
                            $('#image-holder1').show();
                            $('#addImage1').hide();
                            $('#image1').value = (image1);
                        }else{
                            $('#image1').attr('src','');
                            $('#image-holder1').hide();
                            $('#addImage1').show();
                            $('#image1').value = null;
                        }

                        return false;
                    }
                });
                if (subs != null){
                    // console.log('ddddd ',subs);
                    subs.forEach(function(item) {  
                        let name;
                        if (lang == 'en'){
                            name = item.nameEN;
                        }else{
                            name = item.nameTH;
                        }
                        cateProductList3 += "<option value='"+ item.subCateCode +"' code='"+ item.subCateCode +"' comssion='"+ item.commission +"' image_url='"+ item.src +"'>"+ name +"</option>";
                    })
                } 
            });

            $("#admin_commission_mid_cate_code").val(cateCode);
            $("#admin_commission_cate_code").val(cateCode);
            $("#admin_commission_percent").val(percent_price);

            $( "#cateProduct3" ).html(cateProductList3);
            let cateNameLvl1 = $( "#categoryName").text().split(" > ")[0];
            $( "#categoryName").text( cateNameLvl1 + str).css("color", "green");
            $("#cateProductCode2").val(cateCode);
            $("#cateProductName").val(cateName);
        })
        $('#cateProduct3').change(function () {
            let str = "";
            let cateCode = "";
            let cateName= "";   
            $("#cateProduct3 option:selected" ).each(function() {
                str +=" > " + $(this).text();
                cateCode = $(this).attr('code');
                cateName = $(this).text();

                percent_price = $(this).attr('comssion');

                let image1 = $(this).attr('image_url');
                if (image1 != ""){
                    $('#image1').attr('src',image1);
                    $('#image-holder1').show();
                    $('#addImage1').hide();
                    $('#image1').value = (image1);
                }else{
                    $('#image1').attr('src','');
                    $('#image-holder1').hide();
                    $('#addImage1').show();
                    $('#image1').value = null;
                }
            })
            let cateNameLvl1 = $( "#categoryName").text().split(" > ")[0] + " > " + $( "#categoryName").text().split(" > ")[1];

            $("#admin_commission_cate_code").val(cateCode);
            $("#admin_commission_percent").val(percent_price);

            $( "#categoryName").text( cateNameLvl1 + str).css("color", "green");
            $("#cateProductCode3").val(cateCode);
            $("#cateProductName").val(cateName);
        })
    }

    async function update_commission(){
        let mainCate = $('#admin_commission_main_cate_code').val();
        let midCate = $('#admin_commission_mid_cate_code').val();
        let cate = $('#admin_commission_cate_code').val();
        let percent = $('#admin_commission_percent').val();
        if (cate == ""){
            toastr.error('หมวดหมู่ไม่ถูกต้อง!', 'Error!');
            return false;
        }
        if (percent == ""){
            percent = 0;
        }
        let image1_file = $("#admin_commission_setting #inputAddImage1").get(0).files[0];
        let image1 = $("#admin_commission_setting #inputAddImage1-1").val();
        let imageUrl1 = '';
        if (typeof image1_file != "undefined"){
           const src = await uploadImage2(image1_file);
           imageUrl1 = src;
        }else{
            if ($('#image1').attr('src') == ""){
                imageUrl1 = "";
            }else{
                imageUrl1 = $('#image1').attr('src');
            }
        }
        let newCate = new Object();
        db.collection("category").doc(mainCate).get().then(function(doc){
            if (doc.exists) {
                if (cate == doc.data().cateCode){
                    // console.log(true);  
                    newCate.cateCode = doc.data().cateCode;
                    newCate.commission = percent;
                    newCate.nameEN = doc.data().nameEN;
                    newCate.nameTH = doc.data().nameTH;
                    newCate.subs = doc.data().subs;
                    newCate.src = imageUrl1
                    newCate.active = true;
                    // return false;
                }else{

                    newCate.cateCode = doc.data().cateCode;
                    newCate.commission = doc.data().commission;
                    newCate.nameEN = doc.data().nameEN;
                    newCate.nameTH = doc.data().nameTH;
                    newCate.src = doc.data().src;
                    newCate.active = true;
                    newCate.subs = [];
                    

                    if (doc.data().subs != null){

                        $.each(doc.data().subs, function( i, item ) {
                           if(item.mainCateCode == cate && item.cateCode == mainCate){
                                newCate.subs.push({
                                    cateCode: item.cateCode,
                                    commission: percent,
                                    nameEN: item.nameEN,
                                    nameTH: item.nameTH,
                                    mainCateCode:item.mainCateCode,
                                    subs: item.subs,
                                    src: imageUrl1
                                });
                                // console.log('mid sub : ',true);
                           }else{
                                
                                let newCateSubs = new Object();
                                newCateSubs.cateCode = item.cateCode;
                                newCateSubs.commission = item.commission;
                                newCateSubs.nameEN = item.nameEN;
                                newCateSubs.nameTH = item.nameTH;
                                newCateSubs.mainCateCode = item.mainCateCode;
                                newCateSubs.subs = [];
                                newCateSubs.src = item.src;
                                if (item.subs != null){

                                    $.each(item.subs, function( a, value ) {
                                        if (value.subCateCode == cate && midCate == value.mainCateCode){
                                            newCateSubs.subs.push({
                                                commission:percent,
                                                mainCateCode: value.mainCateCode, 
                                                nameEN: value.nameEN,
                                                nameTH: value.nameTH,
                                                subCateCode: value.subCateCode,
                                                src: imageUrl1
                                            });
            
                                        }else{
                                            newCateSubs.subs.push(value);
                                        }

                                    });

                                }
                                newCate.subs.push(newCateSubs);
                           }

                        });

                    }
                }

                
                setTimeout(() => {
                    // console.log('new cate : ',newCate);
                    db.collection("category").doc(mainCate).set(newCate).then(function() {
                        window.location.href = contentUrl + 'adminSetting';
                        console.log("Document update category successfully written!");
                    });
                },1000)

            }
        })
        
    }

    function uploadImage2(file){
        return new Promise((resolve, reject) => {
            let ref = firebase.storage().ref();
            let name = new Date()+ '-' + file.name;
            var metadata = {
                contentType: 'image/png',
            };
            
            const task = ref.child('category/' + name).put(file, metadata);
            return task.then(snapshot => snapshot.ref.getDownloadURL()).then(function(url) {
                resolve(url);
                return url;
            }).catch(function(error) {
                return null;
            });

        });  
        // return result;
    }
    function getUnitList(){
        db.collection("admin_").doc('unit').get().then(function(doc){
            $('#table_admin_unit_list').html('');
            doc.data().unitList.forEach(function(item,i){
                let tr = "<tr>";
                tr += "<td>"+ (i + 1) +"</td>";
                tr += "<td><a href='#' id='unitL"+ i +"' onclick='showUnitData("+ i +")' data-json="+ item +">"+ item.nameTH +"</a></td>";
                tr += "<td>"+ item.symbol +"</td>";
                tr += "<td>"+ item.multiply +"</td>";
                tr += "<td><a href='#' class='del_unit' onclick='del_unit("+ i +")'><i class='fa fa-trash-o'></i></td>";
                tr += "</tr>";
                $('#table_admin_unit_list').append(tr);
            })
        })
    }

    function showUnitData(indexOf){
        db.collection("admin_").doc('unit').get().then(function(doc){
            doc.data().unitList.forEach(function(item,i){
                if (i == indexOf){
                    $('#unit_list_id').val(i);
                    $('#isUpdate').val(i +1);
                    $('#unit_name_th').val(item.nameTH);
                    $('#unit_name_en').val(item.nameEN);
                    $('#unit_symbol').val(item.symbol);
                    $('#unit_multiply').val(item.multiply);
                    // $('#row_del').show();
                    return false
                }
            })
        })
    }

    $('#unit_form').submit(function(e){
        e.preventDefault();
        let data = $(this).serializeFormJSON();
        let updateData = new Object();
        // console.log(data);
        updateData.multiply = data.unit_multiply;
        updateData.nameEN = data.unit_name_en;
        updateData.nameTH = data.unit_name_th;
        updateData.symbol = data.unit_symbol;  
        
        console.log(data.isUpdate == 0);
        if (data.isUpdate == 0){
            //insert
            let insertData = [];
            db.collection("admin_").doc('unit').get().then(function(doc){
                // console.log(doc.data().unitList);
                let getData = doc.data();
                getData.unitList.push(updateData);
                insertData = getData;

                db.collection("admin_").doc('unit').set(insertData).then(function() {
                    window.location.href = contentUrl + 'adminSetting';
                });
            })
        }else{
            //update
            let newData = new Object();
            newData.unitList = [];
            db.collection("admin_").doc('unit').get().then(function(doc){
                console.log(doc.data());
                doc.data().unitList.forEach(function(item,i){
                    if (i == data.unit_list_id){
                        newData.unitList.push(updateData);
                    }else{
                        newData.unitList.push(item);
                    }
                })

                db.collection("admin_").doc('unit').set(newData).then(function() {
                    window.location.href = contentUrl + 'adminSetting';
                });
            })
        }
    })

    function updateIsUpdate(){
        $('#isUpdate').val(0);
    }

    function del_unit(e){
        // let indexOf =  $('#unit_list_id').val();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            confirmButtonClass: "btn btn-primary",
            cancelButtonClass: "btn btn-danger ml-1",
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                let newData = new Object();
                    newData.unitList = [];
                    db.collection("admin_").doc('unit').get().then(function(doc){
                        doc.data().unitList.forEach(function(item,i){
                            if (i == e){
                                // newData.unitList.push(updateData);
                            }else{
                                newData.unitList.push(item);
                            }
                        })

                        db.collection("admin_").doc('unit').set(newData).then(function() {
                            window.location.href = contentUrl + 'adminSetting';
                        });
                    })
                Swal.fire({
                type: "success",
                title: "Deleted!",
                text: "Your file has been deleted.",
                confirmButtonClass: "btn btn-success"
                });
            }
        });
    }

    function processfile2(file,newInputId) {
        if( !( /image/i ).test( file.type ) )
            {
                alert( "File "+ file.name +" is not an image." );
                return false;
            }
        var reader = new FileReader();
        reader.readAsArrayBuffer(file);
        reader.onload = function (event) {
        var blob = new Blob([event.target.result]);
        window.URL = window.URL || window.webkitURL;
        var blobURL = window.URL.createObjectURL(blob);
        
        var image = new Image();
        image.src = blobURL;
        image.onload = function() {
            var resized = resizeMe2(image);
            var newinput = document.getElementById(newInputId);
            newinput.value = resized; 
        }
        };
    }
    function readfiles2(files,input,newInputId,w,h) {
        for (var i = 0; i < files.length; i++) {
            processfile2(files[i],newInputId);
        }
    }

    function readfileInput2(inputId,newInputId,w,h){
        let input = document.getElementById(inputId)
        input.onchange = function(){
        if ( !( window.File && window.FileReader && window.FileList && window.Blob ) ) {
            console.log('The File APIs are not fully supported in this browser.');
            return false;
            }
        readfiles2(input.files,input,newInputId,w,h);
        }
    }

    function resizeMe2(img) {
        var canvas = document.createElement('canvas');
        var width = img.width;
        var height = img.height;
        canvas.width = width;
        canvas.height = height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, width, height);
        return canvas.toDataURL("image/jpeg",0.7); 
    }
</script>