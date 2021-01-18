@extends('layout.app')
@push('css')
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v9.0" nonce="iv7DOwZB"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
@endpush
@section('container')
    <!-- Titlebar -->
    <div class="single-page-header" data-background-image="images/single-job.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="utf-single-page-header-inner-aera">
                        <div class="utf-left-side">
                            <div class="utf-header-image">
                                <a href="#"><img src="{{isset($jobber->photo)? '/images/avatars/'.$jobber->photo: '/index_files/company_logo_1.png'}}" alt=""></a>
                            </div>
                            <div class="utf-header-details">
                                <span class="dashboard-status-button utf-job-status-item green"><i class="fa fa-empire"></i> {{ $jobber->secteur->libelle }}</span>
                                <h3>{{ $jobber->nom.' '.$jobber->prenom }} <span class="fa fa-certificate" data-tippy-placement="top" data-tippy="" data-original-title="Verified"></span></h3>
                                @if($jobber->ville()->exists())
                                <h5><i class="fa fa-location-arrow"></i> {{ $jobber->ville->libelle??"" }}</h5>
                                @endif
                                @if($jobber->ville_id == 1 &&  $jobber->commune()->exists())
                                <h5><i class="fa fa-map-marker"></i> {{ $jobber->commune->libelle??"" }}</h5>
                                @endif
                                <h5><i class="fa fa-eye"></i> {{ $jobber->nbvue }} vue(s)</h5>
                            </div>
                        </div>
                        <div class="utf-right-side">
                            <div class="salary-box">
                                <a href="tel:{{$jobber->contact}}" class="apply-now-button popup-with-zoom-anim margin-top-0">Contacter par telephone <i class="fa fa-phone"></i></a>
                                <a href="mailto:{{$jobber->email}}" class="button save-job-btn margin-top-20">Contacter par mail <i class="fa fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="background-image-container" style="background-image: url(&quot;images/single-job.jpg&quot;);"></div>
    </div>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 utf-content-right-offset-aera">
                <div class="utf-single-page-section-aera">
                    @if(Auth::check() && Auth::user()->typeuser_id == 1)
                        <div class="utf-boxed-list-headline-item">
                            <h3><i class="icon-material-outline-description"></i> Pieces</h3>
                        </div>
                    <div id="diplome">

                            <p class="mt-2">
                                piece recto : @if($jobber->photo_piece_verso)<a target="_blank" href="/images/documents/{{$jobber->photo_piece_verso}}">piece verso</a>@endif
                            </p>
                            <p class="mt-2">
                               piece recto : @if($jobber->photo_piece_recto)<a target="_blank" href="/images/documents/{{$jobber->photo_piece_recto}}">piece recto verso</a>@endif
                            </p>
 
                    </div>
                    @endif
                    
                    <div class="utf-boxed-list-headline-item">
                        <h3><i class="icon-material-outline-description"></i> Information Jobber</h3>
                    </div>
                    <div class="utf-sidebar-widget-item domaine-cmpt">
                        <h3>Domaines de compétences</h3>
                        <div class="task-tags"> 
                            @foreach(explode(';', $jobber->experiences->implode('competences', ';')) as $competence)
                                @if(!empty($competence))
                                    <span><i class="fa fa-check"></i> {{ $competence }} </span>
                                @endif
                            @endforeach 
                        </div>
                    </div> 
                    <div id="experience" class="utf-sidebar-widget-item">
                        <h3>Experience</h3>
                        <div class="jobber-candidate-timeline">
                            <div class="jobber-timeline-icon">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                            </div>
                            @foreach($jobber->experiences as $experience )
                            <div class="jobber-timeline-item">
                                <div class="jobber-timeline-cricle">
                                    <i class="fa fa-circle"></i>
                                </div>
                                <div class="jobber-timeline-info">
                                    <span class="jobber-timeline-time"><b>De</b> {{ date("d-m-Y", strtotime($experience->date_debut)) }}  {!!   isset($experience->date_fin) ? '<b>au</b> '. date("d-m-Y", strtotime($experience->date_fin)) : "<b>à</b> Aujourd'hui" !!} </span>
                                    <h4 style="color: #ff8a00;" class="mb-2">{{ $experience->libelle }}</h4>
                                    <span>-Mission:</span>
                                    <p class="mt-2">{{ $experience->description }}.</p>
                                    @if(Auth::check() && Auth::user()->typeuser_id == 1 && !empty($experience->diplome))
                                    <p class="mt-2">
                                        <a target="_blank" href="/images/documents/{{$experience->diplome}}">diplome</a>
                                    </p>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="utf-sidebar-widget-item domaine-cmpt-galerie">
                        <h3>Gallerie</h3>
                        <div class="row">
                        <div class="container">
                            <div class="row">
                                
                                @foreach($galerie_jobbers as $galerie_jobber)
                                    <div class="col-xl-3">
                                        <div class="item"><img src="{{asset('images/galerie_jobber/'.$galerie_jobber->url)}}" class="img-thumbnail" alt="{{$galerie_jobber->url}}"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <a href="#" class="apply-now-button popup-with-zoom-anim margin-top-0">Afficher le telephone <i class="fa fa-phone"></i></a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <a href="#" class="button save-job-btn">Contacter par mail <i class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                    <div class="utf-detail-social-sharing margin-top-25">
                        <span><strong>Partager sur : </strong></span>
                        <ul class="margin-top-15">
                            <li><a class="bg-fb" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="bg-inst" href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a class="bg-wha" href="#"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="utf-boxed-list-item margin-bottom-60">
                    <div class="utf-sidebar-widget-item cmment-fb">
                        <h3>Commentaire</h3>
                        <div class="fb-comments" data-href="{{ route('show',['id' =>$jobber->id, 'slug' => $jobber->nom ]) }}" data-width="" data-numposts="100"></div>
                    </div>
                    <div class="utf-listings-container-part compact-list-layout margin-top-35 ">
                        @php
                            $jobs = $jobbers->take(10);
                        @endphp
                        @foreach($jobs as $jobber)
                            <a href="{{ route('show',['id' => $jobber->id, 'slug' => $jobber->nom]) }}" class="vippost utf-job-listing utf-apply-button-item">
                                <div class="utf-job-listing-details">
                                    <div class="utf-job-listing-company-logo"> <img src="{{!empty($jobber->photo)? '/images/avatars/'.$jobber->photo: '/index_files/company_logo_1.png'}}" alt=""> </div>
                                    <div class="utf-job-listing-description">
                                        <span class="dashboard-status-button utf-job-status-item green"><i class="fa fa-empire" aria-hidden="true"></i> {{ $jobber->secteur->libelle }}</span>
                                        <h3 class="utf-job-listing-title">{{ $jobber->nom.' '.$jobber->prenom }} <i class="fa fa-certificate" style="color: green;" aria-hidden="true"></i></h3>
                                        <div class="utf-job-listing-footer">
                                            <ul>
                                                @if($jobber->ville()->exists())
                                                    <li>
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>{{ $jobber->ville->libelle }}
                                                    </li>
                                                @endif
                                                @if($jobber->ville_id == 1 &&  $jobber->commune()->exists())
                                                    <li>
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i></i>{{ $jobber->commune->libelle }}
                                                    </li>
                                                @endif
                                                <li>
                                                    <i class="fa fa-id-card" aria-hidden="true"></i> {{$jobber->anneexperiences()}}  jours d'experience
                                                </li>
                                                <li>
                                                    <i class="fa fa-eye" aria-hidden="true"></i> {{ $jobber->nbvue }} vue(s)
                                                </li>
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

            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">
                <div class="utf-sidebar-container-aera">
                    
                    <div class="utf-sidebar-widget-item">
                        <div class="utf-quote-box">
                            <div class="utf-quote-info">
                                <h4>Conseils de securite</h4>
                                <p>
                                    <ul>
                                        <li>Exiger la pièce d'identite d Jobber</li>
                                        <li>Les informations du Jobber ne correspondent pas au information sur ça pièce d'identite</li>
                                        <li>Le téléphone ne correspond pas à un numéro local valide</li>
                                        <li>Si un jobber vous parait suspect contactez nous</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="utf-sidebar-widget-item">
                        <h3>Categories</h3>
                        <div class="task-tags">
                            @foreach($secteurs as $secteur)
                            <a href="{{ route('secteurs.jobber',['id' => $secteur->id, 'slug'=> $secteur->libelle ]) }}"><span>{{ $secteur->libelle }}</span></a>
                            @endforeach
                        </div>
                    </div>
                    <div class="utf-sidebar-widget-item">
                        <h3>Booster votre profil</h3>
                        <p class="bookmark-text-item">Soyez a la une de toute les recherche</p>
                        <div class="text-center">
                            <a href="{{ route('booster') }}" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Cliquez ici pour Booster <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
