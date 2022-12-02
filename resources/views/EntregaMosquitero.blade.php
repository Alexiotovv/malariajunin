@extends('layouts.base')

@section('content')
    
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title">FICHA DE EVALUACIÓN DE MOSQUITEROS ENTREGADOS</h5>
            <!-- Button trigger modal -->
            <button class="btn btn-primary" data-toggle="modal" id="btnNuevoMosquiteroEntregado">
                <i data-feather='plus'></i> Nuevo </button>
            <!-- Modal -->
        </div>

        <div class="card-body">
            <table id="DTListaMosquiterosEntregados" class="table table-responsive">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Acción</th>
                        <th>Departamento</th>
                        <th>Provincia</th>
                        <th>Distrito</th>
                        <th>IPRESS</th>
                        <th>Comunidad</th>
                        <th>FechaEntrega</th>
                        <th>FechaMonitoreo</th>
                        <th>NúmeroMonitoreo</th>
                        <th>ResponsableMonitoreo</th>
                        <th>CargoResponsableM.</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>

    <form id="formFichaMosquiteroEntregado">
        @csrf
        <div class="modal-size-xl d-inline-block">
            <div class="modal fade text-left" id="ModalMosquiteroEntregado" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaMosquitero">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-2">
                                    <label for="idEntregaMosquitero">IdFicha</label>
                                    <input type="text" id="idEntregaMosquitero" name="idEntregaMosquitero" class="form-control" 
                                    readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Departamento</label>
                                    <select class="form-control" name="Departamento" id="Departamento" disabled>
                                        @foreach ($dpto as $d)
                                            <option value="{{$d->id}}">{{$d->nombre_dpto}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Provincia</label>
                                    <select class="form-control" name="Provincia" id="Provincia" disabled>
                                        @foreach ($prov as $p)
                                            <option value="{{$p->id}}">{{$p->nombre_prov}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Distrito</label>
                                    <select class="select2" name="Distrito" id="Distrito" onchange="ObtieneRegiones('Distrito');">
                                        @foreach ($dist as $d)
                                            <option value="{{$d->id}}">{{$d->codigo}}-{{$d->nombre_dist}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Ipress</label>
                                    <select name="Ipress" id="Ipress" class="select2" >
                                        @foreach ($ests as $e)
                                            <option value="{{$e->id}}">{{$e->codigo}}-{{$e->nombre_establecimiento}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Comunidad</label>
                                    <select name="Localidad" id="Localidad" class="select2" >
                                        @foreach ($localidades as $loc)
                                            <option value="{{$loc->id}}">{{$loc->nombre_localidad}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Fecha Entrega MTILD</label>
                                    <input type="date" class="form-control" name="FechaEntrega" id="FechaEntrega">
                                </div>
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Fecha Monitoreo</label>
                                    <input type="date" class="form-control" name="FechaMonitoreo" id="FechaMonitoreo">
                                </div>
                                <div class="col-xl-2">
                                    <label for="form" class="form-label">Número de Monitoreo</label>
                                    <select name="NumeroMonitoreo" id="NumeroMonitoreo" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">ResponsableMonitoreo</label>
                                    <input type="text" class="form-control" name="Responsable" id="Responsable">
                                </div>
                                <div class="col-xl-3">
                                    <label for="form" class="form-label">Cargo Responsable</label>
                                    <input type="text" class="form-control" name="CargoResponsable" id="CargoResponsable">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaEntregaMosquitero">Guardar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal-size-xl d-inline-block">
        <div class="modal fade text-left" id="ModalListaCensoMosquitero" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Lista Censo Mosquitero (Encuestados)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-primary" id="btnNuevoCensoMosquitero">
                                    <i data-feather='plus'></i>Nuevo
                                </button>
                            </div>
                        </div>

                        <table class="table table-responsive" id="DTListaCensoMosquitero">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Acción</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Edad</th>
                                    <th>DNI</th>
                                    <th>NPersonasFemenino</th>
                                    <th>NPersonasMasculino</th>
                                    <th>NEmbarazadas</th>
                                    <th>NNinosMenor5</th>
                                    <th>NCamasDormir</th>
                                    <th>NMosqTela</th>
                                    <th>NMosqMTILDAntiguo</th>
                                    <th>NMTILDEntregados</th>
                                    <th>NMTILDUso</th>
                                    <th>NPersonasUsanMosqFemenino</th>
                                    <th>NPersonasUsanMosqMasculino</th>
                                    <th>NEmbarazadasUsanMosq</th>
                                    <th>NNinosMenor5UsanMosq</th>
                                    <th>NMTILDSinUso</th>
                                    <th>RazonNoUso</th>
                                    <th>NLimpios</th>
                                    <th>NSucios</th>
                                    <th>NRotos</th>
                                    <th>N6_7Noches</th>
                                    <th>N1_5Noches</th>
                                    <th>N0Noches</th>
                                    <th>NMTILDLavados</th>
                                    <th>NLavadoCorrecto</th>
                                    <th>NLavadoIncorrecto</th>
                                    <th>RioLago</th>
                                    <th>BandejaOtro</th>
                                    <th>Sol</th>
                                    <th>Sombra</th>
                                    <th>Colgado</th>
                                    <th>RecogidoDia</th>
                                    <th>GuardadoDia</th>
                                    <th>Embarazadas</th>
                                    <th>NinosMenor5</th>
                                    <th>OtrasPersonas</th>
                                    <th>TipoReaccion1</th>
                                    <th>TipoReaccion2</th>
                                    <th>TipoReaccion3</th>
                                    <th>TipoReaccion4</th>
                                    <th>TipoReaccion5</th>
                                    <th>TipoReaccion6</th>
                                    <th>Informante</th>
                                    <th>Observaciones</th>

                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="formCensoMosquitero">
        {{--  method="POST" action="{{route('Guardar.Encuestado')}}" --}}
        @csrf
        <div class="modal-size-xl d-inline-block">
            <div class="modal fade text-left" id="ModalCensoMosquitero" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaCensoMosquitero">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Datos del Encuestado e Información de Familia</h5>
                                    <div class="row">
                                        <div class="col-xl-2">
                                            <label for="">Id Censo Encuestado</label>
                                            <input type="text" id="idEncuestado" name="idEncuestado" class="form-control" readonly>
                                            <input type="text" id="idMonitoreo" name="idMonitoreo" class="form-control" hidden>
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="form" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" name="Nombre" id="Nombre">
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="form" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" name="Apellido" id="Apellido">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Edad</label>
                                            <input type="number" class="form-control" step="0.01" name="Edad" id="Edad">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° Documento Identidad</label>
                                            <input type="number" class="form-control" name="DNI" id="DNI">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° de Personas Femenino</label>
                                            <input type="number" class="form-control" name="NPersonasFemenino" id="NPersonasFemenino">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° de Personas Masculino</label>
                                            <input type="number" class="form-control" name="NPersonasMasculino" id="NPersonasMasculino">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° de Embarazadas</label>
                                            <input type="number" class="form-control" name="NEmbarazadas" id="NEmbarazadas">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° de Niños < 5 años</label>
                                            <input type="number" class="form-control" name="NNinosMenor5" id="NNinosMenor5">
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="form" class="form-label">N° de camas/espacios para dormir</label>
                                            <input type="number" class="form-control" name="NCamasDormir" id="NCamasDormir">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-body">
                                    <h5>Cobertura de usos de MTILD y otros Mosquiteros</h5>
                                    <div class="row">
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° mosq. de tel. o tocuyo</label>
                                            <input type="number" class="form-control" name="NMosqTela" id="NMosqTela">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° MTILD antiguos</label>
                                            <input type="number" class="form-control" name="NMosqMTILDAntiguo" id="NMosqMTILDAntiguo">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° MTILD entregados</label>
                                            <input type="number" class="form-control" name="NMTILDEntregados" id="NMTILDEntregados">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° de MTILD en uso</label>
                                            <input type="number" class="form-control" name="NMTILDUso" id="NMTILDUso">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N°Pers.UsanMosq.(Masculino)</label>
                                            <input type="number" class="form-control" name="NPersonasUsanMosqMasculino" id="NPersonasUsanMosqMasculino">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N°Pers.UsanMosq.(Femenino)</label>
                                            <input type="number" class="form-control" name="NPersonasUsanMosqFemenino" id="NPersonasUsanMosqFemenino">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° Embarazadas Usan Mosq.</label>
                                            <input type="number" class="form-control" name="NEmbarazadasUsanMosq" id="NEmbarazadasUsanMosq">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N°Niños< 5años UsanMosq.</label>
                                            <input type="number" class="form-control" name="NNinosMenor5UsanMosq" id="NNinosMenor5UsanMosq">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° de MTILD Sin Uso</label>
                                            <input type="number" class="form-control" name="NMTILDSinUso" id="NMTILDSinUso">
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="form" class="form-label">Razón del No Uso</label>
                                            <select name="RazonNoUso" id="RazonNoUso" class="form-control">
                                                <option value="1">(1)Guardado</option>
                                                <option value="2">(2)Regalado</option>
                                                <option value="3">(3)Perdido</option>
                                                <option value="4">(4)Usado para otra Cosa</option>
                                                <option value="5">(5)No le gusta</option>
                                                <option value="6">(6)Le da molestia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h5>Condición, Frecuencia y Lavado de Mosquiteros</h5>
                                    <div class="row">
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° Limpios</label>
                                            <input type="number" class="form-control" name="NLimpios" id="NLimpios">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° Sucios</label>
                                            <input type="number" class="form-control" name="NSucios" id="NSucios">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° Rotos</label>
                                            <input type="number" class="form-control" name="NRotos" id="NRotos">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">6-7 Noches</label>
                                            <input type="number" class="form-control" name="N6_7Noches" id="N6_7Noches">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">1-5 Noches</label>
                                            <input type="number" class="form-control" name="N1_5Noches" id="N1_5Noches">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">0 Noches</label>
                                            <input type="number" class="form-control" name="N0Noches" id="N0Noches">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">N° MTILD Lavados</label>
                                            <input type="number" class="form-control" name="NMTILDLavados" id="NMTILDLavados">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Lavado Correcto(1vez)</label>
                                            <input type="number" class="form-control" name="NLavadoCorrecto" id="NLavadoCorrecto">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Lavado Incorrecto(≥2vez)</label>
                                            <input type="number" class="form-control" name="NLavadoIncorrecto" id="NLavadoIncorrecto">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Lavado Incorrecto(≥2vez)</label>
                                            <input type="number" class="form-control" name="NLavadoIncorrecto" id="NLavadoIncorrecto">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Rio, Lago o Quebrada</label>
                                            <input type="number" class="form-control" name="RioLago" id="RioLago">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Bandeja u otro recipiente</label>
                                            <input type="number" class="form-control" name="BandejaOtro" id="BandejaOtro">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h5>Forma de Secado, Manejo adecuado y Reacciones Secundarias</h5>
                                    <div class="row">
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">En el Sol</label>
                                            <input type="number" class="form-control" name="Sol" id="Sol">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">En la Sombra</label>
                                            <input type="number" class="form-control" name="Sombra" id="Sombra">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Colgado</label>
                                            <input type="number" class="form-control" name="Colgado" id="Colgado">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Recogido en el día</label>
                                            <input type="number" class="form-control" name="RecogidoDia" id="RecogidoDia">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Guardado en el día</label>
                                            <input type="number" class="form-control" name="GuardadoDia" id="GuardadoDia">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Embarazadas</label>
                                            <input type="number" class="form-control" name="Embarazadas" id="Embarazadas">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Niños < 5 años</label>
                                            <input type="number" class="form-control" name="NinosMenor5" id="NinosMenor5">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Otras Personas</label>
                                            <input type="number" class="form-control" name="OtrasPersonas" id="OtrasPersonas">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Reacción 1</label>
                                            <input type="number" class="form-control" name="TipoReaccion1" id="TipoReaccion1">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Reacción 2</label>
                                            <input type="number" class="form-control" name="TipoReaccion2" id="TipoReaccion2">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Reacción 3</label>
                                            <input type="number" class="form-control" name="TipoReaccion3" id="TipoReaccion3">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Reacción 4</label>
                                            <input type="number" class="form-control" name="TipoReaccion4" id="TipoReaccion4">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Reacción 5</label>
                                            <input type="number" class="form-control" name="TipoReaccion5" id="TipoReaccion5">
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Reacción 6</label>
                                            <input type="number" class="form-control" name="TipoReaccion6" id="TipoReaccion6">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h5>Informate y Observaciones</h5>
                                    <div class="row">
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Informante</label>
                                            <select name="Informante" id="Informante" class="form-control">
                                                <option value="1">(1)Padre o Madre</option>
                                                <option value="2">(2)Abuelo(a)</option>
                                                <option value="3">(3)Hijo(a)>15 años</option>
                                                <option value="4">(4)Otro</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-2">
                                            <label for="form" class="form-label">Observaciones</label>
                                            <textarea style="width: 300px;" type="text" class="form-control" name="Observaciones" id="Observaciones"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaCensoMosquitero">Guardar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    
@endsection
@section('extra_js')
    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>

    <script src="../../../src/js/scripts/pages_app/crud.js"></script>
    <script src="../../../src/js/scripts/pages_app/mosq_entregados.js"></script>
@endsection
