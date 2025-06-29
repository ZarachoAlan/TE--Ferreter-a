@extends('layouts.plantilla')
@section('contenido')

<h1>Baja de Condición IVA</h1>

<div class="alert text-danger bg-light p-4 col-8 mx-auto shadow">
    Se eliminará la siguiente condición:
    <span class="fs-4">{{ $condicion->descripcion }}</span>

    <form action="/condicionIVA/destroy" method="post">
        @method('delete')
        @csrf
        <input type="hidden" name="id" value="{{ $condicion->id_condicioniva }}">
        <input type="hidden" name="descripcion" value="{{ $condicion->descripcion }}">

        <button class="btn btn-danger my-3">Confirmar baja</button>
        <a href="/condicionIVA" class="btn btn-outline-secondary">Volver</a>
    </form>
</div>

@endsection
