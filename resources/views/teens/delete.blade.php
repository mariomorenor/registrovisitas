@extends('adminlte::page')

@section('title', 'Eliminar Usuario')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Eliminando Usuario...</h1>
                    <div class="">
                        <a href="{{ route('teens.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                            Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <form class="bg-white shadow border p-4" action="{{ route('teens.destroy', ['teen' => $teen]) }}" method="POST">
            @csrf
            @method('DELETE')
            <h2>¿Está Seguro de Eliminar el Usuario?</h2>
            <ul>
                <li><h3><strong>Nombre:</strong> {{ $teen->full_name }}</h3></li>
                <li><h3><strong>Cedula:</strong> {{ $teen->identification }}</h3></li>
                <li><h3><strong>Nacionalidad:</strong> {{ $teen->nationality }}</h3></li>
                <li><h3><strong>Fecha Nacimiento:</strong> {{ $teen->birthdate }}</h3></li>
                <li><h3><strong>Direccion:</strong> {{ $teen->address }}</h3></li>
            </ul>
            <div class="col-12 col-sm-4 mx-auto mt-4">
                <button class="btn btn-block btn-danger"><i class="fas fa-trash-alt"></i> Sí, Eliminar</button>
            </div>
        </form>
    </div>
@endsection
