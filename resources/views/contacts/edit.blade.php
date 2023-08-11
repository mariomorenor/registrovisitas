@extends('adminlte::page')

@section('title', 'Editar Contacto')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Editar Contacto</h1>
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
        <form action="{{ route('contacts.update', ['contact' => $contact]) }}" method="POST" class="bg-white p-4 shadow">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="name">Nombres</label>
                    <input value="{{ $contact->name }}" type="text" name="name" id="name" class="form-control"
                        required>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="last_name">Apellidos</label>
                    <input value="{{ $contact->last_name }}" type="text" name="last_name" id="last_name"
                        class="form-control" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-4">
                    <label for="phone">Celular</label>
                    <input value="{{ $contact->phone }}" type="text" class="form-control" name="phone" id="phone"
                        autocomplete="off">
                </div>
                <div class="col-12 col-sm-4">
                    <label for="relationship">Parentesco</label>
                    <select name="relationship" id="relationship" class="form-control">
                        <option value="">Seleccione...</option>
                        <option @if ($contact->relationship == 'padre') selected @endif value="padre">Padre</option>
                        <option @if ($contact->relationship == 'madre') selected @endif value="madre">Madre</option>
                        <option @if ($contact->relationship == 'tio') selected @endif value="tio">Tio</option>
                        <option @if ($contact->relationship == 'tia') selected @endif value="tia">Tia</option>
                        <option @if ($contact->relationship == 'abuelos') selected @endif value="abuelos">Abuelos</option>
                        <option @if ($contact->relationship == 'otros') selected @endif value="otros">Otros</option>
                    </select>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-sm-4 mx-auto">
                    <button class="btn btn-info btn-block"><i class="fas fa-save"></i> ACTUALIZAR</button>
                </div>
            </div>
        </form>
    </div>
@endsection
