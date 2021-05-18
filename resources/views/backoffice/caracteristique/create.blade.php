@extends('layout.app')

<div class="container">
    <h2 class="mt-3">Create Caractéristiques</h2>

    
    <form action={{ route("caracteristique.store") }} method="POST">
        @csrf
        <label class="mt-5" for="icone">
            Icone :
        </label>
        <select name="icone" class="form-control fa">
            <option class="fa" value='<i class="fab fa-facebook-f"></i>'>facebook</option>
        </select>
        <label class="mt-2" for="icone">
            Nom :
        </label>
        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Nom" name="nom">
        </div>

        <label class="mt-2" for="icone">
            Chiffres :
        </label>
        <div class="form-group">
            <input type="number" class="form-control"  placeholder="Number" name="chiffres">
        </div>

        <button type="submit" class="btn btn-primary mt-5 text-light">Submit</button>

    </form>
</div>