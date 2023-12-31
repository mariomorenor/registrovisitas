@extends('adminlte::page')

@section('title', 'Nueva Visita')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Nueva Visita</h1>
                    {{-- <div class="">
                        <a href="{{ route('visits.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                            Regresar</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('visits.store') }}" method="POST" class="bg-white p-4">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-3">
                    <label for="datetime">Fecha y Hora</label>
                    <input type="datetime-local" value="{{ Carbon\Carbon::now() }}" name="datetime" id="datetime"
                        class="form-control" required autocomplete="off">
                </div>
                <div class="col-12 col-sm-4">
                    <label for="record">Caso</label>
                    <select name="record_id" id="record_id" class="form-control" required>
                        <option value="">Seleccione...</option>
                        @foreach ($records as $record)
                            <option value="{{ $record->id }}">{{ $record->code }} | {{ $record->teen->full_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="technician">Tecnico</label>
                        <select name="technician" id="technician" class="form-control">
                            <option @if (Auth::user()->occupation == 'Psicologo') selected @endif value="Psicologo">Psicologo</option>
                            <option @if (Auth::user()->occupation == 'Facilitador Familiar') selected @endif value="Facilitador Familiar">Facilitador
                                Familiar</option>
                            <option @if (Auth::user()->occupation == 'Trabajador Social') selected @endif value="Trabajador Social">Trabajador Social
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-6">
                    <label for="description">Descripcion</label>
                    <textarea required name="description" rows="10" id="description" class="form-control"></textarea>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="observations">Observaciones</label>
                    <textarea name="observations" id="observations" rows="10" class="form-control"></textarea>
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
        let $select_record = $("#record_id");
        let $link_teen = $("#link_teen");

        $select_record.select2({
            placeholder: "Seleccione...",
            theme: 'bootstrap4',
            allowClear: true,
        });
    </script>
@endpush
