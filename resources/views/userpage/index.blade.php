@extends('layout.master')
@section('content')
<main id="main">
    <div class="container">

        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                data-dots="false">
                <div class="item-slide">
                    <img src="{{ asset('assets/images/page-img/slide-banner-1.png') }}" alt="" class="img-slide">
                </div>
                <div class="item-slide">
                    <img src="{{ asset('assets/images/page-img/banner-slider-2.png') }}" alt="" class="img-slide">
                </div>
                <div class="item-slide">
                    <img src="{{ asset('assets/images/page-img/slide-banner-3.png') }}" alt="" class="img-slide">
                </>
            </div>
        </div>

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/page-img/home-banner-2.png') }}" alt="" width="580" height="190"></figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/page-img/home-banner-3.png') }}" alt="" width="580" height="190"></figure>
                </a>
            </div>
        </div>

        <!--On Sale-->
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">Đang giảm giá</h3>
            <div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                data-loop="false" data-nav="true" data-dots="false"
                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                @foreach ($latest_product as $product)
                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="{{ route('userpage.detail', ['product' => $product->id]) }}">
                                <figure>
                                    <img 
                                    src="{{ asset('admin-assets/images/product/') . '/'. $product->avatar }}" 
                                    width="800"
                                    height="800">
                                </figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="{{ route('userpage.detail', ['product' => $product->id]) }}" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="{{ route('userpage.detail', ['product' => $product->id]) }}" class="product-name">
                                <span>
                                    {{ $product->name }}
                                </span>
                            </a>
                            <div class="wrap-price">
                                <ins>
                                    <p class="product-price">{{ number_format($product->price) }} VNĐ</p>
                                </ins>
                                <del>
                                    <p class="product-price">$250.00</p>
                                </del>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Sản phẩm mới nhất</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/page-img/long-banner-1.png') }}" width="1170" height="240" alt="">
                    </figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                @foreach ($latest_product as $product)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('userpage.detail', ['product' => $product->id]) }}">
                                            <figure>
                                                <img 
                                                src="{{ asset('admin-assets/images/product/') . '/'. $product->avatar }}" 
                                                width="800"
                                                height="800">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{ route('userpage.detail', ['product' => $product->id]) }}" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('userpage.detail', ['product' => $product->id]) }}" class="product-name">
                                            <span>
                                                {{ $product->name }}
                                            </span>
                                        </a>
                                        <div class="wrap-price">
                                            <span class="product-price">{{ number_format($product->price) }} VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Sản phẩm theo danh mục</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/page-img/long-banner-2.png') }}" width="1170" height="240" alt="">
                    </figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        <a href="#gaming" class="tab-control-item active">Laptop Gaming</a>
                        <a href="#office" class="tab-control-item">Laptop văn phòng</a>
                    </div>
                    <div class="tab-contents">

                        <div class="tab-content-item active" id="gaming">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                @foreach ($gaming_laptop as $laptop)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('userpage.detail', ['product' => $laptop->id]) }}">
                                            <figure>
                                                <img 
                                                src="{{ asset('admin-assets/images/product') . '/' . $laptop->avatar}}" 
                                                width="800"
                                                height="800">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                            {{-- <span class="flash-item sale-label">sale</span> --}}
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{ route('userpage.detail', ['product' => $laptop->id]) }}" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('userpage.detail', ['product' => $laptop->id]) }}" class="product-name">
                                            <span>
                                                {{ $laptop->name }}
                                            </span>
                                        </a>
                                        <div class="wrap-price">
                                            <span class="product-price">
                                                {{ number_format($laptop->price) }} VNĐ
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-content-item" id="office">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container "
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                @foreach ($office_laptop as $laptop)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('userpage.detail', ['product' => $laptop->id]) }}">
                                            <figure>
                                                <img 
                                                src="{{ asset('admin-assets/images/product') . '/' . $laptop->avatar}}" 
                                                width="800"
                                                height="800">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                            {{-- <span class="flash-item sale-label">sale</span> --}}
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{ route('userpage.detail', ['product' => $laptop->id]) }}" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('userpage.detail', ['product' => $laptop->id]) }}" class="product-name">
                                            <span>
                                                {{ $laptop->name }}
                                            </span>
                                        </a>
                                        <div class="wrap-price">
                                            <span class="product-price">
                                                {{ number_format($laptop->price) }} VNĐ
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</main>
@endsection