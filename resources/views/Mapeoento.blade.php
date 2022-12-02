@extends('layouts.base')

@section('content')
    
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title">FICHA DE EVALUACIÓN DE LOCALIDAD CON MAPEO ENTOMOLÓGICO</h5>
            <!-- Button trigger modal -->
            <button class="btn btn-primary" data-toggle="modal" id="btnNuevoMapeoEnto"><i
                    data-feather='plus'></i>
                Nuevo
            </button>
            <!-- Modal -->
        </div>
        <div class="card-body">
            <table id="DTListaMapeoEnto" class="table table-responsive">
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

    {{-- LISTA MAPEOS --}}
    <div class="modal-size-lg d-inline-block">
        <div class="modal fade text-left" id="ModalListaIndicePicadura" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Lista Índice de Picadura</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-primary" id="btnNuevoIndicePicadura">
                                    <i data-feather='plus'></i>Nuevo
                                </button>
                            </div>
                        </div>
                        <table class="table table-responsive" id="DTListaIndicePicadura">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Acción</th>
                                    <th>Fecha</th>
                                    <th>Índice P. Hora-Hombre</th>
                                    <th>Índice P. Hora-Noche</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- CIERRE LISTA VIVIENDAS ROCIADAS --}}


    <form id="formMapeoEnto">
        @csrf
        <div class="modal-size-lg d-inline-block">
            <div class="modal fade text-left" id="ModalMapeoEnto" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaMapeoEnto">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">    
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control form-control-md" name="IdMapeoEnto" 
                                        id="IdMapeoEnto" readonly>
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
                            <button type="submit" class="btn btn-success" id="btnGuardaMapeoEnto">Guardar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="formIndicePicadura">
        @csrf
        <div class="modal-size-sm d-inline-block">
            <div class="modal fade text-left" id="ModalIndicePicadura" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaIndicePicadura">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12">    
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control form-control-sm" name="IdIndicePicadura" 
                                        id="IdIndicePicadura" readonly>
                                        <input type="text" class="form-control form-control-sm" name="IdIndicePicaduraMapeoEnto" 
                                        id="IdIndicePicaduraMapeoEnto" 
                                        hidden>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <label for="">FECHA</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha" 
                                        id="fecha">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="">ÍNDICE HORA-HOMBRE</label>
                                        <input type="text" class="form-control form-control-sm" name="indicehombrehora" 
                                        id="indicehombrehora">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="">ÍNDICE HORA-NOCHE</label>
                                        <input type="text" class="form-control form-control-sm" name="indicehombrenoche" 
                                        id="indicehombrenoche">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaIndicePicadura">Guardar</button>
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
    <script src="../../../src/js/scripts/pages_app/mapeoento.js"></script>
@endsection
