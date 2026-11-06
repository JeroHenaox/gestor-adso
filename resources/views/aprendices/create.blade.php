@extends('layouts.app')

@section('title', 'Registrar aprendiz | Gestor ADSO')

@section('content')
    <div class="page-heading">
        <h1>Registrar aprendiz</h1>
        <p>Completa los datos solicitados para registrar un nuevo aprendiz.</p>
    </div>

    <div class="card">
        <h2>Información personal</h2>
        <p class="help-text">
            Los campos marcados son obligatorios.
        </p>

        @include('aprendices._form')
    </div>
@endsection