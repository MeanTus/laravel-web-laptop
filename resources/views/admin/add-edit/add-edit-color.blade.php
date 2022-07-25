@extends('admin.layout.master')
@section('content')
@if ($color !== null)
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
                                <h4 class="card-title">Cập nhật màu sắc</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.update-color', ['color' => $color['id']]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên màu *</label>
                                            <input type="text" class="form-control"
                                            name="name_color"
                                            value="{{ $color->name_color }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã hex *</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">#</span>
                                                <input type="text" class="form-control" 
                                                value="{{ $color->hex }}"
                                                name="hex" required>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <button 
                                        style="width: 32px; height: 32px; border-radius: 8px; background-color: {{ $color['hex'] }}">
                                        </button>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Cập nhật màu sắc</button>
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
                                <h4 class="card-title">Thêm màu sắc</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.store-color') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên màu *</label>
                                            <input type="text" class="form-control" placeholder="Enter Name" 
                                            name="name_color" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã hex *</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">#</span>
                                                <input 
                                                id="hex-color" 
                                                type="text" 
                                                class="form-control hex"
                                                name="hex" 
                                                required>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <button 
                                        id="output-color"
                                        style="width: 32px; height: 32px; border-radius: 8px;">
                                        </button>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Thêm màu sắc</button>
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
<script>
    function readColor(input){
    console.log('aaaaa');
}
    var input = document.getElementsByClassName('hex')
    console.log(input);
    input.onchange = readColor(this)
</script>