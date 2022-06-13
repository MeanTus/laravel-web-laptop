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
                            <h4 class="card-title">Thêm sản phẩm</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.store-product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tên sản phẩm *</label>
                                        <input 
                                        name="name" 
                                        type="text" 
                                        placeholder="Enter name" 
                                        class="form-control" 
                                        required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên thương hiệu *</label>
                                        <select name="brand_id" class="selectpicker form-control" data-style="py-0">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Đơn vị *</label>
                                        <input 
                                        name="unit"
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Enter Unit" 
                                        data-errors="Please Enter Unit." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên danh mục *</label>
                                        <select name="category_id" class="selectpicker form-control" data-style="py-0">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên nhà cung cấp *</label>
                                        <select name="supplier_id" class="selectpicker form-control" data-style="py-0">
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Giá tiền *</label>
                                        <input 
                                        name="price"
                                        type="number" 
                                        class="form-control" 
                                        placeholder="Enter Price" 
                                        required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Số lượng *</label>
                                        <input 
                                        name="quantity"
                                        type="number" 
                                        class="form-control" 
                                        placeholder="Enter Quantity" 
                                        required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" class="form-control image-file" name="avatar" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô tả *</label><br>
                                        <textarea name="desc" id="" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Thêm sản phẩm</button>
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
