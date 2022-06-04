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
                            <h4 class="card-title">Thêm danh mục sản phẩm</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.store-category') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tên danh mục *</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" 
                                        name="category_name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Thêm danh mục</button>
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
