<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\GleController;
use App\Http\Controllers\LibreController;
use App\Http\Controllers\NitController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\UtilidadController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('Dashboard/dashboard');
    })->name('dashboard');
});

Route::post('/libre/update', [LibreController::class, 'update']);
Route::resource('libre', LibreController::class);
Route::resource('cliente', ClienteController::class);
Route::post('/solicitud/update', [SolicitudController::class, 'update']);
Route::resource('solicitud', SolicitudController::class);
Route::post('solicitud/store2', [SolicitudController::class, 'store2'])->name('solicitud.store2');
Route::get('/logs', [SolicitudController::class, 'logs'])->name('solicitud.logs');
Route::get('/diario', [SolicitudController::class, 'diario'])->name('solicitud.diario');
Route::get('/diaria', [SolicitudController::class, 'diaria'])->name('solicitud.diaria');
Route::get('/adelanto', [SolicitudController::class, 'adelanto'])->name('solicitud.adelanto');
Route::get('/estatus', [SolicitudController::class, 'estatus'])->name('solicitud.estatus');
Route::get('/prefacturas', [SolicitudController::class, 'prefacturas'])->name('solicitud.prefacturas');
Route::get('/historico', [SolicitudController::class, 'historico'])->name('solicitud.historico');
Route::get('/infoestatus', [SolicitudController::class, 'infoestatus'])->name('solicitud.infoestatus');
Route::get('/congelado', [SolicitudController::class, 'congelado'])->name('solicitud.congelado');
Route::get('/total', [SolicitudController::class, 'total'])->name('solicitud.total');
Route::get('/log', [SolicitudController::class, 'log'])->name('solicitud.log');
Route::get('/mastotal', [SolicitudController::class, 'mastotal'])->name('solicitud.mastotal');
Route::get('/paqtotal', [SolicitudController::class, 'paqtotal'])->name('solicitud.paqtotal');
Route::get('/transito', [SolicitudController::class, 'transito'])->name('solicitud.transito');
Route::get('/servicio', [SolicitudController::class, 'servicio'])->name('solicitud.servicio');
Route::post('procesar-archivos', [SolicitudController::class, 'procesarArchivos'])->name('procesar.archivos');
Route::post('procesar-anticipos', [SolicitudController::class, 'procesarAnticipos'])->name('procesar.anticipos');
Route::post('procesar-registros', [SolicitudController::class, 'procesarRegistros'])->name('procesar.registros');
Route::post('procesar-items', [SolicitudController::class, 'procesarItems'])->name('procesar.items');
Route::put('/solicitud/{id}/update2', [solicitudController::class, 'update2'])->name('solicitud.update2');
Route::put('/solicitud/{id}/update3', [solicitudController::class, 'update3'])->name('solicitud.update3');
Route::put('/solicitud/{id}/update4', [solicitudController::class, 'update4'])->name('solicitud.update4');
Route::put('/solicitud/{id}/update5', [solicitudController::class, 'update5'])->name('solicitud.update5');
Route::put('/solicitud/{id}/update6', [solicitudController::class, 'update6'])->name('solicitud.update6');
Route::put('/solicitud/{id}/update7', [solicitudController::class, 'update7'])->name('solicitud.update7');
Route::put('/solicitud/{id}/update8', [solicitudController::class, 'update8'])->name('solicitud.update8');
Route::put('/solicitud/{id}/update9', [solicitudController::class, 'update9'])->name('solicitud.update9');
Route::put('/solicitud/{id}/update10', [solicitudController::class, 'update10'])->name('solicitud.update10');
Route::put('/solicitud/{ide}/update11', [solicitudController::class, 'update11'])->name('solicitud.update11');
Route::put('/solicitud/{ide}/update12', [solicitudController::class, 'update12'])->name('solicitud.update12');
Route::put('/solicitud/{id}/update13', [solicitudController::class, 'update13'])->name('solicitud.update13');
Route::put('/solicitud/{id}/update14', [solicitudController::class, 'update14'])->name('solicitud.update14');
Route::put('/solicitud/{id}/update15', [solicitudController::class, 'update15'])->name('solicitud.update15');
Route::put('/solicitud/{id}/update16', [solicitudController::class, 'update16'])->name('solicitud.update16');
Route::put('/solicitud/{id}/update17', [SolicitudController::class, 'update17'])->name('solicitud.update17');
Route::put('/solicitud/{id}/aprobar', [SolicitudController::class, 'aprobar'])->name('solicitud.aprobar');
Route::put('/solicitud/{id}/verificar', [SolicitudController::class, 'verificar'])->name('solicitud.verificar');
Route::get('/solicitudes/toggle-trafico/{id}', [SolicitudController::class, 'toggleTrafico'])->name('solicitudes.toggleTrafico');
Route::get('/trafico', [SolicitudController::class, 'trafico'])->name('solicitud.trafico');
Route::get('/sac', [SolicitudController::class, 'sac'])->name('solicitud.sac');
Route::get('/anticipo', [SolicitudController::class, 'anticipo'])->name('solicitud.anticipo');
Route::get('/anticipos', [SolicitudController::class, 'anticipos'])->name('solicitud.anticipos');
Route::get('/prefactura', [SolicitudController::class, 'prefactura'])->name('solicitud.prefactura');
Route::get('/solicitud/show2/{id}', [SolicitudController::class, 'show2'])->name('solicitud.show2');
Route::resource('admin', AdminController::class);
Route::resource('vehiculo', VehiculoController::class);
Route::get('vehiculo/{vehiculo}/edit2', [VehiculoController::class, 'edit2'])->name('vehiculo.edit2');
Route::put('/vehiculo/{id}/update2', [VehiculoController::class, 'update2'])->name('vehiculo.update2');
Route::get('/vehicular', [VehiculoController::class, 'vehicular'])->name('vehiculo.vehicular');
Route::resource('estado', EstadoController::class);
Route::post('estado/store2', [EstadoController::class, 'store2'])->name('estado.store2');
Route::get('/estados/view', [EstadoController::class, 'showTable'])->name('estado.view');
Route::resource('nit', NitController::class);
Route::resource('proveedor', ProveedorController::class);
Route::resource('utilidad', UtilidadController::class);
Route::get('indice', [UtilidadController::class, 'indice'])->name('utilidad.indice');
Route::get('informe', [UtilidadController::class, 'informe'])->name('utilidad.informe');
Route::match(['get', 'post'], 'reporte', [UtilidadController::class, 'reporte'])->name('utilidad.reporte');
//Route::get('/informe/{mes}', [UtilidadController::class, 'obtenerDatosPorMes'])->name('informe.mes');
Route::get('/informe/{anio}/{mes}', [UtilidadController::class, 'obtenerDatosPorAnioMes']);
//Route::get('/informe/dias-clientes/{mes}', [UtilidadController::class, 'obtenerDiasClientes']);
Route::get('/informe/dias-clientes/{anio}/{mes}', [UtilidadController::class, 'obtenerDiasClientes']);
Route::resource('price', PriceController::class);Route::put('/price/update', [PriceController::class, 'update'])->name('price.update');
Route::get('/prices', [PriceController::class, 'prices'])->name('price.prices');
Route::post('/generar/prefacturas', [SolicitudController::class, 'generarPrefacturas'])->name('generar.prefacturas');
Route::post('/generar/facturas', [SolicitudController::class, 'generarFacturas'])->name('generar.facturas');
Route::get('index', [GleController::class, 'index'])->name('gle.index');
Route::get('/gle/buscar-por-guia', [GleController::class, 'buscarPorGuia'])->name('gle.buscarPorGuia');
Route::get('/gle/export-to-excel', [GleController::class, 'exportToExcel'])->name('gle.exportToExcel');
Route::post('procesar-guias', [GleController::class, 'procesarGuias'])->name('procesar.guias');
Route::post('procesar-siigo', [GleController::class, 'procesarSiigo'])->name('procesar.siigo');
Route::get('/gle/export-facturas', [GleController::class, 'exportFacturas'])->name('gle.export-facturas');
Route::get('/cuenta', [CuentaController::class, 'index'])->name('cuenta.index');
Route::post('/cuenta', [CuentaController::class, 'store'])->name('cuenta.store');
Route::get('/facturar', [CuentaController::class, 'facturar'])->name('cuenta.facturar');