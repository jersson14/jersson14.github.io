<script type="text/javascript" src="../js/historial.js?rev=<?php echo time();?>"></script>
<script src="../js/ourjs1/generalFunction.js"></script>
<script src="../js/sweetalert2/sweetalert2.all.js"></script>
<script src="../../js/jquery-3.3.1.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>

<section >
      <div class="container-fluid ">
        <div class="row mb-2">
          <div class="col-sm-12 animate__animated animate__zoomIn">
            <h3><i class="fas fa-file-medical"></i>&nbsp;<b>REGISTRO DE ATENCION AL PACIENTE</b></h3>

          </div>
        </div>
      </div><!-- /.container-fluid -->     
    </section>
    <div class="container-fluid mt-0 ">
            <div class="card card-success">
                <div class="card-header">
                    <h1 class="card-title"><i class="fas fa-file-medical"></i>&nbsp;<b>ATENCIÓN AL PACIENTE</b></h1>
                <div class="input-group">             
            </div>
        </div>
            <div class="card-body">
                <div class="row">
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <input type="text" id="text2" hidden>
                        
                    <label for="txt_codigohistoria">C&oacute;digo Historial:</label>
                        <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-code icon-form"></i></div>
                        </div>
                        <input type="text" class="form-control" id="txt_codigohistoria" name="txt_codigohistoria"  disabled>
                        <div class="valid-input invalid-feedback"></div>
                        </div>
                </div>
                </div>         

                            <div class="col-12 col-md-7">
                            <div class="form-group">
                            <input type="text" id="txtidhistoria" hidden >
                                <input type="text" id="txtid_consulta" hidden>
                                <label for="txt_paciente">Paciente:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user icon-form"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_paciente"name="txt_paciente" disabled>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-2" role="document">
                                <label for="">&nbsp;</label><br>
                                <button onclick="AbrirModalConsulta()" class="btn btn-success mr-2" style="width:100%" onclick><i class="fas fa-search mr-1"></i>Buscar consulta</button>

                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_descriconsulta">Descripci&oacute;n de la Consulta:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="text" class="form-control" style="resize:none" id="txt_descriconsulta" rows="3"name="diagnostico2" disabled></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_diagnostico1">Diagnostico presuntivo de la consulta:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="text" class="form-control" style="resize:none" id="txt_diagnostico1" rows="3"name="diagnostico2" disabled></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_diagnostico2">Diagnostico definitivo de la consulta:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="text" class="form-control" style="resize:none" id="txt_diagnostico2" rows="3"name="diagnostico2" disabled></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                                    <div class="accordion form-group col-md-12" id="accordion">

                              <div class="card">
                    <div class="card-header" id="headicuatro">
                      <button class="btn btn-dark" onclick="CargarOdontogramaDeDiagnostico();" type="button" data-toggle="collapse" data-target="#collapsecuatro" aria-expanded="false" aria-controls="collapsecuatro">
                      <i class="fas fa-tooth">&nbsp;</i>Odontograma Inicial
                      </button>
                    </div>
                    <div class="collapse"  id="collapsecuatro" aria-labelledby="headicuatro" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-row">
                        <div class="container">
                            <div class="row">
                                <div class="col espacio-1 "> &nbsp&nbsp  </div>     
                            </div>
                            <div class="container">
                            <div id="opciones" >  
                                <?php
                                    include_once("../opciones.php");
                                ?>
                            </div>
                            </div> 
                                <!-- nuestros estilos -->

                            <div class="container">
                            <div id="tablaSimbolos" >  
                
                            </div>
                            </div>

                            <div class="container">
                            <div id="odontograma" >  

                            
                            </div>
                            </div>  

                            <!-- --------------FIN SECCIÓN ------------- -->
                            <!-- --------------------------------------------------------------------------- -->


                            <!-- Footer -->
                            <!-- Aquí cae el footer -->
                            <!-- <?php  include_once("../footer.php"); ?> -->


                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                    <div class="card-header" id="headicinco">
                      <button class="btn btn-dark" type="button" onclick="CargarOdontogramaDeDiagnosticofinal();" data-toggle="collapse" data-target="#collapsecinco" aria-expanded="false" aria-controls="collapsecinco">
                      <i class="fas fa-tooth"></i>&nbsp;Odontograma Final
                      </button>
                    </div>
                    <div class="collapse" id="collapsecinco" aria-labelledby="headicinco" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-row">
                        <div class="container">
                            <div class="row">
                                <div class="col espacio-1 "> &nbsp&nbsp  </div>     
                            </div>
                            <div class="container">
                            <div id="opcionesfinal" >  
                                <?php
                                    include_once("../opcionesfinal.php");
                                ?>
                            </div>
                            </div> 
                                <!-- nuestros estilos -->

                            <div class="container">
                            <div id="tablaSimbolosfinal" >  
                
                            </div>
                            </div>

                            <div class="container">
                            <div id="odontogramafinal" >  

                            
                            </div>
                            </div>  

                            <!-- --------------FIN SECCIÓN ------------- -->
                            <!-- --------------------------------------------------------------------------- -->


                            <!-- Footer -->
                            <!-- Aquí cae el footer -->
                            <!-- <?php  include_once("../footerfinal.php"); ?> -->


                            </div>
                        </div>
                        
                      </div>
                    </div>
                    </div>
            <div class="col-12 col-sm-12">
            <div class="card card-success card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Presupuesto</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cbm_tratamientos">Tratamientos:</label>
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                            </div>
                            <select type="text" class="form-control js-example-basic-single" id="cbm_tratamientos" name="cbm_tratamientos" style="width:85%"></select>
                            <div class="valid-input invalid-feedback"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="txt_precio">Precio:</label>
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                            </div>
                            <input type="text" class="monto form-control" id="txt_precio" name="txt_precio" onkeyup="calc();" onkeypress="return soloNumeros(event)">
                            <div class="valid-input invalid-feedback"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="txt_cantidad">Cantidad:</label>
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                            </div>
                            <input type="text" onkeypress="return soloNumeros(event)" required class="monto form-control" id="txt_cantidad" name="txt_cantidad" onkeyup="calc();">
                            <div class="valid-input invalid-feedback"></div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-12 col-md-2">
                    <div class="form-group">
                            <label for="txt_total">Sub total:</label>
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                            </div>
                            <input type="text" class="form-control" id="txt_total" name="txt_total" onkeyup="calc();" disabled>
                            <div class="valid-input invalid-feedback"></div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-12 col-md-4">
                    <div class="form-group">
                            <label for="txt_fecha">Fecha:</label>
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                            </div>
                            <input type="date" class="form-control" id="txt_fecha" name="txt_fecha">
                            <div class="valid-input invalid-feedback"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-12 col-md-4">
                    <div class="form-group">
                            <label for="Hora">Hora:</label>
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                            <input type="time" class="form-control" id="Hora" name="Hora">
                            <div class="valid-input invalid-feedback"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="">&nbsp;</label>
                        <button class="btn btn-primary" style="width:100%" onclick="AgregarTratamiento()"><i class="fas fa-plus-square"></i>&nbsp;Agregar</button>
                    </div><br><br><hr>
                    <div class="col-12" style="text-align:center"><hr>
                        <h5><i class="fas fa-file-signature"></i>&nbsp;<b>Detalle Tratamiento</b></h5>
                    </div>
                    <div class="col-12 col-md-12 table-responsive animate__animated animate__slideInDown"style="text-align:center">
                        <table id="tabla_tratamiento" style="width:100%" class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th>Id</th>
                            <th>Tratamiento</th>
                            <th>Fecha Cita</th>
                            <th>Hora</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Sub Total</th>
                            <th>Acci&oacute;n</th>
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
                            <th>Acci&oacute;n</th>
                            </tr>
                        </tfoot>
                        <tbody id="tbody_tabla_tratamiento">
                        </tbody>
                        </table>
                       
                    </div>
                    <div class="col-9">
                        </div>
                        <div class="col-3">
                            <h3 for="" id="lbl_totalneto"></h3>
                    </div>
                      
                </div>
                  </div>                  
                </div>
                </div>
                <div class="card-footer">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                            <label for="observacion">Observaciones:</label>
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                            </div>
                            <textarea type="text" class="form-control" style="resize:none" id="observacion" rows="3"name="diagnostico2"></textarea>                            <div class="valid-input invalid-feedback"></div>
                        </div>
                    </div>
                    </div>
              </div>
              
              <!-- /.card -->
            </div>
          </div>
                    
                </div>
                
                </div>

                 <div class="col-12 col-md-12" style="text-align:center">
                    <button id="submit" class="btn btn-success brn-lg" onclick="Registrar_Fua()"><i class="fas fa-check mr-1"></i>&nbsp;REGISTRAR</button>  
            </div>
        </div>

   
            <!-- /.card -->
 </div>
 <div class="modal fade animate__animated animate__slideInDown" id="modal_consulta"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="fas fa-file-signature"></i>&nbsp;<b>LISTADO DE CONSULTAS MÉDICAS</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                    <div class="container-fluid mt-0">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Buscar consulta médica</b></h3>
                    <div class="input-group">
                        <input type="text" id="global_filter" class="global_filter form-control float-left" placeholder="Ingrese algún dato de la consulta">
                        <div class="input-group-append">
                            <button class="btn btn-default"
                                ><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="table-responsive" style="text-align:center">
                        <table id="tabla_consulta_historial" class="display responsive nowrap mt-0" style="width:100%">
                            <thead style="background-color:#1D8348;color:#FFFFFF;">
                                <tr>
                                    <th>Nro</th>
                                    <th>Fecha</th>
                                    <th>DNI</th>
                                    <th>Paciente</th>
                                    <th>Motivo de Consulta</th>
                                    <th>Acción</th>
                                </tr>
                            </thead style="background-color:#1D8348;color:#FFFFFF;">
                        </table>
                        </div>
                    </div>
                </div>
                    <div class="card-footer">
                   
                    </div>
                </div>
            </div>
        </div>
</div>


</form>
 <script>
   
$(document).ready(function(){


    $('.js-example-basic-single').select2();
    listar_tratamientos();
});
$("#cbm_tratamientos").change(function(){
    var id=$("#cbm_tratamientos").val();
    Traerpreciotratamiento(id);
});
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
    document.getElementById('txt_fecha').value = y + "-" + m + "-" + d;


data();
function calc() {
  var a = document.getElementById("txt_precio").value;
  var b = document.getElementById("txt_cantidad").value;
    
  var result = document.getElementById("txt_total");
  result.value = parseInt(a) * parseInt(b);

}
 </script>
