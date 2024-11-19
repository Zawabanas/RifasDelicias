<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Rifa;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function index()
    {
        $imagenes = Imagen::with('rifas')->get();
        return view('imagenes.index', compact('imagenes'));
    }

    public function create()
    {
        $rifas = Rifa::all(); // Lista de rifas para asociar imágenes
        return view('imagenes.create', compact('rifas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rifa_id' => 'required|exists:rifas,id',
            'ruta' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tipo' => 'required|in:header,carrusel',
        ]);

        $path = $request->file('ruta')->store('uploads/imagenes', 'public');

        // Crear la imagen y asociarla a la rifa
        $imagen = Imagen::create([
            'ruta' => $path,
        ]);

        $rifa = Rifa::findOrFail($request->rifa_id);
        $rifa->imagenes()->attach($imagen->id, ['tipo' => $request->tipo]);

        return redirect()->route('imagenes.index')->with('success', 'Imagen subida exitosamente.');
    }

    public function destroy(Imagen $imagen)
    {
        // Eliminar la relación en la tabla intermedia antes de eliminar la imagen
        $imagen->rifas()->detach();

        $imagen->delete();
        return redirect()->route('imagenes.index')->with('success', 'Imagen eliminada.');
    }
}
