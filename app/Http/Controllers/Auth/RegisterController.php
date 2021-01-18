<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Secteur;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * return the register view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        $data['title'] ='Inscriptions';
        $data['menu'] ='register';
        $data['secteurs'] = Secteur::orderBy('libelle','asc')->where('id','!=', 1)->get();
        return view('auth.register',$data);
    }

    /**
     * creation de compte
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function  createAccount(Request $request){
        $request->validate([
            'accounttype' => 'required|numeric|min:2',
            'secteur' => 'required|numeric',
            'name' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'numero' => 'required|numeric',
            'iswhatsapp' => 'nullable',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User;
        $user->nom = htmlspecialchars($request->name);
        $user->prenom = htmlspecialchars($request->prenoms);
        $user->contact = htmlspecialchars($request->numero);
        $user->iswhatsapp =  isset($request->iswhatsapp) ? true: false;
        $user->email = htmlspecialchars($request->email);
        $user->password = Hash::make($request->password);
        $user->secteur_id = $request->accounttype == 3? 1 : htmlspecialchars($request->secteur);
        $user->typeuser_id = htmlspecialchars($request->accounttype);

        if($user->save())
        {
            session()->flash('type','alert-success');
            session()->flash('message','Votre compte a été créé avec success');
            return redirect()->route('user.register');
        }
        session()->flash('type','alert-danger');
        session()->flash('message','Une erreur est survenu lors de la création de votre compte merci de reésseyer');
        return back();
    }
}
