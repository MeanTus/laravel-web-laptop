<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.16/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.css') }}">
</head>

<body class="home-page home-01 ">
    {{-- Header --}}
    @include('layout.header')

    @yield('content')

    {{-- Footer --}}
    @include('layout.footer')

    <script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>

    @stack('register')

    <script>
        $(document).ready(function(){
            $('.add-to-cart-ajax').click(function(){
                var id = $(this).data('id')
                var user_id = $('.user_id').val()
                var cart_product_id = $('.cart_product_id_' + id).val()
                var cart_product_quantity = $('.cart_product_quantity_' + id).val()
                var cart_current_product_quantity = $('.cart_current_product_quantity_' + id).val()
                var _token = $('input[name="_token"]').val()

                if(cart_current_product_quantity == 0){
                    swal('Sản phẩm đã hết hàng, không thể thêm vào giỏ')
                    return
                }

                // Kiểm tra người dùng đã đăng nhập chưa
                if(user_id == -1){
                    swal({
                        title: 'Yêu cầu đăng nhập',
                        text: 'Để thêm sản phẩm vào giỏ hàng và thanh toán bạn vui lòng đăng nhập nhé!',
                        showCancelButton: true,
                        cancelButtonText: 'Xem tiếp',
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'Đăng nhập',
                        closeOnConfirm: false
                        },
                            function() {
                            window.location.href = '{{url('/login')}}';
                            }
                        );
                    return
                }

                $.ajax({
                    url: '/save-cart',
                    method: 'POST',
                    data:{
                        _token:_token,
                        cart_product_id: cart_product_id,
                        cart_product_quantity: cart_product_quantity
                    },
                    success: function(data){
                        console.log(data);
                        if(data == 'Không đủ số lượng sản phẩm'){
                            swal({
                                title: 'Thông báo',
                                text: 'Không đủ số lượng sản phẩm'
                            })
                        } else {
                            swal({
                            title: 'Đã thêm sản phẩm vào giỏ hàng',
                            text: 'Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán',
                            showCancelButton: true,
                            cancelButtonText: 'Xem tiếp',
                            confirmButtonClass: 'btn-success',
                            confirmButtonText: 'Đi đến giỏ hàng',
                            closeOnConfirm: false
                            },
                                function() {
                                window.location.href = '{{url('/cart')}}';
                                }
                            );
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>
