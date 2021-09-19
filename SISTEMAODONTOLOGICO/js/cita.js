var tablecita;
function listar_citas(){
  var finicio=$("#txtfechainicio").val();
      var ffin=$("#txtfechafin").val();
      
  tablecita = $("#tabla_cita").DataTable({
    
      "ordering":false,   
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 10,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/cita/controlador_cita_listar.php",
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
        return  "CITAS DEL DIA DE HOY"
      },
        title: function() {
          return  "CITAS DEL DIA DE HOY" }

    },
    {
      extend:    'pdfHtml5',
      text:      '<i class="fas fa-file-pdf"></i> ',
      titleAttr: 'Exportar a PDF',
      filename: function() {
        return  "CITAS DEL DIA DE HOY"
      },
    title: function() {
      return  "CITAS DEL DIA DE HOY"
    }
  },
    {
      extend:    'print',
      text:      '<i class="fa fa-print"></i> ',
      titleAttr: 'Imprimir',
      messageTop: "CITAS DE HOY", //Coloca el título dentro del PDF
      
    title: function() {
      return  "CITAS DEL DIA DE HOY"

    }
    }],
      "columns":[
          {"data":"Posicion"},
          {"data":"cita_nroatencion"},
          {"data":"fecha"},
          {"data":"hora_cita"},
          {"data":"paciente"},
          {"data":"cita_descripcion"},
          {"data":"cita_estado",
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
          {"data":"cita_estado",
            render: function (data, type, row ) {
              if(data=='ATENDIDO'){
                  return "<button style='font-size:13px;' type='button' hidden class='editar btn btn-warning btn-sm' title='Editar cita'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;'title='Cancelar cita' hidden type='button' id='desactivar' class='desac btn btn-danger btn-sm'><i class='fas fa-window-close'></i></i></button>&nbsp;<button style='font-size:13px;' type='button' hidden title='Imprimir ticket' id='activar' class='imprimir btn btn-secondary btn-sm'><i class='fa fa-print'></i></button>";             
              }else if(data=='PENDIENTE') {
                return "<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar cita'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;'title='Cancelar cita' type='button' id='desactivar' class='desac btn btn-danger btn-sm'><i class='fas fa-window-close'></i></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Imprimir ticket' id='activar' class='imprimir btn btn-secondary btn-sm'><i class='fa fa-print'></i></button>";                 
              }
            }
          }, 
        ],

      "language":idioma_espanol,
      select: true
       
  });
  document.getElementById("tabla_cita_filter").style.display="none";
  $('input.global_filter').on( 'keyup click', function () {
       filterGlobal();
   } );
   $('input.column_filter').on( 'keyup click',function(){
       filterColumn( $(this).parents('tr').attr('data-column') );
   });

}
function filterGlobal(){
  $('#tabla_cita').DataTable().search(
      $('#global_filter').val(),
  ).draw();
}
function AbrirModalRegistro(){
  $('#modal_registro').modal({backdrop:'static',keyboard:false})
  $('#modal_registro').modal('show');
}
function listar_paciente(){
  $.ajax({
      "url":"../controlador/cita/controlador_combo_paciente_listar.php",
        type:'POST'
  }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena="";
      if(data.length>0){
          for(var i=0; i < data.length; i++){
              cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
          }
          $('#cbm_paciente').html(cadena);
          $('#cbm_paciente_editar').html(cadena);
          
      }
      else{
          cadena+="<option value=''>No se encontraron regitros</option>";
          $('#cbm_paciente').html(cadena);
          $('#cbm_paciente_editar').html(cadena);
      }
  })
}
function listar_medico_combo(){
  $.ajax({
      "url":"../controlador/cita/controlador_combo_medico_listar.php",
        type:'POST'
  }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena="";
      if(data.length>0){
          for(var i=0; i < data.length; i++){
              cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
          }
          $('#cbm_medico').html(cadena);
          $('#cbm_medico_editar').html(cadena);
          
      }
      else{
          cadena+="<option value=''>No se encontraron regitros</option>";
          $('#cbm_medico').html(cadena);
          $('#cbm_medico_editar').html(cadena);
      }
  })
}

function Registro_Citas(){
  var paciente=$('#cbm_paciente').val();
  var fecha=$('#fecha').val();
  var hora=$('#hora').val();
  var medico=$('#cbm_medico').val();
  var descripcion=$('#descripcion').val();
  if(paciente.length==0  || fecha.length==0|| hora.length==0|| medico.length==0){
      return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
  }
  $.ajax({
      "url":"../controlador/cita/controlador_cita_registrar.php",
      type:'POST',
      data:{
        paciente:paciente,
        fecha:fecha,
        hora:hora,
        medico:medico,
        descripcion:descripcion,

      }
  }).done(function(resp){
    //alert(resp);
    if(resp>0){
          Swal.fire({
            title: 'Datos correctamente, nueva cita registrada',
            text: "Datos de Confirmación",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Imprimir Ticket!'
          }).then((result) => {
            if (result.isConfirmed) {
              listar_citas();
              window.open("../vista/libreporte/reportes/generar_ticket.php?id="+parseInt(resp)+"#zoom=100%","Ticket","scrollbars=NO");
              $("#modal_registro").modal('hide');

            }else{
              $("#modal_registro").modal('hide');
              listar_citas();
              tablecita.ajax.reload();
            }
          })
      
  }
  else{
    return Swal.fire("Mensaje De Advertencia","Lo sentimos, la hora que selecciono ya ah sido ocupada por otro paciente en el mismo día revise","warning");
  }
      
  })  
  }
  $('#tabla_cita').on('click','.imprimir',function(){
    var data = tablecita.row($(this).parents('tr')).data();
    if(tablecita.row(this).child.isShown()){
        var data = tablecita.row(this).data();
    }
    window.open("../vista/libreporte/reportes/generar_ticket.php?id="+parseInt(data.cita_id)
    +"#zoom=100%","Ticket","scrollbars=NO");

})
$('#tabla_cita').on('click','.desac',function(){
  var data = tablecita.row($(this).parents('tr')).data();
  if(tablecita.row(this).child.isShown()){
      var data = tablecita.row(this).data();
  }
  Swal.fire({
      title: 'Esta seguro de cancelar la cita?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, cancelar cita',
      cancelButtonText: 'No cancelar'
    }).then((result) => {
      if (result.value) {
        Modificar_Estatus(data.cita_id,'CANCELADA');
      }
    })
})
function Modificar_Estatus(idcita,estatus){
  var mensaje ="";
  if(estatus=='CANCELADA'){
      mensaje="cancelo";
    }
  else{
    mensaje="activo";
    }
  $.ajax({
      "url":"../controlador/cita/controlador_modificar_estatus_cita.php",
      type:'POST',
      data:{
          idcita:idcita,
          estatus:estatus
      }
  }).done(function(resp){
      if(resp>0){
          Swal.fire("Mensaje De Confirmacion","La cita se "+mensaje+" con exito","success")            
          .then ( ( value ) =>  {
            tablecita.ajax.reload();
          }); 
      }
  })


}
$('#tabla_cita').on('click','.editar',function(){
  var data = tablecita.row($(this).parents('tr')).data();
  if(tablecita.row(this).child.isShown()){
      var data = tablecita.row(this).data();
  }
  $("#modal_editar").modal({backdrop:'static',keyboard:false});
  $("#modal_editar").modal('show');
  $("#txtidcita").val(data.cita_id);
  $("#cbm_paciente_editar").val(data.id_paciente).trigger("change");
  $("#fecha_editar_actual").val(data.fecha_cita);
  $("#fecha_editar").val(data.fecha_cita);
  $("#hora_editar_actual").val(data.hora_cita);
  $("#hora_editar").val(data.hora_cita);
  $("#estado_cita").val(data.cita_estado).trigger("change");
  $("#descripcion_editar").val(data.cita_descripcion);
})
function Editar_Citas(){
  var idcita=$('#txtidcita').val();
  var paciente=$('#cbm_paciente_editar').val();
  var fecha_actual=$('#fecha_editar_actual').val();
  var fecha=$('#fecha_editar').val();
  var hora_actual=$('#hora_editar_actual').val();
  var hora=$('#hora_editar').val();
  var estado=$('#estado_cita').val();
  var descripcion=$('#descripcion_editar').val();
  if(idcita.length==0  ||paciente.length==0  || fecha.length==0|| hora.length==0 ||estado.length==0|| fecha_actual.length==0 ||hora_actual.length==0){
      return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
  }
  $.ajax({
      "url":"../controlador/cita/controlador_cita_editar.php",
      type:'POST',
      data:{
        idcita:idcita,
        paciente:paciente,
        fecha_actual:fecha_actual,
        fecha:fecha,
        hora_actual:hora_actual,
        hora:hora,
        estado:estado,
        descripcion:descripcion

      }
  }).done(function(resp){
    if(resp>0){
      if(resp>0){
        Swal.fire({
          title: 'Datos correctamente, cita actualizada correctamente',
          text: "Datos de Confirmación",
          icon: 'success',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Imprimir Ticket!'
        }).then((result) => {
          if (result.isConfirmed) {
            listar_citas();
            window.open("../vista/libreporte/reportes/generar_ticket.php?id="+parseInt(resp)+"#zoom=100%","Ticket","scrollbars=NO");
            $("#modal_editar").modal('hide');

          }else{
            $("#modal_editar").modal('hide');
            listar_citas();
            tablecita.ajax.reload();
          }
        })
    
  
        }else if(resp==2){
          return Swal.fire("Mensaje De Advertencia","Lo sentimos, la hora que selecciono ya ah sido ocupada por otro paciente en el mismo día revise","warning");

        }
    }
    
    else{
        return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar la actualización","error");
    }
    
})  
  }

function data(){
  var fecha = new Date();
  var anio = fecha.getFullYear();
  var dia = fecha.getDate();
  var _mes = fecha.getMonth(); //viene con valores de 0 al 11
  _mes = _mes + 1; //ahora lo tienes de 1 al 12
  if (_mes < 10) //ahora le agregas un 0 para el formato date
  {
    var mes = "0" + _mes;
  } else {
  var mes = _mes.toString;
  }

  let fecha_minimo = anio + '-' + mes + '-' + dia; // Nueva variable

  document.getElementById("fecha").setAttribute('min',fecha_minimo);
}
function dataeditar(){
  var fecha = new Date();
  var anio = fecha.getFullYear();
  var dia = fecha.getDate();
  var _mes = fecha.getMonth(); //viene con valores de 0 al 11
  _mes = _mes + 1; //ahora lo tienes de 1 al 12
  if (_mes < 10) //ahora le agregas un 0 para el formato date
  {
    var mes = "0" + _mes;
  } else {
  var mes = _mes.toString;
  }

  let fecha_minimo = anio + '-' + mes + '-' + dia; // Nueva variable

  document.getElementById("#fecha_editar").setAttribute('min',fecha_minimo);
}


function Total_citas(){
  $.ajax({
    "url":"../controlador/cita/controlador_total_citas.php",
        type:'POST'
      }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena="";
      if(data.length>0){
        $("#total").html(data[0][0]);
      }
      else{
          return Swal.fire("Mensaje de Error","No se pudo traer el tratamiento","error");
      }
  })
}