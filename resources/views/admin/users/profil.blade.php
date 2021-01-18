@extends('admin.layout.app')
@section('content')
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
                <div class="utf-dashboard-content-inner-aera" style="min-height: 526px;">
                    @include('admin.layout._partial.notification')
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="dashboard-box margin-top-0 margin-bottom-30">
                                <div class="headline">
                                    <h3>Mon Profil</h3>
                                </div>
                                <form method="post"  enctype="multipart/form-data" action="{{ route('admin.profil.update') }}">
                                    @csrf
                                    <div class="content with-padding padding-bottom-0">
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="row">
                                                            <div class="col-xl-3 col-md-3 col-sm-4">
                                                                @if($errors->has('avatar'))
                                                                    <p class="alert alert-danger">
                                                                        <span class="fa fa-exclamation-triangle"></span>
                                                                        {{ $errors->first('avatar') }}
                                                                    </p>
                                                                @endif
                                                                <div class="utf-avatar-wrapper" data-tippy-placement="top" data-tippy="" data-original-title="Change Profile Picture">
                                                                    <img class="profile-pic" src="{{ asset('/images/avatars/'.$user->photo)}}" alt="Profil de {{ $user->nom.' '.$user->prenom }}">
                                                                    <div class="upload-button"></div>
                                                                    <input class="file-upload" name="avatar" type="file" accept="image/*">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                                        <div class="utf-submit-field">
                                                            <h5>Nom </h5>
                                                            @if($errors->has('nom'))
                                                                <p class="alert alert-danger">
                                                                    <span class="fa fa-exclamation-triangle"></span>
                                                                    {{ $errors->first('nom') }}
                                                                </p>
                                                            @endif
                                                            <input type="text" name="nom" class="utf-with-border" value="{{ old("nom")?? $user->nom }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                                        <div class="utf-submit-field">
                                                            <h5>Prénoms</h5>
                                                            @if($errors->has('prenom'))
                                                                <p class="alert alert-danger">
                                                                    <span class="fa fa-exclamation-triangle"></span>
                                                                    {{ $errors->first('prenom') }}
                                                                </p>
                                                            @endif
                                                            <input type="text" name="prenom" class="utf-with-border" value="{{ old("prenom")?? $user->prenom }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                                        <div class="utf-submit-field">
                                                            <h5>Numéro de téléphone</h5>
                                                            @if($errors->has('contact'))
                                                                <p class="alert alert-danger">
                                                                    <span class="fa fa-exclamation-triangle"></span>
                                                                    {{ $errors->first('contact') }}
                                                                </p>
                                                            @endif
                                                            <input type="text" name="contact" class="utf-with-border" value="{{ old("contact")?? $user->contact }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                                        <div class="utf-submit-field">
                                                            <h5>Adresse Email</h5>
                                                            @if($errors->has('email'))
                                                                <p class="alert alert-danger">
                                                                    <span class="fa fa-exclamation-triangle"></span>
                                                                    {{ $errors->first('email') }}
                                                                </p>
                                                            @endif
                                                            <input type="text" name="email" class="utf-with-border" value="{{ old("email")?? $user->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                                        <div class="utf-submit-field">
                                                            <h5>Villes </h5>
                                                            @if($errors->has('ville'))
                                                                <p class="alert alert-danger">
                                                                    <span class="fa fa-exclamation-triangle"></span>
                                                                    {{ $errors->first('ville') }}
                                                                </p>
                                                            @endif
                                                            <select class="selectpicker utf-with-border" id="ville" name="ville" data-size="7" title="Sélectionner votre Ville" tabindex="-98">
                                                                @foreach($villes as $ville)
                                                                    <option value="{{ $ville->id }}" {{ $ville->id == $user->ville_id ? "selected":"" }}>{{ $ville->libelle }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-6" id="communes">
                                                        <div class="utf-submit-field">
                                                            <h5>Communes</h5>
                                                            @if($errors->has('commune'))
                                                                <p class="alert alert-danger">
                                                                    <span class="fa fa-exclamation-triangle"></span>
                                                                    {{ $errors->first('commune') }}
                                                                </p>
                                                            @endif
                                                            <select class="selectpicker utf-with-border" name="commune" data-size="7" title="Sélectionner votre commune" tabindex="-98">
                                                                @foreach($communes as $commune)
                                                                    <option  value="{{ $commune->id }}" {{ $commune->id == $user->commune_id ? "selected":"" }} >{{ $commune->libelle }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-6">
                                                        <div class="utf-submit-field">
                                                            <h5><i class="fa fa-map"></i> Adresse</h5>
                                                            @if($errors->has('email'))
                                                                <p class="alert alert-danger">
                                                                    <span class="fa fa-exclamation-triangle"></span>
                                                                    {{ $errors->first('email') }}
                                                                </p>
                                                            @endif
                                                            <input type="text" name="adresse" class="utf-with-border" value="{{ old("adresse")?? $user->adresse }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="button ripple-effect big margin-top-10 margin-bottom-20">Enregister</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                    <div class="utf-dashboard-footer-spacer-aera" style="padding-top: 123px;"></div>
                    <div class="utf-small-footer margin-top-15">
                        <div class="utf-small-footer-copyrights">Copyright &copy; 2020 All Rights Reserved.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard Content End -->
@endsection
@push('scripts')
    <script>
        $('#ville').change(function (e) {
            //console.log($(this));
            //console.log($(this).val());
            if($(this).val() != 1){
                $('#communes').hide();
            }else{
                $('#communes').show();
            }
        })
    </script>
@endpush
