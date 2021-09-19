var tablehc;
function listar_hc(){
      tablehc = $("#tabla_hc").DataTable({
      "ordering":false,   
      "bLengthChange":false,
      "searching": {"regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 5,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/hc/controlador_historiaclinica_listar.php",
          type:'POST'
      },
      responsive: "true",
    dom: 'Bfrtip',       
    buttons:[ 
  {
    extend:    'excelHtml5',
    text:      '<i class="fas fa-file-excel"></i> ',
    titleAttr: 'Exportar a Excel',
    
    filename: function() {
      return  "HISTORIAS CLÍNICAS"
    },
      title: function() {
        return  "HISTORIAS CLÍNICAS" }

  },
  {
    extend:    'pdfHtml5',
    text:      '<i class="fas fa-file-pdf"></i> ',
    titleAttr: 'Exportar a PDF',
    filename: function() {
      return  "HISTORIAS CLÍNICAS"
    },
  title: function() {
    return  "HISTORIAS CLÍNICAS"
  }
},
  {
    extend:    'print',
    text:      '<i class="fa fa-print"></i> ',
    titleAttr: 'Imprimir',
    
  title: function() {
    return  "HISTORIAS CLÍNICAS"

  }
  }],
      "columns":[
          {"data":"Posicion"},
          {"data":"nro_historia"},
          {"data":"dni_paci"},
          {"data":"paciente"},
          {"data":"celular_paci"},
          {"data":"fecha"},  
          {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar historia'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Ver historia' id='mostrar' class='mostrar btn btn-primary btn-sm'><i class='fas fa-eye'></i></button>"}
        ],

      "language":idioma_espanol,
      select: true
       
  });
  document.getElementById("tabla_hc_filter").style.display="none";
  $('input.global_filter').on( 'keyup click', function () {
       filterGlobal();
   } );
   $('input.column_filter').on( 'keyup click',function(){
       filterColumn( $(this).parents('tr').attr('data-column') );
   });

}
function filterGlobal(){
  $('#tabla_hc').DataTable().search(
      $('#global_filter').val(),
  ).draw();
}
function listar_combo_pacientes(){
  $.ajax({
      "url":"../controlador/hc/controlador_combo_pacientes_listar.php",
        type:'POST'
  }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena="";
      if(data.length>0){
          for(var i=0; i < data.length; i++){
              cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
          }
          $('#txt_paciente').html(cadena);
          var id =$("#txt_paciente").val();

          Traerdnipaciente(id);
          
      }
      else{
          cadena+="<option value=''>No se encontraron regitros</option>";
          $('#txt_paciente').html(cadena);
          $('#cbm_especialidad_editar').html(cadena);
      }
  })
}
function Traerdnipaciente(idpaciente){
  $.ajax({
    "url":"../controlador/hc/controlador_combo_traer_dni.php",
        type:'POST',
        data:{
          id:idpaciente
        }
      }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena="";
      if(data.length>0){
        $("#txt_dni").val(data[0][1]);
      }
      else{
          return Swal.fire("Mensaje de Error","No se pudo traer el tratamiento","error");
      }
  })
}
function Registro_HistoriaClinica(){
  var paciente=$('#txt_paciente').val();
  var ocupacion=$('#txt_ocupacion').val();
  var estado_civil=$('#txt_estadocivil').val();
  var raza=$('#txt_raza').val();
  var grado_instruccion=$('#txt_gradoinstruccion').val();
  var religion=$('#txt_religion').val();
  var lugar_procedencia=$('#txt_procedencia').val();
  var nombre_acompañante=$('#txt_acompañante').val();
  var enfermedad_actual=$('#txt_enfer_actual').val();
  var sintomas_principales=$('#txt_signosysintomas').val();
  var funciones_biologicas=$('#txt_funbiologi').val();
  var antecedentes=$('#txt_antecedentes').val();
  var antecedentes_familia=$('#txt_antecedefamilia').val();
  var tipo_enfermedad=$('#txt_tipoenfermedad').val();
  var relato_cronologico=$('#txt_relatocronologico').val();
  var antecedentes_personales=$('#txt_antecedentespersonales').val();
  var presion_arterial=$('#txt_presion_arterial').val();
  var frecuencia_cardiaca=$('#txt_frecuencia_cardiaca').val();
  var frecuencia_respiratoria=$('#txt_frecuencia_respiratoria').val();
  var pulso=$('#txt_frecuencia_pulso').val();
  var temperatura=$('#txt_temperatura').val();
  var descripcion_examen=$('#txt_descripcionexam').val();
  var hilodental=$('#txt_hilodental').val();
  var piezadental=$('#txt_piezadental').val();
  var olorsabor=$('#txt_olorsabor').val();
  if(paciente.length==0 || ocupacion.length==0|| raza.length==0||lugar_procedencia.length==0){
      return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
  }
  $.ajax({
      "url":"../controlador/hc/controlador_hc_registrar.php",
      type:'POST',
      data:{
        paciente:paciente,
        ocupacion:ocupacion,
        estado_civil:estado_civil,
        raza:raza,
        grado_instruccion:grado_instruccion,
        religion:religion,
        lugar_procedencia:lugar_procedencia,
        nombre_acompañante:nombre_acompañante,
        enfermedad_actual:enfermedad_actual,
        sintomas_principales:sintomas_principales,
        funciones_biologicas:funciones_biologicas,
        antecedentes:antecedentes,
        antecedentes_familia:antecedentes_familia,
        tipo_enfermedad:tipo_enfermedad,
        relato_cronologico:relato_cronologico,
        antecedentes_personales:antecedentes_personales,
        presion_arterial:presion_arterial,
        frecuencia_cardiaca:frecuencia_cardiaca,
        frecuencia_respiratoria:frecuencia_respiratoria,
        pulso:pulso,
        temperatura:temperatura,
        descripcion_examen:descripcion_examen,
        hilodental:hilodental,
        piezadental,piezadental,
        olorsabor:olorsabor
      }
  }).done(function(resp){
      if(resp>0){
        $("#contenido_principal").load("historial/vista_HC.php");

              return Swal.fire("Mensaje De Confirmación","Datos correctamente, Nuevo historia registrada correctamente","success").then((value)=>{
                LimpiarRegistro();

              })    
      }
      else{
          return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar el registro","error");
      }
      
  })  
}

function LimpiarRegistro(){
  $('#txt_ocupacion').val("");
  $('#txt_estadocivil').val("");
  $('#txt_raza').val("");
  $('#txt_gradoinstruccion').val("");
  $('#txt_religion').val("");
  $('#txt_procedencia').val("");
  $('#txt_acompañante').val("Ninguno");
  $('#txt_enfer_actual').val("Ninguno");
  $('#txt_signosysintomas').val("Ninguno");
  $('#txt_funbiologi').val("Ninguno");
  $('#txt_antecedentes').val("Ninguno");
  $('#txt_antecedefamilia').val("Ninguno");
  $('#txt_tipoenfermedad').val("Ninguno");
  $('#txt_relatocronologico').val("Ninguno");
  $('#txt_antecedentespersonales').val("Ninguno");
  $('#txt_presion_arterial').val("");
  $('#txt_frecuencia_cardiaca').val("");
  $('#txt_frecuencia_respiratoria').val("");
  $('#txt_frecuencia_pulso').val("");
  $('#txt_temperatura').val("");
  $('#txt_descripcionexam').val("");
}
$('#tabla_hc').on('click','.editar',function(){
  var data = tablehc.row($(this).parents('tr')).data();
  if(tablehc.row(this).child.isShown()){
      var data = tablehc.row(this).data();
  }
  $("#modal_editar").modal({backdrop:'static',keyboard:false});
  $("#modal_editar").modal('show');

  if(data.fechamodificado=="00-00-0000"){
    document.getElementById("fechamodificado_editar").style.visibility = "hidden";

  }
  else
  {
    $("#fechamodificado_editar").html("<h5><b>Ultima Actualización: "+data.fechamodificado+"</b></h5>");

  }  $("#fecha_editar").html("<h5><b>Fecha de Registro: "+data.fecha+"</b></h5>");
  $("#historia_editar").html("<h4><b>Nro de Historia: "+data.nro_historia+"</b></h4>");
  $("#paciente_editar").html("<h2><b>"+data.paciente+"</b></h2>");
//////////////////////DATOS DEL FORMULARIO/////////////////////////
  $("#txtidhistoria").val(data.historia_id);
  $("#txt_ocupacion_editar").val(data.ocupacion);
  $("#txt_estadocivil_editar").val(data.estado_civil).trigger("change");
  $("#txt_raza_editar").val(data.Raza);
  $("#txt_gradoinstruccion_editar").val(data.grado_instruccion).trigger("change");
  $("#txt_religion_editar").val(data.religion).trigger("change");
  $("#txt_procedencia_editar").val(data.lugar_procedencia);
  $("#txt_acompañante_editar").val(data.nombre_ape_acompañante);
  $("#txt_enfer_actual_editar").val(data.enfermedad_actual);
  $("#txt_signosysintomas_editar").val(data.sig_sintomas_principales);
  $("#txt_funbiologi_Editar").val(data.funciones_biologicas);
  $("#txt_antecedentes_editar").val(data.antecedentes);
  $("#txt_antecedefamilia_editar").val(data.antecedentes_familiares);
  $("#txt_tipoenfermedad_editar").val(data.tipo_de_enfermedad);
  $("#txt_relatocronologico_editar").val(data.relato_cronologico);
  $("#txt_antecedentespersonales_editar").val(data.antecedentes_personales);
  $("#txt_presion_arterial_editar").val(data.presion_arterial);
  $("#txt_frecuencia_cardiaca_Editar").val(data.frecuencia_cardiaca);
  $("#txt_frecuencia_respiratoria_editar").val(data.frecuencia_respiratoria);
  $("#txt_frecuencia_pulso_editar").val(data.pulso);
  $("#txt_temperatura_editar").val(data.temperatura);
  $("#txt_descripcionexam_editar").val(data.descripcion_examen);
  $("#txt_hilodental_editar").val(data.hilo_dental).trigger("change");
  $("#txt_piezadental_editar").val(data.dolor_pieza_dental).trigger("change");
  $("#txt_olorsabor_editar").val(data.mal_olor_sabor).trigger("change");

  
})
function Edita_HC(){
  var idhistoria=$('#txtidhistoria').val();
  var ocupacion=$('#txt_ocupacion_editar').val();
  var estado_civil=$('#txt_estadocivil_editar').val();
  var raza=$('#txt_raza_editar').val();
  var grado_instruccion=$('#txt_gradoinstruccion_editar').val();
  var religion=$('#txt_religion_editar').val();
  var lugar_procedencia=$('#txt_procedencia_editar').val();
  var nombre_acompañante=$('#txt_acompañante_editar').val();
  var enfermedad_actual=$('#txt_enfer_actual_editar').val();
  var sintomas_principales=$('#txt_signosysintomas_editar').val();
  var funciones_biologicas=$('#txt_funbiologi_Editar').val();
  var antecedentes=$('#txt_antecedentes_editar').val();
  var antecedentes_familia=$('#txt_antecedefamilia_editar').val();
  var tipo_enfermedad=$('#txt_tipoenfermedad_editar').val();
  var relato_cronologico=$('#txt_relatocronologico_editar').val();
  var antecedentes_personales=$('#txt_antecedentespersonales_editar').val();
  var presion_arterial=$('#txt_presion_arterial_editar').val();
  var frecuencia_cardiaca=$('#txt_frecuencia_cardiaca_Editar').val();
  var frecuencia_respiratoria=$('#txt_frecuencia_respiratoria_editar').val();
  var pulso=$('#txt_frecuencia_pulso_editar').val();
  var temperatura=$('#txt_temperatura_editar').val();
  var descripcion_examen=$('#txt_descripcionexam_editar').val();
  var hilodental=$('#txt_hilodental_editar').val();
  var piezadental=$('#txt_piezadental_editar').val();
  var olorsabor=$('#txt_olorsabor_editar').val();
  if(paciente.length==0 || ocupacion.length==0|| raza.length==0||lugar_procedencia.length==0){
      return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
  }
  $.ajax({
      "url":"../controlador/hc/controlador_hc_editar.php",
      type:'POST',
      data:{
        idhistoria:idhistoria,
        ocupacion:ocupacion,
        estado_civil:estado_civil,
        raza:raza,
        grado_instruccion:grado_instruccion,
        religion:religion,
        lugar_procedencia:lugar_procedencia,
        nombre_acompañante:nombre_acompañante,
        enfermedad_actual:enfermedad_actual,
        sintomas_principales:sintomas_principales,
        funciones_biologicas:funciones_biologicas,
        antecedentes:antecedentes,
        antecedentes_familia:antecedentes_familia,
        tipo_enfermedad:tipo_enfermedad,
        relato_cronologico:relato_cronologico,
        antecedentes_personales:antecedentes_personales,
        presion_arterial:presion_arterial,
        frecuencia_cardiaca:frecuencia_cardiaca,
        frecuencia_respiratoria:frecuencia_respiratoria,
        pulso:pulso,
        temperatura:temperatura,
        descripcion_examen:descripcion_examen,
        hilodental:hilodental,
        piezadental,piezadental,
        olorsabor:olorsabor
      }
  }).done(function(resp){
    if(resp>0){
            $("#modal_editar").modal('hide');
            listar_hc
            return Swal.fire("Mensaje De Confirmación","Datos correctamente modificados, historia actualizada","success").then((value)=>{
              tablehc.ajax.reload();
            })       
    }
    else{
        return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar la actualización","error");
    }
    
  })  
}




function listar_hc_por_Fechas(){
  var finicio=$("#txtfechainicio").val();
  var ffin=$("#txtfechafin").val();
  tablehc = $("#tabla_hc").DataTable({
  "ordering":false,   
  "bLengthChange":false,
  "searching": { "regex": false },
  "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
  "pageLength": 10,
  "destroy":true,
  "async": false ,
  "processing": true,
  "ajax":{
      "url":"../controlador/hc/controlador_hc_por_fechas.php",
      type:'POST',
      data:{
          fechainicio:finicio,
          fechafin:ffin
      }
  },
  "columns":[
    {"data":"Posicion"},
    {"data":"nro_historia"},
    {"data":"dni_paci"},
    {"data":"paciente"},
    {"data":"celular_paci"},
    {"data":"fecha"},  
    {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-warning' title='Editar historia'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Ver historia' id='mostrar' class='mostrar btn btn-primary'><i class='fas fa-eye'></i></button>"}
  ],

  "language":idioma_espanol,
  select: true
});
document.getElementById("tabla_hc_filter").style.display="none";

}
$('#tabla_hc').on('click','.mostrar',function(){
  var data = tablehc.row($(this).parents('tr')).data();
  if(tablehc.row(this).child.isShown()){
      var data = tablehc.row(this).data();
  }
  $("#modal_vista").modal({backdrop:'static',keyboard:false});
  $("#modal_vista").modal('show');

  if(data.fechamodificado=="00-00-0000"){
    document.getElementById("#fechamodificado").style.visibility = "hidden";

  }
  else
  {
    $("#fechamodificado").html("<h5><b>Ultima Actualización: "+data.fechamodificado+"</b></h5>");

  }
  $("#fecha").html("<h5><b>Fecha de Registro: "+data.fecha+"</b></h5>");
  $("#historia").html("<h4><b>Nro de Historia: "+data.nro_historia+"</b></h4>");
  $("#dni").html("<b><h6>DNI: </b>"+data.dni_paci+"</h6>");
  $("#paciente").html("<h2><b>"+data.paciente+"</b></h2>");
  $("#fechanacimiento").html("<b><h6>Fecha Nacimiento: </b>"+data.fechanacimiento+"</h6>");
  $("#lugarnacimiento").html("<b><h6>Lugar de Nacimiento: </b>"+data.lugar_nacimiento+"</h6>");
  $("#edad").html("<b><h6>Edad: </b>"+data.edades+"</h6>");
  $("#celular").html("<b><h6>Celular: </b>"+data.celular_paci+"</h6>");
  $("#direccion").html("<b><h6>Dirección: </b>"+data.direccion_paci+"</h6>");
  $("#sexo").html("<b><h6>Sexo: </b>"+data.sexo_paci+"</h6>");

  ////////////////// DATOS DE LA HISTORIA ///////////////////////////
  $("#ocupacion").html("<b><h6>Ocupación: </b>"+data.ocupacion+"</h6>");
  $("#estado_civil").html("<b><h6>Estado civil: </b>"+data.estado_civil,+"</h6>");
  $("#raza").html("<b><h6>Raza: </b>"+data.Raza+"</h6>");
  $("#gradoinstruccion").html("<b><h6>Grado de instrucción: </b>"+data.grado_instruccion+"</h6>");
  $("#religion").html("<b><h6>Religión: </b>"+data.religion+"</h6>");
  $("#lugarprocedencia").html("<b><h6>Lugar de procedencia: </b>"+data.lugar_procedencia+"</h6>");
  $("#nombre_ape_acompañante").html("<b><h6>Nombres y Apellidos del acompañante: </b>"+data.nombre_ape_acompañante+"</h6>");
  $("#enfermedad_actual").html("<b><h6>Enfermedad actual: </b>"+data.enfermedad_actual+"</h6>");
  $("#sintomasprincipales").html("<b><h6>Sintomas principales: </b>"+data.sig_sintomas_principales,+"</h6>");
  $("#funcionesbio").html("<b><h6>Funcuiones biológicas: </b>"+data.funciones_biologicas+"</h6>");
  $("#antecedentes").html("<b><h6>Antecedentes: </b>"+data.antecedentes+"</h6>");
  $("#antecedentesfamilia").html("<b><h6>Antecedentes familiares: </b>"+data.antecedentes_familiares,+"</h6>");
  $("#tipo_de_enfermedad").html("<b><h6>Tipo de enfermedad: </b>"+data.tipo_de_enfermedad+"</h6>");
  $("#relato_cronologico").html("<b><h6>Relato cronológico: </b>"+data.relato_cronologico+"</h6>");
  $("#antecedentes_personales").html("<b><h6>Antecedentes personales: </b>"+data.antecedentes_personales+"</h6>");
  $("#presion_arterial").html("<b><h6>Presión arterial: </b>"+data.presion_arterial+"</h6>");
  $("#frecuencia_cardiaca").html("<b><h6>Frecuencia cardiacao: </b>"+data.frecuencia_cardiaca+"</h6>");
  $("#frecuencia_respiratoria").html("<b><h6>Frecuencia respiratoria: </b>"+data.frecuencia_respiratoria+"</h6>");
  $("#pulso").html("<b><h6>Pulso: </b>"+data.pulso+"</h6>");
  $("#temperatura").html("<b><h6>Temperatura: </b>"+data.temperatura+"</h6>");
  $("#descripcion_examen").html("<b><h6>Descripción de exámen: </b>"+data.descripcion_examen+"</h6>");
  $("#hilo_dental").html("<b><h6>Usa hilo dental: </b>"+data.hilo_dental+"</h6>");
  $("#dolor_pieza_dental").html("<b><h6>Dolor en Alguna Pieza Dental: </b>"+data.dolor_pieza_dental+"</h6>");
  $("#mal_olor_sabor").html("<b><h6>Mal olor o sabor: </b>"+data.mal_olor_sabor+"</h6>");

})