@extends('layouts.crud')

@section('content')
<div class="pt-20 w-10/12 mx-auto">
    <h1 class="text-3xl text-center font-semibold mb-5">Crear Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="w-full border border-gray-300 p-2 rounded @error('nombre') border-red-500 @enderror" value="{{ old('nombre') }}" required>
            @error('nombre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="bodega" class="block text-gray-700 font-bold mb-2">Bodega</label>
            <input type="text" name="bodega" id="bodega" class="w-full border border-gray-300 p-2 rounded @error('bodega') border-red-500 @enderror" value="{{ old('bodega') }}">
            @error('bodega')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="w-full border border-gray-300 p-2 rounded @error('descripcion') border-red-500 @enderror" required>{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="maridaje" class="block text-gray-700 font-bold mb-2">Maridaje</label>
            <textarea name="maridaje" id="maridaje" class="w-full border border-gray-300 p-2 rounded @error('maridaje') border-red-500 @enderror" required>{{ old('maridaje') }}</textarea>
            @error('maridaje')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="precio" class="block text-gray-700 font-bold mb-2">Precio</label>
            <input type="number" name="precio" id="precio" class="w-full border border-gray-300 p-2 rounded @error('precio') border-red-500 @enderror" value="{{ old('precio') }}" required>
            @error('precio')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="graduacion" class="block text-gray-700 font-bold mb-2">Graduación</label>
            <input type="number" name="graduacion" id="graduacion" class="w-full border border-gray-300 p-2 rounded @error('graduacion') border-red-500 @enderror" value="{{ old('graduacion') }}" required>
            @error('graduacion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="ano" class="block text-gray-700 font-bold mb-2">Año</label>
            <input type="number" name="ano" id="ano" class="w-full border border-gray-300 p-2 rounded @error('ano') border-red-500 @enderror" value="{{ old('ano') }}">
            @error('ano')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="sabor" class="block text-gray-700 font-bold mb-2">Sabor</label>
            <input type="text" name="sabor" id="sabor" class="w-full border border-gray-300 p-2 rounded @error('sabor') border-red-500 @enderror" value="{{ old('sabor') }}">
            @error('sabor')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="tipo_id" class="block text-gray-700 font-bold mb-2">Tipo</label>
            <select name="tipo_id" id="tipo_id" class="w-full border border-gray-300 p-2 rounded @error('tipo_id') border-red-500 @enderror" required>
                <option value="">Seleccionar Tipo</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}" {{ old('tipo_id') == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
            @error('tipo_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="denominacion_id" class="block text-gray-700 font-bold mb-2">Denominación</label>
            <select name="denominacion_id" id="denominacion_id" class="w-full border border-gray-300 p-2 rounded @error('denominacion_id') border-red-500 @enderror" required>
                <option value="">Seleccionar Denominación</option>
                @foreach($denominaciones as $denominacion)
                    <option value="{{ $denominacion->id }}" {{ old('denominacion_id') == $denominacion->id ? 'selected' : '' }}>{{ $denominacion->nombre }}</option>
                @endforeach
            </select>
            @error('denominacion_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="file" class="block text-gray-700 font-bold mb-2">Imagen</label>
            <input type="file" name="file" id="file" class="w-full border border-gray-300 p-2 rounded @error('file') border-red-500 @enderror">
            @error('file')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white rounded py-2 px-4">Guardar</button>
    </form>
</div>
@endsection
