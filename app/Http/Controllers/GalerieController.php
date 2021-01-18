<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;

class GalerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function galerie()
    {
        $data['title'] = "Galerie";
        return view('dashboard.galerie', $data);
    }


}