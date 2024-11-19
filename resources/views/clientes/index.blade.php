@extends('dashboard')

@section('dashboard-content')
<h1 class="text-xl font-bold mb-4">Gestión de Clientes</h1>
<a href="{{ route('clientes.create') }}" class="btn btn-primary mb-4">Agregar Cliente</a>
<table class="table-auto w-full">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>
                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
