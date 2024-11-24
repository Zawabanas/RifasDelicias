<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Detalles del Método de Pago</h1>
    </x-slot>

    <div class="p-4 border rounded space-y-2">
        <p><strong>Nombre del Método:</strong> {{ $metodoPago->nombre_metodo }}</p>
        <p><strong>Banco:</strong> {{ $metodoPago->banco }}</p>
        <p><strong>Propietario de la Cuenta:</strong> {{ $metodoPago->propietario_cuenta }}</p>
        <p><strong>Número de Tarjeta:</strong> {{ $metodoPago->numero_tarjeta }}</p>
        <p><strong>CLABE:</strong> {{ $metodoPago->clabe }}</p>
        <p><strong>Detalles:</strong> {{ $metodoPago->detalles }}</p>
        <p><strong>Estado:</strong> 
            <span class="px-2 py-1 text-white rounded {{ $metodoPago->estado === 'activo' ? 'bg-green-500' : 'bg-red-500' }}">
                {{ ucfirst($metodoPago->estado) }}
            </span>
        </p>

        <div class="mt-4 flex space-x-2">
            <a href="{{ route('metodos_pago.edit', $metodoPago->id) }}" class="bg-yellow-500 text-white px-2 py-2 rounded">
                Editar
            </a>
            <form action="{{ route('metodos_pago.destroy', $metodoPago->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este método de pago?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-2 py-2 rounded">Eliminar</button>
            </form>
        </div>
    </div>
</x-dashboard-layout>
