@extends('adminlte::page')

@section('title', 'Nuevo Contacto')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Nuevo Contacto</h1>
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
        <form action="{{ route('contacts.store') }}" method="POST" class="bg-white p-4">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="name">Nombres</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="last_name">Apellidos</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-4">
                    <label for="phone">Celular</label>
                    <input type="text" class="form-control" name="phone" id="phone" autocomplete="off">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-sm-4 mx-auto">
                    <button class="btn btn-info btn-block"><i class="fas fa-save"></i> GUARDAR</button>
                </div>
            </div>
        </form>
    </div>
@endsection

