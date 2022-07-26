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
                        <h4 class="mb-3">Danh Sách Mã giảm giá</h4>
                    </div>
                    <a href="{{ route('admin.add-coupon') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm mã giảm giá</a>
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
                            <th>Mã</th>
                            <th>Mã code</th>
                            <th>Số lượng</th>
                            <th>Phần trăm giảm</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach ( $list_coupon as $coupon )
                                <tr>
                                    <td>
                                        <div class="checkbox d-inline-block">
                                            <input type="checkbox" class="checkbox-input" id="checkbox2">
                                            <label for="checkbox2" class="mb-0"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                {{ $coupon['id'] }}
                                                {{-- <p class="mb-0"><small>This is test Product</small></p> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $coupon['code'] }}
                                    </td>

                                    <td>
                                        {{ $coupon['quantity'] }}
                                    </td>

                                    <td>
                                        {{ $coupon['discount_rate'] }}
                                    </td>
                                    <td>
                                        {{ $coupon->getStatusCoupon() }}
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                            href="#"><i class="ri-eye-line mr-0"></i></a>
                                            <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                            href="{{ route('admin.edit-coupon', ['coupon' => $coupon['id']]) }}"><i class="ri-pencil-line mr-0"></i></a>
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
