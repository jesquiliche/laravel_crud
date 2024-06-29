<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Tipo;
use App\Models\Denominacion;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::paginate(1); // Cambiar '10' por el número de productos por página que desees
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipo::all();
        $denominaciones = Denominacion::all();
        return view('productos.create', compact('tipos', 'denominaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'bodega' => 'nullable|string|max:255',
            'descripcion' => 'required|string',
            'maridaje' => 'required|string',
            'precio' => 'required|numeric',
            'graduacion' => 'required|numeric',
            'ano' => 'nullable|integer',
            'sabor' => 'nullable|string|max:255',
            'tipo_id' => 'required|exists:tipos,id',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'denominacion_id' => 'required|exists:denominaciones,id',
        ]);

        // Procesar y guardar la imagen en Cloudinary
        if ($request->hasFile('file')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('file')->getRealPath())->getSecurePath();
        }

        Producto::create([
            'nombre' => $request->nombre,
            'bodega' => $request->bodega,
            'descripcion' => $request->descripcion,
            'maridaje' => $request->maridaje,
            'precio' => $request->precio,
            'graduacion' => $request->graduacion,
            'ano' => $request->ano,
            'sabor' => $request->sabor,
            'tipo_id' => $request->tipo_id,
            'imagen' => $uploadedFileUrl ?? null,
            'denominacion_id' => $request->denominacion_id,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
        }
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $tipos = Tipo::all();
        $denominaciones = Denominacion::all();

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
        }

        return view('productos.edit', compact('producto', 'tipos', 'denominaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'bodega' => 'nullable|string|max:255',
            'descripcion' => 'required|string',
            'maridaje' => 'required|string',
            'precio' => 'required|numeric',
            'graduacion' => 'required|numeric',
            'ano' => 'nullable|integer',
            'sabor' => 'nullable|string|max:255',
            'tipo_id' => 'required|exists:tipos,id',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'denominacion_id' => 'required|exists:denominaciones,id',
        ]);

        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
        }

        // Procesar y guardar la nueva imagen si se ha cargado
        if ($request->hasFile('file')) {
            // Guardar la nueva imagen en Cloudinary
            $uploadedFileUrl = Cloudinary::upload($request->file('file')->getRealPath())->getSecurePath();
            $producto->imagen = $uploadedFileUrl;
        }

        $producto->update([
            'nombre' => $request->nombre,
            'bodega' => $request->bodega,
            'descripcion' => $request->descripcion,
            'maridaje' => $request->maridaje,
            'precio' => $request->precio,
            'graduacion' => $request->graduacion,
            'ano' => $request->ano,
            'sabor' => $request->sabor,
            'tipo_id' => $request->tipo_id,
            'imagen' => $producto->imagen ?? null,
            'denominacion_id' => $request->denominacion_id,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
        }

        // No se puede eliminar directamente de Cloudinary con el SDK sin conocer el public_id
        // Por lo que en este ejemplo no se eliminan imágenes de Cloudinary.

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
