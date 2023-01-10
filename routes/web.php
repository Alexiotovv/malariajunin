<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\VentasController;
use App\Http\Controllers\FichaFamiliarsController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\MosquiterosController;
use App\Http\Controllers\MosquiterosEntregadosController;
use App\Http\Controllers\ViviendasconrriController;
use App\Http\Controllers\MapeoentoController;
use App\Http\Controllers\MantbienesController;
use App\Http\Controllers\CapacitacionesController;
use App\Http\Controllers\ResumenesController;
use App\Http\Controllers\OtrasopcionesController;
use App\Http\Controllers\MapentoCuadroController;
use App\Http\Controllers\EspeciesController;


Route::get('/', function () {
    return view('login');
});
/*Route::get('/cuadro', function () {
    return view('cuadro');
});*/
//Route::get('/cuadro',[casosController::class, 'casos_covid']);


// Route::get('ListarFichaFamiliar', [VentasController::class,'ListarFichaFamiliar'])->name('Listar.FichaFamiliar');
// Route::get('datosventas', [VentasController::class,'datosventas'])->name('datos.ventas');
Route::get('FichaFamiliar', [FichaFamiliarsController::class,'FichaFamiliar'])->name('Ficha.Familiar');
Route::post('GuardaFichaFamiliar', [FichaFamiliarsController::class,'GuardaFichaFamiliar'])->name('Guarda.FichaFamiliar');
Route::get('EditarFichaFamiliar/{id}', [FichaFamiliarsController::class,'EditarFichaFamiliar'])->name('Editar.FichaFamiliar');
Route::post('ActualizaFichaFamiliar', [FichaFamiliarsController::class,'ActualizaFichaFamiliar'])->name('Actualiza.FichaFamiliar');
Route::get('EliminaFichaFamiliar/{id}', [FichaFamiliarsController::class,'EliminaFichaFamiliar'])->middleware(['auth'])->name('Elimina.FichaFamiliar');

Route::get('ListarFichaFamiliar', [FichaFamiliarsController::class,'ListarFichaFamiliar'])->name('Listar.FichaFamiliar');
Route::get('ListarVisitaFamiliar/{id}', [FichaFamiliarsController::class,'ListarVisitaFamiliar'])->name('Listar.VisitaFamiliar');
Route::post('RegistraVisitaFamiliar', [FichaFamiliarsController::class,'RegistraVisitaFamiliar'])->name('Registra.VisitaFamiliar');
Route::post('ActualizaVisitaFamiliar', [FichaFamiliarsController::class,'ActualizaVisitaFamiliar'])->name('Actualiza.VisitaFamiliar');
Route::get('EliminaVisitaFamiliar/{id}', [FichaFamiliarsController::class,'EliminaVisitaFamiliar'])->middleware(['auth'])->name('Elimina.VisitaFamiliar');

Route::get('ListarMiembroFamiliar/{id}', [FichaFamiliarsController::class,'ListarMiembroFamiliar'])->name('Listar.MiembroFamiliar');
Route::post('RegistraMiembroFamiliar', [FichaFamiliarsController::class,'RegistraMiembroFamiliar'])->name('Registra.MiembroFamiliar');
Route::post('ActualizaMiembroFamiliar', [FichaFamiliarsController::class,'ActualizaMiembroFamiliar'])->name('Actualiza.MiembroFamiliar');
Route::get('EliminaMiembroFamiliar/{id}', [FichaFamiliarsController::class,'EliminaMiembroFamiliar'])->middleware(['auth'])->name('Elimina.MiembroFamiliar');

Route::get('ListarCaracteristicaFamiliar/{id}', [FichaFamiliarsController::class,'ListarCaracteristicaFamiliar'])->name('Listar.CaracteristicaFamiliar');
Route::post('RegistraCaracteristicaFamiliar', [FichaFamiliarsController::class,'RegistraCaracteristicaFamiliar'])->name('Registra.CaracteristicaFamiliar');
Route::post('ActualizaCaracteristicaFamiliar', [FichaFamiliarsController::class,'ActualizaCaracteristicaFamiliar'])->name('Actualiza.CaracteristicaFamiliar');
Route::get('EditarCaracterísticaFamiliar/{id}', [FichaFamiliarsController::class,'EditarCaracterísticaFamiliar'])->name('Editar.CaracterísticaFamiliar');
Route::get('EliminarCaracterísticaFamiliar/{id}', [FichaFamiliarsController::class,'EliminarCaracterísticaFamiliar'])->middleware(['auth'])->name('Eliminar.CaracterísticaFamiliar');

Route::get('Mosquiteros', [MosquiterosController::class,'Mosquiteros'])->name('Mosquiteros');
Route::get('ListarMosquiteros', [MosquiterosController::class,'ListarMosquiteros'])->name('Listar.Mosquiteros');
Route::post('GuardaMosquitero', [MosquiterosController::class,'GuardaMosquitero'])->name('Guarda.Mosquitero');
Route::get('EliminarMosquitero/{id}', [MosquiterosController::class,'EliminarMosquitero'])->middleware(['auth'])->name('Eliminar.Mosquitero');
Route::get('EditarMosquitero/{id}', [MosquiterosController::class,'EditarMosquitero'])->name('Editar.Mosquitero');
Route::post('ActualizaMosquitero', [MosquiterosController::class,'ActualizaMosquitero'])->name('Actualiza.Mosquitero');

Route::get('ListarCensoMosquiteros/{id}', [MosquiterosController::class,'ListarCensoMosquiteros'])->name('Listar.CensoMosquiteros');
Route::post('GuardaCensoMosquitero', [MosquiterosController::class,'GuardaCensoMosquitero'])->name('Guarda.CensoMosquitero');
Route::post('ActualizaCensoMosquitero', [MosquiterosController::class,'ActualizaCensoMosquitero'])->name('Actualiza.CensoMosquitero');
Route::get('EliminaCensoMosquitero/{id}', [MosquiterosController::class,'EliminaCensoMosquitero'])->middleware(['auth'])->name('Elimina.CensoMosquitero');

////MOSQUITEROS ENTREGADOS
Route::get("EditarEncuestado/{id}",[MosquiterosEntregadosController::class, "EditarEncuestado"])->name('Editar.Encuestado');
Route::post("ActualizarEncuestado",[MosquiterosEntregadosController::class, "ActualizarEncuestado"])->name('Actualizar.Encuestado');
Route::post("GuardarEncuestado",[MosquiterosEntregadosController::class, "GuardarEncuestado"])->name('Guardar.Encuestado');
Route::get("ListaCensoEncuestados/{id}",[MosquiterosEntregadosController::class, "ListaCensoEncuestados"])->name('Lista.CensoEncuestados');
Route::get("EliminaCensoEncuestados/{id}",[MosquiterosEntregadosController::class, "EliminaCensoEncuestados"])->middleware(['auth'])->name('Elimina.CensoEncuestados');

Route::get("ListarFichaMosquiteroEntregado",[MosquiterosEntregadosController::class, "ListarFichaMosquiteroEntregado"])->name('Listar.FichaMosquiteroEntregado');
Route::get("MosquiteroEntregado",[MosquiterosEntregadosController::class, "MosquiteroEntregado"])->name('Mosquitero.Entregado');
Route::post("GuardaFichMosqEntregado",[MosquiterosEntregadosController::class, "GuardaFichMosqEntregado"])->name('Guarda.FichMosqEntregado');
Route::get("EditarMosquiteroEntregado/{id}",[MosquiterosEntregadosController::class, "EditarMosquiteroEntregado"])->name('Editar.MosquiteroEntregado');
Route::post("ActualizaFichMosqEntregado",[MosquiterosEntregadosController::class, "ActualizaFichMosqEntregado"])->name('Actualiza.FichMosqEntregado');
Route::get("EliminaFichMosqEntregado/{id}",[MosquiterosEntregadosController::class, "EliminaFichMosqEntregado"])->middleware(['auth'])->name('Elimina.FichMosqEntregado');
///CIERRE MOSQUITEROS ENTREGADOS

//FICHA EVALUACIÓN VIVIENDAS CON RRI
Route::get("ViviendasRRI",[ViviendasconrriController::class, "ViviendasRRI"])->name('ViviendasRRI');
Route::get("ListarViviendaRRI",[ViviendasconrriController::class, "ListarViviendaRRI"])->name('Listar.ViviendaRRI');
Route::post("GuardaViviendaRRI",[ViviendasconrriController::class, "GuardaViviendaRRI"])->name('Guarda.ViviendaRRI');
Route::post("ActualizaViviendaRRI",[ViviendasconrriController::class, "ActualizaViviendaRRI"])->name('Actualiza.ViviendaRRI');
Route::get("EditaViviendaRRI/{id}",[ViviendasconrriController::class, "EditaViviendaRRI"])->name('Edita.ViviendaRRI');
Route::get("EliminaViviendaRRI/{id}",[ViviendasconrriController::class, "EliminaViviendaRRI"])->middleware(['auth'])->name('Elimina.ViviendaRRI');

Route::get("ListaViviendasRociadas/{id}",[ViviendasconrriController::class, "ListaViviendasRociadas"])->name('Lista.ViviendasRociadas');
Route::post("GuardaViviendaRociada",[ViviendasconrriController::class, "GuardaViviendaRociada"])->name('Guarda.ViviendaRociada');
Route::get("EliminaViviendasRociadas/{id}",[ViviendasconrriController::class, "EliminaViviendasRociadas"])->middleware(['auth'])->name('Lista.ViviendasRociadas');
Route::get("EditaViviendaRociada/{id}",[ViviendasconrriController::class, "EditaViviendaRociada"])->name('Edita.ViviendaRociada');
Route::post("ActualizaViviendaRociada",[ViviendasconrriController::class, "ActualizaViviendaRociada"])->name('Actualiza.ViviendaRociada');
//END FICHA EVALUACIÓN VIVIENDAS CON RRI

//MAPEO ENTOMOLIGOC
Route::get("MapeoEnto",[MapeoentoController::class, "MapeoEnto"])->name('MapeoEnto');
Route::get("ListarMapeoEnto",[MapeoentoController::class, "ListarMapeoEnto"])->name('Listar.MapeoEnto');
Route::post("GuardaMapeoEnto",[MapeoentoController::class, "GuardaMapeoEnto"])->name('Guarda.MapeoEnto');
Route::post("ActualizaMapeoEnto",[MapeoentoController::class, "ActualizaMapeoEnto"])->name('Actualiza.MapeoEnto');
Route::get("EditaMapeoEnto/{id}",[MapeoentoController::class, "EditaMapeoEnto"])->name('Edita.MapeoEnto');
Route::get("EliminaMapeoEnto/{id}",[MapeoentoController::class, "EliminaMapeoEnto"])->middleware(['auth'])->name('Elimina.MapeoEnto');

Route::get("ListaIndicePicadura/{id}",[MapeoentoController::class, "ListaIndicePicadura"])->name('Lista.IndicePicadura');
Route::post("GuardaIndicePicadura",[MapeoentoController::class, "GuardaIndicePicadura"])->name('Guarda.IndicePicadura');
Route::get("EliminaIndicePicadura/{id}",[MapeoentoController::class, "EliminaIndicePicadura"])->middleware(['auth'])->name('Lista.IndicePicadura');
Route::get("EditaIndicePicadura/{id}",[MapeoentoController::class, "EditaIndicePicadura"])->name('Edita.IndicePicadura');
Route::post("ActualizaIndicePicadura",[MapeoentoController::class, "ActualizaIndicePicadura"])->name('Actualiza.IndicePicadura');
//END MAPEO ENTONOLÓGICO

//MANTENIMIENTO Y ESTADOS DE BIENES
Route::get("Mantbienes",[MantbienesController::class, "MantBienes"])->name('Mant.bienes');
Route::get("ListarMantbienes",[MantbienesController::class, "ListarMantbienes"])->name('Listar.Mantbienes');
Route::post("GuardaMantbienes",[MantbienesController::class, "GuardaMantbienes"])->name('Guarda.Mantbienes');
Route::post("ActualizaMantbienes",[MantbienesController::class, "ActualizaMantbienes"])->name('Actualiza.Mantbienes');
Route::get("EditaMantbienes/{id}",[MantbienesController::class, "EditaMantbienes"])->name('Edita.Mantbienes');
Route::get("EliminaMantbienes/{id}",[MantbienesController::class, "EliminaMantbienes"])->middleware(['auth'])->name('Elimina.Mantbienes');

Route::get("ListaMantbienesDetalle/{id}",[MantbienesController::class, "ListaMantbienesDetalle"])->name('Lista.MantbienesDetalle');
Route::post("GuardaMantbienesDetalle",[MantbienesController::class, "GuardaMantbienesDetalle"])->name('Guarda.MantbienesDetalle');
Route::get("EliminaMantbienesDetalle/{id}",[MantbienesController::class, "EliminaMantbienesDetalle"])->middleware(['auth'])->name('Lista.MantbienesDetalle');
Route::get("EditaMantbienesDetalle/{id}",[MantbienesController::class, "EditaMantbienesDetalle"])->name('Edita.MantbienesDetalle');
Route::post("ActualizaMantbienesDetalle",[MantbienesController::class, "ActualizaMantbienesDetalle"])->name('Actualiza.MantbienesDetalle');

//CIERRE MANTENIMIENTO Y ESTADOS DE BIENES

////CAPACITACIONES TECNICOS DE LABORATORIO
Route::get("Capacitaciones",[CapacitacionesController::class, "Capacitaciones"])->name('Mant.bienes');
Route::get("ListarCapacitaciones",[CapacitacionesController::class, "ListarCapacitaciones"])->name('Listar.Capacitaciones');
Route::post("GuardaCapacitaciones",[CapacitacionesController::class, "GuardaCapacitaciones"])->name('Guarda.Capacitaciones');
Route::post("ActualizaCapacitaciones",[CapacitacionesController::class, "ActualizaCapacitaciones"])->name('Actualiza.Capacitaciones');
Route::get("EditaCapacitaciones/{id}",[CapacitacionesController::class, "EditaCapacitaciones"])->name('Edita.Capacitaciones');
Route::get("EliminaCapacitaciones/{id}",[CapacitacionesController::class, "EliminaCapacitaciones"])->middleware(['auth'])->name('Elimina.Capacitaciones');

Route::get("ListaCapacitacionesDetalle/{id}",[CapacitacionesController::class, "ListaCapacitacionesDetalle"])->name('Lista.CapacitacionesDetalle');
Route::post("GuardaCapacitacionesDetalle",[CapacitacionesController::class, "GuardaCapacitacionesDetalle"])->name('Guarda.CapacitacionesDetalle');
Route::get("EliminaCapacitacionesDetalle/{id}",[CapacitacionesController::class, "EliminaCapacitacionesDetalle"])->middleware(['auth'])->name('Lista.CapacitacionesDetalle');
Route::get("EditaCapacitacionesDetalle/{id}",[CapacitacionesController::class, "EditaCapacitacionesDetalle"])->name('Edita.CapacitacionesDetalle');
Route::post("ActualizaCapacitacionesDetalle",[CapacitacionesController::class, "ActualizaCapacitacionesDetalle"])->name('Actualiza.CapacitacionesDetalle');

//// END CAPACITACIONES TECNICOS DE LABORATORIO

////MAPEO ENTOMOLOGICO CUADRO RESUMIDO
Route::get("MapeoEntoCuadro",[MapentoCuadroController::class, "MapeoEntoCuadro"])->name('MapeoEntoCuadro');
Route::get("ListarMapeoEntoCuadro",[MapentoCuadroController::class, "ListarMapeoEntoCuadro"])->name('Listar.MapeoEntoCuadro');
Route::post("GuardaMapeoEntoCuadro",[MapentoCuadroController::class, "GuardaMapeoEntoCuadro"])->name('Guarda.MapeoEntoCuadro');
Route::get("EditaMapeoEntoCuadro/{id}",[MapentoCuadroController::class, "EditaMapeoEntoCuadro"])->name('Edita.MapeoEntoCuadro');
Route::post("ActualizaMapeoEntoCuadro",[MapentoCuadroController::class, "ActualizaMapeoEntoCuadro"])->name('Actualiza.MapeoEntoCuadro');
Route::get("EliminaMapeoEntoCuadro/{id}",[MapentoCuadroController::class, "EliminaMapeoEntoCuadro"])->middleware(['auth'])->name('Elimina.MapeoEntoCuadro');
////END MAPEO ENTOMOLOGICO CUADRO RESUMIDO


///CUADROS_RESUMEN
// Route::post("CuadroTiempoResidencia",[ResumenesController::class, "TiempoResidenciaFF"])->name('Tiempo.ResidenciaFF');
Route::post("CuadroEtapaVida",[ResumenesController::class, "CuadroEtapaVidaFF"])->name('Cuadro.EtapaVida');
Route::get("CuadroResumen",[ResumenesController::class, "CuadroResumenFF"])->name('Cuadro.Resumen');
Route::get("CuadroDinamico",[ResumenesController::class, "CuadroDinamico"])->name('Cuadro.Dinamico');
///END CUADROS RESUMEN


//Especies
Route::post("GuardaEspecie",[EspeciesController::class, "GuardaEspecie"])->name('Guarda.Especie');
Route::post("ActualizaEspecie",[EspeciesController::class, "ActualizaEspecie"])->name('Actualiza.Especie');
Route::get("ListarEspecies",[EspeciesController::class, "ListarEspecies"])->name('Listar.Especies');
Route::get("Especies",[EspeciesController::class, "Especies"])->name('Especies');
//End Especies


Route::get("ListarRegiones/{id}",[FichaFamiliarsController::class, "ListarRegiones"])->name('Listar.Regiones');
Route::get("ListarRedes/{id}",[FichaFamiliarsController::class, "ListarRedes"])->name('Listar.Redes');
Route::get("ListarRed/{id}",[FichaFamiliarsController::class, "ListarRed"])->name('Listar.Red');


/////////////////////////////////////////LOGIN AND REGISTER
Route::get('login',function(){
    return view('login');
})->name('login')->middleware('guest');

Route::get('home',function(){
    return view('home');
})->middleware('auth')->name('home');

Route::get('register',function(){
    return view('register');
})->name('register');

//USUARIOS
Route::post("register",[UserController::class,'create'])->name('Registro');
Route::post("verificanombre",[UserController::class,'verificanombre'])->name('verificanombre');
Route::post("verificaemail",[UserController::class,'verificaemail'])->name('verificaemail');
Route::post("login",[LoginController::class, 'login']);
Route::put('login', [LoginController::class, 'logout']);

Route::get("Usuarios",[UserController::class, "Usuarios"])->name('Usuarios');
Route::post("ActualizaUsuario",[UserController::class, "ActualizaUsuario"])->name('Actualiza.Usuario');
Route::get("ListarUsuarios",[UserController::class, "ListarUsuarios"])->name('Listar.Usuarios');
Route::post("ActualizaContrasena",[UserController::class, "ActualizaContrasena"])->name('Actualiza.Contrasena');


Route::get("Videos",[VideosController::class, "Videos"])->name('Videos');
/////PRODUCCIÓN
Route::get("Reportes",[ProduccionController::class, "Reportes"])->name('Produccion.Reportes');
Route::get("ExportarFichaFamiliarVisitas",[ProduccionController::class, "ExportarFichaFamiliarVisitas"])->name('Exportar.FichaFamiliarVisitas');
Route::get("ExportarFichaFamiliarMiembros",[ProduccionController::class, "ExportarFichaFamiliarMiembros"])->name('Exportar.FichaFamiliarMiembros');
Route::get("ExportarFichaFamiliarCaracteristicas",[ProduccionController::class, "ExportarFichaFamiliarCaracteristicas"])->name('Exportar.FichaFamiliarCaracteristicas');
Route::get("ExportarFichaFamiliarConsolidado",[ProduccionController::class, "ExportarFichaFamiliarConsolidado"])->name('Exportar.FichaFamiliarConsolidado');
Route::get("ExportarEvaluacionMosquiterosRyU",[ProduccionController::class, "ExportarEvaluacionMosquiterosRyU"])->name('Exportar.EvaluacionMosquiterosRyU');
Route::get("ExportarFichaMosquiterosEntregados",[ProduccionController::class, "ExportarFichaMosquiterosEntregados"])->name('Exportar.FichaMosquiterosEntregados');

Route::get("FichaViviendasRRIExport",[ProduccionController::class, "FichaViviendasRRIExport"])->name('Exportar.FichaViviendasRRIExport');
Route::get("FichaLocMapeoEntExport",[ProduccionController::class, "FichaLocMapeoEntExport"])->name('Exportar.FichaLocMapeoEntExport');
Route::get("FichaBienesMantEstadoExport",[ProduccionController::class, "FichaBienesMantEstadoExport"])->name('Exportar.FichaBienesMantEstadoExport');

Route::get("FichaCapacTecLabExport",[ProduccionController::class, "FichaCapacTecLabExport"])->name('Exportar.FichaCapacTecLabExport');

Route::get("FichaMapEntoAnopheExport",[ProduccionController::class, "ExportarFichaMapEntoAnopheExport"])->name('Exportar.FichaMapEntoAnopheExport');

////END PRODUCTION

