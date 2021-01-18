@extends('layout.master')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
@endpush
@section('container')
    <div class="utf-dashboard-content-inner-aera" style="min-height: 283px;">
        <div class="row">
            <div class="col-xl-12">
                <div class="dashboard-box margin-top-0 margin-bottom-30">
                    <div class="headline">
                        <h3>Mon Profil</h3>
                        <p><a href="{{ route('profil.etat') }}"> @if($user->active_profile == 0 ) <i class="fa fa-eye" aria-hidden="true"></i> Désactiver @else <i class="fa fa-eye-slash" aria-hidden="true"></i> Activer @endif</a></p>
                    </div>
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    @if(session()->has("message"))
                        <div class="alert {{session()->get('type')}}">{{ session()->get('message') }}</div>
                    @endif
                    <form method="post"  enctype="multipart/form-data" action="{{ route('profil.update') }}">
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
                                                        <img class="profile-pic" src="{{ !empty($user->photo) ? asset('/images/avatars/'.$user->photo) :""}}" alt="Profil de {{ $user->nom.' '.$user->prenom }}">
                                                        <div class="upload-button"></div>
                                                        <input class="file-upload" name="avatar" type="file" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-sm-6">
                                                    <div class="utf-submit-field">
                                                        <h5>Type d'utilisateur</h5>
                                                            <select class="form-control selct-form" name="secteur" data-size="7" title="Type d'utilisateur" tabindex="-98">
                                                                <option value="">Professionnel</option>
                                                                <option value="">Particulier</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>Nom</h5>
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
                                                <h5>Secteurs d'activitee</h5>
                                                @if($errors->has('secteur'))
                                                    <p class="alert alert-danger">
                                                        <span class="fa fa-exclamation-triangle"></span>
                                                        {{ $errors->first('secteur') }}
                                                    </p>
                                                @endif
                                                <select class="form-control selct-form" name="secteur" data-size="7" title="Selectionner Votre secteur d'activité" tabindex="-98">
                                                    @foreach($secteurs as $secteur)
                                                        <option value="{{ $secteur->id }}" {{ $secteur->id == $user->secteur_id ? "selected":"" }}>{{ $secteur->libelle }}</option>
                                                    @endforeach
                                                </select>
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
                                                <select class="form-control selct-form" id="ville" name="ville" data-size="7" title="Sélectionner votre Ville" tabindex="-98">
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
                                                <select class="form-control selct-form" name="commune" data-size="7" title="Sélectionner votre commune" tabindex="-98">
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
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>Piece d'identite recto </h5>
                                                @if($errors->has('piecerecto'))
                                                    <p class="alert alert-danger">
                                                        <span class="fa fa-exclamation-triangle"></span>
                                                        {{ $errors->first('piecerecto') }}
                                                    </p>
                                                @endif
                                                <div class="uploadButton margin-top-15 margin-bottom-30">
                                                    @if(!empty($user->photo_piece_recto))
                                                    <img  src="{{ asset('/images/documents/'.$user->photo_piece_recto)}}" alt="Piece verco de {{ $user->nom.' '.$user->prenom }}">
                                                    @endif
                                                    <input name="piecerecto" class="uploadButton-input" type="file" id="uploadrecto" accept="image/*, application/pdf" id="uploadrecto" multiple="">
                                                    <label class="uploadButton-button ripple-effect" for="uploadrecto">Piece d'identite</label>
                                                    <span class="uploadButton-file-name">Piece d'identite (Docx, Doc, PDF) File.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5>Piece d'identite verso </h5>
                                                @if($errors->has('pieceverso'))
                                                    <p class="alert alert-danger">
                                                        <span class="fa fa-exclamation-triangle"></span>
                                                        {{ $errors->first('pieceverso') }}
                                                    </p>
                                                @endif
                                                <div class="uploadButton margin-top-15 margin-bottom-30">
                                                    @if(!empty($user->photo_piece_verso))
                                                        <img  src="{{ asset('/images/documents/'.$user->photo_piece_verso)}}" alt="Piece verco de {{ $user->nom.' '.$user->prenom }}">
                                                    @endif
                                                    <input class="uploadButton-input" name="pieceverso" id="upload" type="file" accept="image/*, application/pdf" id="upload" multiple="">
                                                    <label class="uploadButton-button ripple-effect" for="upload">Piece d'identite</label>
                                                    <span class="uploadButton-file-name">Piece d'identite (Docx, Doc, PDF) File.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-submit-field">
                                                <h5><i class="fa fa-money"></i> Main d'oeuvre minimum (FCFA)</h5>
                                                @if($errors->has('minprix'))
                                                    <p class="alert alert-danger">
                                                        <span class="fa fa-exclamation-triangle"></span>
                                                        {{ $errors->first('minprix') }}
                                                    </p>
                                                @endif
                                                <input type="text" class="utf-with-border" name="minprix" value="{{ old("prix_min")?? $user->prix_min }}">
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
        </div>
        <!-- Footer -->
        <div class="utf-dashboard-footer-spacer-aera" style="padding-top: 123px;"></div>
        <div class="utf-small-footer margin-top-15">
            <div class="utf-small-footer-copyrights">Copyright &copy; {{ date('Y') }} All Rights Reserved.</div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#ville').change(function (e) {
            console.log($(this));
            console.log($(this).val());
            if($(this).val() != 1){
                $('#communes').hide();
            }else{
                $('#communes').show();
            }
        })
    </script>
@endpush
