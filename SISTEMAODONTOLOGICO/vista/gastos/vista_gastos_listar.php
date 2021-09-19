<script type="text/javascript" src="../js/gastos.js?rev=<?php echo time();?>"></script>

<form autocomplete="false" onsubmit="return false">
    <div class="modal fade animate__animated animate__slideInDown" id="modal_registro"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="fas fa-fast-backward"></i>&nbsp;<b>REGISTRO DE GASTO</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="tipo">Tipo de Gasto:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <select type="text" class="form-control" id="tipo" name="tipo">
                                    <option value="ALQUILER">ALQUILER</option>
                                    <option value="INSTRUMENTO">INSTRUMENTO</option>
                                    <option value="MATERIAL">MATERIAL</option>
                                </select>
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
                                <textarea type="text" class="form-control" style="resize:none" id="descripcion" rows="3"name="descripcion" placeholder="Ingrese alguna descripción" required></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            


                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="cantidad">Cantidad:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="monto">Monto:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="money" class="form-control"  id="monto" name="monto" placeholder="Ingrese el monto del gasto" required onkeypress="return soloNumeros(event)">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Registro_Gastos()"><i class="fas fa-check"><b>&nbsp;Guardar</b></i></button>
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
            <h1 class="animate__animated animate__zoomIn"><i class="fas fa-fast-backward"></i>&nbsp;<b>GESTIÓN DE GASTOS</b><button id="button-crear" type="button" onclick="AbrirModalRegistro()" class="btn bg-gradient-primary ml-3"><i class="fas fa-plus mr-1"></i>Nuevo registro</button></h1>

          </div>
        </div>
      </div><!-- /.container-fluid -->     
    </section>
    <div class="container-fluid mt-0">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Buscar gastos realizados</b></h3>
                    <div class="input-group">
                        <input type="text" id="global_filter" class="global_filter form-control float-left" placeholder="Ingrese datos de algun gasto que realizo">
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
                    <button onclick="listar_gasto_busqueda()" class="btn btn-danger mr-2" style="width:100%" onclick><i class="fas fa-search mr-1"></i>Buscar</button>
                </div>
                
                </div>
                <div class="table-responsive" style="text-align:center">
            <table id="tabla_gastos"class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%" style="text-align: center">
            <thead style="background-color:#1D8348;color:#FFFFFF;">
                <tr>
                    <th>Nro</th>
                    <th>Tipo de Gasto</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </thead>
            <tfoot style="background-color:#1D8348;color:#FFFFFF;">
            <tr>
                    <th>Nro</th>
                    <th>Tipo de Gasto</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Acci&oacute;n</th>
            </tr>
        </tfoot>
            </table>
            </div><br>
            <div class="col-12" style="text-align:center">
                        <h5 style="text-decoration: underline" ><b>TOTAL DE GASTOS POR FECHAS</b></h5>
                    </div>
            <div class="table-responsive" style="text-align:center">
            <table id="tabla_total_fechas"class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%" style="text-align: center">
            <thead style="background-color:#D68910;color:#FFFFFF;">
                <tr> 
                    <th>Fecha Desde</th>
                    <th>Fecha Hasta</th>
                    <th>Total por Fechas</th>
                </tr>
            </thead>
            <tfoot style="background-color:#D68910;color:#FFFFFF;">
            <tr>
                    <th></th>
                    <th></th>
                    <th></th>
            </tr>
        </tfoot>
            </table>
                </div><br>
                <div class="col-12" style="text-align:center">
                        <h5 style="text-decoration: underline" ><b>DIFERENCIA ENTRE TOTAL DE INGRESOS Y GASTOS</b></h5>
                    </div>
                <div class="table-responsive" style="text-align:center">
            <table id="tabla_diferencia" class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%" style="text-align: center">
            <thead style="background-color:#184664;color:#FFFFFF;">
                <tr> 
                    <th>Fecha Desde</th>
                    <th>Fecha Hasta</th>
                    <th>Total Ingresos</th>
                    <th>Total Gastos </th>
                    <th>Diferencia</th>
                </tr>
            </thead>
            <tfoot style="background-color:#184664;color:#FFFFFF;">
            <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
            </tr>
        </tfoot>
            </table>
                </div><br>
                <div class="col-12" style="text-align:center">
                        <h5 style="text-decoration: underline" ><b>TOTAL DE GASTOS</b></h5>
                    </div>
                <div class="table-responsive" style="text-align:center">
            <table id="tabla_total"class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%" style="text-align: center">
            <thead style="background-color:#21618C;color:#FFFFFF;">
                <tr>
                    <th>Total General</th>
                </tr>
            </thead>
            <tfoot style="background-color:#21618C;color:#FFFFFF;">
            <tr>
                    <th></th>
            </tr>
        </tfoot>
            </table>
                </div>
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
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="fas fa-fast-backward"></i>&nbsp;<b>MODIFICAR GASTO</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <input type="text" id="txtidgasto" hidden>
                            <label for="tipo_editar">Tipo de Gasto:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <select type="text" class="form-control" id="tipo_editar" name="tipo_editar">
                                    <option value="ALQUILER">ALQUILER</option>
                                    <option value="INSTRUMENTO">INSTRUMENTO</option>
                                    <option value="MATERIAL">MATERIAL</option>
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
                                <textarea type="text" class="form-control" style="resize:none" id="descripcion_editar" rows="3"name="descripcion_editar" placeholder="Ingrese alguna descripción" required></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            


                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="cantidad_editar">Cantidad:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="number" class="form-control" id="cantidad_editar" name="cantidad_editar" placeholder="Ingrese la cantidad" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="monto_editar">Monto:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="money" class="form-control"  id="monto_editar" name="monto_editar" placeholder="Ingrese el monto del gasto" required></textarea onkeypress="return soloNumeros(event)">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Edita_Gasto()"><i class="fas fa-check"><b>&nbsp;Modificar</b></i></button>
                    <button type="button" data-dismiss="modal" onclick="LimpiarRegistro()" class="btn btn-danger float-right m-1"><i class="fas fa-times ml-1"><b>&nbsp;Cerrar</b></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    

 <script>
$(document).ready(function(){
    lista_gastos();

    $('.js-example-basic-single').select2();
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
lista_total();
lista_total_fechas();
});
 </script>
<script>
