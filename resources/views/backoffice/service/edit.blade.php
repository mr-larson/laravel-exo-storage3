@extends('layout.app')

<div class="container">
    <h2 class="mt-3">Create Services</h2>
    <ul class="bg-danger rounded">

        @foreach ($errors->all() as $message)
            <li class="text-white">{{ $message }}</li>
        @endforeach

    </ul>
    <form action={{ route("service.update", $service) }} method="POST">
        @csrf
        @method('PUT')
        <label class="mt-5" for="icone">
            icone :
        </label>
        <select name="icone" class="form-control fa">
            <option class="fa" value='<i class="fas fa-pencil-alt"></i>'>&#xf303; - Crayon</option>
            <option class="fa" value='<i class="fas fa-ad"></i>'>&#xf641; - Ad</option>
            <option class="fa" value='<i class="fas fa-address-card"></i>'>&#xf2bb; - Card</option>
            <option class="fa" value='<i class="fas fa-adjust"></i>'>&#xf042; - Circle</option>
            <option class="fa" value='<i class="fas fa-anchor"></i>'>&#xf13d; - Encre</option>
        </select>
        <label class="mt-2" for="titre">
            titre :
        </label>
        <div class="form-group">
            <input type="text" class="form-control"  placeholder="titre" name="titre">
        </div>

        <label class="mt-2" for="description">
            description :
        </label>
        <textarea name="description" cols="30" rows="3" class="form-control">

        </textarea>

        <button type="submit" class="btn btn-primary mt-5 text-light">Submit</button>

    </form>
</div>