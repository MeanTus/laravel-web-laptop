@extends('layout.master')
@section('content')
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('userpage.index') }}" class="link">home</a></li>
                <li class="item-link"><span>Thank You</span></li>
            </ul>
        </div>
    </div>
    
    <div class="container pb-60">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Cảm ơn bạn đã tin tưởng chúng tôi</h2>
                <a href="{{ route('userpage.index') }}" class="btn btn-submit btn-submitx">Tiếp tục mua sắm</a>
            </div>
        </div>
    </div><!--end container-->

</main>
@endsection