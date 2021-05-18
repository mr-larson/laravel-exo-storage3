@extends('layout.app')

<div class="container">
    <h2 class="mt-3">Edit Caractéristiques</h2>
    <form method="POST" action={{ route("caracteristique.update", $caracteristique->id) }}>
        @csrf
        @method('PUT')
        <label class="mt-5" for="icone">
            Icone :
        </label>
        <select name="icone" class="form-control fa">
            <option class="fa" value='<i class="fab fa-facebook-f"></i>'>&#xf26e;</option>
        </select>
        <label class="mt-2" for="icone">
            Nom :
        </label>
        <div class="form-group">
            <input type="text" class="form-control" value={{ $caracteristique->nom }}  placeholder={{ $caracteristique->nom }} name="nom">
        </div>

        <label class="mt-2" for="icone">
            Chiffres :
        </label>
        <div class="form-group">
            <input type="number" class="form-control" value={{ $caracteristique->chiffres }} placeholder={{ $caracteristique->chiffres }} name="chiffres">
        </div>

        <button type="submit" class="btn btn-primary mt-5 text-light">Submit</button>

    </form>
</div>