@extends('admin.layout.app')
@section('content')
    <!-- Dashboard Content -->
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
                            <h3>Dashboard</h3>
                            <nav id="breadcrumbs">
                                <ul>
                                    <li><a href="http://jobword.utouchdesign.com/jobword_ltr/index-1.html">Home</a></li>
                                    <li>Dashboard</li>
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
                                    <form action="{{ route('secteur.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="title-search col-xl-12 col-md-12 col-sm-12">
                                                <h4>Ajouter un secteur d'activite</h4>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-sm-12">
                                                <div class="utf-submit-field">
                                                    <div class="uploadButton margin-top-15 margin-bottom-30">
                                                        <input class="uploadButton-input" type="file" name="image" accept="image/*, application/pdf" id="upload" multiple="">
                                                        <label class="uploadButton-button ripple-effect" for="upload">Image</label>
                                                        <span class="uploadButton-file-name">Icone (png, Jpeg, ...) File.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-sm-12">
                                                <div class="utf-submit-field">
                                                    <input type="text" name="libelle" value="{{ old('libelle') ?? "" }}" class="utf-with-border" placeholder="Secteur d'activite">
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-md-12 col-sm-12">
                                                <div class="utf-submit-field">
                                                    <input type="text" name="description" value="{{ old('description') ?? "" }}" class="utf-with-border" placeholder="description">
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
                                    <h3>Liste des secteurs d'activites</h3>
                                    <div class="sort-by filtre-input">
                                        <div class="utf-submit-field ">
                                            <input type="text" class="utf-with-border" placeholder="Secteur d'activite">
                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <ul class="utf-dashboard-box-list content-edit-trush-icone">
                                        @foreach($secteurs as $secteur)
                                            <!-- Page Content -->
                                            <div class="w3-container">
                                                <div id="id{{ $secteur->id }}" class="w3-modal">
                                                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                                        <div class="w3-center"><br>
                                                            <span onclick="document.getElementById('id{{ $secteur->id }}').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                                            <h3>Modification du secteur</h3>
                                                        </div>
                                                        <form class="w3-container" method="POST" action="{{ route('secteur.update',['id'=> $secteur->id]) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="title-search col-xl-12 col-md-12 col-sm-12">
                                                                    <h4>Ajouter un secteur d'activite</h4>
                                                                </div>
                                                                <div class="col-xl-12 col-md-12 col-sm-12">
                                                                    <div class="utf-submit-field">
                                                                        <div class="uploadButton margin-top-15 margin-bottom-30">
                                                                            <input class="uploadButton-input" type="file" name="image_update" accept="image/*, application/pdf" id="upload-{{ $secteur->id }}" multiple="">
                                                                            <label class="uploadButton-button ripple-effect" for="upload-{{ $secteur->id }}">Image</label>
                                                                            <span class="uploadButton-file-name">Icone (png, Jpeg, ...) File.</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-md-12 col-sm-12">
                                                                    <div class="utf-submit-field">
                                                                        <span class="user-avatar">
                                                                            <img src="{{ asset('/images/logo/'.$secteur->image) }}" alt=" logo {{ $secteur->libelle }}">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-md-12 col-sm-12">
                                                                    <div class="utf-submit-field">
                                                                        <input type="text" name="libelle" value="{{ old('libelle') ?? $secteur->libelle }}" class="utf-with-border" placeholder="Secteur d'activite">
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-12 col-md-12 col-sm-12">
                                                                    <div class="utf-submit-field">
                                                                        <input type="text" name="description" value="{{ old('description') ?? $secteur->description }}" class="utf-with-border" placeholder="description">
                                                                    </div>
                                                                </div>

                                                                <div class="utf-centered-button">
                                                                    <button type="submit" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0" style="width: 190.219px;">Modifier<i class="icon-feather-plus"></i></button>
                                                                </div>
                                                            </div>
                                                    </form>
                                                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                                        <button onclick="document.getElementById('id{{$secteur->id}}').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <li>

                                </div>
                                            <div class="utf-invoice-list-item ">
                                                <ul>
                                                    <li>Id: <span> {{ $secteur->id }}</span></li>
                                                    <li class="icone-secteur-activite">
                                                        <span class="user-avatar">
                                                            <img src="{{ asset('/images/logo/'.$secteur->image) }}" alt=" logo {{ $secteur->libelle }}">
                                                        </span>
                                                    </li>
                                                    <li>secteurs d'activites: <span> {{ $secteur->libelle }}</span> </li>
                                                    <li>Description: <span> {{ $secteur->description }}</span> </li>
                                                    <li class="edit-trush-icone">
                                                        <a onclick="document.getElementById('id{{ $secteur->id }}').style.display='block'" href="#"><span class="fa fa-pencil paid_"></span></a>
                                                        <a onclick="confirm('Voulez vous supprimer cet secteur ?')" href="{{ route('secteur.delete',['id' => $secteur->id]) }}"><span class="fa fa-trash paid_"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="utf-pagination-container-aera margin-top-10 margin-bottom-50">
                                <nav class="pagination">
                                    {{ $secteurs->links() }}
                                </nav>
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
    </div>
@endsection
