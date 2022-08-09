@extends('admin.layout.master')
@section('content')

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
                                <h4 class="card-title">Chi tiết sản phẩm</h4>
                            </div>
                            <a href="{{ route('admin.product') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Danh sách sản phẩm</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Hình ảnh</label><br>
                                            <img 
                                            id="output"
                                            src="{{ asset('admin-assets/images/product') . '/' . $product->avatar }}" 
                                            class="img-fluid avatar-100 mr-3" alt="image">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên sản phẩm *</label>
                                            <input 
                                            name="name" 
                                            value="{{ $product->name }}"
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
                                            <input 
                                            value="{{ $brand->brand_name }}"
                                            type="text" 
                                            class="form-control" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Đơn vị *</label>
                                            <input 
                                            name="unit"
                                            value="{{ $product->unit }}"
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
                                            <input 
                                            value="{{ $category->category_name }}"
                                            type="text" 
                                            class="form-control" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên nhà cung cấp *</label>
                                            <input 
                                            value="{{ $supplier->name }}"
                                            type="text" 
                                            class="form-control" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Giá tiền *</label>
                                            <input 
                                            name="price"
                                            value="{{ number_format($product->price) }} VNĐ"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Enter Price" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Màu sắc *</label>
                                            <input 
                                            value="{{ $color->name_color }}"
                                            type="text" 
                                            class="form-control" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số lượng *</label>
                                            <input 
                                            name="quantity"
                                            value="{{ $product->quantity }}"
                                            type="number" 
                                            class="form-control" 
                                            placeholder="Enter Quantity" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Trạng thái *</label>
                                            <input 
                                            name="quantity"
                                            value="{{ $product->getStatusProduct() }}"
                                            type="text" 
                                            class="form-control" 
                                            disabled>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Khối lượng lượng *</label>
                                        <div class="form-group input-group">
                                            <input 
                                            name="weight"
                                            value="{{ $product->weight }}"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Enter weight" 
                                            required>
                                            <span class="input-group-text">gam</span>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pin *</label>
                                            <input 
                                            name="pin"
                                            value="{{ $product->pin }}"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Enter pin" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số lượng bán được *</label>
                                            <input 
                                            value="{{ $product->quantity_sold }} Cái"
                                            type="text" 
                                            class="form-control" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CPU *</label>
                                            <input 
                                            value="{{ $cpu->name }}"
                                            type="text" 
                                            class="form-control" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>GPU *</label>
                                            <input 
                                            value="{{ $gpu->name }}"
                                            type="text" 
                                            class="form-control" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ram *</label>
                                            <input 
                                            value="{{ $ram->name }}"
                                            type="text" 
                                            class="form-control" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mô tả *</label><br>
                                            <textarea name="desc" id="" class="form-control" rows="10">
                                                {{trim($product->desc)}}
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
