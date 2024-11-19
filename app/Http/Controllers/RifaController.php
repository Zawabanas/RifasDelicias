<?php

namespace App\Http\Controllers;

use App\Models\Rifa;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class RifaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $rifas = Rifa::with('imagenes')
            ->when($search, function ($query, $search) {
                $query->where('nombre', 'like', "%$search%");
            })
            ->get();

        return view('rifas.index', compact('rifas', 'search'));
    }

    public function show(Rifa $rifa)
    {
        // Cargar la relación con imágenes y boletos
        $rifa->load(['imagenes', 'boletos']);

        return view('rifas.show', compact('rifa'));
    }



    public function create()
    {
        // Muestra el formulario para crear una nueva rifa
        return view('rifas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'precio_boleto' => 'required|numeric|min:0',
            'estado' => 'required|in:activa,cerrada',
            'cantidad_boletos' => 'required|integer|min:1',
            'header' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'carousel.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Crear la Rifa
        $rifa = Rifa::create($request->only([
            'nombre',
            'descripcion',
            'fecha_inicio',
            'fecha_fin',
            'precio_boleto',
            'estado',
            'cantidad_boletos',
        ]));

        // Subir y asociar la imagen del Header
        if ($request->hasFile('header')) {
            $headerPath = $request->file('header')->store('uploads/rifas', 'public');
            $header = Imagen::create([
                'ruta' => $headerPath,
            ]);
            $rifa->imagenes()->attach($header->id, ['tipo' => 'header']);
        }

        // Subir y asociar las imágenes del Carousel
        if ($request->hasFile('carousel')) {
            foreach ($request->file('carousel') as $image) {
                $carouselPath = $image->store('uploads/rifas', 'public');
                $carousel = Imagen::create([
                    'ruta' => $carouselPath,
                ]);
                $rifa->imagenes()->attach($carousel->id, ['tipo' => 'carousel']);
            }
        }
        // Crear boletos para la rifa
        for ($i = 1; $i <= $request->cantidad_boletos; $i++) {
            $rifa->boletos()->create(['numero' => $i]);
        }

        return redirect()->route('rifas.index')->with('success', 'Rifa creada exitosamente con imágenes y boletos.');
    }

    public function edit(Rifa $rifa)
    {
        // Muestra el formulario para editar una rifa
        return view('rifas.edit', compact('rifa'));
    }
    public function update(Request $request, Rifa $rifa)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'precio_boleto' => 'required|numeric|min:0',
            'cantidad_boletos' => 'required|integer|min:1',
            'estado' => 'required|in:activa,cerrada',
        ]);

        // Actualizar la rifa
        $rifa->update($request->only([
            'nombre',
            'descripcion',
            'fecha_inicio',
            'fecha_fin',
            'precio_boleto',
            'estado',
            'cantidad_boletos',
        ]));

        // Verificar y crear boletos faltantes
        $cantidadActual = $rifa->boletos()->count();
        $cantidadRequerida = $request->input('cantidad_boletos');

        if ($cantidadRequerida > $cantidadActual) {
            $boletosFaltantes = $cantidadRequerida - $cantidadActual;
            for ($i = 1; $i <= $boletosFaltantes; $i++) {
                $rifa->boletos()->create([
                    'numero' => $cantidadActual + $i, // Genera un número secuencial
                    'estado' => 'disponible', // Estado inicial
                ]);
            }
        } elseif ($cantidadRequerida < $cantidadActual) {
            // Eliminar boletos sobrantes
            $boletosSobrantes = $cantidadActual - $cantidadRequerida;
            $rifa->boletos()
                ->whereNull('cliente_id') // Solo eliminar boletos no asignados
                ->latest('id')
                ->take($boletosSobrantes)
                ->delete();
        }

        return redirect()->route('rifas.index')->with('success', 'Rifa actualizada exitosamente.');
    }


    public function destroy(Rifa $rifa)
    {
        // Elimina una rifa
        $rifa->delete();

        return redirect()->route('rifas.index')->with('success', 'Rifa eliminada exitosamente.');
    }
}
