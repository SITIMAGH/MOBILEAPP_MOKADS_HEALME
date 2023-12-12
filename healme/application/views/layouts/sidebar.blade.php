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
                <img src="" alt=""
                    width="60" height="60">
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ base_url() }}promo">
                    <i class="fe fe-gift fe-16"></i>
                    <span class="ml-3 item-text">Master Promo</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ base_url() }}users">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Master Users</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ base_url() }}dokter">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Master Dokter</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ base_url() }}obat">
                    <i class="fe fe-archive fe-16"></i>
                    <span class="ml-3 item-text">Master Obat</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ base_url() }}voucher">
                    <i class="fe fe-archive fe-16"></i>
                    <span class="ml-3 item-text">Master Voucher</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ base_url() }}news">
                    <i class="fe fe-book fe-16"></i>
                    <span class="ml-3 item-text">Master Artikel</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#transaction" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-archive fe-16"></i>
                    <span class="ml-3 item-text">Transaksi</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="transaction">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ base_url() }}transaksi/chat">
                            <span class="ml-1 item-text">Chat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ base_url() }}transaksi/obat">
                            <span class="ml-1 item-text">Obat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ base_url() }}transaksi/voucher">
                            <span class="ml-1 item-text">Voucher</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item w-100 ">
                <a class="nav-link" href="{{ base_url() }}profile">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Profile</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>