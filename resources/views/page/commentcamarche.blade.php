@extends('layout.app')
@section('container')
    @include('layout._partials.title')

<div class="container content-page-">
    <div class="content-fct">
        <h2>Comment fonctionne Mon Jobber</h2>
            <b>01/01/2021</b>
        <p>
            <b>Mon Jobber</b> est la plateforme de travailleur qui permet de mettre en 
            relation des Jobbers (professionnels ou particuliers) partout en 
            Côte d'Ivoire avec des clients proposant leurs services pour des prestations 
            de bricolage, plomberie, déménagement, babystting mais aussi du jardinage, 
            des services à domicile...
        </p>
    </div>
    <div class="content-cmt-marche">
        <h2>Comment ça marche</h2>
        <p>
            D'un côté : des clients recherchant des personnes pour des jobs et 
            les services qu'ils souhaitent un coup de main (exemples : monter un meuble, 
            percer un mur, trouver de l'aide pour une déménagement etc...)
            De l'autre coté : un Jobber (prestataire de service particulier ou professionnel) 
            qui souhaite mettre à disposition ses compétences dans le but d'arrondir leurs fins de mois. 
            Il crée sont profil et y ajoute ses compétances, ses expériences, le prix minimum de la main d'oeuvre
        </p>
    </div>
    <div class="content-cmt-marche">
        <h2>Les différents étapes</h2>
        <div class="row">
            <div class="col-xl-4 cnt-cmt-mch-img text-center">
                <img src="https://easyjobber.fr/images/selected.png" alt="">
                <p>recherchez un jobber</p>
            </div>
            <div class="col-xl-4 cnt-cmt-mch-img text-center">
                <img src="https://easyjobber.fr/images/selectedpeople.png" alt="">
                <p>Choisissez le bon jobber</p>
            </div>
            <div class="col-xl-4 cnt-cmt-mch-img text-center">
                <img src="https://easyjobber.fr/images/getselected.png" alt="">
                <p>Et recevez les offres</p>
            </div>
        </div>
        <ul>
            <li> <span style="color:#ff8a00">1</span> - Je recherche un jobber pour mon travail ou service</li>
            <li> <span style="color:#ff8a00">3</span> - J'accepte ou je refuse le service</li>
            <li> <span style="color:#ff8a00">2</span> - Je sélectionne le Jobber</li>
            <li> <span style="color:#ff8a00">4</span> - Je paye le jobber (espèce, chèque, mobile money...)</li>
            <li> <span style="color:#ff8a00">5</span> - Je demande une note pour ma prestation au client</li>
        </ul>
    </div>
    <div class="content-cmt-marche">
        <h2>Gagnez de l'argent et arrondir ses fins de mois ?</h2>
        <p>
            Vous avez des compétences et du temps que vous souhaitez mettre à 
            disposition de nos clients. Devenez un jobber Monjobber et proposer 
            vos services aux membres de notre plateforme de jobbing. Inscrivez-vous 
            en quelques clics et renseignez votre profil afin d'attirer le maximum de clients. 
            Une fois votre profil sélectionné par un client vous serrez contactez
            par (adresse mail, téléphone...)
        </p>
    </div>
    <div class="content-cmt-marche">
        <h2>Une communauté exigeante</h2>
        <p>
            Monjobber souhaite la plus grande transparence avec sa communauté. 
            La confiance est l'outil indispensable pour la bonne tenue des services 
            proposés par les membres de la plateforme. Un système de notations et de 
            commentaires est à votre disposition afin d'évaluer les profils des jobbers. 
            Tout manque de respect des engagements passés lors d'un accord entre un client 
            et un jobber entraînera une suppression immédiate du profil utilisateur et 
            de sa poursuite en justice par les lois en vigeure.
        </p>
    </div>
</div>

@endsection