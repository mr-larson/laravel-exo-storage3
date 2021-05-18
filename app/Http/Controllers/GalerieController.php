<?php

namespace App\Http\Controllers;

use App\Models\Galerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeries = Galerie::paginate(2);
        $page = "galerie";
        return view("backoffice.galerie.all",compact("page", "galeries"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backoffice.galerie.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
	        'nom' => 'required|max:30',
	        'image' => 'required',
	        'description' => 'required|max:255',
	    ]);
        $galerie = new Galerie;
        $galerie->nom = $request->nom;
        $galerie->image = $request->file("image")->hashName();
        $galerie->description = $request->description;
        $galerie->created_at = now();   
 
        $galerie->save();
        $request->file('image')->storePublicly('img', 'public');
        return redirect()->route('galerie.index')->with('message', 'The success message!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galerie  $galerie
     * @return \Illuminate\Http\Response
     */
    public function show(Galerie $galerie)
    {
        
        $page = "galerie";
        return view('backoffice.galerie.show',compact('galerie',"page"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galerie  $galerie
     * @return \Illuminate\Http\Response
     */
    public function edit(Galerie $galerie)
    {
        $page = "galerie";
        return view("backoffice.galerie.edit", compact("galerie","page"));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galerie  $galerie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galerie $galerie)
    {
        $request->validate([
	        'nom' => 'required|max:30',
	        'image' => 'required',
	        'description' => 'required|max:255',
	    ]);

       $galerie->nom = $request->nom;
       Storage::disk('public')->delete('img/' . $galerie->image);
       $galerie->image = $request->file("image")->hashName();
       $galerie->description = $request->description;    
       $galerie->updated_at = now();   

       $galerie->save();
       $request->file('image')->storePublicly('img', 'public'); 
       return redirect()->route("galerie.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galerie  $galerie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galerie $galerie)
    {
        Storage::disk('public')->delete('img/' . $galerie->image);
        $galerie->delete();
        return redirect()->back(); 
    }

    public function download($id) {
        $galerie = Galerie::find($id);
        return Storage::disk("public")->download("img/" . $galerie->image);
    }
}
