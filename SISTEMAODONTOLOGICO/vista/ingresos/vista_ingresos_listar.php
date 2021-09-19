<script type="text/javascript" src="../js/ingresos.js?rev=<?php echo time();?>"></script>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="animate__animated animate__zoomIn"><i class="fas fa-fast-forward"></i>&nbsp;<b>GESTIÓN DE INGRESOS</b></h1>

          </div>
        </div>
      </div><!-- /.container-fluid -->     
    </section>
    <div class="container-fluid mt-0">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Buscar ingresos</b></h3>
                    <div class="input-group">
                        <input type="text" id="global_filter" class="global_filter form-control float-left" placeholder="Ingrese datos de algun ingreso que se registro">
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
                    <button onclick="listar_ingresos_busqueda()" class="btn btn-danger mr-2" style="width:100%"><i class="fas fa-search mr-1"></i>Buscar</button>
                </div>
                </div>
                <div class="table-responsive" style="text-align:center">
            <table id="tabla_ingresos"class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%" style="text-align: center">
            <thead style="background-color:#1D8348;color:#FFFFFF;">
                <tr>
                    <th>Orden</th>
                    <th>Paciente</th>
                    <th>Fecha de Registro</th>
                    <th>Monto Pagado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tfoot style="background-color:#1D8348;color:#FFFFFF;">
            <tr>
                    <th>Orden</th>
                    <th>Paciente</th>
                    <th>Fecha de Registro</th>
                    <th>Monto Pagado</th>
                    <th>Acción</th>
            </tr>
        </tfoot>
            </table>
            </div><br>
            <div class="col-12" style="text-align:center">
                        <h5 style="text-decoration: underline" ><b>TOTAL DE INGRESOS POR FECHA</b></h5>
                    </div>
            <div class="table-responsive" style="text-align:center">
            <table id="tabla_total_fechas"class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%" style="text-align: center">
            <thead style="background-color:#D68910;color:#FFFFFF;">
                <tr> 
                    <th>Fecha Desde</th>
                    <th>Fecha Hasta</th>
                    <th>Total</th>
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
                        <h5 style="text-decoration: underline" ><b>TOTAL DE INGRESOS</b></h5>
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
        </div>    
  <!-- /.card -->
 </div>

 <script>
$(document).ready(function(){
    lista_ingresos();

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
    
    lista_ingresos_total();
});
 </script>
<script>
