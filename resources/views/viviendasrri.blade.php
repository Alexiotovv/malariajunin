@extends('layouts.base')

@section('content')
    
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title">FICHA DE EVALUACIÓN DE VIVIENDAS CON RRI</h5>
            <!-- Button trigger modal -->
            <button class="btn btn-primary" data-toggle="modal" id="btnNuevoRegistroRRI"><i
                    data-feather='plus'></i>
                Nuevo
            </button>
            <!-- Modal -->
        </div>
        <div class="card-body">
            <table id="DTListaViviendasRRI" class="table table-responsive">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Accion</td> 
                        <td>Provincia</td>
                        <td>Distrito</td>
                        <td>Red</td>
                        <td>MicroRed</td>
                        <td>Localidad</td>
                        <td>Usuario</td>

                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>

    {{-- LISTA VIVIENDAS ROCIADAS --}}
    <div class="modal-size-lg d-inline-block">
        <div class="modal fade text-left" id="ModalListaViviendasRociadas" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Lista Viviendas Rociadas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-primary" id="btnNuevoViviendaRociada">
                                    <i data-feather='plus'></i>Nuevo
                                </button>
                            </div>
                        </div>
                        <table class="table table-responsive" id="DTListaViviendasRociadas">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Acción</th>
                                    <th>Número V.Rociadas</th>
                                    <th>Fecha Primer Ciclo</th>
                                    <th>Fecha Segundo Ciclo</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- CIERRE LISTA VIVIENDAS ROCIADAS --}}



    <form id="formViviendasRRI">
        @csrf
        <div class="modal-size-lg d-inline-block">
            <div class="modal fade text-left" id="ModalViviendasRRI" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaViviendasRRI">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">    
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control form-control-md" name="IdViviendasRRI" 
                                        id="IdViviendasRRI" readonly>
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
                                        <select name="Idmicrored" id="Idmicrored" onchange="ObtieneRed('Idmicrored');" class="select2 form-control-md">
                                            @foreach ($microred as $microred)
                                                <option value="{{ $microred->id }}">
                                                    {{ $microred->codigo }}-{{ $microred->nombre_microred }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                            
                                    <div class="col-lg-4">
                                        <label for="">LOCALIDAD</label>
                                        <select name="Localidad" id="Localidad" class="select2" >
                                            @foreach ($localidades as $loc)
                                                <option value="{{$loc->id}}">{{$loc->nombre_localidad}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaViviendaRRI">Guardar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="formViviendasRociadas">
        @csrf
        <div class="modal-size-sm d-inline-block">
            <div class="modal fade text-left" id="ModalViviendasRociadas" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaViviendasRociadas">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12">    
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control form-control-sm" name="IdViviendasRociadas" 
                                        id="IdViviendasRociadas" readonly>
                                        <input type="text" class="form-control form-control-sm" name="IdViviendasRociadasIRR" 
                                        id="IdViviendasRociadasIRR" 
                                        hidden>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <label for="">NÚMERO VIVIENDAS ROCIADAS</label>
                                        <input type="number" class="form-control form-control-sm" name="NumeroViviendasRociadas" 
                                        id="NumeroViviendasRociadas">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="">FECHA PRIMER CICLO</label>
                                        <input type="date" class="form-control form-control-sm" name="FechaPrimerCiclo" 
                                        id="FechaPrimerCiclo">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="">FECHA SEGUNDO CICLO</label>
                                        <input type="date" class="form-control form-control-sm" name="FechaSegundoCiclo" 
                                        id="FechaSegundoCiclo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaViviendaRociada">Guardar</button>
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
    <script src="../../../src/js/scripts/pages_app/viviendasrri.js"></script>
@endsection
