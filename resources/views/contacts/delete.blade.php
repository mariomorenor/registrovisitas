@extends('adminlte::page')

@section('title', 'Eliminar Contacto')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Eliminando Contacto...</h1>
                    <div class="">
                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                            Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <form class="bg-white shadow border p-4" action="{{ route('contacts.destroy', ['contact' => $contact]) }}" method="POST">
            @csrf
            @method('DELETE')
            <h2>¿Está Seguro de Eliminar el Contacto?</h2>
            <ul>
                <li><h3><strong>Nombres:</strong> {{ $contact->name }}</h3></li>
                <li><h3><strong>Apellidos:</strong> {{ $contact->last_name }}</h3></li>
                <li><h3><strong>Celular:</strong> {{ $contact->phone }}</h3></li>
            </ul>
            <div class="col-12 col-sm-4 mx-auto mt-4">
                <button class="btn btn-block btn-danger"><i class="fas fa-trash-alt"></i> Sí, Eliminar</button>
            </div>
        </form>
    </div>
@endsection
