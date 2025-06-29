@extends('layouts.plantilla')
@section('contenido')

<h1>Baja de Medida</h1>

<div class="alert text-danger bg-light p-4 col-8 mx-auto shadow">
    Se eliminará la medida:
    <span class="fs-4">{{ $medida->descripcion }}</span>.
    <form action="/medidas/destroy" method="post">
        @csrf
        @method('delete')
        <input type="hidden" name="id" value="{{ $medida->id_medida }}">
        <input type="hidden" name="descripcion" value="{{ $medida->descripcion }}">

        <button class="btn btn-danger my-3">Confirmar baja</button>
        <a href="/medidas" class="btn btn-outline-secondary">Volver</a>
    </form>
</div>

@endsection
