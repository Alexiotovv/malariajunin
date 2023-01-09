@extends('layouts.base')

@section('content')
    
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title">DISTRIBUCION - MAPEO ENTOMOLÓGICO</h5>
            <!-- Button trigger modal -->
            <button class="btn btn-primary" data-toggle="modal" id="btnNuevoMapeoEntoCuadro"><i
                    data-feather='plus'></i>
                Nuevo
            </button>
            <!-- Modal -->
        </div>
        <div class="card-body">
            <table id="DTListaMapeoEntoCuadro" class="table table-responsive">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Accion</td> 
                        <td>Provincia</td>
                        <td>Distrito</td>
                        <td>Red</td>
                        <td>MicroRed</td>
                        <td>Localidad</td>
                        <td>TipoMapeo</td>
                        <td>Especie</td>
                        <td>Mes</td>
                        <td>Año</td>
                        <td>Usuario</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <form id="formMapeoEntoCuadro">
        @csrf
        <div class="modal-size-xl d-inline-block">
            <div class="modal fade text-left" id="ModalMapeoEntoCuadro" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaMapeoEntoCuadro">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-xl-12">    
                                <div class="row">
                                    <div class="col-xl-2">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control form-control-xl" name="IdMapeoEntoCuadro" 
                                        id="IdMapeoEntoCuadro" readonly>
                                    </div>
                                    
                                    <div class="col-xl-2">
                                        <label for="">PROVINCIA</label>
                                        <select name="Provincia" id="Provincia" class="form-control form-control-xl"
                                            readonly>
                                            @foreach ($prov as $prov)
                                                <option value="{{ $prov->id }}">{{ $prov->nombre_prov }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-xl-2">
                                        <label for="">DISTRITO</label>
                                        <select name="Distrito" id="Distrito" class="select2 form-control-xl"
                                            onchange="ObtieneRegiones('Distrito');">
                                            @foreach ($dist as $dist)
                                                <option value="{{ $dist->id }}">
                                                    {{ $dist->codigo }}-{{ $dist->nombre_dist }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-2">
                                        <label for="">RED</label>
                                        {{-- aqui debe cargar lista --}}
                                        <select name="Idred" id="Idred" class="form-control form-control-xl"
                                        readonly>
                                            @foreach ($red as $red)
                                                <option value="{{ $red->id }}">
                                                    {{ $red->codigo }}-{{ $red->nombre_red }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-2">
                                        <label for="">MICRORED</label>
                                        {{-- Aqui debe Cargar lista --}}
                                        <select name="Idmicrored" id="Idmicrored" onchange="ObtieneRed('Idmicrored');" class="select2 form-control-xl">
                                            @foreach ($microred as $microred)
                                                <option value="{{ $microred->id }}">
                                                    {{ $microred->codigo }}-{{ $microred->nombre_microred }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                            
                                    <div class="col-xl-2">
                                        <label for="">LOCALIDAD</label>
                                        <select name="Localidad" id="Localidad" class="select2" >
                                            @foreach ($localidades as $loc)
                                                <option value="{{$loc->id}}">{{$loc->nombre_localidad}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-2">
                                        <label for="tipo_mapeo">Tipo</label>
                                        <select name="tipo_mapeo" id="tipo_mapeo" class="form-control">
                                            <option value="INTRA">INTRA</option>    
                                            <option value="PERI">PERI</option>    
                                            <option value="EXTRA">EXTRA</option>    
                                        </select>
                                    </div>

                                    <div class="col-xl-3">
                                            <label for="Especies">Especies</label>
                                            <div class="input-group">
                                            <select name="Especies" id="Especies" class="form-control" style="margin-left: 0%;">
                                                @foreach ($especies as $e)
                                                    <option value="{{$e->id}}">{{$e->nombre_especie}}</option>    
                                                @endforeach
                                            </select>
                                            <a type="button"  id="AgregarEspecie" class="btn btn-outline-primary" style="padding-rigth: 30%;"><i data-feather='plus-circle'></i></a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-2">
                                        <label for="mes">Mes</label>
                                        <select class="form-control" name="mes" id="mes">
                                            <option value="ENE">ENE</option>
                                            <option value="FEB">FEB</option>
                                            <option value="MAR">MAR</option>
                                            <option value="ABR">ABR</option>
                                            <option value="MAY">MAY</option>
                                            <option value="JUN">JUN</option>
                                            <option value="JUL">JUL</option>
                                            <option value="AGO">AGO</option>
                                            <option value="SEP">SEP</option>
                                            <option value="OCT">OCT</option>
                                            <option value="NOV">NOV</option>
                                            <option value="DIC">DIC</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2">
                                        <label for="ano">Año</label>
                                        <select class="form-control" name="ano" id="ano">
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                        </select>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaMapeoEntoCuadro">Guardar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="frmNuevaEspecie">
        {{--  action="{{route('Guarda.Especie')}}" method="POST"  --}}
        @csrf
        <div class="modal-size-sm d-inline-block">
            <div class="modal fade text-left" id="ModalNuevaEspecie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaNuevaEspecie">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="nombre_especie">Nombre Especie</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre_especie" 
                                    id="nombre_especie" >
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaNuevaEspecie">Guardar</button>
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
    <script src="../../../src/js/scripts/pages_app/mapeoento_cuadro.js"></script>
@endsection
