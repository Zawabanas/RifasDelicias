<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    public function index()
    {
        $metodos = MetodoPago::all();
        return view('metodos.index', compact('metodos'));
    }

    public function create()
    {
        return view('metodos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_metodo' => 'required|string',
            'detalles' => 'nullable|string',
            'estado' => 'required|in:activo,inactivo',
        ]);

        MetodoPago::create($request->all());
        return redirect()->route('metodos.index')->with('success', 'Método de pago creado exitosamente.');
    }

    public function edit(MetodoPago $metodoPago)
    {
        return view('metodos.edit', compact('metodoPago'));
    }

    public function update(Request $request, MetodoPago $metodoPago)
    {
        $request->validate([
            'nombre_metodo' => 'required|string',
            'detalles' => 'nullable|string',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $metodoPago->update($request->all());
        return redirect()->route('metodos.index')->with('success', 'Método de pago actualizado.');
    }

    public function destroy(MetodoPago $metodoPago)
    {
        $metodoPago->delete();
        return redirect()->route('metodos.index')->with('success', 'Método de pago eliminado.');
    }
}
