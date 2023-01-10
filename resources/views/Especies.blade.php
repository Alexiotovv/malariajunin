@extends('layouts.base')

@section('content')

<div class="card">
    <div class="card-header border-bottom">
        <div class="card-title"><h5>REGISTRO DE ESPECIES</h5>
            <button class="btn btn-primary" data-toggle="modal" id="btnNuevoRegistroEspecie"><i data-feather='plus'></i>
                Nuevo
            </button>
        </div>
    </div>

    <div class="card-body">
        <table id="DTListaEspecies" class="table table-responsive">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Acción</th>
                    <th>Nombre Especie</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>  

</div>

<form id="frmEspecie">
        @csrf
        <div class="modal-size-sm d-inline-block">
            <div class="modal fade text-left" id="ModalNuevaEspecie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaEspecie">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                <label for="nombre_especie">Id</label>
                                    <input type="text" class="form-control form-control-sm" name="IdEspecie"
                                    id="IdEspecie" readonly>
                                    <label for="nombre_especie">Nombre Especie</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre_especie"
                                    id="nombre_especie" required>
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
    <script src="../../../src/js/scripts/pages_app/crud.js"></script>
    <script src="../../../src/js/scripts/pages_app/especies.js"></script>
@endsection