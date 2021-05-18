@extends('layout.app')

@section('content')
    @include('partial.nav')
        
    <section class="container mr-5">
        
        <h1 class="text-center my-3">tableau de Galeries</h1>
        
        <a class="btn btn-secondary text-white my-2" href="/galerie/create">Create</a>

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
                <th scope="col">description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="col-6">
                @foreach ($galeries as $galerie)
                    <tr>
                        <th scope="row">{{ $galerie->id }}</th>
                        <td> <a href=" {{ route('galerie.show', $galerie->id) }}">{{ $galerie->nom }}</a></td>
                        <td class="w-25"><img class="img-thumbnail col-4" src="{{ asset("img/" . $galerie->image) }}" alt=""></td>
                        <td>{{ $galerie->description }}</td>
                        <td>
                            <div class="d-flex">
                                <form action="/galerie/{{ $galerie->id }}/download" method="POST">
                                    @csrf
                                    <button class="btn btn-warning text-white mx-2" type="submit">Download</button>
                                </form>
                                <a class="btn btn-secondary text-white" href="{{route('galerie.edit',$galerie->id) }}">Edit</a>
                                <form action="{{ route('galerie.destroy',$galerie->id) }}" method="POST">
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
        <div>{{ $galeries->links() }}</div>
           
    </section>

    @include('partial.footer')
@endsection