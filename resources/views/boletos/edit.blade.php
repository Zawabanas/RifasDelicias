<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Editar Boleto</h1>
    </x-slot>

    <form action="{{ route('boletos.update', $boleto->id) }}" method="POST" class="space-y-4 mt-4">
        @csrf
        @method('PUT')
        <div>
            <label for="codigo" class="block font-bold">Código del Boleto:</label>
            <input type="text" id="codigo" name="numero" value="{{ $boleto->numero }}" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="rifa_id" class="block font-bold">Rifa:</label>
            <select id="rifa_id" name="rifa_id" class="w-full border rounded p-2" required>
                @foreach($rifas as $rifa)
                    <option value="{{ $rifa->id }}" {{ $rifa->id === $boleto->rifa_id ? 'selected' : '' }}>
                        {{ $rifa->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="estado" class="block font-bold">Estado:</label>
            <select id="estado" name="estado" class="w-full border rounded p-2">
                <option value="disponible" {{ $boleto->estado === 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="reservado" {{ $boleto->estado === 'reservado' ? 'selected' : '' }}>Reservado</option>
                <option value="vendido" {{ $boleto->estado === 'vendido' ? 'selected' : '' }}>Vendido</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar Cambios</button>
    </form>
</x-dashboard-layout>
