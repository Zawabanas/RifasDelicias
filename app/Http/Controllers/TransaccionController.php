<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    public function index()
    {
        $transacciones = Transaccion::with('cliente', 'rifa', 'boleto', 'metodoPago')->get();
        return view('transacciones.index', compact('transacciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'rifa_id' => 'required|exists:rifas,id',
            'boleto_id' => 'required|exists:boletos,id',
            'metodo_pago_id' => 'required|exists:metodos_pago,id',
            'monto' => 'required|numeric|min:0',
            'estado' => 'required|in:pendiente,completado',
        ]);

        Transaccion::create($request->all());
        return redirect()->route('transacciones.index')->with('success', 'Transacción registrada.');
    }
}
