@extends('adminlte::page')

@section('title', 'Eliminar Caso')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Eliminando Caso...</h1>
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
        <form class="bg-white shadow border p-4" action="{{ route('records.destroy', ['record' => $record]) }}" method="POST">
            @csrf
            @method('DELETE')
            <h2>¿Está Seguro de Eliminar el Caso?</h2>
            <ul>
                <li><h3><strong>Codigo:</strong> {{ $record->code }}</h3></li>
                <li><h3><strong>Tipo:</strong> {{ $record->mode }}</h3></li>
                <li><h3><strong>Usuario:</strong> <a href="{{ route('teens.edit', ['teen'=>$record->teen_id]) }}">{{ $record->teen->full_name }}</a></h3></li>
            </ul>
            <div class="col-12 col-sm-4 mx-auto mt-4">
                <button class="btn btn-block btn-danger"><i class="fas fa-trash-alt"></i> Sí, Eliminar</button>
            </div>
        </form>
    </div>
@endsection
