<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    public function index(Request $request)
    {
        $query = MetodoPago::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('nombre_metodo', 'like', '%' . $request->search . '%')
                ->orWhere('banco', 'like', '%' . $request->search . '%')
                ->orWhere('propietario_cuenta', 'like', '%' . $request->search . '%');
        }

        $metodos = $query->paginate(10);
        return view('metodos_pago.index', compact('metodos'));
    }

    public function show(MetodoPago $metodoPago)
    {
        // Pasar el modelo con el nombre correcto en el compact
        return view('metodos_pago.show', compact('metodoPago'));
    }

    public function create()
    {
        return view('metodos_pago.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_metodo' => 'required|in:' . implode(',', array_keys(MetodoPago::TIPOS_METODOS)),
            'banco' => 'nullable|string|max:255',
            'propietario_cuenta' => 'nullable|string|max:255',
            'numero_tarjeta' => $request->nombre_metodo === 'transferencias bancarias' ? 'required|string|max:255' : 'nullable|string|max:255',
            'clabe' => $request->nombre_metodo === 'depositos en tiendas de servicios' ? 'required|string|max:255' : 'nullable|string|max:255',
            'detalles' => 'nullable|string',
            'estado' => 'required|in:activo,inactivo',
        ]);


        MetodoPago::create($data);
        return redirect()->route('metodos_pago.index')->with('success', 'Método de pago creado con éxito.');
    }

    public function edit($id)
    {
        $metodoPago = MetodoPago::findOrFail($id);
        return view('metodos_pago.edit', compact('metodoPago'));
    }


    public function update(Request $request, $id)
    {
        // Validar los datos
        $data = $request->validate([
            'nombre_metodo' => 'required|in:' . implode(',', array_keys(MetodoPago::TIPOS_METODOS)),
            'banco' => 'nullable|string|max:255',
            'propietario_cuenta' => 'nullable|string|max:255',
            'numero_tarjeta' => $request->nombre_metodo === 'transferencias bancarias' ? 'required|string|max:255' : 'nullable|string|max:255',
            'clabe' => $request->nombre_metodo === 'depositos en tiendas de servicios' ? 'required|string|max:255' : 'nullable|string|max:255',
            'detalles' => 'nullable|string',
            'estado' => 'required|in:activo,inactivo',
        ]);

        // Buscar y actualizar el método de pago
        $metodoPago = MetodoPago::findOrFail($id);
        $metodoPago->update($data);

        // Redirigir con un mensaje de éxito
        return redirect()->route('metodos_pago.index')->with('success', 'Método de pago actualizado con éxito.');
    }


    public function destroy(MetodoPago $metodoPago)
    {
        $metodoPago->delete();
        return redirect()->route('metodos_pago.index')->with('success', 'Método de pago eliminado con éxito.');
    }
}
