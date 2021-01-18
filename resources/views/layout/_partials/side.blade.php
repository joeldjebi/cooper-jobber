<!-- Dashboard Sidebar -->
<div class="utf-dashboard-sidebar-item">
    <div class="utf-dashboard-sidebar-item-inner" data-simplebar="init" style="height: 526px;">
        <div class="simplebar-track vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 450px;"></div>
        </div>
        <div class="simplebar-track horizontal" style="visibility: visible;">
            <div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div>
        </div>
        <div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
            <div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
                <div class="utf-dashboard-nav-container">
                    <!-- Responsive Navigation Trigger -->
                    <a href="#" class="utf-dashboard-responsive-trigger-item"> <span class="hamburger utf-hamburger-collapse-item"> <span class="utf-hamburger-box-item"> <span class="utf-hamburger-inner-item"></span> </span>
                                    </span> <span class="trigger-title">Dashboard Navigation Menu</span> </a>
                    <!-- Navigation -->
                    <div class="utf-dashboard-nav">
                        <div class="utf-dashboard-nav-inner">
                            <div class="dashboard-profile-box">
                                            <span class="avatar-img">
                                                <img alt="" src="{{ empty(auth()->user()->photo) ? "/index_files/company_logo_1.png" : asset('/images/avatars/'.auth()->user()->photo)}}" class="photo de {{ auth()->user()->nom}} ">
                                            </span>
                                <div class="user-profile-text">
                                    <span class="fullname">{{ auth()->user()->nom.' '.auth()->user()->prenom }}</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            @if(auth()->check() && auth()->user()->typeuser_id == 1)
                                <ul>
                                    <li @if($title == "Dashboard") class="active" @endif><a href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i></i> Tableau de bord</a></li>
                                    <li @if($title == "Profil") class="active" @endif><a href="{{ route('profil') }}"><i class="fa fa-user" aria-hidden="true"></i> Profil</a></li>
                                    <li @if($title == "Mot de passe") class="active" @endif><a href="{{ route('profil.password') }}"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Mot de passe</a></li>
                                    <li><a href="{{ route('logout') }}"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</a></li>
                                </ul>
                            @else
                            <ul>
                                <li @if($title == "Dashboard") class="active" @endif><a href="{{ route('dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i></i> Tableau de bord</a></li>
                                <li @if($title == "Experience") class="active" @endif><a href="{{ route('profil.experiences')}}"><i class="fa fa-briefcase" aria-hidden="true"></i> Experiences</a></li>
                                <li @if($title == "Profil") class="active" @endif><a href="{{ route('profil') }}"><i class="fa fa-user" aria-hidden="true"></i> Profil</a></li>
                                <li @if($title == "Galerie") class="active" @endif><a href="{{ route('galerie') }}"><i class="fa fa-picture-o" aria-hidden="true"></i> Galerie</a></li>
                                <li @if($title == "Mot de passe") class="active" @endif><a href="{{ route('profil.password') }}"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Mot de passe</a></li>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</a></li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard Sidebar / End -->
