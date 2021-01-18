@extends('layout.app')
@section('container')
    @include('layout._partials.title')
    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="utf-boxed-list-headline-item margin-bottom-35">
                    <h3><i class="icon-feather-map-pin"></i> FAQ</h3>
                </div>
                <div class="demo demo-accordion">
    
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        Comment demander l'intervention d'un jobber ?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    Il vous suffit de vous connecter sur la plateforme et de chercher 
                                    un jobber dans la categorie souhaiter.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        Quels sont les frais d'une annonce ?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    Easyjobber est une plateforme totalement gratuite, vous pouvez poster une annonce de job sans aucun frais ni aucune commission.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        Devenir un jobber et proposer mes services ?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    Rien de plus simple... Inscrivez-vous en quelques clics et devenez jobber.
                                </div>
                            </div>
                        </div>

                    </div><!-- panel-group -->
                    
                    
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">

                <div class="utf-boxed-list-headline-item margin-bottom-35">
                    <h3><i class="icon-feather-map-pin"></i> Contact & Adresse</h3>
                </div>
                <div class="utf-contact-location-info-aera margin-bottom-50">
                    <div class="contact-address">
                        <ul>
                            <li><strong>Contact : </strong> (+21) 124 123 4546</li>
                            <li><strong>E-Mail : </strong> contact@jobber.com</li>
                            <li><strong>Situation géographie : </strong> 3241, Lorem ipsum dolor sit amet, consectetur adipiscing elit Proin fermentum condimentum mauris.</li>
                        </ul>
                    </div>
                </div>
                <section id="contact" class="margin-bottom-50">
                    <div class="utf-boxed-list-headline-item margin-bottom-35">
                        <h3><i class="icon-material-outline-description"></i> Formulaire de Contact</h3>
                    </div>
                    <div class="utf-contact-form-item">
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        @if(session()->has("message"))
                            <div class="alert {{session()->get('type')}}">{{ session()->get('message') }}</div>
                        @endif
                        <form method="post" action="{{ route('contact.send') }}" name="contactform" id="contactform">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    @if($errors->has('nom'))
                                        <p class="alert alert-danger">
                                            <span class="fa fa-exclamation-triangle"></span>
                                            {{ $errors->first('nom') }}
                                        </p>
                                    @endif
                                    <div class="utf-no-border">
                                        <input class="utf-with-border" name="nom" type="text" id="firstname" placeholder="Votre nom" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if($errors->has('prenom'))
                                        <p class="alert alert-danger">
                                            <span class="fa fa-exclamation-triangle"></span>
                                            {{ $errors->first('prenom') }}
                                        </p>
                                    @endif
                                    <div class="utf-no-border">
                                        <input class="utf-with-border" name="prenom" type="text" id="lastname" placeholder="Votre prénom" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if($errors->has('email'))
                                        <p class="alert alert-danger">
                                            <span class="fa fa-exclamation-triangle"></span>
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                    <div class="utf-no-border">
                                        <input class="utf-with-border" name="email" type="email" id="email" placeholder="Votre addresse E-mail" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if($errors->has('sujet'))
                                        <p class="alert alert-danger">
                                            <span class="fa fa-exclamation-triangle"></span>
                                            {{ $errors->first('sujet') }}
                                        </p>
                                    @endif
                                    <div class="utf-no-border">
                                        <input class="utf-with-border" name="sujet" type="text" id="subject" placeholder="Sujet" required="">
                                    </div>
                                </div>
                            </div>
                            <div>
                                @if($errors->has('message'))
                                    <p class="alert alert-danger">
                                        <span class="fa fa-exclamation-triangle"></span>
                                        {{ $errors->first('message') }}
                                    </p>
                                @endif
                                <textarea class="utf-with-border" name="message" cols="40" rows="3" id="comments" placeholder="Message..." required=""></textarea>
                            </div>
                            <div class="utf-centered-button margin-top-10">
                                <input type="submit" class="submit button" id="submit" value="Envoyer">
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Container / End -->
@endsection

@push('scripts') 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon); 
</script>
@endpush