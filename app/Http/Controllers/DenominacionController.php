<?php

namespace App\Http\Controllers;

use App\Models\Denominacion;
use Illuminate\Http\Request;

class DenominacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $denominaciones = Denominacion::all();
        return view('denominaciones.index', compact('denominaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('denominaciones.create');
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

        Denominacion::create($request->all());
        return redirect()->route('denominaciones.index')->with('success', 'Denominación creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        $denominacion=Denominacion::find($id);
        return view('denominaciones.show', compact('denominacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $denominacion=Denominacion::find($id);
        return view('denominaciones.edit', compact('denominacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $denominacion=Denominacion::find($id);
        $denominacion->update($request->all());
        return redirect()->route('denominaciones.index')->with('success', 'Denominación actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
     $denominacion=Denominacion::find($id);
        $denominacion->delete();
        return redirect()->route('denominaciones.index')->with('success', 'Denominación eliminada exitosamente.');
    }
}
