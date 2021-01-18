<?php

namespace App\Http\Controllers;

use App\Forfait;
use Illuminate\Http\Request;

class ForfaitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "forfaits";
        $data['forfaits'] = Forfait::orderBy('libelle')->paginate(50);
       return view('admin.forfaits.index', $data);
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
        $this->validate($request, [
            'libelle'=>'required',
            'prix'=>'required',
            'couleur'=>'required',
            'nombre_jours'=>'required|numeric',
        ]);
        $forfait = new Forfait;
        $forfait->libelle = htmlspecialchars($request->libelle);
        $forfait->prix = htmlspecialchars($request->prix);
        $forfait->couleur = htmlspecialchars($request->couleur);
        $forfait->nombre_jours = htmlspecialchars($request->nombre_jours);
        $forfait->save();
        session()->flash('type','success');
        session()->flash('message','Forfait ajouté avec succès');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forfait  $forfait
     * @return \Illuminate\Http\Response
     */
    public function show(Forfait $forfait)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forfait  $forfait
     * @return \Illuminate\Http\Response
     */
    public function edit(Forfait $forfait)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forfait  $forfait
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'libelle'=>'required',
            'prix'=>'required',
            'couleur'=>'required',
            'nombre_jours'=>'required|numeric',
        ]);
        $id = htmlspecialchars($id);
        $forfait =  Forfait::find($id);
        if(empty($forfait))
        {
            session()->flash('type','error');
            session()->flash('message','erreur forfait introuvable');
            return back();
        }
        $forfait->libelle = htmlspecialchars($request->libelle);
        $forfait->prix = htmlspecialchars($request->prix);
        $forfait->couleur = htmlspecialchars($request->couleur);
        $forfait->nombre_jours = htmlspecialchars($request->nombre_jours);
        $forfait->save();
        session()->flash('type','success');
        session()->flash('message','Forfait ajouté avec succès');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forfait  $forfait
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = htmlspecialchars($id);
        $forfait =  Forfait::find($id);
        if(empty($forfait))
        {
            session()->flash('type','error');
            session()->flash('message','erreur forfait introuvable');
            return back();
        }
        $forfait->delete();
        session()->flash('type','success');
        session()->flash('message','Forfait supprimé avec succès');
        return back();
    }
}
