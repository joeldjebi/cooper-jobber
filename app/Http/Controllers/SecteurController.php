<?php

namespace App\Http\Controllers;

use App\Secteur;
use Illuminate\Http\Request;

class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "secteurs";
        $data['secteurs'] = Secteur::where('id', '!=', 1)->orderBy('libelle')->paginate(50);
        return view('admin.secteurs.index', $data);
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
                'libelle' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'image' => 'required',
            ]);

        $secteur = new Secteur;

        $secteur->libelle = htmlspecialchars($request->libelle);
        $secteur->description = htmlspecialchars($request->description);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = 'logo-'.time().'.'.$image->getClientOriginalExtension();
            $image->move( 'images/logo', $imageName);
            $secteur->image = $imageName;
        }

        $secteur->save();
        session()->flash("type","success");
        session()->flash("message","Seccteur d'activité créé avec succès");
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function show(Secteur $secteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Secteur $secteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = htmlspecialchars($id);
        $this->validate($request, [
            'libelle' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $secteur =  Secteur::find($id);
        if(empty($secteur))
        {
            session()->flash("type","error");
            session()->flash("message","Erreur secteur d'activité introuvable");
            return back();
        }
        $secteur->libelle = htmlspecialchars($request->libelle);
        $secteur->description = htmlspecialchars($request->description);

        if($request->hasFile('image_update'))
        {
            $image = $request->file('image_update');
            $imageName = 'logo-'.time().'.'.$image->getClientOriginalExtension();
            $image->move( 'images/logo', $imageName);
            $secteur->image = $imageName;
        }

        $secteur->save();
        session()->flash("type","success");
        session()->flash("message","Secteur d'activité créé avec succès");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $secteur =  Secteur::find($id);
        if(empty($secteur))
        {
            session()->flash("type","error");
            session()->flash("message","Erreur secteur d'activité introuvable");
            return back();
        }
        unlink('images/logo/'.$secteur->image);
        $secteur->delete();
        session()->flash("type","success");
        session()->flash("message","Secteur d'activité supprimé avec succès");
        return back();
    }
}
