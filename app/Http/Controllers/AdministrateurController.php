<?php

namespace App\Http\Controllers;

use App\Commune;
use App\User;
use App\Ville;
use App\Secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdministrateurController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Accueil";
        $data['users'] = User::where('typeuser_id', 2)->orderBy('created_at', 'DESC')->paginate(50);
        $data['vip'] = User::whereHas('souscriptions', function ($query){$query->where('etat', 1)->where('expire_at', '>=', now());})->count();
        $data['secteurs']  = Secteur::all();
        $data['villes']  = Ville::orderBy('libelle')->get();
        $data['communes']  = Commune::orderBy('libelle')->get();
        return view('admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit()
    {
        $data['title'] = "profil";
        $data['user'] = Auth::user();
        $data['villes'] =  Ville::orderBy('libelle','ASC')->get();
        $data['communes'] =  Commune::orderBy('libelle','ASC')->get();
        return view('admin.users.profil', $data);
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
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'contact' => 'required|numeric',
            'email' => 'required|string|email|max:255',
            'adresse' =>'required|string|max:255',
            'commune' => 'nullable|numeric',
            'ville' => 'required|numeric',
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
            $image->move( 'images/avatars', $imageName);
            $user->photo = $imageName;
        }

        $user->nom = htmlspecialchars($request->nom);
        $user->prenom = htmlspecialchars($request->prenom);
        $user->contact = htmlspecialchars($request->contact);
        $user->email = htmlspecialchars($request->email);
        $user->ville_id = htmlspecialchars($request->ville);
        $user->adresse = htmlspecialchars($request->adresse);
        $user->commune_id = $request->ville != 1? 0 : htmlspecialchars($request->commune);
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
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editpassword()
    {
        $data['menu'] =  "Password";
        $data['title'] = "Mot de passe";
        return view('admin.users.updatepassword', $data);
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
            session()->flash('type','alert-success');
            session()->flash('message','Mode passe modifié avec succès');
            return back();
        }

        session()->flash('type','alert-danger');
        session()->flash('message','Ancien mot de passe incorrecte');
        return back()->withInput($request->all());
    }
}
