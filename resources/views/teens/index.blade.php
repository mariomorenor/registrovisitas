@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Usuarios</h1>
                    <div class="">
                        <a href="{{ route('teens.create') }}" class="btn btn-success"><i
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
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Domicilio</th>
                            <th>Contacto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teens as $teen)
                            <tr>
                                <td>{{ $teen->full_name }}</td>
                                <td>{{ $teen->identification}}</td>
                                <td>{{ $teen->address}}</td>
                                <td>{{ $teen->contact->full_name}}</td>
                                <td class="text-center">
                                    <a href="{{ route('teens.edit', ['teen' => $teen]) }}" class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('teens.show', ['teen' => $teen, 'delete' => true]) }}"
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
