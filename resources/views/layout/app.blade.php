<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta name="author" content="">
    <meta name="description" content="Le site de mon jobber. Côte d'Ivoire abidjan Trouvez un jobber afin de réaliser vos jobs du quotidien : bricolage, déménagement,babysitting, aide à la personne... Arrondissez vos fins de mois en réalisant des jobs ou des petits services rémunérés entre particuliers." />
	<meta name="keywords" content="mon jobber, jobber, site de jobber, plateforme de job, site job, plateforme jobber, site de jobber, annonce jobs, annonce jobbers, site job, site de jobs, job étudiant, Plomberie, Artisan, Artisans, Côte d'Ivoire, climatisation, maintenance, Bricolage, service à domicile,
        plumbing, Plumbing Service, reparation, service de reparation, Electricité, Electroménager, Meubles, Serrurerie, Sol">
    <meta property="og:title" content="Monjobber Côte d'Ivoire abidjan: la plateforme de job et des petits travail entre particuliers"/>
    <meta property="og:description" content="Le site de jobber. Trouvez un jobber afin de réaliser vos jobs du quotidien : vendeur, gérant, mecanicien, plomblier, menuisier... Arrondissez vos fins de mois en réalisant des jobs ou des petits boulots rémunérés entre particuliers."/>
    <meta name="twitter:title" content="Monjobber : la plateforme de travail et des petits boulots entre particuliers" />
    <meta name="twitter:description" content="Le site de job. Trouvez un jobber afin de réaliser vos jobs du quotidien : coiffure, ,Serrurerie, froid, électricité, installation robinet, débouchage, installation slit, installation prise, ... Arrondissez vos fins de mois en réalisant des jobs ou des petits boulots rémunérés entre particuliers." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MonJobber | {{ $title??"" }}</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('/index_files/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{ asset('/index_files/icons.css')}}">
    <link rel="stylesheet" href="{{ asset('/index_files/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css')}}" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    @stack('css')
</head>

<body cz-shortcut-listen="true">
<div id="fb-root"></div>

<!-- Wrapper -->
<div id="wrapper" style="padding-top: 82px;">
    @include('layout._partials.header')
        @yield('container')
    @include('layout._partials.footer')
</div>
<!-- Wrapper / End -->

@include('layout._partials.sigin')
<!-- Scripts -->
<script src="{{ asset('/index_files/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('/index_files/jquery-migrate-3.0.0.min.js')}}"></script>
<script src="{{ asset('/index_files/mmenu.min.js')}}"></script>
<!-- <script src="./index_files/tippy.all.min.js"></script>
<script src="./index_files/simplebar.min.js"></script> -->

<script src="{{ asset('/index_files/bootstrap-slider.min.js')}}"></script>
<script src="{{ asset('/index_files/bootstrap-select.min.js')}}"></script>
<!-- <script src="./index_files/snackbar.js"></script> -->
<!-- <script src="./index_files/clipboard.min.js"></script> -->
<script src="{{ asset('/index_files/counterup.min.js')}}"></script>
<!-- <script src="./index_files/magnific-popup.min.js"></script>  -->
<!-- <script src="./index_files/slick.min.js"></script> -->
<!-- <script src="./index_files/typed.js"></script> -->
<script src="{{ asset("/index_files/custom_jquery.js")}}"></script>
@stack('scripts')

</body>
</html>
