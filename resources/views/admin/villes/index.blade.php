@extends('admin.layout.app')
@section('content')
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
                <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
                    <div class="row">
                        <div class="col-xl-12">
                            <h3>Ville</h3>
                            <nav id="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Ville</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="utf-dashboard-content-inner-aera" style="min-height: 526px;">
                    @include('admin.layout._partial.notification')
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-sm-12">
                            <div class="dashboard-box content-search-all">
                                <div class="content with-padding padding-bottom-10">
                                    <form action="{{ route('ville.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="title-search col-xl-12 col-md-12 col-sm-12">
                                                <h4>Ajouter une Ville</h4>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-sm-12">
                                                <div class="utf-submit-field">
                                                    <input type="text" name="libelle" class="utf-with-border" placeholder="Ville">
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-md-12 col-sm-12">
                                                <div class="utf-centered-button">
                                                    <button type="submit" class="button full-width utf-button-sliding-icon ripple-effect margin-top-10">ENREGISTRER <i class="fa fa-save"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-6 col-md-12 col-sm-12">
                            <div class="dashboard-box">
                                <div class="headline filtre-input-content">
                                    <h3>Liste des Ville</h3>
                                    <div class="sort-by filtre-input">
                                        <div class="utf-submit-field ">
                                            <input type="text" class="utf-with-border" placeholder="Ville">
                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <ul class="utf-dashboard-box-list content-edit-trush-icone">
                                    @foreach($villes as $ville)
                                        <!-- Page Content -->
                                            <div class="w3-container">
                                                <div id="id{{ $ville->id }}" class="w3-modal">
                                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                                        <div class="w3-center"><br>
                                                            <span onclick="document.getElementById('id{{ $ville->id }}').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                                            <h3>Modification de la ville</h3>
                                                        </div>
                                                        <form class="w3-container" method="POST" action="{{ route('ville.update',['id'=> $ville->id]) }}">
                                                            @csrf
                                                            <div class="w3-section">
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-md-12 col-sm-12">
                                                                        <div class="utf-submit-field">
                                                                            <h5>Libelle</h5>
                                                                            @if($errors->has('libelle'))
                                                                                <p class="alert alert-danger">
                                                                                    <span class="fa fa-exclamation-triangle"></span>
                                                                                    {{ $errors->first('libelle') }}
                                                                                </p>
                                                                            @endif
                                                                            <input type="text" class="utf-with-border" placeholder="libelle" name="libelle" value="{{ old('lib')?? $ville->libelle }}">
                                                                        </div>
                                                                    </div>


                                                                    <div class="utf-centered-button">
                                                                        <button type="submit" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0" style="width: 190.219px;">Modifier<i class="icon-feather-plus"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                                            <button onclick="document.getElementById('id{{$ville->id}}').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <li>
                                                <div class="utf-invoice-list-item ">
                                                    <ul>
                                                        <li>Id: <span> {{ $ville->id }}</span></li>
                                                        <li>Ville: <span> {{ $ville->libelle }}</span> </li>
                                                        <li class="edit-trush-icone">
                                                            <a onclick="document.getElementById('id{{ $ville->id }}').style.display='block'" href="#"><span class="fa fa-pencil paid_"></span></a>
                                                            <a onclick="confirm('Voulez vous supprimer cette ville ?')" href="{{ route('ville.delete',['id' => $ville->id]) }}"><span class="fa fa-trash paid_"></span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="utf-pagination-container-aera margin-top-10 margin-bottom-50">
                                {{ $villes->links() }}
                            </div>
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

@endsection
