@extends('layouts.plantilla')
@section('contenido')

<h1>Listado de Clientes</h1>

@if(session('mensaje'))
    <div class="alert alert-{{ session('css') }}">
        {{ session('mensaje') }}
    </div>
@endif

<div class="text-end mb-3">
    <a href="/clientes/create" class="btn btn-outline-success">
        <i class="bi bi-plus-square"></i> Agregar Cliente
    </a>
</div>

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Fecha Nac.</th>
            <th>Localidad</th>
            <th>Dirección</th>
            <th>CUIT</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id_clientes }}</td>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->apellido }}</td>
            <td>{{ $cliente->dni }}</td>
            <td>{{ $cliente->fechanacimiento }}</td>
            <td>{{ $cliente->localidad }}</td>
            <td>{{ $cliente->direccion }}</td>
            <td>{{ $cliente->cuit }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>
                <a href="/clientes/edit/{{ $cliente->id_clientes }}" class="btn btn-outline-primary btn-sm">Editar</a>
                <a href="/clientes/delete/{{ $cliente->id_clientes }}" class="btn btn-outline-danger btn-sm">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
