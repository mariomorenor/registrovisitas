@extends('adminlte::page')

@section('title', 'Nuevo Caso')

@section('content_header')
    <div class="container">
        <div class="card p-3">
            <div class="card-content">
                <div class="d-flex justify-content-between">
                    <h1 class="m-0 text-dark">Nuevo Caso</h1>
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
        <form action="{{ route('records.store') }}" method="POST" class="bg-white p-4">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-4">
                    <label for="code">Codigo</label>
                    <input type="text" name="code" id="code" class="form-control"
                        required autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4">
                    <label for="mode">Tipo</label>
                    <select name="mode" id="mode" class="form-control">
                        <option value="AF">APOYO FAMILIAR</option>
                        <option value="CF">CUSTODIO FAMILIAR</option>
                    </select>
                </div>
                <div class="col-12 col-sm-4">
                    <label for="teen">Usuario</label>
                    <select name="teen_id" id="teen" class="form-control" required>
                        <option value="">Seleccione...</option>
                        @foreach ($teens as $teen)
                            <option value="{{ $teen->id }}">{{ $teen->full_name }}</option>
                        @endforeach
                    </select>
                    <a id="link_teen" target="_blank" hidden href="/">Ver Usuario <i class="fas fa-arrow-right"></i></a>
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
        let $select_teen = $("#teen");
        let $link_teen = $("#link_teen");

        $select_teen.select2({
            placeholder: "Seleccione...",
            theme: 'bootstrap4',
            allowClear: true,
        });

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
