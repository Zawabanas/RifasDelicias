<x-dashboard-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold">Editar Método de Pago</h1>
    </x-slot>

    <form action="{{ route('metodos_pago.update', $metodoPago->id) }}" method="POST" class="space-y-4 mt-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre_metodo" class="block font-bold">Tipo de Método:</label>
            <select id="nombre_metodo" name="nombre_metodo" class="w-full border rounded p-2" required onchange="toggleFields()">
                <option value="transferencias bancarias" {{ $metodoPago->nombre_metodo === 'transferencias bancarias' ? 'selected' : '' }}>Transferencias Bancarias</option>
                <option value="depositos en tiendas de servicios" {{ $metodoPago->nombre_metodo === 'depositos en tiendas de servicios' ? 'selected' : '' }}>Depósitos en Tiendas de Servicios</option>
            </select>
        </div>

        <div id="banco_field">
            <label for="banco" id="banco_label" class="block font-bold">Banco:</label>
            <input type="text" id="banco" name="banco" value="{{ $metodoPago->banco }}" class="w-full border rounded p-2">
        </div>

        <div id="propietario_cuenta_field">
            <label for="propietario_cuenta" class="block font-bold">Propietario de la Cuenta:</label>
            <input type="text" id="propietario_cuenta" name="propietario_cuenta" value="{{ $metodoPago->propietario_cuenta }}" class="w-full border rounded p-2">
        </div>

        <div id="numero_tarjeta_field">
            <label for="numero_tarjeta" class="block font-bold">Número de Tarjeta:</label>
            <input type="text" id="numero_tarjeta" name="numero_tarjeta" value="{{ $metodoPago->numero_tarjeta }}" class="w-full border rounded p-2" maxlength="16" pattern="\d*">
        </div>

        <div id="clabe_field">
            <label for="clabe" class="block font-bold">CLABE:</label>
            <input type="text" id="clabe" name="clabe" value="{{ $metodoPago->clabe }}" class="w-full border rounded p-2" maxlength="18" pattern="\d*">
        </div>

        <div>
            <label for="detalles" class="block font-bold">Detalles:</label>
            <textarea id="detalles" name="detalles" class="w-full border rounded p-2">{{ $metodoPago->detalles }}</textarea>
        </div>

        <div>
            <label for="estado" class="block font-bold">Estado:</label>
            <select id="estado" name="estado" class="w-full border rounded p-2">
                <option value="activo" {{ $metodoPago->estado === 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ $metodoPago->estado === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar Cambios</button>
    </form>

    <script>
        function toggleFields() {
            const metodo = document.getElementById('nombre_metodo').value;
    
            const bancoLabel = document.getElementById('banco_label');
            const tarjetaField = document.getElementById('numero_tarjeta_field');
            const clabeField = document.getElementById('clabe_field');
    
            // Mostrar/ocultar y cambiar etiquetas según el tipo de método de pago
            if (metodo === 'transferencias bancarias') {
                bancoLabel.innerText = 'Banco:';
                tarjetaField.style.display = 'block';
                clabeField.style.display = 'none';
            } else if (metodo === 'depositos en tiendas de servicios') {
                bancoLabel.innerText = 'Tienda o Dependencia:';
                tarjetaField.style.display = 'none';
                clabeField.style.display = 'block';
            }
        }
    
        // Ejecutar el script al cargar la página para inicializar el estado
        document.addEventListener('DOMContentLoaded', toggleFields);
    </script>
    
</x-dashboard-layout>
