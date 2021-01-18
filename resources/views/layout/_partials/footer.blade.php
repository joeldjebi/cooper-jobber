<div id="wha-icon">
    <a href="https://web.whatsapp.com/send?phone=+22558754664&text=Bonjour,">
        <img src="/images/logo/whatsapp-icon.svg" alt="AhatsApp Tchat">
    </a>
</div> 
<!-- Footer -->
<div id="footer">
    <div class="utf-footer-section-item-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-12">
                    <div class="utf-footer-item-links">
                        <a href="/"><img class="footer-logo" src="/images/logo/logo.png" alt="logo"></a>
                        <p>Copyright 2020 © <a href="/">monjobber.ci</a></p>
                        <p>Service client : <a href="tel:+22521006667">00225 58 75 46 62</a></p>
                        <a href="https://api.whatsapp.com/send?phone=0022558754662&text=urlencodedtext" target="_blank">WA</a>
                    </div>
                </div>

                <div class="col-xl-3 col-md-12 col-sm-12">
                    <div class="utf-footer-item-links">
                        <h3>A propos</h3>
                        <ul>
                            <li><a href="{{ route('commentcamarche') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>Comment ça marche ? </span></a></li>
                            <li><a href="{{ route('mentionlegal') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>Mentions légales </span></a></li>
                            <li><a href="{{ route('cgu') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>Conditions générales</span></a></li>
                            <li><a href="{{ route('booster') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>Booster mon profil</span></a></li>
                            <li><a href="{{ route('contact') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>Aide & FAQ</span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-md-12 col-sm-12">
                    <div class="utf-footer-item-links">
                        <h3>Nos catégories</h3>
                        <ul>
                            <li><a href="{{ route('home.secteurs') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>Toutes les catégories</span></a></li>
                            @foreach($fsecteurs as $fsecteur)
                            <li><a href="{{ route('secteurs.jobber', ['id' => $fsecteur->id, 'slug'=> str_slug($fsecteur->libelle)]) }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <span>{{$fsecteur->libelle}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-md-12 col-sm-12">
                    <div class="utf-footer-item-links item-links-rs">
                        <h3>Vous pouvez nous suivre</h3>
                        <ul>
                            <li><a href="/"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                            <li><a href="/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer / End -->
