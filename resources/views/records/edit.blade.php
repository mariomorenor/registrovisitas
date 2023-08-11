@extends('adminlte::page')

@section('title', 'Editar Caso')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Editar Caso</h1>
                    <div class="">
                        <a href="{{ route('records.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                            Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('records.update', ['record' => $record]) }}" method="POST" id="form_record"
            class="bg-white p-4 shadow">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12 col-sm-7 pr-4">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="code">Codigo</label>
                            <input value="{{ $record->code }}" type="text" name="code" id="code"
                                class="form-control" required autocomplete="off" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-5">
                            <label for="mode">Tipo</label>
                            <select name="mode" id="mode" class="form-control">
                                <option @if ($record->mode == 'AF') selected @endif value="AF">APOYO FAMILIAR
                                </option>
                                <option @if ($record->mode == 'CF') selected @endif  value="CF">CUSTODIO FAMILIAR</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-7">
                            <label for="teen">Usuario</label>
                            <select name="teen_id" id="teen" class="form-control" required>
                                <option value="">Seleccione...</option>
                                @foreach ($teens as $teen)
                                    <option value="{{ $teen->id }}">{{ $teen->full_name }}</option>
                                @endforeach
                            </select>
                            <a id="link_teen" href="{{ route('teens.edit', ['teen' => $record->teen_id]) }}">Ver Usuario <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-5 border-left">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-2">
                                <h4>Informes</h4>
                            </div>
                            <div class="col-12 col-sm-3">
                                <button class="btn btn-success btn-sm ml-3" type="button" id="upload">Agregar <i
                                        class="fas fa-plus-circle"></i></button>
                            </div>
                            <div class="col-12 col-sm-1">
                                <input type="hidden" id="record_id" value="{{ $record->id }}">
                                <div id="token-form">
                                    @csrf
                                </div>
                                <div id="pre_report">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-10">
                                <ul class="list-group">
                                    @foreach ($record->attachments as $attachment)
                                        <li class="list-group-item">
                                            <a href="{{ Storage::url($attachment->path) }}"
                                                download="{{ $attachment->name }}">{{ $attachment->name }}</a>
                                            <button type="button"
                                                class="btn btn-xs btn-danger float-right btn_delete_attachment"
                                                data-attachment-id="{{ $attachment->id }}"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
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
    @vite(['resources/js/fileupload.js', 'resources/js/records.js'])
    <script>
        let $select_teen = $("#teen");
        let $link_teen = $("#link_teen");

        $select_teen.select2({
            placeholder: "Seleccione...",
            theme: 'bootstrap4',
            allowClear: true,
        });

        $select_teen.val("{{ $record->teen_id }}");
        $select_teen.trigger("change");


        $select_teen.on('select2:clear', function(e) {
            $link_teen.attr("href", "#");
            $link_teen.prop("hidden", true);
        });

        $select_teen.on('select2:select', function(e) {
            $teen_url = "{{ route('teens.edit', ['teen' => '%s']) }}"
            $url = $teen_url.replace("%s", $select_teen.val());
            $link_teen.attr("href", $url);
            $link_teen.prop("hidden", false);
        });
    </script>
@endpush
