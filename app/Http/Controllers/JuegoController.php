<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    public function index()
    {
        $juegos = Juego::all();
        return view('juegos.index', compact('juegos'));
    }

    public function create()
    {
        return view('juegos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:45',
            'cantidad_jugadores' => 'required|integer',
            'juego_de_cartas' => 'required|boolean',
        ]);

        Juego::create($request->all());

        return redirect()->route('juegos.index');
    }

    public function edit($id)
    {
        $juego = Juego::findOrFail($id);
        return view('juegos.edit', compact('juego'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:45',
            'cantidad_jugadores' => 'required|integer',
            'juego_de_cartas' => 'required|boolean',
        ]);

        $juego = Juego::findOrFail($id);
        $juego->update($request->all());

        return redirect()->route('juegos.index');
    }

    public function destroy($id)
    {
        $juego = Juego::findOrFail($id);
        $juego->delete();

        return redirect()->route('juegos.index');
    }
}