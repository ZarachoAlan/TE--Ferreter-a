@extends('layouts.plantilla')
@section('contenido')

<h1>Alta de Cliente</h1>

<div class="alert bg-light p-4 col-10 mx-auto shadow">
    <form action="/clientes/store" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="col">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="dni">DNI</label>
                <input type="number" name="dni" class="form-control" required>
            </div>
            <div class="col">
                <label for="fechanacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fechanacimiento" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="rela_provincia">Provincia</label>
                <input type="text" name="rela_provincia" class="form-control" required>
            </div>
            <div class="col">
                <label for="localidad">Localidad</label>
                <input type="text" name="localidad" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cuit">CUIT</label>
            <input type="number" name="cuit" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefono">Teléfono</label>
            <input type="number" name="telefono" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="rela_condicioniva">Condición IVA</label>
            <input type="text" name="rela_condicioniva" class="form-control" required>
        </div>

        <button class="btn btn-success px-4">Guardar</button>
        <a href="/clientes" class="btn btn-outline-secondary">Volver</a>
    </form>
</div>

@endsection
