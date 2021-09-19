<script type="text/javascript" src="../js/hc.js?rev=<?php echo time();?>"></script>
<div class="modal fade animate__animated animate__slideInDown" id="modal_vista"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="nav-icon fas fa-file-medical"></i>&nbsp;<b>HISTORIA CLÍNICA</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-12" id="contenedor-orden">
                        <div class="card border-secondary mx-auto mb-3" style="max-width: 45rem;">
                        <div class="card-header text-center" style="background-color: #F2F3F4">
                        <h3 class="font-weight-bold" id="fechamodificado">
                        </h3>
                        <h3 class="font-weight-bold" id="fecha">
                        </h3>
                        <h3 class="font-weight-bold" id="paciente">
                        </h3>
                        <h3 class="font-weight-bold" id="historia"></h3>
                        
                        </div>
                        <div class="card-body text-secondary">
                        <div class="row">
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span id="dni" ?class="font-weight-bold"></span>
                             </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="fechanacimiento"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="lugarnacimiento"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="sexo"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="edad"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="celular"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="direccion"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="ocupacion"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="estado_civil"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="raza"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="gradoinstruccion"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="religion"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-12">
                            <p class="card-text">
                                <span class="font-weight-bold" id="lugarprocedencia"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-12">
                            <p class="card-text">
                                <span class="font-weight-bold" id="nombre_ape_acompañante"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="enfermedad_actual"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="sintomasprincipales"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="funcionesbio"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="antecedentes"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="antecedentesfamilia"></span>
                            </p>
                            </div>
                            
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="tipo_de_enfermedad"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="relato_cronologico"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="antecedentes_personales"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="presion_arterial"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="frecuencia_cardiaca"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="frecuencia_respiratoria"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="pulso"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="temperatura"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-12">
                            <p class="card-text">
                                <span class="font-weight-bold" id="descripcion_examen"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="hilo_dental"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="dolor_pieza_dental"></span>
                            </p>
                            </div>
                            <div class="col-12 col-md-6">
                            <p class="card-text">
                                <span class="font-weight-bold" id="mal_olor_sabor"></span>
                            </p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
        </div>
    </div>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h3 class="animate__animated animate__zoomIn"><i class="nav-icon fas fa-file-medical"></i>&nbsp;<b>GESTIÓN DE HISTORIAS CLÍNICAS</b><button id="button-crear" type="button" onclick="cargar_contenido('contenido_principal','historial/registro_historia_clinica.php')" class="btn bg-gradient-primary ml-3"><i class="fas fa-plus mr-1"></i>Nuevo registro</button></h3>

          </div>
        </div>
      </div><!-- /.container-fluid -->     
    </section>
    <div class="container-fluid mt-0">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Buscar historia clínica</b></h3>
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
                    <button onclick="listar_hc_por_Fechas()" class="btn btn-danger mr-2" style="width:100%" onclick><i class="fas fa-search mr-1"></i>Buscar</button>
                </div>
                </div>
                <div class="table-responsive" style="text-align:center">
                <table id="tabla_hc" class="display responsive nowrap mt-0 animate__animated animate__zoomIn" style="width:100%">
                    <thead style="background-color:#1D8348;color:#FFFFFF;">
                        <tr>
                            <th>Orden</th>
                            <th>Nro Historia</th>
                            <th>DNI</th>
                            <th>Paciente</th>
                            <th>Celular</th>
                            <th>Fecha Registro</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tfoot style="background-color:#1D8348;color:#FFFFFF;">
                            <tr>
                            <th>Orden</th>
                            <th>Nro Historia</th>
                            <th>DNI</th>
                            <th>Paciente</th>
                            <th>Celular</th>
                            <th>Fecha Registro</th>
                            <th>Acción</th>
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
 <div class="modal fade animate__animated animate__slideInDown" id="modal_editar"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl "role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title w-100 text-center" id="titleModal"><i class="nav-icon fas fa-file-medical"></i>&nbsp;<b>MODIFICAR DATOS DE HISTORIA CLÍNICA</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-xl">
                        <div class="row col-12 col-md-12">
                        <div class="col-12 col-md-12" id="contenedor-orden" >
                        <div class="card border-secondary mx-auto mb-13" style="max-width: 100rem;">
                        <div class="card-header text-center" style="background-color: #F2F3F4">
                        <h3 class="font-weight-bold" id="fechamodificado_editar">
                        </h3>
                        <h3 class="font-weight-bold" id="fecha_editar">
                        </h3>
                        <h3 class="font-weight-bold" id="paciente_editar">
                        </h3>
                        <h3 class="font-weight-bold" id="historia_editar"></h3>
                        
                        </div>
                        <div class="card-body">
                        <div class="row">
                
                           
                    <div class="accordion form-group col-md-12" id="accordion">
                    <div class="card">
                            <div class="card-header" id="headiuno">
                                <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseuno" aria-expanded="true" aria-controls="collapseuno">
                                    Agregar Datos Adicionales del Paciente
                                </button>
                            </div>
                        <div class="collapse show" id="collapseuno" aria-labelledby="headiuno" data-parent="#accordion" style=""><!-- show -->
                            <div class="card-body">
                                <div class="form-row">

                                <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_ocupacion_editar">Ocupación:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_ocupacion_editar"name="txt_ocupacion_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_estadocivil_editar">Estado Civil:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-tag"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_estadocivil_editar" name="txt_estadocivil_editar">
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
                                <label for="txt_raza_editar">Raza:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-smile"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_raza_editar"name="txt_raza_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_gradoinstruccion_editar">Grado de Instrucción:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_gradoinstruccion_editar" name="txt_gradoinstruccion_editar">
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
                                <label for="txt_religion_editar">Religión:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-cross"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_religion_editar" name="txt_religion_editar">
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
                                <label for="txt_procedencia_editar">Lugar de procedencia:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-map-marked-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_procedencia_editar"name="txt_procedencia_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="txt_acompañante_editar">Nombres y Apellidos del acompañante:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user-friends"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno" id="txt_acompañante_editar"name="txt_acompañante_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_enfer_actual_editar">Enfermedad Actual:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_enfer_actual_editar"name="txt_enfer_actual_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_signosysintomas_editar">Signos y Sintomas Principales:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_signosysintomas_editar"name="txt_signosysintomas_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_funbiologi_Editar">Funciones Biológicas:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_funbiologi_Editar"name="txt_funbiologi_Editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_antecedentes_editar">Antecedentes:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_antecedentes_editar"name="txt_antecedentes_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_antecedefamilia_editar">Antecedentes Familiares:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_antecedefamilia_editar"name="txt_antecedefamilia_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_tipoenfermedad_editar">Tipo de enfermedad:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_tipoenfermedad_editar"name="txt_tipoenfermedad_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_relatocronologico_editar">Relato Cronológico:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno"  id="txt_relatocronologico_editar"name="txt_relatocronologico_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="txt_antecedentespersonales_editar">Antecedentes Personales:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-heartbeat"></i></div>
                                </div>
                                <input type="text" class="form-control" value="Ninguno" id="txt_antecedentespersonales_editar"name="txt_antecedentespersonales_editar">
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
                        Exploración Fisica
                      </button>
                    </div>
                    <div class="collapse" id="collapsedos" aria-labelledby="headidos" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-row">
                            <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="txt_presion_arterial_editar">PA:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-heartbeat"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_presion_arterial_editar"name="txt_presion_arterial_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="txt_frecuencia_cardiaca_Editar">FC:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-heartbeat"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_frecuencia_cardiaca_Editar"name="txt_frecuencia_cardiaca_Editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                         
                            <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="txt_frecuencia_respiratoria_editar">FR:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-stethoscope"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_frecuencia_respiratoria_editar"name="txt_frecuencia_respiratoria_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="txt_frecuencia_pulso_editar">Pulso:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-weight"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_frecuencia_pulso_editar"name="txt_frecuencia_pulso_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="txt_temperatura_editar">T°:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-thermometer"></i></div>
                                </div>
                                <input type="text" class="form-control" id="txt_temperatura_editar"name="txt_temperatura_editar">
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="txt_descripcionexam_editar">Descripción del Exámen:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <textarea type="text" class="form-control" style="resize:none" id="txt_descripcionexam_editar" rows="3"name="txt_descripcionexam_editar"></textarea>
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
                        Historia Bucal
                      </button>
                    </div>
                    <div class="collapse" id="collapsetres" aria-labelledby="headitres" data-parent="#accordion">
                      <div class="card-body">
                        <div class="form-row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_hilodental_editar">Usa hilo dental:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_hilodental_editar" name="txt_hilodental_editar">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>  
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_piezadental_editar">Dolor en alguna pieza dental:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_piezadental_editar" name="txt_piezadental_editar">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>  
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="txt_olorsabor_editar">Mal olor o sabor:</label>
                                <input type="text" id="txtidhistoria" hidden>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                                </div>
                                <select type="text" class="form-control" id="txt_olorsabor_editar" name="txt_olorsabor_editar">
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
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Edita_HC();"><i class="fas fa-check"><b>&nbsp;Modificar</b></i></button>
                    <button type="button" data-dismiss="modal" onclick="LimpiarRegistro()" class="btn btn-danger float-right m-1"><i class="fas fa-times ml-1"><b>&nbsp;Cerrar</b></i></button                </div>
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
        </div>
    </div>
    </div>
    </div>
    </div>
        </div>
    </div>



 <script>
$(document).ready(function(){
    listar_hc();
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
});
 </script>
