@extends('layouts.crud')

@section('content')
    <div class="pt-20 w-10/12 mx-auto">
        <h1 class="text-3xl text-center font-semibold mb-5">Tipos</h1>
        <a href="{{ route('tipos.create') }}" class="bg-blue-600 text-white rounded py-2 px-4 mb-4 inline-block">Crear
            Tipo</a>
        @if (session('success'))
            <div class="bg-green-100 text-green-800 border border-green-200 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Nombre</th>
                    <th class="px-4 py-2 border-b">Descripción</th>
                    <th class="px-4 py-2 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipos as $tipo)
                    <tr>
                        <td class="border-t px-4 py-2">{{ $tipo->id }}</td>
                        <td class="border-t px-4 py-2">{{ $tipo->nombre }}</td>
                        <td class="border-t px-4 py-2">{{ $tipo->descripcion }}</td>
                        <td class="border-t px-4 py-2 flex space-x-6 justify-center">
                            <a href="{{ route('tipos.show', $tipo->id) }}"
                                class="bg-blue-500 text-white rounded py-1 px-2">Ver</a>
                            <a href="{{ route('tipos.edit', $tipo->id) }}"
                                class="bg-yellow-500 text-white rounded py-1 px-2">Editar</a>
                            <form action="{{ route('tipos.destroy', $tipo->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white rounded py-1 px-2">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
