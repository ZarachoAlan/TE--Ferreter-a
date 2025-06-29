@extends('layouts.plantilla')
@section('contenido')

<h1>Panel de administración de Productos</h1>

@if(session('mensaje'))
    <div class="alert alert-{{ session('css') }}">
        {{ session('mensaje') }}
    </div>
@endif

<div class="row my-3 d-flex justify-content-between">
    <div class="col text-end">
        <a href="/productos/create" class="btn btn-outline-success">
            <i class="bi bi-plus-square"></i>
            Agregar
        </a>
    </div>
</div>

<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Marca</th>
            <th>Medida</th>
            <th>Rubro</th>
            <th>Cant. Actual</th>
            <th>Precio Venta</th>
            <th>Precio Compra</th>
            <th>% Utilidad</th>
            <th>Proveedor</th>
            <th>Stock Mínimo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id_productos }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->rela_marcas }}</td>
            <td>{{ $producto->rela_medidas }}</td>
            <td>{{ $producto->rela_rubro }}</td>
            <td>{{ $producto->cantidad_actual }}</td>
            <td>${{ $producto->precio_venta }}</td>
            <td>${{ $producto->precio_compra }}</td>
            <td>{{ $producto->porcentaje_utilidad }}%</td>
            <td>{{ $producto->rela_proveedor }}</td>
            <td>{{ $producto->cantidad_minima }}</td>
            <td>
                <a href="/productos/edit/{{ $producto->id_productos }}" class="btn btn-outline-primary me-1">
                    <i class="bi bi-pencil-square"></i> Modificar
                </a>
                <a href="/productos/delete/{{ $producto->id_productos }}" class="btn btn-outline-danger me-1">
                    <i class="bi bi-trash"></i> Eliminar
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
