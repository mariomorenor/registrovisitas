@extends('adminlte::page')

@section('title', 'Nuevo Usuario')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Nuevo Usuario</h1>
                    <div class="">
                        <a href="{{ route('teens.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                            Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('teens.store') }}" method="POST" class="bg-white p-4">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-4">
                    <label for="name">Nombres</label>
                    <input type="text" name="name" id="name" class="form-control" required autocomplete="off">
                </div>
                <div class="col-12 col-sm-4">
                    <label for="last_name">Apellidos</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required autocomplete="off">
                </div>
                <div class="col-12 col-sm-4">
                    <label for="identification">Cedula</label>
                    <input type="text" name="identification" id="identification" class="form-control" required
                        autocomplete="off">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-2">
                    <label for="birthdate">Fecha Nacimiento</label>
                    <input type="date" class="form-control" name="birthdate" id="birthdate" autocomplete="off">
                </div>
                <div class="col-12 col-sm-2">
                    <label for="nationality">Nacionalidad</label>
                    <select name="nationality" id="nationality" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="ECUATORIANA">ECUATORIANA</option>
                        <option value="VENEZOLANA">VENEZOLANA</option>
                        <option value="COLOMBIANA">COLOMBIANA</option>
                        <option value="PERUANA">PERUANA</option>
                    </select>
                </div>
                <div class="col-12 col-sm-2">
                    <label for="scolarship">Escolaridad</label>
                    <select name="scolarship" id="scolarship" class="form-control"required>
                        <option value="">Seleccione...</option>
                        <option value="NINGUNO">Ninguno</option>
                        <option value="PRIMARIA">Primaria</option>
                        <option value="SECUNDARIA">Secundaria</option>
                        <option value="TERCER NIVEL">Tercer Nivel</option>
                    </select>
                </div>

                <div class="col-12 col-sm-1">
                    <label for="level">Nivel</label>
                    <input type="number" name="level" id="level" class="form-control" step="1" min="1">
                </div>
                <div class="col-12 col-sm-5">
                    <label for="contact">Contacto</label>
                    <select name="contact" id="contact">
                        <option value="" selected disabled>Seleccione...</option>
                        @foreach ($contacts as $contact)
                            <option value="{{$contact->id}}">{{$contact->full_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-4">
                    <label for="address">Direccion Domicilio</label>
                    <textarea name="address" id="address" class="form-control" autocomplete="off"></textarea>
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

@push('js')
    <script>
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        
        let $select_contact = $("#contact");

        $select_contact.select2({
            placeholder: "Seleccione...",
            theme:'bootstrap4'
        });
    </script>
@endpush

@push('css')
    <style>
        #contact {
            width: 100%
        }
    </style>
@endpush
