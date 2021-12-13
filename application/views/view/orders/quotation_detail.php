
<div class="app-content content">
    <div class="content-overlay">
    </div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0"><?php echo lang('quotation_add'); ?></h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                    </div>
                </div>
            </div>
        </div>
        <form novalidate="" id="form_quotation_edit">
            <div class="content-body">
                <div class="invoice-add-wrapper">
                    <div class="row">
                        <div class="col-xl-9 col-md-8 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-12 d-flex justify-content-start align-items-center pl-0">
                                                <h6 class="invoice-text mr-1 font-weight-bold"><?php echo lang('quotations_no'); ?></h6>
                                                <input type="text" id="view_QuotationNo" name="quotationNO" class="form-control w-50" data-validation-required-message="This field is required" placeholder="<?php echo lang('quotations_no'); ?>" name="view_QuotationNo" disabled>
                                                <input type="hidden" id="customerID" name="customerID">
                                            </div>                                    
                                            <div class="col-xl-9 col-md-12 d-flex justify-content-xl-end align-items-lg-start align-items-sm-start align-items-xs-start  align-items-center flex-wrap px-0 pt-xl-0 pt-1">
                                                <div class="issue-date d-flex align-items-center justify-content-start mr-2 mb-75 mb-xl-0">
                                                    <h6 class="invoice-text mr-1 font-weight-bold"><?php echo lang('date_issue'); ?></h6>
                                                        <input type="text" id="view_QuotationDate" name="quotaDate" class="pick-a-date bg-white form-control picker__input" value="<?php echo lang('select_date'); ?>" readonly="" id="P2082848000" aria-haspopup="true" aria-readonly="false" aria-owns="P2082848000_root" disabled>
                                                            <div class="picker" id="P2082848000_root" aria-hidden="true">
                                                                <div class="picker__holder" tabindex="-1">
                                                                    <div class="picker__frame">
                                                                        <div class="picker__wrap">
                                                                            <div class="picker__box">
                                                                                <div class="picker__header">
                                                                                    <div class="picker__month">
                                                                                        August
                                                                                    </div>
                                                                                    <div class="picker__year">
                                                                                        2020
                                                                                    </div>
                                                                                    <div class="picker__nav--prev" data-nav="-1" tabindex="0" role="button" aria-controls="P2082848000_table" title="Previous month"> 
                                                                                    </div>
                                                                                    <div class="picker__nav--next" data-nav="1" tabindex="0" role="button" aria-controls="P2082848000_table" title="Next month"> 
                                                                                    </div>
                                                                                </div>
                                                                                <table class="picker__table" id="P2082848000_table" role="grid" aria-controls="P2082848000" aria-readonly="true">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th class="picker__weekday" scope="col" title="Sunday">Sun</th>
                                                                                            <th class="picker__weekday" scope="col" title="Monday">Mon</th>
                                                                                            <th class="picker__weekday" scope="col" title="Tuesday">Tue</th>
                                                                                            <th class="picker__weekday" scope="col" title="Wednesday">Wed</th>
                                                                                            <th class="picker__weekday" scope="col" title="Thursday">Thu</th>
                                                                                            <th class="picker__weekday" scope="col" title="Friday">Fri</th>
                                                                                            <th class="picker__weekday" scope="col" title="Saturday">Sat</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1595696400000" id="P2082848000_1595696400000" tabindex="0" role="gridcell" aria-label="07/26/2020">26</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1595782800000" id="P2082848000_1595782800000" tabindex="0" role="gridcell" aria-label="07/27/2020">27</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1595869200000" id="P2082848000_1595869200000" tabindex="0" role="gridcell" aria-label="07/28/2020">28</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1595955600000" id="P2082848000_1595955600000" tabindex="0" role="gridcell" aria-label="07/29/2020">29</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1596042000000" id="P2082848000_1596042000000" tabindex="0" role="gridcell" aria-label="07/30/2020">30</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1596128400000" id="P2082848000_1596128400000" tabindex="0" role="gridcell" aria-label="07/31/2020">31</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596214800000" id="P2082848000_1596214800000" tabindex="0" role="gridcell" aria-label="08/01/2020">1</div></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596301200000" id="P2082848000_1596301200000" tabindex="0" role="gridcell" aria-label="08/02/2020">2</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596387600000" id="P2082848000_1596387600000" tabindex="0" role="gridcell" aria-label="08/03/2020">3</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596474000000" id="P2082848000_1596474000000" tabindex="0" role="gridcell" aria-label="08/04/2020">4</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596560400000" id="P2082848000_1596560400000" tabindex="0" role="gridcell" aria-label="08/05/2020">5</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596646800000" id="P2082848000_1596646800000" tabindex="0" role="gridcell" aria-label="08/06/2020">6</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596733200000" id="P2082848000_1596733200000" tabindex="0" role="gridcell" aria-label="08/07/2020">7</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596819600000" id="P2082848000_1596819600000" tabindex="0" role="gridcell" aria-label="08/08/2020">8</div></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><div class="picker__day picker__day--infocus picker__day--today picker__day--selected picker__day--highlighted" data-pick="1596906000000" id="P2082848000_1596906000000" tabindex="0" role="gridcell" aria-label="08/09/2020" aria-activedescendant="1596906000000">9</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596992400000" id="P2082848000_1596992400000" tabindex="0" role="gridcell" aria-label="08/10/2020">10</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597078800000" id="P2082848000_1597078800000" tabindex="0" role="gridcell" aria-label="08/11/2020">11</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597165200000" id="P2082848000_1597165200000" tabindex="0" role="gridcell" aria-label="08/12/2020">12</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597251600000" id="P2082848000_1597251600000" tabindex="0" role="gridcell" aria-label="08/13/2020">13</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597338000000" id="P2082848000_1597338000000" tabindex="0" role="gridcell" aria-label="08/14/2020">14</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597424400000" id="P2082848000_1597424400000" tabindex="0" role="gridcell" aria-label="08/15/2020">15</div></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597510800000" id="P2082848000_1597510800000" tabindex="0" role="gridcell" aria-label="08/16/2020">16</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597597200000" id="P2082848000_1597597200000" tabindex="0" role="gridcell" aria-label="08/17/2020">17</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597683600000" id="P2082848000_1597683600000" tabindex="0" role="gridcell" aria-label="08/18/2020">18</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597770000000" id="P2082848000_1597770000000" tabindex="0" role="gridcell" aria-label="08/19/2020">19</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597856400000" id="P2082848000_1597856400000" tabindex="0" role="gridcell" aria-label="08/20/2020">20</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597942800000" id="P2082848000_1597942800000" tabindex="0" role="gridcell" aria-label="08/21/2020">21</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598029200000" id="P2082848000_1598029200000" tabindex="0" role="gridcell" aria-label="08/22/2020">22</div></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598115600000" id="P2082848000_1598115600000" tabindex="0" role="gridcell" aria-label="08/23/2020">23</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598202000000" id="P2082848000_1598202000000" tabindex="0" role="gridcell" aria-label="08/24/2020">24</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598288400000" id="P2082848000_1598288400000" tabindex="0" role="gridcell" aria-label="08/25/2020">25</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598374800000" id="P2082848000_1598374800000" tabindex="0" role="gridcell" aria-label="08/26/2020">26</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598461200000" id="P2082848000_1598461200000" tabindex="0" role="gridcell" aria-label="08/27/2020">27</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598547600000" id="P2082848000_1598547600000" tabindex="0" role="gridcell" aria-label="08/28/2020">28</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598634000000" id="P2082848000_1598634000000" tabindex="0" role="gridcell" aria-label="08/29/2020">29</div></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598720400000" id="P2082848000_1598720400000" tabindex="0" role="gridcell" aria-label="08/30/2020">30</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598806800000" id="P2082848000_1598806800000" tabindex="0" role="gridcell" aria-label="08/31/2020">31</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1598893200000" id="P2082848000_1598893200000" tabindex="0" role="gridcell" aria-label="09/01/2020">1</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1598979600000" id="P2082848000_1598979600000" tabindex="0" role="gridcell" aria-label="09/02/2020">2</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1599066000000" id="P2082848000_1599066000000" tabindex="0" role="gridcell" aria-label="09/03/2020">3</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1599152400000" id="P2082848000_1599152400000" tabindex="0" role="gridcell" aria-label="09/04/2020">4</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1599238800000" id="P2082848000_1599238800000" tabindex="0" role="gridcell" aria-label="09/05/2020">5</div></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <div class="picker__footer">
                                                                                    <button class="picker__button--today" type="button" data-pick="1596906000000" disabled="" aria-controls="P2082848000">
                                                                                        Today
                                                                                    </button>
                                                                                    <button class="picker__button--clear" type="button" data-clear="1" disabled="" aria-controls="P2082848000">
                                                                                        Clear
                                                                                    </button>
                                                                                    <button class="picker__button--close" type="button" data-close="true" disabled="" aria-controls="P2082848000">
                                                                                        Close
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="due-date d-flex align-items-center justify-content-start">
                                                    <h6 class="invoice-text mr-1 font-weight-bold"><?php echo lang('date_due'); ?></h6>
                                                        <input type="text"  id="view_InsertDate" name="inDate" class="pick-a-date bg-white form-control picker__input" value="<?php echo lang('select_date'); ?>" readonly="" id="P1466421174" aria-haspopup="true" aria-readonly="false" aria-owns="P1466421174_root" disabled>
                                                            <div class="picker" id="P1466421174_root" aria-hidden="true">
                                                                <div class="picker__holder" tabindex="-1">
                                                                    <div class="picker__frame">
                                                                        <div class="picker__wrap">
                                                                            <div class="picker__box">
                                                                                <div class="picker__header">
                                                                                    <div class="picker__month">
                                                                                        August
                                                                                    </div>
                                                                                    <div class="picker__year">
                                                                                        2020
                                                                                    </div>
                                                                                    <div class="picker__nav--prev" data-nav="-1" tabindex="0" role="button" aria-controls="P1466421174_table" title="Previous month"> 
                                                                                    </div>
                                                                                    <div class="picker__nav--next" data-nav="1" tabindex="0" role="button" aria-controls="P1466421174_table" title="Next month"> 
                                                                                    </div>
                                                                                </div>
                                                                                <table class="picker__table" id="P1466421174_table" role="grid" aria-controls="P1466421174" aria-readonly="true">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th class="picker__weekday" scope="col" title="Sunday">Sun</th>
                                                                                            <th class="picker__weekday" scope="col" title="Monday">Mon</th>
                                                                                            <th class="picker__weekday" scope="col" title="Tuesday">Tue</th>
                                                                                            <th class="picker__weekday" scope="col" title="Wednesday">Wed</th>
                                                                                            <th class="picker__weekday" scope="col" title="Thursday">Thu</th>
                                                                                            <th class="picker__weekday" scope="col" title="Friday">Fri</th>
                                                                                            <th class="picker__weekday" scope="col" title="Saturday">Sat</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1595696400000" id="P1466421174_1595696400000" tabindex="0" role="gridcell" aria-label="07/26/2020">26</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1595782800000" id="P1466421174_1595782800000" tabindex="0" role="gridcell" aria-label="07/27/2020">27</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1595869200000" id="P1466421174_1595869200000" tabindex="0" role="gridcell" aria-label="07/28/2020">28</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1595955600000" id="P1466421174_1595955600000" tabindex="0" role="gridcell" aria-label="07/29/2020">29</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1596042000000" id="P1466421174_1596042000000" tabindex="0" role="gridcell" aria-label="07/30/2020">30</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1596128400000" id="P1466421174_1596128400000" tabindex="0" role="gridcell" aria-label="07/31/2020">31</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596214800000" id="P1466421174_1596214800000" tabindex="0" role="gridcell" aria-label="08/01/2020">1</div></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596301200000" id="P1466421174_1596301200000" tabindex="0" role="gridcell" aria-label="08/02/2020">2</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596387600000" id="P1466421174_1596387600000" tabindex="0" role="gridcell" aria-label="08/03/2020">3</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596474000000" id="P1466421174_1596474000000" tabindex="0" role="gridcell" aria-label="08/04/2020">4</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596560400000" id="P1466421174_1596560400000" tabindex="0" role="gridcell" aria-label="08/05/2020">5</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596646800000" id="P1466421174_1596646800000" tabindex="0" role="gridcell" aria-label="08/06/2020">6</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596733200000" id="P1466421174_1596733200000" tabindex="0" role="gridcell" aria-label="08/07/2020">7</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596819600000" id="P1466421174_1596819600000" tabindex="0" role="gridcell" aria-label="08/08/2020">8</div></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><div class="picker__day picker__day--infocus picker__day--today picker__day--selected picker__day--highlighted" data-pick="1596906000000" id="P1466421174_1596906000000" tabindex="0" role="gridcell" aria-label="08/09/2020" aria-activedescendant="1596906000000">9</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1596992400000" id="P1466421174_1596992400000" tabindex="0" role="gridcell" aria-label="08/10/2020">10</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597078800000" id="P1466421174_1597078800000" tabindex="0" role="gridcell" aria-label="08/11/2020">11</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597165200000" id="P1466421174_1597165200000" tabindex="0" role="gridcell" aria-label="08/12/2020">12</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597251600000" id="P1466421174_1597251600000" tabindex="0" role="gridcell" aria-label="08/13/2020">13</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597338000000" id="P1466421174_1597338000000" tabindex="0" role="gridcell" aria-label="08/14/2020">14</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597424400000" id="P1466421174_1597424400000" tabindex="0" role="gridcell" aria-label="08/15/2020">15</div></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597510800000" id="P1466421174_1597510800000" tabindex="0" role="gridcell" aria-label="08/16/2020">16</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597597200000" id="P1466421174_1597597200000" tabindex="0" role="gridcell" aria-label="08/17/2020">17</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597683600000" id="P1466421174_1597683600000" tabindex="0" role="gridcell" aria-label="08/18/2020">18</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597770000000" id="P1466421174_1597770000000" tabindex="0" role="gridcell" aria-label="08/19/2020">19</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597856400000" id="P1466421174_1597856400000" tabindex="0" role="gridcell" aria-label="08/20/2020">20</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1597942800000" id="P1466421174_1597942800000" tabindex="0" role="gridcell" aria-label="08/21/2020">21</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598029200000" id="P1466421174_1598029200000" tabindex="0" role="gridcell" aria-label="08/22/2020">22</div></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598115600000" id="P1466421174_1598115600000" tabindex="0" role="gridcell" aria-label="08/23/2020">23</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598202000000" id="P1466421174_1598202000000" tabindex="0" role="gridcell" aria-label="08/24/2020">24</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598288400000" id="P1466421174_1598288400000" tabindex="0" role="gridcell" aria-label="08/25/2020">25</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598374800000" id="P1466421174_1598374800000" tabindex="0" role="gridcell" aria-label="08/26/2020">26</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598461200000" id="P1466421174_1598461200000" tabindex="0" role="gridcell" aria-label="08/27/2020">27</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598547600000" id="P1466421174_1598547600000" tabindex="0" role="gridcell" aria-label="08/28/2020">28</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598634000000" id="P1466421174_1598634000000" tabindex="0" role="gridcell" aria-label="08/29/2020">29</div></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598720400000" id="P1466421174_1598720400000" tabindex="0" role="gridcell" aria-label="08/30/2020">30</div></td>
                                                                                            <td><div class="picker__day picker__day--infocus" data-pick="1598806800000" id="P1466421174_1598806800000" tabindex="0" role="gridcell" aria-label="08/31/2020">31</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1598893200000" id="P1466421174_1598893200000" tabindex="0" role="gridcell" aria-label="09/01/2020">1</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1598979600000" id="P1466421174_1598979600000" tabindex="0" role="gridcell" aria-label="09/02/2020">2</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1599066000000" id="P1466421174_1599066000000" tabindex="0" role="gridcell" aria-label="09/03/2020">3</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1599152400000" id="P1466421174_1599152400000" tabindex="0" role="gridcell" aria-label="09/04/2020">4</div></td>
                                                                                            <td><div class="picker__day picker__day--outfocus" data-pick="1599238800000" id="P1466421174_1599238800000" tabindex="0" role="gridcell" aria-label="09/05/2020">5</div></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <div class="picker__footer">
                                                                                    <button class="picker__button--today" type="button" data-pick="1596906000000" disabled="" aria-controls="P1466421174">
                                                                                        Today
                                                                                    </button>
                                                                                    <button class="picker__button--clear" type="button" data-clear="1" disabled="" aria-controls="P1466421174">
                                                                                        Clear
                                                                                    </button>
                                                                                    <button class="picker__button--close" type="button" data-close="true" disabled="" aria-controls="P1466421174">
                                                                                        Close
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row my-2">
                                                    <div class="col-sm-6 col-12 order-2 order-sm-1">
                                                        <h4 class="invoice-title text-primary">
                                                            <?php echo lang('quotations'); ?>
                                                        </h4>
                                                        <input type="text" id="edit_subject_" name="edit_subject_" class="form-control" value="" placeholder="<?php echo lang('subject'); ?>">
                                                    </div>
                                                    <div class="col-sm-6 col-12 order-1 order-sm-1 d-flex justify-content-end align-items-center">
                                                        <img src=" <?php echo base_url('app-assets/img/logo-png.png')?>" alt="logo" height="46" width="46">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6 col-xs-20 mb-1">
                                                        <div class="title-text" type="hidden">
                                                            <!-- <?php echo lang('customerID'); ?> -->
                                                        </div>
                                                        <input type="hidden" name="taxNum" id="customerId" class="form-control" value="" placeholder="<?php echo lang('customerID'); ?>" disabled>
                                                    </div>
                                                </div>  
                                                <div class="row">      
                                                    <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                                                        <div class="form-group">
                                                            <div class="title-text">
                                                                <?php echo lang('name_sname'); ?>
                                                            </div>
                                                            <input type="text" name="name" id="edit_customerName" class="form-control" value="" placeholder="<?php echo lang('name_sname'); ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-----------------------------------------------------------------------Sname----------------------------------------------------------------------->
                                                        <!-- <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                                                            <div class="form-group">
                                                                <div class="controls position-relative">
                                                                    <div class="title-text">
                                                                        <?php echo lang('sname'); ?>
                                                                    </div>
                                                                    <input type="text" name="sname" id="" class="form-control" value="" placeholder="<?php echo lang('sname'); ?>">
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                <!-----------------------------------------------------------------------Sname----------------------------------------------------------------------->

                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="row">
                                                            <div class="col-7 col-xs-20 mb-1">
                                                                <div class="title-text">
                                                                    <?php echo lang('tax_identification_number'); ?>
                                                                </div>
                                                                <input type="text" name="taxNum" id="" class="form-control" value="" placeholder="<?php echo lang('tax_identification_number'); ?>" disabled>
                                                            </div>
                                                            <div class="col-12 col-xs-12 mb-1">
                                                                <div class="title-text">
                                                                    <?php echo lang('store_add'); ?>
                                                                </div>
                                                                <textarea class="form-control" name="storeAdd" id="edit_customerAddress" rows="3" placeholder="<?php echo lang('store_add'); ?>"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                                                        <div class="form-group">
                                                            <div class="title-text">
                                                                <?php echo lang('sub_district'); ?>
                                                            </div>
                                                            <input type="text" name="subDistrict" id="view_sellersubDistrict" class="form-control" value="" placeholder="<?php echo lang('sub_district'); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                                                        <div class="form-group">
                                                            <div class="title-text">
                                                                <?php echo lang('province'); ?>
                                                            </div>
                                                            <input type="text" name="province" id="view_sellerProvince" class="form-control" value="" placeholder="<?php echo lang('province'); ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                                                        <div class="form-group">
                                                            <div class="controls position-relative">
                                                                <div class="title-text">
                                                                    <?php echo lang('district'); ?>
                                                                </div>
                                                                <input type="text" name="district" id="view_sellerDistrict" class="form-control" value="" placeholder="<?php echo lang('district'); ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                                                        <div class="form-group">
                                                            <div class="controls position-relative">        
                                                                <div class="title-text">
                                                                    <?php echo lang('postal_code'); ?>
                                                                </div>
                                                                <input type="text" name="postalCode" id="view_sellerZipcode" class="form-control" value="" placeholder="<?php echo lang('postal_code'); ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                                                        <div class="form-group">
                                                            <div class="title-text">
                                                                <?php echo lang('email'); ?>
                                                            </div>
                                                            <input type="text" name="emailExample" id="edit_customerEmail" class="form-control" value="" placeholder="<?php echo lang('email_example'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                                                        <div class="form-group">
                                                            <div class="title-text">
                                                                <?php echo lang('phone_num'); ?>
                                                            </div>
                                                            <input type="text" name="phoneNum" id="edit_customerPhone" class="form-control" value="" placeholder="<?php echo lang('phone_num'); ?>">
                                                            <!-----------------------------------------------------------------------input type="hidden"----------------------------------------------------------------------->
                                                                <!-- <input type="hidden" name="status" id="edit_Status" class="form-control" value=" " placeholder=""> -->
                                                            <!-----------------------------------------------------------------------input type="hidden"----------------------------------------------------------------------->
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="invoice-product-details">
                                                    <div data-repeater-list="group-a">
                                                        <div data-repeater-item class="mb-1">
                                                            <div class="row item-heading-titles mb-50">
                                                                <div class="col-3 col-md-4 item-subtitle font-bold">
                                                                    <?php echo lang('item_list'); ?>
                                                                    <input type="text" name="itemList" id="edit_productName" class="form-control" value="อาหาร(Food)" disabled>
                                                                </div>
                                                                <div class="col-3 cost-subtitle font-bold">
                                                                    <?php echo lang('cost'); ?>
                                                                    <input type="text" name="cost" id="edit_priceUnit" class="form-control" value="฿0" disabled>
                                                                </div>
                                                                <div class="col-2 qty-subtitle font-bold">
                                                                    <?php echo lang('qty'); ?>
                                                                    <input type="text" name="pqty" id="edit_qty" class="form-control" value="฿0" disabled>
                                                                </div>
                                                                <div class="col-2 col-md-2 price-subtitle font-bold">
                                                                    <?php echo lang('price'); ?>
                                                                    <!-----------------------------------------------------------------------input type="hidden"----------------------------------------------------------------------->
                                                                    <!-- <div type="text" class=" " name="price" id="edit_total" value="฿0"></div> -->
                                                                    <!-----------------------------------------------------------------------input type="hidden"----------------------------------------------------------------------->
                                                                    <input type="text" name="price" id="edit_total" class="form-control" value="฿0" disabled>
                                                                </div>
                                                                <div class="col-12 col-md-4 form-group item-description mb-0">
                                                                    <?php echo lang('description'); ?>
                                                                    <input type="text" name="descriptions" id="edit_description" class="form-control description-input" value=" " placeholder="<?php echo lang('description'); ?>" disabled>
                                                                </div>
                                                                <div class="col-12 col-md-2 form-group item-amountDC mb-0">
                                                                    <?php echo lang('discount'); ?>
                                                                    <input type="text" name="itemList" id="edit_amountDC" class="form-control" value="ส่วนลด" disabled>
                                                                </div>
                                                                <input type="hidden" name="unit" id="unit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  <!--*-->
                                        </div> <!--*-->
                                        <hr>
                                        <div class="invoice-total">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6 col-xl-5">
                                                    <span class="col-md-6 col-lg-6 col-xl-5"><?php echo lang('thanks_for_your_business'); ?></span>
                                                </div> 
                                                <div class="col-12 col-md-6 col-lg-6 col-xl-5 offset-xl-2">
                                                    <ul class="list-group cost-list">
                                                        <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                            <span class="cost-title mr-2">
                                                                <?php echo lang('subtotal'); ?>
                                                            </span>
                                                            <span class="cost-value" id="edit_subtotalT">
                                                                ฿ 00.00
                                                            </span>
                                                        </li>
                                                        <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                            <span class="cost-title mr-2">
                                                                <?php echo lang('discount'); ?>
                                                            </span>
                                                            <span class="cost-value" id="edit_amount">
                                                                -฿ 00.00
                                                            </span>
                                                        </li>
                                                        <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                            <span class="cost-title mr-2">
                                                                <?php echo lang('vat'); ?>
                                                            </span>
                                                            <span class="cost-value" id="edit_tax">
                                                                ฿ 00.00
                                                            </span>
                                                        </li>
                                                        <li class="dropdown-divider">
                                                        </li>
                                                        <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                                            <span class="cost-title mr-2">
                                                                <?php echo lang('balance'); ?>
                                                            </span>
                                                            <span class="cost-value" id="vdit_total">
                                                                ฿ 00.00
                                                            </span>
                                                        </li>
                                                    </ul>
                                                    <button type="submit" class="btn btn-primary mt-1 btn-block">
                                                        <i class="fa fa-check-square-o"></i>Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('helper/orders/firebase_quotation_edit_update') ?>