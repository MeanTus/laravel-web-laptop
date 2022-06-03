@extends('admin.layout.master')
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm đơn hàng</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="https://templates.iqonic.design/posdash/laravel/public/list-Order" data-toggle="validator">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="dob">Ngày tạo đơn *</label>
                                        <input type="date" class="form-control" id="dob" name="dob" />
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Order No *</label>
                                        <input type="text" class="form-control" placeholder="Order No" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>Select Supplier</option>
                                            <option>Test Supplier</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nhận hàng</label>
                                        <select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>Received</option>
                                            <option>Not received yet</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Thuế</label>
                                        <select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>No Text</option>
                                            <option>GST @5%</option>
                                            <option>VAT @20%</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input type="text" class="form-control" placeholder="Discount">
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Phương thức thanh toán *</label>
                                        <input type="text" class="form-control" placeholder="Payment" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tổng tiền *</label>
                                        <input type="text" class="form-control" placeholder="Total Price" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ghi chú *</label>
                                        <div id="quill-tool">
                                            <button class="ql-bold" data-toggle="tooltip" data-placement="bottom" title="Bold"></button>
                                            <button class="ql-underline" data-toggle="tooltip" data-placement="bottom" title="Underline"></button>
                                            <button class="ql-italic" data-toggle="tooltip" data-placement="bottom" title="Add italic text <cmd+i>"></button>
                                            <button class="ql-image" data-toggle="tooltip" data-placement="bottom" title="Upload image"></button>
                                            <button class="ql-code-block" data-toggle="tooltip" data-placement="bottom" title="Show code"></button>
                                        </div>
                                        <div id="quill-toolbar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Thêm đơn</button>
                            <button type="reset" class="btn btn-danger">Làm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>

@endsection
