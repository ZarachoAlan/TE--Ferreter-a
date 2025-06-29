@extends('layouts.plantilla')
    @section('contenido')

    <style>
    /*CSS de las cards*/

    .container-card {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
    }

    .card {
        width: 18rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
    }

    .card-title {
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .btn {
        width: 100%;
    }

    </style>
        <h1>Inicio</h1>
        <div class="row container-card">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Marcas</h5>
                    <a href="/marcas/" class="btn btn-primary">Ir a la pagina</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <a href="/productos/" class="btn btn-primary">Ir a la pagina</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Proveedores</h5>
                    <a href="/proveedores/" class="btn btn-primary">Ir a la pagina</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Provincias</h5>
                    <a href="/provincias/" class="btn btn-primary">Ir a la pagina</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <a href="/clientes/" class="btn btn-primary">Ir a la pagina</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Medidas</h5>
                    <a href="/medidas/" class="btn btn-primary">Ir a la pagina</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Condicion IVA</h5>
                    <a href="/condicionIVA/" class="btn btn-primary">Ir a la pagina</a>
                </div>
            </div>
        </div>
    @endsection


