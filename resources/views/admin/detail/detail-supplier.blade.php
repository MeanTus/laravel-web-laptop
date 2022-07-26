@extends('admin.layout.master')
@section('content')

<div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Chỉnh sửa nhà cung cấp</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.update-supplier', ['supplier' => $supplier->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên nhà cung cấp *</label>
                                            <input 
                                            name="name"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->name }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input 
                                            name="email"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->email }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số điện thoại *</label>
                                            <input 
                                            name="phone_number"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->phone_number }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>GST *</label>
                                            <input 
                                            name="GST"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->GST }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Số sản phẩm đã cung cấp *</label>
                                            <input 
                                            name="GST"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->quantity_supplied }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Thành phố *</label>
                                            <input 
                                            name="city"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->city }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Quốc gia *</label>
                                            <input 
                                            name="country"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->country }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <textarea name="address" class="form-control" rows="4">
                                                {{ $supplier->address }}
                                        </textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
    </div>
@endsection
