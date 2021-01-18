<div class="col-xl-3 col-lg-4">
    <div class="utf-sidebar-container-aera">
        
        <form action="{{ route('recherche') }}" method="GET">
            <div class="utf-sidebar-widget-item">
                <h3>Secteur d'activés</h3>
                <select class="form-control selct-form" name="secteur" data-live-search="true" data-selected-text-format="count" data-size="7" title="Secteur d'activiter">
                    @foreach($secteurs as $secteur)
                        <option value="{{ $secteur->id }}" @if(request()->input('secteur') == $secteur->id) selected @endif>{{ $secteur->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="utf-sidebar-widget-item">
                <h3>Rechercher des mots-clés</h3>
                <div class="utf-input-with-icon">
                    <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Rechercher...">
                    <i  class="fa fa-search"></i>
                </div>
            </div>
            
            <div class="clearfix"></div>
        </form>
        <div class="utf-sidebar-widget-item">
            <div class="utf-quote-box utf-jobs-listing-utf-quote-box">
                <div class="utf-quote-info">
                    <h4>Make a Difference with Online Resume!</h4>
                    <p>Your Resume in Minutes with Jobs Resume Assistant is Ready!</p>
                    <div class="text-center">
                        <a href="{{ route('user.register') }}" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">Inscrivez-vous<i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
