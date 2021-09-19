<script type="text/javascript" src="../js/consulta.js?rev=<?php echo time();?>"></script>

<form autocomplete="false" onsubmit="return false">
    <div class="modal fade animate__animated animate__slideInDown" id="modal_registro"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="fas fa-file-signature"></i>&nbsp;<b>REGISTRO DE CONSULTA</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="cbm_paciente_consulta">Paciente:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user icon-form"></i></div>
                                </div>
                                <select type="text" class="form-control js-example-basic-single" id="cbm_paciente_consulta" name="cbm_paciente_consulta" style="width:91%"></select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="motivo_consulta">Motivo de Consulta:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="time" class="form-control" style="resize:none" id="motivo_consulta" rows="3"name="motivo_consulta" placeholder="Ingrese alguna descripción" required></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            


                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="diagnostico1">Diagnostico Presuntivo:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="time" class="form-control" style="resize:none" id="diagnostico1" rows="3"name="diagnostico1" placeholder="Ingrese alguna descripción" required></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="diagnostico2">Diagnostico Definitivo:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="time" class="form-control" style="resize:none" id="diagnostico2" rows="3"name="diagnostico2" placeholder="Ingrese alguna descripción" required></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Registro_Consulta()"><i class="fas fa-check"><b>&nbsp;Guardar</b></i></button>
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
            <h1 class="animate__animated animate__zoomIn"><i class="fas fa-file-signature"></i>&nbsp;<b>GESTIÓN DE CONSULTAS</b><button id="button-crear" type="button" onclick="AbrirModalRegistro()" class="btn bg-gradient-primary ml-3"><i class="fas fa-plus mr-1"></i>Nuevo registro</button></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->     
    </section>
    <div class="container-fluid mt-0">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Buscar consulta</b></h3>
                    <div class="input-group">
                        <input type="text" id="global_filter" class="global_filter form-control float-left" placeholder="Ingrese datos de la consulta">
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
                    <button onclick="listar_consulta_busqueda()" class="btn btn-danger mr-2" style="width:100%" onclick><i class="fas fa-search mr-1"></i>Buscar</button>
                </div>
                </div>
                <div class="table-responsive" style="text-align:center">
            <table id="tabla_conculta" class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%">
            <thead style="background-color:#1D8348;color:#FFFFFF;">
                <tr>
                    <th>Orden</th>
                    <th>DNI</th>
                    <th>Paciente</th>
                    <th>Fecha de Registro</th>
                    <th>Diagnostico Presuntivo</th>
                    <th>Diagnostico Definitivo</th>
                    <th>Estado</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </thead>
            <tfoot style="background-color:#1D8348;color:#FFFFFF;">
                    <tr>
                    <th>Orden</th>
                    <th>DNI</th>
                    <th>Paciente</th>
                    <th>Fecha de Registro</th>
                    <th>Diagnostico Presuntivo</th>
                    <th>Diagnostico Definitivo</th>
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
 <div class="modal fade  animate__animated animate__fadeInDown" id="modal_editar"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="fas fa-file-signature"></i>&nbsp;<b>MODIFICAR CONSULTA</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <input type="text" id="txtidconsulta" hidden>
                                <label for="cbm_paciente_consulta_editar">Paciente:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user icon-form"></i></div>
                                </div>
                                <input type="text" class="form-control" id="cbm_paciente_consulta_editar" name="cbm_paciente_consulta_editar" required disabled>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="motivo_consulta_editar">Motivo de Consulta:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="time" class="form-control" style="resize:none" id="motivo_consulta_editar" rows="3"name="motivo_consulta" placeholder="Ingrese alguna descripción" required></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            


                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="diagnostico1_editar">Diagnostico Presuntivo:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="time" class="form-control" style="resize:none" id="diagnostico1_editar" rows="3"name="diagnostico1" placeholder="Ingrese alguna descripción" required></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="diagnostico2_editar">Diagnostico Definitivo:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="time" class="form-control" style="resize:none" id="diagnostico2_editar" rows="3"name="diagnostico2" placeholder="Ingrese alguna descripción" required></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Edita_Consulta()"><i class="fas fa-check"><b>&nbsp;Modificar</b></i></button>
                    <button type="button" data-dismiss="modal" onclick="LimpiarRegistro()" class="btn btn-danger float-right m-1"><i class="fas fa-times ml-1"><b>&nbsp;Cerrar</b></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
 <script>
$(document).ready(function(){
    $('.js-example-basic-single').select2();
    lista_consulta();
    listar_paciente_combo_consulta();
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
    
$('#modal_registro').on('shown.bs.modal',function(){
    $("#nombre_paciente").focus();
    
})
listar_gasto_busqueda();

});
 </script>
