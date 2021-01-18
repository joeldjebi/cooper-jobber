@extends('layout.app')
@section('container')
    <!-- About List Start -->
    <div class="section margin-top-65 padding-bottom-55">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
                        <span>Secteurs d'activités</span>
                        <h3>Les secteurs les plus populaires</h3>
                        <div class="utf-headline-display-inner-item">Secteurs d'activités</div>
                    </div>
                    <div class="utf-categories-container-block">
                        @foreach($secteurs as $secteur)
                            <a href="{{ route('secteurs.jobber',['id' => $secteur->id, 'slug' => str_slug($secteur->libelle)]) }}" class="utf-category-box">
                                <div class="utf-category-box-icon-item">@if(empty($secteur->image)) <i class="fa fa-qrcode"></i> @else <img src="/images/logo/{{$secteur->image}}" alt="Jobber logo {{$secteur->libelle}}"> @endif </div>
                                <div class="utf-category-box-content">
                                    <h3>{{ $secteur->libelle }}</h3>
                                </div>
                                <div class="utf-category-box-counter-item">{{ $secteur->users()->where(['active_profile' => 1, 'validate_profile' => 1])->has('experiences')->count() }} jobbers</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="clearfix"></div>
            <div class="utf-pagination-container-aera margin-top-40 margin-bottom-0">
                <nav class="pagination">
                    {{ $secteurs->links() }}
                </nav>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- About List End -->
@endsection
