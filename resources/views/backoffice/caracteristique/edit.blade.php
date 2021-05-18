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
            <option class="fa" value='<i class="fas fa-pencil-alt"></i>'>&#xf303; - Crayon</option>
            <option class="fa" value='<i class="fas fa-ad"></i>'>&#xf641; - Ad</option>
            <option class="fa" value='<i class="fas fa-address-card"></i>'>&#xf2bb; - Card</option>
            <option class="fa" value='<i class="fas fa-adjust"></i>'>&#xf042; - Circle</option>
            <option class="fa" value='<i class="fas fa-anchor"></i>'>&#xf13d; - Encre</option>
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