<script type="text/javascript" src="../js/paciente.js?rev=<?php echo time();?>"></script>

<form autocomplete="false" onsubmit="return false">
    <div class="modal fade animate__animated animate__slideInDown" id="modal_registro"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="fas fa-user"></i>&nbsp;<b>REGISTRO DE PACIENTE</b></h>
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
                                <input type="text" class="form-control" id="dni"  max="8" size="8" maxlenght="8" name="dni"placeholder="Ingrese DNI" onkeypress="return soloNumeros(event)" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user icon-form"></i></div>
                                </div>
                                <input type="text" class="form-control" id="nombres" name="nombres"placeholder="Ingrese nombres" onkeypress="return soloLetras(event)" required>
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
                                    <i class="fas fa-user icon-form"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos" onkeypress="return soloLetras(event)" required>
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
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="fechanacimiento">Fecha Nacimiento:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-birthday-cake icon-form"></i></div>
                                </div>
                                <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento" required><br>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="lugarnacimiento">Lugar de Nacimiento:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" id="lugarnacimiento" name="lugarnacimiento" required><br>
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
                                <input type="text" class="form-control"  max="9" size="9" maxlenght="9" id="celular" name="celular"placeholder="Ingrese el celular" onkeypress="return soloNumeros(event)" required>
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
                                <textarea id="direccion" class="form-control" cols="30" rows="3" placeholder="Ingrese la dirección"></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Registro_Paciente()"><i class="fas fa-check"><b>&nbsp;Guardar</b></i></button>
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
            <h1 class="animate__animated animate__zoomIn"><i class="fas fa-user"></i>&nbsp;<b>GESTIÓN DE PACIENTES</b><button id="button-crear" type="button" onclick="AbrirModalRegistro()" class="btn bg-gradient-primary ml-3"><i class="fas fa-plus mr-1"></i>Nuevo registro</button></h1>

          </div>
        </div>
      </div><!-- /.container-fluid -->     
    </section>
    <div class="container-fluid mt-0">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Buscar paciente</b></h3>
                    <div class="input-group">
                        <input type="text" id="global_filter" class="global_filter form-control float-left" placeholder="Ingrese datos de paciente">
                        <div class="input-group-append">
                            <button class="btn btn-default"
                                ><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="text-align:center">
        <div class="card-body">
            <table id="tabla_paciente" class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%">
            <thead style="background-color:#1D8348;color:#FFFFFF;">
                <tr>
                    <th>Orden</th>
                    <th>DNI</th>
                    <th>Paciente</th>
                    <th>Sexo</th>
                    <th>Celular</th>
                    <th>Dirección</th>
                    <th>Tiene Historia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot style="background-color:#1D8348;color:#FFFFFF;">
                    <tr>
                    <th>Orden</th>
                    <th>DNI</th>
                    <th>Paciente</th>
                    <th>Sexo</th>
                    <th>Celular</th>
                    <th>Dirección</th>
                    <th>Tiene Historia</th>
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
 <div class="modal fade animate__animated animate__fadeInDown" id="modal_editar"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="fas fa-user"></i>&nbsp;<b>MODIFICAR DATOS DEL PACIENTE</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" id="txtidpaciente" hidden>
                                <label for="dni_editar">DNI:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                                </div>
                                <input type="text" id="dni_editar_actual" hidden>
                                <input type="text" class="form-control" id="dni_editar" max="8" size="8" maxlenght="8" name="dni_editar"placeholder="Ingrese DNI" onkeypress="return soloNumeros(event)" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="nombres_editar">Nombres:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user icon-form"></i></div>
                                </div>
                                <input type="text" class="form-control" id="nombres_editar" name="nombres_editar"placeholder="Ingrese nombres" onkeypress="return soloLetras(event)" required>
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
                                    <i class="fas fa-user icon-form"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="apellidos_editar" name="apellidos_editar" placeholder="Ingrese apellidos" onkeypress="return soloLetras(event)" required>
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
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="fechanacimiento_editar">Fecha Nacimiento:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-birthday-cake icon-form"></i></div>
                                </div>
                                <input type="date" class="form-control" id="fechanacimiento_editar" name="fechanacimiento_editar" required><br>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                                
                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="lugarnacimiento_editar">Lugar de Nacimiento:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" id="lugarnacimiento_editar" name="lugarnacimiento_editar" required><br>
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
                                <input type="text" class="form-control" id="celular_editar" max="9" size="9" maxlenght="9" name="celular_editar"placeholder="Ingrese el celular" onkeypress="return soloNumeros(event)">
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
                                <textarea id="direccion_editar" class="form-control" cols="30" rows="3" placeholder="Ingrese la dirección"></textarea>                         </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Modificar_Paciente()"><i class="fas fa-check"><b>&nbsp;Guardar</b></i></button>
                    <button type="button" data-dismiss="modal"  class="btn btn-danger float-right m-1"><i class="fas fa-times ml-1"><b>&nbsp;Cerrar</b></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


 <script>
$(document).ready(function(){
    listar_paciente();
LimpiarRegistro();
$('#modal_registro').on('shown.bs.modal',function(){
    $("#dni").focus();
})
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
