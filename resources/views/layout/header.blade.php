    <!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

    <!--header-->
    <header id="header" class="header header-style-1">
        <div class="container-fluid">
            <div class="row">
                <div class="topbar-menu-area">
                    <div class="container">
                        <div class="topbar-menu left-menu">
                            <ul>
                                <li class="menu-item">
                                    <a href="#">
                                        <span
                                            class="icon label-before fa fa-mobile">
                                        </span>Hotline: 0834333860
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topbar-menu right-menu">
                            <ul>
                                @if (session()->has('user_id'))
                                    <li class="menu-item menu-item-has-children parent" >
                                        <a title="My Account" href="#">Xin chào {{ session()->get('name') }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency" >
                                            <li class="menu-item">
                                                <a href="{{ route('userpage.history-order', ['user' => session()->get('user_id')]) }}">Lịch sử đơn hàng</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ route('userpage.profile', ['user' => session()->get('user_id')]) }}">Thông tin cá nhân</a></li>
                                            <li class="menu-item" >
                                                <a title="Logout" href="{{ route('userpage.logout') }}">
                                                    Đăng xuất
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="menu-item"><a title="Register or Login" href="{{ route('userpage.login') }}">Đăng nhập</a></li>
                                    <li class="menu-item">
                                        <a title="Register or Login" href="{{ route('userpage.register') }}" >
                                            Đăng ký
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="mid-section main-info-area">

                        <div class="wrap-logo-top left-section">
                            <a href="{{ route('userpage.index') }}" class="link-to-home">
                                <img src="{{ asset('assets/images/logo-top-1.png') }}"alt="mercado">
                            </a>
                        </div>

                        <div class="wrap-search center-section">
                            <div class="wrap-search-form">
                                <form action="{{ route('userpage.shop') }}" id="form-search-top" name="form-search-top">
                                    <input type="text" name="search" value="" placeholder="Search here...">
                                    <button form="form-search-top" type="submit"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>

                        <div class="wrap-icon right-section">
                            <div class="wrap-icon-section wishlist">
                                <a href="#" class="link-direction">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    <div class="left-info">
                                        <span class="index">0 sản phẩm</span>
                                        <span class="title">Yêu thích</span>
                                    </div>
                                </a>
                            </div>
                            <div class="wrap-icon-section minicart">
                                <a href="{{ route('userpage.cart') }}" class="link-direction">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    <div class="left-info">
                                        <span class="index">{{ count(Cart::content()) }} sản phẩm</span>
                                        <span class="title">Giỏ hàng</span>
                                    </div>
                                </a>
                            </div>
                            <div class="wrap-icon-section show-up-after-1024">
                                <a href="#" class="mobile-navigation">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="nav-section header-sticky">
                    <div class="header-nav-section">
                        <div class="container">
                            <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info">
                                <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top new items</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span
                                        class="nav-label hot-label">hot</span></li>
                                <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span
                                        class="nav-label hot-label">hot</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="primary-nav-section">
                        <div class="container">
                            <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                                <li class="menu-item home-icon">
                                    <a href="{{ route('userpage.index') }}" class="link-term mercado-item-title"><i class="fa fa-home"
                                            aria-hidden="true"></i></a>
                                </li>
                                {{-- <li class="menu-item">
                                    <a href="about-us.html" class="link-term mercado-item-title">About Us</a>
                                </li> --}}
                                <li class="menu-item">
                                    <a href="{{ route('userpage.shop') }}" class="link-term mercado-item-title">Mua hàng</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('userpage.cart') }}" class="link-term mercado-item-title">Giỏ hàng</a>
                                </li>
                                {{-- <li class="menu-item">
                                    <a href="contact-us.html" class="link-term mercado-item-title">Contact Us</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>