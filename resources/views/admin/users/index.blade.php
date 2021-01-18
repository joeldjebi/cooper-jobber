@extends("admin.layout.app")
@section("content")
    <div class="utf-dashboard-content-container-aera" data-simplebar="init" style="height: 301px;">
        <div class="simplebar-track vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 120px;"></div>
        </div>
        <div class="simplebar-track horizontal" style="visibility: visible;">
            <div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div>
        </div>
        <div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
            <div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
                <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
                    <div class="row">
                        <div class="col-xl-12">
                            <h3>Dashboard</h3>
                            <nav id="breadcrumbs">
                                <ul>
                                    <li><a href="http://jobword.utouchdesign.com/jobword_ltr/index-1.html">Home</a></li>
                                    <li>Dashboard</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="utf-dashboard-content-inner-aera all-search-bar" style="min-height: 301px;">
                    @include('admin.layout._partial.notification')
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="dashboard-box content-search-all">
                                <form method="GET" action="{{ route('user.search') }}">
                                    <div class="content with-padding padding-bottom-10">
                                        <div class="row">
                                            <div class="title-search col-xl-12 col-md-12 col-sm-12">
                                                <h4>Recherche avancee</h4>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-sm-6">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                                        <div class="utf-submit-field">
                                                            <h5>Nom</h5>
                                                            <input name="nom" type="text" class="utf-with-border" placeholder="Nom">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                                        <div class="utf-submit-field">
                                                            <h5>Prénoms</h5>
                                                            <input type="text" class="utf-with-border" name="prenom" placeholder="Prénoms">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-sm-6">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                                        <div class="utf-submit-field">
                                                            <h5>Numero de téléphone</h5>
                                                            <input type="text" class="utf-with-border" name="telephone" placeholder="Numero de téléphone">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                                        <div class="utf-submit-field">
                                                            <h5>Villes</h5>
                                                            <select class="selectpicker utf-with-border" name="" id="">
                                                                <option value="">Abidjan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-6 col-md-6 col-sm-6">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                                        <div class="utf-submit-field datepicker">
                                                            <h5>Du</h5>
                                                            <input class="utf-with-border" name="datedebut" type="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                                        <div class="utf-submit-field datepicker">
                                                            <h5>Au</h5>
                                                            <input class="utf-with-border" name="datefin" type="date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-sm-6">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12">
                                                        <div class="utf-submit-field">
                                                            <h5>Secteurs D'activite</h5>
                                                                <select name="secteur" class="selectpicker utf-with-border" title="Secteurs D'activite">
                                                                    <option value="0">Secteurs D'activite</option>
                                                                    @foreach($secteurs as $secteur)
                                                                    <option value="{{$secteur->id}}">{{$secteur->libelle}}</option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-sm-12">
                                                <div class="utf-centered-button">
                                                    <button type="submit" class="popup-with-zoom-anim utf-header-notifications-button ripple-effect utf-button-sliding-icon">RECHERCHER <i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="content">
                        <ul class="utf-dashboard-box-list">
                            @foreach($users as $user)
                            <li>
                                <div class="utf-invoice-list-item content-user-name-status">
                                    <div class="user-avatar status-online "><img class="flag" src="{{ asset('/images/avatars/'.$user->photo) }}" alt=""></div>
                                    <div class="user-name-status">
                                        <strong>{{ $user->nom.' '.$user->prenom }} @if($user->validate_profile == 0) <span class="unpaid">Désactive</span> @else <span class="paid">Active</span> @endif
                                        </strong>
                                    </div>
                                    <ul>
                                        <li><span>ID:</span> {{ $user->id }}</li>
                                        <li><span>Nom et Prenoms:</span> {{ $user->nom.' '.$user->prenom }}</li>
                                        <li><span>Ville:</span>{{ $user->ville->libelle??"" }}</li>
                                        @if($user->commune_id != 0)
                                        <li><span>Commune:</span> {{ $user->commune->libelle??"" }}</li>
                                        @endif
                                        <li><span>Numero:</span> {{ $user->contact }}</li>
                                        <li><span>E-mail:</span> {{ $user->email }}</li>
                                        <li><span>visible :</span> {{ $user->active_profile == 0 ?  "Désactivé":"Activé" }}</li>
                                        <li>
                                            <a href="{{ route('show', ['id' => $user->id, 'slug' => str_slug($user->prenom)]) }}" target="_blank"><span class=" _paid"> <i class="fa fa-eye"></i></span></a>
                                            <a href="{{ route('user.updatestate',['id' => $user->id]) }}">@if($user->validate_profile == 0) <span class="paid"><i class="fa fa-check"></i></span> @else <span class="unpaid"><i class="fa fa-times"></i></span> @endif</a>
                                            <a onclick="confirm('Voulez vous supprimer cet utilisateur ainsi que toutes ses données ?')" href="{{ route('user.delete',['id' => $user->id]) }}"><span class="unpaid"> <i class="fa fa-trash"></i></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="utf-pagination-container-aera margin-top-10 margin-bottom-50">
                    <nav class="pagination">
                        {{ $users->links() }}
                    </nav>
                </div>
            </div>
        </div>
        <!--Modal Edit utilisateur (Active user)-->
        <div class="container">
            <!-- <h2>Modal Example</h2> -->
            <!-- Button to Open the Modal -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditUsermyModal">
             Open modal
             </button> -->
            <!-- The Modal -->
            <div class="modal fade " id="EditUsermyModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            Modal body..
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end Modal Edit utilisateur (Active user)-->
        <div class="utf-dashboard-footer-spacer-aera" style="padding-top: 331px;"></div>
        <div class="utf-small-footer margin-top-15">
            <div class="utf-small-footer-copyrights">Copyright 2020 All Rights Reserved.</div>
        </div>
    </div>
@endsection
