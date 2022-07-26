@extends('layout.master')
@section('content')

<main id="main" class="main-site left-sidebar">
    @if (session('success'))
        @include('layout.alert-success')
    @endif
    @if ($errors->any())
        @include('layout.alert-err')
    @endif
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('userpage.index') }}" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="display: flex; justify-content: space-between;" >
                <div class="wrap-login-item " style="margin-right: 20px">
                    <div class="login-form form-item form-stl">
                        <form name="frm-login" method="POST" action="{{ route('userpage.process_login') }}">
                            @csrf
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Đăng nhập</h3>
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-login-uname">Email: </label>
                                <input type="email" value="{{ old('email') }}" id="frm-login-uname" name="email" placeholder="Nhập email">
                            </fieldset>

                            <fieldset class="wrap-input">
                                <label for="frm-login-pass">Mật khẩu:</label>
                                <input type="password" id="frm-login-pass" name="password" placeholder="************">
                            </fieldset>

                            <fieldset class="wrap-input">
                                <label class="remember-field">
                                    <input class="frm-input " name="rememberme" id="rememberme" value="forever" type="checkbox"><span>Remember me</span>
                                </label>
                                <a class="link-function left-position" href="{{ route('userpage.page-reset', ['action' => 'forgot']) }}" title="Forgotten password?">Quên mật khẩu?</a>
                            </fieldset>
                            <input type="submit" class="btn btn-submit" value="Đăng nhập" name="submit">
                        </form>
                    </div>
                </div>

                <div class="wrap-login-item ">
                    <div class="register-form form-item ">
                        <form class="form-stl" >
                            @csrf
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Đăng ký</h3>
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-reg-lname">Họ và tên *</label>
                                <input type="text" id="frm-reg-lname" name="name" placeholder="Họ và tên">
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-reg-email">Email *</label>
                                <input type="email" id="frm-reg-email" name="email" placeholder="Email">
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-reg-email">Giới tính *</label><br>
                                <input type="radio" name="gender" value="1" checked>
                                <label for="Male">Nam</label><br>
                                <input type="radio" id="frm-reg-gender" name="gender" value="0">
                                <label for="Male">Nữ</label><br>
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-reg-email">Ngày sinh *</label>
                                <input type="date" id="frm-reg-birthdate" name="birthdate">
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half left-item ">
                                <label for="frm-reg-pass">Mật khẩu *</label>
                                <input type="password" id="frm-reg-pass" name="password" placeholder="Mật khẩu" required>
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half ">
                                <label for="frm-reg-cfpass">Xác nhận lại mật khẩu *</label>
                                <input type="password" id="frm-reg-cfpass" name="cfpass" placeholder="Xác nhận lại mật khẩu" required>
                            </fieldset>
                            <span id="btn-register" class="btn btn-sign" value="Đăng ký" name="register">Đăng ký</span>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--end row-->
        <br>
        <br>

    </div><!--end container-->

    @push('register')
        <script src="{{ asset('assets/js/check-register.js') }}"></script>
    @endpush
</main>
@endsection