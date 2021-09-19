<script type="text/javascript" src="../js/cita.js?rev=<?php echo time();?>"></script>

<form autocomplete="false" onsubmit="return false">
    <div class="modal fade animate__animated animate__slideInDown" id="modal_registro"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="fas fa-calendar-alt"></i>&nbsp;<b>REGISTRO DE CITA</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="cbm_paciente">Paciente:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user icon-form"></i></div>
                                </div>
                                <select type="text" class="form-control js-example-basic-single" id="cbm_paciente" name="cbm_paciente" style="width:89%"></select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                    </div>
                                </div>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="hora">Hora:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                                <input type="time" class="form-control" id="hora" name="hora" placeholder="Ingrese correo" required><br>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            


                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="cbm_medico">Médico:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-md"></i></div>
                                </div>

                                <select type="text" class="form-control" disabled id="cbm_medico" name="cbm_medico"></select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="time" class="form-control" style="resize:none" id="descripcion" rows="3"name="descripcion" placeholder="Ingrese alguna descripción" required></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Registro_Citas()"><i class="fas fa-check"><b>&nbsp;Guardar</b></i></button>
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
            <h1 class="animate__animated animate__zoomIn"><i class="fas fa-calendar-alt"></i>&nbsp;<b>GESTIÓN DE CITAS</b><button id="button-crear" type="button" onclick="AbrirModalRegistro()" class="btn bg-gradient-primary ml-3"><i class="fas fa-plus mr-1"></i>Nuevo registro</button></h1>

          </div>
        </div>
      </div><!-- /.container-fluid -->     
    </section>
    <div class="container-fluid mt-0">
            <div class="card card-success ">
                <div class="card-header">
                    <h3 class="card-title "><b>Buscar cita</b></h3>
                    <div class="input-group">
                        <input type="text" id="global_filter" class="global_filter form-control float-left" placeholder="Ingrese datos de la cita">
                        <div class="input-group-append">
                            <button class="btn btn-default"
                                ><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                </div>
        <div class="card-body">
        <div class="row">
                <div class="col-12 col-md-3" role="document">
                    <div class="form-group">
                    <label for="txtfechainicio">Fecha Desde:</label>
                        <div class="input-group mb-2">
                         <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                            </div>
                        </div>
                        <input type="date" class="form-control" id="txtfechainicio" name="txtfechainicio" required>
                        <div class="valid-input invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-3" role="document">
                    <div class="form-group">
                    <label for="txtfechafin">Fecha Hasta:</label>
                        <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                            </div>
                        </div>
                        <input type="date" class="form-control" id="txtfechafin" name="txtfechafin" required>
                        <div class="valid-input invalid-feedback"></div>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-2" role="document">
                    <label for="">&nbsp;</label><br>
                    <button onclick="listar_citas()" class="btn btn-danger mr-2" style="width:100%" onclick><i class="fas fa-search mr-1"></i>Buscar</button>
                </div>
                </div>
                <div class="table-responsive " style="text-align:center">
            <table id="tabla_cita" class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%">
            <thead style="background-color:#1D8348;color:#FFFFFF;">
                <tr>
                    <th>Orden</th>
                    <th>Nro Atenci&oacute;n</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Paciente</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot style="background-color:#1D8348;color:#FFFFFF;">
                    <tr>
                    <th>Orden</th>
                    <th>Nro Atenci&oacute;n</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Paciente</th>
                    <th>Descripción</th>
                    <th>Estado</th>
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
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="fas fa-calendar-alt"></i>&nbsp;<b>MODIFICAR CITA</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input type="text" id="txtidcita" hidden>
                                <label for="cbm_paciente_editar">Paciente:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user icon-form"></i></div>
                                </div>
                                <select type="text" class="form-control js-example-basic-single" id="cbm_paciente_editar" name="cbm_paciente_editar" style="width:89%">                         </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="fecha_editar">Fecha:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                    </div>
                                </div>
                                <input type="text" id="fecha_editar_actual" hidden>
                                <input type="date" class="form-control" id="fecha_editar" name="fecha_editar" required >
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="hora_editar">Hora:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                                <input type="time" id="hora_editar_actual" hidden>
                                <input type="time" class="form-control" id="hora_editar" name="hora_editar" placeholder="Ingrese correo" required><br>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="estado_cita">Estado:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-arrow-alt-circle-right"></i></div>
                                </div>
                                <select type="text" class="form-control" id="estado_cita" name="estado_cita">
                                    <option value="CANCELADA">CANCELADA</option>
                                    <option value="PENDIENTE">PENDIENTE</option>
                                </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="descripcion_editar">Descripción:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="time" class="form-control" style="resize:none" id="descripcion_editar" rows="3"name="descripcion" placeholder="Ingrese alguna descripción" required></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            
                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Editar_Citas()"><i class="fas fa-check"><b>&nbsp;Modificar</b></i></button>
                    <button type="button" data-dismiss="modal" onclick="LimpiarRegistro();" class="btn btn-danger float-right m-1 "><i class="fas fa-times ml-1 "><b>&nbsp;Cerrar</b></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
 <script>
$(document).ready(function(){
    var n = new Date();
    var y= n.getFullYear();
    var m= n.getMonth()+1;
    var d= n.getDate();
    if(d<10){
        d='0' + d;
    }
    if(m<10){
        m='0' + m;

    }
    document.getElementById('txtfechainicio').value = y + "-" + m + "-" + d;
    document.getElementById('txtfechafin').value = y + "-" + m + "-" + d;
    document.getElementById('fecha').value = y + "-" + m + "-" + d;
    listar_citas();
    listar_medico_combo();
    $('.js-example-basic-single').select2();
    LimpiarRegistro();
    listar_paciente();
    data();
    dataeditar();
$('#modal_registro').on('shown.bs.modal',function(){
    $("#nombre_paciente").focus();
})
});
 </script>
