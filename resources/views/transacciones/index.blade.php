@extends('dashboard')

@section('dashboard-content')
<h1 class="text-xl font-bold mb-4">Transacciones</h1>
<table class="table-auto w-full">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Rifa</th>
            <th>Monto</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transacciones as $transaccion)
        <tr>
            <td>{{ $transaccion->id }}</td>
            <td>{{ $transaccion->cliente->nombre }}</td>
            <td>{{ $transaccion->rifa->nombre }}</td>
            <td>${{ $transaccion->monto }}</td>
            <td>{{ $transaccion->estado }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
