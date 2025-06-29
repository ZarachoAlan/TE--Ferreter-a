@extends('layouts.plantilla')
@section('contenido')

<h1>Eliminar Cliente</h1>

<div class="alert text-danger bg-light p-4 col-10 mx-auto shadow">
    <p>¿Estás seguro que querés eliminar al cliente <strong>{{ $cliente->nombre }} {{ $cliente->apellido }}</strong>?</p>

    <form action="/clientes/destroy" method="post">
        @csrf
        @method('delete')
        <input type="hidden" name="id" value="{{ $cliente->id_clientes }}">

        <button class="btn btn-danger">Eliminar</button>
        <a href="/clientes" class="btn btn-outline-secondary">Volver</a>
    </form>
</div>

@endsection
