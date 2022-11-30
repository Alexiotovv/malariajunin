@extends('layouts.base')

@section('content')
    
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title">FICHA DE EVALUACIÓN DE MOSQUITEROS RETENIDO Y USADOS</h5>
            <!-- Button trigger modal -->
            <button class="btn btn-primary" data-toggle="modal" id="btnNuevoMosquitero"><i
                    data-feather='plus'></i>
                Nuevo
            </button>
            <!-- Modal -->
        </div>
        <div class="card-body">
            <table id="DTListaMosquiteros" class="table table-responsive">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Accion</td>
                        <td>Localidad</td>
                        <td>Nombre_provincia</td>
                        <td>Nombre_distrito</td>
                        <td>NombreEst.</td>
                        <td>NombreEst.Microscopio</td>
                        <td>TiempoHorasEESS</td>
                        <td>TiempoHorasEESSMicroscopio</td>
                        <td>MedioTransporte</td>
                        <td>Hombres</td>
                        <td>Mujeres</td>
                        <td>Gestantes</td>
                        <td>Menor5anos</td>
                        <td>Mayor60anos</td>
                        <td>NumeroCamas</td>
                        <td>MosqImpregnadosBuenEstado</td>
                        <td>MosqImpregnadosMalEstado</td>
                        <td>MosqNoImpregnadosBuenEstado</td>
                        <td>MosqNoImpregnadosMalEstado</td>
                        <td>TamanoPersonal</td>
                        <td>TamanoFamiliar</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>

    <form id="formMosquitero">
        @csrf
        <div class="modal-size-xl d-inline-block">
            <div class="modal fade text-left" id="ModalMosquitero" tabindex="-1" role="dialog"
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
                            <h5>A. LOCALIZACIÓN DE VIVIENDA</h5>
                            <div class="col-lg-12">    
                                <div class="row">

                                    <div class="col-sm-2">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control form-control-sm" name="IdMosquitero" 
                                        id="IdMosquitero" readonly>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="">PROVINCIA</label>
                                        {{-- Aqui debe Cargar lista --}}
                                        <select name="Provincia" id="Provincia" class="form-control form-control-sm"
                                            disabled>
                                            @foreach ($prov as $prov)
                                                <option value="{{ $prov->id }}">{{ $prov->nombre_prov }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="">DISTRITO</label>
                                        <select name="Distrito" id="Distrito" class="select2-size-sm form-control-sm"
                                            onchange="ObtieneRegiones('Distrito');">
                                            @foreach ($dist as $dist)
                                                <option value="{{ $dist->id }}">
                                                    {{ $dist->codigo }}-{{ $dist->nombre_dist }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                                 
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="">LOCALIDAD</label>
                                        <select name="Localidad" id="Localidad" class="select2-size-sm form-control-sm">
                                            <option value="--">--</option>
                                            <option value="CUTIVIRENI">CUTIVIRENI</option>
                                            <option value="CAMANTAVISHI">CAMANTAVISHI</option>
                                            <option value="TINCARENI">TINCARENI</option>
                                            <option value="TSYAPO">TSYAPO</option>
                                            <option value="PAMAQUIARI">PAMAQUIARI</option>
                                            <option value="YOYATO">YOYATO</option>
                                            <option value="COBEJA">COBEJA</option>
                                            <option value="PAJONAL">PAJONAL</option>
                                            <option value="SELVA VERDE">SELVA VERDE</option>
                                            <option value="TIBORENI">TIBORENI</option>
                                            <option value="SHAPO">SHAPO</option>
                                            <option value="SELVA DE ORO">SELVA DE ORO</option>
                                            <option value="QUEMPIRI">QUEMPIRI</option>
                                            <option value="FE Y ALEGRIA">FE Y ALEGRIA</option>
                                            <option value="SOL NACIENTE">SOL NACIENTE</option>
                                            <option value="POTSOTINCANI">POTSOTINCANI</option>
                                            <option value="CC.NN. SANITE">CC.NN. SANITE</option>
                                            <option value="PAMPA ALEGRE">PAMPA ALEGRE</option>
                                            <option value="SAN CARLOS DE ALTO ENE">SAN CARLOS DE ALTO ENE</option>
                                            <option value="CORIRI">CORIRI</option>
                                            <option value="VALLE ESMERALDA">VALLE ESMERALDA</option>
                                            <option value="PUERTO ROCA">PUERTO ROCA</option>
                                            <option value="PAVENI">PAVENI</option>
                                            <option value="CC.NN SATARONSHIATO">CC.NN SATARONSHIATO</option>
                                            <option value="QUIMARO CENTRO">QUIMARO CENTRO</option>
                                            <option value="QUIMARO ALTO">QUIMARO ALTO</option>
                                            <option value="SAN MIGUEL DEL ENE">SAN MIGUEL DEL ENE</option>
                                            <option value="SHAORIATO">SHAORIATO</option>
                                            <option value="TUNUNTUARI">TUNUNTUARI</option>
                                            <option value="MICAELA BASTIDAS">MICAELA BASTIDAS</option>
                                            <option value="BOCA ANAPATI">BOCA ANAPATI</option>
                                            <option value="PACHACAMILLA">PACHACAMILLA</option>
                                            <option value="YAVIRO">YAVIRO</option>
                                            <option value="CC.NN. SAN ENE">CC.NN. SAN ENE</option>
                                            <option value="CCNNN. ALTO CHICHIRENI">CCNNN. ALTO CHICHIRENI</option>
                                            <option value="CCNN. MATERENI">CCNN. MATERENI</option>
                                            <option value="CP. LIBERTAD DE ANAPATI">CP. LIBERTAD DE ANAPATI</option>
                                            <option value="CP. UNION PIOTA">CP. UNION PIOTA</option>
                                            <option value="CP. TUPAC AMARU">CP. TUPAC AMARU</option>
                                            <option value="CP. PUERTO ANAPATI">CP. PUERTO ANAPATI</option>
                                            <option value="CP. NUEVA BERLIN">CP. NUEVA BERLIN</option>
                                            <option value="CP. MAVENI">CP. MAVENI</option>
                                            <option value="CP. LOS ANGELES DE RIO ENE">CP. LOS ANGELES DE RIO ENE</option>
                                            <option value="PUERTO SHAMPINTIARI">PUERTO SHAMPINTIARI</option>
                                            <option value="SHAMPINTIARI">SHAMPINTIARI</option>
                                            <option value="CC.NN CHANCHOCOPIARI">CC.NN CHANCHOCOPIARI</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">EESS.CERCANO</label>
                                            <select class="select2-size-sm form-control-sm" name="Establecimiento"
                                                id="Establecimiento">
                                                @foreach ($ests as $ests)
                                                    <option value="{{ $ests->id }}">
                                                        {{ $ests->codigo }}-{{ $ests->nombre_establecimiento }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>  
                                    <div class="col-lg-4">
                                        <label for="">T.HRS.EESS CERCANO</label>
                                        <input type="text" name="TiempoHorasEESS" id="TiempoHorasEESS" class="form-control form-control-sm">
                                    </div>     
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">EESS.CER. MIROSCOPIO</label>
                                            <select class="select2-size-sm form-control-sm" name="EstablecimientoMicroscopio"
                                                id="EstablecimientoMicroscopio">
                                                @foreach ($estsa as $estsa)
                                                    <option value="{{ $estsa->id }}">
                                                        {{ $estsa->codigo }}-{{ $estsa->nombre_establecimiento }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>  
                                    <div class="col-lg-4">
                                        <label for="">T.HRS.EESS CER. MICROSCOPIO</label>
                                        <input type="text" name="TiempoHorasEESSMicroscopio" id="TiempoHorasEESSMicroscopio" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">MEDIO TRANS.</label>
                                        <select name="MedioTransporte" id="MedioTransporte"
                                            class="form-control form-control-sm">
                                            <option value="CARRO">CARRO</option>
                                            <option value="BUS">BUS</option>
                                            <option value="MOTOCICLETA">MOTOCICLETA</option>
                                            <option value="A PIE">A PIE</option>
                                            <option value="BOTE">BOTE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h5>B. CENSO DE PERSONAS Y CAMAS</h5>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="Hombres">HOMBRES</label>
                                        <input type="number" class="form-control form-control-sm" id="Hombres" name="Hombres" value=0 required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="Mujeres">MUJERES</label>
                                        <input type="number" class="form-control form-control-sm" id="Mujeres" name="Mujeres" value=0 required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="Gestantes">GESTANTES</label>
                                        <input type="number" class="form-control form-control-sm" id="Gestantes" name="Gestantes" value=0 required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="Menor5anos">NIÑOS<5 AÑOS </label>
                                        <input type="number" class="form-control form-control-sm" id="Menor5anos" name="Menor5anos" value=0 required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="Mayor60anos">MAYOR 60 AÑOS </label>
                                        <input type="number" class="form-control form-control-sm" id="Mayor60anos" name="Mayor60anos" value=0 required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="NumeroCamas">NÚMERO CAMAS </label>
                                        <input type="number" class="form-control form-control-sm" id="NumeroCamas" name="NumeroCamas" value=0 required>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <h5>C. RESUMEN CENSO MOSQUITEROS</h5>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="MosqImpregnadosBuenEstado">MOSQ.IMPREG.-BUEN ESTADO</label>
                                        <input type="number" class="form-control form-control-sm" id="MosqImpregnadosBuenEstado" name="MosqImpregnadosBuenEstado" value=0 required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="MosqImpregnadosMalEstado">MOSQ.IMPREG.-MAL ESTADO</label>
                                        <input type="number" class="form-control form-control-sm" id="MosqImpregnadosMalEstado" name="MosqImpregnadosMalEstado" value=0 required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="MosqNoImpregnadosBuenEstado">MOSQ.NO IMPREG.-BUEN ESTADO</label>
                                        <input type="number" class="form-control form-control-sm" id="MosqNoImpregnadosBuenEstado" name="MosqNoImpregnadosBuenEstado" value=0 required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="MosqNoImpregnadosMalEstado">MOSQ.NO IMPREG.-MAL ESTADO</label>
                                        <input type="number" class="form-control form-control-sm" id="MosqNoImpregnadosMalEstado" name="MosqNoImpregnadosMalEstado" value=0 required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="TamanoPersonal">TAMAÑO PERSONAL(Sencillo)</label>
                                        <input type="number" class="form-control form-control-sm" id="TamanoPersonal" name="TamanoPersonal" value=0 required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="TamanoFamiliar">TAMAÑO FAMILIAR(Cama doble)</label>
                                        <input type="number" class="form-control form-control-sm" id="TamanoFamiliar" name="TamanoFamiliar" value=0 required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaMosquitero">Guardar</button>
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
                        <h4 class="modal-title">Lista Censo Mosquitero</h4>
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
                                    <th>Numero Mosquitero</th>
                                    <th>Cantidad Usan</th>
                                    <th>Tamano</th>
                                    <th>Buen Estado</th>
                                    <th>Impregnado</th>
                                    <th>Fecha Impregnacion</th>
                                    <th>Insecticida Usado</th>
                                    <th>Material</th>
                                    <th>Color</th>
                                    <th>Jefe Hogar</th>
                                    <th>Dni Jefe Hogar</th>
                                    <th>Responsable Censo</th>
                                    <th>Dni Responsable Censo</th>
                                    <th>Responsable Censo 2</th>
                                    <th>Dni Responsable Censo 2</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="formCensoMosquitero">
        @csrf
        <div class="modal-size-lg d-inline-block">
            <div class="modal fade text-left" id="ModalCensoMosquitero" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaCensoMosquitero">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>D. CENSO DE MOSQUITERO</h5>
                            <div class="col-lg-12">    
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control form-control-md" name="IdCensoMosquitero" id="IdCensoMosquitero" readonly>
                                        <input type="text" class="form-control form-control-sm" name="IdFichaMosquitero" id="IdFichaMosquitero" hidden>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="">MOSQUITERO</label>
                                        {{-- Aqui debe Cargar lista --}}
                                        <select name="NumeroMosquitero" id="NumeroMosquitero" class="form-control form-control-md">
                                                <option value="0">0</option>    
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="">CANTIDAD USAN</label>
                                        <input type="number" name="CantidadUsan" id="CantidadUsan" class="form-control form-control-md" >
                                    </div>
                                                 
                               
                                    <div class="col-lg-4">
                                        <label for="">TAMAÑO MOSQUITERO</label>
                                        <select class="form-control form-control-md" name="Tamano" id="Tamano">
                                            <option value="--">--</option>
                                            <option value="P">PERSONAL</option>
                                            <option value="F">FAMILIAR</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">BUEN ESTADO</label>
                                            <select class="form-control form-control-md" name="BuenEstado" id="BuenEstado">
                                                <option value="--">--</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">IMPREGNADO</label>
                                            <select class="form-control form-control-md" name="Impregnado" id="Impregnado">
                                                <option value="--">--</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">FECHA IMPREGNACIÓN</label>
                                        <input type="date" name="FechaImpregnacion" id="FechaImpregnacion" class="form-control form-control-md">
                                    </div>     
                              
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">INSECTICIDA USADO</label>
                                            <input type="text" class="form-control form-control-md" name="InsecticidaUsado" id="InsecticidaUsado">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">MATERIAL</label>
                                        <input type="text" name="Material" id="Material" class="form-control form-control-md">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">COLOR</label>
                                        <input type="text" class="form-control form-control-md" name="Color" id="Color">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">JEFE HOGAR</label>
                                        <input type="text" class="form-control form-control-md" name="JefeHogar" id="JefeHogar">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">DNI JEFE HOGAR</label>
                                        <input type="text" class="form-control form-control-md" name="DniJefeHogar" id="DniJefeHogar">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">RESPONSABLE DE CENSO</label>
                                        <input type="text" class="form-control form-control-md" name="ResponsableCenso" id="ResponsableCenso">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">DNI RESPONSABLE DE CENSO</label>
                                        <input type="text" class="form-control form-control-md" name="DniResponsableCenso" id="DniResponsableCenso">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">RESPONSABLE DE CENSO 2</label>
                                        <input type="text" class="form-control form-control-md" name="ResponsableCenso2" id="ResponsableCenso2">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">DNI RESPONSABLE DE CENSO 2</label>
                                        <input type="text" class="form-control form-control-md" name="DniResponsableCenso2" id="DniResponsableCenso2">
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
    <script src="../../../src/js/scripts/pages_app/mosquiteros.js"></script>
@endsection
