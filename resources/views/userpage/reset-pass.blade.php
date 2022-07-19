@extends('layout.master')
@section('content')
@if ($errors->any())
    @include('layout.alert-err')
@endif
<main id="main" class="main-site left-sidebar">
    @if (session('success'))
        @include('layout.alert-success')
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <br>
                    @if ($forgot)
                    <div class="wrap-login-item">
                        <div class="login-form form-item form-stl">
                            <form name="frm-login" method="GET" action="{{ route('userpage.reset-pass') }}">
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Nhập Email</h3>
                                </fieldset>

                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Nhập Email:</label>
                                    <input type="email" id="frm-login-uname" name="email" placeholder="Type your email address">
                                </fieldset>
                                <button type="submit" class="btn btn-submit" name="action" value="reset-pass">
                                    Gửi mã xác nhận
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="wrap-login-item">
                        <div class="login-form form-item form-stl">
                            <form name="frm-login" method="POST" action="{{ route('userpage.process-change-pass') }}">
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Đổi mật khẩu</h3>
                                </fieldset>

                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">Mật khẩu mới:</label>
                                    <input type="password" id="frm-login-pass" name="password" placeholder="************">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">Nhập lại mật khẩu mới:</label>
                                    <input type="password" id="frm-login-pass" name="re-password" placeholder="************">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">Mã xác nhận:</label>
                                    <input type="text" id="frm-login-pass" name="token" placeholder="Nhập mã">
                                </fieldset>

                                <button type="submit" class="btn btn-submit" name="action" value="change-pass">
                                    Đổi mật khẩu
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div><!--end main products area-->
            </div>
        </div><!--end row-->

    </div><!--end container-->

</main>
@endsection