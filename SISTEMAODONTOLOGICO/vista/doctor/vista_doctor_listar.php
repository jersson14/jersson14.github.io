<script type="text/javascript" src="../js/doctor.js?rev=<?php echo time();?>"></script>

<form autocomplete="false" onsubmit="return false">
    <div class="modal fade animate__animated animate__slideInDown" id="modal_registro"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="nav-icon fas fa-user-md"></i>&nbsp;<b>REGISTRAR DATOS DOCTOR</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="dni">DNI:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                                </div>
                                <input type="text" class="form-control" max="8" size="8" maxlenght="8" id="dni" name="dni"placeholder="Ingrese DNI" onkeypress="return soloNumeros(event)" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-md icon-form"></i></div>
                                </div>
                                <input type="text" class="form-control" id="nombres" onkeypress="return soloLetras(event)"  name="nombres"placeholder="Ingrese nombres" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="apellidos">Apellidos:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-user-md icon-form"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="apellidos" onkeypress="return soloLetras(event)"  name="apellidos" placeholder="Ingrese apellidos" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
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
                                                        
                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="celular">Celular:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" class="form-control" max="9" size="9" maxlenght="9" onkeypress="return soloNumeros(event)" id="celular" name="celular"placeholder="Ingrese el celular">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="direccion">Dirección:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-building"></i></div>
                                </div>
                                <textarea id="direccion" class="form-control" cols="30" rows="2" placeholder="Ingrese la dirección"></textarea>                         </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-12" style="text-align:center">
                            <li class="header text-center" style="color:#FFFFFF;background-color:Black;"><b>DATOS DEL USUARIO</b></li>  
                            </div><br><br>
                            <div class="col-12 col-md-6">
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

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="contraseña">Contrase&ntilde;a:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-passport"></i></div>
                                </div>
                                <input type="password" class="form-control" id="contraseña" name="contraseña"placeholder="Ingrese contraseña" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="cbm_rol">Rol:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-child"></i>
                                    </div>
                                </div>
                                <select type="text" class="form-control"disabled id="cbm_rol" name="cbm_rol"></select> 
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-envelope icon-form"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese email" required>
                                <label for="" id="emailOK" style="color:red"></label>
                                <input type="text" id="validar_email" hidden>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Registro_Doctor()"><i class="fas fa-check"><b>&nbsp;Guardar</b></i></button>
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
            <h1 class="animate__animated animate__zoomIn"><i class="nav-icon fas fa-user-md"></i>&nbsp;<b>GESTIÓN DE DOCTOR</b><button id="button-crear" type="button" onclick="AbrirModalRegistro()" class="btn bg-gradient-primary ml-3"><i class="fas fa-plus mr-1"></i>Nuevo registro</button></h1>

          </div>
        </div>
      </div><!-- /.container-fluid -->     
    </section>
    <div class="container-fluid mt-0">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Buscar doctor</b></h3>
                    <div class="input-group">
                        <input type="text" id="global_filter" class="global_filter form-control float-left" placeholder="Ingrese datos del doctor">
                        <div class="input-group-append">
                            <button class="btn btn-default"
                                ><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="text-align:center">
        <div class="card-body">
            <table id="tabla_doctor" class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%">
            <thead style="background-color:#1D8348;color:#FFFFFF;">
                <tr>
                    <th>Orden</th>
                    <th>Dni</th>
                    <th>COP</th>
                    <th>Doctor</th>
                    <th>Dirección</th>
                    <th>Celular</th>
                    <th>Sexo</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </thead>
            <tfoot style="background-color:#1D8348;color:#FFFFFF;">
                    <tr>
                    <th>Orden</th>
                    <th>Dni</th>
                    <th>COP</th>
                    <th>Doctor</th>
                    <th>Dirección</th>
                    <th>Celular</th>
                    <th>Sexo</th>
                    <th>Acci&oacute;n</th>
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

<div class="modal fade animate__animated animate__fadeInDown" id="modal_editar"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="nav-icon fas fa-user-md"></i>&nbsp;<b>MODIFICAR DATOS DOCTOR</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" id="txt_iddoctor" hidden>
                                <label for="dni_editar">DNI:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                                </div>
                                <input type="number" id="dni_editar_actual" name="dni_editar_actual" hidden>
                                <input type="number" class="form-control" max="8" size="8" maxlenght="8" id="dni_editar_nuevo" name="dni_editar"placeholder="Ingrese DNI" onkeypress="return soloNumeros(event)" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="nombres_editar">Nombres:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-md icon-form"></i></div>
                                </div>
                                <input type="text" class="form-control" id="nombres_editar" onkeypress="return soloLetras(event)" name="nombres_editar"placeholder="Ingrese nombres" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="apellidos_editar">Apellidos:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-user-md icon-form"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="apellidos_editar" onkeypress="return soloLetras(event)" name="apellidos_editar" placeholder="Ingrese apellidos" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="sexo_editar">Sexo:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-smile-wink"></i></div>
                                </div>
                                <select type="text" class="form-control" id="sexo_editar" name="sexo_editar">
                                    <option value="Seleccione">Seleccione...</option>
                                    <option value="Femenino">Femenino</option><option value="Masculino">Masculino</option>
                                </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                                                        
                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="celular_editar">Celular:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="number" class="form-control" max="9" size="9" maxlenght="9" id="celular_editar" name="celular_editar" onkeypress="return soloNumeros(event)" placeholder="Ingrese el celular">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="direccion_editar">Dirección:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-building"></i></div>
                                </div>
                                <textarea id="direccion_editar" class="form-control" cols="30" rows="2" placeholder="Ingrese la dirección"></textarea>                         </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Editar_Doctor()"><i class="fas fa-check"><b>&nbsp;Guardar</b></i></button>
                    <button type="button" data-dismiss="modal" onclick="LimpiarRegistro()" class="btn btn-danger float-right m-1"><i class="fas fa-times ml-1"><b>&nbsp;Cerrar</b></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
</div>
 <script>
$(document).ready(function(){
    listar_doctor();
    listar_combo_rol();
LimpiarRegistro();
$('#modal_registro').on('shown.bs.modal',function(){
    $("#dni").focus();
    
})
});
document.getElementById('email').addEventListener('input', function() {
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
var input=  document.getElementById('dni');
input.addEventListener('input',function(){
  if (this.value.length > 8) 
     this.value = this.value.slice(0,8); 
})
var input=  document.getElementById('celular');
input.addEventListener('input',function(){
  if (this.value.length > 9) 
     this.value = this.value.slice(0,9); 
})
var input=  document.getElementById('dni_editar');
input.addEventListener('input',function(){
  if (this.value.length > 8) 
     this.value = this.value.slice(0,8); 
})
var input=  document.getElementById('celular_editar');
input.addEventListener('input',function(){
  if (this.value.length > 9) 
     this.value = this.value.slice(0,9); 
})
 </script>
