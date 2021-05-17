<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use Illuminate\Http\Request;

class CaracteristiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caracteristiques = Caracteristique::paginate(2);
        $page = 'caracteristique';
        return view('backoffice.caracteristique.all', compact('caracteristiques', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.caracteristique.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caracteristique = new Caracteristique();
        $caracteristique->icone = $request->icone;
        $caracteristique->chiffres = $request->chiffres;
        $caracteristique->nom = $request->nom;

        $caracteristique->created_at = now();

        $caracteristique->save();
        return redirect()->route('caracteristique.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caracteristique  $caracteristique
     * @return \Illuminate\Http\Response
     */
    // public function show(Caracteristique $caracteristique)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caracteristique  $caracteristique
     * @return \Illuminate\Http\Response
     */
    public function edit(Caracteristique $caracteristique)
    {
        return view('backoffice.caracteristique.edit', compact('caracteristique'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caracteristique  $caracteristique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caracteristique $caracteristique)
    {
        $caracteristique->icone = $request->icone;
        $caracteristique->chiffres = $request->chiffres;
        $caracteristique->nom = $request->nom;
        $caracteristique->updated_at = now();

        $caracteristique->save();
        return redirect()->route('caracteristique.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caracteristique  $caracteristique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caracteristique $caracteristique)
    {
        $caracteristique->delete();
        
        return redirect()->back();
    }
}
