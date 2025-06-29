@extends('layouts.plantilla')
@section('contenido')

<h1>Panel de administración de Condición IVA</h1>

@if(session('mensaje'))
    <div class="alert alert-{{ session('css') }}">
        {{ session('mensaje') }}
    </div>
@endif

<div class="row my-3 d-flex justify-content-between">
    <div class="col text-end">
        <a href="/condicionIVA/create" class="btn btn-outline-success">
            <i class="bi bi-plus-square"></i> Agregar
        </a>
    </div>
</div>

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($condiciones as $cond)
        <tr>
            <td>{{ $cond->id_condicioniva }}</td>
            <td>{{ $cond->descripcion }}</td>
            <td>
                <a href="/condicionIVA/edit/{{ $cond->id_condicioniva }}" class="btn btn-outline-primary btn-sm">Modificar</a>
                <a href="/condicionIVA/delete/{{ $cond->id_condicioniva }}" class="btn btn-outline-danger btn-sm">Eliminar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
