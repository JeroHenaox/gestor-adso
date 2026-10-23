<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gestor ADSO')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f3f5f9;
            color: #1e293b;
        }

        header {
            background: #172554;
            color: white;
            padding: 17px 24px;
        }

        .nav-container {
            max-width: 1150px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            font-size: 21px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .top-nav {
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
        }

        .top-nav a {
            color: #dbeafe;
            text-decoration: none;
            font-size: 14px;
        }

        .top-nav a:hover {
            color: white;
        }

        main {
            max-width: 1150px;
            margin: 38px auto;
            padding: 0 22px;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            margin: 0 0 8px;
            font-size: 30px;
            color: #172554;
        }

        .page-heading p {
            margin: 0;
            color: #64748b;
            line-height: 1.6;
        }

        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.04);
        }

        .list-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .list-header h2 {
            margin: 0 0 7px;
            font-size: 21px;
            color: #172554;
        }

        .list-description {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #2563eb;
            color: white;
            padding: 11px 16px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
        }

        .button:hover {
            background: #1d4ed8;
        }

        .button-secondary {
            background: #eaf0ff;
            color: #1d4ed8;
        }

        .button-secondary:hover {
            background: #dbeafe;
        }

        .search-form {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 22px;
            padding: 16px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
        }

        .search-form input {
            flex: 1;
            min-width: 220px;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: white;
            font-family: inherit;
            font-size: 14px;
            color: #1e293b;
        }

        .search-form input:focus,
        .field input:focus {
            outline: 2px solid #bfdbfe;
            border-color: #2563eb;
        }

        .search-results {
            margin: 0 0 16px;
            color: #64748b;
            font-size: 14px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .table-container th {
            padding: 14px 16px;
            background: #f1f5f9;
            color: #172554;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-container td {
            padding: 14px 16px;
            color: #334155;
            font-size: 14px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .table-container tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        .table-container tbody tr:hover {
            background: #eff6ff;
        }

        .table-container tbody tr:last-child td {
            border-bottom: none;
        }

        .pagination-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 22px;
        }

        .pagination-container nav {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 5px;
        }

        .pagination-container nav a,
        .pagination-container nav span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            min-height: 36px;
            padding: 7px 11px;
            border: 1px solid #e2e8f0;
            border-radius: 7px;
            background: white;
            color: #334155;
            text-decoration: none;
            font-size: 14px;
        }

        .pagination-container nav a:hover {
            background: #eff6ff;
            border-color: #bfdbfe;
        }

        .pagination-container nav span[aria-current="page"] {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .pagination-container nav svg {
            width: 16px;
            height: 16px;
        }

        .pagination-container nav p {
            margin: 0;
            color: #64748b;
            font-size: 13px;
        }

        .empty-state {
            padding: 35px 20px;
            text-align: center;
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 10px;
        }

        .empty-state h3 {
            margin-top: 0;
            color: #172554;
        }

        .empty-state p {
            color: #64748b;
            margin-bottom: 20px;
        }

        .flash {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            border-radius: 9px;
            padding: 14px 16px;
            margin-bottom: 20px;
        }

        .error-box {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 15px;
            border-radius: 9px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin-bottom: 0;
        }

        .field {
            margin-bottom: 21px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
        }

        .field input {
            display: block;
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: white;
            font-size: 15px;
            color: #1e293b;
        }

        .help-text {
            font-size: 13px;
            color: #64748b;
            margin-top: 7px;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        footer {
            text-align: center;
            padding: 25px 15px;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .nav-container {
                align-items: flex-start;
                flex-direction: column;
            }

            main {
                margin-top: 28px;
                padding: 0 14px;
            }

            .card {
                padding: 18px;
            }

            .page-heading h1 {
                font-size: 25px;
            }

            .search-form {
                align-items: stretch;
                flex-direction: column;
            }

            .search-form input {
                min-width: 0;
                width: 100%;
            }

            .pagination-container {
                justify-content: flex-start;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="nav-container">
            <div class="brand">Gestor ADSO</div>

            <nav class="top-nav">
                <a href="{{ route('aprendices.index') }}">Aprendices</a>
                <a href="{{ route('aprendices.create') }}">Registrar aprendiz</a>
            </nav>
        </div>
    </header>

    <main>
        @if (session('ok'))
            <div class="flash">
                ✓ {{ session('ok') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-box">
                <strong>Revisa los datos del formulario:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        Gestor ADSO · Módulo de aprendices
    </footer>
</body>
</html>
