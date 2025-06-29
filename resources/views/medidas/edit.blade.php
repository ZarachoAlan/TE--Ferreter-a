@extends('layouts.plantilla')
@section('contenido')

<h1>Modificar Medida</h1>

<div class="alert bg-light p-4 col-8 mx-auto shadow">
    <form action="/medidas/update" method="post">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{ $medida->id_medida }}">

        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" class="form-control" value="{{ $medida->descripcion }}" required>
        </div>

        <div class="mb-3">
            <label for="abreviatura">Abreviatura</label>
            <input type="text" name="abreviatura" class="form-control" value="{{ $medida->abreviatura }}" required>
        </div>

        <div class="mb-3">
            <label for="activo">Activo</label>
            <input type="number" name="activo" class="form-control" value="{{ $medida->activo }}" required>
        </div>

        <button class="btn btn-success">Actualizar</button>
        <a href="/medidas" class="btn btn-outline-secondary">Volver</a>
    </form>
</div>

@endsection
