<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FacturaController extends Controller
{
    public function save(Request $request)
    {
        $validator_factura = Validator::make($request->all(), [
            'numero' => 'required',
            'fecha' => 'required',
            'valor_neto' => 'required',
            'valor_iva' => 'required',
            'valor_total' => 'required',
            'id_activo' => 'required',
            'id_proveedor' => 'required',
            'id_etapa' => 'required',
            'id_gasto' => 'required'
        ]);
        if (!$validator_factura->fails()) {
            #Si el SP se ejecuto
            if (
                DB::executeProcedure("SP_INSERTAR_FACTURA", [
                    $request->numero,
                    $request->fecha,
                    $request->valor_neto,
                    $request->valor_iva,
                    $request->valor_total,
                    $request->id_activo,
                    $request->id_proveedor,
                    $request->id_etapa,
                    $request->id_gasto
                ])
            ) {
                #Devolvemos una respuesta satisfactoria
                return response()->json([
                    'status' => true,
                    'message' => "¡Se ha insertado la factura con exito!"
                ]);
            }
            #Si hay inconvenientes con los campos 
        } else {
            #Mostramos los inconvenientes
            return response()->json([
                'status' => false,
                'errors' => $validator_factura->messages()
            ]);
        }
    }
    public function update(Request $request, $factura_id)
    {
        $validator_factura = Validator::make($request->all(), [
            'numero' => 'required',
            'fecha' => 'required',
            'valor_neto' => 'required',
            'valor_iva' => 'required',
            'valor_total' => 'required',
            'id_activo' => 'required',
            'id_proveedor' => 'required',
            'id_etapa' => 'required',
            'id_gasto' => 'required'
        ]);
        if (!$validator_factura->fails()) {
            if ($this->validated_existence($factura_id)) {
                #Si el SP se ejecuto
                if (
                    DB::executeProcedure("SP_EDITAR_FACTURA", [
                        $factura_id,
                        $request->numero,
                        $request->fecha,
                        $request->valor_neto,
                        $request->valor_iva,
                        $request->valor_total,
                        $request->id_activo,
                        $request->id_proveedor,
                        $request->id_etapa,
                        $request->id_gasto
                    ])
                ) {
                    #Devolvemos una respuesta satisfactoria
                    return response()->json([
                        'status' => true,
                        'message' => "¡Se ha modificado la factura $factura_id con exito!"
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'La factura que intentas modificar no existe.'
                ]);
            }
        } else {
            #Mostramos los inconvenientes
            return response()->json([
                'status' => false,
                'errors' => $validator_factura->messages()
            ]);
        }
    }
    public function delete($factura_id)
    {
        if ($this->validated_existence($factura_id)) {
            if (
                DB::executeProcedure("SP_ELIMINAR_FACTURA", [
                    $factura_id
                ])
            ) {
                #Devolvemos una respuesta satisfactoria
                return response()->json([
                    'status' => true,
                    'message' => "¡Se ha eliminado la factura $factura_id con exito!"
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Factura aún no registrada en el sistema.'
            ]);
        }
    }

    public function findById($factura_id)
    {
        #Devolvemos una respuesta satisfactoria
        return response()->json([
            'status' => true,
            'message' => "¡Se ha obtenido la factura con exito!",
            'data' => $this->get_factura($factura_id)
        ]);
    }
    public function find()
    {
        #Devolvemos una respuesta satisfactoria
        return response()->json([
            'status' => true,
            'message' => "¡Se han obtenido las facturas con exito!",
            'data' => Factura::get()
        ]);
    }

    private function validated_existence($factura_id)
    {
        return $this->get_factura($factura_id) ? true : false;
    }

    private function get_factura($factura_id)
    {
        return Factura::where('ID_FACTURA', '=', $factura_id)->first();
    }
}