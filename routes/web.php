<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

// Section CRUD Marcas

Route::get('/marcas', function () {
    // Query Builder
    $marcas = DB::table('marcas')->select('id_marcas', 'marcas_descripcion')->get();

    // dd($marcas);
    return view('marcas.index', ['marcas' => $marcas]);
});

// Form crear
Route::get('/marcas/create', function () {
    return view('marcas.create');
});

// Insertando Registro
Route::post('/marcas/store', function () {
    // capturamos dato enviado por el form
    $nombre = request()->nombre;
    // insertar dato en tabla
    try {
        // Query Builder
        DB::table('marcas')
                ->insert(
                    ['marcas_descripcion' => $nombre]
                );

        return redirect('/marcas')
                ->with([
                    'mensaje' => 'Marca: '.$nombre.' agregada correctamente.',
                    'css' => 'success',
                ]);
    } catch (Throwable $th) {
        return redirect('/marcas')
            ->with([
                'mensaje' => 'No se pudo insertar el registro: '.$nombre,
                'css' => 'danger',
            ]);
    }
});

// Editar registro
Route::get('/marcas/edit/{id}', function ($id) {
    // obtenemos el dato de la Area por su id
    // Query Builder
    $marca = DB::table('marcas')
                    ->where('id_marcas', $id)
                    ->first();

    return view('marcas.edit', ['marca' => $marca]);
});

// Actualizar registro

Route::patch('/marcas/update', function () {
    // capturamos datos enviados popr el form
    $id = request()->id;
    $descripcion = request()->descripcion;

    try {
        DB::table('marcas')
                ->where('id_marcas', $id)
                ->update(
                    ['marcas_descripcion' => $descripcion]
                );

        return redirect('/marcas')
                ->with([
                    'mensaje' => 'Registro: '.$descripcion.' modificado correctamente',
                    'css' => 'success',
                ]);
    } catch (Throwable $th) {
        return redirect('/marcas')
            ->with([
                'mensaje' => 'No se pudo modificar el registro: '.$descripcion,
                'css' => 'danger',
            ]);
    }
});

// Confirmar eliminar
Route::get('/marcas/delete/{id}', function ($id) {
    $marca = DB::table('marcas')->where('id_marcas', $id)->first();

    return view('marcas.delete', [
        'marca' => $marca,
    ]);
});

// Eliminar registro
Route::delete('/marcas/destroy', function () {
    $id = request()->id;
    $nombre = request()->descripcion;

    try {
        DB::table('marcas')->where('id_marcas', $id)->delete();

        return redirect('/marcas')->with([
            'mensaje' => 'Registro "'.$nombre.'" eliminado correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/marcas')->with([
            'mensaje' => 'No se pudo eliminar el registro.',
            'css' => 'danger',
        ]);
    }
});

// Section CRUD Proveedores
Route::get('/proveedores', function () {
    // Query Builder para obtener los proveedores
    $proveedores = DB::table('proveedores')->select(
        'id_proveedores',
        'razon_social',
        'telefono_contacto',
        'persona_contacto',
        'cuit',
        'rela_condicioniva'
    )->get();

    return view('proveedores.index', ['proveedores' => $proveedores]);
});

// crear proveedor
Route::get('/proveedores/create', function () {
    return view('proveedores.create');
});

// nuevo proveedor
Route::post('/proveedores/store', function () {
    $razon_social = request()->razon_social;
    $telefono_contacto = request()->telefono_contacto;
    $persona_contacto = request()->persona_contacto;
    $cuit = request()->cuit;
    $rela_condicioniva = request()->rela_condicioniva;

    try {
        DB::table('proveedores')->insert([
            'razon_social' => $razon_social,
            'telefono_contacto' => $telefono_contacto,
            'persona_contacto' => $persona_contacto,
            'cuit' => $cuit,
            'rela_condicioniva' => $rela_condicioniva,
        ]);

        return redirect('/proveedores')->with([
            'mensaje' => 'Proveedor "'.$razon_social.'" agregado correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/proveedores')->with([
            'mensaje' => 'No se pudo insertar el registro: '.$razon_social,
            'css' => 'danger',
        ]);
    }
});

// editar
Route::get('/proveedores/edit/{id}', function ($id) {
    $proveedor = DB::table('proveedores')->where('id_proveedores', $id)->first();

    return view('proveedores.edit', ['proveedor' => $proveedor]);
});

// editar proveedor
Route::patch('/proveedores/update', function () {
    $id = request()->id;

    $data = [
        'razon_social' => request()->razon_social,
        'telefono_contacto' => request()->telefono_contacto,
        'persona_contacto' => request()->persona_contacto,
        'cuit' => request()->cuit,
        'rela_condicioniva' => request()->rela_condicioniva,
    ];

    try {
        DB::table('proveedores')
            ->where('id_proveedores', $id)
            ->update($data);

        return redirect('/proveedores')->with([
            'mensaje' => 'Proveedor "'.$data['razon_social'].'" modificado correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/proveedores')->with([
            'mensaje' => 'No se pudo modificar el registro.',
            'css' => 'danger',
        ]);
    }
});

// Eliminar
Route::get('/proveedores/delete/{id}', function ($id) {
    $proveedor = DB::table('proveedores')->where('id_proveedores', $id)->first();

    return view('proveedores.delete', ['proveedor' => $proveedor]);
});

// eliminar proveedor
Route::delete('/proveedores/destroy', function () {
    $id = request()->id;
    $razon_social = request()->razon_social;

    try {
        DB::table('proveedores')->where('id_proveedores', $id)->delete();

        return redirect('/proveedores')->with(['mensaje' => 'Proveedor "'.$razon_social.'" eliminado correctamente.', 'css' => 'success']);
    } catch (Throwable $th) {
        return redirect('/proveedores')->with(['mensaje' => 'No se pudo eliminar el registro.', 'css' => 'danger']);
    }
});

// Section CRUD Productos
Route::get('/productos', function () {
    // Query Builder para obtener los proveedores
    $productos = DB::table('productos')->select(
        'id_productos',
        'descripcion',
        'rela_marcas',
        'rela_medidas',
        'rela_rubro',
        'cantidad_actual',
        'precio_venta',
        'precio_compra',
        'porcentaje_utilidad',
        'rela_proveedor',
        'cantidad_minima'
    )->get();

    return view('productos.index', ['productos' => $productos]);
});

// crear producto
Route::get('/productos/create', function () {
    return view('productos.create');
});

// insertar producto
Route::post('/productos/store', function () {
    $descripcion = request()->descripcion;
    $rela_marcas = request()->rela_marcas;
    $rela_medidas = request()->rela_medidas;
    $rela_rubro = request()->rela_rubro;
    $cantidad_actual = request()->cantidad_actual;
    $precio_venta = request()->precio_venta;
    $precio_compra = request()->precio_compra;
    $porcentaje_utilidad = request()->porcentaje_utilidad;
    $rela_proveedor = request()->rela_proveedor;
    $cantidad_minima = request()->cantidad_minima;

    try {
        DB::table('productos')->insert([
            'descripcion' => $descripcion,
            'rela_marcas' => $rela_marcas,
            'rela_medidas' => $rela_medidas,
            'rela_rubro' => $rela_rubro,
            'cantidad_actual' => $cantidad_actual,
            'precio_venta' => $precio_venta,
            'precio_compra' => $precio_compra,
            'porcentaje_utilidad' => $porcentaje_utilidad,
            'rela_proveedor' => $rela_proveedor,
            'cantidad_minima' => $cantidad_minima,
        ]);

        return redirect('/productos')->with([
            'mensaje' => 'El Producto "'.$descripcion.'" fue agregado correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/productos')->with([
            'mensaje' => 'No se pudo insertar el registro: '.$descripcion,
            'css' => 'danger',
        ]);
    }
});

// editar
Route::get('/productos/edit/{id}', function ($id) {
    $productos = DB::table('productos')->where('id_productos', $id)->first();

    return view('productos.edit', ['productos' => $productos]);
});

// editar productos
Route::patch('/productos/update', function () {
    $id = request()->id;

    $data = [
        'descripcion' => request()->descripcion,
        'rela_marcas' => request()->rela_marcas,
        'rela_medidas' => request()->rela_medidas,
        'rela_rubro' => request()->rela_rubro,
        'cantidad_actual' => request()->cantidad_actual,
        'precio_venta' => request()->precio_venta,
        'precio_compra' => request()->precio_compra,
        'porcentaje_utilidad' => request()->porcentaje_utilidad,
        'rela_proveedor' => request()->rela_proveedor,
        'cantidad_minima' => request()->cantidad_minima,
    ];

    try {
        DB::table('productos')
            ->where('id_productos', $id)
            ->update($data);

        return redirect('/productos')->with([
            'mensaje' => 'El Producto "'.$data['descripcion'].'" modificado correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/productos')->with([
            'mensaje' => 'No se pudo modificar el registro.',
            'css' => 'danger',
        ]);
    }
});

// confirmar eliminar
Route::get('/productos/delete/{id}', function ($id) {
    $productos = DB::table('productos')->where('id_productos', $id)->first();

    return view('productos.delete', ['productos' => $productos]);
});

// eliminar producto
Route::delete('/productos/destroy', function () {
    $id = request()->id;
    $descripcion = request()->descripcion;

    try {
        DB::table('productos')->where('id_productos', $id)->delete();

        return redirect('/productos')->with(['mensaje' => 'El Producto "'.$descripcion.'" eliminado correctamente.', 'css' => 'success']);
    } catch (Throwable $th) {
        return redirect('/productos')->with(['mensaje' => 'No se pudo eliminar el registro.', 'css' => 'danger']);
    }
});

// CRUD provincias

// Mostrar listado de provincias

Route::get('/provincias', function () {
    $provincias = DB::table('provincias')->select('id_provincia', 'descripcion')->get();

    return view('provincias.index', ['provincias' => $provincias]);
});

// crear nuevo registro de provincia
Route::get('/provincias/create', function () {
    return view('provincias.create');
});

// confirmar insertado de provincia
Route::post('/provincias/store', function () {
    $descripcion = request()->descripcion;

    try {
        DB::table('provincias')->insert(['descripcion' => $descripcion]);

        return redirect('/provincias')->with([
            'mensaje' => 'Provincia "'.$descripcion.'" agregada correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/provincias')->with([
            'mensaje' => 'No se pudo insertar la provincia.',
            'css' => 'danger',
        ]);
    }
});

// editar provincia
Route::get('/provincias/edit/{id}', function ($id) {
    $provincia = DB::table('provincias')->where('id_provincia', $id)->first();

    return view('provincias.edit', ['provincia' => $provincia]);
});

// confirmar actualizar provincia
Route::patch('/provincias/update', function () {
    $id = request()->id;
    $descripcion = request()->descripcion;

    try {
        DB::table('provincias')
            ->where('id_provincia', $id)
            ->update(['descripcion' => $descripcion]);

        return redirect('/provincias')->with([
            'mensaje' => 'Provincia "'.$descripcion.'" actualizada correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/provincias')->with([
            'mensaje' => 'No se pudo actualizar la provincia.',
            'css' => 'danger',
        ]);
    }
});

// eliminar provincia
Route::get('/provincias/delete/{id}', function ($id) {
    $provincia = DB::table('provincias')->where('id_provincia', $id)->first();

    return view('provincias.delete', ['provincia' => $provincia]);
});

// confirmar eliminar provincia
Route::delete('/provincias/destroy', function () {
    $id = request()->id;
    $descripcion = request()->descripcion;

    try {
        DB::table('provincias')->where('id_provincia', $id)->delete();

        return redirect('/provincias')->with([
            'mensaje' => 'Provincia "'.$descripcion.'" eliminada correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/provincias')->with([
            'mensaje' => 'No se pudo eliminar la provincia.',
            'css' => 'danger',
        ]);
    }
});

// CRUD CondicionIVA

// Mostrar tabla
Route::get('/condicionIVA', function () {
    $condiciones = DB::table('condicion')->select('id_condicioniva', 'descripcion')->get();

    return view('condicionIVA.index', ['condiciones' => $condiciones]);
});

// Formulario create
Route::get('/condicionIVA/create', function () {
    return view('condicionIVA.create');
});

// Insertar condición
Route::post('/condicionIVA/store', function () {
    $descripcion = request()->descripcion;

    try {
        DB::table('condicion')->insert(['descripcion' => $descripcion]);

        return redirect('/condicionIVA')->with(['mensaje' => 'Condición IVA "'.$descripcion.'" agregada correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/condicionIVA')->with(['mensaje' => 'No se pudo insertar la condición.',
            'css' => 'danger',
        ]);
    }
});

// Formulario editar
Route::get('/condicionIVA/edit/{id}', function ($id) {
    $condicion = DB::table('condicion')->where('id_condicioniva', $id)->first();

    return view('condicionIVA.edit', ['condicion' => $condicion]);
});

// Actualizar condición
Route::patch('/condicionIVA/update', function () {
    $id = request()->id;
    $descripcion = request()->descripcion;

    try {
        DB::table('condicion')
            ->where('id_condicioniva', $id)
            ->update(['descripcion' => $descripcion]);

        return redirect('/condicionIVA')->with([
            'mensaje' => 'Condición actualizada correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/condicionIVA')->with([
            'mensaje' => 'No se pudo actualizar la condición.',
            'css' => 'danger',
        ]);
    }
});

// Formulario eliminar
Route::get('/condicionIVA/delete/{id}', function ($id) {
    $condicion = DB::table('condicion')->where('id_condicioniva', $id)->first();

    return view('condicionIVA.delete', ['condicion' => $condicion]);
});

// Eliminar condición
Route::delete('/condicionIVA/destroy', function () {
    $id = request()->id;
    $descripcion = request()->descripcion;

    try {
        DB::table('condicion')->where('id_condicioniva', $id)->delete();

        return redirect('/condicionIVA')->with([
            'mensaje' => 'Condición "'.$descripcion.'" eliminada correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/condicionIVA')->with([
            'mensaje' => 'No se pudo eliminar la condición.',
            'css' => 'danger',
        ]);
    }
});

// CRUD CLIENTES

// mostrar lista clientes
Route::get('/clientes', function () {
    $clientes = DB::table('clientes')->select(
        'id_clientes',
        'nombre',
        'apellido',
        'dni',
        'fechanacimiento',
        'localidad',
        'direccion',
        'cuit',
        'email',
        'telefono'
    )->get();

    return view('clientes.index', ['clientes' => $clientes]);
});

// Formulario alta
Route::get('/clientes/create', function () {
    return view('clientes.create');
});

// Insertar cliente
Route::post('/clientes/store', function () {
    try {
        DB::table('clientes')->insert([
            'nombre' => request()->nombre,
            'apellido' => request()->apellido,
            'dni' => request()->dni,
            'fechanacimiento' => request()->fechanacimiento,
            'rela_provincia' => request()->rela_provincia,
            'localidad' => request()->localidad,
            'direccion' => request()->direccion,
            'cuit' => request()->cuit,
            'email' => request()->email,
            'telefono' => request()->telefono,
            'rela_condicioniva' => request()->rela_condicioniva,
        ]);

        return redirect('/clientes')->with([
            'mensaje' => 'Cliente agregado correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $e) {
        return redirect('/clientes')->with([
            'mensaje' => 'No se pudo agregar el cliente: '.$e->getMessage(),
            'css' => 'danger',
        ]);
    }
});

// Form editar
Route::get('/clientes/edit/{id}', function ($id) {
    $cliente = DB::table('clientes')->where('id_clientes', $id)->first();

    return view('clientes.edit', ['cliente' => $cliente]);
});

// Actualizar cliente
Route::patch('/clientes/update', function () {
    try {
        DB::table('clientes')->where('id_clientes', request()->id)->update([
            'nombre' => request()->nombre,
            'apellido' => request()->apellido,
            'dni' => request()->dni,
            'fechanacimiento' => request()->fechanacimiento,
            'rela_provincia' => request()->rela_provincia,
            'localidad' => request()->localidad,
            'direccion' => request()->direccion,
            'cuit' => request()->cuit,
            'email' => request()->email,
            'telefono' => request()->telefono,
            'rela_condicioniva' => request()->rela_condicioniva,
        ]);

        return redirect('/clientes')->with([
            'mensaje' => 'Cliente modificado correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $e) {
        return redirect('/clientes')->with([
            'mensaje' => 'No se pudo modificar el cliente: '.$e->getMessage(),
            'css' => 'danger',
        ]);
    }
});

// Confirmar eliminación
Route::get('/clientes/delete/{id}', function ($id) {
    $cliente = DB::table('clientes')->where('id_clientes', $id)->first();

    return view('clientes.delete', ['cliente' => $cliente]);
});

// Eliminar cliente
Route::delete('/clientes/destroy', function () {
    try {
        DB::table('clientes')->where('id_clientes', request()->id)->delete();

        return redirect('/clientes')->with([
            'mensaje' => 'Cliente eliminado correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/clientes')->with([
            'mensaje' => 'No se pudo eliminar el cliente.',
            'css' => 'danger',
        ]);
    }
});

// CRUD Medidas

// Mostrar tabla de medidas
Route::get('/medidas', function () {
    $medidas = DB::table('medidas')->get();

    return view('medidas.index', ['medidas' => $medidas]);
});

// Formulario crear medida
Route::get('/medidas/create', function () {
    return view('medidas.create');
});

// Insertar medida
Route::post('/medidas/store', function () {
    try {
        DB::table('medidas')->insert([
            'descripcion' => request()->descripcion,
            'abreviatura' => request()->abreviatura,
            'activo' => request()->activo,
        ]);

        return redirect('/medidas')->with([
            'mensaje' => 'Medida agregada correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $e) {
        return redirect('/medidas')->with([
            'mensaje' => 'No se pudo agregar la medida.',
            'css' => 'danger',
        ]);
    }
});

// Formulario editar medida
Route::get('/medidas/edit/{id}', function ($id) {
    $medida = DB::table('medidas')->where('id_medida', $id)->first();

    return view('medidas.edit', ['medida' => $medida]);
});

// Actualizar medida
Route::patch('/medidas/update', function () {
    try {
        DB::table('medidas')
            ->where('id_medida', request()->id)
            ->update([
                'descripcion' => request()->descripcion,
                'abreviatura' => request()->abreviatura,
                'activo' => request()->activo,
            ]);

        return redirect('/medidas')->with([
            'mensaje' => 'Medida actualizada correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $e) {
        return redirect('/medidas')->with([
            'mensaje' => 'No se pudo actualizar la medida.',
            'css' => 'danger',
        ]);
    }
});

// Confirmar eliminación
Route::get('/medidas/delete/{id}', function ($id) {
    $medida = DB::table('medidas')->where('id_medida', $id)->first();

    return view('medidas.delete', ['medida' => $medida]);
});

// Eliminar medida
Route::delete('/medidas/destroy', function () {
    $id = request()->id;
    $descripcion = request()->descripcion;

    try {
        DB::table('medidas')->where('id_medida', $id)->delete();

        return redirect('/medidas')->with([
            'mensaje' => 'Medida "'.$descripcion.'" eliminada correctamente.',
            'css' => 'success',
        ]);
    } catch (Throwable $th) {
        return redirect('/medidas')->with([
            'mensaje' => 'No se pudo eliminar la medida.',
            'css' => 'danger',
        ]);
    }
});
