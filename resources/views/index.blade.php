@extends('layout.app')
@push('css')
    <style>
        .content-search-home form.contact-form {
            margin-top: 15px;
            margin-left: 10px;
        }

        .content-search-home select{
            width: 215px;
        }

        .content-search-home .utf-intro-search-button {
            margin: initial;
        }

        .content-search-home i.fa{
            top: 15px;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
@endpush
@section('container')
    @include('layout._partials.banner')

    <!-- Jobs Category Boxes -->
    <div class="section margin-top-60 margin-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                        <span>Secteurs d'activités</span>
                        <h3>Les secteurs les plus populaires</h3>
                        <div class="utf-headline-display-inner-item">Secteurs d'activités</div>
                    </div>
                    <div class="utf-categories-container-block">
                        @php
                        $sects = $secteurs->take(8)
                        @endphp
                        @foreach($sects as $secteur)
                        <a href="{{ route('secteurs.jobber',['id' => $secteur->id, 'slug' => str_slug($secteur->libelle)]) }}" class="utf-category-box">
                            <div class="utf-category-box-icon-item">@if(empty($secteur->image)) <i class="fa fa-qrcode"></i> @else <img src="/images/logo/{{$secteur->image}}" alt="Jobber logo {{$secteur->libelle}}"> @endif </div>
                            <div class="utf-category-box-content">
                                <h3>{{ $secteur->libelle }}</h3>
                            </div>
                            <div class="utf-category-box-counter-item">{{ $secteur->users()->where(['active_profile' => 1, 'validate_profile' => 1])->has('experiences')->count() }} jobbers</div>
                        </a>
                        @endforeach
                    </div>
                    @if($secteurs->count() > 8)
                    <div class="utf-centered-button margin-top-10">
                        <a href="{{ route('home.secteurs') }}" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-20" style="width: 250.781px;">Voir toute les categories <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs Category Boxes / End -->
    <!-- Latest Jobs -->
    <div class="section gray padding-top-60 padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                        <span>Les meilleurs Jobber</span>
                        <h3>Les Jobber qui pourraient vous intéresser</h3>
                        <div class="utf-headline-display-inner-item">Les meilleurs Jobber a la une</div>
                    </div>
                    <div class="utf-listings-container-part compact-list-layout margin-top-35 ">
                        @php
                            $jobs = $jobbers->take(10);
                        @endphp
                        @foreach($jobs as $jobber)
                        <a href="{{ route('show',['id' => $jobber->id,'slug' => str_slug($jobber->nom)]) }}" class="vippost utf-job-listing utf-apply-button-item">
                            <div class="utf-job-listing-details">
                                <div class="utf-job-listing-company-logo"> <img src="{{isset($jobber->photo)? '/images/avatars/'.$jobber->photo: './index_files/company_logo_1.png'}}" alt=""> </div>
                                <div class="utf-job-listing-description">
                                    <span class="dashboard-status-button utf-job-status-item green"><i class="fa fa-empire" aria-hidden="true"></i> {{ $jobber->secteur->libelle }}</span>
                                    <h3 class="utf-job-listing-title">{{ $jobber->nom.' '.$jobber->prenom }} <i class="fa fa-certificate" style="color: green;" aria-hidden="true"></i></h3>
                                    <div class="utf-job-listing-footer">
                                        <ul>
                                            @if($jobber->ville()->exists())
                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $jobber->ville->libelle }}</li>
                                            @endif
                                            @if($jobber->ville_id == 1 &&  $jobber->commune()->exists())
                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i></i>{{ $jobber->commune->libelle }}</li>
                                            @endif
                                            <li><i class="fa fa-id-card" aria-hidden="true"></i> {{$jobber->anneexperiences()}}  jours d'experience</li>
                                            <li><i class="fa fa-eye" aria-hidden="true"></i> {{ $jobber->nbvue }} vue(s)</li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="list-apply-button ripple-effect">Voir le profil <i class="fa fa-user"></i></span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @if($jobbers->count() > 10)
                    <div class="utf-centered-button margin-top-10">
                        <a href="{{ route('profil.liste') }}" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-20" style="width: 215.891px;">Voir tous les Jobber <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Latest Jobs / End -->

    <!-- Photo Section -->
    <div class="utf-photo-section-block" data-background-image="images/section-background.jpg" style="background-image: url(&quot;images/section-background.jpg&quot;);">
        <div class="text-content white-font">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <h2>Téléchargez l'application mobile Mon Jobber</h2>
                        <p>
                            Retrouver vos Jobbers par tout ou vous vous trouvez en un clic. <br>
                            C'est simple rapide et éfficace
                        </p>
                        <ul class="utf-download-text">
                            <li>
                                <a href="#" data-tippy-placement="top" data-tippy="" data-original-title="App Store">
                                    <i class="fa fa-apple" aria-hidden="true"></i>
                                    <span>App Store</span>
                                    <p>Pas disponible</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Google Play">
                                    <i class="fa fa-android" aria-hidden="true"></i>
                                    <span>Google Play</span>
                                    <p>Pas disponible</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="download-img">
                            <img src="http://jobword.utouchdesign.com/jobword_ltr/images/mockup3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Photo Section / End -->

    <!-- Start Need Any Help -->
    <section class="section padding-top-65 padding-bottom-75">
        <div class="container">
            <div class="col-xl-12">
                <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                    <span>Service d'aide </span>
                    <h3>Besoin d'aide?</h3>
                    <div class="utf-headline-display-inner-item">Service D'aide et d'assistance</div>
                </div>
            </div>
            <div class="row need-help-area justify-content-center">
                <div class="col-xl-4">
                    <div class="info-box-1">
                        <div class="utf-icon-box-circle">
                            <div class="utf-icon-box-circle-inner"> <i class="fa fa-commenting-o" aria-hidden="true"></i></div>
                        </div>
                        <h4>Discutez avec nous en ligne</h4>
                        <p>Discutez avec nous en ligne si vous avez des questions.</p>
                        <a href="https://web.whatsapp.com/send?phone=+22558754664&text=Bonjour," class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10" style="width: 203.219px;">Clique ici pour discuter
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="info-box-1">
                        <div class="utf-icon-box-circle">
                            <div class="utf-icon-box-circle-inner"> <i class="fa fa-question-circle" aria-hidden="true"></i></div>
                        </div>
                        <h4>Notre agent d'assistance</h4>
                        <p>Notre agent de soutien travaillera avec vous pour répondre à vos besoins de prêt.</p>
                        <a href="{{ route('contact') }}" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10" style="width: 152.344px;">Nous contacter <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="info-box-1">
                        <div class="utf-icon-box-circle">
                            <div class="utf-icon-box-circle-inner"> <i class="fa fa-line-chart" aria-hidden="true"></i></div>
                        </div>
                        <h4>Devenir VIP</h4>
                        <p>
                            Mettez en avant votre profil en haut de chaque page
                            Gagnez en visibilité.
                        </p>
                        <a href="{{ route('booster') }}" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10" style="width: 183.922px;">Voir les offres <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Need Any Help -->

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
