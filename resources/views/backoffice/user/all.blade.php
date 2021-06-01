@extends('layout.app')

@section('content')
    @include('partial.nav')
        
    {{-- <section class="container mr-5 section">
        
        
        <table class="table text-white">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">nom</th>
                <th scope="col">prenom</th>
                <th scope="col">age</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col">photo de profil</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="col-6">
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="w-25"> *** </td>
                        <td><a href=" {{ route('user.show', $user->id) }}"><img class="img-thumbnail col-4" src={{ asset("img/" . $user->photo) }} alt=""></td>
                        <td>
                            <div class="d-flex">
                                <form action="/user/{{ $user->id }}/download" method="POST">
                                    @csrf
                                    <button class="btn btn-dark text-white mx-2" type="submit">Download</button>
                                </form>
                                <a class="btn btn-dark text-white" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
        <div>{{ $users->links() }}</div>
    </section> --}}

    <section class="container-fluid bg-dark mr-5 section myHeight2">
        
        <h1 class="text-center my-3 text-white">Tableau de Users</h1>
        
        <a class="btn btn-dark border text-white ms-3 my-2" href={{ route("user.create") }}><i class="fas fa-plus"></i></a>

        @if (session("message"))
            <div class="alert alert-success">
                {{ session("message") }}
            </div>
        @endif

        <div class="container mt-4">
            <div class="row">
                @foreach ($users as $user)
                <div class="col-lg-12 mt-5 px-4 container ">
                    <div class="section3 text-white pt-5 p-3 row position-relative">
                            <a href={{ route('user.edit', $user->id) }} class="triangle d-flex justify-content-center align-items-center"></a>
                            <i class=" edit fas fa-ellipsis-h"></i>
                            <form action={{ route('user.destroy', $user->id) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn border text-white delete mx-2" type="submit"><i class="fas fa-trash"></i></button>
                            </form>

                            <form action="/user/{{ $user->id }}/download" method="POST">
                                @csrf
                                <button class="btn border text-white download mx-2" type="submit"><i class="fas fa-download"></i></button>
                            </form>
                            <div class="text-white col">
                                <h2 class="fw-bold text-decoration-none">{{ $user->nom }}{{ $user->prenom }}</h2>
                                <p>{{ $user->age }}</p>
                                <p class="text-decoration-none">{{ $user->email }}</p>
                            </div>
                            <a class="mb-5 d-inline-block col" href="{{ route('user.show', $user->id) }}"><img class="w-25" src={{ asset("img/" . $user->photo) }} alt=""></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    <div>{{ $users->links() }}</div>
       
</section>

    @include('partial.footer')
@endsection