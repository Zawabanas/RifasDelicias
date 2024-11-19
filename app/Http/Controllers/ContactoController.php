<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $contactos = Contacto::all();
        return view('contactos.index', compact('contactos'));
    }

    public function create()
    {
        return view('contactos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20|unique:contactos,telefono',
            'mensaje' => 'nullable|string',
        ]);

        Contacto::create($request->all());

        return redirect()->route('contactos.index')->with('success', 'Contacto creado exitosamente.');
    }

    public function update(Request $request, Contacto $contacto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20|unique:contactos,telefono,' . $contacto->id,
            'mensaje' => 'nullable|string',
        ]);

        $contacto->update($request->all());

        return redirect()->route('contactos.index')->with('success', 'Contacto actualizado exitosamente.');
    }

    public function show(Contacto $contacto)
    {
        return view('contactos.show', compact('contacto'));
    }

    public function edit(Contacto $contacto)
    {
        return view('contactos.edit', compact('contacto'));
    }


    public function destroy(Contacto $contacto)
    {
        $contacto->delete();

        return redirect()->route('contactos.index')->with('success', 'Contacto eliminado exitosamente.');
    }
}
