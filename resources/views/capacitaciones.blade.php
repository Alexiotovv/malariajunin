@extends('layouts.base')

@section('content')
    
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title">CAPACITACIÓN A TÉCNICOS DE LABORATORIO</h5>
            <!-- Button trigger modal -->
            <button class="btn btn-primary" data-toggle="modal" id="btnNuevoCapacitaciones"><i
                    data-feather='plus'></i>
                Nuevo
            </button>
            <!-- Modal -->
        </div>
        <div class="card-body">
            <table id="DTListaCapacitaciones" class="table table-responsive">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Accion</td>
                        <td>Provincia</td>
                        <td>Distrito</td>
                        <td>Red</td>
                        <td>MicroRed</td>
                        <td>Establecimiento</td>
                        <td>Usuario</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>

    {{-- LISTA CAPACITACIONESS_DETALLE --}}
    <div class="modal-size-xl d-inline-block">
        <div class="modal fade text-left" id="ModalListaCapacitacionesDetalle" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Lista Detalle de Capacitaciones</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-primary" id="btnNuevoCapacitacionesDetalle">
                                    <i data-feather='plus'></i>Nuevo
                                </button>
                            </div>
                        </div>
                        <table class="table table-responsive" id="DTListaCapacitacionesDetalle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Acción</th>
                                    <th>NombreMicroscopista</th>
                                    <th>ApellidoMicroscopista</th>
                                    <th>Concordancia</th>
                                    <th>UltimaCapacitacion</th>
                                    <th>Fech.Ult.EvaluaciónLámina</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- CIERRE LISTA MANBIENES_DETALLE --}}

    <form id="formCapacitaciones">
        @csrf
        <div class="modal-size-lg d-inline-block">
            <div class="modal fade text-left" id="ModalCapacitaciones" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaCapacitaciones">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">    
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control form-control-md" name="IdCapacitaciones" 
                                        id="IdCapacitaciones" readonly>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <label for="">PROVINCIA</label>
                                        <select name="Provincia" id="Provincia" class="form-control form-control-md"
                                            readonly>
                                            @foreach ($prov as $prov)
                                                <option value="{{ $prov->id }}">{{ $prov->nombre_prov }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="">DISTRITO</label>
                                        <select name="Distrito" id="Distrito" class="select2 form-control"
                                            onchange="ObtieneRegiones('Distrito');">
                                            @foreach ($dist as $dist)
                                                <option value="{{ $dist->id }}">
                                                    {{ $dist->codigo }}-{{ $dist->nombre_dist }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">RED</label>
                                        {{-- aqui debe cargar lista --}}
                                        <select name="Idred" id="Idred" class="form-control form-control-md"
                                        readonly>
                                            @foreach ($red as $red)
                                                <option value="{{ $red->id }}">
                                                    {{ $red->codigo }}-{{ $red->nombre_red }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">MICRORED</label>
                                        {{-- Aqui debe Cargar lista --}}
                                        <select name="Idmicrored" id="Idmicrored" class="form-control form-control-md"
                                        readonly>
                                            @foreach ($microred as $microred)
                                                <option value="{{ $microred->id }}">
                                                    {{ $microred->codigo }}-{{ $microred->nombre_microred }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                            
                                    <div class="col-lg-4">
                                        <label for="">PUESTO DE SALUD</label>
                                        <select class="select2 form-control-md" name="Ipress"
                                                id="Ipress" onchange="ObtieneRedes('Ipress');">
                                                @foreach ($ests as $ests)
                                                    <option value="{{ $ests->id }}">
                                                        {{ $ests->codigo }}-{{ $ests->nombre_establecimiento }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaCapacitaciones">Guardar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="formCapacitacionesDetalle">
        @csrf
        <div class="modal-size-lg d-inline-block">
            <div class="modal fade text-left" id="ModalCapacitacionesDetalle" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaCapacitacionesDetalle">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12">    
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control form-control-sm" name="IdDetalle" 
                                        id="IdDetalle" readonly>
                                        <input type="text" class="form-control form-control-sm" name="IdCapacitacionesDetalle" 
                                        id="IdCapacitacionesDetalle" 
                                        hidden>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">NOMBRE MICROSCOPISTA</label>
                                        <input type="text" class="form-control form-control-sm" name="NombreMicroscopista" 
                                        id="NombreMicroscopista">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">APELLIDO MICROSCOPISTA</label>
                                        <input type="text" class="form-control form-control-sm" name="ApellidoMicroscopista" 
                                        id="ApellidoMicroscopista">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">CONCORDANCIA > 98 %</label>
                                        <select class="form-control form-control-sm" name="Concordancia"
                                                id="Concordancia">
                                                <option value="--">--</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">ÚLTIMA CAPACITACIÓN</label>
                                        <input type="date" class="form-control form-control-sm" name="UltimaCapacitacion" 
                                        id="UltimaCapacitacion">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">FECHA ULT.EVAL.PANEL LÁMINAS</label>
                                        <input type="date" class="form-control form-control-sm" name="FechaUltEvalPanelLam" 
                                        id="FechaUltEvalPanelLam">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaCapacitacionesDetalle">Guardar</button>
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
    <script src="../../../src/js/scripts/pages_app/capacitaciones.js"></script>
    <script src="../../../src/js/scripts/pages_app/obtiene_red.js"></script>
@endsection
