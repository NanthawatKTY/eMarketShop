<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!--Auto-layout columns-->
                <button class="btn btn-warning" style="margin-bottom:10px" onclick="printDiv('pdf_finance')"> <i class="feather icon-printer"></i> Print</button>
                <section id="pdf_finance" class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- <div class="card-header"> -->
                                <div class="card bg-success">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <i class="icon-graph white font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body white text-right">
                                                    <h3>รายงานการเงิน</h3>
                                                    <!-- <span>Bounce Rate</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                            
                            <div class="card-content" style="padding-left:10%;padding-right:10%;">
                                <div class="card-body"  width="595" height="842" style="background:white;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p id="name_" class="finance_font_15">ประวิตร ชวนประเสริฐ</p>
                                            <p id="shopname_">ร้าน Alw cashpos Shop</p>
                                            <p id="address_">The greenerery loft 222/97 ม.5 ต.ท่าศาลา อำเภอเมืองเชียงใหม่ จังหวัดเชียงใหม่ 50000</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p id="" class="finance_font_15">รายงานการเงินสำหรับ <span id="finance_date_start">21 ก.ย. 2020</span> ถึง <span id="finance_date_end">27 ก.ย. 2020</span></p>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>ชื่อผู้ใช้</p>
                                                    <p>ชื่อในบัญชีธนาคาร</p>
                                                    <p>บัญชีธนาคาร</p>
                                                    <p>ชื่อธนาคาร</p>
                                                </div>
                                                <div class="col-md-9">
                                                    <p>: <span id="finance_username">witzyz</span></p>
                                                    <p>: <span id="finance_name_for_bank">ประวิตร ชวนประเสริฐ</span></p>
                                                    <p>: <span id="finance_id_bank">9999999999</span></p>
                                                    <p>: <span id="finance_name_bank">กสิกรไทย (Kbank)</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>สรุปการซื้อขายของคุณ:</h3>
                                            <table id="finance_table">
                                                <tr class="header-tr bg-success">
                                                    <th>สรุปจำวนเงินที่โอนแล้ว</th>
                                                    <th class="text-right">จำนวนเงิน (THB)</th>
                                                </tr>
                                                <tr class="table_body">
                                                    <td>ราคาสินค้าที่ชำระโดยผู้ซื้อ</td>
                                                    <td class="text-right">2550</td>
                                                </tr>
                                                <tr class="table_body">
                                                    <td>ค่าจัดส่งที่ชำระโดยชื่อของคุณ</td>
                                                    <td class="text-right">-93</td>
                                                </tr>
                                                <tr class="table_body">
                                                    <td>ค่าธุรกรรมการชำระเงิน</td>
                                                    <td class="text-right">-49</td>
                                                </tr>
                                                <tr class="table_body">
                                                    <td><h3>จำนวนเงินที่โอนแล้วทั้งหมด</h3></td>
                                                    <td class="text-right"><h3>฿2408</h3></td>
                                                </tr>
                                            </table>
                                        </div>
                                        
                                    </div>

                                    <div class="row mt15">
                                        <div class='col-md-12'>
                                            <table id="finance_detail_table">
                                                <tr class="header-tr2">
                                                    <th><h3>รายละเอียดการโอนเงิน</h3></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr class="header-tr bg-success table-bordered">
                                                    <th>เงินที่โอนแล้ว</th>
                                                    <th>ราคาสินค้าที่ชำระโดยผู้ซื้อ</th>
                                                    <th>ค่าจัดส่งที่ชำระโดยชื่อของคุณ</th>
                                                    <th>ค่าธุรกรรมการชำระเงิน</th>
                                                    <th>จำนวนเงินที่โอนแล้วทั้งหมด(THB)</th>
                                                </tr>
                                                <tbody class="table-bordered">
                                                    <tr class="table_body">
                                                        <td width="30" class="text-center">21 ก.ย. 2020</td>
                                                        <td class="text-center">800</td>
                                                        <td class="text-center">-33</td>
                                                        <td class="text-center">-16</td>
                                                        <td class="text-center">751</td>
                                                    </tr>
                                                    <tr class="table_body">
                                                        <td width="30"  class="text-center">21 ก.ย. 2020</td>
                                                        <td class="text-center">800</td>
                                                        <td class="text-center">-33</td>
                                                        <td class="text-center">-16</td>
                                                        <td class="text-center">751</td>
                                                    </tr>
                                                    <tfooter>
                                                        <th class="text-center">จำนวนเงินที่โอนแล้วทั้งหมด</th>
                                                        <th class="text-center">2550</th>
                                                        <th class="text-center">-93</th>
                                                        <th class="text-center">-49</th>
                                                        <th class="text-center">฿2408</th>
                                                    </tfooter>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr style="border:3px solid #16d39a;margin-top:40px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div id="ignoreContent"></div>
            </div>
        </div>
    </div>
    

    <!-- <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script> -->