@extends('layouts.plantilla')
@section('contenido')

<h1>Baja de un Producto</h1>

<div class="alert text-danger bg-light p-4 col-8 mx-auto shadow">
    Se eliminará el producto:
    <span class="fs-4">{{ $productos->descripcion }}</span>.
    <form action="/productos/destroy" method="post">
        @method('delete')
        @csrf
        <input type="hidden" name="id" value="{{ $productos->id_productos }}">
        <input type="hidden" name="descripcion" value="{{ $productos->descripcion }}">

        <button class="btn btn-danger my-3">Confirmar baja</button>
        <a href="/productos" class="btn btn-outline-secondary">Volver al panel</a>
    </form>
</div>

@endsection
