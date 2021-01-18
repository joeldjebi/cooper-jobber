<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin  {{ $title ?? " " }}</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/icons.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body cz-shortcut-listen="true">
<!-- Wrapper -->
<div id="wrapper" style="padding-top: 82px;">
@include('admin.layout._partial.header')
<!-- Dashboard Container -->
    <div class="utf-dashboard-container-aera" style="height: 526px;">
    @include('admin.layout._partial.sidebard')
    @yield('content')
    </div>
<!-- Dashboard Content End -->
</div>
<!-- Scripts -->
<script src="{{asset('/admin/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('admin/jquery-migrate-3.0.0.min.js')}}"></script>
<script src="{{ asset('admin/mmenu.min.js')}}"></script>
<script src="{{ asset('/admin/bootstrap-slider.min.js')}}"></script>
<script src="{{ asset('/admin/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('/admin/counterup.min.js')}}"></script>
<script src="{{ asset('/admin/custom_jquery.js')}}"></script>
<div id="backtotop">
    <a href="#"></a>
</div>
</body>
</html>
