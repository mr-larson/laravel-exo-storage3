@extends('layout.app')

@section('content')
    @include('partial.nav')
        
    <section class="container mr-5">
        
        <h1 class="text-center my-3">tableau de Services</h1>
        
        <a class="btn btn-secondary text-white my-2" href={{ route("service.create") }}>Create</a>

        @if (session("message"))
            <div class="alert alert-success">
                {{ session("message") }}
            </div>
        @endif

        <table class="table">
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
                                <a class="btn btn-secondary text-white" href={{ route("service.edit", $service->id) }}>Edit</a>
                                <form action={{ route("service.destroy", $service->id) }} method="POST">
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
        <div>{{ $services->links() }}</div>
           
    </section>

    @include('partial.footer')
@endsection