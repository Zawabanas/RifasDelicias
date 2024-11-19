<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Detalles del Contacto</h1>
    </x-slot>

    <div class="bg-white p-6 rounded shadow space-y-4">
        <div>
            <h2 class="text-lg font-bold">Nombre:</h2>
            <p>{{ $contacto->nombre }}</p>
        </div>
        <div>
            <h2 class="text-lg font-bold">Teléfono:</h2>
            <p>{{ $contacto->telefono }}</p>
        </div>
        <div>
            <h2 class="text-lg font-bold">Mensaje:</h2>
            <p>{{ $contacto->mensaje ?? 'N/A' }}</p>
        </div>
    </div>
</x-dashboard-layout>
