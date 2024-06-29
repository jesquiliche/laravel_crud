@extends('layouts.crud')

@section('content')
<div class="pt-20 w-10/12 mx-auto">
    <h1 class="text-3xl text-center font-semibold mb-5">Editar Denominación</h1>
    <form action="{{ route('denominaciones.update', $denominacion->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="w-full border border-gray-300 p-2 rounded" value="{{ $denominacion->nombre }}" required>
        </div>
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="w-full border border-gray-300 p-2 rounded">{{ $denominacion->descripcion }}</textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white rounded py-2 px-4">Actualizar</button>
    </form>
</div>
@endsection
