<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultasController extends Controller
{
    // Consulta 2

    public function pedidosUsuario2()
    {
        $pedidos = DB::table('pedidos')
            ->where('usuario_id', 2)
            ->get();

        return response()->json($pedidos);
    }

    // consulta  3

    public function pedidosConUsuarios()
    {
    
        $pedidos = DB::table('pedidos')

                    ->join('usuarios', 'pedidos.usuario_id', '=', 'usuarios.id') 
                             // Selecciona los campos necesarios
                    ->select('pedidos.*', 'usuarios.nombre as nombre_usuario', 'usuarios.email as email_usuario') 
                    ->get();

        // Retorna los resultados en formato JSON
        return response()->json($pedidos);
    }

    // consulta 4 

    public function pedidosRango100a250()
    {
        // MIS DATOS SON DE LA TIENDITA DE LA ESQUINA, NO GASTAN ESO
        $pedidos = DB::table('pedidos')
                    ->whereBetween('total', [100, 250]) // Filtra por total entre 100 y 250
                    ->get();

        // Retorna los resultados en formato JSON
        return response()->json($pedidos);
    }

    // consulta 5

    public function usuariosNombreEmpiezaConR()
    {
        $usuarios = DB::table('usuarios')
                    ->where('nombre', 'like', 'R%') 
                    ->get();

        // Retorna los resultados en formato JSON
        return response()->json($usuarios);
    }

    // Ejercicio 6

    public function totalPedidosUsuario5()
    {
        $totalPedidos = DB::table('pedidos')
                        ->where('usuario_id', 5) 
                        // función para contar en SQL
                        ->count(); 

        // Retorna el resultado en formato JSON
        return response()->json(['total_pedidos' => $totalPedidos]);
    }

    // Ejercicio 7

    public function OrdenadosPorTotal()
    {
        $pedidos = DB::table('pedidos')
                            // buscamos que los id coincidan. 
                    ->join('usuarios', 'pedidos.usuario_id', '=', 'usuarios.id') 
                            /* obtenemos todos los datos de los clientes */
                    ->select('pedidos.*', 'usuarios.nombre as nombre_usuario', 'usuarios.email as email_usuario') 
                            // Ordena por total de forma descendente
                    ->orderBy('pedidos.total', 'desc') 
                    ->get();

        // Retorna los resultados en formato JSON
        return response()->json($pedidos);
    }

    // Ejercicio 8

    public function sumaTotalPedidos()
    {
        $sumaTotal = DB::table('pedidos')
                    ->sum('total'); 

        // Retorna el resultado en formato JSON
        return response()->json(['suma_total' => $sumaTotal]);
    }

    // Ejercicio 9

    public function pedidoMasEconomico()
    {
        $pedidoMasEconomico = DB::table('pedidos')
                                ->join('usuarios', 'pedidos.usuario_id', '=', 'usuarios.id') 
                                ->select('pedidos.*', 'usuarios.nombre as nombre_usuario') 
                                // Ordena por total de forma ascendente
                                ->orderBy('pedidos.total', 'asc') 
                                // Obtiene lo más economico. 
                                ->first(); 

        // Retorna el resultado en formato JSON
        return response()->json($pedidoMasEconomico);
    }

    // Ejercicio 10

    public function pedidosAgrupado()
    {
        $pedidosAgrupados = DB::table('pedidos')
                            ->join('usuarios', 'pedidos.usuario_id', '=', 'usuarios.id') 
                            ->select('usuarios.nombre as nombre_usuario', 'pedidos.producto', 'pedidos.cantidad', 'pedidos.total') 
                            // Ordena por nombre de usuario
                            ->orderBy('usuarios.nombre') 
                            ->get();

        // Agrupa los resultados por usuario
        $resultadosAgrupados = $pedidosAgrupados->groupBy('nombre_usuario');

        // Retorna los resultados en formato JSON
        return response()->json($resultadosAgrupados);
    }


    }




