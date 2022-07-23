<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <link rel="shortcut icon" href="{{ asset('admin-assets/images/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/backend.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/sweetalert.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/backend-bundle.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/remixicon/fonts/remixicon.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/%40icon/dripicons/dripicons.css') }}"/>

    <link rel='stylesheet' href="{{ asset('admin-assets/vendor/fullcalendar/core/main.css') }}"/>
    <link rel='stylesheet' href="{{ asset('admin-assets/vendor/fullcalendar/daygrid/main.css') }}"/>
    <link rel='stylesheet' href="{{ asset('admin-assets/vendor/fullcalendar/timegrid/main.css') }}" />
    <link rel='stylesheet' href="{{ asset('admin-assets/vendor/fullcalendar/list/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/mapbox/mapbox-gl.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>

<body class="">

@include('admin.layout.top-navbar')
@include('admin.layout.modal')
@include('admin.layout.sidebar')

@yield('content')

@include('admin.layout.footer')

<!-- Backend Bundle JavaScript -->
<script src="{{ asset('admin-assets/js/backend-bundle.min.js') }}"></script>

<script src="{{ asset('admin-assets/vendor/fullcalendar/core/main.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/fullcalendar/daygrid/main.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/fullcalendar/timegrid/main.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/fullcalendar/list/main.js') }}"></script>

<!--   -->
<script src="{{ asset('admin-assets/js/apexcharts.js') }}"></script>
<script src="{{ asset('admin-assets/js/core.js') }}"></script>
{{-- <script src="{{ asset('admin-assets/js/charts.js') }}"></script> --}}
<script src="{{ asset('admin-assets/js/animated.js') }}"></script>
<script src="{{ asset('admin-assets/js/kelly.js') }}"></script>
<script src="{{ asset('admin-assets/js/maps.js') }}"></script>
<script src="{{ asset('admin-assets/js/worldLow.js') }}"></script>
<script src="{{ asset('admin-assets/js/country2.js') }}"></script>
<script src="{{ asset('admin-assets/js/material.js') }}"></script>
{{-- <script src="{{ asset('admin-assets/js/morris.min.js') }}"></script> --}}
<script src="{{ asset('admin-assets/js/raphael-min.js') }}"></script>
{{-- <script src="{{ asset('admin-assets/js/highcharts.js') }}"></script>
<script src="{{ asset('admin-assets/js/highcharts-3d.js') }}"></script>
<script src="{{ asset('admin-assets/js/highcharts-more.js') }}"></script> --}}

<!-- Flextree Javascript-->
<script src="{{ asset('admin-assets/js/flex-tree.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/tree.js') }}"></script>

<!-- Table Treeview JavaScript -->
<script src="{{ asset('admin-assets/js/table-treeview.js') }}"></script>

<!-- Masonary Gallery Javascript -->
<script src="{{ asset('admin-assets/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/imagesloaded.pkgd.min.js') }}"></script>

<!-- Mapbox Javascript -->
<script src="{{ asset('admin-assets/js/mapbox-gl.js') }}"></script>
<script src="{{ asset('admin-assets/js/mapbox.js') }}"></script>

<!-- SweetAlert JavaScript -->
<script src="{{ asset('admin-assets/js/sweetalert.min.js') }}"></script>

<!-- Vectoe Map JavaScript -->
{{-- <script src="{{ asset('admin-assets/js/vector-map-custom.js') }}"></script> --}}

<!-- Chart Custom JavaScript -->
<script src="{{ asset('admin-assets/js/customizer.js') }}"></script>

<!-- Chart Custom JavaScript -->
{{-- <script src="{{ asset('admin-assets/js/chart-custom.js') }}"></script> --}}

<!-- slider JavaScript -->
<script src="{{ asset('admin-assets/js/slider.js') }}"></script>

<!-- app JavaScript -->
<script src="{{ asset('admin-assets/js/app.js') }}" defer></script>
<script src="{{ asset('assets/js/app.js') }}" defer></script>

{{-- filer day js --}}
<script>
  $( document ).ready(function() {

    filter30Day()
    filterSales7days()
    filterProfit7days()

    var chart = new Morris.Bar({
      element: 'mychart',
      barColors: ['#32BDEA','#FF7E41', '#819C79', '#A4ADD3'],
      parsetime: false,
      xkey: 'period',
      ykeys: ['order', 'sales', 'profit', 'quantity'],
      labels: ['đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng']
    })

    // Set up token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function filter30Day(){
      var token = $('meta[name="csrf-token"]').attr('content')

      $.ajax({
        url: '/admin/filter-30-day',
        method:"POST",
        dataType:"JSON",
        data:{
          _token:token
        },
        success: function(data){
          chart.setData(data)
        }
      })
    }

    // lọc theo ngày của chart index
    $('#bth-dashboard-filter').click(function(){
      var token = $('input[name="_token"]').val()
      var from_date = $('#datepicker').val()
      var to_date = $('#datepicker2').val()
    
      $.ajax({
        url: '/admin/filter-by-day',
        method:"POST",
        dataType:"JSON",
        data:{
          from_date:from_date,
          to_date:to_date,
          _token:token
        },

        success: function(data){
          chart.setData(data)
        }
      })
    })

    // Lọc doanh số
    $('.filter-sales').change(function(){
      var filter_value = $(this).val()
      var _token = $('input[name="_token"]').val()
      $.ajax({
        url: '/admin/filter-sale',
        method: 'POST',
        dataType: 'JSON',
        data: {
          filter_value:filter_value,
          _token:_token
        },

        success: function(data){
          var format_sales = new Intl.NumberFormat().format(data)
          var show_text = format_sales + ' VNĐ'
          $('#output_sales').empty()
          $('#output_sales').append(document.createTextNode(show_text))
        }
      })
    })

    function filterSales7days(){
      var token = $('meta[name="csrf-token"]').attr('content')
      var filter_value = '7Ngay'
      $.ajax({
        url: '/admin/filter-sale',
        method: 'POST',
        dataType: 'JSON',
        data: {
          filter_value:filter_value,
          _token:token
        },

        success: function(data){
          var format_sales = new Intl.NumberFormat().format(data)
          var show_text = format_sales + ' VNĐ'
          $('#output_sales').empty()
          $('#output_sales').append(document.createTextNode(show_text))
        }
      })
    }

    // Filter profit
    $('.filter-profit').change(function(){
      var filter_value = $(this).val()
      var _token = $('input[name="_token"]').val()
      $.ajax({
        url: '/admin/filter-profit',
        method: 'POST',
        dataType: 'JSON',
        data: {
          filter_value:filter_value,
          _token:_token
        },

        success: function(data){
          var format_profit = new Intl.NumberFormat().format(data)
          var show_text = format_profit + ' VNĐ'
          $('#output_profit').empty()
          $('#output_profit').append(document.createTextNode(show_text))
        }
      })
    })

    function filterProfit7days(){
      var token = $('meta[name="csrf-token"]').attr('content')
      var filter_value = '7Ngay'
      $.ajax({
        url: '/admin/filter-profit',
        method: 'POST',
        dataType: 'JSON',
        data: {
          filter_value:filter_value,
          _token:token
        },

        success: function(data){
          var format_profit = new Intl.NumberFormat().format(data)
          var show_text = format_profit + ' VNĐ'
          $('#output_profit').empty()
          $('#output_profit').append(document.createTextNode(show_text))
        }
      })
    }
});
</script>
</body>

<!-- Mirrored from templates.iqonic.design/posdash/laravel/public/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 May 2022 04:04:12 GMT -->
</html>
