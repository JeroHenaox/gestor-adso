@extends('layouts.app')

@section('title', 'Aprendices | Gestor ADSO')

@section('content')
    <div class="page-heading">
        <h1>Gestión de aprendices</h1>
        <p>Consulta y administra la información de los aprendices.</p>
    </div>

    <div class="card">
        <div class="list-header">
            <div>
                <h2>Listado de aprendices</h2>
                <p class="list-description">
                    Consulta los registros guardados en la base de datos.
                </p>
            </div>

            <a class="button" href="{{ route('aprendices.create') }}">
                + Registrar aprendiz
            </a>
        </div>

        <form action="{{ route('aprendices.index') }}" method="GET" class="search-form">
            <input
                type="search"
                name="buscar"
                value="{{ $buscar ?? '' }}"
                placeholder="Buscar por nombre o documento..."
                aria-label="Buscar aprendices"
            >

            <button type="submit" class="button">Buscar</button>

            @if (!empty($buscar))
                <a class="button button-secondary" href="{{ route('aprendices.index') }}">
                    Limpiar
                </a>
            @endif
        </form>

        @if (!empty($buscar))
            <p class="search-results">
                Resultados para <strong>{{ $buscar }}</strong>:
                {{ $aprendices->total() }} encontrado(s).
            </p>
        @endif

        @if ($aprendices->count() > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Correo electrónico</th>
                            <th>Ficha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($aprendices as $aprendiz)
                            <tr>
                                <td>{{ $aprendiz->id }}</td>
                                <td>{{ $aprendiz->nombre }}</td>
                                <td>{{ $aprendiz->documento }}</td>
                                <td>{{ $aprendiz->correo }}</td>
                                <td>{{ $aprendiz->ficha_id ?? 'Sin ficha' }}</td>

                                <td>
                                    <a
                                        class="button button-secondary"
                                        href="{{ route('aprendices.edit', $aprendiz) }}"
                                    >
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('aprendices.destroy', $aprendiz) }}"
                                        method="POST"
                                        style="display: inline;"
                                        onsubmit="return confirm('¿Estás seguro de eliminar este aprendiz?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button class="button" type="submit">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination-container">
                {{ $aprendices->links() }}
            </div>
        @else
            <div class="empty-state">
                <h3>No se encontraron aprendices</h3>
                <p>
                    @if (!empty($buscar))
                        Prueba con otro nombre o documento.
                    @else
                        Todavía no hay aprendices registrados.
                    @endif
                </p>

                @if (!empty($buscar))
                    <a class="button button-secondary" href="{{ route('aprendices.index') }}">
                        Ver todos los aprendices
                    </a>
                @endif
            </div>
        @endif
    </div>
@endsection