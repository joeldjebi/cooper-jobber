<!-- Header Container -->
<header id="utf-header-container-block" class="fullwidth dashboard-header not-sticky" style="position: fixed;">
    <div id="header">
        <div class="container">
            <div class="utf-left-side">
                <div id="logo">
                    <a href="/"><img src="/images/logo/logo.png" alt="logo"></a>
                </div>
                <nav id="navigation">
                    <ul id="responsive">
                        <li><a href="{{ route('accueil') }}" class="@if(isset($title) && $title == "Accueil") current @endif">Accueil</a></li>
                        <li><a href="{{ route('about') }}" class="@if(isset($title) && $title == "Apropos") current @endif">A propos de nous</a></li>
                        <li><a href="{{ route('contact') }}" class="@if(isset($title) && $title == "Contact") current @endif">Contact</a></li>
                    </ul>
                </nav> 
                <div class="clearfix"></div>
            </div>
            <div class="utf-right-side">

                <div class="utf-header-widget-item hide-on-mobile">
                    @if(!auth()->check())
                        <div class="utf-header-widget-item"> <a href="{{ route('user.register') }}" class="popup-with-zoom-anim log-in-button"><i class="fa fa-sign-in" aria-hidden="true"></i> <span>S'inscrire</span></a> </div>
                        <div class="utf-header-widget-item logingreen"> <a href="{{ route('user.login') }}" class="popup-with-zoom-anim log-in-button"><i class="fa fa-user" aria-hidden="true"></i> <span>Se connecter</span></a> </div>
                    @else
                        <div class="utf-header-notifications">
                        <div class="utf-header-notifications-trigger notifications-trigger-icon"> <a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i><span>5</span></a> </div>
                        <div class="utf-header-notifications-dropdown-block">
                            <div class="utf-header-notifications-headline">
                                <h4>Notifications</h4>
                            </div>
                            <div class="utf-header-notifications-content">
                                <div class="utf-header-notifications-scroll" data-simplebar="init" style="height: 228px;">
                                    <div class="simplebar-track vertical" style="visibility: visible;">
                                        <div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 128px;"></div>
                                    </div>
                                    <div class="simplebar-track horizontal" style="visibility: visible;">
                                        <div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div>
                                    </div>
                                    <div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
                                        <div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
                                            <ul>
                                                <li class="notifications-not-read">
                                                    <a href="dashboard-manage-resume.html"> <span class="notification-icon"><i class="icon-material-outline-group"></i></span> <span class="notification-text"> <strong>John Williams</strong> Applied for Jobs <span class="color_blue">Full Time</span>                                                                <strong>Web Designer</strong></span>
                                                    </a>
                                                </li>
                                                <li><a href="dashboard-manage-resume.html"><span class="notification-icon"><i class="icon-feather-briefcase"></i></span> <span class="notification-text"> <strong>John Williams</strong> Applied for Jobs <span class="color_green">Internship</span> <strong>Web Designer</strong></span></a></li>
                                                <li><a href="dashboard-manage-resume.html"><span class="notification-icon"><i class="icon-feather-briefcase"></i></span> <span class="notification-text"> <strong>John Williams</strong> Applied for Jobs <span class="color_yellow">Part Time</span> <strong>Web Designer</strong></span></a></li>
                                                <li><a href="dashboard-manage-resume.html"><span class="notification-icon"><i class="icon-material-outline-group"></i></span> <span class="notification-text"> <strong>John Williams</strong> Applied for Jobs <span class="color_blue">Full Time</span> <strong>Web Designer</strong></span></a></li>
                                                <li><a href="dashboard-manage-resume.html"><span class="notification-icon"><i class="icon-material-outline-group"></i></span> <span class="notification-text"> <strong>John Williams</strong> Applied for Jobs <span class="color_yellow">Part Time</span> <strong>Web Designer</strong></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="utf-header-notifications-button ripple-effect utf-button-sliding-icon">See All Notifications<i class="icon-feather-chevrons-right"></i></a>
                        </div>
                    </div>
                    @endif
                </div>
                @if(auth()->check())
                <div class="utf-header-widget-item">
                    <div class="utf-header-notifications user-menu">
                        <div class="utf-header-notifications-trigger user-profile-title">
                            <a href="#">
                                <div class="user-avatar status-online"><img src="{{ empty(auth()->user()->photo) ? "/index_files/company_logo_1.png" : asset('/images/avatars/'.auth()->user()->photo)}}" alt=" Photo de profil de {{ auth()->user()->nom }}"> </div>
                                <div class="user-name">{{ auth()->user()->nom }}</div>
                            </a>
                        </div>
                        <div class="utf-header-notifications-dropdown-block">
                            @if(auth()->user()->typeuser_id == 1)
                            <ul class="utf-user-menu-dropdown-nav">
                                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Tableau de bord</a></li>
                                <li><a href="{{ route('admin.profil') }}"><i class="fa fa-user" aria-hidden="true"></i> Mon profil</a></li>
                                <li><a href="{{ route('admin.password') }}"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Mot de passe</a></li>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</a></li>
                            </ul>
                            @else
                                <ul class="utf-user-menu-dropdown-nav">
                                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Tableau de bord</a></li>
                                    <li><a href="{{ route('profil.experiences') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> Experiences</a></li>
                                    <li><a href="{{ route('profil') }}"><i class="fa fa-user" aria-hidden="true"></i> Profil</a></li>
                                    <li><a href="{{ route('profil.password') }}"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Mot de passe</a></li>
                                    <li><a href="{{route('logout')}}"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</a></li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <span class="mmenu-trigger">
                      <button class="hamburger utf-hamburger-collapse-item" type="button"> <span class="utf-hamburger-box-item"> <span class="utf-hamburger-inner-item"></span> </span>
                    </button>
                </span>
                @endif

            </div>
        </div>
    </div>
</header>
<div class="clearfix"></div>
<!-- Header Container / End -->
