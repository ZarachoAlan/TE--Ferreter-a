@extends('layouts.plantilla')
@section('contenido')

<h1>Modificación de Condición IVA</h1>

<div class="alert bg-light p-4 col-8 mx-auto shadow">
    <form action="/condicionIVA/update" method="post">
        @method('patch')
        @csrf

        <input type="hidden" name="id" value="{{ $condicion->id_condicioniva }}">

        <div class="form-group mb-3">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" value="{{ $condicion->descripcion }}" required>
        </div>

        <button class="btn btn-success my-3 px-4">Actualizar</button>
        <a href="/condicionIVA" class="btn btn-outline-secondary">Volver</a>
    </form>
</div>

@endsection

