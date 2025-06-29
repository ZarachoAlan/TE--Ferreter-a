@extends('layouts.plantilla')
@section('contenido')

<h1>Listado de Medidas</h1>

@if(session('mensaje'))
    <div class="alert alert-{{ session('css') }}">
        {{ session('mensaje') }}
    </div>
@endif

<div class="mb-3 text-end">
    <a href="/medidas/create" class="btn btn-outline-success">
        <i class="bi bi-plus-square"></i> Agregar
    </a>
</div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Abreviatura</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($medidas as $medida)
        <tr>
            <td>{{ $medida->id_medida }}</td>
            <td>{{ $medida->descripcion }}</td>
            <td>{{ $medida->abreviatura }}</td>
            <td>{{ $medida->activo }}</td>
            <td>
                    <a href="/medidas/edit/{{ $medida->id_medida }}" class="btn btn-outline-primary me-1">
                        <i class="bi bi-pencil-square"></i>
                        Modificar
                    </a>
                    <a href="/medidas/delete/{{ $medida->id_medida }}" class="btn btn-outline-danger me-1">
                        <i class="bi bi-trash"></i>
                        &nbsp;Eliminar&nbsp;
                    </a>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
