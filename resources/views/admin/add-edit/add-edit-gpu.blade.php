@extends('admin.layout.master')
@section('content')

@if ($gpu !== null)
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
                            <h4 class="card-title">Chỉnh sửa GPU</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update-gpu', ['gpu' => $gpu->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mã GPU *</label>
                                        <input type="text" class="form-control" placeholder="Enter Code" name="id" value="{{ $gpu->id }}" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên GPU *</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" name="name"  value="{{ $gpu->name }}" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Chỉnh sửa GPU</button>
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
                            <h4 class="card-title">Thêm GPU</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.store-gpu') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mã GPU *</label>
                                        <input type="text" class="form-control" placeholder="Enter Code" name="id" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên GPU *</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Thêm GPU</button>
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