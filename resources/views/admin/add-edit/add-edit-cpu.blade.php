@extends('admin.layout.master')
@section('content')

@if ($cpu !== null)
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
                                <h4 class="card-title">Chỉnh sửa CPU</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.update-cpu', ['cpu' => $cpu->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mã CPU *</label>
                                            <input type="text" class="form-control" placeholder="Enter Code" 
                                            name="id" value="{{ $cpu->id }}" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tên CPU *</label>
                                            <input type="text" class="form-control" placeholder="Enter Name" 
                                            name="name" value="{{ $cpu->name }}" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Chỉnh sửa CPU</button>
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
                                <h4 class="card-title">Thêm CPU</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.store-cpu') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mã CPU *</label>
                                            <input type="text" value="{{ old('id') }}" class="form-control" placeholder="Enter Code" 
                                            name="id" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tên CPU *</label>
                                            <input type="text" value="{{old('name')}}" class="form-control" placeholder="Enter Name" 
                                            name="name" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Thêm CPU</button>
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
