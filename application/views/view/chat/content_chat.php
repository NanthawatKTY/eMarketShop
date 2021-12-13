<!-- BEGIN: Content-->
<div class="app-content content">
        <div class="sidebar-left">
            <div class="sidebar">
                <!-- app chat user profile left sidebar start -->
                <!-- <div class="chat-user-profile">
                    <header class="chat-user-profile-header text-center border-bottom">
                        <span class="chat-profile-close">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="my-2">

                            <img src="<?php echo base_url('app-assets/img/user-default.png'); ?>" class="round mb-1" alt="user_avatar" height="100" width="100">

                            <h5 class="mb-0">John Doe</h5>
                            <span>Designer</span>
                        </div>
                    </header>
                </div> -->
                <!-- app chat user profile left sidebar ends -->
                <!-- app chat sidebar start -->
                <div class="chat-sidebar card">
                    <span class="chat-sidebar-close">
                        <i class="feather icon-x"></i>
                    </span>
                    <div class="chat-sidebar-search">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <div class="avatar">
                                    <img src="<?php echo base_url('app-assets/img/user-default.png'); ?>" class="image_r" alt="user_avatar" height="36" width="36">
                                </div>
                            </div>
                            <fieldset class="form-group position-relative has-icon-left mx-75 mb-0">
                                <input type="text" class="form-control round" id="chat-search" placeholder="Search">
                                <div class="form-control-position">
                                    <i class="feather icon-search text-dark"></i>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="chat-sidebar-list-wrapper pt-2">
                        <h6 class="px-2 pt-2 pb-25 mb-0">CHATS</h6>
                        <ul class="chat-sidebar-list" id="chat_customer_list"></ul>
                    </div>
                </div>
                <!-- app chat sidebar ends -->
            </div>
        </div>

        <div class="content-right">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- app chat overlay -->
                    <div class="chat-overlay"></div>
                    <!-- app chat window start -->
                    <section class="chat-window-wrapper">
                        <div class="chat-start">
                            <span class="feather icon-message-square chat-sidebar-toggle chat-start-icon font-large-3 p-3 mb-1"></span>
                            <h4 class="d-none d-lg-block py-50 text-bold-500">Select a contact to start a chat!</h4>
                            <button class="btn btn-light-primary chat-start-text chat-sidebar-toggle d-block d-lg-none py-50 px-1">Start
                                Conversation!</button>
                        </div>

                        <div class="chat-area d-none">
                            <div class="chat-header">
                                <header class="d-flex justify-content-between align-items-center px-1 py-75">
                                    <div class="d-flex align-items-center">
                                        <div class="chat-sidebar-toggle d-block d-lg-none mr-1">
                                            <i class="feather icon-menu font-large-1 cursor-pointer"></i>
                                        </div>
                                        <div class="avatar avatar-busy chat-profile-toggle m-0 mr-1">
                                            <img src="<?php echo base_url('app-assets/img/user-default.png'); ?>" alt="avatar" height="36" width="36" />
                                            <i></i>
                                        </div>
                                        <input type="hidden" id="customer_display_uid">
                                        <h6 class="mb-0" id="customer_display"></h6>
                                    </div>
                                    <div class="chat-header-icons">
                                        <!-- <i class="chat-icon-favorite">
                                            <i class="feather icon-star font-medium-4 cursor-pointer"></i>
                                        </i>
                                        <span class="dropdown">
                                            <i class="feather icon-more-vertical font-medium-4 ml-25 cursor-pointer dropdown-toggle nav-hide-arrow cursor-pointer" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                                            </i>
                                            <span class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="JavaScript:void(0);"><i class="feather icon-tag mr-25"></i> Pin to top</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);"><i class="feather icon-trash-2 mr-25"></i> Delete
                                                    chat</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);"><i class="feather icon-x-circle mr-25"></i> Block</a>
                                            </span>
                                        </span> -->
                                    </div>
                                </header>
                            </div>
                            <!-- chat card start -->
                            <div class="card chat-wrapper shadow-none mb-0">
                                <div class="card-content">
                                    <div class="card-body chat-container" id="chat_room">
                                        <!-- <div class="chat-content" >
   
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card-footer chat-footer px-2 py-1 pb-0">
                                    <form class="d-flex align-items-center" id="chat_send">
                                        <i class="feather icon-user cursor-pointer"></i>
                                        <i class="feather icon-paperclip ml-1 cursor-pointer" id="chat_file_upload"></i>
                                        <input id="chat-file-input" type="file" class="checkFileSize" accept="image/x-png,image/gif,image/jpeg" name="chat-file-input" style="display: none;" />
                                        <input type="hidden" id="chat-file-input-base64">
                                        <input type="hidden" id="chat_customerId">
                                        <input type="hidden" id="chat_display_seller">
                                        <input type="text" class="form-control chat-message-send mx-1" id="text_chat_input" placeholder="Type your message here...">
                                        <button type="submit" class="btn btn-primary glow send d-lg-flex"><i class="feather icon-play"></i>
                                            <span class="d-none d-lg-block mx-50">Send</span></button>
                                    </form>
                                </div>
                            </div>
                            <!-- chat card ends -->
                        </div>
                    </section>
                    <!-- app chat window ends -->
                    <!-- app chat profile right sidebar start -->
                    <section class="chat-profile">
                        <header class="chat-profile-header text-center border-bottom">
                            <span class="chat-profile-close">
                                <i class="feather icon-x"></i>
                            </span>
                            <div class="my-2">

                                <img src="<?php echo base_url('app-assets/img/user-default.png'); ?>" class="round mb-1" alt="chat avatar" height="100" width="100">

                                <h5 class="app-chat-user-name mb-0" id="profile_customer_name"></h5>
                                <!-- <span>Devloper</span> -->
                            </div>
                        </header>
                        <div class="chat-profile-content p-2">
                            <h6 class="mt-1">ABOUT</h6>
                            <!-- <p >It is a long established fact that a reader will be distracted by the readable content.</p> -->
                            <h6 class="mt-2">PERSONAL INFORMATION</h6>
                            <ul class="list-unstyled">
                                <li class="mb-25" id="profile_customer_email"></li>
                                <li id="profile_customer_phone"></li>
                            </ul>
                        </div>
                    </section>
                    <!-- app chat profile right sidebar ends -->
                </div>
            </div>
        </div>
    </div>
    <div style="display:block;" id="chat_modal_image"></div>
    <!-- END: Content-->
    <?php $this->load->view('helper/chat/firebase_chat') ?>