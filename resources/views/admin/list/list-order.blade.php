@extends('admin.layout.master')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh Sách Đơn Hàng</h4>
                    </div>
                    {{-- <a href="{{ route('admin.add-product') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Danh sách sản phẩm</a> --}}
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
                            <th>Mã đơn hàng</th>
                            <th>Tên người đặt</th>
                            <th>Thành phố</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Ngày đặt</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody class="ligth-body">
                        @foreach ($list_order as $order)
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
                                        {{ $order->id }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $order->customer_name }}
                            </td>
                            <td>
                                {{ $order->city }}
                            </td>
                            <td>
                                {{ number_format($order->total_price) }} VNĐ
                            </td>
                            <td>
                                {{ $order->getStatusOrder() }}
                            </td>
                            <td>
                                {{ $order->created_at }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                       href="{{ route('admin.show-order', ['order' => $order->id]) }}"><i class="ri-eye-line mr-0"></i></a>
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
