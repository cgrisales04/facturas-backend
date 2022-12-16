<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function findGasto()
    {
        #Devolvemos una respuesta satisfactoria
        return response()->json([
            'status' => true,
            'message' => "¡Se han obtenido los gasto con exito!",
            'data' => DB::table('gasto')->get()
        ]);
    }
    public function findEtapa()
    {
        #Devolvemos una respuesta satisfactoria
        return response()->json([
            'status' => true,
            'message' => "¡Se han obtenido las etapas con exito!",
            'data' => DB::table('etapa')->get()
        ]);
    }
    public function findProveedor()
    {
        #Devolvemos una respuesta satisfactoria
        return response()->json([
            'status' => true,
            'message' => "¡Se han obtenido los proveedores con exito!",
            'data' => DB::table('proveedor')->get()
        ]);
    }
    public function findActivo()
    {
        #Devolvemos una respuesta satisfactoria
        return response()->json([
            'status' => true,
            'message' => "¡Se han obtenido los activos con exito!",
            'data' => DB::table('activo')->get()
        ]);
    }
}