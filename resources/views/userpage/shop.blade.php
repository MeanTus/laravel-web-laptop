@extends('layout.master')
@section('content')
<main id="main" class="main-site left-sidebar">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Digital & Electronics</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">Digital & Electronics</h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" >
                                <option value="menu_order" selected="selected">Default sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" >
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="18">18 per page</option>
                                <option value="21">21 per page</option>
                                <option value="24">24 per page</option>
                                <option value="30">30 per page</option>
                                <option value="32">32 per page</option>
                            </select>
                        </div>

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>

                    </div>

                </div><!--end wrap shop control-->

                <div class="row">
                    <ul class="product-list grid-products equal-container">
                        @foreach ($list_product as $product)
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('userpage.detail', ['product' => $product->product_id]) }}">
                                        <figure>
                                            <img 
                                            src="{{ asset('admin-assets/images/product') . '/' . $product->product_avatar }}" 
                                            style="max-width: 250px; max-height: 180px">
                                        </figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('userpage.detail', ['product' => $product->product_id]) }}" class="product-name">
                                        <span>{{ $product->product_name }}</span>
                                    </a>
                                    <div class="wrap-price"><span class="product-price">{{$product->formatPrice()}} VNĐ</span></div>
                                    <form>
                                        @csrf
                                        <input 
                                        type="hidden" 
                                        name="id" 
                                        class="cart_product_id_{{ $product->product_id }}" 
                                        value="{{ $product->product_id }}">

                                        <input 
                                        type="hidden" 
                                        name="id" 
                                        @if (session()->has('user_id'))
                                            value="{{ session()->get('user_id') }}"
                                        @else
                                            value="-1"
                                        @endif
                                        class="user_id" >

                                        <input type="hidden" 
                                        class="cart_product_quantity_{{ $product->product_id }}" 
                                        name="product-quatity" 
                                        value="1" >
                                        <span style="width: 100%; background-color: red; color: white" data-id="{{ $product->product_id }}" type="submit" class="btn add-to-cart-ajax">
                                            Thêm vào giỏ hàng
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    <ul class="page-numbers">
                        {{ $list_product->links() }}
                    </ul>
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">Danh mục</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach ($categories as $category)
                                <li class="category-item">
                                    <a 
                                    {{-- href="{{ request()->fullUrlWithQuery(['category' => $category->id]) }}" --}}
                                    href="{{ request()->fullUrlWithQuery(['category' => $category->id]) }}"
                                    class="cate-link">
                                        {{ $category->category_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">Thương hiệu</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited" data-show="6">
                            @foreach ($brands as $brand)
                                <li class="list-item">
                                    <a class="filter-link" href="{{ request()->fullUrlWithQuery(['brand' => $brand->id]) }}">{{ $brand->brand_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- brand widget-->

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Khoảng giá</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited" data-show="6">
                        <li class="list-item">
                            <a class="filter-link" href="{{ request()->fullUrlWithQuery(['price' => '10000000_20000000']) }}">
                                10,000,000đ - 20,000,000đ
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="filter-link" href="{{ request()->fullUrlWithQuery(['price' => '20000000_30000000']) }}">
                                20,000,000đ - 30,000,000đ
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="filter-link" href="{{ request()->fullUrlWithQuery(['price' => '30000000_40000000']) }}">
                                30,000,000đ - 40,000,000đ
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="filter-link" href="{{ request()->fullUrlWithQuery(['price' => '40000000_50000000']) }}">
                                40,000,000đ - 50,000,000đ
                            </a>
                        </li>
                        <li class="list-item">
                            <a class="filter-link" href="{{ request()->fullUrlWithQuery(['price' => '50000000_null']) }}">
                                50,000,000đ trở lên
                            </a>
                        </li>
                        </ul>
                    </div>
                </div><!-- Price-->

                <div class="widget mercado-widget filter-widget">
                    <h2 class="widget-title">Màu sắc</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list has-count-index">
                            @foreach ($colors as $color)
                            <li class="list-item">
                                <a class="filter-link" href="{{ request()->fullUrlWithQuery(['color' => $color->hex]) }}">
                                    <button 
                                    style="width: 32px; height: 32px; border-radius: 8px; background-color: {{ $color->hex }}">
                                    </button>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Color -->

                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Bán chạy</h2>
                    <div class="widget-content">
                        <ul class="products">
                            @foreach ($mostViewProduct as $product)
                                @include('layout.popular-product')
                            @endforeach

                        </ul>
                    </div>
                </div><!-- brand widget-->

            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>
@endsection