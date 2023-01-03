<?php

namespace App\Http\Controllers;

use App\Models\Produccion;
use Illuminate\Http\Request;
use App\Exports\FichaFamiliarVisitasExport;
use App\Exports\FichaFamiliarMiembrosExport;
use App\Exports\FichaFamiliarCaracteristicasExport;
use App\Exports\FichaFamiliarConsolidadoExport;
use App\Exports\FichaEvaluacionMosqRUExport;
use App\Exports\FichaMosquiterosEntregadosExport;
use App\Exports\FichaViviendasRRIExport;
use App\Exports\FichaLocMapeoEntExport;
use App\Exports\FichaBienesMantEstadoExport;
use App\Exports\FichaCapacTecLabExport;
use App\Exports\FichaMapEntoAnopheExport;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class ProduccionController extends Controller
{
     public function Reportes()
     {
          return view('reportes');
     }
     
     public function ExportarFichaMapEntoAnopheExport()
     {
          return Excel::download(new FichaMapEntoAnopheExport, 'FichaMapEntoAnopheExport.xlsx');
          
     }

     public function ExportarFichaMosquiterosEntregados()
     {
          return Excel::download(new FichaMosquiterosEntregadosExport, 'FichaMosquiterosEntregados.xlsx');
     }

     public function ExportarFichaFamiliarVisitas()
     {
          return Excel::download(new FichaFamiliarVisitasExport, 'FichaFamiliaryVisitas.xlsx');//exporta la ficha y visitas
     }
     public function ExportarFichaFamiliarMiembros()
     {
          return Excel::download(new FichaFamiliarMiembrosExport, 'FichaFamiliaryMiembros.xlsx');//exporta la ficha y miembros
     }
     public function ExportarFichaFamiliarCaracteristicas()
     {
          return Excel::download(new FichaFamiliarCaracteristicasExport, 'FichaFamiliaryCaracteristicaV.xlsx');//exporta la ficha y miembros
     }
     public function ExportarFichaFamiliarConsolidado()
     {
          return Excel::download(new FichaFamiliarConsolidadoExport, 'FichaFamiliaryConsolidado.xlsx');//exporta la FichaFamiliarCompleta
     }
     /////////////////
     public function ExportarEvaluacionMosquiterosRyU()
     {
          return Excel::download(new FichaEvaluacionMosqRUExport, 'FichaEvaluacionMosqRetenidoyUsados.xlsx');//exporta la FichaFamiliarCompleta
     }
     ////////////////
     public function FichaViviendasRRIExport()
     {
          return Excel::download(new FichaViviendasRRIExport, 'FichaViviendasRRI_Consolidado.xlsx');
     }
     public function FichaLocMapeoEntExport()
     {
          return Excel::download(new FichaLocMapeoEntExport, 'FichaLocMapeoEntExport_Consolidado.xlsx');
     }
     public function FichaBienesMantEstadoExport()
     {
          return Excel::download(new FichaBienesMantEstadoExport, 'FichaBienesMantEstadoConsolidado.xlsx');
     }
     
     public function FichaCapacTecLabExport()
     {
          return Excel::download(new FichaCapacTecLabExport, 'FichaCapacitacionTecLabConsolidado.xlsx');
     }

}
