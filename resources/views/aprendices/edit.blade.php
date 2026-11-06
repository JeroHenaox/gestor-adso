@extends('layouts.app')

@section('title', 'Editar aprendiz | Gestor ADSO')

@section('content')
    <div class="page-heading">
        <h1>Editar aprendiz</h1>
        <p>Modifica la información del aprendiz seleccionado.</p>
    </div>

    <div class="card">
        <h2>Información personal</h2>
        <p class="help-text">
            Actualiza los datos que necesites modificar.
        </p>

        @include('aprendices._form')
    </div>
@endsection