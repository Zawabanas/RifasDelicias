<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Editar Rifa</h1>
    </x-slot>

    <form action="{{ route('rifas.update', $rifa) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre" class="block font-bold">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $rifa->nombre) }}" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="descripcion" class="block font-bold">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="w-full border rounded p-2">{{ old('descripcion', $rifa->descripcion) }}</textarea>
        </div>
        <div>
            <label for="fecha_inicio" class="block font-bold">Fecha de Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio', $rifa->fecha_inicio) }}" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="fecha_fin" class="block font-bold">Fecha de Fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin', $rifa->fecha_fin) }}" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="precio_boleto" class="block font-bold">Precio del Boleto:</label>
            <input type="number" step="0.01" id="precio_boleto" name="precio_boleto" value="{{ old('precio_boleto', $rifa->precio_boleto) }}" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="cantidad_boletos" class="block font-bold">Cantidad de Boletos:</label>
            <input type="number" id="cantidad_boletos" name="cantidad_boletos" value="{{ old('cantidad_boletos', $rifa->cantidad_boletos) }}" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="estado" class="block font-bold">Estado:</label>
            <select id="estado" name="estado" class="w-full border rounded p-2">
                <option value="activa" {{ $rifa->estado == 'activa' ? 'selected' : '' }}>Activa</option>
                <option value="cerrada" {{ $rifa->estado == 'cerrada' ? 'selected' : '' }}>Cerrada</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Guardar Cambios
        </button>
    </form>
</x-dashboard-layout>
