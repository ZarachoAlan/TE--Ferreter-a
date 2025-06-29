@extends('layouts.plantilla')
@section('contenido')

    <h1>Alta de Producto</h1>

    <div class="alert bg-light p-4 col-8 mx-auto shadow">
        <form action="/productos/store" method="post">
        @csrf

            <div class="form-group mb-3">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" class="form-control" min="5" max="100" id="descripcion" required>
            </div>

            <div class="form-group mb-3">
                <label for="rela_marcas">Marca (ID)</label>
                <input type="text" name="rela_marcas" class="form-control" min="1" max="10" id="rela_marcas" required>
            </div>

            <div class="form-group mb-3">
                <label for="rela_medidas">Medida (ID)</label>
                <input type="text" name="rela_medidas" class="form-control" min="1" max="10" id="rela_medidas" required>
            </div>

            <div class="form-group mb-3">
                <label for="rela_rubro">Rubro (ID)</label>
                <input type="text" name="rela_rubro" class="form-control" min="1" max="10" id="rela_rubro" required>
            </div>

            <div class="form-group mb-3">
                <label for="cantidad_actual">Cantidad Actual</label>
                <input type="number" name="cantidad_actual" class="form-control" min="1" max="999" id="cantidad_actual" required>
            </div>

            <div class="form-group mb-3">
                <label for="precio_venta">Precio de Venta</label>
                <input type="number" step="0.01" name="precio_venta" min="1" max="999"class="form-control" id="precio_venta" required>
            </div>

            <div class="form-group mb-3">
                <label for="precio_compra">Precio de Compra</label>
                <input type="number" step="0.01" name="precio_compra" min="1" max="999" class="form-control" id="precio_compra" required>
            </div>

            <div class="form-group mb-3">
                <label for="porcentaje_utilidad">% de Utilidad</label>
                <input type="number" step="0.01" name="porcentaje_utilidad" min="1" max="100" class="form-control" id="porcentaje_utilidad" required>
            </div>

            <div class="form-group mb-3">
                <label for="rela_proveedor">Proveedor (ID)</label>
                <input type="text" name="rela_proveedor" class="form-control" min="1" max="10" id="rela_proveedor" required>
            </div>

            <div class="form-group mb-3">
                <label for="cantidad_minima">Stock Mínimo</label>
                <input type="number" name="cantidad_minima" class="form-control" min="1" max="999" id="cantidad_minima" required>
            </div>

            <button class="btn btn-success my-3 px-4">Guardar</button>
            <a href="/productos" class="btn btn-outline-secondary">
                Volver
            </a>
        </form>
    </div>

@endsection