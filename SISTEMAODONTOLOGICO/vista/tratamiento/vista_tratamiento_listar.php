<script type="text/javascript" src="../js/tratamiento.js?rev=<?php echo time();?>"></script>
    <div class="modal fade animate__animated animate__slideInDown" id="modal_registro"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="fas fa-file-alt"></i>&nbsp;<b>REGISTRO DE TRATAMIENTO</B></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="tratamiento">Nombre:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" id="tratamiento" name="tratamiento"placeholder="Ingrese nombre del tratamiento" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-file-signature"></i>
                                    </div>
                                </div>
                                <textarea id="descripcion" class="form-control" cols="30" rows="3" placeholder="Ingrese la descripción"></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div> 

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="cbm_especialidad">Especialidad:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-tag"></i></div>
                                </div>
                                <select type="text" class="form-control" style="width:90%;"id="cbm_especialidad" name="cbm_especialidad">
                                </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="precio">Precio:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="precio" name="precio"placeholder="Ingrese precio" onkeypress="return soloNumeros(event)" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            
                           

                            </div>
                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Registrar_Tratamiento()"><i class="fas fa-check"><b>&nbsp;Guardar</b></i></button>
                    <button type="button" data-dismiss="modal" onclick="LimpiarRegistro()" class="btn btn-danger float-right m-1"><i class="fas fa-times ml-1"><b>&nbsp;Cerrar</b></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="animate__animated animate__zoomIn"><i class="fas fa-file-alt"></i>&nbsp;<b>GESTIÓN DE TRATAMIENTOS</b><button id="button-crear" type="button" onclick="AbrirModalRegistro()" class="btn bg-gradient-primary ml-3"><i class="fas fa-plus mr-1"></i>Nuevo registro</button></h1>
            <input type="hidden" id="tipo_usuario">
          </div>
        </div>
      </div><!-- /.container-fluid -->     
    </section>
    <div class="container-fluid mt-0">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Buscar tratamiento</b></h3>
                    <div class="input-group">
                        <input type="text" id="global_filter" class="global_filter form-control float-left" placeholder="Ingrese nombre del tratamiento">
                        <div class="input-group-append">
                            <button class="btn btn-default"
                                ><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="text-align:center">
        <div class="card-body">
            <table id="tabla_tratamiento" class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%">
            <thead style="background-color:#1D8348;color:#FFFFFF;">
                <tr>
                    <th>Orden</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Especialidad</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot style="background-color:#1D8348;color:#FFFFFF;">
                    <tr>
                    <th>Orden</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Especialidad</th>
                    <th>Precio</th>
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
 <div class="modal fade animate__animated animate__fadeInDown" id="modal_editar"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="fas fa-file-alt"></i>&nbsp;<b>MODIFICAR TRATAMIENTO</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <input type="text" id="txtidtratamiento" hidden>
                                <label for="tratamiento_editar">Nombre:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" id="tratamiento_editar" name="tratamiento_editar"placeholder="Ingrese nombre del tratamiento" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="descripcion_editar">Descripcion:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-file-signature"></i>
                                    </div>
                                </div>
                                <textarea id="descripcion_editar" class="form-control" cols="30" rows="3" placeholder="Ingrese la descripción"></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div> 

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="cbm_especialidad_editar">Especialidad:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-tag"></i></div>
                                </div>
                                <select type="text" class="form-control" style="width:90%;"id="cbm_especialidad_editar" name="cbm_especialidad_editar">
                                </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="precio_editar">Precio:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="precio_editar" name="precio_editar"placeholder="Ingrese precio" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            
                           

                            </div>
                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Modificar_Tratamiento()"><i class="fas fa-check"><b>&nbsp;Guardar</b></i></button>
                    <button type="button" data-dismiss="modal" onclick="LimpiarRegistro()" class="btn btn-danger float-right m-1"><i class="fas fa-times ml-1"><b>&nbsp;Cerrar</b></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <script>
$(document).ready(function(){
    $('.js-example-basic-single').select2();
    LimpiarRegistro();
    listar_tratamiento();
    listar_combo_tratamiento()
$('#modal_registro').on('shown.bs.modal',function(){
    $("#tratamiento").focus();
})
});
 </script>
