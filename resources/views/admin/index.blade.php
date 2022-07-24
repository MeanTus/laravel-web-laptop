
@extends('admin.layout.master')
@section('content')

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-transparent card-block card-stretch card-height border-none">
                    <div class="card-body p-0 mt-lg-2 mt-0">
                        <h3 class="mb-3">Hello {{ session()->get('admin_name') }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-info-light">
                                        <img src=" {{ asset('admin-assets/images/page-img/1.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Tổng sản phẩm hiện có</p>
                                        <h4>{{ $count_product }}</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="85">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-danger-light">
                                        <img src=" {{ asset('admin-assets/images/page-img/2.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Tổng khách hàng</p>
                                        <h4>{{ $count_customer }}</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-danger iq-progress progress-1" data-percent="70">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-success-light">
                                        <img src=" {{ asset('admin-assets/images/page-img/3.png') }}" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Tổng đơn hàng</p>
                                        <h4>{{ $count_order }}</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-success iq-progress progress-1" data-percent="75">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Doanh số</h4>
                        </div>
                            <form autocomplete="off">
                                @csrf
                                <span>Từ ngày: <input type="date" id="datepicker"></span>
                                <span>Đến ngày: <input type="date" id="datepicker2"></span>
                                <span class="btn btn-primary ml-2" id="bth-dashboard-filter">Lọc</span>
                            </form>
                    </div>
                    <div class="card-body">
                        <div id="mychart" style="min-height: 350px"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-block card-stretch card-height-helf">
                    <div class="card-body">
                        <div class="d-flex align-items-top justify-content-between">
                            <div class="">
                                <p class="mb-0">Doanh số</p>
                                <h5 id="output_sales"></h5>
                            </div>
                            <div class="card-header-toolbar d-flex align-items-center">
                                <form>
                                    @csrf
                                    <select class="selectpicker form-control filter-sales" data-style="py-0">
                                        <option value="7Ngay">7 Ngày qua</option>
                                        <option value="thangTruoc" >Tháng trước</option>
                                        <option value="thangNay" >Tháng này</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div id="layout1-chart-3" class="layout-chart-1"></div>
                    </div>
                </div>
                <div class="card card-block card-stretch card-height-helf">
                    <div class="card-body">
                        <div class="d-flex align-items-top justify-content-between">
                            <div class="">
                                <p class="mb-0">Lợi nhuận</p>
                                <h5 id="output_profit"></h5>
                            </div>
                            <div class="card-header-toolbar d-flex align-items-center">
                                <form>
                                    @csrf
                                    <select class="selectpicker form-control filter-profit" data-style="py-0">
                                        <option value="7Ngay">7 Ngày qua</option>
                                        <option value="thangTruoc" >Tháng trước</option>
                                        <option value="thangNay" >Tháng này</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div id="layout1-chart-4" class="layout-chart-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Sản phẩm bán chạy</h4>
                        </div>
                        {{-- <div class="card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                                <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton006"
                                      data-toggle="dropdown">
                                    This Month<i class="ri-arrow-down-s-line ml-1"></i>
                                </span>
                                <div class="dropdown-menu dropdown-menu-right shadow-none"
                                     aria-labelledby="dropdownMenuButton006">
                                    <a class="dropdown-item" href="#">Year</a>
                                    <a class="dropdown-item" href="#">Month</a>
                                    <a class="dropdown-item" href="#">Week</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled row top-product mb-0">
                            @foreach ($top_product as $product)
                            <li class="col-lg-12" style="min-height: 297px">
                                <div style="min-height: 297px" class="card card-block card-stretch card-height mb-0">
                                    <div class="card-body">
                                        <div class="bg-warning-light rounded">
                                            <img 
                                            style="min-height: 173px"
                                            src="{{ asset('admin-assets/images/product' . '/' . $product->avatar) }}" class="style-img img-fluid m-auto p-3">
                                        </div>
                                        <div class="style-text text-left mt-3">
                                            <h5 class="mb-1">{{ $product->name }}</h5>
                                            <p class="mb-0">Số lượng bán: {{ $product->quantity_sold }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>

@endsection
