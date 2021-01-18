@extends('admin.layout.app')
@section('content')
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
                
                <div class="utf-dashboard-content-inner-aera" style="min-height: 526px;">
                    @include('admin.layout._partial.notification')
                    <div class="utf-funfacts-container-aera">
                        <div class="fun-fact" data-fun-fact-color="#2a41e8">
                            <div class="fun-fact-icon" style="background-color: rgba(42, 65, 232, 0.07);"><i class="fa fa-users" style="color: rgb(42, 65, 232);"></i></div>
                            <div class="fun-fact-text">   
                                <h4>{{ $users->count() }}</h4>
                                <span>Jobber</span>
                            </div>
                        </div>
                        <div class="fun-fact" data-fun-fact-color="#36bd78">
                            <div class="fun-fact-icon" style="background-color: rgba(54, 189, 120, 0.07);"><i class="fa fa-briefcase" style="color: rgb(54, 189, 120);"></i></div>
                            <div class="fun-fact-text">
                                <h4>{{ $vip }}</h4>
                                <span>VIP</span>
                            </div>
                        </div>
                        <div class="fun-fact" data-fun-fact-color="#efa80f">
                            <div class="fun-fact-icon" style="background-color: rgba(239, 168, 15, 0.07);"><i class="fa fa-cubes" style="color: rgb(239, 168, 15);"></i></div>
                            <div class="fun-fact-text">
                                <h4>{{ $secteurs->count() }}</h4>
                                <span>Secteurs d'activite</span>
                            </div>
                        </div>
                        <div class="fun-fact" data-fun-fact-color="#0fc5bf">
                            <div class="fun-fact-icon" style="background-color: rgba(15, 197, 191, 0.07);"><i class="fa fa-location-arrow" style="color: rgb(15, 197, 191);"></i></div>
                            <div class="fun-fact-text">
                                <h4>{{ $villes->count() }}</h4>
                                <span>Villes</span>
                            </div>
                        </div>
                        <div class="fun-fact" data-fun-fact-color="#f02727">
                            <div class="fun-fact-icon" style="background-color: rgba(240, 39, 39, 0.07);"><i class="fa fa-map-marker" style="color: rgb(240, 39, 39);"></i></div>
                            <div class="fun-fact-text">
                                <h4>{{ $communes->count() }}</h4>
                                <span>Communes</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="dashboardbox-">
                            <div class="headline">
                                <h3>Liste des utilisateurs</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="content">
                            <ul class="utf-dashboard-box-list">
                                @foreach($users as $user)
                                <li>
                                    <div class="utf-invoice-list-item content-user-name-status">
                                        
                                        <div class="user-name-status">
                                            <div class="user-avatar status-online "><img class="flag" src="{{ asset('/images/avatars/'.$user->photo)}}" alt=""></div>
                                            <div>
                                                <strong>{{ $user->nom.' '.$user->prenom }}  @if($user->active_profile == 1) <span class="paid">Active</span> @else <span class="unpaid">Desactive</span> @endif</strong>
                                            </div>
                                        </div>
                                        <ul>
                                            <li><span>ID:</span> {{ $user->id }}</li>
                                            <li><span>Nom et Prenoms:</span> {{ $user->nom.' '.$user->nom }}</li>
                                            <li><span>Ville:</span> {{ $user->villle->libelle?? "" }}</li>
                                            @if($user->commune_id!= 0)
                                            <li><span>Commune:</span> {{ $user->commune->libelle?? "" }}</li>
                                            @endif
                                            <li><span>Numero:</span> {{ $user->contact }}</li>
                                            <li><span>E-mail:</span> {{ $user->email }}</li>
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
                        {{ $users->links() }}
                    </div>
                </div>

                <div class="utf-dashboard-footer-spacer-aera" style="padding-top: 123px;"></div>
                <div class="utf-small-footer margin-top-15">
                    <div class="utf-small-footer-copyrights">Copyright &copy; 2020 All Rights Reserved.</div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Dashboard Content End -->
@endsection
