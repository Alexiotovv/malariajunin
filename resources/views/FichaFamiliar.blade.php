@extends('layouts.base')

@section('content')
    <div class="content-body">
        {{-- LISTA DE FICHA FAMILIAR --}}
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">FICHA FAMILIAR</h4>
                            <!-- Button trigger modal -->
                            <button class="btn btn-primary" data-toggle="modal" id="btnNuevaFichaFamiliar"><i
                                    data-feather='plus'></i>
                                Nuevo
                            </button>
                            <!-- Modal -->
                        </div>
                        {{-- LISTA FICHA FAMILIAR --}}
                            <section id="basic-datatable">
                                {{-- <div class="row">
                                    <div class="col-12"> --}}
                                <div class="card-datatable">
                                    <table class="table table-responsive" id="FichaFamiliar">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Acción</th>
                                                <th>C.Familiar</th>
                                                <th>Red</th>
                                                <th>MicroRed</th>
                                                <th>Establecimiento</th>
                                                <th>Provincia</th>
                                                <th>Distrito</th>
                                                <th>Localidad</th>
                                                {{-- <th>Sector</th>
                                                        <th>ÁreaResidencia</th>
                                                        <th>Telef.celular</th>
                                                        <th>Dir.vivienda</th>
                                                        <th>Telef.Otrapersona</th>
                                                        <th>TiempoEESSCercano</th>
                                                        <th>MedioTransporte</th>
                                                        <th>TiempoResidencia</th>
                                                        <th>ResidenciasAnteriores</th>
                                                        <th>Disp.Prox.Visitas</th>
                                                        <th>EMail</th>
                                                        <th>Referencia</th>
                                                        <th>FechaUlt.Roc.Res.</th>
                                                        <th>Niños</th>
                                                        <th>Adolescentes</th>
                                                        <th>Jovenes</th>
                                                        <th>Adultos</th>
                                                        <th>AdultosMayores</th>
                                                        <th>EtniaRaza</th>
                                                        <th>IdiomaPredominante</th>
                                                        <th>Religion</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- </div>
                                </div> --}}
                            </section>
                        {{-- END LISTA FICHA FAMILIAR --}}
                    </div>
                </div>
            </div>
        </section>
        {{-- END LISTA DE FICHA FAMILIAR --}}

        {{-- FORM FICHA FAMILIAR --}}
        <form id="formFichaFamiliar">
            @csrf
            <div class="modal-size-xl d-inline-block">
                <div class="modal fade text-left" id="ModalNuevaFichaFamiliar" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="EtiquetaFichaFamiliar">Nueva Ficha Familiar</h4>

                                <i data-feather='edit' id="IconoEditar" style="display:none"></i>
                                <i data-feather='file-plus' id="IconoNuevo" style="display: none"></i>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{-- primer row --}}
                                <div class="row">
                                    <div class="col-lg-1">
                                        {{-- ID PARA ACTUALIZAR SIEMPRE OCULTO --}}
                                        <input type="text" class="form-control form-control-sm" id="idFichaFamiliar"
                                            name="idFichaFamiliar" hidden>
                                        <label for="">C.MULTIF.</label>
                                        <select name="Multifamiliar" id="Multifamiliar"
                                            class="form-control form-control-sm">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">GERESA</label>
                                        <select name="Gerencia" id="Gerencia" class="form-control form-control-sm"
                                            disabled>
                                            <option value="JUNIN">JUNIN</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">RED</label>
                                        {{-- aqui debe cargar lista --}}
                                        <select name="Idred" id="Idred" class="form-control form-control-sm" disabled>
                                            @foreach ($red as $red)
                                                <option value="{{ $red->id }}">
                                                    {{ $red->codigo }}-{{ $red->nombre_red }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">MICRORED</label>
                                        {{-- Aqui debe Cargar lista --}}
                                        <select name="Idmicrored" id="Idmicrored" class="form-control form-control-sm"
                                            disabled>
                                            @foreach ($microred as $microred)
                                                <option value="{{ $microred->id }}">
                                                    {{ $microred->codigo }}-{{ $microred->nombre_microred }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">ESTABLECIMIENTO</label>
                                            {{-- Aqui debe Cargar lista --}}
                                            <select class="select2-size-sm form-control-sm" name="Establecimiento"
                                                id="Establecimiento" onchange="ObtieneRedes('Establecimiento');">
                                                @foreach ($ests as $ests)
                                                    <option value="{{ $ests->id }}">
                                                        {{ $ests->codigo }}-{{ $ests->nombre_establecimiento }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- segundo row --}}
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="">PROVINCIA</label>
                                        {{-- Aqui debe Cargar lista --}}
                                        <select name="Provincia" id="Provincia" class="form-control form-control-sm"
                                            disabled>
                                            @foreach ($prov as $prov)
                                                <option value="{{ $prov->id }}">{{ $prov->nombre_prov }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">DISTRITO</label>
                                        <select name="Distrito" id="Distrito" class="select2-size-sm form-control-sm"
                                            onchange="ObtieneRegiones('Distrito');">
                                            @foreach ($dist as $dist)
                                                <option value="{{ $dist->id }}">
                                                    {{ $dist->codigo }}-{{ $dist->nombre_dist }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">LOCALIDAD</label>
                                        <select class="select2-size-sm form-control-sm" name="Localidad"id="Localidad">
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
                                    <div class="col-lg-3">
                                        <label for="">SECTOR</label>
                                        <input type="text" id="Sector" name="Sector" maxlength="150"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{-- tercer row --}}
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="">ÁREA RES.</label>
                                        <input type="text" id="Arearesidencia" name="Arearesidencia" maxlength="100"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">TEL.CELULAR</label>
                                        <input type="text" id="Telefonocelular" name="Telefonocelular"
                                            maxlength="100" class="form-control form-control-sm">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="">DIRECCIÓN</label>
                                        <input type="text" id="Direccionvivienda" name="Direccionvivienda"
                                            maxlength="150" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">TEL.OTRA PER.</label>
                                        <input type="text" id="TelefoOtrapersona" name="TelefoOtrapersona"
                                            maxlength="100" class="form-control form-control-sm">
                                    </div>

                                    <div class="col-lg-2">
                                        <label for="">TIEMP.EESS.CER(Minutos)</label>
                                        <input type="number" step="0.01" id="TiempoEESSCercano"
                                            name="TiempoEESSCercano" maxlength="20" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-2">
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
                                    <div class="col-lg-2">
                                        <label for="">TIEMP.RESI.ACT.(AÑOS)</label>
                                        <input type="number" step="0.01" id="TiempoResidencia" name="TiempoResidencia"
                                            maxlength="20" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">RESI.ANTERIORES</label>
                                        <input type="text" id="ResidenciasAnteriores" name="ResidenciasAnteriores"
                                            maxlength="20" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">DISP. APROX. VISITAS</label>
                                        <input type="text" id="DisponibilidadProximasVisitas"
                                            name="DisponibilidadProximasVisitas" maxlength="20"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">CORREO</label>
                                        <input type="email" id="CorreoElectronico" name="CorreoElectronico"
                                            maxlength="60" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">REFERENCIA</label>
                                        <input type="text" id="Referencia" name="Referencia" maxlength="100"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">FECHA.ULT.ROCIADO</label>
                                        <input type="date" id="FechaUltimoRociadoResidual"
                                            name="FechaUltimoRociadoResidual" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Niños(as)</label>
                                        <div class="input-group">
                                            <input type="number" name="Ninos" id="Ninos" class="touchspin-cart"
                                                value="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Adolescentes</label>
                                        <div class="input-group">
                                            <input type="number" name="Adolescentes" id="Adolescentes"
                                                class="touchspin-cart" value="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Jovenes</label>
                                        <div class="input-group">
                                            <input type="number" name="Jovenes" id="Jovenes" class="touchspin-cart"
                                                value="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Adultos</label>
                                        <div class="input-group">
                                            <input type="number" name="Adultos" id="Adultos" class="touchspin-cart"
                                                value="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">AdultosMayores</label>
                                        <div class="input-group">
                                            <input type="number" name="AdultosMayores" id="AdultosMayores"
                                                class="touchspin-cart" value="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Etnia/Raza</label>
                                        <select name="EtniaRaza" id="EtniaRaza" class="select2-size-sm form-control-sm">
                                            <option value="OTRO">OTRO</option>
                                            <option value="ASIATICODESCENDIENTE">ASIATICODESCENDIENTE</option>
                                            <option value="MESTIZO">MESTIZO</option>
                                            <option value="BLANCO">BLANCO</option>
                                            <option value="AFROPERUANO">AFROPERUANO</option>
                                            <option value="YINE">YINE</option>
                                            <option value="YANESHA">YANESHA</option>
                                            <option value="YAMINAHUA">YAMINAHUA</option>
                                            <option value="YAGUA">YAGUA</option>
                                            <option value="WAMPIS">WAMPIS</option>
                                            <option value="VACACOCHA">VACACOCHA</option>
                                            <option value="URO">URO</option>
                                            <option value="URARINA">URARINA</option>
                                            <option value="TIKUNA">TIKUNA</option>
                                            <option value="SHIWILU">SHIWILU</option>
                                            <option value="SHIPIBO-KONIBO">SHIPIBO-KONIBO</option>
                                            <option value="SHAWI">SHAWI</option>
                                            <option value="SHARANAHUA">SHARANAHUA</option>
                                            <option value="SECOYA">SECOYA</option>
                                            <option value="RESÍGARO">RESÍGARO</option>
                                            <option value="QUECHUAS">QUECHUAS</option>
                                            <option value="OMAGUA">OMAGUA</option>
                                            <option value="OCAINA">OCAINA</option>
                                            <option value="NOMATSIGENGA">NOMATSIGENGA</option>
                                            <option value="NANTI">NANTI/option>
                                            <option value="NAHUA">NAHUA</option>
                                            <option value="MURUI-MUINANI">MURUI-MUINANI</option>
                                            <option value="MUNICHE">MUNICHE</option>
                                            <option value="MATSIGENKA">MATSIGENKA</option>
                                            <option value="MATSÉS">MATSÉS</option>
                                            <option value="MASTANAHUA">MASTANAHUA</option>
                                            <option value="MASHCO PIRO">MASHCO PIRO</option>
                                            <option value="MARINAHUA">MARINAHUA</option>
                                            <option value="MAIJUNA">MAIJUNA</option>
                                            <option value="MADIJA">MADIJA</option>
                                            <option value="KUKAMA KUKAMIRIA">KUKAMA KUKAMIRIA</option>
                                            <option value="KICHWA">KICHWA</option>
                                            <option value="KANDOZI">KANDOZI</option>
                                            <option value="KAKINTE">KAKINTE</option>
                                            <option value="KAKATAIBO">KAKATAIBO</option>
                                            <option value="JÍBARO">JÍBARO</option>
                                            <option value="JAQARU">JAQARU</option>
                                            <option value="ISCONAHUA">ISCONAHUA</option>
                                            <option value="IÑAPARI">IÑAPARI</option>
                                            <option value="IKITU">IKITU</option>
                                            <option value="HARAKBUT">HARAKBUT</option>
                                            <option value="ESE EJA">ESE EJA</option>
                                            <option value="CHITONAHUA">CHITONAHUA</option>
                                            <option value="CHAPRA">CHAPRA</option>
                                            <option value="CHAMICURO">CHAMICURO</option>
                                            <option value="CASHINAHUA">CASHINAHUA</option>
                                            <option value="CAPANAHUA">CAPANAHUA</option>
                                            <option value="BORA">BORA</option>
                                            <option value="AWAJÚN">AWAJÚN</option>
                                            <option value="ASHENINKA">ASHENINKA</option>
                                            <option value="ASHANINKA">ASHANINKA</option>
                                            <option value="ARABELA">ARABELA</option>
                                            <option value="AMAHUACA">AMAHUACA</option>
                                            <option value="AIMARA">AIMARA</option>
                                            <option value="ACHUAR">ACHUAR</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">IDIOMA PREDOMINANTE</label>
                                        <select name="IdiomaPredominante" id="IdiomaPredominante"
                                            class="form-control form-control-sm">
                                            <option value="ESPAÑOL">ESPAÑOL</option>
                                            <option value="QUECHUA">QUECHUA</option>
                                            <option value="OTRO">OTRO</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Religion</label>
                                        <select name="Religion" id="Religion" class="form-control form-control-sm">
                                            <option value="CATOLICO">CATOLICO</option>
                                            <option value="EVANGÉLICO">EVANGÉLICO</option>
                                            <option value="AGNÓSTICO">AGNÓSTICO</option>
                                            <option value="ATEO">ATEO</option>
                                            <option value="OTRO">OTRO</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <button class="btn btn-warning AgregarVisita" id="AgregarVisita">
                                            <i data-feather='plus'></i> Visita Salud Familiar
                                        </button>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <br>
                                        <div class="card">
                                            <table class="datatables-basic table" id="visitas">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Fecha</th>
                                                        <th>Responsable</th>
                                                        <th>Resultado</th>
                                                        <th>Proxim</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success"
                                    id="btnGuardaFichaFamiliar">Guardar</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{-- END FORM FICHA FAMILIAR --}}

        {{-- LISTA VISITA FAMILIAR --}}
        <div class="modal-size-default d-inline-block">
            <div class="modal fade text-left" id="ModalListarVisitaFamiliar" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Lista Visita Familiar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" id="btnNuevaVisitaFamiliar"><i
                                            data-feather='plus'></i>
                                        Nuevo
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <br>
                                    <div class="card">
                                        <table class="datatables-basic table table-responsive" id="DTListarVisitaFamiliar">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Acción</th>
                                                    <th>Fecha</th>
                                                    <th>Responsable</th>
                                                    <th>Resultado</th>
                                                    <th>Proxim</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END LISTA VISITA FAMILIAR --}}

        <form id="formVisitaFamiliar">
            @csrf
            <div class="modal-size-xs d-inline-block">
                <div class="modal fade text-left" id="ModalVisitaFamiliar" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-default" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="EtiquetaVisitaFamiliar">-</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="">Id</label>
                                            <input type="text" class="form-control form-control-sm" name="IdVisita"
                                                id="IdVisita" readonly>
                                            <input type="text" class="form-control form-control-sm"
                                                name="VisitaIdFichaFamiliar" id="VisitaIdFichaFamiliar" hidden>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Fecha Visita</label>
                                            <input type="date" class="form-control form-control-sm" name="FechaVisita"
                                                id="FechaVisita">
                                        </div>
                                        <div class="col-sm-5">
                                            <label for="">Responsable Visita</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="ResponsableVisita" id="ResponsableVisita">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="">Resultado Visita</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="ResultadoVisita" id="ResultadoVisita">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="">Proxima Visita</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="ProximaVisita" id="ProximaVisita">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="btnGuardaVisitaFamiliar">Guardar</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        {{-- LISTA MIEMBROS FAMILIAR --}}
        <div class="modal-size-default d-inline-block">
            <div class="modal fade text-left" id="ModalListarMiembroFamiliar" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Lista Miembros de Familia</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" id="btnNuevoMiembroFamiliar"><i
                                            data-feather='plus'></i>
                                        Nuevo
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <br>
                                    <div class="card">
                                        <table class="datatables-basic table table-responsive" id="DTListarMiembroFamiliar">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Acción</th>
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Edad</th>
                                                    <th>TipoEdad</th>
                                                    <th>Sexo</th>
                                                    <th>NumeroDocumento</th>
                                                    <th>TipoDocumento</th>
                                                    <th>FechaNacimiento</th>
                                                    <th>Parentesco</th>
                                                    <th>EstadoCivil</th>
                                                    <th>GradoInstruccion</th>
                                                    <th>Ocupacion</th>
                                                    <th>CondicionOcupacion</th>
                                                    <th>SeguroSalud</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END LISTA MIEMBRO FAMILIAR --}}

        {{-- FORM MIEMBRO FAMILIAR --}}
        <form id="formMiembroFamiliar">
            @csrf
            <div class="modal-size-xs d-inline-block">
                <div class="modal fade text-left" id="ModalMiembroFamiliar" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-default" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="EtiquetaMiembroFamiliar">-</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="">Id</label>
                                            <input type="text" class="form-control form-control-sm" name="IdMiembro"
                                                id="IdMiembro" readonly>
                                            <input type="text" class="form-control form-control-sm"
                                                name="MiembroIdFichaFamiliar" id="MiembroIdFichaFamiliar" hidden>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="">Nombres</label>
                                            <input type="text" class="form-control form-control-sm" name="Nombres"
                                                id="Nombres">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="">Apellidos</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="Apellidos" id="Apellidos">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Edad</label>
                                            <input type="number" step="00.01" class="form-control form-control-sm"
                                                name="Edad" id="Edad">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Tipo Edad</label>
                                            <select name="TipoEdad" id="TipoEdad" class="form-control form-control-sm">
                                                <option value="AÑOS">AÑOS</option>
                                                <option value="MESES">MESES</option>
                                                <option value="DIAS">DÍAS</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Sexo</label>
                                            <select name="Sexo" id="Sexo" class="form-control form-control-sm">
                                                <option value="M">MASCULINO</option>
                                                <option value="F">FEMENINO</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">N° Documento</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="NumeroDocumento" id="NumeroDocumento" maxlength="9">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Tipo Documento</label>
                                            <select name="TipoDocumento" id="TipoDocumento" class="form-control form-control-sm">
                                                <option value="DNI">DNI</option>
                                                <option value="CE">CE</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Fecha Nacimiento</label>
                                            <input type="date" class="form-control form-control-sm"
                                                name="FechaNacimiento" id="FechaNacimiento">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Parentesco</label>
                                                <select name="Parentesco" id="Parentesco" class="form-control form-control-sm">
                                                    <option value="--">--</option>
                                                    <option value="PADRE">Padre(P)</option>
                                                    <option value="MADRE">Madre(M)</option>
                                                    <option value="HIJO(A)">Hija/o Adoptia/o(HA)</option>
                                                    <option value="ABUELO(A)">Abuela/o(A)</option>
                                                    <option value="TIO(A)">Tío/A(T)</option>
                                                    <option value="PADRASTRO">Padrastro(PA)</option>
                                                    <option value="MADRASTRA">Madrastra(MA)</option>
                                                    <option value="SOBRINO(A)">Sobrino/o(S)</option>
                                                    <option value="PRIMO(A)">Prima/o(PR)</option>
                                                    <option value="BIS-ABUELO(A)">Bis-abuela(BA)</option>
                                                    <option value="AMIGO(A)">Amiga/o(AMG)</option>
                                                    <option value="HERMANO(A)">Hermana/o(HM)</option>
                                                    <option value="YERNO">Yerno(Y)</option>
                                                    <option value="NUERA">Nuera(N)</option>
                                                    <option value="OTRO">Otro(O)</option>
                                                </select>
                                            
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Estado Civil</label>
                                                <select name="EstadoCivil" id="EstadoCivil" class="form-control form-control-sm">
                                                    <option value="SOLTERO(A)">Soltera/o(S)</option>
                                                    <option value="CONVIVIENTE">Conviviente(CO)</option>
                                                    <option value="SEPARADO(A)">Separado/o(SP)</option>
                                                    <option value="DIVORCIADO(A)">Divorciada/o(D)</option>
                                                    <option value="VIUDO(A)">Viuda/o(V)</option>
                                                    <option value="CASADO(A)">Casada/o(C)</option>
                                                    <option value="OTROS">Otros(O)</option>  
                                                </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="">GradoInstruccion</label>
                                            <select name="GradoInstruccion" id="GradoInstruccion" class="form-control form-control-sm">
                                                <option value="SIN INSTRUCCION">Sin Instrucción(SI)</option>
                                                <option value="INICIAL">Inicial(I)</option>
                                                <option value="PRIMARIA COMPLETA">Primaria Completa(PC)</option>
                                                <option value="PRIMARIA INCOMPLETA">Primaria Imcompleta(PI)</option>
                                                <option value="SECUNDARIA COMPLETA">Secundaria Completa(SC)</option>
                                                <option value="SECUNDARIA INCOMPLETA">Secundaria Incompleta(SI)</option>
                                                <option value="SUPERIOR COMPLETA">Superior Completa(SUC)</option>
                                                <option value="SUPERIOR INCOMPLETA">Superior Incompleta(SUI)</option>
                                                <option value="ESTUDIANTE">Estudiante(ES)</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label for="">Ocupacion</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="Ocupacion" id="Ocupacion">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Cond.Ocupacion</label>
                                            <select name="CondicionOcupacion" id="CondicionOcupacion" class="form-control form-control-sm">
                                                <option value="--">--</option>
                                                <option value="TRABAJADOR(A)">Trabajador/a(S)</option>
                                                <option value="EVENTUAL">Eventual(V)</option>
                                                <option value="SIN OCUPACION">Sin Ocupación(SO)</option>
                                                <option value="JUBILADO">Jubilado(J)</option>
                                                <option value="ESTUDIANTE">Estudiante(E)</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="">SeguroSalud</label>
                                            <select name="SeguroSalud" id="SeguroSalud" class="form-control form-control-sm">
                                                <option value="--">--</option>
                                                <option value="SIS">SIS</option>
                                                <option value="ESSALUD">ESSALUD</option>
                                                <option value="FFAA-PNP-">FFAA-PNP</option>
                                                <option value="PRIVADO">PRIVADO</option>
                                                <option value="SIN-SEGURO">SIN-SEGURO</option>
                                            </select>
                                        </div>

                                    </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="btnGuardaMiembroFamiliar">Guardar</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{-- END FORM MIEMBRO FAMILIAR --}}

        {{-- LISTA CARACTERISTICAS DE LA VIVIENDA --}}
        <div class="modal-size-default d-inline-block">
            <div class="modal fade text-left" id="ModalListarCaracteristicaFamiliar" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Lista Característica Vivienda FAmiliar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" id="btnNuevoCaracteristicaFamiliar"><i
                                            data-feather='plus'></i>
                                        Nuevo
                                    </button>
                                </div>

                            </div>
                            {{-- TABLA LISTA CARACTERISTICA VIVIENDA --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <br>
                                    <div class="card">
                                        <table class="datatables-basic table table-responsive" id="DTListarCaracteristicaFamiliar">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Acción</th>
                                                    <th>Ingreso_Mensual</th>
                                                    <th>Agua_ConTratamiento</th>
                                                    <th>Agua_SinTratamiento</th>
                                                    <th>Red_PublicaDentro</th>
                                                    <th>Red_PublicaFuera</th>
                                                    <th>Pozo_Cisterna</th>
                                                    <th>Rio_Acequia</th>
                                                    <th>Piso_Madera</th>
                                                    <th>Piso_Parquet</th>
                                                    <th>Piso_Losetas</th>
                                                    <th>Piso_CementLadrillo</th>
                                                    <th>Piso_Tierra</th>
                                                    <th>Piso_Otros</th>
                                                    <th>Combustible_Lena</th>
                                                    <th>Combustible_Carbon</th>
                                                    <th>Combustible_Bosta</th>
                                                    <th>Combustible_GasElectricidad</th>
                                                    <th>Personas_Habitacion3Miembros</th>
                                                    <th>Personas_Habitacion4Mas</th>
                                                    <th>Personas_Habitacion4MasNumero</th>
                                                    <th>Personas_Habitacion3MiembroNumero</th>
                                                    <th>Pared_MaderaEstera</th>
                                                    <th>Pared_AdobeTapia</th>
                                                    <th>Pared_CementoLadrillo</th>
                                                    <th>Pared_Quincha</th>
                                                    <th>Pared_Otros</th>
                                                    <th>ConseAlim_TemperaturaAmbiente</th>
                                                    <th>ConseAlim_Refrigeradora</th>
                                                    <th>ConseAlim_RecipienteConTapa</th>
                                                    <th>ConseAlim_RecipienteSinTapa</th>
                                                    <th>Transporte_Automovil</th>
                                                    <th>Transporte_Bicicleta</th>
                                                    <th>Transporte_MotoBicicleta</th>
                                                    <th>Transporte_Otros</th>
                                                    <th>Techo_Calamina</th>
                                                    <th>Techo_MaderaTeja</th>
                                                    <th>Techo_Noble</th>
                                                    <th>Techo_Ethernit</th>
                                                    <th>Techo_PajasHojas</th>
                                                    <th>Techo_CanaEstera</th>
                                                    <th>Excretas_AireLibre</th>
                                                    <th>Excretas_AcequiaCanal</th>
                                                    <th>Excretas_RedPublica</th>
                                                    <th>Excretas_Letrina</th>
                                                    <th>Excretas_PozoSeptico</th>
                                                    <th>Excretas_Otros</th>
                                                    <th>Basura_CarroRecolector</th>
                                                    <th>Basura_CampoAbierto</th>
                                                    <th>Basura_Rio</th>
                                                    <th>Basura_EntierraQuema</th>
                                                    <th>Basura_Pozo</th>
                                                    <th>Basura_Otros</th>
                                                    <th>ServDomicilio_Telefono</th>
                                                    <th>ServDomicilio_Internet</th>
                                                    <th>ServDomicilio_Cable</th>
                                                    <th>ServDomicilio_Electricidad</th>
                                                    <th>ServDomicilio_Agua</th>
                                                    <th>ServDomicilio_Desague</th>
                                                    <th>Riesgo_LluviasInundaciones</th>
                                                    <th>Riesgo_BasuraJuntoVivienda</th>
                                                    <th>Riesgo_InserviblesJuntoVivienda</th>
                                                    <th>Riesgo_HumosVaporesFabricas</th>
                                                    <th>Riesgo_DerrumbesHuaycos</th>
                                                    <th>Riesgo_PandillajeDelincuencia</th>
                                                    <th>Riesgo_AlcoholismoDrogadiccion</th>
                                                    <th>Riesgo_SinAlumbradoPublico</th>
                                                    <th>Riesgo_PistasNoAsfaltadas</th>
                                                    <th>Riesgo_Vectores</th>
                                                    <th>Riesgo_Otros</th>
                                                    <th>Animal_PerroGato</th>
                                                    <th>Animal_CabrasCarneros</th>
                                                    <th>Animal_Convive</th>
                                                    <th>Animal_PerroGatoVacuna</th>
                                                    <th>Animal_CabrasCarnerosVacuna</th>
                                                    <th>Animal_ConviveVacuna</th>
                                                    <th>Viviendas_InfraRiesgo</th>
                                                    <th>Viviendas_InfraRiesgoDescribir</th>
                                                    <th>Vivienda_PresenciaVectores</th>
                                                    <th>Vivienda_PresenciaVectoresDescribir</th>
                                                    <th>Mochila_Emergencia</th>
                                                    <th>Botiquin_Emergencia</th>
                                                    <th>Vivienda_EspacioAlimentos</th>
                                                    <th>Cocina_VentilacionHumo</th>
                                                    <th>Television</th>
                                                    <th>Radio</th>
                                                    <th>Television_Porque</th>
                                                    <th>Radio_Porque</th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- END TABLA LISTA CARACTERISTICA VIVIENDA --}}
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- CIERRE CARACTERISTICAS DE LA VIVIENDA --}}

        {{-- FORM  CARACTERISTICAS DE LA VIVIENDA --}}
            {{-- action="{{route('Registra.CaracteristicaFamiliar')}}" method="POST" --}}
        <form id="formCaracteristicaFamiliar">
            @csrf
            <div class="modal-size-xs d-inline-block">
                <div class="modal fade text-left" id="ModalCaracteristicaFamiliar" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="EtiquetaCaracteristicaFamiliar">-</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="">Id</label>
                                        <input type="text" class="form-control form-control-sm" name="IdCaracteristica"
                                            id="IdCaracteristica" readonly>
                                        <input type="text" class="form-control form-control-sm"
                                            name="CaracteristicaIdFichaFamiliar" id="CaracteristicaIdFichaFamiliar" readonly>
                                    </div>
                                </div>
                                {{-- primer bloque  --}}
                                <div class="row">

                                    <div class="col-sm-2">
                                        <div class="card business-card">
                                            <div class="business-item" style="
                                                padding-left: 10px;
                                                padding-top: 10px;
                                                padding-right: 10px;
                                                padding-bottom: 10px;">
                                                <div class="business-items">
                                                    <label for="">INGRESO FAMILIAR</label>
                                                    <input type="number" step="0.01" class="form-control form-control-sm" placeholder="0.00" id="IngresoMensual" name="IngresoMensual" maxlength="10">
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="AguaTratamiento" name="AguaTratamiento"/>
                                                        Agua Con Tto.<label class="custom-control-label" for="AguaTratamiento"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="AguaSinTratamiento" name="AguaSinTratamiento"/>
                                                        Agua Sin Tto.<label class="custom-control-label" for="AguaSinTratamiento"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RedPublicaDentro" name="RedPublicaDentro"/>
                                                        Red pública dentro de la vivienda<label class="custom-control-label" for="RedPublicaDentro"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RedPublicaFuera" name="RedPublicaFuera"/>
                                                        Red pública fuera de la vivienda<label class="custom-control-label" for="RedPublicaFuera"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="PozoCisterna" name="PozoCisterna"/>
                                                        Pozo cisterna<label class="custom-control-label" for="PozoCisterna"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RioAcequia" name="RioAcequia"/>
                                                        Rio, acequia<label class="custom-control-label" for="RioAcequia"></label>
                                                    </div>
                                                    <br>
    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-2">
                                        <div class="card business-card">
                                            <div class="business-item" style="
                                            padding-left: 10px;
                                            padding-top: 10px;
                                            padding-right: 10px;
                                            padding-bottom: 10px;
                                        ">
                                                <div class="business-items">
                                                    <label for="">MATERIAL DEL PISO</label>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="PisoMadera" name="PisoMadera"/>
                                                        Madera<label class="custom-control-label" for="PisoMadera"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="PisoParquet" name="PisoParquet"/>
                                                        Parquet<label class="custom-control-label" for="PisoParquet"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="PisoLosetas" name="PisoLosetas"/>
                                                        Losetas<label class="custom-control-label" for="PisoLosetas"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="PisoCementLadrillo" name="PisoCementLadrillo"/>
                                                        Cemento/Ladrillo<label class="custom-control-label" for="PisoCementLadrillo"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="PisoTierra" name="PisoTierra"/>
                                                        Tierra<label class="custom-control-label" for="PisoTierra"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="PisoOtros" name="PisoOtros"/>
                                                        Otros<label class="custom-control-label" for="PisoOtros"></label>
                                                    </div>
                                                    <br>

                                                    <label for="">COMBUSTIBLE PARA COCINAR</label>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="CombustibleLena" name="CombustibleLena"/>
                                                        Leña<label class="custom-control-label" for="CombustibleLena"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="CombustibleCarbon" name="CombustibleCarbon"/>
                                                        Carbon<label class="custom-control-label" for="CombustibleCarbon"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="CombustibleBosta" name="CombustibleBosta"/>
                                                        Bosta<label class="custom-control-label" for="CombustibleBosta"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="CombustibleGasElectricidad" name="CombustibleGasElectricidad"/>
                                                        Gas, Electricidad<label class="custom-control-label" for="CombustibleGasElectricidad"></label>
                                                    </div>
                                                    <br>

                                                    <label for="">N° DE PERS. POR HABITACIÓN</label>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="PersonasHabitacion3Miembros" name="PersonasHabitacion3Miembros"/>
                                                        De 1a3 miembros<label class="custom-control-label" for="PersonasHabitacion3Miembros"></label>
                                                    </div>
                                                        Cantidad 1-3<input type="number" class="form-control form-control-sm" id="PersonasHabitacion3MiembroNumero" name="PersonasHabitacion3MiembroNumero" placeholder="0"/>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="PersonasHabitacion4Mas" name="PersonasHabitacion4Mas"/>
                                                        De 4 miembros a mas<label class="custom-control-label" for="PersonasHabitacion4Mas"></label>
                                                    </div>
                                                        Cantidad de 4 miembros a mas
                                                        <input type="number" class="form-control form-control-sm" id="PersonasHabitacion4MasNumero" name="PersonasHabitacion4MasNumero" placeholder="0"/>
                                                    <br>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-sm-2">
                                        <div class="card business-card">
                                            <div class="business-item" style="
                                                padding-left: 10px;
                                                padding-top: 10px;
                                                padding-right: 10px;
                                                padding-bottom: 10px;">

                                                <div class="business-items">
                                                    <label for="">MATERIAL DE LAS PAREDES</label>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ParedMaderaEstera" name="ParedMaderaEstera"/>
                                                        Madera, estera<label class="custom-control-label" for="ParedMaderaEstera"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ParedAdobeTapia" name="ParedAdobeTapia"/>
                                                        Adobe o tapia <label class="custom-control-label" for="ParedAdobeTapia"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ParedCementoLadrillo" name="ParedCementoLadrillo"/>
                                                        Cemento, ladrillo<label class="custom-control-label" for="ParedCementoLadrillo"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ParedQuincha" name="ParedQuincha"/>
                                                        Quincha(caña con barro), Piedra con barro<label class="custom-control-label" for="ParedQuincha"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ParedOtros" name="ParedOtros"/>
                                                        Otros <label class="custom-control-label" for="ParedOtros"></label>
                                                    </div>

                                                    <br>
                                                    <label for="">CONSERVACIÓN DE ALIMENTOS</label>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ConseAlimTemperaturaAmbiente" name="ConseAlimTemperaturaAmbiente"/>
                                                        A temperatura ambiente<label class="custom-control-label" for="ConseAlimTemperaturaAmbiente"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ConseAlimRefrigeradora" name="ConseAlimRefrigeradora"/>
                                                        Refrigeradora <label class="custom-control-label" for="ConseAlimRefrigeradora"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ConseAlimRecipienteSinTapa" name="ConseAlimRecipienteSinTapa"/>
                                                        En recipiente sin tapa<label class="custom-control-label" for="ConseAlimRecipienteSinTapa"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ConseAlimRecipienteConTapa" name="ConseAlimRecipienteConTapa"/>
                                                        En recipiente con tapa<label class="custom-control-label" for="ConseAlimRecipienteConTapa"></label>
                                                    </div>
                                                    
                                                    
                                                    <br>
                                                    <label for="">DISPONIBILIDAD TRANSPORTE PROPIO</label>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="TransporteAutomovil" name="TransporteAutomovil"/>
                                                        Automóvil<label class="custom-control-label" for="TransporteAutomovil"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="TransporteBicicleta" name="TransporteBicicleta"/>
                                                        Bicicleta <label class="custom-control-label" for="TransporteBicicleta"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="TransporteMotoBicicleta" name="TransporteMotoBicicleta"/>
                                                        Motocicleta<label class="custom-control-label" for="TransporteMotoBicicleta"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="TransporteOtros" name="TransporteOtros"/>
                                                        Otros<label class="custom-control-label" for="TransporteOtros"></label>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card business-card">
                                            <div class="business-item" style="
                                                padding-left: 10px;
                                                padding-top: 10px;
                                                padding-right: 10px;
                                                padding-bottom: 10px;">

                                                <div class="business-items">
                                                    <label for="">MATERIAL DE TECHO</label>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="TechoCalamina" name="TechoCalamina"/>
                                                        Calamina<label class="custom-control-label" for="TechoCalamina"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="TechoMaderaTeja" name="TechoMaderaTeja"/>
                                                        Madera, tejas <label class="custom-control-label" for="TechoMaderaTeja"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="TechoNoble" name="TechoNoble"/>
                                                        Noble<label class="custom-control-label" for="TechoNoble"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="TechoEthernit" name="TechoEthernit"/>
                                                        Eternit o fibra de cemento<label class="custom-control-label" for="TechoEthernit"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="TechoPajasHojas" name="TechoPajasHojas"/>
                                                        Pajas, hojas<label class="custom-control-label" for="TechoPajasHojas"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="TechoCanaEstera" name="TechoCanaEstera"/>
                                                        Caña o esteras con barro<label class="custom-control-label" for="TechoCanaEstera"></label>
                                                    </div>
                                                    <br>    
                                                    <label for="">VIVIENDAS CON INFRAESTRUCTURA EN RIESGO</label>
                                                    <select name="ViviendasInfraRiesgo" id="ViviendasInfraRiesgo" class="form-control form-control-sm">
                                                        <option value="--">--</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                    </select>
                                                    <label for="">Describir</label>
                                                    <textarea type="text" class="form-control form-control-sm" id="ViviendasInfraRiesgoDescribir" name="ViviendasInfraRiesgoDescribir"></textarea>
                                                    <label for="">PRESENCIA DE VECTORES EN LA VIVIENDA</label>
                                                    <select name="ViviendaPresenciaVectores" id="ViviendaPresenciaVectores" class="form-control form-control-sm">
                                                        <option value="--">--</option>
                                                        <option value="SI">SI</option>
                                                        <option value="NO">NO</option>
                                                    </select>
                                                    <label for="">Describir</label>
                                                    <textarea type="textarea" class="form-control form-control-sm" id="ViviendaPresenciaVectoresDescribir" name="ViviendaPresenciaVectoresDescribir"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card business-card">
                                            <div class="business-item" style="
                                                padding-left: 10px;
                                                padding-top: 10px;
                                                padding-right: 10px;
                                                padding-bottom: 10px;">

                                                <div class="business-items">

                                                    <label for="">ELIMINCACIÓN DE EXCRETAS</label>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ExcretasAireLibre" name="ExcretasAireLibre"/>
                                                        Aire libre<label class="custom-control-label" for="ExcretasAireLibre"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ExcretasAcequiaCanal" name="ExcretasAcequiaCanal"/>
                                                        Acequia, canal<label class="custom-control-label" for="ExcretasAcequiaCanal"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ExcretasRedPublica" name="ExcretasRedPublica"/>
                                                        Red pública<label class="custom-control-label" for="ExcretasRedPublica"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ExcretasLetrina" name="ExcretasLetrina"/>
                                                        Letrina<label class="custom-control-label" for="ExcretasLetrina"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ExcretasPozoSeptico" name="ExcretasPozoSeptico"/>
                                                        Pozo séptico<label class="custom-control-label" for="ExcretasPozoSeptico"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ExcretasOtros" name="ExcretasOtros"/>
                                                        Otros<label class="custom-control-label" for="ExcretasOtros"></label>
                                                    </div>
                                                    <br>

                                                    <label for="">DISPOSICIÓN DE BASURA</label>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="BasuraCarroRecolector" name="BasuraCarroRecolector"/>
                                                        Carro Recolector ¿Frecuencia?<label class="custom-control-label" for="BasuraCarroRecolector"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="BasuraCampoAbierto" name="BasuraCampoAbierto"/>
                                                        A campo abierto<label class="custom-control-label" for="BasuraCampoAbierto"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="BasuraRio" name="BasuraRio"/>
                                                        Al río<label class="custom-control-label" for="BasuraRio"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="BasuraEntierraQuema" name="BasuraEntierraQuema"/>
                                                        Se entierra, quema<label class="custom-control-label" for="BasuraEntierraQuema"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="BasuraPozo" name="BasuraPozo"/>
                                                        En un pozo<label class="custom-control-label" for="BasuraPozo"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="BasuraOtros" name="BasuraOtros"/>
                                                        Otros<label class="custom-control-label" for="BasuraOtros"></label>
                                                    </div>
                                                    <br>
                                                    <label for="">SERVICIO EN DOMICIO</label>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ServDomicilioTelefono" name="ServDomicilioTelefono"/>
                                                        Teléfonos<label class="custom-control-label" for="ServDomicilioTelefono"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ServDomicilioInternet" name="ServDomicilioInternet"/>
                                                        Internet<label class="custom-control-label" for="ServDomicilioInternet"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ServDomicilioCable" name="ServDomicilioCable"/>
                                                        Cable<label class="custom-control-label" for="ServDomicilioCable"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ServDomicilioElectricidad" name="ServDomicilioElectricidad"/>
                                                        Electricidad<label class="custom-control-label" for="ServDomicilioElectricidad"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ServDomicilioAgua" name="ServDomicilioAgua"/>
                                                        Agua<label class="custom-control-label" for="ServDomicilioAgua"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="ServDomicilioDesague" name="ServDomicilioDesague"/>
                                                        Desague<label class="custom-control-label" for="ServDomicilioDesague"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   

                                </div>


                                {{-- segundo bloque --}}
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="card business-card">
                                            <div class="business-item" style="
                                                padding-left: 10px;
                                                padding-top: 10px;
                                                padding-right: 10px;
                                                padding-bottom: 10px;">
                                                <div class="business-items">
                                                    <label for="">TENENCIA DE ANIMALES</label>
                                                    <br>
                                                    <table class="table table-bordered table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>TIPO ANIMAL</th>
                                                                <th>MARCAR</th>
                                                                <th>VACUNAS</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    Mascota perro, gato
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="AnimalPerroGato" name="AnimalPerroGato"/>
                                                                        <label class="custom-control-label" for="AnimalPerroGato"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <select name="AnimalPerroGatoVacuna" id="AnimalPerroGatoVacuna" class="form-control form-control-sm">
                                                                        <option value="--">--</option>
                                                                        <option value="SI">SI</option>
                                                                        <option value="NO">NO</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    De importancia económica cabras, carneros, cerdos, vaca, aves de corralAnimalCabrasCarneros
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="AnimalCabrasCarneros" name="AnimalCabrasCarneros"/>
                                                                        <label class="custom-control-label" for="AnimalCabrasCarneros"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <select name="AnimalCabrasCarnerosVacuna" id="AnimalCabrasCarnerosVacuna" class="form-control form-control-sm">
                                                                        <option value="--">--</option>
                                                                        <option value="SI">SI</option>
                                                                        <option value="NO">NO</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Convive con los animales dentro de la vivienda
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="AnimalConvive" name="AnimalConvive"/>
                                                                        <label class="custom-control-label" for="AnimalConvive"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <select name="AnimalConviveVacuna" id="AnimalConviveVacuna" class="form-control form-control-sm">
                                                                        <option value="--">--</option>
                                                                        <option value="SI">SI</option>
                                                                        <option value="NO">NO</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>    
                                                    

                                                    <table class="table table-bordered table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>MEDIOS DE COMUNICACIÓN Y OTROS</th>
                                                                <th>SI/NO</th>
                                                                <th>¿?</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    Con mochila de emergencia
                                                                </td>
                                                                <td>
                                                                    <select name="MochilaEmergencia" id="MochilaEmergencia" class="form-control form-control-sm">
                                                                        <option value="--">--</option>
                                                                        <option value="SI">SI</option>
                                                                        <option value="NO">NO</option>
                                                                    </select>
                                                                </td>
                                                                <td>--</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Botiquín de emergencia
                                                                </td>
                                                                <td>
                                                                    <select name="BotiquinEmergencia" id="BotiquinEmergencia" class="form-control form-control-sm">
                                                                        <option value="--">--</option>
                                                                        <option value="SI">SI</option>
                                                                        <option value="NO">NO</option>
                                                                    </select>
                                                                </td>
                                                                <td>--</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Televisión
                                                                </td>
                                                                <td>
                                                                    <select name="Television" id="Television" class="form-control form-control-sm">
                                                                        <option value="--">--</option>
                                                                        <option value="SI">SI</option>
                                                                        <option value="NO">NO</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <label for="">Porqué?</label>
                                                                    <textarea name="TelevisionPorque" id="TelevisionPorque" class="form-control form-control-sm"></textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Radio
                                                                </td>
                                                                <td>
                                                                    <select name="Radio" id="Radio" class="form-control form-control-sm">
                                                                        <option value="--">--</option>
                                                                        <option value="SI">SI</option>
                                                                        <option value="NO">NO</option>
                                                                    </select>                                                                    
                                                                </td>
                                                                <td>
                                                                    <label for="">Porqué?</label>
                                                                    <textarea name="RadioPorque" id="RadioPorque" class="form-control form-control-sm"></textarea>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="table table-bordered table-responsive">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    Su vivienda ¿Cuenta con espacios destinados al almacenamiento, 
                                                                    conservación, manipulación y consumo de alimentos?    
                                                                </td>
                                                                <td>
                                                                    <select name="ViviendaEspacioAlimentos" id="ViviendaEspacioAlimentos" class="form-control form-control-sm">
                                                                        <option value="--">--</option>
                                                                        <option value="SI">SI</option>
                                                                        <option value="NO">NO</option>
                                                                    </select>
                                                                </td>     
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Su cocina ¿Cuenta con sistema de eliminación de humo 
                                                                    de cocina o ventilación?    
                                                                </td>
                                                                <td>
                                                                    <select name="CocinaVentilacionHumo" id="CocinaVentilacionHumo" class="form-control form-control-sm">
                                                                        <option value="--">--</option>
                                                                        <option value="SI">SI</option>
                                                                        <option value="NO">NO</option>
                                                                    </select>
                                                                </td>     
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="card business-card">
                                            <div class="business-item" style="
                                                padding-left: 10px;
                                                padding-top: 10px;
                                                padding-right: 10px;
                                                padding-bottom: 10px;">
                                                <div class="business-items">
                                                    <label for="">RIESGO DEL ENTORNO</label>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RiesgoLluviasInundaciones" name="RiesgoLluviasInundaciones"/>
                                                        Lluvias, inundaciones<label class="custom-control-label" for="RiesgoLluviasInundaciones"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RiesgoBasuraJuntoVivienda" name="RiesgoBasuraJuntoVivienda"/>
                                                        Basural junto a la vivienda<label class="custom-control-label" for="RiesgoBasuraJuntoVivienda"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RiesgoInserviblesJuntoVivienda" name="RiesgoInserviblesJuntoVivienda"/>
                                                        Inservibles junto a la vivienda<label class="custom-control-label" for="RiesgoInserviblesJuntoVivienda"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RiesgoHumosVaporesFabricas" name="RiesgoHumosVaporesFabricas"/>
                                                        Humos o Vapores de productos químicos 
                                                        de fábricas, industrias o minería<label class="custom-control-label" for="RiesgoHumosVaporesFabricas"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RiesgoDerrumbesHuaycos" name="RiesgoDerrumbesHuaycos"/>
                                                        Riesgos de derrumbes, huaycos<label class="custom-control-label" for="RiesgoDerrumbesHuaycos"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RiesgoPandillajeDelincuencia" name="RiesgoPandillajeDelincuencia"/>
                                                        Pandillaje, delincuencia<label class="custom-control-label" for="RiesgoPandillajeDelincuencia"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RiesgoAlcoholismoDrogadiccion" name="RiesgoAlcoholismoDrogadiccion"/>
                                                        Alcoholismo, drogadicción<label class="custom-control-label" for="RiesgoAlcoholismoDrogadiccion"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RiesgoSinAlumbradoPublico" name="RiesgoSinAlumbradoPublico"/>
                                                        Sin alumbramiento público<label class="custom-control-label" for="RiesgoSinAlumbradoPublico"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RiesgoPistasNoAsfaltadas" name="RiesgoPistasNoAsfaltadas"/>
                                                        Pistas no asfaltadas<label class="custom-control-label" for="RiesgoPistasNoAsfaltadas"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-primary custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RiesgoVectores" name="RiesgoVectores"/>
                                                        Vectores (mosquitos, zancudos, roedores, etc)<label class="custom-control-label" for="RiesgoVectores"></label>
                                                    </div>
                                                    <br>
                                                    <div class="custom-control custom-control-success custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="RiesgoOtros" name="RiesgoOtros"/>
                                                        Otros<label class="custom-control-label" for="RiesgoOtros"></label>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="btnGuardaCaracteristicaFamiliar">Guardar</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
        </form>
        {{-- END CARACTERISTICAS DE LA VIVIENDA --}}
    </div>
@endsection

@section('code_js')
    <script>

        $(document).on("click",".btnEliminarMiembroFamiliar",function(e){
            e.preventDefault();
            fila = $(this).closest("tr");
            id = (fila).find('td:eq(0)').text();
            EliminarRegistro("EliminaMiembroFamiliar/"+id,"Registro Eliminado!","#DTListarMiembroFamiliar");
        });
        
        $("#btnGuardaMiembroFamiliar").on("click",function(e){
            e.preventDefault();
            var serializedData = $("#formMiembroFamiliar").serialize();
            var ruta = "";
            var tabla = "#DTListarMiembroFamiliar";
            var mensaje="";
            if ($("#EtiquetaMiembroFamiliar").text() == 'Editar Miembro Familiar') {
                ruta = "ActualizaMiembroFamiliar";
                mensaje = "Registro Actualizado!";
                
            }
            if ($("#EtiquetaMiembroFamiliar").text() == 'Registrar Miembro Familiar') {
                ruta = "RegistraMiembroFamiliar";
                mensaje = "Registro Guardado!";
            }
            GuardarRegistro(serializedData,ruta,mensaje,tabla);

            $("#ModalMiembroFamiliar").modal('hide');
        });

        $(document).on("click",".btnEditarMiembroFamiliar",function(e){
            e.preventDefault();
            $("#EtiquetaMiembroFamiliar").text('Editar Miembro Familiar');
            fila = $(this).closest("tr");
            id = (fila).find('td:eq(0)').text();
            Nombres = (fila).find('td:eq(2)').text();
            Apellidos = (fila).find('td:eq(3)').text();
            Edad = (fila).find('td:eq(4)').text();
            TipoEdad = (fila).find('td:eq(5)').text();
            Sexo = (fila).find('td:eq(6)').text();
            NumeroDocumento = (fila).find('td:eq(7)').text();
            TipoDocumento = (fila).find('td:eq(8)').text();
            FechaNacimiento = (fila).find('td:eq(9)').text();
            Parentesco = (fila).find('td:eq(10)').text();
            EstadoCivil = (fila).find('td:eq(11)').text();
            GradoInstruccion = (fila).find('td:eq(12)').text();
            Ocupacion = (fila).find('td:eq(13)').text();
            CondicionOcupacion = (fila).find('td:eq(14)').text();
            SeguroSalud = (fila).find('td:eq(15)').text();

            $("#IdMiembro").val(id);
            $("#Nombres").val(Nombres);
            $("#Apellidos").val(Apellidos);
            $("#Edad").val(Edad);
            $("#TipoEdad").val(TipoEdad).change();
            $("#Sexo").val(Sexo).change();
            $("#NumeroDocumento").val(NumeroDocumento);
            $("#TipoDocumento").val(TipoDocumento).change();
            $("#FechaNacimiento").val(FechaNacimiento);
            $("#Parentesco").val(Parentesco).change();
            $("#EstadoCivil").val(EstadoCivil).change();
            $("#GradoInstruccion").val(GradoInstruccion).change();
            $("#Ocupacion").val(Ocupacion);
            $("#CondicionOcupacion").val(CondicionOcupacion).change();
            $("#SeguroSalud").val(SeguroSalud).change();

            $("#ModalMiembroFamiliar").modal('show');
            
        });

        $("#btnNuevoMiembroFamiliar").on("click", function(e) {
            $("#IdMiembro").val("");
            $("#Nombres").val("");
            $("#Apellidos").val("");
            $("#Edad").val("");
            $("#TipoEdad").val("AÑOS").change();
            $("#Sexo").val("M").change();
            $("#NumeroDocumento").val("");
            $("#TipoDocumento").val("DNI").change();
            // $("#FechaNacimiento").val("FechaNacimiento");
            $("#Parentesco").val("--").change();
            $("#EstadoCivil").val("--").change();
            $("#GradoInstruccion").val("--").change();
            $("#Ocupacion").val("");
            $("#CondicionOcupacion").val("--").change();
            $("#SeguroSalud").val("--").change();
        
            $("#ModalMiembroFamiliar").modal('show');
            $("#EtiquetaMiembroFamiliar").text("Registrar Miembro Familiar");

        });

        $(document).on("click", ".btnListarMiembroFamiliar", function(e) {
            e.preventDefault();
            fila = $(this).closest("tr");
            id = (fila).find('td:eq(0)').text();
            $("#MiembroIdFichaFamiliar").val(id);//aqui lista el ID para que este listo para guardar

            $.ajax({
                type: "GET",
                url: "ListarMiembroFamiliar/" + id,
                dataType: "json",
                success: function(response) {
                    $("#DTListarMiembroFamiliar").DataTable({
                        "drawCallback": function(settings) {
                            feather.replace();
                        },
                        "destroy": true,
                        "ajax": 'ListarMiembroFamiliar/' + id,
                        "method": 'GET',
                        "columns": [
                            {data: "id"},
                            {"defaultContent":
                                "<button class='btn btn-icon btn-gradient-warning btnEditarMiembroFamiliar'><i data-feather='edit-3'></i></button>\
                                <button class='btn btn-icon btn-gradient-danger btnEliminarMiembroFamiliar'><i data-feather='x'></i></button>"},
                            {data: "Nombres"},
                            {data: "Apellidos"},
                            {data: "Edad"},
                            {data: "TipoEdad"},
                            {data: "Sexo"},
                            {data: "NumeroDocumento"},
                            {data: "TipoDocumento"},
                            {data: "FechaNacimiento"},
                            {data: "Parentesco"},
                            {data: "EstadoCivil"},
                            {data: "GradoInstruccion"},
                            {data: "Ocupacion"},
                            {data: "CondicionOcupacion"},
                            {data: "SeguroSalud"},

                        ],
                        order: [0],
                    });
                }
            });

            $("#ModalListarMiembroFamiliar").modal('show');

        });
        ////////////////////////////////////////////////////////////////////////
        $("#btnNuevaVisitaFamiliar").on("click", function(e) {
            $("#ResponsableVisita").val("");
            $("#ResultadoVisita").val("");
            $("#ProximaVisita").val("");
            $("#ModalVisitaFamiliar").modal("show");
            $("#EtiquetaVisitaFamiliar").text("Registrar Visita Familiar");

        });

        $(document).on("click", ".btnEliminarVisitaFamiliar", function(e) {
            Swal.fire({
                title: 'Estás seguro?',
                text: "Confirma para poder eliminar el registro!",
                icon: 'Mensaje',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.preventDefault();
                    fila = $(this).closest("tr");
                    id = (fila).find('td:eq(0)').text();
                    $.ajax({
                        type: "GET",
                        url: "EliminaVisitaFamiliar/" + id,
                        dataType: "json",
                        success: function(response) {
                            Swal.fire(
                                'OK!',
                                'Registro Eliminado!',
                                'success'
                            )
                            $('#DTListarVisitaFamiliar').DataTable().ajax.reload();
                        },
                        error: function(response) {
                            Swal.fire(
                                'OPS!',
                                'Hubo un error!',
                                'error'
                            )
                        }
                    });
                }
            })
        });

        $("#btnGuardaVisitaFamiliar").on("click", function(e) {
            e.preventDefault();
            var serializedData = $("#formVisitaFamiliar").serialize();
            var ruta = "";
            if ($("#EtiquetaVisitaFamiliar").text() == 'Editar Visita Familiar') {
                ruta = "ActualizaVisitaFamiliar";
                mensaje = "Registro Actualizado!";
            }
            if ($("#EtiquetaVisitaFamiliar").text() == 'Registrar Visita Familiar') {
                ruta = "RegistraVisitaFamiliar";
                mensaje = "Registro Guardado!";
            }

            $.ajax({
                type: "POST",
                url: ruta,
                data: serializedData,
                dataType: "json",
                success: function(response) {
                    Swal.fire('OK!', mensaje, 'success')
                    $("#DTListarVisitaFamiliar").DataTable().ajax.reload();

                },
                error: function(response) {
                    Swal.fire('OPS!', 'Hubo un error!', 'error')
                },
            });
            $("#ModalVisitaFamiliar").modal('hide');

        });

        $(document).on("click", ".btnEditarVisitaFamiliar", function() {
            $("#EtiquetaVisitaFamiliar").text('Editar Visita Familiar');
            fila = $(this).closest("tr");
            id = (fila).find('td:eq(0)').text();
            FechaVisita = (fila).find('td:eq(2)').text();
            ResponsableVisita = (fila).find('td:eq(3)').text();
            ResultadoVisita = (fila).find('td:eq(4)').text();
            ProximaVisita = (fila).find('td:eq(5)').text();
            $("#IdVisita").val(id);
            $("#FechaVisita").val(FechaVisita);
            $("#ResponsableVisita").val(ResponsableVisita);
            $("#ResultadoVisita").val(ResultadoVisita);
            $("#ProximaVisita").val(ProximaVisita);

            $("#ModalVisitaFamiliar").modal('show')
        });

        $(document).on("click", ".btnListarVisitaFamiliar", function(e) {
            e.preventDefault();
            fila = $(this).closest("tr");
            id = (fila).find('td:eq(0)').text();
            $("#VisitaIdFichaFamiliar").val(id);

            $.ajax({
                type: "GET",
                url: "ListarVisitaFamiliar/" + id,
                dataType: "json",
                success: function(response) {
                    $("#DTListarVisitaFamiliar").DataTable({
                        "drawCallback": function(settings) {
                            feather.replace();
                        },
                        "destroy": true,
                        "ajax": 'ListarVisitaFamiliar/' + id,
                        "method": 'GET',
                        "columns": [{
                                data: "id"
                            },
                            {"defaultContent": "<button class='btn btn-icon btn-gradient-warning btnEditarVisitaFamiliar'><i data-feather='edit-3'></i></button>\
                                    <button class='btn btn-icon btn-gradient-danger btnEliminarVisitaFamiliar'><i data-feather='x'></i></button>"},
                            {data: "FechaVisita"},
                            {data: "ResponsableVisita"},
                            {data: "ResultadoVisita"},
                            {data: "ProximaVisita"},
                        ],
                        order: [0],
                    });
                }
            });

            $("#ModalListarVisitaFamiliar").modal('show');

        });

        $(document).on("click", ".btnEliminarFichaFamiliar", function(e) {
            Swal.fire({
                title: 'Estás seguro?',
                text: "Confirma para poder eliminar el registro!",
                icon: 'Mensaje',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.preventDefault();
                    fila = $(this).closest("tr");
                    id = (fila).find('td:eq(0)').text();
                    $.ajax({
                        type: "GET",
                        url: "EliminaFichaFamiliar/" + id,
                        dataType: "json",
                        success: function(response) {
                            Swal.fire(
                                'OK!',
                                'Registro Eliminado!',
                                'success'
                            )
                            $('#FichaFamiliar').DataTable().ajax.reload();
                        },
                        error: function(response) {
                            Swal.fire(
                                'OPS!',
                                'Hubo un error!',
                                'error'
                            )
                        }
                    });
                }
            })
        });

        $("#FichaFamiliar").dataTable({
            //funcion que renderiza todos los ícono nuevamente
            "drawCallback": function(settings) {
                feather.replace();
            },
            "ajax": 'ListarFichaFamiliar',
            "method": 'GET',
            "columns": [{
                    data: "id"
                },
                {
                    "defaultContent": "<button class='btn btn-icon btn-gradient-warning btnEditarFichaFamiliar'><i data-feather='edit-3'></i></button>\
                    <button class='btn btn-icon btn-gradient-danger btnEliminarFichaFamiliar'><i data-feather='x'></i></button>\
                    <button class='btn btn-icon btn-gradient-primary btnListarVisitaFamiliar'><i data-feather='home'></i></button>\
                    <button class='btn btn-icon btn-gradient-success btnListarMiembroFamiliar'><i data-feather='users'></i></button>\
                    <button class='btn btn-icon btn-gradient-info btnListarCaracteristicaFam'><i data-feather='user-check'></i></button>"
                },
                {
                    data: "Multifamiliar"},
                {data: "nombre_red"},
                {data: "nombre_microred"},
                {data: "nombre_establecimiento"},
                {data: "nombre_provincia"},
                {data: "nombre_distrito"},
                {data: "Localidad"},
                // {data:"Sector"},
                // {data:"Arearesidencia"},
                // {data:"Telefonocelular"},
                // {data:"Direccionvivienda"},
                // {data:"TelefoOtrapersona"},
                // {data:"TiempoEESSCercano"},
                // {data:"MedioTransporte"},
                // {data:"TiempoResidencia"},
                // {data:"ResidenciasAnteriores"},
                // {data:"DisponibilidadProximasVisitas"},
                // {data:"CorreoElectronico"},
                // {data:"Referencia"},
                // {data:"FechaUltimoRociadoResidual"},
                // {data:"Ninos"},
                // {data:"Adolescentes"},
                // {data:"Jovenes"},
                // {data:"Adultos"},
                // {data:"AdultosMayores"},
                // {data:"EtniaRaza"},
                // {data:"IdiomaPredominante"},
                // {data:"Religion"},
            ],
            order: [0],

        });

        $("#btnNuevaFichaFamiliar").click(function(e) {
            e.preventDefault();
            $("#ModalNuevaFichaFamiliar").modal('show');
            $("#EtiquetaFichaFamiliar").text('Nueva Ficha Familiar');
            $("#IconoNuevo").show();
            $("#IconoEditar").css('display', 'none');
            $("#visitas").show();
            $(".AgregarVisita").show()
        });

        $(document).on("click", ".btnEditarFichaFamiliar", function(e) {
            e.preventDefault();
            $("#ModalNuevaFichaFamiliar").modal('show');
            $("#EtiquetaFichaFamiliar").text('Editar Ficha Familiar');
            $("#IconoNuevo").css('display', 'none');

            fila = $(this).closest("tr");
            id = (fila).find('td:eq(0)').text();
            $("#idFichaFamiliar").val(id);

            $.ajax({
                type: "GET",
                url: "EditarFichaFamiliar/" + id,
                dataType: "json",
                success: function(response) {
                    $("#Multifamiliar").val(response[0].Multifamiliar);
                    $("#Gerencia").val(response[0].Gerencia);
                    $("#Idred").val(response[0].Idred).change();
                    $("#Idmicrored").val(response[0].Idmicrored).change();
                    $("#Establecimiento").val(response[0].IdEstablecimiento).change();
                    $("#Provincia").val(response[0].IdProvincia).change();
                    $("#Distrito").val(response[0].IdDistrito).change();
                    $("#Localidad").val(response[0].Localidad).change();
                    $("#Sector").val(response[0].Sector);
                    $("#Arearesidencia").val(response[0].Arearesidencia);
                    $("#Telefonocelular").val(response[0].Telefonocelular);
                    $("#Direccionvivienda").val(response[0].Direccionvivienda);
                    $("#TelefoOtrapersona").val(response[0].TelefoOtrapersona);
                    $("#TiempoEESSCercano").val(response[0].TiempoEESSCercano);
                    $("#MedioTransporte").val(response[0].MedioTransporte).change();
                    $("#TiempoResidencia").val(response[0].TiempoResidencia);
                    $("#ResidenciasAnteriores").val(response[0].ResidenciasAnteriores);
                    $("#DisponibilidadProximasVisitas").val(response[0].DisponibilidadProximasVisitas);
                    $("#CorreoElectronico").val(response[0].CorreoElectronico);
                    $("#Referencia").val(response[0].Referencia);
                    $("#FechaUltimoRociadoResidual").val(response[0].FechaUltimoRociadoResidual);
                    $("#Ninos").val(response[0].Ninos);
                    $("#Adolescentes").val(response[0].Adolescentes);
                    $("#Jovenes").val(response[0].Jovenes);
                    $("#Adultos").val(response[0].Adultos);
                    $("#AdultosMayores").val(response[0].AdultosMayores);
                    $("#EtniaRaza").val(response[0].EtniaRaza).change();
                    $("#IdiomaPredominante").val(response[0].IdiomaPredominante).change();
                    $("#Religion").val(response[0].Religion).change();

                }
            });
            $("#visitas").hide();
            $(".AgregarVisita").hide()
            $("#IconoEditar").show();
        });

        $("#formFichaFamiliar").submit(function(e) { //guarda o actualiza la ficha
            e.preventDefault();
            $("#Gerencia").prop('disabled', false);
            $("#Idred").prop('disabled', false);
            $("#Idmicrored").prop('disabled', false);
            $("#Provincia").prop('disabled', false);
            var serializedData = $("#formFichaFamiliar").serialize();
            var ruta = "";
            if ($("#EtiquetaFichaFamiliar").text() == 'Nueva Ficha Familiar') {
                ruta = "GuardaFichaFamiliar";
            } else {
                ruta = "ActualizaFichaFamiliar";
            }

            $.ajax({
                type: "POST",
                url: ruta,
                data: serializedData,
                dataType: "json",
                success: function(response) {
                    $('#FichaFamiliar').DataTable().ajax.reload();
                    Swal.fire(
                        'OK!',
                        'Registro Guardado!',
                        'success'
                    )

                    $("#visitas tbody").html("");
                    $("#ModalNuevaFichaFamiliar").modal("hide");
                    ide = 0;
                    num = 0;
                },
                error: function(response) {
                    Swal.fire(
                        'OPS!',
                        'Hubo un error!',
                        'error'
                    )
                }
            });
            $("#Gerencia").prop('disabled', true);
            $("#Idred").prop('disabled', true);
            $("#Idmicrored").prop('disabled', true);
            $("#Provincia").prop('disabled', true);
        });

        function ObtieneRedes(ests) {
            $.ajax({
                url: "ListarRedes/" + $("#" + ests + "").val(),
                method: "GET",
                dataType: "json",
                success: function(response) {
                    $.each(response.lista_redes, function(key, item) {
                        if ((item.Idests) == ($("#" + ests + "").val())) {
                            // $("#Departamento").val(item.dptoId).change();
                            $("#Idred").val(item.Idred).change();
                            $("#Idmicrored").val(item.Idmicrored).change();
                            return false;
                        }
                    });
                }
            });
        }

        function ObtieneRegiones(dist) {
            $.ajax({
                url: "ListarRegiones/" + $("#" + dist + "").val(),
                method: "GET",
                dataType: "json",
                success: function(response) {
                    $.each(response.lista_regiones, function(key, item) {
                        if ((item.distId) == ($("#" + dist + "").val())) {
                            // $("#Departamento").val(item.dptoId).change();
                            $("#Provincia").val(item.provId).change();
                            return false;
                        }
                    });
                }
            });
        }
        var num = 0;
        var ide = 0;
        $(document).on("click", ".btnEliminarVisita", function(e) {
            e.preventDefault();
            const btn = e.target;
            //aqui obtenemos el id que se va eliminar
            // fila=$(this).closest("tr");
            // id=(fila).find('td:eq(0)').text();

            btn.closest("tr").remove();
            num -= 1;

        });


        $(document).on("click", ".AgregarVisita", function(e) {
            e.preventDefault();
            ide += 1;
            if (num < 5) {
                num += 1;
                $("#visitas").append('<tr>\
            			<td>' + "<input type='date' name='fecha_visita" + ide + "' id='fecha_visita" + ide +
                    "' value='2023-01-01' required class='form-control form-control-sm'>" + '</td>\
            			<td>' + "<input type='text' name='responsable_visita" + ide + "' id='responsable_visita" + ide +
                    "' value='' required class='form-control form-control-sm'>" + '</td>\
            			<td>' + "<input type='text' name='resultado_visita" + ide + "' id='resultado_visita" + ide +
                    "' value='' required class='form-control form-control-sm'>" + '</td>\
            			<td>' + "<input type='text' name='proxima_visita" + ide + "' id='proxima_visita" + ide +
                    "' value='' class='form-control form-control-sm'>" + '</td>\
            			<td>' + "<button type='button' name='btnEliminarVisita" + ide +
                    "' id='btnEliminarVisita' class='btn btn-outline-danger btnEliminarVisita'>Eliminar</button>" + '</td>\
            					</tr>');
            } else {
                alert("Solo se permite " + num + "registros");
            }
        });

        var fecha = new Date();
        document.getElementById("FechaUltimoRociadoResidual").value = fecha.toJSON().slice(0, 10);
        document.getElementById("FechaVisita").value = fecha.toJSON().slice(0, 10);
        document.getElementById("FechaNacimiento").value = fecha.toJSON().slice(0, 10);

        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>

@endsection

@section('extra_js')
    <script src="../../../src/js/scripts/pages_app/crud.js"></script>
    <script src="../../../src/js/scripts/pages_app/ficha_familiar.js"></script>
@endsection