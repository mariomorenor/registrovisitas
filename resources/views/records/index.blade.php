@extends('adminlte::page')

@section('title', 'Casos')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Casos</h1>
                    <div class="">
                        <a href="{{ route('records.create') }}" class="btn btn-success"><i
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
                            <th>Codigo</th>
                            <th>Modo</th>
                            <th>Usuario</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <td>{{ $record->code }}</td>
                                <td>{{ $record->mode }}</td>
                                <td>{{ $record->teen->full_name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('records.edit', ['record' => $record]) }}" class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('records.show', ['record' => $record, 'delete' => true]) }}"
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
