@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Usuarios</h1>
                    <div class="">
                        <a href="{{ route('users.create') }}" class="btn btn-success"><i
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
                            <th>Email</th>
                            <th>Roles</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ implode(',', $user->getRoleNames()->toArray()) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('users.show', ['user' => $user, 'delete' => true]) }}"
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
