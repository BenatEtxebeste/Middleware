<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BibliotecaController extends Controller
{
    public function index()
    {
        $juegos = Biblioteca::all(); // Obtén todos los juegos de la base de datos
        return view('biblioteca')->with('juegos', $juegos);
    }

    public function create()
    {
        return view('añadirJuego');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'url' => 'required',
        ]);

        Biblioteca::create([
            'user_id' => Auth::user()->id,
            'nombre' => $request->input('nombre'),
            'imagen' => $request->input('url')
        ]);

        return redirect()->route('biblioteca');
    }

    public function destroy(Biblioteca $juego)
    {
        $juego->delete();

        return redirect()->route('biblioteca');
    }

    public function edit(Biblioteca $juego)
    {
        return view('editarJuego', compact('juego'));
    }

    public function update(Request $request, Biblioteca $juego)
    {
        $request->validate([
            'nombre' => 'required|string', 'url' => 'required|string' // Otras reglas de validación según sea necesario
        ]);

        $juego->update([
            'nombre' => $request->input('nombre'),
            'imagen' => $request->input('url')
        ]);

        return redirect()->route('biblioteca');
    }
}
