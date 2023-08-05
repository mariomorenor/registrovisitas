@extends('adminlte::page')

@section('title', 'Contactos')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Contactos</h1>
                    <div class="">
                        <a href="{{ route('contacts.create') }}" class="btn btn-success"><i
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
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Telefono</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->last_name }}</td>
                                <td>{{ $contact->phone}}</td>
                                <td class="text-center">
                                    <a href="{{ route('contacts.edit', ['contact' => $contact]) }}" class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('contacts.show', ['contact' => $contact, 'delete' => true]) }}"
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

@section('plugins.Datatables', true)

@section('js')
    <script>
        let table = new DataTable('#table', {
            responsive: true,
        });
    </script>
@stop
