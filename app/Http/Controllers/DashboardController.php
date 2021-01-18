<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Secteur;
use App\Ville;
use App\Commune;
use App\GalerieJobber;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * call the middleware auth in this controller
     */
    public function __constructor()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['menu'] = "Dashboard";
        $data['user'] = Auth::user();
        return view('dashboard.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        $data['title'] = "Profil";
        $data['menu'] = "Profil";
        $data["user"] = User::where('id', Auth::user()->id)->first();
        $data['secteurs'] = Secteur::orderBy('libelle','ASC')->where('id','!=', 1)->get();
        $data['villes'] = Ville::orderBy('libelle','ASC')->get();
        $data['communes'] = Commune::orderBy('libelle','ASC')->get();
        return view('dashboard.profil',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        //dd($request);
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'secteur' => 'required|numeric',
            'contact' => 'required|numeric',
            'email' => 'required|string|email|max:255',
            'adresse' =>'required|string|max:255',
            'commune' => 'nullable|numeric',
            'ville' => 'required|numeric',
            'minprix' => 'required|numeric',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user)){
            session()->flash('type','alert-danger');
            session()->flash('message','Utilisateur introuvable');
            return back()->withInput($request->all());
        }

        //qjout d'avatar
        if($request->hasFile('avatar'))
        {
            $image = $request->file('avatar');
            $imageName = 'avatar-'.time().'.'.$image->getClientOriginalExtension();
            $image->move('images/avatars', $imageName);
            $user->photo = $imageName;
        }

        //ajout de piece recto
        if($request->hasFile('piecerecto'))
        {
            $image = $request->file('piecerecto');
            $imageName = 'piece-recto-'.time().'.'.$image->getClientOriginalExtension();
            $image->move( 'images/documents', $imageName);
            $user->photo_piece_recto = $imageName;
        }

        //ajout de piece verso
        if($request->hasFile('pieceverso'))
        {
            $image = $request->file('pieceverso');
            $imageName = 'piece-verso-'.time().'.'.$image->getClientOriginalExtension();
            $image->move( 'images/documents', $imageName);
            $user->photo_piece_verso = $imageName;
        }

        $user->nom = htmlspecialchars($request->nom);
        $user->prenom = htmlspecialchars($request->prenom);
        $user->contact = htmlspecialchars($request->contact);
        $user->email = htmlspecialchars($request->email);
        $user->prix_min = htmlspecialchars($request->minprix);
        $user->ville_id = htmlspecialchars($request->ville);
        $user->adresse = htmlspecialchars($request->adresse);
        $user->secteur_id = Auth::user()->typeuser_id == 3? 1 : htmlspecialchars($request->secteur);
        $user->commune_id = $request->ville != 1? null : htmlspecialchars($request->commune);
        $user->save();

        session()->flash('type','alert-success');
        session()->flash('message','Profil Mise à jour avec succès');
        return back();
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
     * la liste des experience de l'utilisateur connecté
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function experiences()
    {
        $data['menu'] =  "Experience";
        $data['title'] = "Experience";
        $data['experiences'] = Experience::where('user_id', Auth::user()->id)->orderBy('date_debut','desc')->get();
        return view('dashboard.experiences', $data);

    }


    /**
     * ajouter des experiences utilisateurs
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createxperience(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'competences' => 'required|array',
            'datedebut' => 'required|date',
            'datefin' => 'nullable|date',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user)){
            session()->flash('type','alert-danger');
            session()->flash('message','Utilisateur introuvable');
            return back()->withInput($request->all());
        }

        $experience = new Experience();

        //verification et ajout du diplome
        if($request->hasFile('diplome'))
        {
            $diplome = $request->file('diplome');
            $diplomeName = 'diplome-'.time().'.'.$diplome->getClientOriginalExtension();
            $diplome->move( 'images/documents', $diplomeName);
            $experience->diplome = $diplomeName;
        }

        $competences = "";
        foreach ($request->competences as $key => $value) {
            if ($key == 0) {
                $competences .= $value;
            }else{
                $competences .= ";$value";
            }
            
        }

        $experience->libelle =  htmlspecialchars($request->libelle);
        $experience->description =  htmlspecialchars($request->description);
        $experience->competences =  htmlspecialchars($competences);

        $experience->date_debut =  htmlspecialchars($request->datedebut);
        $experience->date_fin =  htmlspecialchars($request->datefin);
        $experience->user_id =  $user->id;
        $experience->save();

        //ajouter avec success
        session()->flash('type','alert-success');
        session()->flash('message','Expérience ajouté avec succès');
        return back();
    }


    /**
     * update expériences
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateexperiences(Request $request, $id)
    {
        $id = htmlspecialchars($id);
        $request->validate([
            'lib' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'competences' => 'required|array',
            'dated' => 'required|date',
            'datef' => 'nullable|date',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user)){
            session()->flash('type','alert-danger');
            session()->flash('message','Utilisateur introuvable');
            return back()->withInput($request->all());
        }

        $experience =  Experience::where(['id' => $id, 'user_id' => $user->id])->first();

        if(empty($experience)){
            session()->flash('type','alert-danger');
            session()->flash('message','Expériences introuvable');
            return back()->withInput($request->all());
        }

        //verification et ajout du diplome
        if($request->hasFile('diplo'))
        {
            $diplome = $request->file('diplo');
            $diplomeName = 'diplome-'.time().'.'.$diplome->getClientOriginalExtension();
            $diplome->move( 'images/documents', $diplomeName);
            $experience->diplome = $diplomeName;
        }

        $competences = "";
        foreach ($request->competences as $key => $value) {
            if ($key == 0) {
                $competences .= $value;
            }else{
                $competences .= ";$value";
            }
            
        }

        $experience->libelle =  htmlspecialchars($request->lib);
        $experience->description =  htmlspecialchars($request->desc);
        $experience->competences =  htmlspecialchars($competences);
        $experience->date_debut =  htmlspecialchars($request->dated);
        $experience->date_fin =  htmlspecialchars($request->datef);
        $experience->user_id =  $user->id;
        $experience->save();

        //Modifié avec success
        session()->flash('type','alert-success');
        session()->flash('message','Expérience Modifié avec succès');
        return back();

    }


    /**
     * supprimer une experiences
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteexperiences($id)
    {
        $id = htmlspecialchars($id);
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user)){
            session()->flash('type','alert-danger');
            session()->flash('message','Utilisateur introuvable');
            return back();
        }

        $experience =  Experience::where(['id' => $id, 'user_id' => $user->id])->first();

        if(empty($experience)){
            session()->flash('type','alert-danger');
            session()->flash('message','Expériences introuvable');
            return back();
        }

        $experience->delete();
        session()->flash('type','alert-success');
        session()->flash('message','Expériences supprimé avec succès');
        return back();
    }


    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editpassword()
    {
        $data['menu'] =  "Password";
        $data['title'] = "Mot de passe";
        return view('dashboard.updatepassword', $data);
    }

    /**
     * mise à jour du mot de passe
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatepassword(Request $request)
    {
        $request->validate([
            'lastpassword' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'password_confirmed' => 'required',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        if(empty($user)){
            session()->flash('type','alert-danger');
            session()->flash('message','Utilisateur introuvable');
            return back()->withInput($request->all());
        }

        if(Hash::check($request->lastpassword, $user->password))
        {
            $user->password = Hash::make($request->password);
            $user->save();
            session()->flash('type','success');
            session()->flash('message','Mode passe modifié avec succès');
            return back();
        }

        session()->flash('type','error');
        session()->flash('message','Ancien mot de passe incorrecte');
        return back()->withInput($request->all());
    }

    /**
     * activation de profil
     * @return \Illuminate\Http\RedirectResponse
     */
    public function visibilite()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->active_profile = $user->active_profile == 0 ? 1 : 0;
        $user->save();

        //dd($user);
        session()->flash('type','success');
        if($user->active_profile == 0){
            session()->flash('message','Votre profil a été désactivé avec succes');
        }
        else{
            session()->flash('message','Votre profil a été activé avec succes');
        }
        return back();
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function galerie_jobber()
    {
        $data['galerie_jobbers'] = GalerieJobber::where('users_id', Auth::user()->id)->orderBy('order')->get();
        $data['title'] = "Galerie";
        return view('dashboard.galerie', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_galerie_jobber(Request $request)
    {
        $this->validate($request, [
            'files' => 'required|array',
        ]);

        foreach($request->all()['files'] as $key => $image){
            
            if(is_file($image))
            {
                $imageName = 'galerie-'.time().'.'.$image->getClientOriginalExtension();
                $image->move( 'images/galerie_jobber', $imageName);

                GalerieJobber::create([
                    'users_id'=> Auth::user()->id,
                    'url' => $imageName,
                    'order' => $key + 1,
                ]);
            }

        }
        
        session()->flash("type","success");
        session()->flash("message","Galerie créé avec succès");
        return back();

    }
}
