<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Inicio</h1>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Tarjeta: Rifas Activas -->
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-lg font-semibold text-gray-800">Rifas Activas</h2>
            <p class="text-4xl font-bold text-green-500">{{ $rifasActivas }}</p>
        </div>

        <!-- Tarjeta: Total Clientes -->
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-lg font-semibold text-gray-800">Clientes Registrados</h2>
            <p class="text-4xl font-bold text-blue-500">{{ $totalClientes }}</p>
        </div>

        <!-- Tarjeta: Boletos Vendidos -->
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-lg font-semibold text-gray-800">Boletos Vendidos</h2>
            <p class="text-4xl font-bold text-purple-500">{{ $boletosVendidos }}</p>
        </div>

        <!-- Tarjeta: Total Transacciones -->
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-lg font-semibold text-gray-800">Ingresos Totales</h2>
            <p class="text-4xl font-bold text-red-500">${{ number_format($totalTransacciones, 2) }}</p>
        </div>
    </div>
</x-dashboard-layout>
