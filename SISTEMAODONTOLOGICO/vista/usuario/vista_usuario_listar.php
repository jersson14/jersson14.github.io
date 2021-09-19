<script type="text/javascript" src="../js/usuario.js?rev=<?php echo time();?>"></script>

<form autocomplete="false" onsubmit="return false">
    <div class="modal fade animate__animated animate__slideInDown" id="modal_registro"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="far fa-user"></i>&nbsp;<b>CREAR USUARIO</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="usuario">Usuario:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user icon-form"></i></div>
                                </div>
                                <input type="text" class="form-control" id="usuario" name="usuario"placeholder="Ingrese usuario" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="contraseña">Contraseña:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-passport"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese contraseña" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-envelope icon-form"></i></div>
                                </div>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese correo" required><br>
                                <label for="" id="emailOK" style="color:red"></label>
                                <input type="text" id="validar_email" hidden>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            


                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="sexo">Sexo:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-smile-wink"></i></div>
                                </div>
                                <select type="text" class="form-control" id="sexo" name="sexo">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Femenino">Femenino</option><option value="Masculino">Masculino</option>
                                </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="cbm_rol">Tipo de Usuario:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-child"></i></div>
                                </div>
                                <select type="text" class="form-control" id="cbm_rol" name="cbm_rol">                         </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Registrar_Usuario()"><i class="fas fa-check"><b>&nbsp;Guardar</b></i></button>
                    <button type="button" data-dismiss="modal" onclick="LimpiarRegistro()" class="btn btn-danger float-right m-1"><i class="fas fa-times ml-1"><b>&nbsp;Cerrar</b></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="animate__animated animate__zoomIn"><i class="far fa-user"></i>&nbsp;<b>GESTIÓN DE USUARIOS</b><button id="button-crear" type="button" onclick="AbrirModalRegistro()" class="btn bg-gradient-primary ml-3"><i class="fas fa-plus mr-1"></i>Nuevo registro</button></h1>

          </div>
        </div>
      </div><!-- /.container-fluid -->     
    </section>
    <div class="container-fluid mt-0">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Buscar usuario</b></h3>
                    <div class="input-group">
                        <input type="text" id="global_filter" class="global_filter form-control float-left" placeholder="Ingrese nombre de usuario">
                        <div class="input-group-append">
                            <button class="btn btn-default"
                                ><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="text-align:center">
        <div class="card-body">
            <table id="tabla_usuario" class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%">
            <thead style="background-color:#1D8348;color:#FFFFFF;">
                <tr>
                    <th>Orden</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Sexo</th>
                    <th>Tipo de Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot style="background-color:#1D8348;color:#FFFFFF;">
                    <tr>
                    <th>Orden</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Sexo</th>
                    <th>Tipo de Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
                </div>
                <div class="card-footer">
                
                </div>
            </div>
        </div>
        </div>


    
            <!-- /.card -->
 </div>
 <form autocomplete="false" onsubmit="return false">
    <div class="modal fade animate__animated animate__fadeInDown" id="modal_editar"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg-9" >
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="far fa-user"></i>&nbsp;<b>MODIFICAR DATOS DEL USUARIO</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <input type="text" id="txtidusuario" hidden>
                                <label for="usuario_editar">Usuario:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user icon-form"></i></div>
                                </div>
                                <input type="text" id="usuarioactual" hidden>
                                <input type="text" class="form-control" id="usuario_nuevo" name="usuario_editar"placeholder="Ingrese usuario" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="correo_editar">Correo:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-envelope icon-form"></i></div>
                                </div>
                                <input type="email" id="correo_editar_actual" hidden>
                                <input type="email" class="form-control" id="correo_editar_nuevo" name="correo_editar" placeholder="Ingrese correo" required><br>
                                <label for="" id="emailOK_editar" style="color:red"></label>
                                <input type="text" id="validar_email_editar" hidden>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="sexo_editar1">Sexo:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-smile-wink"></i></div>
                                </div>
                                <select type="text" class="form-control" id="sexo_editar1" name="sexo_editar1">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Femenino">Femenino</option><option value="Masculino">Masculino</option>
                                </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="cbm_rol_editar">Tipo de Usuario:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-child"></i></div>
                                </div>
                                <select type="text" class="form-control" id="cbm_rol_editar" name="cbm_rol_editar">
                                </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            
                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Modificar_Usuario()"><i class="fas fa-check"><b>&nbsp;Modificar</b></i></button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger float-right m-1"><i class="fas fa-times ml-1"><b>&nbsp;Cerrar</b></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</form>
 <script>
$(document).ready(function(){
    listar_usuario();
    $('.js-example-basic-single').select2();
    LimpiarRegistro();
listar_combo_rol();
$('#modal_registro').on('shown.bs.modal',function(){
    $("#nombre_paciente").focus();
})
});
document.getElementById('correo').addEventListener('input', function() {
    campo = event.target; 
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if(emailRegex.test(campo.value)){
        $(this).css("border","");
        $('#emailOK').html("");
        $('#validar_email').val("correcto");
    }else{
        $(this).css("border","1px solid red");
        $('#emailOK').html("Email Incorrecto");
        $('#validar_email').val("incorrecto");
    }
});
document.getElementById('correo_editar').addEventListener('input', function() {
    campo = event.target; 
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if(emailRegex.test(campo.value)){
        $(this).css("border","");
        $('#emailOK_editar').html("");
        $('#validar_email_editar').val("correcto");
    }else{
        $(this).css("border","1px solid red");
        $('#emailOK_editar').html("Email Incorrecto");
        $('#validar_email_editar').val("incorrecto");
    }
});
 </script>
