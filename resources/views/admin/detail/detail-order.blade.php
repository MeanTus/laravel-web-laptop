@extends('admin.layout.master')
@section('content')

    <div class="content-page">
        @if ($errors->any())
            @include('layout.alert-err')
        @endif
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Chi tiết đơn hàng</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">
                                                Người nhận hàng:
                                            </label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $order->customer_name }}">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">
                                                Số điện thoại người nhận:
                                            </label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $order->phone_number }}">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">
                                                Địa chỉ:
                                            </label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $order->address . ', ' . $order->city . ', ' . $order->country }}">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">
                                                Mã giảm giá:
                                            </label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $order->discount_code }}">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">
                                                Tiền giảm:
                                            </label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $order->discount_price }}">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">
                                                Phương thức thanh toán:
                                            </label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $order->payment_method }}">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">
                                                Trạng thái:
                                            </label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $order->getStatusOrder() }}">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">
                                                Tổng tiền:
                                            </label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ number_format($order->total_price) . ' VNĐ' }}"> 
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">
                                                Ngày đặt hàng:
                                            </label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $order->created_at }}"> 
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ghi chú *</label><br>
                                            <textarea name="desc" id="" class="form-control" rows="8">
                                                {{ $order->note }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="btn btn-primary mr-2">Duyệt đơn</a>
                                <button type="reset" class="btn btn-danger">Hủy Đơn</button>
                            </form>
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
                                    @foreach ($list_product as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img 
                                                src="{{ asset('admin-assets/images/product') . '/' . $product->avatar }}" class="img-fluid avatar-70 mr-3" alt="image">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    {{ $product->name }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ number_format($product->order_price) }} VNĐ</td>
                                        <td>{{ $product->order_quantity }}</td>
                                        <td>{{ number_format($product->total_price) }} VNĐ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
    </div>
@endsection
