@extends('admin.layout.master')
@section('content')

@if ($product !== null)
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
                                <h4 class="card-title">Chỉnh sửa sản phẩm</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.update-product', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
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
                                            <select name="brand_id" class="selectpicker form-control" data-style="py-0">
                                                @foreach ($brands as $brand)
                                                    <option
                                                    value="{{ $brand->id }}"
                                                    @if ($product->brand_id === $brand->id)
                                                        selected
                                                    @endif
                                                    >
                                                    {{ $brand->brand_name }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                            <select name="category_id" class="selectpicker form-control" data-style="py-0">
                                                @foreach ($categories as $category)
                                                    <option 
                                                    value="{{ $category->id }}"
                                                    @if ($product->category_id === $category->id)
                                                        selected
                                                    @endif
                                                    >
                                                    {{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên nhà cung cấp *</label>
                                            <select name="supplier_id" class="selectpicker form-control" data-style="py-0">
                                                @foreach ($suppliers as $supplier)
                                                    <option 
                                                    value="{{ $supplier->id }}"
                                                    @if ($product->supplier_id === $supplier->id)
                                                        selected
                                                    @endif
                                                    >
                                                    {{ $supplier->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Giá tiền *</label>
                                            <input 
                                            name="price"
                                            value="{{ $product->price }}"
                                            type="number" 
                                            class="form-control" 
                                            placeholder="Enter Price" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Màu sắc *</label>
                                            <select name="color_id" class="selectpicker form-control" data-style="py-0">
                                                @foreach ($colors as $color)
                                                    <option 
                                                    @if ($product->color_id === $color->hex)
                                                        selected
                                                    @endif
                                                    value="{{ $color->hex }}">
                                                        {{ $color->name_color }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                        <div class="form-group">
                                            <label>Khối lượng lượng *</label>
                                            <input 
                                            name="weight"
                                            value="{{ $product->weight }}"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Enter weight" 
                                            required>
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
                                            <label>Ram *</label>
                                            <select name="ram_id" class="selectpicker form-control" data-style="py-0">
                                                @foreach ($rams as $ram)
                                                    <option 
                                                    @if ($product->ram_id === $ram->ram_id)
                                                        selected
                                                    @endif
                                                    value="{{ $ram->ram_id }}">
                                                        {{ $ram->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CPU *</label>
                                            <select name="cpu_id" class="selectpicker form-control" data-style="py-0">
                                                @foreach ($list_cpu as $cpu)
                                                    <option 
                                                    @if ($product->cpu_id === $cpu->cpu_id)
                                                        selected
                                                    @endif
                                                    value="{{ $cpu->cpu_id }}">
                                                        {{ $cpu->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>GPU *</label>
                                            <select name="gpu_id" class="selectpicker form-control" data-style="py-0">
                                                @foreach ($list_gpu as $gpu)
                                                    <option 
                                                    @if ($product->gpu_id === $gpu->gpu_id)
                                                        selected
                                                    @endif
                                                    value="{{ $gpu->gpu_id }}">
                                                        {{ $gpu->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Hình ảnh</label><br>
                                            <img 
                                            id="output"
                                            src="{{ asset('admin-assets/images/product') . '/' . $product->avatar }}" 
                                            class="img-fluid avatar-100 mr-3" alt="image">
                                            @include('layout.edit-avatar')
                                            <input type="text" name="old-avatar" value="{{ $product->avatar }}" hidden>
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
                                <button type="submit" name="action-edit" value="edit" class="btn btn-primary mr-2">Chỉnh sửa sản phẩm</button>

                                @if ($product->status == 0)
                                    <button type="submit" name="action-edit" value="hidden-product" class="btn btn-danger">Ẩn sản phẩm</button>
                                @else
                                    <button type="submit" name="action-edit" value="active-product" class="btn btn-danger">Kích hoạt sản phẩm</button>
                                @endif
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
                                            value="{{ old('name') }}"
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
                                            value="{{ old('unit') }}"
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Giá tiền *</label>
                                            <input 
                                            name="price"
                                            type="number" 
                                            value="{{ old('price') }}"
                                            class="form-control" 
                                            placeholder="Enter Price" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Màu sắc *</label>
                                            <select name="color_id" class="selectpicker form-control" data-style="py-0">
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color->hex }}">{{ $color->name_color }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Số lượng *</label>
                                            <input 
                                            name="quantity"
                                            type="number" 
                                            value="{{ old('quantity') }}"
                                            class="form-control" 
                                            placeholder="Enter Quantity" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Khối lượng lượng *</label>
                                            <input 
                                            name="weight"
                                            type="text" 
                                            value="{{ old('weight') }}"
                                            class="form-control" 
                                            placeholder="Enter weight" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Pin *</label>
                                            <input 
                                            name="pin"
                                            type="text" 
                                            value="{{ old('pin') }}"
                                            class="form-control" 
                                            placeholder="Enter pin" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ram *</label>
                                            <select name="ram_id" class="selectpicker form-control" data-style="py-0">
                                                @foreach ($rams as $ram)
                                                    <option value="{{ $ram->ram_id }}">{{ $ram->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CPU *</label>
                                            <select name="cpu_id" class="selectpicker form-control" data-style="py-0">
                                                @foreach ($list_cpu as $cpu)
                                                    <option value="{{ $cpu->cpu_id }}">{{ $cpu->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>GPU *</label>
                                            <select name="gpu_id" class="selectpicker form-control" data-style="py-0">
                                                @foreach ($list_gpu as $gpu)
                                                    <option value="{{ $gpu->gpu_id }}">{{ $gpu->name }}</option>
                                                @endforeach
                                            </select>
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
                                            <textarea name="desc" id="" class="form-control" rows="10">
                                                {{ old('desc') }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Thêm sản phẩm</button>
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
