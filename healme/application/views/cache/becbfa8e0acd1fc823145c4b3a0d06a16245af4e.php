<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <!-- <svg version="1.1" id="logo" class="navbar-brand-img brand-sm text-base" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg> -->
                <img src="<?php echo e(base_url()); ?>assets/<?php echo e(json_decode(file_get_contents('assets/logo.json'))->image); ?>" alt=""
                    width="60" height="60">
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100 active">
                <a class="nav-link active" href="<?php echo e(base_url() . ADMINPATH); ?>">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="<?php echo e(base_url() . ADMINPATH); ?>/sliders">
                    <i class="fe fe-sliders fe-16"></i>
                    <span class="ml-3 item-text">Sliders</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="<?php echo e(base_url() . ADMINPATH); ?>/popup">
                    <i class="fe fe-bell fe-16"></i>
                    <span class="ml-3 item-text">Popup</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="<?php echo e(base_url() . ADMINPATH); ?>/information">
                    <i class="fe fe-info fe-16"></i>
                    <span class="ml-3 item-text">Information</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="<?= base_url() . ADMINPATH ?>/users">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Users</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#product" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-archive fe-16"></i>
                    <span class="ml-3 item-text">Products</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="product">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(base_url() . ADMINPATH); ?>/products">
                            <span class="ml-1 item-text">My Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(base_url() . ADMINPATH); ?>/otherproducts">
                            <span class="ml-1 item-text">Other</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#payment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-credit-card fe-16"></i>
                    <span class="ml-3 item-text">Payments</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="payment">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(base_url() . ADMINPATH); ?>/banks">
                            <span class="ml-1 item-text">Banks</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(base_url() . ADMINPATH); ?>/topup">
                            <span class="ml-1 item-text">Top Up</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(base_url() . ADMINPATH); ?>/admintransfer">
                            <span class="ml-1 item-text">Admin Transfer</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(base_url() . ADMINPATH); ?>/otherbalance">
                            <span class="ml-1 item-text">Other</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#transaction" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-truck fe-16"></i>
                    <span class="ml-3 item-text">Transaction</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="transaction">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(base_url() . ADMINPATH); ?>/transaction">
                            <span class="ml-1 item-text">My Transaction</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(base_url() . ADMINPATH); ?>/othertransaction">
                            <span class="ml-1 item-text">Other</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item w-100 ">
                <a class="nav-link" href="<?php echo e(base_url() . ADMINPATH); ?>/profile">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Profile</span>
                </a>
            </li>
        </ul>
    </nav>
</aside><?php /**PATH C:\newxampp2\htdocs\ponselkita\application\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>