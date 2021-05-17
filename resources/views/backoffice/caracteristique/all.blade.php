@extends('layout.app')

@section('content')
    @include('partial.nav')
        
    <section class="container mr-5">
        
        <h1 class="text-center my-3">tableau de Caractéristiques</h1>
        
        <a class="btn btn-secondary text-white my-2" href={{ route("caracteristique.create") }}>Create</a>

        @if (session("message"))
            <div class="alert alert-success">
                {{ session("message") }}
            </div>
        @endif

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">nom</th>
                <th scope="col">image</th>
                <th scope="col">categorie</th>
                <th scope="col">description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="col-6">
                @foreach ($caracteristiques as $caracteristique)
                    <tr>
                        <th scope="row">{{ $caracteristique->id }}</th>
                        <td>{{ $caracteristique->icone }}</td>
                        <td>{{ $caracteristique->chiffres }}</td>
                        <td>{{ $caracteristique->nom }}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-secondary text-white" href={{ route("caracteristique.edit") }}>Edit</a>
                                <form action={{ "caracteristique.destroy" }} method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger text-white mx-2" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{ $caracteristiques->links() }}</div>
           
    </section>

    @include('partial.footer')
@endsection