<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Crear Boleto</h1>
    </x-slot>

    <form action="{{ route('boletos.store') }}" method="POST" class="space-y-4 mt-4">
        @csrf
        <div>
            <label for="rifa_id" class="block font-bold">Rifa:</label>
            <select id="rifa_id" name="rifa_id" class="w-full border rounded p-2" required>
                @foreach($rifas as $rifa)
                    <option value="{{ $rifa->id }}">{{ $rifa->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="estado" class="block font-bold">Estado:</label>
            <select id="estado" name="estado" class="w-full border rounded p-2" required>
                <option value="disponible">Disponible</option>
                <option value="vendido">Vendido</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Guardar
        </button>
    </form>
</x-dashboard-layout>
