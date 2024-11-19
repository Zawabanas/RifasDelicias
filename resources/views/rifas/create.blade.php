<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Crear Nueva Rifa</h1>
    </x-slot>

    <form action="{{ route('rifas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="nombre" class="block font-bold">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="descripcion" class="block font-bold">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="w-full border rounded p-2"></textarea>
        </div>
        <div>
            <label for="fecha_inicio" class="block font-bold">Fecha de Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="fecha_fin" class="block font-bold">Fecha de Fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="precio_boleto" class="block font-bold">Precio del Boleto:</label>
            <input type="number" step="0.01" id="precio_boleto" name="precio_boleto" class="w-full border rounded p-2" required placeholder="Ejemplo: 50.00">
        </div>
        <div>
            <label for="cantidad_boletos" class="block font-bold">Cantidad de Boletos:</label>
            <input type="number" id="cantidad_boletos" name="cantidad_boletos" class="w-full border rounded p-2" required placeholder="Ejemplo: 100">
        </div>
        <div>
            <label for="header" class="block font-bold">Imagen del Header:</label>
            <input type="file" id="header" name="header" class="w-full border rounded p-2" accept="image/*" required>
        </div>
        <div>
            <label for="carousel" class="block font-bold">Imágenes del Carousel:</label>
            <input type="file" id="carousel" name="carousel[]" class="w-full border rounded p-2" accept="image/*" multiple>
        </div>
        <div>
            <label for="estado" class="block font-bold">Estado:</label>
            <select id="estado" name="estado" class="w-full border rounded p-2">
                <option value="activa">Activa</option>
                <option value="cerrada">Cerrada</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Guardar
        </button>
    </form>
</x-dashboard-layout>
