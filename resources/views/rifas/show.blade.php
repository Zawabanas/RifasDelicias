<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Detalles de la Rifa: {{ $rifa->nombre }}</h1>
    </x-slot>

    <!-- Detalles principales -->
    <div class="bg-white p-6 rounded shadow space-y-4">
        <div>
            <h2 class="text-lg font-bold">Descripción:</h2>
            <p>{{ $rifa->descripcion }}</p>
        </div>

        <div>
            <h2 class="text-lg font-bold">Precio del Boleto:</h2>
            <p>${{ number_format($rifa->precio_boleto, 2) }}</p>
        </div>

        <div>
            <h2 class="text-lg font-bold">Fechas:</h2>
            <p>Inicio: {{ $rifa->fecha_inicio }}</p>
            <p>Fin: {{ $rifa->fecha_fin }}</p>
        </div>

        <div>
            <h2 class="text-lg font-bold">Estado:</h2>
            <p>{{ ucfirst($rifa->estado) }}</p>
        </div>

        <div>
            <h2 class="text-lg font-bold">Cantidad de Boletos:</h2>
            <p>{{ $rifa->cantidad_boletos }}</p>
        </div>
    </div>

    <!-- Imágenes -->
    <div class="mt-6">
        <h2 class="text-lg font-bold">Imágenes:</h2>
        <div class="flex gap-4">
            <!-- Imagen del Header -->
            @php
                $header = $rifa->imagenes->where('pivot.tipo', 'header')->first();
            @endphp
            @if ($header)
                <div class="w-64">
                    <h3 class="text-md font-semibold mb-2">Header:</h3>
                    <img src="{{ asset('storage/' . $header->ruta) }}" alt="Header" class="w-full h-40 object-cover rounded shadow">
                </div>
            @else
                <p class="text-gray-500">Sin imagen de header</p>
            @endif

            <!-- Carrusel -->
            @php
                $carousel = $rifa->imagenes->where('pivot.tipo', 'carousel');
            @endphp
            @if ($carousel->isNotEmpty())
                <div class="w-full">
                    <h3 class="text-md font-semibold mb-2">Carrusel:</h3>
                    <div class="carousel flex gap-2 overflow-x-auto no-scrollbar cursor-grab">
                        @foreach ($carousel as $imagen)
                            <img src="{{ asset('storage/' . $imagen->ruta) }}" alt="Carrusel" class="w-40 h-40 object-cover rounded shadow flex-shrink-0">
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-gray-500">Sin imágenes en el carrusel</p>
            @endif
        </div>
    </div>

    <!-- Boletos -->
    <div class="mt-6">
        <h2 class="text-lg font-bold">Boletos:</h2>
        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-2 px-4">Número</th>
                    <th class="py-2 px-4">Estado</th>
                    <th class="py-2 px-4">Cliente</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rifa->boletos as $boleto)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $boleto->numero }}</td>
                        <td class="py-2 px-4">{{ ucfirst($boleto->estado) }}</td>
                        <td class="py-2 px-4">
                            @if ($boleto->cliente)
                                {{ $boleto->cliente->nombre }}
                            @else
                                <span class="text-gray-500">Sin cliente</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard-layout>
