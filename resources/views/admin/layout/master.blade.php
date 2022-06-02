<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="55HP4HzlRrFNDeKUhrLRoYZx3cRhwcA5GttTwKXC">

    <title>Admin</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('css/backend.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/backend-bundle.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/%40fortawesome/fontawesome-free/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/remixicon/fonts/remixicon.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/%40icon/dripicons/dripicons.css') }}"/>

    <link rel='stylesheet' href="{{ asset('vendor/fullcalendar/core/main.css') }}"/>
    <link rel='stylesheet' href="{{ asset('vendor/fullcalendar/daygrid/main.css') }}"/>
    <link rel='stylesheet' href="{{ asset('vendor/fullcalendar/timegrid/main.css') }}" />
    <link rel='stylesheet' href="{{ asset('vendor/fullcalendar/list/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/mapbox/mapbox-gl.css') }}">
</head>
<body class="">
@include('admin.layout.top-navbar')
@include('admin.layout.modal')
@include('admin.layout.sidebar')

@yield('content')

<!-- Backend Bundle JavaScript -->
<script src="{{ asset('js/backend-bundle.min.js') }}"></script>


<script src="{{ asset('vendor/fullcalendar/core/main.js') }}"></script>
<script src="{{ asset('vendor/fullcalendar/daygrid/main.js') }}"></script>
<script src="{{ asset('vendor/fullcalendar/timegrid/main.js') }}"></script>
<script src="{{ asset('vendor/fullcalendar/list/main.js') }}"></script>

<!--   -->
<script src="{{ asset('js/apexcharts.js') }}"></script>
<script src="{{ asset('js/core.js') }}"></script>
<script src="{{ asset('js/charts.js') }}"></script>
<script src="{{ asset('js/animated.js') }}"></script>
<script src="{{ asset('js/kelly.js') }}"></script>
<script src="{{ asset('js/maps.js') }}"></script>
<script src="{{ asset('js/worldLow.js') }}"></script>
<script src="{{ asset('js/country2.js') }}"></script>
<script src="{{ asset('js/material.js') }}"></script>
<script src="{{ asset('js/morris.min.js') }}"></script>
<script src="{{ asset('js/raphael-min.js') }}"></script>
<script src="{{ asset('js/highcharts.js') }}"></script>
<script src="{{ asset('js/highcharts-3d.js') }}"></script>
<script src="{{ asset('js/highcharts-more.js') }}"></script>

<!-- Flextree Javascript-->
<script src="{{ asset('js/flex-tree.min.js') }}"></script>
<script src="{{ asset('js/tree.js') }}"></script>

<!-- Table Treeview JavaScript -->
<script src="{{ asset('js/table-treeview.js') }}"></script>

<!-- Masonary Gallery Javascript -->
<script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>

<!-- Mapbox Javascript -->
<script src="{{ asset('js/mapbox-gl.js') }}"></script>
<script src="{{ asset('js/mapbox.js') }}"></script>

<!-- SweetAlert JavaScript -->
<script src="{{ asset('js/sweetalert.js') }}"></script>

<!-- Vectoe Map JavaScript -->
<script src="{{ asset('js/vector-map-custom.js') }}"></script>

<!-- Chart Custom JavaScript -->
<script src="{{ asset('js/customizer.js') }}"></script>

<!-- Chart Custom JavaScript -->
<script src="{{ asset('js/chart-custom.js') }}"></script>

<!-- slider JavaScript -->
<script src="{{ asset('js/slider.js') }}"></script>

<!-- app JavaScript -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>

<!-- Mirrored from templates.iqonic.design/posdash/laravel/public/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 May 2022 04:04:12 GMT -->
</html>
