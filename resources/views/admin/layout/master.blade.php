<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="55HP4HzlRrFNDeKUhrLRoYZx3cRhwcA5GttTwKXC">

    <title>Admin</title>

    <link rel="shortcut icon" href="{{ asset('admin-assets/images/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/backend.css') }}"/>
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
<script src="{{ asset('admin-assets/js/charts.js') }}"></script>
<script src="{{ asset('admin-assets/js/animated.js') }}"></script>
<script src="{{ asset('admin-assets/js/kelly.js') }}"></script>
<script src="{{ asset('admin-assets/js/maps.js') }}"></script>
<script src="{{ asset('admin-assets/js/worldLow.js') }}"></script>
<script src="{{ asset('admin-assets/js/country2.js') }}"></script>
<script src="{{ asset('admin-assets/js/material.js') }}"></script>
<script src="{{ asset('admin-assets/js/morris.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/raphael-min.js') }}"></script>
<script src="{{ asset('admin-assets/js/highcharts.js') }}"></script>
<script src="{{ asset('admin-assets/js/highcharts-3d.js') }}"></script>
<script src="{{ asset('admin-assets/js/highcharts-more.js') }}"></script>

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
<script src="{{ asset('admin-assets/js/sweetalert.js') }}"></script>

<!-- Vectoe Map JavaScript -->
<script src="{{ asset('admin-assets/js/vector-map-custom.js') }}"></script>

<!-- Chart Custom JavaScript -->
<script src="{{ asset('admin-assets/js/customizer.js') }}"></script>

<!-- Chart Custom JavaScript -->
<script src="{{ asset('admin-assets/js/chart-custom.js') }}"></script>

<!-- slider JavaScript -->
<script src="{{ asset('admin-assets/js/slider.js') }}"></script>

<!-- app JavaScript -->
<script src="{{ asset('admin-assets/js/app.js') }}" defer></script>
<script src="{{ asset('assets/js/app.js') }}" defer></script>
</body>

<!-- Mirrored from templates.iqonic.design/posdash/laravel/public/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 May 2022 04:04:12 GMT -->
</html>
