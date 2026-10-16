
@extends('layouts.app')

@section('title', 'Registrar aprendiz | Gestor ADSO')

@section('content')
    <div class="page-heading">
        <h1>Registrar aprendiz</h1>
        <p>Completa los datos solicitados para probar el registro.</p>
    </div>

    <div class="card">
        <h2>Información personal</h2>
        <p class="help-text">
            Los campos marcados son obligatorios.
        </p>

        <form action="{{ route('aprendices.store') }}" method="POST">
            @csrf

            <div class="field">
                <label for="nombre">Nombre completo</label>
                <input
                    id="nombre"
                    type="text"
                    name="nombre"
                    value="{{ old('nombre') }}"
                    maxlength="120"
                    placeholder="Ej. Juan Pérez"
                    required
                >
            </div>

            <div class="field">
                <label for="documento">Número de documento</label>
                <input
                    id="documento"
                    type="text"
                    name="documento"
                    value="{{ old('documento') }}"
                    maxlength="40"
                    placeholder="Ingresa el documento"
                    required
                >
            </div>

            <div class="field">
                <label for="correo">Correo electrónico</label>
                <input
                    id="correo"
                    type="email"
                    name="correo"
                    value="{{ old('correo') }}"
                    maxlength="120"
                    placeholder="nombre@ejemplo.com"
                    required
                >
            </div>

            <div class="actions">
                <button class="button" type="submit">
                    Guardar aprendiz
                </button>

                <a
                    class="button button-secondary"
                    href="{{ route('aprendices.index') }}"
                >
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
