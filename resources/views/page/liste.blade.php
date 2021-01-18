@extends('layout.app')
@section('container')
    @include('layout._partials.title')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="utf-inner-search-section-title">
                    <h4><i class="icon-material-outline-search"></i> Les Jobber</h4>
                </div>
                <div class="utf-notify-box-aera margin-top-15">
                    <div class="utf-switch-container-item">
                        <span>Plus de {{$jobbers->count()}} Jobbers </span>
                    </div>
                    <div class="sort-by">
                        
                        <select class="form-control" tabindex="-98">
                            <option>A to Z</option>
                            <option>Recent</option>
                            <option>Encien</option>
                            <option>Random</option>
                        </select>
                    </div>
                </div>

                <div class="utf-listings-container-part compact-list-layout margin-top-35">
                    @foreach($jobbers as $jobber)
                        <a href="{{ route('show',['id' => $jobber->id, 'slug' => $jobber->nom]) }}" class="vippost utf-job-listing utf-apply-button-item">
                            <div class="utf-job-listing-details">
                                <div class="utf-job-listing-company-logo"> <img src="{{isset($jobber->photo)? '/images/avatars/'.$jobber->photo: './index_files/company_logo_1.png'}}" alt=""> </div>
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
                <!-- Pagination -->
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="utf-pagination-container-aera margin-top-30 margin-bottom-60">
                            <nav class="pagination">
                                {{ $jobbers->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            @include('layout._partials.sibebarliste')
        </div>
    </div>
@endsection
