
<script src="../js/ourjs/generalFunction.js"></script>
<script src="../js/ourjs/simbolos.js"></script>
<script src="../../js/sweetalert2/sweetalert2.all.js"></script>
<script src="../../js/jquery-3.3.1.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>

<script type="text/javascript" src="../js/hc.js?rev=<?php echo time();?>"></script>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 animate__animated animate__zoomIn">
            <h1><i class="nav-icon fas fa-file-medical"></i>&nbsp;<b>REGISTRO DE HISTORIA CLÍNICA</b></h1>

          </div>
        </div>
      </div><!-- /.container-fluid -->     
</section>
    <div id="registro" class="container-fluid mt-0 animate__animated animate__zoomIn">
            <div class="card card-success">
                <div class="card-header">
                    <h1 class="card-title"><i class="nav-icon fas fa-file-medical"></i>&nbsp;<b>HISTORIA CLÍNICA</b></h1>
                <div class="input-group">             
            </div>
        </div>
            <div class="card-body">
                <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group">
                    <label for="txt_dni">DNI:</label>
                        <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                        </div>
                        <input type="text" class="form-control" id="txt_dni" name="txt_dni"  disabled>
                        <div class="valid-input invalid-feedback"></div>
                        </div>
                </div>
                </div>         

                            <div class="col-12 col-md-8">
                            <div class="form-group">
                                <label for="txt_paciente">Paciente:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user icon-form"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_paciente" name="txt_paciente">
                                </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                           
        <div class="accordion form-group col-md-12" id="accordion">
                    <div class="card">
                            <div class="card-header" id="headiuno">
                                <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseuno" aria-expanded="true" aria-controls="collapseuno">
                                <i class="fas fa-user"></i>&nbsp;Agregar Datos Adicionales del Paciente
                                </button>
                            </div>
                        <div class="collapse show" id="collapseuno" aria-labelledby="headiuno" data-parent="#accordion" style=""><!-- show -->
                            <div class="card-body">
                                <div class="form-row">

                                <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_ocupacion">Ocupación:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_ocupacion"name="txt_ocupacion" onkeypress="return soloLetras(event)">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_estadocivil">Estado Civil:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-tag"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_estadocivil" name="txt_estadocivil">
                                    <option value="Soltero">Soltero</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Divorciado">Divorciado</option>
                                    <option value="Viudo">Viudo</option>
                                    <option value="Concubinato">Concubinato</option>
                                </select>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_raza">Raza:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-smile"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_raza"name="txt_raza" onkeypress="return soloLetras(event)">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_gradoinstruccion">Grado de Instrucción:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_gradoinstruccion" name="txt_gradoinstruccion">
                                    <option value="Superior">Superior</option>
                                    <option value="Secundaria">Secundaria</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Pre escolar">Pre escolar</option>
                                    <option value="Sin estudios">Sin estudios</option>                                    
                                </select>                                
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_religion">Religión:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-cross"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_religion" name="txt_religion">
                                    <option value="Católico">Católico</option>
                                    <option value="Cristiano">Cristiano</option>
                                    <option value="Protestante">Protestante</option>
                                    <option value="Ateo">Ateo</option>
                                    <option value="Agnóstico">Agnóstico</option>
                                    <option value="Adventista">Adventista</option>
                                    <option value="Testigo de Jehová">Testigo de Jehová</option>
                                    <option value="Mormón">Mormón</option>
                                </select>  
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_procedencia">Lugar de procedencia:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-map-marked-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_procedencia"name="txt_procedencia" onkeypress="return soloLetras(event)">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="txt_acompañante">Nombres y Apellidos del acompañante:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-friends"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno" id="txt_acompañante"name="txt_acompañante" onkeypress="return soloLetras(event)">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_enfer_actual">Enfermedad Actual:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_enfer_actual"name="txt_enfer_actual">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_signosysintomas">Signos y Sintomas Principales:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_signosysintomas"name="txt_signosysintomas">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_funbiologi">Funciones Biológicas:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_funbiologi"name="txt_funbiologi">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_antecedentes">Antecedentes:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_antecedentes"name="txt_antecedentes">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_antecedefamilia">Antecedentes Familiares:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_antecedefamilia"name="txt_antecedefamilia">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_tipoenfermedad">Tipo de enfermedad:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_tipoenfermedad"name="txt_tipoenfermedad">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_relatocronologico">Relato Cronológico:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_relatocronologico"name="txt_relatocronologico">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_antecedentespersonales">Antecedentes Personales:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-heartbeat"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno" id="txt_antecedentespersonales"name="txt_antecedentespersonales">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                  <div class="card">
                    <div class="card-header" id="headidos">
                      <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapsedos" aria-expanded="false" aria-controls="collapsedos">
                      <i class="fas fa-file-medical-alt"></i>&nbsp;Exploración Fisica
                      </button>
                    </div>
                    <div class="collapse" id="collapsedos" aria-labelledby="headidos" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-row">
                            <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="txt_presion_arterial">PA:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-heartbeat"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_presion_arterial"name="txt_presion_arterial">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="txt_frecuencia_cardiaca">FC:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-heartbeat"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_frecuencia_cardiaca"name="txt_frecuencia_cardiaca">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                         
                            <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="txt_frecuencia_respiratoria">FR:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-stethoscope"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_frecuencia_respiratoria"name="txt_frecuencia_respiratoria">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="txt_frecuencia_pulso">Pulso:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-weight"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_frecuencia_pulso"name="txt_frecuencia_pulso">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="txt_temperatura">T°:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-thermometer"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_temperatura"name="txt_temperatura">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="txt_descripcionexam">Descripción del Exámen:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="text" class="form-control" style="resize:none" id="txt_descripcionexam" rows="3"name="txt_descripcionexam"></textarea>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="card">
                    <div class="card-header" id="headitres">
                      <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapsetres" aria-expanded="false" aria-controls="collapsetres">
                      <i class="fas fa-teeth-open"></i>&nbsp;Historia Bucal
                      </button>
                    </div>
                    <div class="collapse" id="collapsetres" aria-labelledby="headitres" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_hilodental">Usa hilo dental:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_hilodental" name="txt_hilodental">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>  
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_piezadental">Dolor en alguna pieza dental:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_piezadental" name="txt_piezadental">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>  
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_olorsabor">Mal olor o sabor:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_olorsabor" name="txt_olorsabor">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>  
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    </div>

                    <div class="col-12 col-md-12" style="text-align:center">
                    <button class="btn btn-success brn-lg" onclick="Registro_HistoriaClinica()"><i class="fas fa-check mr-1"></i>&nbsp;REGISTRAR</button>    
                </div>
                </div>

                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
                    
                </div>
                <div class="card-footer">
                
                </div>
            </div>
        </div>

    
            <!-- /.card -->
 </div>


<script>
$(document).ready(function(){
    $('.js-example-basic-single').select2();
    listar_combo_pacientes();
    CargarOdontogramaDeDiagnostico();
});
$("#txt_paciente").change(function(){
    var id=$("#txt_paciente").val();
    Traerdnipaciente(id);
});

 </script>
