@extends('layouts.crud')

@section('content')
<div class="pt-20 w-10/12 mx-auto">
    <h1 class="text-3xl text-center font-semibold mb-5">Editar Producto</h1>
    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">¡Oops! Hubo algunos problemas con los datos ingresados.</strong>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="w-full border border-gray-300 p-2 rounded @error('nombre') border-red-500 @enderror" value="{{ old('nombre', $producto->nombre) }}" required>
            @error('nombre')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="bodega" class="block text-gray-700 font-bold mb-2">Bodega</label>
            <input type="text" name="bodega" id="bodega" class="w-full border border-gray-300 p-2 rounded @error('bodega') border-red-500 @enderror" value="{{ old('bodega', $producto->bodega) }}">
            @error('bodega')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="w-full border border-gray-300 p-2 rounded @error('descripcion') border-red-500 @enderror" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
            @error('descripcion')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="maridaje" class="block text-gray-700 font-bold mb-2">Maridaje</label>
            <textarea name="maridaje" id="maridaje" class="w-full border border-gray-300 p-2 rounded @error('maridaje') border-red-500 @enderror" required>{{ old('maridaje', $producto->maridaje) }}</textarea>
            @error('maridaje')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="precio" class="block text-gray-700 font-bold mb-2">Precio</label>
            <input type="number" name="precio" id="precio" class="w-full border border-gray-300 p-2 rounded @error('precio') border-red-500 @enderror" value="{{ old('precio', $producto->precio) }}" required>
            @error('precio')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="graduacion" class="block text-gray-700 font-bold mb-2">Graduación</label>
            <input type="number" name="graduacion" id="graduacion" class="w-full border border-gray-300 p-2 rounded @error('graduacion') border-red-500 @enderror" value="{{ old('graduacion', $producto->graduacion) }}" required>
            @error('graduacion')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="ano" class="block text-gray-700 font-bold mb-2">Año</label>
            <input type="number" name="ano" id="ano" class="w-full border border-gray-300 p-2 rounded @error('ano') border-red-500 @enderror" value="{{ old('ano', $producto->ano) }}">
            @error('ano')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="sabor" class="block text-gray-700 font-bold mb-2">Sabor</label>
            <input type="text" name="sabor" id="sabor" class="w-full border border-gray-300 p-2 rounded @error('sabor') border-red-500 @enderror" value="{{ old('sabor', $producto->sabor) }}">
            @error('sabor')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="tipo_id" class="block text-gray-700 font-bold mb-2">Tipo</label>
            <select name="tipo_id" id="tipo_id" class="w-full border border-gray-300 p-2 rounded @error('tipo_id') border-red-500 @enderror" required>
                <option value="">Selecciona un tipo</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}" @if(old('tipo_id', $producto->tipo_id) == $tipo->id) selected @endif>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
            @error('tipo_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="denominacion_id" class="block text-gray-700 font-bold mb-2">Denominación</label>
            <select name="denominacion_id" id="denominacion_id" class="w-full border border-gray-300 p-2 rounded @error('denominacion_id') border-red-500 @enderror" required>
                <option value="">Selecciona una denominación</option>
                @foreach($denominaciones as $denominacion)
                    <option value="{{ $denominacion->id }}" @if(old('denominacion_id', $producto->denominacion_id) == $denominacion->id) selected @endif>{{ $denominacion->nombre }}</option>
                @endforeach
            </select>
            @error('denominacion_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="file" class="block text-gray-700 font-bold mb-2">Imagen</label>
            <input type="file" name="file" id="file" class="w-full border border-gray-300 p-2 rounded @error('file') border-red-500 @enderror">
            @if($producto->imagen)
                <img src="{{ $producto->imagen }}" alt="Imagen del Producto" class="mt-4">
            @endif
        </div>
        <button type="submit" class="bg-blue-600 text-white rounded py-2 px-4">Actualizar</button>
    </form>
</div>
@endsection
