@extends('layout.master')
@push('css')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
@endpush
@section('container')
    <div class="utf-dashboard-content-inner-aera" style="min-height: 526px;">
        @if(session()->has('message'))
            <p class="alert {{session()->get('type')}}">
                {{ session()->get('message') }}
            </p>
        @endif
        <div id="experience">
            <h5 class="mb-3">Experience</h5>
            <div class="jobber-candidate-timeline">
                <div class="jobber-timeline-icon">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                </div>
                @foreach($experiences as $experience)
                        <!-- Page Content -->
                        <div class="w3-container">
                            <div id="id{{ $experience->id }}" class="w3-modal">
                                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                                    <div class="w3-center"><br>
                                        <span onclick="document.getElementById('id{{ $experience->id }}').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                        <h3>Modification de mon eperience</h3>
                                    </div>
                                    <form class="w3-container" method="POST" action="{{ route('profil.experience.update',['id'=> $experience->id]) }}">
                                        @csrf
                                        <div class="w3-section">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12">
                                                    <div class="utf-submit-field">
                                                        <h5>Libelle</h5>
                                                        @if($errors->has('lib'))
                                                            <p class="alert alert-danger">
                                                                <span class="fa fa-exclamation-triangle"></span>
                                                                {{ $errors->first('lib') }}
                                                            </p>
                                                        @endif
                                                        <input type="text" class="utf-with-border" placeholder="Titre du Post" name="lib" value="{{ old('lib')?? $experience->libelle }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-sm-6">
                                                    <div class="utf-submit-field datepicker">
                                                        <h5>Date de debut</h5>
                                                        @if($errors->has('dated'))
                                                            <p class="alert alert-danger">
                                                                <span class="fa fa-exclamation-triangle"></span>
                                                                {{ $errors->first('dated') }}
                                                            </p>
                                                        @endif
                                                        <input class="utf-with-border" type="date" name="dated" value="{{ old('dated')?? $experience->date_debut }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-sm-6">
                                                    <div class="utf-submit-field datepicker">
                                                        <h5>Date de fin</h5>
                                                        @if($errors->has('datef'))
                                                            <p class="alert alert-danger">
                                                                <span class="fa fa-exclamation-triangle"></span>
                                                                {{ $errors->first('datef') }}
                                                            </p>
                                                        @endif
                                                        <input class="utf-with-border" type="date" name="datef" value="{{ old('datef')?? $experience->date_fin }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-md-12 col-sm-12">
                                                    <div class="utf-submit-field">
                                                        <h5>Diplome obtenu </h5>
                                                        @if($errors->has('diplo'))
                                                            <p class="alert alert-danger">
                                                                <span class="fa fa-exclamation-triangle"></span>
                                                                {{ $errors->first('diplo') }}
                                                            </p>
                                                        @endif
                                                        <div class="uploadButton margin-top-15 margin-bottom-30">
                                                            <input class="uploadButton-input" type="file" accept="image/*, application/pdf" name="diplo" id="upload" multiple="">
                                                            <label class="uploadButton-button ripple-effect" for="upload">Upload Resume</label>
                                                            <span class="uploadButton-file-name">Upload Resume (Docx, Doc, PDF) File.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach(explode(";",$experience->competences) as $competence)
                                                <div class="col-xl-12 col-md-12 col-sm-12">
                                                    <h5>Domaines de compétences</h5>
                                                    @if($errors->has('competences'))
                                                            <p class="alert alert-danger">
                                                                <span class="fa fa-exclamation-triangle"></span>
                                                                {{ $errors->first('competences') }}
                                                            </p>
                                                        @endif
                                                    <div id="domaine_de_competence">
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6 col-md-10 col-sm-10 nopadding">
                                                            <div class="utf-submit-field">
                                                                <input type="text" class="utf-with-border" id="competences" name="competences[]" value="{{ $competence }}" placeholder="competence">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2 col-md-2 col-sm-2">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-success" type="button"  onclick="domaine_de_competence();"> <span class="fa fa-plus-circle" aria-hidden="true"></span> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="clear"></div>
                                                </div>
                                                @endforeach
                                                <div class="col-xl-12 col-md-12 col-sm-12">
                                                    <div class="utf-submit-field">
                                                        <h5>Description</h5>
                                                        @if($errors->has('desc'))
                                                            <p class="alert alert-danger">
                                                                <span class="fa fa-exclamation-triangle"></span>
                                                                {{ $errors->first('desc') }}
                                                            </p>
                                                        @endif
                                                        <textarea cols="40" rows="2" class="utf-with-border" name="desc" placeholder="Description du post...">{{ old('desc')?? $experience->description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="utf-centered-button">
                                                    <button type="submit" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0" style="width: 190.219px;">Modifier<i class="icon-feather-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                        <button onclick="document.getElementById('id{{$experience->id}}').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jobber-timeline-item">
                    <div class="jobber-timeline-cricle">
                        <i class="fa fa-circle"></i>
                    </div>
                    <div class="jobber-timeline-info">
                        <span class="jobber-timeline-time"><b>De</b> {{ date("d-m-Y", strtotime($experience->date_debut)) }} <b>à</b> {{  !empty($experience->date_fin)?date("d-m-Y", strtotime($experience->date_fin)): "Aujourd'hui" }} <a href="#" onclick="document.getElementById('id{{ $experience->id }}').style.display='block'"><i class="fa fa-pencil color-black"></i></a></span>
                        <h6 class="mb-2">{{ $experience->libelle }}</h6>
                        <p class="mt-2">{{ $experience->description }}.</p>
                        
                        <div class="task-tags"> 
                            @foreach(explode(";",$experience->competences) as $competence)
                                <span><i class="fa fa-check"></i> {{ $competence }} </span>
                            @endforeach     
                        </div>
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="dashboard-box">
                    <div class="headline">
                        <h3>General Information</h3>
                    </div>
                    <form action="{{ route('profil.experience.post') }}" method="POST">
                        @csrf
                        <div class="content with-padding padding-bottom-10">
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
                                        <input type="text" name="libelle" class="utf-with-border" value="{{ old('libelle') }}" placeholder="Poste">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6">

                                    <div class="utf-submit-field datepicker">
                                        <h5>Date de debut</h5>
                                        @if($errors->has('datedebut'))
                                            <p class="alert alert-danger">
                                                <span class="fa fa-exclamation-triangle"></span>
                                                {{ $errors->first('datedebut') }}
                                            </p>
                                        @endif
                                        <input class="utf-with-border" name="datedebut" type="date" value="{{ old('datedebut') }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <div class="utf-submit-field datepicker">
                                        <h5>Date de fin</h5>
                                        @if($errors->has('datefin'))
                                            <p class="alert alert-danger">
                                                <span class="fa fa-exclamation-triangle"></span>
                                                {{ $errors->first('datefin') }}
                                            </p>
                                        @endif
                                        <input class="utf-with-border" name="datefin" type="date" value="{{ old('datefin') }}">
                                    </div>
                                </div>

                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="utf-submit-field">
                                        <h5>Diplome obtenu </h5>
                                        @if($errors->has('diplome'))
                                            <p class="alert alert-danger">
                                                <span class="fa fa-exclamation-triangle"></span>
                                                {{ $errors->first('diplome') }}
                                            </p>
                                        @endif
                                        <div class="uploadButton margin-top-15 margin-bottom-30">
                                            <input class="uploadButton-input" type="file" name="diplome" accept="image/*, application/pdf" id="upload" multiple="">
                                            <label class="uploadButton-button ripple-effect" for="upload">Upload Resume</label>
                                            <span class="uploadButton-file-name">Upload Resume (Docx, Doc, PDF) File.</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <h5>Domaines de compétences</h5>
                                    <div id="domaine_de_competence">
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-10 col-sm-10 nopadding">
                                            <div class="utf-submit-field">
                                                <input type="text" class="utf-with-border" id="competences" name="competences[]" value="" placeholder="competence">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-2 col-sm-2">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success" type="button"  onclick="domaine_de_competence();"> <span class="fa fa-plus-circle" aria-hidden="true"></span> </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="clear"></div>
                                </div>

                                <div class="col-xl-12 col-md-12 col-sm-12">
                                    <div class="utf-submit-field">
                                        <h5>Description</h5>
                                        @if($errors->has('description'))
                                            <p class="alert alert-danger">
                                                <span class="fa fa-exclamation-triangle"></span>
                                                {{ $errors->first('description') }}
                                            </p>
                                        @endif
                                        <textarea cols="40" rows="2" class="utf-with-border" name="description"  placeholder="Description du poste...">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="utf-centered-button">
                            <button type="submit" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0" style="width: 160.234px; margin-bottom: 50px">Enregistrer <i class="icon-feather-plus"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <div class="utf-dashboard-footer-spacer-aera" style="padding-top: 123px;"></div>
        <div class="utf-small-footer margin-top-15">
            <div class="utf-small-footer-copyrights">Copyright 2020 All Rights Reserved.</div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
var room = 1;
function domaine_de_competence() {
 
    room++;
    var objTo = document.getElementById('domaine_de_competence')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "utf-submit-field removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-xl-12 col-md-12 col-sm-12"><div class="row"><div class="col-xl-6 col-md-10 col-sm-10 nopadding"><div class="utf-submit-field"><input type="text" class="utf-with-border" id="competences" name="competences[]" value="" placeholder="competence"></div></div><div class="col-xl-2 col-md-2 col-sm-2"><div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="remove_domaine_de_competence('+ room +');"> <span class="fa fa-trash" aria-hidden="true"></span> </button></div></div></div><div class="clear"></div></div>';
    
    objTo.appendChild(divtest)
}
   function remove_domaine_de_competence(rid) {
	   $('.removeclass'+rid).remove();
   } 
</script>
@endpush