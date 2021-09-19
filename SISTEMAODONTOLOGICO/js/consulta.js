var tableconsulta;
function listar_consulta_busqueda(){
      var finicio=$("#txtfechainicio").val();
      var ffin=$("#txtfechafin").val();
    tableconsulta = $("#tabla_conculta").DataTable({
      "ordering":false,   
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 10,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/consulta/controlador_consulta_listar.php",
          type:'POST',
          data:{
              fechainicio:finicio,
              fechafin:ffin
          }
      },
      responsive: "true",
      dom: 'Bfrtip',       
      buttons:[ 
    {
      extend:    'excelHtml5',
      text:      '<i class="fas fa-file-excel"></i> ',
      titleAttr: 'Exportar a Excel',
      
      filename: function() {
        return  "CONSULTAS"
      },
        title: function() {
          return  "CONSULTAS" }

    },
    {
      extend:    'pdfHtml5',
      text:      '<i class="fas fa-file-pdf"></i> ',
      titleAttr: 'Exportar a PDF',
      filename: function() {
        return  "CONSULTAS"
      },
    title: function() {
      return  "CONSULTAS"
    }
  },
    {
      extend:    'print',
      text:      '<i class="fa fa-print"></i> ',
      titleAttr: 'Imprimir',
      messageTop: "CONSULTAS", //Coloca el título dentro del PDF
      filename: function() {
        return "CONSULTAS"  
    },
    title: function() {
      return  "CONSULTAS"

    }
    }],
      "columns":[
          {"data":"Posicion"},
          {"data":"dni_paci"},
          {"data":"paciente"},
          {"data":"fecha"},
          {"data":"consulta_diagnostico_presuntivo"},
          {"data":"consulta_diagnostico_definitivo"},
          {"data":"consulta_estatus",
            render: function (data, type, row ) {
              if(data=='PENDIENTE'){
                  return "<span class='badge badge-primary'>"+data+"</span>";               
              }else if(data=='CANCELADA'){
                return "<span class='badge badge-danger'>"+data+"</span>";                 
              }else{
                return "<span class='badge badge-success'>"+data+"</span>";                 
              }
            }
          },  
          {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar cita'><i class='fa fa-edit'></i></button>"}
        ],

      "language":idioma_espanol,
      select: true
  });
  document.getElementById("tabla_conculta_filter").style.display="none";
}


function lista_consulta(){
  tableconsulta = $("#tabla_conculta").DataTable({
    "ordering":false,   
    "bLengthChange":false,
    "searching": { "regex": false },
    "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    "pageLength": 10,
    "destroy":true,
    "async": false ,
    "processing": true,
    "ajax":{
        "url":"../controlador/consulta/controlador_consulta_listartotal.php",
        type:'POST',
        
    },responsive: "true",
    dom: 'Bfrtip',       
    buttons:[ 
  {
    extend:    'excelHtml5',
    text:      '<i class="fas fa-file-excel"></i> ',
    titleAttr: 'Exportar a Excel',
    
    filename: function() {
      return  "CONSULTAS"
    },
      title: function() {
        return  "CONSULTAS" }

  },
  {
    extend:    'pdfHtml5',
    text:      '<i class="fas fa-file-pdf"></i> ',
    titleAttr: 'Exportar a PDF',
    filename: function() {
      return  "CONSULTAS"
    },
  title: function() {
    return  "CONSULTAS"
  }
},
  {
    extend:    'print',
    text:      '<i class="fa fa-print"></i> ',
    titleAttr: 'Imprimir',
    
  title: function() {
    return  "CONSULTAS"

  }
  }],
    "columns":[
        {"data":"Posicion"},
        {"data":"dni_paci"},
        {"data":"paciente"},
        {"data":"fecha"},
        {"data":"consulta_diagnostico_presuntivo"},
        {"data":"consulta_diagnostico_definitivo"},
        {"data":"consulta_estatus",
          render: function (data, type, row ) {
            if(data=='PENDIENTE'){
                return "<span class='badge badge-primary'>"+data+"</span>";               
            }else if(data=='CANCELADA'){
              return "<span class='badge badge-danger'>"+data+"</span>";                 
            }else{
              return "<span class='badge badge-success'>"+data+"</span>";                 
            }
          }
        },  
        {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar cita'><i class='fa fa-edit'></i></button>"}
      ],

    "language":idioma_espanol,
    select: true
});
document.getElementById("tabla_conculta_filter").style.display="none";
$('input.global_filter').on( 'keyup click', function () {
     filterGlobal();
 } );
 $('input.column_filter').on( 'keyup click',function(){
     filterColumn( $(this).parents('tr').attr('data-column') );
 });
}
function filterGlobal(){
  $('#tabla_conculta').DataTable().search(
      $('#global_filter').val(),
  ).draw();
}
function AbrirModalRegistro(){
  $('#modal_registro').modal({backdrop:'static',keyboard:false})
  $('#modal_registro').modal('show');
}

function listar_paciente_combo_consulta(){
  $.ajax({
    "url":"../controlador/consulta/controlador_combo_paciente_cita_listar.php",
        type:'POST'
  }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena="";
      if(data.length>0){
          for(var i=0; i < data.length; i++){
              cadena+="<option value='"+data[i][0]+"'> Nro Atención: "+data[i][1]+"  - Paciente: "+data[i][2]+"</option>";
          }
          $('#cbm_paciente_consulta').html(cadena);
          $('#cbm_especialidad_editar').html(cadena);
      }
      else{
          cadena+="<option value=''>No se encontraron regitros</option>";
          $('#cbm_paciente_consulta').html(cadena);
          $('#cbm_especialidad_editar').html(cadena);
      }
  })
}
function Registro_Consulta(){
  var paciente=$('#cbm_paciente_consulta').val();
  var descripcion=$('#motivo_consulta').val();
  var diagnostico1=$('#diagnostico1').val();
  var diagnostico2=$('#diagnostico2').val();
  if(paciente.length==0  || descripcion.length==0|| diagnostico1.length==0|| diagnostico2.length==0){
      return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
  }
  $.ajax({
      "url":"../controlador/consulta/controlador_consulta_registrar.php",
      type:'POST',
      data:{
        paciente:paciente,
        descripcion:descripcion,
        diagnostico1:diagnostico1,
        diagnostico2:diagnostico2
      }
  }).done(function(resp){
    if(resp>0){
            $("#modal_registro").modal('hide');
            lista_consulta();
            return Swal.fire("Mensaje De Confirmación","Datos correctamente, Nueva consulta registrada","success").then((value)=>{
            tableconsulta.ajax.reload();
            })       
    }
    else{
        return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar el registro","error");
    }
    
  })  
}
$('#tabla_conculta').on('click','.editar',function(){
  var data = tableconsulta.row($(this).parents('tr')).data();
  if(tableconsulta.row(this).child.isShown()){
      var data = tableconsulta.row(this).data();
  }
  $("#modal_editar").modal({backdrop:'static',keyboard:false});
  $("#modal_editar").modal('show');
  $("#txtidconsulta").val(data.consulta_id);
  $("#cbm_paciente_consulta_editar").val(data.paciente).trigger("change");
  $("#motivo_consulta_editar").val(data.consulta_descripcion);
  $("#diagnostico1_editar").val(data.consulta_diagnostico_presuntivo);
  $("#diagnostico2_editar").val(data.consulta_diagnostico_definitivo);

})
function Edita_Consulta(){
  var idconsulta=$('#txtidconsulta').val();
  var descripcion=$('#motivo_consulta_editar').val();
  var diagnostico1=$('#diagnostico1_editar').val();
  var diagnostico2=$('#diagnostico2_editar').val();
  if(idconsulta.length==0|| descripcion.length==0|| diagnostico1.length==0|| diagnostico2.length==0){
      return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
  }
  $.ajax({
      "url":"../controlador/consulta/controlador_consulta_editar.php",
      type:'POST',
      data:{
        idconsulta:idconsulta,
        descripcion:descripcion,
        diagnostico1:diagnostico1,
        diagnostico2:diagnostico2
      }
  }).done(function(resp){
    if(resp>0){
            $("#modal_registro").modal('hide');
            lista_consulta();
            return Swal.fire("Mensaje De Confirmación","Datos correctamente modificados, consulta actualizada","success").then((value)=>{
            tableconsulta.ajax.reload();
            })       
    }
    else{
        return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar la actualización","error");
    }
    
  })  
}
