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
                    <a href="http://jobword.utouchdesign.com/jobword_ltr/dashboard.html#" class="utf-dashboard-responsive-trigger-item"> <span class="hamburger utf-hamburger-collapse-item"> <span class="utf-hamburger-box-item"> <span class="utf-hamburger-inner-item"></span> </span>
                                    </span> <span class="trigger-title">Dashboard Navigation Menu</span> </a>
                    <!-- Navigation -->
                    <div class="utf-dashboard-nav">
                        <div class="utf-dashboard-nav-inner">
                            <div class="dashboard-profile-box">
                                            <span class="avatar-img">
                                    <img alt="" src="{{ asset('/images/avatars/'.auth()->user()->photo)}}" class="photo de {{ auth()->user()->nom.' '.auth()->user()->prenom }} ">
                                    </span>
                                <div class="user-profile-text">
                                    <span class="fullname">{{ auth()->user()->nom.' '.auth()->user()->prenom }}</span>
                                    <span class="user-role">Administrateur</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <ul>
                                <li @if($title == "Accueil") class="active" @endif><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
                                <li @if($title == "communes") class="active" @endif><a href="{{ route('communes') }}"><i class="fa fa-map-marker"></i> Communes</a></li>
                                <li @if($title == "villes") class="active" @endif><a href="{{ route('villes') }}"><i class="fa fa-location-arrow"></i> Villes</a></li>
                                <li @if($title == "forfaits") class="active" @endif><a href="{{ route('forfaits') }}"><i class="fa fa-tasks"></i> Forfaits</a></li>
                                <li @if($title == "methodes") class="active" @endif><a href="#"><i class="fa fa-clone"></i> Methodes </a></li>
                                <li  @if($title == "secteurs") class="active" @endif><a href="{{ route('secteurs') }}"><i class="fa fa-cubes"></i> Secteurs d'activites</a></li>
                                <li @if($title == "utilisateurs") class="active" @endif><a href="{{ route('users') }}"><i class="fa fa-users"></i> Utilisateurs </a></li>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
<!-- Dashboard Sidebar / End -->
