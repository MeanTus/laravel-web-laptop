@extends('layout.master')
@section('content')
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('userpage.index') }}" class="link">home</a></li>
                <li class="item-link"><span>lịch sử mua hàng</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <table class="data-table table mb-0 tbl-server-info">
                <thead class="bg-white text-uppercase">
                <tr class="ligth ligth-data">
                    <th>Mã đơn hàng</th>
                    <th>Tên người đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>Chi tiết</th>
                </tr>
                </thead>
                <tbody class="ligth-body">
                @foreach ($list_order as $order)
                <tr>
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
                               href="{{ route('userpage.detail-order', ['order' => $order->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="wrap-pagination-info">
                <ul class="page-numbers">
                    {{ $list_order->links() }}
                </ul>
            </div>
        </div><!--end main content area-->
    </div><!--end container-->

</main>
@endsection