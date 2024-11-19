<?php


namespace App\Http\Controllers;

use App\Models\Rifa;
use App\Models\Cliente;
use App\Models\Boleto;
use App\Models\Transaccion;

class DashboardController extends Controller
{
    public function index()
    {
        $rifasActivas = Rifa::where('estado', 'activa')->count();
        $totalClientes = Cliente::count();
        $boletosVendidos = Boleto::count();
        $totalTransacciones = Transaccion::sum('monto');

        return view('dashboard', compact('rifasActivas', 'totalClientes', 'boletosVendidos', 'totalTransacciones'));
    }
}
