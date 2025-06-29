@extends('layouts.plantilla')
@section('contenido')

<h1>Modificación de un Producto</h1>

<div class="alert bg-light p-4 col-8 mx-auto shadow">
    <form action="/productos/update" method="post">
        @method('patch')
        @csrf

        <input type="hidden" name="id" value="{{ $productos->id_productos }}">

        <input type="text" name="descripcion" class="form-control mb-3" value="{{ $productos->descripcion }}" required>
        <input type="number" name="rela_marcas" class="form-control mb-3" value="{{ $productos->rela_marcas }}" required>
        <input type="number" name="rela_medidas" class="form-control mb-3" value="{{ $productos->rela_medidas }}" required>
        <input type="number" name="rela_rubro" class="form-control mb-3" value="{{ $productos->rela_rubro }}" required>
        <input type="number" name="cantidad_actual" class="form-control mb-3" value="{{ $productos->cantidad_actual }}" required>
        <input type="number" step="0.01" name="precio_venta" class="form-control mb-3" value="{{ $productos->precio_venta }}" required>
        <input type="number" step="0.01" name="precio_compra" class="form-control mb-3" value="{{ $productos->precio_compra }}" required>
        <input type="number" step="0.01" name="porcentaje_utilidad" class="form-control mb-3" value="{{ $productos->porcentaje_utilidad }}" required>
        <input type="number" name="rela_proveedor" class="form-control mb-3" value="{{ $productos->rela_proveedor }}" required>
        <input type="number" name="cantidad_minima" class="form-control mb-3" value="{{ $productos->cantidad_minima }}" required>

        <button class="btn btn-success my-3 px-4">Actualizar</button>
        <a href="/productos" class="btn btn-outline-secondary">Volver</a>
    </form>
</div>

@endsection
