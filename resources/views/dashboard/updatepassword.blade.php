@extends('layout.master')
@section('container')
    <div class="utf-dashboard-content-inner-aera text-center" style="min-height: 283px;">
        <div class="row">

            <div class="col-xl-6">
                <div id="test1" class="dashboard-box margin-top-0">
                    <div class="headline">
                        <h3>Changer mon mot de Passe</h3>
                    </div>
                    <form method="POST" action="{{ route('profil.password.update') }}">
                        @csrf
                        <div class="content with-padding">
                            <div class="row">
                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Mot de passe actuel</h5>
                                        @if($errors->has('lastpassword'))
                                            <p class="alert alert-danger">
                                                <span class="fa fa-exclamation-triangle"></span>
                                                {{ $errors->first('lastpassword') }}
                                            </p>
                                        @endif
                                        <input type="password" name="lastpassword" class="utf-with-border" data-tippy-placement="top" placeholder="********" data-tippy="" data-original-title="Current Password">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Nouveau mot de passe</h5>
                                        @if($errors->has('password'))
                                            <p class="alert alert-danger">
                                                <span class="fa fa-exclamation-triangle"></span>
                                                {{ $errors->first('password') }}
                                            </p>
                                        @endif
                                        <input type="password" name="password" class="utf-with-border" data-tippy-placement="top" placeholder="********" data-tippy="" data-original-title="The password must be at least 8 characters">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 col-sm-6">
                                    <div class="utf-submit-field">
                                        <h5>Confirme votre mot de passe</h5>
                                        @if($errors->has('password_confirm'))
                                            <p class="alert alert-danger">
                                                <span class="fa fa-exclamation-triangle"></span>
                                                {{ $errors->first('password_confirmed') }}
                                            </p>
                                        @endif
                                        <input type="password" name="password_confirmed" class="utf-with-border" data-tippy-placement="top" placeholder="********" data-tippy="" data-original-title="The password must be at least 8 characters">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="button ripple-effect big margin-top-10">Modifier le Mot de passe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="utf-dashboard-footer-spacer-aera" style="padding-top: 123px;"></div>
        <div class="utf-small-footer margin-top-15">
            <div class="utf-small-footer-copyrights">Copyright � 2020 All Rights Reserved.</div>
        </div>
    </div>
@endsection
