<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ConsultasController;

Route::get('/pedidos-usuario-2', [ConsultasController::class, 'pedidosUsuario2']);

Route::get('/pedidos-con-usuarios', [ConsultasController::class, 'pedidosConUsuarios']);

Route::get('/pedidos-rango-100-250', [ConsultasController::class, 'pedidosRango100a250']);

Route::get('/usuarios-nombre-R', [ConsultasController::class, 'usuariosNombreEmpiezaConR']);

Route::get('/total-pedidos-usuario-5', [ConsultasController::class, 'totalPedidosUsuario5']);

Route::get('/usuarios-ordenados', [ConsultasController::class, 'OrdenadosPorTotal']);

Route::get('/suma-total', [ConsultasController::class, 'sumaTotalPedidos']);

Route::get('/mas-economico', [ConsultasController::class, 'pedidoMasEconomico']);

Route::get('/pedidos-agrupados', [ConsultasController::class, 'pedidosAgrupado']);