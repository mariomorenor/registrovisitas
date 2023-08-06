@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')
    <div class="container pt-2">
        <form action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data" method="POST" class="bg-white shadow rounded border p-4">
            @csrf
            @method('PUT')
            <input type="hidden" name="profile">
            <div class="row">
                <div class="col-12 col-sm-4 mx-auto text-center">
                    <img src="{{ Storage::url($user->image) }}" class="avatar" alt="">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="name">Usuario:</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}"
                            class="form-control">
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="email">Correo:</label>
                        <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control"
                            readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Imagen:</label>
                    <input type="file" name="image" class="form-control" accept="image/png, image/jpeg, image/jpg">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="password">Contrasena</label>
                        <input type="password" name="password" class="form-control"
                            placeholder="Si no desea cambiar deje en blanco">
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="password_confirm">Confirmacion Contrasena</label>
                        <input type="password_confirm" name="password_confirm" class="form-control"
                            placeholder="Debe conicidar con la Contrasena">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 mx-auto">
                    <div class="form-group">
                        <button class="btn btn-info btn-block shadow"><i class="fas fa-save"></i> ACTUALIZAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('css')
    <style>
        .banner {
            background: white;
        }

        .avatar {
            width: 50%;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endpush
