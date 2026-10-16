
@extends('layouts.app')

@section('title', 'Aprendices | Gestor ADSO')

@section('content')
    <div class="page-heading">
        <h1>Gestión de aprendices</h1>
        <p>Consulta y administra la información de los aprendices.</p>
    </div>

    <div class="card">
        <h2>Listado de aprendices</h2>

        <p>
            En esta versión inicial, el listado es temporal.
            La conexión con la base de datos se implementará
            en una etapa posterior.
        </p>

        <div class="actions">
            <a class="button" href="{{ route('aprendices.create') }}">
                + Registrar aprendiz
            </a>
        </div>
    </div>
@endsection
