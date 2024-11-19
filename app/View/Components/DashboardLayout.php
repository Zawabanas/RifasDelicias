<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    <div class="flex">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="text-lg font-bold mb-4">Dashboard</div>
            <ul>
                <li><a href="{{ route('rifas.index') }}">Rifas</a></li>
                <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
                <li><a href="{{ route('transacciones.index') }}">Transacciones</a></li>
                <li><a href="{{ route('metodos-pago.index') }}">Métodos de Pago</a></li>
                <li><a href="{{ route('contactos.index') }}">Contacto</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="content">
            <header>
                <h1>{{ $header ?? 'Dashboard' }}</h1>
            </header>
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>