@php
    $editando = $aprendiz->exists;
@endphp

<form
    action="{{ $editando ? route('aprendices.update', $aprendiz) : route('aprendices.store') }}"
    method="POST"
>
    @csrf

    @if ($editando)
        @method('PUT')
    @endif

    <div class="field">
        <label for="nombre">Nombre completo</label>
        <input
            id="nombre"
            type="text"
            name="nombre"
            value="{{ old('nombre', $aprendiz->nombre) }}"
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
            value="{{ old('documento', $aprendiz->documento) }}"
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
            value="{{ old('correo', $aprendiz->correo) }}"
            maxlength="120"
            placeholder="nombre@ejemplo.com"
            required
        >
    </div>

    <div class="field">
        <label for="ficha_id">Número de ficha</label>
        <input
            id="ficha_id"
            type="number"
            name="ficha_id"
            value="{{ old('ficha_id', $aprendiz->ficha_id) }}"
            placeholder="Ej. 3412768"
        >
        <p class="help-text">Este campo es opcional.</p>
    </div>

    <div class="actions">
        <button class="button" type="submit">
            {{ $editando ? 'Actualizar aprendiz' : 'Guardar aprendiz' }}
        </button>

        <a
            class="button button-secondary"
            href="{{ route('aprendices.index') }}"
        >
            Cancelar
        </a>
    </div>
</form>