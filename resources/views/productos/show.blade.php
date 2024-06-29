@extends('layouts.crud')

@section('content')
<div class="pt-20 w-10/12 mx-auto">
    <h1 class="text-3xl text-center font-semibold mb-5">Detalles del Producto</h1>
    <div class="bg-white p-6 rounded shadow-md">
        <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
        <p><strong>Bodega:</strong> {{ $producto->bodega }}</p>
        <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
        <p><strong>Maridaje:</strong> {{ $producto->maridaje }}</p>
        <p><strong>Precio:</strong> {{ $producto->precio }}</p>
        <p><strong>Graduación:</strong> {{ $producto->graduacion }}</p>
        <p><strong>Año:</strong> {{ $producto->ano }}</p>
        <p><strong>Sabor:</strong> {{ $producto->sabor }}</p>
        <p><strong>Tipo:</strong> {{ $producto->tipo->nombre }}</p>
        <p><strong>Denominación:</strong> {{ $producto->denominacion->nombre }}</p>
        @if($producto->imagen)
            <img src="{{ $producto->imagen }}" alt="Imagen del Producto" class="mt-4">
        @endif
        <a href="{{ route('productos.index') }}" class="bg-blue-600 text-white rounded py-2 px-4 inline-block mt-4">Volver</a>
    </div>
</div>
@endsection
