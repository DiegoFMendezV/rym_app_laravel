@extends('base')

@section('content')
    <div class="editar">
        <form action="{{ route('personajes_update', ['id' => $character->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @error('name')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="d-flex flex-row">
                <div style="width: 300px">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Imagen</label>
                        <img class="foto_edit form-control" src="{{ $character->image }}" alt="">
                        <input type="text" class="form-control" name="image" id="foto" placeholder="Escribe la url de la imagen">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ $character->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Estado</label>
                        <input type="text" class="form-control" name="status" value="{{ $character->status }}">
                    </div>
                    <div class="mb-3">
                        <label for="species" class="form-label">Especie</label>
                        <input type="text" class="form-control" name="species" value="{{ $character->species }}">
                    </div> 
                </div>
                <div class="segunda" style="width: 350px">
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <input type="text" class="form-control" name="type" value="{{ $character->type }}">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Genero</label>
                        <input type="text" class="form-control" name="gender" value="{{ $character->gender }}">
                    </div>
                    <div class="mb-3">
                        <label for="origin" class="form-label">Origen</label>
                        <input type="text" class="form-control" name="origin" value="{{ $character->origin }}">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Ubicacion</label>
                        <input type="text" class="form-control" name="location" value="{{ $character->location }}">
                    </div>
                    <div class="mb-3">
                        <label for="episode" class="form-label">Episodio</label>
                        <input type="text" class="form-control" name="episode" value="{{ $character->episode }}">
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control" name="url" value="{{ $character->url }}">
                    </div>
                    <div class="mb-3">
                        <label for="created" class="form-label">Created</label>
                        <input type="text" class="form-control" name="created" value="{{ $character->created }}">
                    </div>
                </div>  
            </div>
            <div class="d-flex">
                <div class="botones">
                    <a href="{{ route('personajes')}}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atras</button></a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                
                    <form action="{{ route('personajes_destroy', ['id' => $character->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>  
               
        </form>
        
    </div>
@endsection