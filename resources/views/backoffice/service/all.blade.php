@extends('layout.app')

@section('content')
    @include('partial.nav')
        
    <section class="container-fluid bg-dark mr-5 section myHeight2">
        
        <h1 class="text-center my-3 text-white">Tableau de Services</h1>
        
        <a class="btn btn-dark border text-white ms-3 my-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href={{ route("service.create") }}><i class="fas fa-plus"></i></a>
        <!-- Modal Create-->
        <div class="modal fade myModalBG" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content myModal">
                <div class="modal-header">
                    <h5 class="modal-title text-white text-center" id="staticBackdropLabel">Create Services</h5>
                </div>
                <div class="modal-body">
                    
                    <form action={{ route("service.store") }} method="POST">
                        @csrf
                        <label class="mt-5 text-white myTitle" for="icone">
                            icone :
                        </label>
                        <select name="icone" class="form-control fa">
                            <option class="fa" value='<i class="fas fa-pencil-alt"></i>'>&#xf303; - Crayon</option>
                            <option class="fa" value='<i class="fas fa-ad"></i>'>&#xf641; - Ad</option>
                            <option class="fa" value='<i class="fas fa-address-card"></i>'>&#xf2bb; - Card</option>
                            <option class="fa" value='<i class="fas fa-adjust"></i>'>&#xf042; - Circle</option>
                            <option class="fa" value='<i class="fas fa-anchor"></i>'>&#xf13d; - Encre</option>
                        </select>
                        <label class="mt-2 text-white myTitle" for="titre">
                            titre :
                        </label>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="titre" name="titre">
                        </div>
                
                        <label class="mt-2 text-white myTitle" for="description">
                            description :
                        </label>
                        <textarea name="description" cols="30" rows="3" class="form-control">
                
                        </textarea>
                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary text-light">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>

        <ul class="bg-danger rounded">

            @foreach ($errors->all() as $message)
                <li class="text-white">{{ $message }}</li>
            @endforeach
    
        </ul>

        <ul class="bg-danger rounded">

            @foreach ($errors->all() as $message)
                <li class="text-white">{{ $message }}</li>
            @endforeach
    
        </ul>

        @if (session("message"))
            <div class="alert alert-success">
                {{ session("message") }}
            </div>
        @endif

        <div class="container mt-4">
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-6 mt-5 px-4">
                        <div class="section2 text-white pt-5 p-4 d-flex justify-content-around">
                            <a href={{ route("service.edit", $service->id) }} class="triangle d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal"></a>

                                <!-- Modal Edit-->
                                <div class="modal fade myModalBG" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content myModal">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-white text-center" id="exampleModalLabel">Edit Services</h5>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <form action={{ route("service.update", $service) }} method="POST">
                                                @csrf
                                                @method('PUT')
                                                <label class="mt-5 myTitle" for="icone">
                                                    icone :
                                                </label>
                                                <select name="icone" class="form-control fa">
                                                    <option class="fa" value='<i class="fas fa-pencil-alt"></i>'>&#xf303; - Crayon</option>
                                                    <option class="fa" value='<i class="fas fa-ad"></i>'>&#xf641; - Ad</option>
                                                    <option class="fa" value='<i class="fas fa-address-card"></i>'>&#xf2bb; - Card</option>
                                                    <option class="fa" value='<i class="fas fa-adjust"></i>'>&#xf042; - Circle</option>
                                                    <option class="fa" value='<i class="fas fa-anchor"></i>'>&#xf13d; - Encre</option>
                                                </select>
                                                <label class="mt-2 myTitle" for="titre">
                                                    titre :
                                                </label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  placeholder="titre" name="titre">
                                                </div>
                                        
                                                <label class="mt-2 myTitle" for="description">
                                                    description :
                                                </label>
                                                <textarea name="description" cols="30" rows="3" class="form-control">
                                        
                                                </textarea>
                                        
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary text-light">Submit</button>
                                                </div>
                                        
                                            </form>

                                        </div>
                                    </div>
                                    </div>
                                </div>

                            <i class="edit fas fa-ellipsis-h"></i>
                            <form action={{ route("service.destroy", $service->id) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn border text-white delete mx-2" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                            <div>
                                <h2 class="fw-bold">{{ $service->titre }}</h2>
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