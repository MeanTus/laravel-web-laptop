@extends('admin.layout.master')
@section('content')

@if ($coupon !== null)
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
                            <h4 class="card-title">Chỉnh sửa mã giảm giá</h4>
                        </div>
                        <a href="{{ route('admin.coupon') }}" class="btn btn-primary add-list">Danh sách mã giảm giá</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update-coupon', ['coupon' => $coupon['id']]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Code giảm giá *</label>
                                        <input type="text" class="form-control"
                                        name="code"
                                        value="{{ $coupon['code'] }}"
                                        required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Số % hoặc tiền giảm *</label>
                                        <input type="number" class="form-control" 
                                        name="discount_rate"
                                        value="{{ $coupon['discount_rate'] }}"
                                        required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Số lượng mã giảm *</label>
                                        <input type="number" class="form-control" 
                                        name="quantity" 
                                        value="{{ $coupon['quantity'] }}" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Trạng thái *</label>
                                        <select name="status" class="selectpicker form-control">
                                            <option value="0" 
                                            @if ($coupon['status'] == 0)
                                                selected
                                            @endif
                                            >
                                                Chưa áp dụng
                                            </option>
                                            <option value="1"
                                            @if ($coupon['status'] == 1)
                                                selected
                                            @endif>
                                                Áp dụng
                                            </option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô tả *</label>
                                        <textarea name="desc_coupon" class="form-control" rows="8">
                                            {{ $coupon['desc_coupon'] }}
                                        </textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Chỉnh sửa mã giảm giá</button>
                            <button type="reset" class="btn btn-danger">Làm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
@else
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
                                <h4 class="card-title">Thêm mã giảm giá</h4>
                            </div>
                            <a href="{{ route('admin.coupon') }}" class="btn btn-primary add-list">Danh sách mã giảm giá</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.store-coupon') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Code giảm giá *</label>
                                            <input type="text" class="form-control" 
                                            name="code" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Chức năng mã code *</label>
                                            <select name="feature" class="selectpicker form-control">
                                                <option value="0" selected>Giảm theo phần trăm</option>
                                                <option value="1">Giảm tiền</option>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Số % hoặc tiền giảm *</label>
                                            <input type="number" class="form-control" 
                                            name="discount_rate" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Số lượng mã giảm *</label>
                                            <input type="number" class="form-control" 
                                            name="quantity" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Trạng thái *</label>
                                            <select name="status" class="selectpicker form-control">
                                                <option value="0" selected>Chưa áp dụng</option>
                                                <option value="1">Áp dụng</option>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mô tả *</label>
                                            <textarea name="desc_coupon" class="form-control" rows="8"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Thêm mã giảm giá</button>
                                <button type="reset" class="btn btn-danger">Làm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
    </div>
@endif


@endsection
