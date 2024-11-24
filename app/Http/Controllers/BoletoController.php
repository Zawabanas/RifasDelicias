<?php

namespace App\Http\Controllers;

use App\Models\Boleto;
use App\Models\Rifa;
use Illuminate\Http\Request;

class BoletoController extends Controller
{
    public function index(Request $request)
    {
        $query = Boleto::with('rifa', 'cliente');

        if ($request->has('search') && $request->search) {
            $query->where('numero', 'like', '%' . $request->search . '%')
                ->orWhereHas('rifa', function ($q) use ($request) {
                    $q->where('nombre', 'like', '%' . $request->search . '%');
                });
        }

        $boletos = $query->paginate(10);
        return view('boletos.index', compact('boletos'));
    }

    public function show($id)
    {
        // Busca el boleto por su ID
        $boleto = Boleto::findOrFail($id);

        // Retorna la vista con los detalles del boleto
        return view('boletos.show', compact('boleto'));
    }


    public function create()
    {
        $rifas = Rifa::all(); // Obtener las rifas disponibles
        return view('boletos.create', compact('rifas'));
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $data = $request->validate([
            'rifa_id' => 'required|exists:rifas,id',
            'estado' => 'required|in:disponible,vendido',
            'cliente_id' => 'nullable|exists:clientes,id',
        ]);

        // Encuentra el último boleto para la rifa seleccionada
        $ultimoBoleto = Boleto::where('rifa_id', $data['rifa_id'])->orderBy('numero', 'desc')->first();

        // Determina el siguiente número
        $nuevoNumero = $ultimoBoleto ? $ultimoBoleto->numero + 1 : 1;

        // Crea el boleto con el número calculado
        $data['numero'] = $nuevoNumero;

        Boleto::create($data);

        return redirect()->route('boletos.index')->with('success', 'Boleto creado con éxito.');
    }

    public function edit(Boleto $boleto)
    {
        $rifas = Rifa::all();
        return view('boletos.edit', compact('boleto', 'rifas'));
    }

    public function update(Request $request, Boleto $boleto)
    {
        $data = $request->validate([
            'numero' => 'required|unique:boletos,numero,' . $boleto->id . '|max:255',
            'rifa_id' => 'required|exists:rifas,id',
            'estado' => 'required|in:disponible,reservado,vendido',
        ]);

        $boleto->update($data);
        return redirect()->route('boletos.index')->with('success', 'Boleto actualizado con éxito.');
    }

    public function destroy($id)
    {
        // Comentar o eliminar este método
        // $boleto = Boleto::findOrFail($id);
        // $boleto->delete();
        // return redirect()->route('boletos.index')->with('success', 'Boleto eliminado con éxito.');
    }
}
