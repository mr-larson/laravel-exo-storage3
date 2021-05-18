@extends('layout.app')

@section('content')
    @include('partial.nav')
        
    <section class="container mr-5">
        
        <h1 class="text-center text-white my-3">tableau de Portfolio</h1>
        <div class="d-flex justify-content-center">
            <img class="w-75  my-3 img-thumbnail show" src="{{ asset("img/" . $portfolio->image) }}" alt="">
        </div>
        
    </section>

    @include('partial.footer')
@endsection