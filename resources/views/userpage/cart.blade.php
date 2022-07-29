@extends('layout.master')
@section('content')
@if ($errors->any())
    @include('layout.alert-err')
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
                                        <input type="text" style="
                                        border: 0;
                                        text-align: center;
                                        width: 80px; " name="qty" value="{{ $item->qty }}" >
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
                    <p class="summary-info total-info ">
                        <span class="title">Tổng giá</span><b class="index">{{ Cart::total(0) }} VNĐ</b>
                    </p>
                </div>
                <br>
                <div class="checkout-info summary summary-checkout">
                    <div class="summary-item shipping-method">
                        <h4 class="title-box">Mã giảm giá</h4>
                        <form action="{{ route('userpage.check-coupon') }}" method="post">
                            @csrf
                            <p class="row-in-form" style="width: 100%;">
                                <label for="coupon-code">Nhập mã giảm giá của bạn:</label>
                                <input id="discount_code" value="{{ old('code') }}" type="text" name="code">	
                            </p>
                            <button type="submit" class="btn btn-small">Áp dụng</button>
                        </form>
                    </div>
                    <div class="summary-item payment-method">
                        <table class="data-table table mb-0 tbl-server-info">
                            <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Mã giảm giá</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody class="ligth-body">
                                @if (session()->has('discount_code'))
                                    <td>{{ session()->get('discount_code') }}</td>
                                    <td>
                                        <a href="{{ route('userpage.delete-coupon-userpage') }}">
                                            <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="checkout-info">
                    <a class="btn btn-checkout" href="{{ route('userpage.checkout') }}">Thanh toán</a>
                    <a class="link-to-shop" href="{{ route('userpage.shop') }}">Tiếp tục mua hàng<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Các sản phẩm nổi bật</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                        @foreach ($mostViewProduct as $product)
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('userpage.detail', ['product' => $product->id]) }}">
                                        <figure><img src="{{ asset('admin-assets/images/product/' . $product->avatar)}}" width="214" height="214"></figure>
                                    </a>
                                    <div class="group-flash">
                                        {{-- <span class="flash-item new-label">new</span>
                                        <span class="flash-item sale-label">sale</span> --}}
                                        @if ($loop->first)
                                            <span class="flash-item bestseller-label">Bestseller</span>
                                        @endif
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="{{ route('userpage.detail', ['product' => $product->id]) }}" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('userpage.detail', ['product' => $product->id]) }}" class="product-name">
                                        <span>{{ $product->name }}</span>
                                    </a>
                                    <div class="wrap-price"><span class="product-price">{{ number_format($product->price) }} VNĐ</span></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!--End wrap-products-->
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
@endsection