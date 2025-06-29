@extends('layouts.plantilla')
@section('contenido')

<h1>Alta de Condición IVA</h1>

<div class="alert bg-light p-4 col-8 mx-auto shadow">
    <form action="/condicionIVA/store" method="post">
    @csrf

        <div class="form-group mb-3">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" class="form-control" min="1" max="100" id="descripcion" required>
        </div>

        <button class="btn btn-success my-3 px-4">Guardar</button>
        <a href="/condicionIVA" class="btn btn-outline-secondary">Volver</a>
    </form>
</div>

@endsection
