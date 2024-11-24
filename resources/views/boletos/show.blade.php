<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Detalles del Boleto</h1>
    </x-slot>

    <div class="p-4 border rounded">
        <p><strong>Número del Boleto:</strong> {{ $boleto->numero }}</p>
        <p><strong>Rifa:</strong> {{ $boleto->rifa->nombre }}</p>
        <p><strong>Estado:</strong> {{ ucfirst($boleto->estado) }}</p>
        @if($boleto->cliente)
            <p><strong>Cliente:</strong> {{ $boleto->cliente->nombre }}</p>
        @else
            <p><strong>Cliente:</strong> No asignado</p>
        @endif
    </div>

    {{-- Eliminamos el botón de eliminar --}}
    {{-- 
    <form action="{{ route('boletos.destroy', $boleto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este boleto?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded mt-4">Eliminar</button>
    </form>
    --}}
</x-dashboard-layout>
