<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Lista de Contactos</h1>
    </x-slot>

    <a href="{{ route('contactos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        Crear Nuevo Contacto
    </a>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4">Nombre</th>
                <th class="py-2 px-4">Teléfono</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contactos as $contacto)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $contacto->nombre }}</td>
                    <td class="py-2 px-4">{{ $contacto->telefono }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('contactos.show', $contacto) }}" class="text-blue-500">Ver</a> |
                        <a href="{{ route('contactos.edit', $contacto) }}" class="text-yellow-500">Editar</a> |
                        <form action="{{ route('contactos.destroy', $contacto) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard-layout>
