@extends('admin.layout.master')
@section('content')
<div class="content-page">
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

<footer class="iq-footer">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="extra/privacy.html">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="extra/term-service.html">Terms of Use</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 text-right">
                        <span class="mr-1"><script>document.write(new Date().getFullYear())</script>©</span> <a href="#" class="">POS-Dash</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@endsection
