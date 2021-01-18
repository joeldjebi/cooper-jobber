@extends('layout.app')
@section('container')
     @include('layout._partials.title')
 <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="utf-login-register-page-aera margin-bottom-50">
                        <div class="utf-welcome-text-item">
                            <h3>Créez votre nouveau compte!</h3>
                            <span>Vous avez deja un compte ? <a href="{{ route('user.login') }}">Connectez-vous!</a></span>
                        </div>
                        @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                        @endif
                        @if(session()->has("message"))
                                <div class="alert {{session()->get('type')}}">{{ session()->get('message') }}</div>
                        @endif
                        <form method="post" id="utf-register-account-form" action="{{ route('user.createAccount') }}">
                            @csrf
                            <div class="utf-account-type">
                                @if($errors->has('account-type'))
                                    <p class="alert alert-danger">
                                        <span class="fa fa-exclamation-triangle"></span>
                                        {{ $errors->first('secteur') }}
                                    </p>
                                @endif
                                <div>
                                    <input type="radio" name="accounttype" id="freelancer-radio" value="2" class="utf-account-type-radio" checked="">
                                    <label for="freelancer-radio" data-tippy-placement="top" class="utf-ripple-effect-dark" data-tippy="" data-original-title="Employer"><i class="fa fa-user"></i> Particulier</label>
                                </div>
                                <div>
                                    <input type="radio" name="accounttype" id="employer-radio" value="3" class="utf-account-type-radio">
                                    <label for="employer-radio" data-tippy-placement="top" class="utf-ripple-effect-dark" data-tippy="" data-original-title="Candidate"><i class="fa fa-user"></i> Professionnel</label>
                                </div>
                            </div>
                            <div id="secteur" class="utf-no-border margin-bottom-18">
                                @if($errors->has('secteur'))
                                    <p class="alert alert-danger">
                                        <span class="fa fa-exclamation-triangle"></span>
                                        {{ $errors->first('secteur') }}
                                    </p>
                                @endif
                                <select class="form-control selct-form"  name="secteur" data-size="5" title="Selectionner le secteur d'activité" tabindex="-98">
                                    @foreach($secteurs as $secteur)
                                    <option value="{{$secteur->id}}">{{$secteur->libelle}}</option>
                                    @endforeach
                              </select>
                            </div>
                            @if($errors->has('name'))
                                <p class="alert alert-danger">
                                    <span class="fa fa-exclamation-triangle"></span>
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                            <div class="utf-no-border">
                                <input type="text" class="utf-with-border" name="name" value="{{old('name')}}" id="name-register" placeholder="Nom" required="">
                            </div>
                            @if($errors->has('prenoms'))
                                <p class="alert alert-danger">
                                    <span class="fa fa-exclamation-triangle"></span>
                                    {{ $errors->first('prenoms') }}
                                </p>
                            @endif
                            <div class="utf-no-border">
                                <input type="text" class="utf-with-border" name="prenoms" value="{{old('prenoms')}}" id="name-register" placeholder="Prenoms" required="">
                            </div>
                            @if($errors->has('numero'))
                                <p class="alert alert-danger">
                                    <span class="fa fa-exclamation-triangle"></span>
                                    {{ $errors->first('numero') }}
                                </p>
                            @endif
                            <div class="utf-no-border">
                                <input type="tel" class="utf-with-border" name="numero" id="name-register" value="{{old('numero')}}" placeholder="Numero de telephone" required="">
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="iswhatsapp" id="two-step0">
                                <label for="two-step0"><span class="checkbox-icon"></span> Votre numero est un WhatsApp ?</label>
                            </div>
                            @if($errors->has('email'))
                                <p class="alert alert-danger">
                                    <span class="fa fa-exclamation-triangle"></span>
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                            <div class="utf-no-border">
                                <input type="text" class="utf-with-border" name="email" value="{{old('email')}}" id="emailaddress-register" placeholder="Adresse Email" required="">
                            </div>
                            @if($errors->has('password'))
                                <p class="alert alert-danger">
                                    <span class="fa fa-exclamation-triangle"></span>
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                            <div class="utf-no-border">
                                <input type="password" class="utf-with-border" name="password" id="password-register" placeholder="Mot de passe" required="">
                            </div>
                            @if($errors->has('password_confirmation'))
                                <p class="alert alert-danger">
                                    <span class="fa fa-exclamation-triangle"></span>
                                    {{ $errors->first('password_confirmation') }}
                                </p>
                            @endif
                            <div class="utf-no-border">
                                <input type="password" class="utf-with-border" name="password_confirmation" id="password-repeat-register" placeholder="Mot de passe de confirmation" required="">
                            </div>
                            <div class="checkbox margin-top-10">
                                <input type="checkbox" id="two-step0">
                                <label for="two-step0"><span class="checkbox-icon"></span> En vous inscrivant, vous confirmez que vous acceptez les <a href="#">conditions generales</a> et <a href="#">politique de confidentialite</a></label>
                            </div>
                            <button class="button full-width utf-button-sliding-icon ripple-effect margin-top-10" type="submit" style="width: 525px;">Créer un compte <i class="icon-feather-chevrons-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('scripts')
    <script>
        $('input[name="accounttype"]').change(function (e) {
            if($(this).val() == 3){
                $('#secteur').hide();
            }else{
                $('#secteur').show();
            }
        })
    </script>
@endpush
