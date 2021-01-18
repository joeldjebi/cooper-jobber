<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Secteur;
use App\User;
use App\Ville;
use App\Commune;
use App\Forfait;
use App\Experience;
use App\GalerieJobber;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] ='Accueil';
        $data['menu'] ='Accueil';
        $data['secteurs'] = Secteur::orderBy('libelle','asc')->whereHas('users', function ($query){
            $query->where(['typeuser_id'=> 2, 'active_profile' => 1, 'validate_profile' => 1]);
        })->where('id','!=', 1)->get();
        $data['villes'] = Ville::orderBy('libelle','ASC')->get();
        $data['communes'] =  Commune::orderby('libelle','ASC')->get();
        $data['jobbers'] = User::where(['typeuser_id'=> 2, 'active_profile' => 1, 'validate_profile' => 1])->with('experiences','ville','commune')->has('experiences')->orderBy('nbvue','DESC')->get();
        $data['visites'] = $data['jobbers']->sum('nbvue');
        return view('index', $data);
    }

    /**
     * liste des secteurs d'activiters
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function secteur()
    {
        $data['title'] ='Liste des secteurs d\'activité';
        $data['menu'] ='Accueil';
        $data['secteurs'] = Secteur::orderBy('libelle','asc')->whereHas('users', function ($query){
            $query->where(['typeuser_id'=> 2, 'active_profile' => 1, 'validate_profile' => 1]);
        })->where('id','!=', 1)->paginate(11);
        return view('page.secteur', $data);
    }

    /**
     * liste des secteurs d'activiters
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $data['title'] ='À propos';
        $data['menu'] ='Accueil';
        return view('page.about', $data);
    }

    /**
     * liste des secteurs d'activiters
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function commentcamarche()
    {
        $data['title'] ='Comment ça marche';
        $data['menu'] ='Accueil';
        return view('page.commentcamarche', $data);
    }

    /**
     * liste des secteurs d'activiters
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mentionlegal()
    {
        $data['title'] ='Mentions légales';
        $data['menu'] ='Accueil';
        return view('page.mentionlegal', $data);
    }

    /**
     * liste des secteurs d'activiters
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function booster()
    {
        $data['title'] ='Options premium';
        $data['menu'] ='Accueil';
        return view('page.booster', $data);
    }

    /**
     * liste des secteurs d'activiters
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cgu()
    {
        $data['title'] ="Conditions Generales d'Utilisation";
        $data['menu'] ='Accueil';
        return view('page.cgu', $data);
    }

    /**
     * liste des utilisateurs par secteur
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */

    public function usersBySecteur($id)
    {
        $data['secteurs'] = Secteur::orderBy('libelle','asc')->whereHas('users', function ($query){
            $query->where(['typeuser_id'=> 2, 'active_profile' => 1, 'validate_profile' => 1]);
        })->where('id','!=', 1)->get();
        $id = htmlspecialchars($id);
        $secteur = $data['secteurs']->where('id', $id)->first();

        if(empty($secteur))
        {
            session()->flash('type','alert-danger');
            session()->flash('message','secteur d\'activité introuvable');
            return back();
        }

        $data['jobbers'] = User::where(['typeuser_id'=> 2, 'secteur_id' => $secteur->id, 'active_profile' => 1, 'validate_profile' => 1])->with('experiences','ville','commune')->has('experiences')->paginate(11);
        if(empty($data['jobbers']))
        {
            session()->flash('type','alert-danger');
            session()->flash('message','Aucun travailleur n\'est inscrit dans ce secteur activité pour le moment');
            return back();
        }
        $data['title'] = $secteur->libelle;
        $data["subtitle"] = 'secteur';
        $data['menu'] ='Accueil';
        return view('page.liste', $data);
    }

    /**
     * liste des jobber par secteur
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allJober()
    {
        $data['title'] ='Liste des Profils';
        $data['menu'] ='Accueil';
        $data['secteurs'] = Secteur::orderBy('libelle','asc')->whereHas('users', function ($query){
            $query->where(['typeuser_id'=> 2, 'active_profile' => 1, 'validate_profile' => 1]);
        })->where('id','!=', 1)->get();
        $data['jobbers'] = User::where(['typeuser_id'=> 2,'active_profile' => 1, 'validate_profile' => 1])->with('experiences','ville','commune')->has('experiences')->paginate(11);
        if(empty($data['jobbers']))
        {
            session()->flash('type','alert-danger');
            session()->flash('message','Aucun travailleur n\'est disponible pour le moment');
            return back();
        }
        return view('page.liste', $data);
    }

    /**
     * methode de recherche.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //dd($request->all());

        $ville = htmlspecialchars($request->ville);
        $comparateurVille = (isset($ville) && $ville != 0) ? '=':'!=';
        $commune = isset($request->commune) ? htmlspecialchars($request->commune):500;
        $comparateurCommune = ($ville == 1 && $commune != 500)? '=': '!=';
        $data['secteur'] = isset($request->secteur) && $request->secteur != 0 ? htmlspecialchars($request->secteur):1;
        $data['comparateurSecteur'] = $data['secteur'] != 1 && $data['secteur'] != 0  ? '=':'!=';
        $data['search'] = htmlspecialchars($request->search);
        $data['title'] ='Liste des Profils';
        $data['menu'] ='Accueil';
        $data['secteurs'] = Secteur::orderBy('libelle','asc')->where('id','!=', 1)->get();
        $data['jobbers'] = User::where(['typeuser_id'=> 2,'active_profile' => 1, 'validate_profile' => 1])
            ->where('ville_id', $comparateurVille, $ville)
            ->where('commune_id', $comparateurCommune, $commune)
            ->where('secteur_id', $data['comparateurSecteur'], $data['secteur'])
            ->whereHas('secteur', function ($q) use ($data){
                if(isset($data['search'])){
                    $q->where('libelle', 'LIKE', '%'.$data['search'].'%');
                }
                else{
                    $q->where('libelle', '!=', '');
                }
            })
            ->with('experiences','ville','commune')->has('experiences')->paginate(11);
        return view('page.liste', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function jobbervip()
    {
        $data['title'] ='Liste des Profils VIP';
        $data['menu'] ='Accueil';
        $data['secteurs'] = Secteur::orderBy('libelle','asc')->whereHas('users', function ($query){
            $query->where(['typeuser_id'=> 2, 'active_profile' => 1, 'validate_profile' => 1]);
        })->where('id','!=', 1)->get();
        $data['jobbers'] = User::where(['typeuser_id'=> 2, 'active_profile' => 1, 'validate_profile' => 1])->with('experiences','ville','commune')->has('experiences')->paginate(11);
        return view('page.liste', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] ='Profile de jobbers';
        $data['menu'] ='Accueil';
        $id = htmlspecialchars($id);

        $data['jobber'] = User::where(['typeuser_id'=> 2,'id' => $id])->with('experiences','ville','commune')->first();

        if(empty($data['jobber']))
        {
            session()->flash('type','alert-danger');
            session()->flash('message','Profil introuvable');
            return back();
        }
        $data['secteurs'] = Secteur::orderBy('libelle','asc')->whereHas('users', function ($query){
            $query->where(['typeuser_id'=> 2, 'active_profile' => 1, 'validate_profile' => 1]);
        })->where('id','!=', 1)->get();
        if($data['jobber']->active_profile == 1 && $data['jobber']->validate_profile == 1){

            $data['jobber']->nbvue = $data['jobber']->nbvue +1;
            $data['jobber']->save();
        }
        $data['galerie_jobbers'] = GalerieJobber::where('users_id', $id)->orderBy('order')->get();
        $data['jobbers'] = User::where(['typeuser_id'=> 2,'active_profile' => 1, 'validate_profile' => 1])->where('id','!=', $id)->with('experiences','ville','commune')->has('experiences')->orderBy('created_at','DESC')->get();
        return view('page.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        $data['title'] ='Contact';
        $data['menu'] ='Contact';
        return view('contact.contact', $data);
    }

    /**
     * contact depuis la page d'accueil
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function emailcontact(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sujet' => 'required|string|max:255',
            'email' => 'required|string|email',
            'message' => 'required|string',
        ]);

        $data['nom'] = htmlspecialchars($request->nom);
        $data['prenom'] = htmlspecialchars($request->prenom);
        $data['sujet'] = htmlspecialchars($request->sujet);
        $data['email'] = htmlspecialchars($request->email);
        $data['message'] = htmlspecialchars($request->message);

        //envoie de mail a l'utilisateur
        @mail('contact@jobber.com',$data['sujet'],$data['message']);

        session()->flash('type','alert-success');
        session()->flash('message','Votre message a été envoyer avec succès nou vous contacterons dans un bref délais merci de nous faire confiance');
        return back();
    }
}
