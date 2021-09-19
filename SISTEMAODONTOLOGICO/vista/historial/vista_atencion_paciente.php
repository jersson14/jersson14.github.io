<script type="text/javascript" src="../js/historial.js?rev=<?php echo time();?>"></script>


<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h3 class="animate__animated animate__zoomIn"><i class="fas fa-file-medical"></i>&nbsp;<b>GESTIÓN DE ATENCIÓN AL PACIENTE</b><button id="button-crear" type="button" onclick="cargar_contenido('contenido_principal','historial/vista_atencion_registro.php')" class="btn bg-gradient-primary ml-3"><i class="fas fa-plus mr-1"></i>Nuevo registro</button></h3>

          </div>
        </div>
      </div><!-- /.container-fluid -->     
    </section>
    <div class="container-fluid mt-0">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Buscar atención</b></h3>
                    <div class="input-group">
                        <input type="text" id="global_filter" class="global_filter form-control float-left" placeholder="Ingrese nombre del paciente o DNI">
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
                    <button onclick="listar_historial_fechas()" class="btn btn-danger mr-2" style="width:100%" onclick><i class="fas fa-search mr-1"></i>Buscar</button>
                </div>
                </div>
                <div class="table-responsive" style="text-align:center">
                <table id="tabla_historial" class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%">
                    <thead style="background-color:#1D8348;color:#FFFFFF;">
                        <tr>
                            <th>Nro</th>
                            <th>Fecha</th>
                            <th>DNI</th>
                            <th>Paciente</th>
                            <th>Monto Total</th>
                            <th>Diagnostico</th>
                            <th>Ver Detalle</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot style="background-color:#1D8348;color:#FFFFFF;">
                            <tr>
                            <th>Nro</th>
                            <th>Fecha</th>
                            <th>DNI</th>
                            <th>Paciente</th>
                            <th>Controles</th>
                            <th>Diagnostico</th>
                            <th>Ver Detalle</th>
                            <th>Acciones</th>
                            </tr>
                        </tfoot>
                </table>

                </div>
        
                </div>
                <div class="card-footer">
                
                </div>
            </div>
        </div>

    
            <!-- /.card -->
 </div>
 <div class="modal fade animate__animated animate__fadeInDown" id="modal_detalle"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h3 class="modal-title w-100 text-center" id="titleModal"><b>DETALLE TRATAMIENTO<b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="table-responsive" style="text-align:center">

                    <div class="col-12 col-md-12">
                        <table id="tabla_tratamiento" style="width:100%" class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th>Nro</th>
                            <th>Tratamiento</th>
                            <th>Fecha Cita</th>
                            <th>Hora</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tfoot class="thead-dark"> 
                            <tr>
                            <th>Id</th>
                            <th>Tratamiento</th>
                            <th>Fecha Cita</th>
                            <th>Hora</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Sub Total</th>
                            </tr>
                        </tfoot>
                        <tbody id="tbody_tabla_tratamiento">
                        <div class="col-12">
                        </div>
                        <div class="col-12">
                            <h3 for="" id="lbl_totalneto"></h3>
                    </div> 
                        </tbody>
                        </table>
                       
                    </div>
                                     
                    </div>
                    </div>
                    </div>
                    <div class="card-footer">
                   
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="modal fade animate__animated animate__fadeInDown" id="modal_vercontroles"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h3 class="modal-title w-100 text-center" id="titleModal"><b>SEGUIMIENTO DE CONTROLES</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="table-responsive" style="text-align:center">

                    <div class="col-12 col-md-12">
                        <table id="tabla_control" style="width:100%" class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th>Orden</th>
                            <th>Nro. Control</th>
                            <th>Descripción</th>
                            <th>Fecha de Control</th>
                            </tr>
                        </thead>
                        <tfoot class="thead-dark"> 
                            <tr>
                            <th>Orden</th>
                            <th>Nro. Control</th>
                            <th>Descripción</th>
                            <th>Fecha de Control</th>
                            </tr>
                        </tfoot>
                        </table>
                       
                    </div>
                                     
                    </div>
                    </div>
                    </div>
                    <div class="card-footer">
                   
                    </div>
                </div>
            </div>
        </div>
</div>


 <div class="modal fade animate__animated animate__fadeInDown" id="modal_diagnostico"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h3 class="modal-title w-100 text-center" id="titleModal"><b>DIAGNOSTICO DE LA CONSULTA<b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-12 col-md-12" style="text-align: center;">
                            <div class="form-group">
                                <h5 for="txt_diagnostico_fua" style="text-align: center;"><b>Motivo de la consulta</b></h5>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="time" class="form-control" style="resize:none" id="txt_motivo_consulta" rows="3"name="diagnostico2" placeholder="Ingrese alguna descripción" disabled></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div> 
                    <div class="col-12 col-md-12" style="text-align: center;">
                            <div class="form-group">
                                <h5 for="txt_diagnostico_fua" style="text-align: center;"><b>Diagnostico Presuntivo</b></h5>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="time" class="form-control" style="resize:none" id="txt_diagnosticopresuntivo_fua" rows="3"name="diagnostico2" placeholder="Ingrese alguna descripción" disabled></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>  
                    <div class="col-12 col-md-12" style="text-align: center;">
                            <div class="form-group">
                                <h5 for="txt_diagnostico_fua" style="text-align: center;"><b>Diagnostico Definitivo</b></h5>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="time" class="form-control" style="resize:none" id="txt_diagnostico_fua" rows="3"name="diagnostico2" placeholder="Ingrese alguna descripción" disabled></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>                    
                    </div>
                    </div>
                    <div class="card-footer">
                   
                    </div>
                </div>
            </div>
        </div>
</div>


<div class="modal fade animate__animated animate__fadeInDown" id="modal_control"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h3 class="modal-title w-100 text-center" id="titleModal"><i class="fas fa-file-alt"></i>&nbsp;<b>REGISTRO DE CONTROLES</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                            <input type="text" id="txt_idfua" hidden>
                                <label for="control">Nro de Control:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" id="control" name="control"placeholder="Ingrese el número de control" value="CONTROL 0" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción u observaciones:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea id="descripcion" class="form-control" cols="30" rows="5" placeholder="Ingrese descripción"></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>                       

                            </div>
                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Control()"><i class="fas fa-check"><b>&nbsp;Guardar</b></i></button>
                    <button type="button" data-dismiss="modal" onclick="LimpiarRegistro()" class="btn btn-danger float-right m-1"><i class="fas fa-times ml-1"><b>&nbsp;Cerrar</b></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
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
    listar_historial_fechas();


});
 </script>
