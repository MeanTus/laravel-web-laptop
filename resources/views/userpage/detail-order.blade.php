@extends('layout.master')
@section('content')
<main id="main" class="main-site">

    <div class="container">
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
                                          <input style="border: 0px" type="text" readonly id="staticEmail" value="{{ $order->customer_name }}">
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">
                                            Số điện thoại người nhận:
                                        </label>
                                        <div class="col-sm-10">
                                          <input style="border: 0px" type="text" readonly id="staticEmail" value="{{ $order->phone_number }}">
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">
                                            Địa chỉ:
                                        </label>
                                        <div class="col-sm-10">
                                          <input style="border: 0px; width: 100%;" type="text" readonly id="staticEmail" value="{{ $order->address . ', ' . $order->city . ', ' . $order->country }}">
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">
                                            Mã giảm giá:
                                        </label>
                                        <div class="col-sm-10">
                                          <input style="border: 0px" type="text" readonly id="staticEmail" value="{{ $order->discount_code }}">
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">
                                            Tiền giảm:
                                        </label>
                                        <div class="col-sm-10">
                                          <input style="border: 0px" type="text" readonly id="staticEmail" value="{{ $order->discount_price }}">
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">
                                            Phương thức thanh toán:
                                        </label>
                                        <div class="col-sm-10">
                                          <input style="border: 0px" type="text" readonly id="staticEmail" value="{{ $order->payment_method }}">
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">
                                            Trạng thái:
                                        </label>
                                        <div class="col-sm-10">
                                          <input style="border: 0px" type="text" readonly id="staticEmail" value="{{ $order->getStatusOrder() }}">
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">
                                            Tổng tiền:
                                        </label>
                                        <div class="col-sm-10">
                                          <input style="border: 0px" type="text" readonly id="staticEmail" value="{{ number_format($order->total_price) . ' VNĐ' }}"> 
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">
                                            Ngày đặt hàng:
                                        </label>
                                        <div class="col-sm-10">
                                          <input style="border: 0px" type="text" readonly id="staticEmail" value="{{ $order->created_at }}"> 
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
                                            style="width: 80px; height: 80px; margin-right: 20px"
                                            src="{{ asset('admin-assets/images/product') . '/' . $product->avatar }}" class="img-fluid avatar-70 mr-3">
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
                    <button 
                    @if ($order->status !== 0)
                        disabled
                    @endif
                    type="button" 
                    class="btn btn-danger" 
                    data-toggle="modal" 
                    data-target="#myModal">
                        Hủy Đơn
                    </button>
                </div>
            </div>
        </div>
    </div><!--end container-->

    {{-- Modal desc_cancel --}}
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Lý do hủy đơn</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('userpage.cancel-order') }}" method="post">
                    @csrf
                    <input type="text" name="order_id" value="{{ $order->id }}" hidden>
                    <div class="modal-body">
                        <div class="form-check">
                            <input value="Địa chỉ không hợp lệ" class="form-check-input" type="radio" name="desc_cancel" checked>
                            <label class="form-check-label">
                                Địa chỉ không hợp lệ
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="Sản phẩm đã hết hàng" class="form-check-input" type="radio" name="desc_cancel">
                            <label class="form-check-label">
                                Sản phẩm đã hết hàng
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="Không hỗ trợ giao hàng" class="form-check-input" type="radio" name="desc_cancel">
                            <label class="form-check-label">
                                Không hỗ trợ giao hàng
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                      <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>

</main>
@endsection