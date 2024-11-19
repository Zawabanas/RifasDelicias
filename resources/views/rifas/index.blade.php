<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Lista de Rifas</h1>
    </x-slot>

    <!-- Barra superior: Botón y búsqueda -->
    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('rifas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Crear Nueva Rifa
        </a>

        <form action="{{ route('rifas.index') }}" method="GET" class="flex">
            <input type="text" name="search" placeholder="Buscar rifas" value="{{ request('search') }}"
                class="border border-gray-300 rounded px-4 py-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Buscar</button>
        </form>
    </div>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Contenedor dinámico para las rifas -->
    <div id="rifas-container">
        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-2 px-4">Rifa</th>
                    <th class="py-2 px-4">Precio</th>
                    <th class="py-2 px-4">Estado</th>
                    <th class="py-2 px-4">Boletos</th>
                    <th class="py-2 px-4">Carrusel</th>
                    <th class="py-2 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rifas as $rifa)
                    <tr class="border-b">
                        <!-- Nombre y Header -->
                        <td class="py-4 px-4 w-64">
                            @php
                                $header = $rifa->imagenes->where('pivot.tipo', 'header')->first();
                            @endphp
                            @if ($header)
                                <img src="{{ asset('storage/' . $header->ruta) }}" alt="Header" class="w-full h-32 object-cover rounded shadow mb-2">
                            @else
                                <p class="text-gray-500 text-sm">Sin Header</p>
                            @endif
                            <h3 class="text-lg font-bold">{{ $rifa->nombre }}</h3>
                        </td>

                        <!-- Descripción -->

                        <!-- Precio -->
                        <td class="py-4 px-4">${{ number_format($rifa->precio_boleto, 2) }}</td>

                        <!-- Estado -->
                        <td class="py-4 px-4">{{ ucfirst($rifa->estado) }}</td>

                        <!-- Boletos -->
                        <td class="py-4 px-4">
                            {{ $rifa->boletos->count() }}
                            <a href="{{ route('boletos.index', ['rifa' => $rifa->id]) }}" class="text-blue-500 ml-2">Ver Boletos</a>
                        </td>

                        <!-- Carrusel -->
                        <td class="py-4 px-4 w-64">
                            @php
                                $carousel = $rifa->imagenes->where('pivot.tipo', 'carousel');
                            @endphp

                            @if ($carousel->isNotEmpty())
                                <div class="carousel flex gap-2 overflow-x-auto no-scrollbar cursor-grab">
                                    @foreach ($carousel as $imagen)
                                        <img src="{{ asset('storage/' . $imagen->ruta) }}" alt="Carrusel" class="w-32 h-32 object-cover rounded shadow flex-shrink-0 no-drag">
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 text-sm">Sin imágenes en el carrusel</p>
                            @endif
                        </td>

                        <!-- Acciones -->
                        <td class="py-4 px-4">
                            <a href="{{ route('rifas.show', $rifa) }}" class="text-blue-500">Ver</a> |
                            <a href="{{ route('rifas.edit', $rifa) }}" class="text-yellow-500">Editar</a> |
                            <form action="{{ route('rifas.destroy', $rifa) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <!-- JavaScript para carrusel arrastrable -->
    <script>
        let isDragging = false, startX, scrollLeft, activeCarousel;

        document.addEventListener('mousedown', (e) => {
            const carousel = e.target.closest('.carousel');
            if (!carousel) return;
            isDragging = true;
            activeCarousel = carousel;
            activeCarousel.classList.add('cursor-grabbing');
            startX = e.pageX - activeCarousel.offsetLeft;
            scrollLeft = activeCarousel.scrollLeft;
        });

        document.addEventListener('mousemove', (e) => {
            if (!isDragging || !activeCarousel) return;
            e.preventDefault();
            const x = e.pageX - activeCarousel.offsetLeft;
            const walk = (x - startX) * 2; // Ajusta la velocidad del desplazamiento
            activeCarousel.scrollLeft = scrollLeft - walk;
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
            if (activeCarousel) {
                activeCarousel.classList.remove('cursor-grabbing');
                activeCarousel = null;
            }
        });

        document.querySelectorAll('.no-drag').forEach(img => {
            img.addEventListener('dragstart', (e) => e.preventDefault());
        });
    </script>

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .no-drag {
            -webkit-user-drag: none;
            user-drag: none;
        }
    </style>
</x-dashboard-layout>
