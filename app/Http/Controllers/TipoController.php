<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Tipo::create($request->all());
        return redirect()->route('tipos.index')->with('success', 'Tipo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tipo=Tipo::find($id);
        return view('tipos.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipo=Tipo::find($id);
        return view('tipos.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipo $tipo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $tipo->update($request->all());
        return redirect()->route('tipos.index')->with('success', 'Tipo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        return redirect()->route('tipos.index')->with('success', 'Tipo eliminado exitosamente.');
    }
}
