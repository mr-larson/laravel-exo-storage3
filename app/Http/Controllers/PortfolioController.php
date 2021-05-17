<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::paginate(2);
        $page = 'portfolio';

        return view('backoffice.portfolio.all', compact('page', 'portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.portfolio.create');
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
            'nom'=>"required|max:30",
            'image'=>"required",
            'categorie'=>"required|max:50",
            'description'=>"required|max:255",
        ]);

        $portfolio = new Portfolio();

        $portfolio->nom = $request->nom;
        $portfolio->image = $request->file("image")->hashName();
        $portfolio->categorie = $request->categorie;
        $portfolio->description = $request->description;
        $portfolio->created_at = now();

        $portfolio->save();
        $request->file("image")->storePublicly("img", "public");
        return redirect()->route('portfolio.index')->with("message", "Succès message");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        $portfolios = Portfolio::all();
        $page = 'portfolio';

        return view("backoffice.portfolio.show", compact('portfolios', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        $page = 'portfolio';
        return view('backoffice.portfolio.edit', compact('portfolio', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'nom'=>"required|max:30",
            'image'=>"required",
            'categorie'=>"required|max:50",
            'description'=>"required|max:255",
        ]);

        $portfolio->nom = $request->nom;
        $portfolio->image = $request->file("image")->hashName();
        $portfolio->categorie = $request->categorie;
        $portfolio->description = $request->description;
        $portfolio->created_at = now();

        $portfolio->save();
        $request->file("image")->storePublicly("img", "public");
        return redirect()->route('portfolio.index')->with("message", "Succès message");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        Storage::disk("public")->delete("img/" . $portfolio->image);
        $portfolio->delete();
        return redirect()->back();
    }
}
