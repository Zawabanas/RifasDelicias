<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Gestión de Boletos</h1>
    </x-slot>

    <div class="mt-4">
        <form action="{{ route('boletos.index') }}" method="GET" class="mb-4">
            <input type="text" name="search" placeholder="Buscar boletos..." value="{{ request('search') }}" class="border rounded p-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Buscar</button>
            <a href="{{ route('boletos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Nuevo Boleto</a>
        </form>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Numero</th>
                    <th class="border px-4 py-2">Rifa</th>
                    <th class="border px-4 py-2">Estado</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($boletos as $boleto)
                    <tr>
                        <td class="border px-4 py-2">{{ $boleto->numero }}</td>
                        <td class="border px-4 py-2">{{ $boleto->rifa->nombre }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($boleto->estado) }}</td>
                        <td class="border p-2 flex space-x-2">
                            <!-- Botón de Ver -->
                            <a href="{{ route('boletos.show', $boleto->id) }}" class="bg-green-500 text-white px-2 py-1 rounded">Ver</a>
                            
                            <!-- Botón de Editar -->
                            <a href="{{ route('boletos.edit', $boleto->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>
                        
                            <!-- Eliminamos el botón de eliminar -->
                            {{-- 
                            <form action="{{ route('boletos.destroy', $boleto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este boleto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                            </form>
                            --}}
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $boletos->links() }}
        </div>
    </div>
</x-dashboard-layout>
