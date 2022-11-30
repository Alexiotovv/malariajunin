@extends('layouts.base')

@section('content')

    {{-- LISTAR USUARIOS --}}
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title">LISTA DE USUARIOS</h5>
            <button class="btn btn-primary" id="btnNuevoUsuario"><i data-feather='plus'></i>
                Nuevo
            </button>
        </div>

        <table class="datatables-advance table" id="DTUsuarios">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ACCIÓN</th>
                    <th>USUARIO</th>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                    <th>CORREO</th>
                    <th>ROL</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    {{-- END LISTAR USUARIOS --}}
    </div>
    {{-- FORM REGISTER/UPDATE USUARIOS --}}
    <form id="formUsuario">
        @csrf
        <div class="modal-size-lg d-inline-block">
            <div class="modal fade text-left" id="ModalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-default" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaUsuario">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="">Id</label>
                                        <input type="text" class="form-control form-control" name="IdUsuario" id="IdUsuario" readonly>
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label class="form-label" for="">Usuario</label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" required />
                                        <p id="estadousuario" style="color: red"></p> 
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="">Nombres</label>
                                        <input type="text" id="nombres" class="form-control" name="nombres" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" required />
                                        <p id="nombres" style="color: red"></p> 
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="">Apellidos</label>
                                        <input type="text" id="name" class="form-control" name="apellidos" placeholder="apellidos" aria-label="apellidos" aria-describedby="basic-addon-name" required />
                                        <p id="apellidos" style="color: red"></p> 
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol Usuario</label>
                                        <select name="rol" id="rol" class="form-control form-control">
                                            <option value="1">Administrador</option>
                                            <option value="0">Registrador</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="">Correo</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe@email.com" required />
                                        <p id="estadoemail" style="color: red"></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="">Contraseña</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="status" class="form-control form-control">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                    
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaUsuario">Guardar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- END FORM REGISTER/UPDATE USUARIOS --}}

     {{-- FORM ACTUALIZAR USUARIOS --}}
     <form id="formCambiarClave">
        @csrf
        <div class="modal-size-lg d-inline-block">
            <div class="modal fade text-left" id="ModalCambiarClave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-default" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="EtiquetaCambiarClave">-</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3">
                                        {{-- <label for="">Id</label> --}}
                                        <input type="text" class="form-control form-control" name="IdUsuarioClave" id="IdUsuarioClave" hidden>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="">Nombre del Usuario</label>
                                    <input type="text" id="NombreUsuario" name="NombreUsuario" class=" form-control form-control-md" readonly/>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Contraseña</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge" id="passwordchange" type="password" name="passwordchange" placeholder="············" aria-describedby="login-password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                    <label class="form-label">Reingrese Contraseña</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge" id="passwordchange2" type="password" name="passwordchange2" placeholder="············" aria-describedby="login-password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                            </div>        
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnGuardaContrasena">Guardar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- END FORM ACTUALIZAR USUARIOS --}}
@endsection

@section('extra_js')
    <script src="../../../src/js/scripts/pages_app/crud.js"></script>
    <script src="../../../src/js/scripts/pages_app/usuarios.js"></script>
@endsection

@section('code_js')
     <!-- BEGIN: Page JS-->
     <script src="../../../app-assets/js/scripts/tables/table-datatables-basic.min.js"></script>
     <!-- END: Page JS-->
@endsection