<?php

namespace App\Http\Controllers;

use App\Commune;
use App\Ville;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "communes";
        $data['communes'] = Commune::orderBy('libelle')->paginate(50);
        $data['villes'] = Ville::orderBy('libelle')->get();
        return view('admin.communes.index', $data);

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
            "ville" => "required|numeric",
            "libelle" => "required",
            ]);

        $villeid = htmlspecialchars($request->ville);
        $libelle = htmlspecialchars($request->libelle);
        $ville = Ville::find($villeid);

        if(empty($ville))
        {
            session()->flash('type','error');
            session()->flash('message','Erreur ville introuvable');
            return back();
        }

        $commune = new Commune;

        $commune->libelle = $libelle;
        $commune->ville_id = $villeid;
        $commune->save();
        session()->flash('type','success');
        session()->flash('message','Commune ajouté avec succès');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function show(Commune $commune)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commune  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = htmlspecialchars($id);
        $data['commune'] = Commune::find($id);
        if($data['commune'])
        {
            session()->flash('type','error');
            session()->flash('message','Erreur commune introuvable');
            return back();
        }

        return view('admin.communes.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            "ville" => "required|numeric",
            "libelle" => "required",
        ]);

        $id = htmlspecialchars($id);
        $villeid = htmlspecialchars($request->ville);
        $libelle = htmlspecialchars($request->libelle);
        $ville = Ville::find($villeid);
        $commune = Commune::find($id);
        if(empty($ville))
        {
            session()->flash('type','error');
            session()->flash('message','Erreur ville introuvable');
            return back();
        }

        if(empty($commune))
        {
            session()->flash('type','error');
            session()->flash('message','Erreur commune introuvable');
            return back();
        }

        $commune->libelle = $libelle;
        $commune->ville_id = $villeid;
        $commune->save();
        session()->flash('type','success');
        session()->flash('message','Commune modifié avec succès');
        return redirect()->route('communes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = htmlspecialchars($id);
        $data['commune'] = Commune::find($id);
        if($data['commune'])
        {
            session()->flash('type','error');
            session()->flash('message','Erreur commune introuvable');
            return back();
        }
        $data['commune']->delete();
        session()->flash('type','success');
        session()->flash('message','Commune modifié avec succès');
        return redirect()->route('communes');
    }
}
