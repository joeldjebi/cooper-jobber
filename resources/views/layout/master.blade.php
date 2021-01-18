<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobber  {{ $title??"" }}</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/index_files/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{ asset('/index_files/icons.css')}}">
    <link rel="stylesheet" href="{{ asset('/index_files/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    @stack('css')
</head>
<body cz-shortcut-listen="true">
<!-- Wrapper -->
<div id="wrapper" style="padding-top: 82px;">
    @include('layout._partials.header')
    <!-- Dashboard Container -->
        <div class="utf-dashboard-container-aera" style="height: 526px;">
        @include('layout._partials.side')
        <!-- Dashboard Content -->
            <div class="utf-dashboard-content-container-aera" data-simplebar="init" style="height: 526px;">
                <div class="simplebar-track vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 120px;"></div>
                </div>
                <div class="simplebar-track horizontal" style="visibility: visible;">
                    <div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div>
                </div>
                <div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
                    <div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
                        @include('layout._partials.title')
                        @if(empty(Auth::user()->photo_piece_recto) || empty(Auth::user()->photo_piece_verso))
                            <div class="notification warning closeable">
                                <p>Merci d'ajouter votre pieces d'identité afin de permettre la validation et l'activation  de votre compte</p>
                                <a class="close"></a>
                            </div>
                        @endif
                        @if(!Auth::user()->experiences()->exists())
                            <div class="notification warning closeable">
                                <p>Merci de renseigner votre expreinces professionnelles afin de permettre la validation et l'activation  de votre compte</p>
                                <a class="close"></a>
                            </div>
                        @endif
                            @yield('container')
                    </div>
                </div>
            </div>
            <!-- Dashboard Content End -->
        </div>
</div>
<!-- Wrapper / End -->

@include('layout._partials.sigin')

<!-- Scripts -->
<script src="{{ asset('/index_files/jquery-3.3.1.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="{{ asset('/index_files/jquery-migrate-3.0.0.min.js')}}"></script>
<script src="{{ asset('/index_files/mmenu.min.js')}}"></script>
<script src="{{ asset('/index_files/bootstrap-slider.min.js')}}"></script>
<script src="{{ asset('/index_files/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('/index_files/counterup.min.js')}}"></script>
<script src="{{ asset("/index_files/custom_jquery.js")}}"></script>
@stack('scripts')
<!-- <div id="backtotop">
    <a href="#"></a>
</div> -->
</body>
</html>
  