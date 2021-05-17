@extends('layout.app')

<div class="container">
    <h2 class="mt-3">Create Caractéristiques</h2>
    <form action={{ route("caracteristique.store") }} method="POST">
        @csrf

        <select name="icone" class="form-control">
            <option value="<i class='fab fa-500px'></i>">&#xf26e;</option>
        </select>
    
        <div class="form-group mt-5">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" class="form-control"  placeholder="Nom" name="nom">
        </div>

        <div class="form-group mt-2">
            <label for="exampleInputEmail1">Chiffres</label>
            <input type="number" class="form-control"  placeholder="Number" name="">
        </div>

        <button type="submit" class="btn btn-primary mt-5 text-light">Submit</button>

    </form>
</div>