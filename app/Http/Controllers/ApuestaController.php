<?php

namespace App\Http\Controllers;

use App\Models\Apuesta;
use App\Models\Juego;
use Illuminate\Http\Request;

class ApuestaController extends Controller
{
    public function index()
    {
        $apuestas = Apuesta::with('juego')->get();
        return view('apuestas.index', compact('apuestas'));
    }

    public function getApuestasByJugadores()
    {
        $apuestas = Apuesta::whereHas('juego', function ($query) {
            $query->where('cantidad_jugadores', '>', 3);
        })->with('juego')->get();
        return view('apuestas.index', compact('apuestas'));
    }

    public function checkDinero()
    {
        $totalCartas = Apuesta::whereHas('juego', function ($query) {
            $query->where('juego_de_cartas', true);
        })->sum('monto');

        $totalNoCartas = Apuesta::whereHas('juego', function ($query) {
            $query->where('juego_de_cartas', false);
        })->sum('monto');

        return view('apuestas.check_dinero', compact('totalCartas', 'totalNoCartas'));
    }

    public function getApuestasByJuego(Request $request)
    {
        $request->validate([
            'juego_id' => 'required|exists:juegos,id',
        ]);

        $juegoId = $request->input('juego_id');
        $apuestas = Apuesta::where('id_juego', $juegoId)->with('juego')->get();
        
        return view('apuestas.index', compact('apuestas'));
    }

    public function create()
    {
        $juegos = Juego::all();
        return view('apuestas.create', compact('juegos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_juego' => 'required|exists:juegos,id',
            'fecha' => 'required|date',
            'monto' => 'required|integer',
        ]);

        Apuesta::create($request->all());

        return redirect()->route('apuestas.index');
    }

    public function edit($id)
    {
        $apuesta = Apuesta::findOrFail($id);
        $juegos = Juego::all();
        return view('apuestas.edit', compact('apuesta', 'juegos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_juego' => 'required|exists:juegos,id',
            'fecha' => 'required|date',
            'monto' => 'required|integer',
        ]);

        $apuesta = Apuesta::findOrFail($id);
        $apuesta->update($request->all());

        return redirect()->route('apuestas.index');
    }

    public function destroy($id)
    {
        $apuesta = Apuesta::findOrFail($id);
        $apuesta->delete();

        return redirect()->route('apuestas.index');
    }
}