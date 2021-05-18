@extends('layout.app')

@section('content')
    @include('partial.nav')
        
    <section class="container mr-5 section">
        
        <h1 class="text-center my-3 text-white">tableau de Caractéristiques</h1>
        
        <a class="btn btn-dark text-white my-2" href={{ route("caracteristique.create") }}>Create</a>

        @if (session("message"))
            <div class="alert alert-success">
                {{ session("message") }}
            </div>
        @endif

        <table class="table text-white">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Icone</th>
                <th scope="col">Chiffres</th>
                <th scope="col">Nom</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody class="col-6">
                @foreach ($caracteristiques as $caracteristique)
                    <tr>
                        <th scope="row">{{ $caracteristique->id }}</th>
                        <td>{!! $caracteristique->icone !!}</td>
                        <td>{{ $caracteristique->chiffres }}</td>
                        <td>{{ $caracteristique->nom }}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-dark text-white" href={{ route("caracteristique.edit", $caracteristique->id) }}>Edit</a>
                                <form action={{ route("caracteristique.destroy", $caracteristique->id) }} method="POST">
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