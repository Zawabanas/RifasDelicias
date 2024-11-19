<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dashboard') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex bg-gray-100">
    <!-- Barra lateral -->
    <aside class="sidebar bg-gray-800 text-white w-64 h-screen px-4 py-6 fixed">
        <div class="brand text-center py-4 text-lg font-bold">Panel Admin</div>
        <ul class="space-y-4">
            <li><a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Inicio</a></li>
            <li><a href="{{ route('rifas.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Rifas</a></li>
            <li><a href="{{ route('clientes.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Clientes</a></li>
            <li><a href="{{ route('boletos.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Boletos</a></li>
            <li><a href="{{ route('transacciones.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Transacciones</a></li>
            <li><a href="{{ route('metodos-pago.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Métodos de Pago</a></li>
            <li><a href="{{ route('contactos.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Contacto</a></li>
        </ul>
        <form method="POST" action="{{ route('logout') }}" class="mt-6 px-4">
            @csrf
            <button type="submit" class="w-full py-2 px-4 bg-red-600 hover:bg-red-700 rounded">
                Cerrar Sesión
            </button>
        </form>
    </aside>

    <!-- Área de contenido -->
    <div class="ml-64 w-full">
        <header class="bg-gray-100 shadow px-6 py-4">
            <h1 class="text-2xl font-semibold">{{ $header ?? 'Dashboard' }}</h1>
        </header>
        <main class="p-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
