@extends('layout.master')
@section('content')
@if ($errors->any())
    @include('layout.alert-err')
@endif
<main id="main" class="main-site">

    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <div class="wrap-address-billing">
                <h3 class="box-title">Billing Address</h3>
                <form action="{{ route('userpage.save-checkout') }}" method="post" name="frm-billing">
                    @csrf
                    <input type="text" name="customer_id" value="{{ session()->get('user_id') }}" hidden>
                    <p class="row-in-form" >
                        <label for="fname">Tên người nhận<span>*</span></label>
                        <input id="fname" type="text" name="customer_name">
                    </p>
                    <p class="row-in-form">
                        <label for="phone">Số điện thoại<span>*</span></label>
                        <input id="phone" type="number" name="phone_number">
                    </p>
                    <p class="row-in-form">
                        <label for="city">Thành phố<span>*</span></label>
                        <select name="city" class="form-control" style="display: block;">
                            <option value="Hồ Chí Minh" selected>Hồ Chí Minh</option>
                            <option value="Đà Nẵng">Đà Nẵng</option>
                            <option value="Hà Nội">Hà Nội</option>
                        </select>
                    </p>
                    <p class="row-in-form">
                        <label for="country">Quốc gia<span>*</span></label>
                        <select name="country" class="form-control" style="display: block;">
                            <option value="Việt Nam" selected>Việt Nam</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Indonesia">Indonesia</option>
                        </select>
                    </p>
                    <p class="row-in-form" style="width: 100%;">
                        <label for="add">Địa chỉ:</label>
                        <input id="add" type="text" name="address">
                    </p>
                    <p class="row-in-form" style="width: 100%;">
                        <label for="country">Ghi chú<span>*</span></label>
                        <textarea name="note" style="width: 100%; border: 1px solid #e6e6e6;" rows="8"></textarea>
                    </p>
                    {{-- <p class="row-in-form fill-wife">
                        <label class="checkbox-field">
                            <input name="create-account" id="create-account" value="forever" type="checkbox">
                            <span>Create an account?</span>
                        </label>
                        <label class="checkbox-field">
                            <input name="different-add" id="different-add" value="forever" type="checkbox">
                            <span>Ship to a different address?</span>
                        </label>
                    </p> --}}
                    <div class="summary summary-checkout">
                        <div class="summary-item payment-method">
                            <h4 class="title-box">Payment Method</h4>
                            <div class="choose-payment-methods">
                                <label class="payment-method">
                                    <input name="payment_method" id="payment-method-bank" value="trực tiếp" type="radio" checked>
                                    <span>Thanh toán trực tiếp</span>
                                </label>
                                <label class="payment-method">
                                    <input name="payment_method" id="payment-method-visa" value="banking" type="radio">
                                    <span>Thanh toán online</span>
                                </label>
                            </div>
                            <p class="summary-info grand-total">
                                <span>Tổng tiền</span> <span class="grand-total-price">{{Cart::total(0)}} VNĐ</span>
                                <input type="number" name="total_price" value="{{ Cart::totalFloat() }}" hidden>
                            </p>
                            <button type="submit" class="btn btn-medium">Place order now</button>
                        </div>
                        <div class="summary-item shipping-method">
                            <h4 class="title-box f-title">Shipping method</h4>
                            <p class="summary-info"><span class="title">Flat Rate</span></p>
                            <p class="summary-info"><span class="title">Fixed $50.00</span></p>
                            <h4 class="title-box">Discount Codes</h4>
                            <p class="row-in-form" style="width: 100%;">
                                <label for="coupon-code">Enter Your Coupon code:</label>
                                <input id="discount_code" type="text" name="coupon-code">	
                            </p>
                            <button type="submit" class="btn btn-small">Apply</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="wrap-show-advance-info-box style-1 box-in-site" style="width: 100%; margin-bottom: 20px">
                <h3 class="title-box">Các sẩn phẩm bạn mua</h3>
            </div>
            <div class="wrap-iten-in-cart">
                <h3 class="box-title">Tên sản phẩm</h3>
                <ul class="products-cart">
                    @if (isset($data))
                    @foreach ($data as $item)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{ asset('admin-assets/images/product/' . $item->options['img']) }}" alt=""></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{ route('userpage.detail', ['product' => $item->id]) }}">
                                {{ $item->name }}
                            </a>
                        </div>
                        <div class="price-field produtc-price">
                            <p class="price">{{number_format($item->price) }} VNĐ</p>
                        </div>
                        <div class="quantity">
                            <div class="quantity-inputt">
                                <form action="{{ route('userpage.update-qty') }}" method="post">
                                    @csrf
                                    <input type="text" name="qty" value="{{ $item->qty }}" >
                                    <input type="text" name="rowId" value="{{ $item->rowId }}" hidden>
                                    <button class="btn btn-increase" name="action" type="submit" value="increase"></button>
                                    <button class="btn btn-reduce" name="action" type="submit" value="minus"></button>
                                </form>
                            </div>
                        </div>
                        <div class="price-field sub-total">
                            <p class="price">{{number_format($item->price * $item->qty) }} VNĐ</p>
                        </div>
                        <div class="">
                            <a href="{{ route('userpage.delete-row-cart', ['rowId' => $item->rowId]) }}" class="btn btn-delete" title="">
                                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
@endsection