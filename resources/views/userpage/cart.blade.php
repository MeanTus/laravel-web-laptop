@extends('layout.master')
@section('content')
@if ($errors->any())
    @include('layout.alert-err')
@endif
@if (session('success'))
    @include('layout.alert-success')
@endif
@if (session()->get('discount'))
    {{ Cart::setGlobalDiscount(session()->get('discount'))}}
@endif
<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <div style="display: flex;align-items: center;justify-content: space-between;">
                <a href="{{ route('userpage.destroy-cart') }}" class="btn btn-danger">Xóa giỏ hàng</a>
                @if (session('success'))
                    @include('layout.alert-success')
                @endif
                </div>
            <table class="data-table table mb-0 tbl-server-info">
                <thead class="bg-white text-uppercase">
                <tr class="ligth ligth-data">
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tổng giá</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody class="ligth-body">
                    @foreach ($data as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img 
                                src="{{ asset('admin-assets/images/product') . '/' . $item->options['img'] }}" 
                                style="width: 80px; height: 80px; margin-right: 20px" alt="image">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <a class="link-to-product" 
                                    href="{{ route('userpage.detail', ['product' => $item->id]) }}">
                                        {{ $item->name }}
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>{{number_format($item->price) }} VNĐ</td>
                        <td>
                            <div class="quantity">
                                <div class="quantity-inputt">
                                    <form action="{{ route('userpage.update-qty') }}" method="post">
                                        @csrf
                                        <input type="text" name="rowId" value="{{ $item->rowId }}" hidden>
                                        <button class="btn btn-reduce" name="action" type="submit" value="minus"><i class="fa fa-minus" aria-hidden="true"></i>
                                        </button>
                                        <input type="text" name="qty" value="{{ $item->qty }}" >
                                        <button class="btn btn-increase" name="action" type="submit" value="increase">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>{{number_format($item->price * $item->qty) }} VNĐ</td>
                        <td>
                            <div class="">
                                <a href="{{ route('userpage.delete-row-cart', ['rowId' => $item->rowId]) }}" class="btn btn-delete" title="">
                                    <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info">
                        <span class="title">Subtotal</span><b class="index">{{ Cart::total(0) }} VNĐ</b>
                    </p>
                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                    <p class="summary-info total-info ">
                        <span class="title">Tổng giá</span><b class="index">{{ Cart::total(0) }} VNĐ</b>
                    </p>
                </div>
                <br>
                <div class="checkout-info">
                    <div class="summary-item shipping-method">
                        <h4 class="title-box">Discount Codes</h4>
                        <form action="{{ route('userpage.check-coupon') }}" method="post">
                            @csrf
                            <p class="row-in-form" style="width: 100%;">
                                <label for="coupon-code">Enter Your Coupon code:</label>
                                <input id="discount_code" type="text" name="code">	
                            </p>
                            <button type="submit" class="btn btn-small">Apply</button>
                        </form>
                    </div>
                    <a class="btn btn-checkout" href="{{ route('userpage.checkout') }}">Check out</a>
                    <a class="link-to-shop" href="{{ route('userpage.shop') }}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Most Viewed Products</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>
                    </div>
                </div><!--End wrap-products-->
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
@endsection