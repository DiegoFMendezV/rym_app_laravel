@extends('base')

@section('content')
    <div class="Content container-fluid">
        <div class="SideBar p-0 pt-4">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-user"></i>   Personajes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-location-dot"></i>   Lugares</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-film"></i>   Episodios</a>
                </li>
            </ul>
        </div>

        <div class="ContentBody container-fluid">
            <div class="ContentPage">
                <div class="d-flex flex-row">
                    <span class="flex-grow-1 pb-2">Personajes</span>
                    <div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Crear Nuevo Personaje
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Nuevo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('personajes') }}" method="POST">
                                            @csrf
                                            @if (session('success'))
                                                <h6 class="alert alert-success">{{ session('success') }}</h6>
                                            @endif
                                            @error('name', 'status', 'species', 'gender')
                                                <h6 class="alert alert-danger">{{ $message }}</h6>
                                            @enderror
                                            <div class="d-flex flex-row">
                                                <div style="width: 350px">
                                                    <div class="mb-3">
                                                        <label for="foto" class="form-label">Imagen</label>
                                                        <input type="text" class="form-control" name="image" id="foto" placeholder="Esribe la url de la imagen">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" name="name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Estado</label>
                                                        <input type="text" class="form-control" name="status">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="species" class="form-label">Especie</label>
                                                        <input type="text" class="form-control" name="species">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="type" class="form-label">Tipo</label>
                                                        <input type="text" class="form-control" name="type">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="gender" class="form-label">Genero</label>
                                                        <input type="text" class="form-control" name="gender">
                                                    </div>
                                                </div>
                                                <div class="segunda" style="width: 350px">
                                                    <div class="mb-3">
                                                        <label for="origin" class="form-label">Origen</label>
                                                        <input type="text" class="form-control" name="origin">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="location" class="form-label">Ubicacion</label>
                                                        <input type="text" class="form-control" name="location">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="episode" class="form-label">Episodio</label>
                                                        <input type="text" class="form-control" name="episode">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="url" class="form-label">URL</label>
                                                        <input type="text" class="form-control" name="url">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="created" class="form-label">Created</label>
                                                        <input type="text" class="form-control" name="created">
                                                    </div>
                                                </div>  
                                            </div>  
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Crear</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="cards">
                        @foreach ($characters as $character)
                            <div class="card" style="width: 14rem; heigth: 14rem">
                                <a href="{{ route('personajes_show', ['id' => $character->id]) }}"><img src={{ $character->image }} class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $character->name }}</h5>
                                    <p class="card-text">Estado: {{ $character->status }}</p>
                                    <p class="card-text">Especie: {{ $character->species }}</p>
                                    <p class="card-text">Genero: {{ $character->gender }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>    
                </div>
                <br>
                {{-- <div class="d-flex justify-content-center">
                    {!! $characters->links() !!}
                </div> --}}
            </div>
        </div>
    </div>
        

@endsection