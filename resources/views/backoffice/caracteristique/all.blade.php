@extends('layout.app')

@section('content')
    @include('partial.nav')
        
        <section class="container-fluid bg-dark mr-5 section myHeight2">
        
            <h1 class="text-center my-3 text-white">Tableau de Caractéristique</h1>
            
            <a class="btn btn-dark border text-white ms-3 my-2" href={{ route("caracteristique.create") }}><i class="fas fa-plus"></i></a>
    
            @if (session("message"))
                <div class="alert alert-success">
                    {{ session("message") }}
                </div>
            @endif
    
            <div class="container mt-4">
                <div class="row">
                    @foreach ($caracteristiques as $caracteristique)
                        <div class="col-lg-6 mt-5 px-4">
                            <div class="section2 text-white pt-5 p-4 d-flex justify-content-around">
                                <a href={{ route("caracteristique.edit", $caracteristique->id) }} class="triangle d-flex justify-content-center align-items-center"></a>
                                <i class="edit fas fa-ellipsis-h"></i>
                                <form action={{ route("caracteristique.destroy", $caracteristique->id) }} method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn border text-white delete mx-2" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                                <div>
                                    <h2 class="fw-bold">{{ $caracteristique->nom }}</h2>
                                    <p class="fs-1">{{ $caracteristique->chiffres }}</p>
                                </div>
                                <i class="fs-2">{!! $caracteristique->icone !!}</i>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>    


        <div>{{ $caracteristiques->links() }}</div>
           
    </section>

    @include('partial.footer')
@endsection