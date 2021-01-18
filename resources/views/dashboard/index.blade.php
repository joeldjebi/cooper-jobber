@extends('layout.master')
@section('container')
    <div class="utf-dashboard-content-inner-aera" style="min-height: 526px;">
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="content-info-profil">
                    <div class="fun-facticon"><i class="fa fa-eye"></i></div>
                    <div class="fun-fact-text">
                        <h4>{{ $user->nbvue }}</h4>
                        <span>Nombre de visites</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="content-info-profil">
                    <div class="fun-facticon"><i class="fa fa-eye"></i></div>
                    <div class="fun-fact-text">
                        <h4>{{ $user->nbvue }}</h4>
                        <span>Nombre de visites</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="dashboard-box main-box-in-row">
                    <div class="headline">
                        <h3>INFORMATIONS PERSONNELLES
                        </h3>
                    </div>
                    <div class="content qwertyy">
                        <div class="nameemail-content">
                            <span>Nom & Prénoms : {{ $user->nom.' '.$user->prenom }}</span><br>
                            <font>Contact : {{ $user->contact }}</font>
                            <p>E-mail : {{ $user->email }}</p>
                        </div>
                        <a href="{{ route('profil.password') }}" class="popup-with-zoom-anim utf-header-notifications-button ripple-effect utf-button-sliding-icon">MODIFIER VOTRE MOT DE PASSE <i class="fa fa-pencil color-orange" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="dashboard-box main-box-in-row dashboardbox">
                    <div class="headline">
                        <h3>ADRESSES </h3>
                    </div>
                    <div class="content qwertyy">
                        <div class="nameemail-content">
                            <span>Ville : </span> {{ $user->ville->libelle ?? ""}} <br>
                            @if($user->ville_id == 1)
                                <span>Commune : </span> {{$user->commune->libelle?? ""}}<br>
                            @endif
                        </div>
                        <a href="{{ route('profil') }}" class="popup-with-zoom-anim utf-header-notifications-button ripple-effect utf-button-sliding-icon">MODIFIER VOTRE ADRESSES <i class="fa fa-pencil color-orange" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="utf-dashboard-footer-spacer-aera" style="padding-top: 123px;"></div>
        <div class="utf-small-footer margin-top-15">
            <div class="utf-small-footer-copyrights">Copyright &copy; 2020 All Rights Reserved.</div>
        </div>
    </div>
@endsection
