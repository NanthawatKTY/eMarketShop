<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <section class="users-edit">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="settingaccount-tab" data-toggle="tab" href="#settingaccount" aria-controls="settingaccount" role="tab" aria-selected="true">
                                        <i class="feather icon-circle mr-25"></i><span class="d-none d-sm-block"><?php echo lang('store_settings'); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="settingchat-tab" data-toggle="tab" href="#settingchat" aria-controls="settingchat" role="tab" aria-selected="false">
                                        <i class="feather icon-circle mr-25"></i><span class="d-none d-sm-block"><?php echo lang('chat_settings'); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="settingnotifications-tab" data-toggle="tab" href="#settingnotifications" aria-controls="settingnotifications" role="tab" aria-selected="false">
                                        <i class="feather icon-circle mr-25"></i><span class="d-none d-sm-block"><?php echo lang('set_notification'); ?></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="settingaccount" aria-labelledby="settingaccount-tab" role="tabpanel">
                                    <div class="card-footer">
                                        <div class="form-group pb-1">
                                            <div class="float-right">
                                                <input type="checkbox"  name="isAllowCall" id="isAllowCall" class="newSwitchery isAllowCall" />
                                            </div>
                                                <h2><span is="0" class="feather icon-phone">
                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h2><?php echo lang('allowBCall'); ?></h2></span></h2>
                                                <p class="card-text"><?php echo lang('allow_call_turn_on'); ?></p></label>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="form-group pb-1">
                                            <div class="float-right">
                                                <input type="checkbox" name="isOTP" id="isOTP" class="newSwitchery isOTP" />
                                            </div>
                                            <h2><span is="0" class="feather icon-shield">
                                            <label for="switchery01"  class="font-medium-2 text-bold-600"><h2><?php echo lang('secure_user_account'); ?></h2></span></h2>
                                            <p class="card-text"><?php echo lang('secure_user_account_otp'); ?></p></label>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="form-group pb-1">
                                            <div class="float-right">
                                                <input type="checkbox" name="isVacationTime" id="isVacationTime" class="newSwitchery isVacationTime" />
                                            </div>
                                            <h2><span is="0" class="feather icon-moon">
                                            <label for="switchery01" class="font-medium-2 text-bold-600"><h2><?php echo lang('vacation_mode'); ?></h2></span></h2>
                                            <p class="card-text"><?php echo lang('vacation_mode_txt'); ?></p></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settingchat" aria-labelledby="settingchat-tab" role="tabpanel">
                                    <div class="card-footer">
                                            <div class="form-group pb-1">
                                                <div class="float-right">
                                                    <input type="checkbox" name="isAllowChat" id="isAllowChat" class="newSwitchery isAllowChat" />
                                                </div>
                                                <h2><span is="0" class="feather icon-star">
                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h2><?php echo lang('open_negotiation'); ?></h2></span></h2>
                                                <p class="card-text"><?php echo lang('if_enabled_buyers'); ?></p></label>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="form-group pb-1">
                                                <div class="float-right">
                                                    <input type="checkbox" name="isAllowChatProfile" id="isAllowChatProfile" class="newSwitchery isAllowChatProfile" />
                                                </div>
                                                <h2><span is="0" class="feather icon-check-circle">
                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h2><?php echo lang('allow_chat_from_profile'); ?></h2></span></h2>
                                                <p class="card-text"><?php echo lang('enable_to_allow_users'); ?></p></label>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="form-group pb-1">
                                                <div class="float-right">
                                                    <input type="checkbox" name="isAutoChat" id="isAutoChat" class="newSwitchery isAutoChat"/>
                                                </div>
                                                <h2><span is="0" class="feather icon-headphones">
                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h2><?php echo lang('send_automatic_chat'); ?></h2></span></h2>
                                                <p class="card-text"><?php echo lang('enable_automatic_buyer_reply_chat'); ?></p></label>
                                            </div>
                                        </div>
                                    </div>
                                    <tr>
                                    <div class="tab-pane" id="settingnotifications" aria-labelledby="settingnotifications-tab" role="tabpanel">
                                        <div class="card-footer">
                                            <div class ="float-right">
                                                <button onclick="myFunction()" id="change-txt" type="submit" class="btn btn-primary"><?php echo lang('notificationsE_close_tab'); ?></button>
                                            </div>
                                            <h2>
                                                <span is="0" class="feather icon-mail">
                                                        <label for="switchery01" class="font-medium-2 text-bold-600"><h2><?php echo lang('notificationsE'); ?></h2></span>
                                                </h2></label>
                                            <div id="hide-button">
                                                <div class="card-footer">
                                                    <div class="form-group pb-1">
                                                        <div class="float-right">
                                                            <input type="checkbox" name="isUpdateOrders" id="isUpdateOrders" class="newSwitchery isUpdateOrders" />
                                                        </div>
                                                            <h4><span is="0" class="feather icon-clipboard">
                                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h4><?php echo lang('update_order'); ?></h4></span>
                                                            </h4></label>                                            
                                                    </div>
                                                </div>   
                                                <div class="card-footer">
                                                    <div class="form-group pb-1">
                                                        <div class="float-right">
                                                            <input type="checkbox" name="isNewsEmail" id="isNewsEmail" class="newSwitchery isNewsEmail" />
                                                        </div>
                                                        <h4><span is="0" class="feather icon-mail">
                                                            <label for="switchery01" class="font-medium-2 text-bold-600"><h4><?php echo lang('newsletter');?></h4></span>
                                                        </h4></label>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="form-group pb-1">
                                                        <div class="float-right">
                                                            <input type="checkbox" name="isUpdateProduct" id="isUpdateProduct" class="newSwitchery isUpdateProduct"/>
                                                        </div>
                                                        <h4><span is="0" class="feather icon-tag">
                                                            <label for="switchery01" class="font-medium-2 text-bold-600"><h4><?php echo lang('update_products_sold');?></h4></span>
                                                        </h4></label>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="form-group pb-1">
                                                        <div class="float-right">
                                                            <input type="checkbox" name="isShowProfile" id="isShowProfile" class="newSwitchery isShowProfile"/>
                                                        </div>
                                                        <h4><span is="0" class="feather icon-user">
                                                            <label for="switchery01" class="font-medium-2 text-bold-600"><h4><?php echo lang('personal_content');?></h4></span>
                                                        </h4></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>     
                                        <div class="card-footer">
                                            <div class ="float-right">
                                                <button onclick="myFunction2()" id="change-txt2" type="submit" class="btn btn-primary"><?php echo lang('notifications_off_tab');?></button>
                                            </div>
                                            <h2>
                                            <span is="0" class="feather icon-bell">
                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h2><?php echo lang('notification_alert');?></h2></span>
                                            </h2></label>
                                            <div id="hide-button2">
                                                <div class="card-footer">
                                                    <div class="form-group pb-1">
                                                        <div class="float-right">
                                                            <input type="checkbox" name="isAllowNoti" id="isAllowNoti" class="newSwitchery isAllowNoti"/>
                                                        </div>
                                                            <h4><span is="0" class="feather icon-inbox">
                                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h4><?php echo lang('batch_notification');?></h4></span>
                                                            </h4></label>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="form-group pb-1">
                                                        <div class="float-right">
                                                            <input type="checkbox" name="isUpdateOrders2" id="isUpdateOrders2" class="newSwitchery isUpdateOrders2"/>
                                                        </div>
                                                            <h4><span is="0" class="feather icon-arrow-up">
                                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h4><?php echo lang('update_order');?></h4></span>
                                                            </h4></label>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="form-group pb-1">
                                                        <div class="float-right">
                                                            <input type="checkbox" name="isAllowChat2" id="isAllowChat2" class="newSwitchery isAllowChat2"/>
                                                        </div>
                                                            <h4><span is="0" class="feather icon-message-square">
                                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h4><?php echo lang('talk');?></h4></span>
                                                            </h4></label>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="form-group pb-1">
                                                        <div class="float-right">
                                                            <input type="checkbox" name="isPromotion" id="isPromotion" class="newSwitchery isPromotion"/>
                                                        </div>
                                                            <h4><span is="0" class="feather icon-tag">
                                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h4><?php echo lang('pro');?></h4></span>
                                                            </h4></label>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="form-group pb-1">
                                                        <div class="float-right">
                                                            <input type="checkbox" name="isAllowComment" id="isAllowComment" class="newSwitchery isAllowComment"/>
                                                        </div>
                                                            <h4><span is="0" class="feather icon-copy">
                                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h4><?php echo lang('follow_and_comment');?></h4></span>
                                                            </h4></label>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="form-group pb-1">
                                                        <div class="float-right">
                                                            <input type="checkbox" name="isProduct" id="isProduct" class="newSwitchery isProduct"/>
                                                        </div>
                                                            <h4><span is="0" class="feather icon-alert-circle">
                                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h4><?php echo lang('out_of_stock');?></h4></span>
                                                            </h4></label>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="form-group pb-1">
                                                        <div class="float-right">
                                                            <input type="checkbox" name="isWalletUpdate" id="isWalletUpdate" class="newSwitchery isWalletUpdate"/>
                                                        </div>
                                                            <h4><span is="0" class="feather icon-credit-card">
                                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h4><?php echo lang('wallet_update');?></h4></span>
                                                            </h4></label>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="form-group pb-1">
                                                        <div class="float-right">
                                                            <input type="checkbox" name="isAdsCost" id="isAdsCost" class="newSwitchery isAdsCost"/>
                                                        </div>
                                                            <h4><span is="0" class="feather icon-at-sign">
                                                                <label for="switchery01" class="font-medium-2 text-bold-600"><h4><?php echo lang('advertising_budget_per_day');?></h4></span>
                                                            </h4></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php $this->load->view('helper/account/firebase_account.php') ?>   
