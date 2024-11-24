<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Métodos de Pago</h1>
    </x-slot>

    <div class="mt-4">
        <!-- Sección de Búsqueda y Agregar Método -->
        <div class="flex justify-between items-center mb-4">
            <!-- Formulario de Búsqueda -->
            <form action="{{ route('metodos_pago.index') }}" method="GET" class="flex items-center space-x-2">
                <input type="text" name="search" placeholder="Buscar métodos de pago..." 
                       value="{{ request('search') }}" class="border rounded p-2 w-full md:w-64">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Buscar</button>
            </form>

            <!-- Botón de Agregar Método -->
            <a href="{{ route('metodos_pago.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar Método</a>
        </div>

        <!-- Mensajes de Éxito -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla de Métodos de Pago -->
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Tipo</th>
                    <th class="border px-4 py-2">Banco o Tienda</th>
                    <th class="border px-4 py-2">Estado</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($metodos as $metodo)
                    <tr class="border-t">
                        <td class="border px-4 py-2">{{ $metodo->nombre_metodo }}</td>
                        <td class="border px-4 py-2">{{ $metodo->banco ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">
                            <span class="px-2 py-1 text-white rounded {{ $metodo->estado === 'activo' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ ucfirst($metodo->estado) }}
                            </span>
                        </td>
                        <td class="border px-4 py-2 flex space-x-2">
                            <!-- Botón de Ver -->
                            <a href="{{ route('metodos_pago.show', $metodo->id) }}" 
                               class="bg-green-500 text-white px-2 py-1 rounded">
                                Ver
                            </a>

                            <!-- Botón de Editar -->
                            <a href="{{ route('metodos_pago.edit', $metodo->id) }}" 
                               class="bg-yellow-500 text-white px-2 py-1 rounded">
                                Editar
                            </a>

                            <!-- Botón de Eliminar -->
                            <form action="{{ route('metodos_pago.destroy', $metodo->id) }}" method="POST"
                                  onsubmit="return confirm('¿Estás seguro de eliminar este método de pago?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border px-4 py-2 text-center">No se encontraron métodos de pago.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $metodos->links() }}
        </div>
    </div>
</x-dashboard-layout>
