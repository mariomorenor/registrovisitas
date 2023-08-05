@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Editar Usuario</h1>
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
        <form action="{{ route('teens.update', ['teen'=>$teen]) }}" method="POST" class="bg-white p-4">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-sm-4">
                    <label for="name">Nombres</label>
                    <input value="{{ $teen->name }}" type="text" name="name" id="name" class="form-control"
                        required autocomplete="off">
                </div>
                <div class="col-12 col-sm-4">
                    <label for="last_name">Apellidos</label>
                    <input value="{{ $teen->last_name }}" type="text" name="last_name" id="last_name"
                        class="form-control" required autocomplete="off">
                </div>
                <div class="col-12 col-sm-4">
                    <label for="identification">Cedula</label>
                    <input value="{{ $teen->identification }}" type="text" name="identification" id="identification"
                        class="form-control" required autocomplete="off">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-2">
                    <label for="birthdate">Fecha Nacimiento</label>
                    <input value="{{ $teen->birthdate }}" type="date" class="form-control" name="birthdate"
                        id="birthdate" autocomplete="off" required>
                </div>
                <div class="col-12 col-sm-2">
                    <label for="nationality">Nacionalidad</label>
                    <select name="nationality" id="nationality" class="form-control" required>
                        @foreach ($nationalities as $nationality)
                            <option @if ($teen->nationality == $nationality) selected @endif value="{{ $nationality }}">
                                {{ $nationality }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-2">
                    <label for="scolarship">Escolaridad</label>
                    <select name="scholarship" id="scolarship" class="form-control"required>
                        <option value="">Seleccione...</option>
                        <option @if ($teen->scholarship == 'NINGUNO') selected @endif value="NINGUNO">Ninguno</option>
                        <option @if ($teen->scholarship == 'PRIMARIA') selected @endif value="PRIMARIA">Primaria</option>
                        <option @if ($teen->scholarship == 'SECUNDARIA') selected @endif value="SECUNDARIA">Secundaria</option>
                        <option @if ($teen->scholarship == 'TERCER NIVEL') selected @endif value="TERCER NIVEL">Tercer Nivel</option>
                    </select>
                </div>

                <div class="col-12 col-sm-1">
                    <label for="level">Nivel</label>
                    <input value="{{$teen->level}}" type="number" name="level" id="level" class="form-control" step="1" min="1">
                </div>
                <div class="col-12 col-sm-5">
                    <label for="contact">Contacto</label>
                    <select name="contact_id" id="contact" class="form-control">
                        <option value="" selected disabled>Seleccione...</option>
                        @foreach ($contacts as $contact)
                            <option @if ($teen->contact_id == $contact->id) selected @endif value="{{ $contact->id }}">
                                {{ $contact?->full_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-4">
                    <label for="address">Direccion Domicilio</label>
                    <textarea name="address" id="address" class="form-control" autocomplete="off" required>{{$teen->address}}</textarea>
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
        let $select_contact = $("#contact");

        $select_contact.select2({
            placeholder: "Seleccione...",
            theme: 'bootstrap4'
        });
    </script>
@endpush



@push('js')
    <script>
        let $select_nationality = $("#nationality");

        $select_nationality.select2({
            placeholder: "Seleccione...",
            theme: 'bootstrap4',
            allowClear: true,
            tags: true
        });
    </script>
@endpush
