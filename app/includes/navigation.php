<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div style="text-align: center;padding: 0.8125rem 0.5rem;">
        <a href="index.php" style="color: #acc944;">       
            <img id="logo" alt="Banda Logo" style="height: 33px;max-height: unset;object-fit:scale-down;object-position:center center;border-radius: 50%;box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23) !important;color: #fff !important;">                    
            <span id="title2" class="m-1" style="font-family: Source Sans Pro; font-size: 0.875rem; text-decoration: none; line-height: 21px;">
            </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">Main</li>
            <li>
                <a href="<?php echo base_url ?>app/views"> <i data-feather="home" class="align-self-center menu-icon nav-home"></i><span>Dashboard</span></a>
                <!-- <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="index.html"><i class="ti-control-record"></i>Analytics</a></li>
                    <li class="nav-item"><a class="nav-link" href="sales-index.html"><i class="ti-control-record"></i>Sales</a></li> 
                </ul> -->
            </li>

            <li>
                <a href="javascript: void(0);"><i data-feather="grid" class="align-self-center menu-icon"></i><span>Apps</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Email <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="apps-email-inbox.html">Inbox</a></li>
                            <li><a href="apps-email-read.html">Read Email</a></li>
                        </ul>
                    </li>  
                    <li class="nav-item"><a class="nav-link" href="apps-chat.html"><i class="ti-control-record"></i>Chat</a></li>
                    <li class="nav-item"><a class="nav-link" href="apps-contact-list.html"><i class="ti-control-record"></i>Contact List</a></li>
                    <li class="nav-item"><a class="nav-link" href="apps-calendar.html"><i class="ti-control-record"></i>Calendar</a></li>
                    <li class="nav-item"><a class="nav-link" href="apps-files.html"><i class="ti-control-record"></i>File Manager</a></li>
                    <li class="nav-item"><a class="nav-link" href="apps-invoice.html"><i class="ti-control-record"></i>Invoice</a></li>
                    <li class="nav-item"><a class="nav-link" href="apps-tasks.html"><i class="ti-control-record"></i>Tasks</a></li>
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Projects <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="apps-project-overview.html">Overview</a></li>                                    
                            <li><a href="apps-project-projects.html">Projects</a></li>
                            <li><a href="apps-project-board.html">Board</a></li>
                            <li><a href="apps-project-teams.html">Teams</a></li>
                            <li><a href="apps-project-files.html">Files</a></li>
                            <li><a href="apps-new-project.html">New Project</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="ti-control-record"></i>Ecommerce <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="apps-ecommerce-products.html">Products</a></li>                                    
                            <li><a href="apps-ecommerce-product-list.html">Product List</a></li>
                            <li><a href="apps-ecommerce-product-detail.html">Product Detail</a></li>
                            <li><a href="apps-ecommerce-cart.html">Cart</a></li>
                            <li><a href="apps-ecommerce-checkout.html">Checkout</a></li>                                    
                        </ul>
                    </li>
                </ul>
            </li> 

            <li>
                <a href="javascript: void(0);"><i data-feather="lock" class="align-self-center menu-icon"></i><span>Authentication</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="auth-login.html"><i class="ti-control-record"></i>Log in</a></li>
                    <li class="nav-item"><a class="nav-link" href="auth-register.html"><i class="ti-control-record"></i>Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="auth-recover-pw.html"><i class="ti-control-record"></i>Recover Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="auth-lock-screen.html"><i class="ti-control-record"></i>Lock Screen</a></li>
                    <li class="nav-item"><a class="nav-link" href="auth-404.html"><i class="ti-control-record"></i>Error 404</a></li>
                    <li class="nav-item"><a class="nav-link" href="auth-500.html"><i class="ti-control-record"></i>Error 500</a></li>
                </ul>
            </li> 

            <hr class="hr-dashed hr-menu">
            <li class="menu-label my-2">Sistema</li>
            
            <li>
                <a href="<?php echo base_url ?>app/views/?page=system"><i data-feather="settings" class="align-self-center menu-icon nav-system"></i><span>Configuración del sistema</span></a>
            </li>
        </ul>            
    </div>
</div>
<!-- end left-sidenav-->