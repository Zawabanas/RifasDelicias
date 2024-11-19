<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">{{ isset($contacto) ? 'Editar Contacto' : 'Crear Nuevo Contacto' }}</h1>
    </x-slot>

    <form action="{{ isset($contacto) ? route('contactos.update', $contacto) : route('contactos.store') }}" 
          method="POST" class="space-y-4">
        @csrf
        @if (isset($contacto))
            @method('PUT')
        @endif

        <div>
            <label for="nombre" class="block font-bold">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $contacto->nombre ?? '') }}" 
                   class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="telefono" class="block font-bold">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $contacto->telefono ?? '') }}" 
                   class="w-full border rounded p-2 @error('telefono') border-red-500 @enderror" required>
            @error('telefono')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        

        <div>
            <label for="mensaje" class="block font-bold">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" class="w-full border rounded p-2">{{ old('mensaje', $contacto->mensaje ?? '') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ isset($contacto) ? 'Actualizar' : 'Crear' }}
        </button>
    </form>
</x-dashboard-layout>
