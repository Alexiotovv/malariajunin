@extends('layouts.base')

@section('content')
        
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;">FICHA FAMILIAR</h4>
                    <div class="card mb-1">
                        <a type="button" href="ExportarFichaFamiliarVisitas" class="btn btn-outline-success">VisitaSaludFamiliar.xlsx <i data-feather='arrow-down-circle'></i></a>
                    </div>
                    <div class="card mb-1">
                        <a type="button" href="ExportarFichaFamiliarMiembros" class="btn btn-outline-success">Miembros.xlsx <i data-feather='arrow-down-circle'></i></a>
                    </div>
                    <div class="card mb-1">
                        <a type="button" href="ExportarFichaFamiliarCaracteristicas" class="btn btn-outline-success">CaracterísticaVivienda.xlsx <i data-feather='arrow-down-circle'></i></a>
                    </div>
                    <div class="card mb-1">
                        <a type="button" href="ExportarFichaFamiliarConsolidado" class="btn btn-outline-success">FichaFamiliarConsolidado.xlsx <i data-feather='arrow-down-circle'></i></a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;">FICHA DE EVALUACIÓN DE MOSQUITEROS RETENIDOs Y USADOS</h4>
                    <div class="card mb-1">
                        <a type="button" href="ExportarEvaluacionMosquiterosRyU" class="btn btn-outline-success">F.EvaluacionMosquiterosRyUConsolidado.xlsx <i data-feather='arrow-down-circle'></i></a>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;">FICHA DE MOSQUITEROS ENTREGADOS</h4>
                    <div class="card mb-1">
                        <a type="button" href="ExportarFichaMosquiterosEntregados" class="btn btn-outline-success">F.MosquiterosEntregadosExport.xlsx <i data-feather='arrow-down-circle'></i></a>
                    </div>

                </div>
                
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;">FICHA DE EVALUACIÓN DE VIVIENDAS CON RRI</h4>
                    <div class="card mb-1">
                        <a type="button" href="FichaViviendasRRIExport" class="btn btn-outline-success">F.ViviendasconRRIConsolidado.xlsx <i data-feather='arrow-down-circle'></i></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;">LOCALIDAD MAPEO ENTOMOLÓGICO</h4>
                    <div class="card mb-1">
                        <a type="button" href="FichaLocMapeoEntExport" class="btn btn-outline-success">F.LocalidadMapeoEntConsolidado.xlsx <i data-feather='arrow-down-circle'></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;">MANTENIMIENTO BIENES Y ESTADO DE LOS MISMOS</h4>
                    <div class="card mb-1">
                        <a type="button" href="FichaBienesMantEstadoExport" class="btn btn-outline-success">F.LocalidadMapeoEntConsolidado.xlsx <i data-feather='arrow-down-circle'></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;">CAPACITACIÓN TÉCNICOS DE LABORATORIO</h4>
                    <div class="card mb-1">
                        <a type="button" href="FichaCapacTecLabExport" class="btn btn-outline-success">F.Capac.Tec.LaboratorioConsolidado.xlsx <i data-feather='arrow-down-circle'></i></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;">MAPEO ENTOMOLÓGICO</h4>
                    <div class="card mb-1">
                        <a type="button" href="FichaMapEntoAnopheExport" class="btn btn-outline-success">MapeoEntomológico.xlsx <i data-feather='arrow-down-circle'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

    
@endsection