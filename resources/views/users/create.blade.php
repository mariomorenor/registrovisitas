@extends('adminlte::page')

@section('title', 'Nuevo Usuario')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Nuevo Usuario</h1>
                    <div class="">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                            Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('users.store') }}" method="POST" class="bg-white p-4">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-4">
                    <label for="role">Rol</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="">Seleccione...</option>
                        @foreach (Spatie\Permission\Models\Role::all() as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-4">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="col-12 col-sm-4">
                    <label for="password_confirm">Confirmar Contraseña</label>
                    <input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-sm-4 mx-auto">
                    <button class="btn btn-info btn-block"><i class="fas fa-save"></i> GUARDAR</button>
                </div>
            </div>
        </form>
    </div>
@endsection
