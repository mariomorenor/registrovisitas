@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Editar Usuario</h1>
                    <div class="">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                            Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('users.update', ['user' => $user]) }}" method="POST" class="bg-white p-4 shadow">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="name">Nombre</label>
                    <input value="{{ $user->name }}" type="text" name="name" id="name" class="form-control"
                        required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="email">Correo</label>
                    <input value="{{ $user->email }}" type="email" name="email" id="email" class="form-control"
                        readonly>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-4">
                    <label for="role">Rol</label>

                    <select name="role" id="role" class="form-control" required>
                        <option value="">Seleccione...</option>
                        
                        @foreach (Spatie\Permission\Models\Role::all() as $role)
                            <option @if ($user->hasRole($role) ) selected @endif value="{{ $role->id }}">
                                {{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-4">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Deja en blanco si no desea actualizar">
                </div>
                <div class="col-12 col-sm-4">
                    <label for="password_confirm">Confirmar Contraseña</label>
                    <input type="password" name="password_confirm" id="password_confirm" class="form-control">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-sm-4 mx-auto">
                    <button class="btn btn-info btn-block"><i class="fas fa-save"></i> ACTUALIZAR</button>
                </div>
            </div>
        </form>
    </div>
@endsection
