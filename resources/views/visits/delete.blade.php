@extends('adminlte::page')

@section('title', 'Eliminar Visita')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Eliminando Visita...</h1>
                    {{-- <div class="">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                            Regresar</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <form class="bg-white shadow border p-4" action="{{ route('visits.destroy', ['visit' => $visit]) }}" method="POST">
            @csrf
            @method('DELETE')
            <h2>¿Está Seguro de Eliminar el Visita?</h2>
            <ul>
                <li><h3><strong>Fecha y Hora:</strong> {{ $visit->datetime }}</h3></li>
                <li><h3><strong>Caso:</strong> {{ $visit->record->code }}</h3></li>
                <li><h3><strong>Descripcion:</strong> {{ $visit->description }}</h3></li>
                <li><h3><strong>Observaciones:</strong> {{ $visit->observations }}</h3></li>
            </ul>
            <div class="col-12 col-sm-4 mx-auto mt-4">
                <button class="btn btn-block btn-danger"><i class="fas fa-trash-alt"></i> Sí, Eliminar</button>
            </div>
        </form>
    </div>
@endsection
