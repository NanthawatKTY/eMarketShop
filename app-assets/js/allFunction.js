var header = document.getElementById("main-menu");
var btns = header.getElementsByTagName("li");
for (var i = 0; i < btns.length; i++) {
    var current = btns[i].getElementsByClassName("active");
    if (current.length > 0){
       document.getElementById("title-menu").textContent = current[0].textContent;
    }
}

function getCategoryProduct(e){
    var getCode = e.getAttribute('data-id');
    document.getElementById(getCode).style.display= "block";
}

function PreviewImage(inputId,btnId,showImageId,w,h,delId,newInput) {
    $(inputId).on('change', function (inp) {
        console.log(inp.target.files.length);
        if (inp.target.files.length != 0){
            var FileSize = inp.target.files[0].size / 1024 / 1024; // in MB
            if (FileSize > 2) {
                // alert('File size exceeds 2 MB');
                // $(this).val(null);
            }else{
                var countFiles = inp.target.files.length;  
                var imgPath = inp.target.value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $(showImageId);
                image_holder.show();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof (FileReader) != "undefined") {
                        for (var i = 0; i < countFiles; i++) {  
                            var reader = new FileReader();
                            // console.log();
                            reader.onload = function (e) {
                                $(showImageId + " > img").attr('src', e.target.result);
                            }
                            $("#" + delId).on("click",function () {
                                inp.target.value = null;                    
                                $(image_holder).hide();
                                $(btnId).show();
                                $("#" + newInput).val('');
                            })
                            reader.readAsDataURL(inp.target.files[i]);
                            $(btnId).hide();
                        }
                    } else {
                        console.log("This browser does not support FileReader.");
                    }
                } else {
                    console.log("Pls select only images");
                }
            }
        }
    });
} 

function delImage(event){
    let id = event.id;
    var num = id.match(/[\d\.]+/g);
    if (num=='0'){
        $('#image-holder-banner').hide();
        $('#addImage0').show();
        $('#imageCover').attr('src','');
    }else{
        $('#image-holder' + num).hide();
        $('#addImage' + num).show();
        $('#image' + num).attr('src','');
    }
}

//RESIZE IMAGE
function processfile(file,newInputId,w,h) {
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
        var resized = resizeMe(image,w,h);
        var newinput = document.getElementById(newInputId);
        newinput.value = resized; 
      }
    };
}

function readfiles(files,input,newInputId,w,h) {
    for (var i = 0; i < files.length; i++) {
      processfile(files[i],newInputId,w,h);
    }
}

function readfileInput(inputId,newInputId,w,h){
    let input = document.getElementById(inputId)
    input.onchange = function(){
    if ( !( window.File && window.FileReader && window.FileList && window.Blob ) ) {
        console.log('The File APIs are not fully supported in this browser.');
        return false;
        }
        readfiles(input.files,input,newInputId,w,h);
    }
}

function resizeMe(img,w,h) {
  var canvas = document.createElement('canvas');
  var width = img.width;
  var height = img.height;
  canvas.width = w;
  canvas.height = h;
  var ctx = canvas.getContext("2d");
  ctx.drawImage(img, 0, 0, w, h);
  return canvas.toDataURL("image/jpeg",0.7); 
}
//END RESIZE IMAGE

// select ตำบล อำเภอ จัดหวัด
function getAddressData(){
    $.Thailand({
        $district: $('#addresSD'), // input ของตำบล
        $amphoe: $('#addresD'), // input ของอำเภอ
        $province: $('#addresP'), // input ของจังหวัด
        $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
    });
}
// end select ตำบล อำเภอ จัดหวัด

//check 2MB file

$('.checkFileSize').change(function(){
    var FileSize = $(this).get(0).files[0].size / 1024 / 1024; // in MB
    if (FileSize > 2) {
        alert('File size exceeds 2 MB');
        $(this).val(null);
    }
})

function confirmPass(path){
    $('#btn_click_confirm').attr('data-path',path);
    $('#btnConfirmPass').trigger("click");

}

function checkPassword(){
    let url = $('#btn_click_confirm').attr('data-path');
    let pass = document.getElementById('confirmPassWord').value;
    let user = firebase.auth().currentUser;
    let baseUrl = window.location.origin;
    let pathUrl = window.location.pathname;
    let pathName = pathUrl.split('/th/');
    let url2 = baseUrl;
    if (pathUrl === pathName[0]){
        pathName = pathUrl.split('/en/');
        url2 = url2 + pathName[0] + '/en/' + url;
    }else{
        url2 = url2 + pathName[0] + '/th/' + url;
    }
    firebase.auth().signInWithEmailAndPassword(user.email, pass.trim())
    .then(function(result) {
        window.location.href = url2;
    }).catch(function(error) {
        alert('รหัสผ่านผิด!', 'Error!');
    });
}

function getTimeAMPM(type,dateStr){
    // let timestampInMilliSeconds = item.val().timestamp*1000; //as JavaScript uses milliseconds; convert the UNIX timestamp(which is in seconds) to milliseconds.
    let date = new Date(dateStr); //create the date object

    let day = (date.getDate() < 10 ? '0' : '') + date.getDate(); //adding leading 0 if date less than 10 for the required dd format
    let month = (date.getMonth() < 9 ? '0' : '') + (date.getMonth() + 1); //adding leading 0 if month less than 10 for mm format. Used less than 9 because javascriptmonths are 0 based.
    let year = date.getFullYear(); //full year in yyyy format

    let hours = ((date.getHours() % 12 || 12) < 10 ? '0' : '') + (date.getHours() % 12 || 12); //converting 24h to 12h and using 12 instead of 0. also appending 0 if hour less than 10 for the required hh format
    let minutes = (date.getMinutes() < 10 ? '0' : '') + date.getMinutes(); //adding 0 if minute less than 10 for the required mm format
    let meridiem = (date.getHours() >= 12) ? 'pm' : 'am'; //setting meridiem if hours24 greater than 12

    let formattedDate = day + '-' + month + '-' + year + ' at ' + hours + ':' + minutes + ' ' + meridiem;
    switch (type) {
        case 'time':
            let time = hours + ':' + minutes + ' ' + meridiem;
            return time;
            break;
        
        case 'date':
            let date = day + '-' + month + '-' + year ;
            return date;
            break;

        default:
            return formattedDate;
            break;
    }
}

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

function convertTHDate(timestamp, formateDay, formatMonth, formatYear){
    let date = new Date(timestamp * 1000);
    const options = {
        day : formateDay,
        month : formatMonth,
        year : formatYear
    };
    return date.toLocaleDateString("th-TH",options);
}

