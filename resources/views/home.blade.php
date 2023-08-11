@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="m-0 text-dark">Bienvenid@! <span class="text-success font-weight-bold">{{Auth::user()->name}}</span></h1>
                    <h3>Por favor, Selecciona una opcion del menu lateral</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
