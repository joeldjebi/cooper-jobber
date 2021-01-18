<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Secteur;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * return login form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getloginform()
    {
        $data['title'] ='Connexion';
        $data['menu'] ='login';
        return view('auth.login',$data);
    }

    /**
     * connexion des utilisateurs
     * @param Request $request
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $data['email'] = htmlspecialchars($request->email);

        $user = auth()->attempt(['email'=> $data['email'], 'password'=> $request->password]);

        if(empty($user))
        {
            session()->flash('type','alert-danger');
            session()->flash('message','Merci de vérifier votre adresse email pour valider votre compte');
            return back();
        }

        return redirect()->route('accueil');
    }

    /**
     * fonction de déconnexion
     * @param Request $request
     */
    public function  logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('accueil');
    }

}
