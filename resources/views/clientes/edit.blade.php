@extends('layouts.plantilla')
@section('contenido')

<h1>Modificación de Cliente</h1>

<div class="alert bg-light p-4 col-10 mx-auto shadow">
    <form action="/clientes/update" method="post">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{ $cliente->id_clientes }}">

        <div class="row mb-3">
            <div class="col">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="{{ $cliente->nombre }}" class="form-control" required>
            </div>
            <div class="col">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" value="{{ $cliente->apellido }}" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="dni">DNI</label>
                <input type="number" name="dni" value="{{ $cliente->dni }}" class="form-control" required>
            </div>
            <div class="col">
                <label for="fechanacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fechanacimiento" value="{{ $cliente->fechanacimiento }}" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="rela_provincia">Provincia</label>
                <input type="text" name="rela_provincia" value="{{ $cliente->rela_provincia }}" class="form-control" required>
            </div>
            <div class="col">
                <label for="localidad">Localidad</label>
                <input type="text" name="localidad" value="{{ $cliente->localidad }}" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" value="{{ $cliente->direccion }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cuit">CUIT</label>
            <input type="number" name="cuit" value="{{ $cliente->cuit }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" value="{{ $cliente->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefono">Teléfono</label>
            <input type="number" name="telefono" value="{{ $cliente->telefono }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="rela_condicioniva">Condición IVA</label>
            <input type="text" name="rela_condicioniva" value="{{ $cliente->rela_condicioniva }}" class="form-control" required>
        </div>

        <button class="btn btn-success px-4">Actualizar</button>
        <a href="/clientes" class="btn btn-outline-secondary">Volver</a>
    </form>
</div>

@endsection
