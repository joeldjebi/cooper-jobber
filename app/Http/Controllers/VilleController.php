<?php

namespace App\Http\Controllers;

use App\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "villes";
        $data['villes'] = Ville::orderBy('libelle')->paginate(50);
        return view('admin.villes.index',$data);
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
        $this->validate($request, ['libelle' => 'required']);
        $libelle = htmlspecialchars($request->libelle);
        $ville = new Ville;
        $ville->libelle = $libelle;
        $ville->save();
        session()->flash('type','success');
        session()->flash('mssage','ville créé avec succès');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function show(Ville $ville)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function edit(Ville $ville)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $id = htmlspecialchars($id);
        $this->validate($request, ['libelle' => "required"]);
        $ville = Ville::find($id);

        if(empty($ville))
        {
            session()->flash('type','error');
            session()->flash('mssage','Erreur ville introuvable');
            return back();
        }

        $ville->libelle = htmlspecialchars($request->libelle);
        $ville->save();
        session()->flash('type','success');
        session()->flash('mssage','ville modifié avec succès');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = htmlspecialchars($id);
        $ville = Ville::find($id);

        if(empty($ville))
        {
            session()->flash('type','error');
            session()->flash('mssage','Erreur ville introuvable');
            return back();
        }
        $ville->communes()->delete();
        $ville->delete();
        session()->flash('type','success');
        session()->flash('mssage','ville supprimé avec succès');
        return back();
    }
}
