<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(2);
        $page = "user";

        return view("backoffice.user.all",compact("users","page"));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backoffice.user.create");
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
	        'prenom' => 'required|max:30',
            'age' => 'required|integer',
	        'email' => 'required|unique:users',
            'password' => 'required',
            'photo' => 'required'
	    ]);
        $user = new User;

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->age = $request->age;   
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->photo = $request->file('photo')->hashName(); 
        $user->updated_at = now();   
 
        $user->save();
        $request->file('photo')->storePublicly('img', 'public');
 
        return redirect()->route('user.index')->with('message', 'The success message!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $page = "user";
        return view('backoffice.user.show',compact('user','page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $page = "user";
        return view("backoffice.user.edit", compact("user","page")); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
	        'nom' => 'required|max:30',
	        'prenom' => 'required|max:30',
            'age' => 'required|integer',
	        'email' => 'required',
            'password' => 'required',
            'photo' => 'required'
	    ]);
       
       $user->nom = $request->nom;
       $user->prenom = $request->prenom;
       $user->age = $request->age;   
       $user->email = $request->email;
       $user->password = $request->password;
       $user->photo = $request->file("photo")->hashName();
       $user->updated_at = now();   

       $user->save();
       $request->file('photo')->storePublicly('img', 'public');

       return redirect()->route("user.index")->with('message', 'The success message!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::disk("public")->delete("img/" . $user->image);
        $user->delete();
        return redirect()->back();
    }

    public function download($id) {
        $user = User::find($id);
        return Storage::disk("public")->download("img/" . $user->photo);
    }
}
