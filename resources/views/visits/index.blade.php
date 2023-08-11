@extends('adminlte::page')

@section('title', 'Visitas')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Visitas</h1>
                    <div class="">
                        <a href="{{ route('visits.create') }}" class="btn btn-success"><i
                                class="fas fa-plus-circle"></i>Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="card p-2 p-sm-4">
            <div class="card-content">
                <table class="display table" id="table" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Caso</th>
                            <th>Fecha y Hora</th>
                            <th>Descripcion</th>
                            <th>Observaciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visits as $visit)
                            <tr>
                                <td>
                                    <a href="{{ route('records.edit', ['record'=>$visit->record]) }}">{{ $visit->record->code }} | {{ $visit->record->teen->full_name }}</a>
                                </td>
                                <td>{{ $visit->datetime }}</td>
                                <td>{{ $visit->description }}</td>
                                <td>{{ $visit->observations }}</td>
                                <td class="text-center">
                                    <a href="{{ route('visits.edit', ['visit' => $visit]) }}" class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('visits.show', ['visit' => $visit, 'delete' => true]) }}"
                                        class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@stop

@section('js')
    <script>
        let table = new DataTable('#table', {
            responsive: true,
        });
    </script>
@stop
