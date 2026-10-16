
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
            padding: 18px 24px;
        }

        .nav-container {
            max-width: 1050px;
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

        nav {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        nav a {
            color: #dbeafe;
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover {
            color: white;
        }

        main {
            max-width: 1050px;
            margin: 42px auto;
            padding: 0 20px;
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

        .button {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 11px 18px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
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
            background: #fff;
            font-size: 15px;
            color: #1e293b;
        }

        .field input:focus {
            outline: 2px solid #bfdbfe;
            border-color: #2563eb;
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
            }

            .card {
                padding: 20px;
            }

            .page-heading h1 {
                font-size: 25px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="nav-container">
            <div class="brand">Gestor ADSO</div>

            <nav>
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
