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
                    @if (session()->has('discount'))
                        <input type="text" name="discount_code" value="{{ session()->get('discount_code') }}" hidden>
                        <input type="text" name="discount_price" value="{{ Cart::discount() }}" hidden>
                    @endif
                    <input type="text" name="customer_id" value="{{ session()->get('user_id') }}" hidden>
                    <input type="text" name="email" value="{{ session()->get('user_email') }}" hidden>
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
                            <p class="summary-info grand-total">
                                <span>Tổng tiền</span> <span class="grand-total-price">{{Cart::total(0)}} VNĐ</span>
                                <input type="number" name="total_price" value="{{ Cart::totalFloat() }}" hidden>
                                <input type="text" name="discount_code" value="{{ session()->get('discount_code') }}" hidden>
                                <input type="number" name="discount_price" value="{{ Cart::discountFloat() }}" hidden>
                            </p>
                            <button type="submit" name="payment_method" value="trực tiếp" class="btn btn-medium">
                                Thanh toán trực tiếp
                            </button>
                            <br>
                            <br>
                            <button type="submit" name="payment_method" value="vnpay" class="btn btn-medium">
                                Thanh toán VN Pay
                                <input type="text" name="redirect" value="{{ route('userpage.save-checkout') }}" hidden>
                            </button>
                            {{-- <br>
                            <br>
                            <button type="submit" name="payment_method" value="momo" class="btn btn-medium">
                                Thanh toán Momo
                                <input type="text" name="redirect" value="{{ route('userpage.save-checkout') }}" hidden>
                            </button> --}}
                        </div>

                    </div>
                </form>
            </div>
            <div class="wrap-show-advance-info-box style-1 box-in-site" style="width: 100%; margin-bottom: 20px">
                <h3 class="title-box">Các sẩn phẩm bạn mua</h3>
            </div>
            <table class="data-table table mb-0 tbl-server-info">
                <thead class="bg-white text-uppercase">
                <tr class="ligth ligth-data">
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tổng giá</th>
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
                                    <span>{{ $item->qty }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{number_format($item->price * $item->qty) }} VNĐ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
@endsection