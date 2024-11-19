<?php

namespace App\Http\Controllers;

use App\Models\Boleto;
use Illuminate\Http\Request;

class BoletoController extends Controller
{
    public function index()
    {
        $boletos = Boleto::all();
        return view('boletos.index', compact('boletos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rifa_id' => 'required|exists:rifas,id',
            'cliente_id' => 'nullable|exists:clientes,id',
            'numero' => 'required|integer',
            'estado' => 'required|in:disponible,vendido',
        ]);

        Boleto::create($request->all());
        return redirect()->route('boletos.index')->with('success', 'Boleto creado.');
    }
}
