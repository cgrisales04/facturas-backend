<?php

use App\Http\Controllers\FacturaController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\TipoIdentificacionController;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('factura', [FacturaController::class, 'save']);
Route::put('factura/{factura_id}', [FacturaController::class, 'update']);
Route::delete('factura/{factura_id}', [FacturaController::class, 'delete']);
Route::get('factura/{factura_id}', [FacturaController::class, 'findById']);
Route::get('factura', [FacturaController::class, 'find']);

Route::get('gasto', [GeneralController::class, 'findGasto']);
Route::get('etapa', [GeneralController::class, 'findEtapa']);
Route::get('proveedor', [GeneralController::class, 'findProveedor']);
Route::get('activo', [GeneralController::class, 'findActivo']);