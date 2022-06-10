@extends('admin.layout.master')
@section('content')

<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Cập nhật danh mục sản phẩm</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update-category', ['category' => $category['id']]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tên danh mục *</label>
                                        <input type="text" class="form-control" placeholder="Enter Name"
                                        name="category_name"
                                        value="{{ $category['category_name'] }}"
                                        required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Cập nhật danh mục</button>
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
