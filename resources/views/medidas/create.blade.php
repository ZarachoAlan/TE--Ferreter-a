@extends('layouts.plantilla')
@section('contenido')

<h1>Alta de Medida</h1>

<div class="alert bg-light p-4 col-8 mx-auto shadow">
    <form action="/medidas/store" method="post">
        @csrf
        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" min="1" max="100" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="abreviatura">Abreviatura</label>
            <input type="text" name="abreviatura" min="1" max="100" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="activo">Activo</label>
            <input type="number" name="activo" min="1" max="100" class="form-control" required>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="/medidas" class="btn btn-outline-secondary">Volver</a>
    </form>
</div>

@endsection
