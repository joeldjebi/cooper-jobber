@extends('layout.app')
@section('container')
    @include('layout._partials.title')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3">
                <div class="utf-login-register-page-aera margin-bottom-50">
                    <div class="utf-welcome-text-item">
                        <h3>Bienvenue Connectez-vous pour continuer</h3>
                        <span>Vous n'avez pas de compte ? <a href="{{ route('user.register') }}">S'inscrire !</a></span>
                    </div>
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    @if(session()->has("message"))
                        <div class="alert {{session()->get('type')}}">{{ session()->get('message') }}</div>
                    @endif
                    <form method="post" id="login-form" action="{{ route('user.login.post') }}">
                        @csrf
                        @if($errors->has('email'))
                            <p class="alert alert-danger">
                                <span class="fa fa-exclamation-triangle"></span>
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                        <div class="utf-no-border">
                            <input type="text" class="utf-with-border" name="email" id="emailaddress" placeholder="Email ou numero" required="">
                        </div>
                        @if($errors->has('password'))
                            <p class="alert alert-danger">
                                <span class="fa fa-exclamation-triangle"></span>
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                        <div class="utf-no-border">
                            <input type="password" class="utf-with-border" name="password" id="password" placeholder="Mot de passe" required="">
                        </div>
                        <div class="checkbox margin-top-10">
                            <input type="checkbox" id="two-step">
                            <label for="two-step"><span class="checkbox-icon"></span> Souviens-toi de moi</label>
                        </div>
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            Mot de passe oublie ?
                        </a>
                    @endif
                    <button class="button full-width utf-button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form" style="width: 545px;">Se connecter <i class="icon-feather-chevrons-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
