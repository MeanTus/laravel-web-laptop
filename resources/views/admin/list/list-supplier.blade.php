@extends('admin.layout.master')
@section('content')

<div class="content-page">
@if (session('success'))
    @include('layout.alert-success')
@endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh sách nhà cung cấp</h4>
                    </div>
                    <a href="{{ route('admin.add-supplier') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm nhà cung cấp</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkbox1">
                                    <label for="checkbox1" class="mb-0"></label>
                                </div>
                            </th>
                            <th>Tên công ty</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Thành phố</th>
                            <th>Quốc gia</th>
                            <th>Đã cung cấp</th>
                            <th>GST No</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody class="ligth-body">
                        @foreach ($list_supplier as $supplier)
                        <tr>
                            <td>
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkbox2">
                                    <label for="checkbox2" class="mb-0"></label>
                                </div>
                            </td>
                            <td>{{ $supplier['name'] }}</td>
                            <td>{{ $supplier['email'] }}</td>
                            <td>{{ $supplier['phone_number'] }}</td>
                            <td>{{ $supplier['city'] }}</td>
                            <td>{{ $supplier['country'] }}</td>
                            <td>{{ $supplier['quantity_supplied'] }}</td>
                            <td>{{ $supplier['GST'] }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                       href="{{ route('admin.show-supplier', ['supplier' => $supplier['id']]) }}"><i class="ri-eye-line mr-0"></i></a>
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                       href="{{ route('admin.edit-supplier', ['supplier' => $supplier['id']]) }}"><i class="ri-pencil-line mr-0"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
@endsection
