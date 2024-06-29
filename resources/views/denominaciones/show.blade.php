@extends('layouts.crud')

@section('content')
<div class="pt-20 w-10/12 mx-auto">
    <h1 class="text-3xl text-center font-semibold mb-5">Detalles de la Denominación</h1>
    <div class="bg-white p-6 rounded shadow-md">
        <p><strong>Nombre:</strong> {{ $denominacion->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $denominacion->descripcion }}</p>
        <a href="{{ route('denominaciones.index') }}" class="bg-blue-600 text-white rounded py-2 px-4 inline-block mt-4">Volver</a>
    </div>
</div>
@endsection
