@extends('layouts.base')

@section('content')
    
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title">FICHA DE CENSO DE BIENES CON MANTENIMIENTO Y ESTADO DE LOS MISMOS</h5>
            <!-- Button trigger modal -->
            <button class="btn btn-primary" data-toggle="modal" id="btnNuevoMantBienes"><i
                    data-feather='plus'></i>
                Nuevo
            </button>
            <!-- Modal -->
        </div>
        <div class="card-body">
            <table id="DTListaMantBienes" class="table table-responsive">
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

    {{-- LISTA MANTBIENES_DETALLE --}}
    <div class="modal-size-xl d-inline-block">
        <div class="modal fade text-left" id="ModalListaMantbienesDetalle" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Lista Detalle de Bienes</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-primary" id="btnNuevoMantBienesDetalle">
                                    <i data-feather='plus'></i>Nuevo
                                </button>
                            </div>
                        </div>
                        <table class="table table-responsive" id="DTListaMantBienesDetalle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Acción</th>
                                    <th>Descripcion</th>
                                    <th>NumeroSerie</th>
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <th>AnoFab</th>
                                    <th>AnoCompra</th>
                                    <th>Estado</th>
                                    <th>Observaciones</th>
                                    <th>Mant.Preventivo</th>
                                    <th>Mant.Correctivo</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- CIERRE LISTA MANBIENES_DETALLE --}}

    <form id="formMantBienes">
        @csrf
        <div class="modal-size-lg d-inline-block">
            <div class="modal fade text-left" id="ModalMantBienes" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaMantBienes">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">    
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="">ID</label>
                                        <input type="text" class="form-control form-control-md" name="IdMantBienes" 
                                        id="IdMantBienes" readonly>
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
                            <button type="submit" class="btn btn-success" id="btnGuardaMantBienes">Guardar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="formMantbienesDetalle">
        @csrf
        <div class="modal-size-lg d-inline-block">
            <div class="modal fade text-left" id="ModalMantbienesDetalle" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaMantbienesDetalle">-</h4>
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
                                        <input type="text" class="form-control form-control-sm" name="IdMantbienesDetalle" 
                                        id="IdMantbienesDetalle" 
                                        hidden>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">DESCRIPCIÓN</label>
                                        <input type="text" class="form-control form-control-sm" name="Descripcion" 
                                        id="Descripcion">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">NÚMERO SERIE</label>
                                        <input type="text" class="form-control form-control-sm" name="NumeroSerie" 
                                        id="NumeroSerie">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">MODELO</label>
                                        <input type="text" class="form-control form-control-sm" name="Modelo" 
                                        id="Modelo">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">MARCA</label>
                                        <input type="text" class="form-control form-control-sm" name="Marca" 
                                        id="Marca">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">AÑO FAB</label>
                                        <input type="text" class="form-control form-control-sm" name="AnoFab" 
                                        id="AnoFab" maxlength="4">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">AÑO COMPRA</label>
                                        <input type="text" class="form-control form-control-sm" name="AnoCompra" 
                                        id="AnoCompra" maxlength="4">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">ESTADO</label>
                                        <select class="form-control form-control-sm" name="Estado"
                                                id="Estado">
                                                <option value="--">--</option>
                                                <option value="BUENO">BUENO</option>
                                                <option value="REGULAR">REGULAR</option>
                                                <option value="MALO">MALO</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">OBSERVACIONES</label>
                                        <textarea type="text" class="form-control form-control-sm" name="Observaciones" 
                                        id="Observaciones"></textarea>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">ULT.MANT.PREVENTIVO</label>
                                        <input type="date" class="form-control form-control-sm" name="MPreventivo" 
                                        id="MPreventivo" maxlength="4">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">ULT.MANT.CORRECTIVO</label>
                                        <input type="date" class="form-control form-control-sm" name="MCorrectivo" 
                                        id="MCorrectivo" maxlength="4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaMantbienesDetalle">Guardar</button>
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
    <script src="../../../src/js/scripts/pages_app/mantbienes.js"></script>
    <script src="../../../src/js/scripts/pages_app/obtiene_red.js"></script>
@endsection
