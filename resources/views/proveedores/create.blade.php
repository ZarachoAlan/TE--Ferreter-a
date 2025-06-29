@extends('layouts.plantilla')
@section('contenido')

    <h1>Alta de Proveedor</h1>

    <div class="alert bg-light p-4 col-8 mx-auto shadow">
        <form action="/proveedores/store" method="post">
        @csrf

            <div class="form-group mb-3">
                <label for="razon_social">Razón Social</label>
                <input type="text" name="razon_social" class="form-control" min="1" max="999" id="razon_social" required>
            </div>

            <div class="form-group mb-3">
                <label for="telefono_contacto">Teléfono de Contacto</label>
                <input type="text" name="telefono_contacto" class="form-control" min="10" max="15" id="telefono_contacto" required>
            </div>

            <div class="form-group mb-3">
                <label for="persona_contacto">Persona de Contacto</label>
                <input type="text" name="persona_contacto" class="form-control" min="1" max="100" id="persona_contacto" required>
            </div>

            <div class="form-group mb-3">
                <label for="cuit">CUIT</label>
                <input type="text" name="cuit" class="form-control" min="11" max="11" id="cuit" required>
            </div>

            <div class="form-group mb-3">
                <label for="rela_condicioniva">Condición IVA</label>
                <select name="rela_condicioniva" id="rela_condicioniva" class="form-control" required>
                    <option value="">Seleccione una opción</option>
                    <option value="1">Responsable Inscripto</option>
                    <option value="2">Monotributista</option>
                    <option value="3">Exento</option>
                </select>
            </div>

            <button class="btn btn-success my-3 px-4">Guardar</button>
            <a href="/proveedores" class="btn btn-outline-secondary">
                Volver
            </a>
        </form>
    </div>

@endsection