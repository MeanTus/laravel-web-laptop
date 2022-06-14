@extends('admin.layout.master')
@section('content')

@if ($supplier !== null)
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
                                <h4 class="card-title">Add Supplier</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.update-supplier', ['supplier' => $supplier->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input 
                                            name="name"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->name }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input 
                                            name="email"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->email }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number *</label>
                                            <input 
                                            name="phone_number"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->phone_number }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>GST Number *</label>
                                            <input 
                                            name="GST"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->GST }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control" rows="4">
                                                {{ $supplier->address }}
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>City *</label>
                                            <input 
                                            name="city"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->city }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Country *</label>
                                            <input 
                                            name="country"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $supplier->country }}"
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update Supplier</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
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
                                <h4 class="card-title">Add Supplier</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.store-supplier') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <input 
                                            name="name"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Enter Name" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input 
                                            name="email"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Enter Email" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number *</label>
                                            <input 
                                            name="phone_number"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Enter Phone Number" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>GST Number *</label>
                                            <input 
                                            name="GST"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Enter GST Number" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>City *</label>
                                            <input 
                                            name="city"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Enter City" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Country *</label>
                                            <input 
                                            name="country"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Enter Country" 
                                            required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Add Supplier</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
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
