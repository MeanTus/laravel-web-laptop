@extends('admin.layout.master')
@section('content')

@if ($brand !== null)
<div class="content-page">
    @if ($errors->any())
        @include('layout.alert-err')
    @endif
    @if (session('success'))
        @include('layout.alert-success')
    @endif
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Chỉnh sửa thương hiệu sản phẩm</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update-brand', ['brand' => $brand['id']]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tên thương hiệu *</label>
                                        <input type="text" class="form-control"
                                        name="brand_name"
                                        value="{{ $brand['brand_name'] }}"
                                        required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <img 
                                        id="output"
                                        class="img-fluid rounded avatar-80 mr-3"
                                        src="{{ asset('admin-assets/images/brands/') . '/' .$brand['avatar'] }}" 
                                        alt="">
                                        @include('layout.edit-avatar')
                                    </div>
                                </div>
                                <input type="text" value="{{ $brand['avatar'] }}" name="old-avatar" hidden>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Chỉnh sửa thương hiệu</button>
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
                                <h4 class="card-title">Thêm thương hiệu sản phẩm</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.store-brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên thương hiệu *</label>
                                            <input type="text" class="form-control" placeholder="Enter Name" 
                                            name="brand_name" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" class="form-control image-file" name="avatar" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Thêm thương hiệu</button>
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
