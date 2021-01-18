<!-- Intro Banner  -->
<div class="intro-banner" data-background-image="images/home-background-01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="utf-banner-headline-text-part">
                    <h3>Trouver un <span class="typed-words">Jobber</span> près de chez vous</h3>
                    <span>Que vous soyez une entreprise ou un particulier nous vous proposons des Jobbers a proximité 7j/7 24h/24.</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="margin-top-40 content-search-home content-search-home utf-intro-banner-search-form-block margin-top-40">
                    <form action="{{ route('recherche') }}" class="contact-form">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-3 col-md-3 col-sm-3">
                                    <i class="fa fa-search"></i>
                                    <input type="text" name="search" class="form-control" placeholder="Rechercher...">
                                </div>
                                <div class="col-xl-2 col-md-2 col-sm-2">
                                    <select name="ville" id="ville" class="form-control">
                                        <option value="0" selected> Ville</option>
                                        @foreach($villes as $key => $ville)
                                            <option value="{{ $ville->id }}"><span class="text">{{ $ville->libelle }}</span></option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-2 col-md-2 col-sm-2" id="communes">
                                    <select name="commune" id="commune" class="form-control">
                                        <option value="0" selected> Commune</option>
                                        @foreach($communes as $key => $commune)
                                            <option value="{{ $commune->id }}"><span class="text">{{ $commune->libelle }}</span></option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-md-3 col-sm-3">
                                    <select name="secteur" id="secteur" class="form-control">
                                        <option value="0" selected>Secteur d'activité</option>
                                        @foreach($secteurs as $key => $secteur)
                                            <option value="{{ $secteur->id }}"><span class="text">{{ $secteur->libelle }}</span></option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-2 col-md-2 col-sm-2">
                                    <div class="utf-intro-search-button">
                                        <button class="button ripple-effet">
                                            Rechercher
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <p class="utf-trending-silver-item">
                    <span class="utf-trending-black-item">Mots clés des emplois tendance:</span> 
                    Plombier, Electricien, Hôtesse, Vendeur(se), Menuisier, Gerant(e), Servante, Jardinier, Coiffeur(se)
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ul class="intro-stats margin-top-45 hide-under-992px">
                    <li><i class="fa fa-users" aria-hidden="true"></i> <sub class="counter_item"><strong class="counter">{{ $jobbers->count() }}</strong> <span>Utilisateurs</span></sub> </li>
                    <li><i class="fa fa-qrcode" aria-hidden="true"></i> <sub class="counter_item"><strong class="counter">{{ $secteurs->count() }}</strong> <span>Secteurs d'activites</span></sub> </li>
                    <li><i class="fa fa-eye"></i> <sub class="counter_item"><strong class="counter">{{ $visites }}</strong> <span>Visites</span></sub> </li>
                </ul>
            </div> 
        </div>
    </div>
    <div class="background-image-container" style="background-image: url(&quot;/images/logo/bg-header.png&quot;);"></div>
</div>
