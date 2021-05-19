@extends('layout.app')

@section('content')
    @include('partial.nav')
        
    <section class="container-fluid bg-dark mr-5 section myHeight2">
        
        <h1 class="text-center my-3 text-white">Tableau de Services</h1>
        
        <a class="btn btn-dark border text-white ms-3 my-2" href={{ route("service.create") }}><i class="fas fa-plus"></i></a>

        @if (session("message"))
            <div class="alert alert-success">
                {{ session("message") }}
            </div>
        @endif

        {{-- <table class="table text-white">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Icone</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody class="col-6">
                @foreach ($services as $service)
                    <tr>
                        <th scope="row">{{ $service->id }}</th>
                        <td>{!! $service->icone !!}</td>
                        <td>{{ $service->titre }}</td>
                        <td>{{ $service->description }}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-dark text-white border" href={{ route("service.edit", $service->id) }}>Edit</a>
                                <form action={{ route("service.destroy", $service->id) }} method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger border text-white mx-2" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}

        <div class="container mt-4">
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-6 mt-5 px-4">
                        <div class="section2 text-white pt-5 p-4 d-flex justify-content-around">
                            <a href={{ route("service.edit", $service->id) }} class="triangle d-flex justify-content-center align-items-center"></a>
                            <i class="edit fas fa-ellipsis-h"></i>
                            <form action={{ route("service.destroy", $service->id) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn border text-white delete mx-2" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                            <div>
                                <h3 class="fw-bold">{{ $service->titre }}</h3>
                                <p>{{ $service->description }}</p>
                            </div>
                            <i class="fs-2">{!! $service->icone !!}</i>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div>{{ $services->links() }}</div>
           
    </section>

    @include('partial.footer')
@endsection