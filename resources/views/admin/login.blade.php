<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="55HP4HzlRrFNDeKUhrLRoYZx3cRhwcA5GttTwKXC">

    <title>Login Admin</title>

    <link rel="shortcut icon" href="{{ asset('admin-assets/images/favicon.ico')}}"/>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/backend.css')}}">

    <link rel="stylesheet" href="{{ asset('admin-assets/css/backend-bundle.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/remixicon/fonts/remixicon.css')}}"/>
</head>
<body>
    <div class="wrapper">
        <section class="login-content">
            <div class="container">
                <div class="row align-items-center justify-content-center height-self-center">
                    <div class="col-lg-8">
                        <div class="card auth-card">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center auth-content">
                                    <div class="col-lg-7 align-self-center">
                                        <div class="p-3">
                                            @if ($errors->any())
                                                @include('layout.alert-err')
                                            @endif
                                            <h2 class="mb-2">Sign In</h2>
                                            <p>Login to stay connected.</p>
                                            <!-- Validation Errors -->
                                            <form method="POST" action="{{ route('admin.processLogin') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" id="email"
                                                                type="email" name="email" value=""
                                                                placeholder="" required>
                                                            <label>
                                                                Email<span class="text-danger">*</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" type="password"
                                                                placeholder="" name="password" required
                                                                autocomplete="current-password">
                                                            <label>
                                                                Password<span class="text-danger">*</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck1">
                                                            <label class="custom-control-label control-label-1"
                                                                for="customCheck1">Remember Me</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a href="recover-password.html"
                                                        class="text-primary float-right">Forgot Password?</a>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">sign</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 content-right">
                                        <img src="{{ asset('admin-assets/images/login/01.png')}}" class="img-fluid image-right" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>