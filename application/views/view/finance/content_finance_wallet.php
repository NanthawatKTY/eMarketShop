<!-- BEGIN: Content-->
<?php //echo css_asset('daterangepicker.css'); ?>
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 ">
                    <h3 class="content-header-title mb-0">การเงิน<?php //echo lang('productList'); ?></h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url($lang.'/'); ?>"><?php echo lang('menu_home'); ?></a>
                                </li>
                                <li class="breadcrumb-item">การเงิน<?php //echo lang('menu_product'); ?>
                                </li>
                                <li class="breadcrumb-item active">บัญชีธนาคาร<?php //echo lang('productList'); ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12 mb-md-0">
                    <div class="btn-group float-md-right" id="productpPageType" role="group" aria-label="Button group with nested dropdown">
                        <!-- <a class="btn btn-outline-primary active" onclick="chageStatusAcitve(this,'product_list');" href="#" id="clist"><i class="feather icon-list"></i></a>
                        <a class="btn btn-outline-primary" onclick="chageStatusAcitve(this,'product_grid');" href="#" id="cgrid"><i class="feather icon-grid"></i></a> -->
                        <!-- <input type="checkbox" id="isVariation" class="switchery" data-size="xs"/> -->
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Shopping cards section start -->
                <section id="income_page">
                    <div class="row">
                        <div class="col-12 mt-3 mb-1">
                            <div class="">
                                <div class="card-content collapse show">
                                    <div class="row match-height  skin skin-flat" id="productList">
                                    </div>     
                                </div>                           
                            </div>                           
                        </div>
                    </div>           
                </section>               
                <!-- Vertical scrolling table -->
                <section id="income_section">
                    <div class="row">
                        <div class="col-12 printable-content">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <h3  class="mb-2">บัญชีธนาคาร</h3>
                                        <!-- <hr class="mb-2" style="border:2px solid #62c902 !important;"> -->
                                        <div class="row" id="wallet_card">
                                            <!-- <div class="col-md-3 finance_wallet_add">
                                                <a herf="#"><i class="feather icon-file-plus"></i></a>
                                            </div>
                                            <div class="col-md-3 finance_wallet_card ml-1">
                                                <div class="card">
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="avatar avatar-xl mb-1">
                                                                <img src="<?php echo base_url('app-assets/img/bank/kplus.jpg'); ?>" alt="Avatar Image">
                                                            </div>
                                                            <h4>กสิกรไทย</h4>
                                                            <span class="text-success mb-1"><i class="feather icon-check"></i>ตรวจสอบแล้ว</span>
                                                            <h4 class="mb-1">**** 3499</h4>
                                                            <h4 class="mb-1">วัชรเกียรติ บุญเมือง <span class="badge badge-success" style="font-size:10px;">เริ่มต้น</span></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // cards section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    <button type="button" id="btnAddWallet" class="btn btn-outline-warning btn-lg" data-toggle="modal" data-target="#addWalletModal" style="display:none;">Launch Modal</button>
    <!-- Modal -->
    <div class="modal fade text-left" id="addWalletModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel21" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel21">เพิ่มบัญชีธนาคาร</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">ชื่อ - นามสกุล</label>
                                <input type="text" class="form-control" id="wallet_full_name">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">หมายเลขบัตรประชาชน</label>
                                <input type="text" class="form-control" id="wallet_card_id">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">ชื่อนามสกุลตามที่ปรากฎในบัญชีธนาคาร</label>
                                <input type="text" class="form-control" id="wallet_fullname_bank">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput" style="display:inline;">ชื่อธนาคาร</label>
                                <div id="logo_bank" style="display:inline;"></div>
                                <select id="wallet_bank_name" class="form-control">
                                    
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">เลขที่บัญชี</label>
                                <input type="text" class="form-control" id="wallet_bank_no">
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">ตั้งเป็นบัญชีธนาคารหลัก</label>
                                <select id="wallet_bank_default" class="form-control">
                                    <option>true</option>
                                    <option>false</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-md-12 mb-1">
                            <p class="text-center"><i class="feather icon-info" style="color:#ff7e7e;"></i> กรุณาตรวจสอบข้อมูลที่กรอกให้ถูกต้อง หากต้องการแก้ไขกรุณาติดต่อฝ่ายบริการลูกค้า</p>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="ยกเลิก">
                    <input type="button" class="btn btn-outline-primary" id="btn_form_wallet_add"  value="บันทึก">
                </div>
            </div>
        </div>
    </div>

    <button type="button" id="btnAddWallet_detail" class="btn btn-outline-warning btn-lg" data-toggle="modal" data-target="#showWalletModal" style="display:none;">Launch Modal</button>
    <!-- Modal -->
    <div class="modal fade text-left" id="showWalletModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel21" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel21">บัญชีธนาคารเพื่อรับเงิน</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput" class="labelShowWalletDetail">ชื่อ - นามสกุล</label>
                                <p id="wallet_full_name_show"></p>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput" class="labelShowWalletDetail">หมายเลขบัตรประชาชน</label>
                                <p id="wallet_card_id_show"></p>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput" class="labelShowWalletDetail">ชื่อนามสกุลตามที่ปรากฎในบัญชีธนาคาร</label>
                                <p id="wallet_fullname_bank_show"></p>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <div class="res" style="display:inline-block;">
                                    <label for="basicInput" class="labelShowWalletDetail">ชื่อธนาคาร</label>
                                    <div id="logo_bank_show"></div>
                                </div>

                                <p id="wallet_bank_name_show"></p>
                            </fieldset>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput" class="labelShowWalletDetail">เลขที่บัญชี</label>
                                <p id="wallet_bank_no_show"></p>
                            </fieldset>
                        </div>
                        <!-- <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                            <fieldset class="form-group">
                                <label for="basicInput">ตั้งเป็นบัญชีธนาคารหลัก</label>
                                <select id="wallet_bank_default_show" class="form-control">
                                    <option value="true">true</option>
                                    <option value="false">false</option>
                                </select>
                            </fieldset>
                        </div> -->
                        <!-- <div class="col-md-12 mb-1">
                            <p class="text-center"><i class="feather icon-info" style="color:#ff7e7e;"></i> กรุณาตรวจสอบข้อมูลที่กรอกให้ถูกต้อง หากต้องการแก้ไขกรุณาติดต่อฝ่ายบริการลูกค้า</p>
                        </div>
                         -->
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="ปิด">
                    <!-- <input type="button" class="btn btn-outline-primary" id="btn_form_wallet_edit"  value="บันทึก"> -->
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = async function(){
            userId = await userData();

            getBankinfo();
            getShopsWallet(userId);

            $('#wallet_bank_name').change(function(e){
  
                $("#wallet_bank_name option:selected" ).each(function() {
                    let banklogo = $(this).attr('data-src');
                    if (banklogo != '0'){
                        let imgLogo = '<img src="'+ banklogo +'" width="30">';
                        $('#logo_bank').html(imgLogo);
                    }else{
                        $('#logo_bank').html('');
                    }
                })
            })
        }

        function getBankinfo(){
            $('#wallet_bank_name').html('<option class="form-control" data-id="0" data-src="0">เลือกธนาคาร</option>');
            db.collection("bank_info").get().then(function(data) {
                data.forEach(function(doc) {
                    if (doc.exists){
                        let selectOption = '<option class="form-control" data-id="'+ doc.id +'" data-src="'+ doc.data().src +'">'+ doc.data().name +'</option>';
                        $('#wallet_bank_name').append(selectOption);
                    }
                });
            });

        }

        function getShopsWallet(uid){
            let ref = db.collection("shops").doc(uid);
            ref.get().then(function(data){
                if (data.exists){
                    $('#wallet_card').html('');
                    let walletAdd = '<div class="col-md-3 finance_wallet_add ml-1 mb-1" style="min-height:200px;">';
                    walletAdd += '<a herf="#"><i class="feather icon-file-plus"></i></a>';
                    walletAdd += '</div>';
                    $('#wallet_card').html(walletAdd);
                    if (data.data().wallet){
                        data.data().wallet.forEach(function(walletData){
                            // console.log('222 ' ,walletData);
                            showData(walletData);

                        })
                    }
                    $('.finance_wallet_add').click(function(){
                        $('#btnAddWallet').trigger('click');
                    })
                }
            })
        }
        async function showData(walletData){
            let walletCard = '<div class="col-md-3 finance_wallet_card ml-1 mb-1" data-acc="'+ toHex(walletData.accountNo) +'">';
            walletCard += '<div class="card">';
            walletCard += '<div class="card-content">';
            walletCard += '<div class="card-body">';
            walletCard += '<div class="avatar avatar-xl mb-1">';
            let imgLogo = '';
            await db.collection("bank_info").doc(walletData.bankCode).get().then(function(val){
                if(val.exists){
                    walletCard += '<img src="'+ val.data().src +'" alt="Avatar Image">';
                }
            })
           
            walletCard += '</div>';
            walletCard += '<h4>กสิกรไทย</h4>';
            walletCard += '<span class="text-success mb-1"><i class="feather icon-check"></i>ตรวจสอบแล้ว</span>';
            walletCard += '<h4 class="mb-1"> **** '+ walletData.accountNo.substr(walletData.accountNo.length - 4) +'</h4>';

            let isDefault = walletData.setDefault;
            let badge_success = '';
            let setDefault = 'false';
            if (isDefault == true){
                setDefault = 'true';
                badge_success = '<span class="badge badge-success" style="font-size:10px;">เริ่มต้น</span>';
            }

            walletCard += '<h4 class="mb-1">'+ walletData.fullName + ' ' + badge_success +'</h4>';
            walletCard += '</div>';
            walletCard += '</div>';
            walletCard += '</div>';
            walletCard += '</div>';
            walletCard += '</div>';

            $('#wallet_card').append(walletCard);

            $('.finance_wallet_card').click(function(e){
                $('#btnAddWallet_detail').trigger('click');
                getWalletCardDetail($(this).attr('data-acc'));
            })
        }
        
        function getWalletCardDetail(accNo){
            $('#logo_bank_show').html('');
            let ref = db.collection("shops").doc(userId);
            ref.get().then(function(data){
                if (data.exists){
                    if (data.data().wallet){
                        data.data().wallet.forEach(function(walletData){
                            if(walletData.accountNo == fromHex(accNo)){
                                $('#wallet_full_name_show').text(walletData.fullName);
                                $('#wallet_card_id_show').text(walletData.cardId);
                                $('#wallet_fullname_bank_show').text(walletData.accountName);
                                $('#wallet_bank_name_show').text(walletData.bankName);
                                $('#wallet_bank_no_show').text('**** ' + walletData.accountNo.substr(walletData.accountNo.length - 4));
                                
                                db.collection("bank_info").doc(walletData.bankCode).get().then(function(val){
                                    if(val.exists){
                                        $('#logo_bank_show').html('<img src="'+ val.data().src +'" width="30">');
                                    }
                                })
                            }
                        })
                    }
                }
            })
        }

        $('#btn_form_wallet_add').click(function(e){
            e.preventDefault();

            let fullName = $('#wallet_full_name').val();
            let cardId = $('#wallet_card_id').val();
            let bankName = $('#wallet_bank_name').val();
            let accountName = $('#wallet_fullname_bank').val();
            let accountNo = $('#wallet_bank_no').val();
            let setDefault = ($('#wallet_bank_default').val() == 'true');

            if (fullName.trim() == ''){
                toastr.error('กรุณากรอกชื่อ - นามสกุล', 'Error!');
                return false;
            }

            if (cardId.trim() == ''){
                toastr.error('กรุณากรอกหมายเลขบัตรประชาชน', 'Error!');
                return false;
            }

            if (accountName.trim() == ''){
                toastr.error('กรุณากรอกชื่อนามสกุลตามที่ปรากฎในบัญชีธนาคาร', 'Error!');
                return false;
            }

            if (bankName.trim() == 'เลือกธนาคาร'){
                toastr.error('ชื่อธนาคาร', 'Error!');
                return false;
            }

            if (accountNo.trim() == ''){
                toastr.error('เลขที่บัญชี', 'Error!');
                return false;
            }

            let bankCode = $('#wallet_bank_name option:selected').attr('data-id');

            let bankData = new Object(); 
            bankData.fullName = fullName.trim();
            bankData.cardId = cardId.trim();
            bankData.bankName = bankName.trim();
            bankData.accountName = accountName.trim();
            bankData.accountNo = accountNo.trim();
            bankData.setDefault = setDefault;
            bankData.bankCode = bankCode;

            let ref = db.collection("shops").doc(userId);
            ref.get().then(function(data){                
                if (data.exists){
                    let shopData = data.data();
                    if (shopData.wallet){
                        if (setDefault == true){
                            console.log(1);
                            let setFalse = [];
                            shopData.wallet.forEach(function(item){
                                item.setDefault = false;
                                setFalse.push(item)
                            })
                            setFalse.push(bankData)
                            shopData.wallet = [];
                            shopData.wallet = setFalse;
                        }else{
                           shopData.wallet.push(bankData); 
                        }
                    }else{
                        shopData.wallet = [];
                        shopData.wallet.push(bankData);
                    }
                    console.log('data ',shopData);
                    ref.set(shopData).then(function(){
                        console.log('success');
                        window.location.reload();
                    })
                }
            })

            
        })

        // $('#btn_form_wallet_edit').click(function(e){
        //     e.preventDefault();
        //     let setDefault = ($('#wallet_bank_default_show').val() == 'true');
        //     let ref = db.collection("shops").doc(userId);
        //     ref.get().then(function(data){                
        //         if (data.exists){
        //             let shopData = data.data();
        //             if (shopData.wallet){
        //                 if (setDefault == true){
        //                     let setFalse = [];
        //                     shopData.wallet.forEach(function(item){
        //                         item.setDefault = false;
        //                         setFalse.push(item)
        //                     })
        //                     shopData.wallet = [];
        //                     shopData.wallet = setFalse;
        //                 }else{
        //                    shopData.wallet.push(bankData); 
        //                 }
        //             }else{
        //                 shopData.wallet = [];
        //                 shopData.wallet.push(bankData);
        //             }
        //             // console.log('data ',shopData);
        //             // ref.set(shopData).then(function(){
        //             //     console.log('success');
        //             //     window.location.reload();
        //             // })
        //         }
        //     })
        // })
    </script>