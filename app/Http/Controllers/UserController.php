<?php

namespace App\Http\Controllers;

use App\TypeUser;
use App\User;
use App\Secteur;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $data['title'] = "utilisateurs";
        $data['typeusers'] = TypeUser::orderBy('libelle')->get();
        $data['secteurs'] = Secteur::orderBy('libelle')->get();
        $data['users'] = User::orderBy('created_at','DESC')->paginate(50);
        return view('admin.users.index', $data);
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
        $id = htmlspecialchars($id);
        $user = User::find($id);

        if(empty($user)) {
            session()->flash('type','error');
            session()->flash('message','Erreur Utilisateurs introuvable');
            return back();
        }
        $experinces = $user->experiences()->get();
        $notes = $user->notes()->get();
        foreach ($experinces as $experince) {
            $experince->delete();
        }

        foreach ($notes as $note) {
            $note->delete();
        }

        $note->delete();
        session()->flash('type','success');
        session()->flash('message','Utilisateurs supprimé avec succès');
        return redirect()->route('users');
    }

    /**
     * activation et désactivation de l'utilisateur
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatestate($id)
    {
        $id = htmlspecialchars($id);
        $user = User::find($id);
        if(empty($user)) {
            session()->flash('type','error');
            session()->flash('message','Erreur Utilisateurs introuvable');
            return back();
        }
        $user->validate_profile = $user->validate_profile == 0 ? 1 : 0;
        $user->save();
        session()->flash('type','success');
        if($user->validate_profile == 0)
        {
            session()->flash('message','Utilisateurs Désactivé avec succès');
        }
        else
        {
            session()->flash('message','Utilisateurs activé avec succès');
        }
        return redirect()->route('users');
    }

    public function search(Request $request)
    {
        //dd($request);
        $nom = htmlspecialchars($request->nom);
        $prenom = htmlspecialchars($request->prenom);
        $telephone = htmlspecialchars($request->telephone);
        $comparateurtelephone = empty($telephone)? "!=":"=";
        $secteur = htmlspecialchars($request->secteur);
        $comparateursecteur = empty($secteur)? "!=":"=";
        $datefin = empty($request->datefin) ? htmlspecialchars($request->datefin): date('Y-m-01 00:00:00');
        $datedebut = empty($request->datedebut) ? htmlspecialchars($request->datedebut): now();

        $data['users'] = User::orwhere('nom','like','%'.$nom.'%')->orwhere('prenom','like','%'.$prenom.'%')
            ->orwhere('secteur_id',$comparateursecteur, $secteur )->orwhere('contact',$comparateurtelephone,$telephone)
            ->whereBetween('created_at',[$datefin, $datedebut])
        ->orderBy('created_at','DESC')->paginate(50);
        $data['title'] = "utilisateurs";
        $data['typeusers'] = TypeUser::orderBy('libelle')->get();
        $data['secteurs'] = Secteur::orderBy('libelle')->get();
        return view('admin.users.index', $data);

    }
}
