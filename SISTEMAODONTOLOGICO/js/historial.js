var tablehistorial;
function listar_historial_fechas(){
    var finicio=$("#txtfechainicio").val();
    var ffin=$("#txtfechafin").val();
    tablehistorial = $("#tabla_historial").DataTable({
    "ordering":false,   
    "bLengthChange":false,
    "searching": { "regex": false },
    "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    "pageLength": 5,
    "destroy":true,
    "async": false ,
    "processing": true,
    "ajax":{
        "url":"../controlador/historial/controlador_historial_listar_fechas.php",
        type:'POST',
        data:{
            fechainicio:finicio,
            fechafin:ffin
        }
    },
    "columns":[
        {"data":"Posicion"},
        {"data":"fecha"},
        {"data":"dni_paci"},
        {"data":"paciente"},
        {"data":"total"},
        {"defaultContent":"<button style='font-size:13px;' type='button' class='diagnostico btn btn-default btn-sm' title='Ver Diagnostico'><i class='fa fa-eye'></i></button>"},
        {"defaultContent":"<button style='font-size:13px;' type='button' class='verdetalle btn btn-default btn-sm' title='Ver Detalle Tratamiento'><i class='fa fa-eye'></i></button>"},

        {"data":"id_fua",
            render: function (data, type, row ) {
                  return "<button style='font-size:13px;' type='button' class='control btn btn-warning btn-sm' title='Ingresar Control'><i class='fas fa-check-circle'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='vercontrol btn btn-info btn-sm' title='Ver Control de Tratamiento'><i class='fa fa-eye'></i></button><br><button style='font-size:13px; margin-top: 4px' type='button' class='imprimir btn btn-success btn-sm' title='Imprimir Boleta de atención'><i class='fa fa-print'></i></button>&nbsp;<button style='font-size:13px;margin-top: 4px' type='button' class='pdf btn btn-primary btn-sm' title='Imprimir/Ver Historia Clínica'><i class='fa fa-print'></i></button>&nbsp;<button style='font-size:13px;margin-top: 4px' type='button' class='eliminar btn btn-danger btn-sm' title='Eliminar Atención'><i class='fa fa-trash'></i></button>";             
            }
          },
      ],

    "language":idioma_espanol,
    select: true
});
document.getElementById("tabla_historial_filter").style.display="none";
$('input.global_filter').on( 'keyup click', function () {
     filterGlobal();
 } );
 $('input.column_filter').on( 'keyup click',function(){
     filterColumn( $(this).parents('tr').attr('data-column') );
 });

function filterGlobal(){
  $('#tabla_historial').DataTable().search(
      $('#global_filter').val(),
  ).draw();
}
}
$('#tabla_historial').on('click','.eliminar',function(){
  var data = tablehistorial.row($(this).parents('tr')).data();
  if(tablehistorial.row(this).child.isShown()){
      var data = tablehistorial.row(this).data();
  }
  Swal.fire({
      title: 'Esta seguro de eliminar la atención?',
      text: "Una vez hecho esto se eliminaran los controles, los odontogramas, el detalle del tratamiento y el preio pactado que fue registrado",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar',
      cancelButtonText: 'Cancelar',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        Eliminar_Fua(data.id_fua);
      }else{
          Swal.fire("Cancelado","La atención no se elimino","error");
      }  
           
  })
})

function Eliminar_Fua(id_fua){
  $.ajax({
      "url":"../controlador/historial/controlador_eliminar_fua.php",
      type:'POST',
      data:{
        id_fua:id_fua,
      }
  }).done(function(resp){
      if(resp>0){
          Swal.fire("Mensaje De Confirmacion","La atención se elimino con exito","success")            
          .then ( ( value ) =>  {
            tablehistorial.ajax.reload();
          }); 
      }
      else{
          Swal.fire("Mensaje De Error","No se pudo eliminar la atención, hay un error","error");
      }
  })


}
$('#tabla_historial').on('click','.diagnostico',function(){
  var data = tablehistorial.row($(this).parents('tr')).data();
  if(tablehistorial.row(this).child.isShown()){
      var data = tablehistorial.row(this).da
      ta();
  }
  $("#modal_diagnostico").modal({backdrop:'static',keyboard:false});
  $("#modal_diagnostico").modal('show');
  $("#txt_motivo_consulta").val(data.consulta_descripcion);
  $("#txt_diagnosticopresuntivo_fua").val(data.consulta_diagnostico_presuntivo);
  $("#txt_diagnostico_fua").val(data.consulta_diagnostico_definitivo);
  
})
  $('#tabla_historial').on('click','.imprimir',function(){
    var data = tablehistorial.row($(this).parents('tr')).data();
    if(tablehistorial.row(this).child.isShown()){
        var data = tablehistorial.row(this).data();
    }
    window.open("../vista/libreporte/reportes/generar_boleta.php?id="+parseInt(data.id_fua)
    +"#zoom=100%","Boleta","scrollbars=NO");


  /*$("#descripcion_editar").val(data.descripcion);*/
})

$('#tabla_historial').on('click','.verdetalle',function(){
  var data = tablehistorial.row($(this).parents('tr')).data();
  if(tablehistorial.row(this).child.isShown()){
      var data = tablehistorial.row(this).data();
  }
  $("#modal_detalle").modal({backdrop:'static',keyboard:false});
  $("#modal_detalle").modal('show');
  listar_tratamiento(data.id_fua);
  $("#lbl_totalneto").html("<b>Total:</b>"+data.total);
})

$('#tabla_historial').on('click','.vercontrol',function(){
  var data = tablehistorial.row($(this).parents('tr')).data();
  if(tablehistorial.row(this).child.isShown()){
      var data = tablehistorial.row(this).data();
  }
  $("#modal_vercontroles").modal({backdrop:'static',keyboard:false});
  $("#modal_vercontroles").modal('show');
  listar_control(data.id_fua);
})



$('#tabla_historial').on('click','.control',function(){
  var data = tablehistorial.row($(this).parents('tr')).data();
  if(tablehistorial.row(this).child.isShown()){
      var data = tablehistorial.row(this).data();
  }
  $("#modal_control").modal({backdrop:'static',keyboard:false});
  $("#modal_control").modal('show');
  $("#txt_idfua").val(data.id_fua);
  $("#cbm_pacientes_pago").val(data.id_consulta).trigger("change");
})
function Control(){
  var idfua=$("#txt_idfua").val();
  var nrocontrol=$('#control').val();
  var descripcion=$('#descripcion').val();
  if(nrocontrol.length==0 || descripcion.length==0){
      return Swal.fire("Mensaje De Advertencia","Los campos no deben ir vacios ","warning");
  }else{
  $.ajax({
      "url":"../controlador/historial/controlador_registro_control.php",
      type:'POST',
      data:{
        idfua:idfua,
        nrocontrol:nrocontrol,
        descripcion:descripcion

      }
  }).done(function(resp){
      if(resp>0){
              $("#modal_control").modal('hide');
              listar_historial_fechas();
              limpiarregistro2();
              return Swal.fire("Mensaje De Confirmación","Se realizo correctamente el registro del control","success").then((value)=>{
              tablapagos.ajax.reload();
              })
      }
      else{
          return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar el registro","error");
      }
      
  })    
}
}
function limpiarregistro2(){
  $("#descripcion").val("");
}
$('#tabla_historial').on('click','.pdf',function(){
  var data = tablehistorial.row($(this).parents('tr')).data();
  if(tablehistorial.row(this).child.isShown()){
      var data = tablehistorial.row(this).data();
  }
  window.open("../vista/libreporte/reportes/generar_fua.php?id="+parseInt(data.id_fua)
  +"#zoom=100%","Ticket","scrollbars=NO");
  
  /*$("#descripcion_editar").val(data.descripcion);*/
})
/////////////////FUNCIONES REGISTRO HISTORIAL////////////////////////////////
var tableconsultahistorial;
function listar_historial_consulta(){
    tableconsultahistorial = $("#tabla_consulta_historial").DataTable({
    "ordering":false,   
    "bLengthChange":false,
    "searching": { "regex": false },
    "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    "pageLength": 5,
    "destroy":true,
    "async": false ,
    "processing": true,
    "ajax":{
        "url":"../controlador/historial/controlador_historial_consulta_listar.php",
        type:'POST',
        
    },
    "columns":[
        {"data":"Posicion"},
        {"data":"fecha"},
        {"data":"dni_paci"},
        {"data":"paciente"},
        {"data":"consulta_descripcion"},
        {"defaultContent":"<button style='font-size:13px;' type='button' class='enviar btn btn-primary ml-2' title='Enviar'><i class='fas fa-share-square ml-1 mr-1'></i>Enviar</button>"},
      ],

    "language":idioma_espanol,
    select: true
    
});


document.getElementById("tabla_consulta_historial_filter").style.display="none";
$('input.global_filter').on( 'keyup click', function () {
     filterGlobal();
 } );
 $('input.column_filter').on( 'keyup click',function(){
     filterColumn( $(this).parents('tr').attr('data-column') );
 });
}
function filterGlobal(){
  $('#tabla_consulta_historial').DataTable().search(
      $('#global_filter').val(),
  ).draw();
}
function AbrirModalConsulta(){
    $('#modal_consulta').modal({backdrop:'static',keyboard:false})
    $('#modal_consulta').modal('show');
    listar_historial_consulta();
  }
  $('#tabla_consulta_historial').on('click','.enviar',function(){
    var data = tableconsultahistorial.row($(this).parents('tr')).data();
    if(tableconsultahistorial.row(this).child.isShown()){
        var data = tableconsultahistorial.row(this).data();
    }
    $("#txtidhistoria").val(data.historia_id);
    $("#txt_codigohistoria").val(data.nro_historia);
    $("#txt_paciente").val(data.paciente);
    $("#txt_descriconsulta").val(data.consulta_descripcion);
    $("#txt_diagnostico1").val(data.consulta_diagnostico_presuntivo);
    $("#txt_diagnostico2").val(data.consulta_diagnostico_definitivo);
    $("#txtid_consulta").val(data.consulta_id);
    $("#modal_consulta").modal('hide');

  })
  function listar_tratamientos(){
    $.ajax({
      "url":"../controlador/historial/controlador_combo_tratamientos.php",
          type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
              cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $('#cbm_tratamientos').html(cadena);
            var id =$("#cbm_tratamientos").val();
            Traerpreciotratamiento(id);
        }
        else{
            cadena+="<option value=''>No se encontraron regitros</option>";
            $('#cbm_tratamientos').html(cadena);
        }
    })
  }
  function Traerpreciotratamiento(idtratamiento){
    $.ajax({
      "url":"../controlador/historial/controlador_combo_traer_precio.php",
          type:'POST',
          data:{
            id:idtratamiento
          }
        }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
          $("#txt_precio").val(data[0][1]);
        }
        else{
            return Swal.fire("Mensaje de Error","No se pudo traer el tratamiento","error");
        }
    })
  }
 //////////////////////////AGREGAR TRATAMIENTOS////////////////////////////////
 function AgregarTratamiento(){
   var idtratamiento=$("#cbm_tratamientos").val();
   var tratamiento=$("#cbm_tratamientos option:selected").text();
   var fecha=$("#txt_fecha").val();
   var hora=$("#Hora").val();
   var precio=$("#txt_precio").val();
   var cantidad=$("#txt_cantidad").val();
   var subtotal=$("#txt_total").val();;
  
   if(parseFloat(precio)<0)
   {
    return Swal.fire("Mensaje de Advertencia","El precio debe ser mayor a cero","warning");
   }
   if(parseInt(cantidad)<1)
   {
    return Swal.fire("Mensaje de Advertencia","La cantidad debe ser mayor a cero","warning");
   }
   if(verificarid(idtratamiento)){
    return Swal.fire("Mensaje de Advertencia","El tratamiento ya fue agregado a la tabla","warning");
   }
   if(cantidad.length==0){
    return Swal.fire("Mensaje De Advertencia","Llene la cantidad","warning");
}
if(hora.length==0){
  return Swal.fire("Mensaje De Advertencia","Seleccione un horario","warning");
}
   var datos_agregar ="<tr>";
   datos_agregar+="<td for='id'>"+idtratamiento+"</td>";
   datos_agregar+="<td>"+tratamiento+"</td>";
   datos_agregar+="<td>"+fecha+"</td>";
   datos_agregar+="<td>"+hora+"</td>";
   datos_agregar+="<td>"+"S/."+precio+"</td>";
   datos_agregar+="<td>"+cantidad+"</td>";
   datos_agregar+="<td>"+subtotal+"</td>";
   datos_agregar+="<td><button class='btn btn-danger' onclick='remove(this)'><i class='fas fa-trash'><i></button></td>";
   datos_agregar+="</tr>";
   $("#tbody_tabla_tratamiento").append(datos_agregar);
   SumarTotal();
   limpiarcantidad();
  
 }

 function verificarid(id){
   let idverificar=document.querySelectorAll('#tabla_tratamiento td[for="id"]');
   return [].filter.call(idverificar, td=>td.textContent ===id).length===1;
 }
 function remove(t){
   var td =t.parentNode;
   var tr=td.parentNode;
   var table =tr.parentNode;
   table.removeChild(tr);
   SumarTotal();
 }
 function limpiarcantidad(){
  $('#txt_cantidad').val("");
 }

 function SumarTotal(){
  let arreglo_total=new Array();
   let count=0;
   let total=0;
   $("#tabla_tratamiento tbody#tbody_tabla_tratamiento tr").each(function(){
     arreglo_total.push($(this).find('td').eq(6).text());
     count++;
   })
   for(var i=0;i<count;i++){
     var suma = arreglo_total[i];
     total=(parseFloat(total)+parseFloat(suma)).toFixed(2);
     
   };
   $("#lbl_totalneto").html("<b>Total:</b>S/."+total);

 }

function Registrar_Fua(){
 

  let count=0;
  $("#tabla_tratamiento tbody#tbody_tabla_tratamiento tr").each(function(){
    count++;
  })
  if(count==0){
    return Swal.fire("Mensaje de Advertencia","El detalle del tratamiento debe tener al menos un registro","warning");
  }
  var text1=$("#text1").val();
  var text2=$("#text2").val();

  var consulta_id1=$("#txtid_consulta").val();
  var consulta_id1=$("#txtid_consulta").val();
var historiaid1=$("#txtidhistoria").val();
  if(consulta_id1.length==0 ||historiaid1.length==0){
    return Swal.fire("Mensaje De Advertencia","Debe llenar los datos de la consulta primero para guardar","warning");
}
if(text2.length==0){
  return Swal.fire("Mensaje De Advertencia","Debe llenar los odontogramas","warning");
}

else{

}

  let consulta_id=document.getElementById('txtid_consulta').value;
  let historiaid=document.getElementById('txtidhistoria').value;
  let total=document.getElementById('lbl_totalneto').innerHTML.substr(16);
  let observacion=document.getElementById('observacion').value;
  
  $.ajax({
    url:"../controlador/historial/controlador_historial_registrar.php",
    type:'POST',
    data:{
      consulta_id:consulta_id,
      historiaid:historiaid,
      total:total,
      observacion:observacion

    }
}).done(function(resp){
  
    if(resp>0){
     
      Registrar_Detalle_tratamiento(parseInt(resp));
      $("#contenido_principal").load("historial/vista_atencion_paciente.php");
      Swal.fire({
        title: 'Se realizo correctamente el registro de su atención',
        text: "Datos de Confirmación",
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Imprimir Boleta!'
      }).then((result) => {
        if (result.isConfirmed) {
         // listar_historial_fechas();
         // tablehistorial.ajax.reload();
          window.open("../vista/libreporte/reportes/generar_boleta.php?id="+parseInt(resp)+"#zoom=100%","Boleta","scrollbars=NO");

        }
      })
  
}
else{
  return Swal.fire("Mensaje De Advertencia","Lo sentimos, la hora que selecciono ya ah sido ocupada por otro paciente en el mismo día revise","warning");
    }
    
  })
}

function Registrar_Detalle_tratamiento(id){
  let count=0;
  let arreglo_tratamiento=new Array();
  let arreglo_fecha=new Array();
  let arreglo_hora=new Array();
  let arreglo_cantidad=new Array();
  let arreglo_subtotal=new Array();
  
  $("#tabla_tratamiento tbody#tbody_tabla_tratamiento tr").each(function(){
    
    arreglo_tratamiento.push($(this).find('td').eq(0).text());
    arreglo_fecha.push($(this).find('td').eq(2).text());
    arreglo_hora.push($(this).find('td').eq(3).text());
    arreglo_cantidad.push($(this).find('td').eq(5).text());
    arreglo_subtotal.push($(this).find('td').eq(6).text());
    count++;
  })
  if(count==0){
    return Swal.fire("Mensaje de Advertencia","El detalle del tratamiento debe tener al menos un registro","warning");

  }
  let tratamiento= arreglo_tratamiento.toString();
  let fecha= arreglo_fecha.toString();
  let hora= arreglo_hora.toString();
  let cantidad= arreglo_cantidad.toString();
  let subtotal= arreglo_subtotal.toString();

  $.ajax({
    url:"../controlador/historial/controlador_detalle_Tratamiento_registrar.php",
    type:'POST',
    data:{
      id:id,
      tratamiento:tratamiento,
      fecha:fecha,
      hora:hora,
      cantidad:cantidad,
      subtotal:subtotal
    }
}).done(function(resp){
  //alert(resp);
  if(resp>0){
   
    }
else{
  return Swal.fire("Mensaje De Advertencia","Lo sentimos, la hora que selecciono ya ah sido ocupada por otro paciente en el mismo día revise","warning");
    }
    
  })
}

var tableprocedimiento;
function listar_tratamiento(idfua){
  tableprocedimiento = $("#tabla_tratamiento").DataTable({
    "ordering":false,   
    "bLengthChange":false,
    "searching": { "regex": false },
    "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    "pageLength": 5,
    "destroy":true,
    "async": false ,
    "processing": true,
    "ajax":{
        "url":"../controlador/historial/controlador_historial_detalletratamiento.php",
        type:'POST',
        data:{
          id:idfua
        }
    },


    "columns":[
        {"data":"Posicion"},
        {"data":"nombre_trata"},
        {"data":"fecha"},
        {"data":"Hora"},
        {"data":"precio"},
        {"data":"cantidad"},
        {"data":"subtotal"},        
        
      ],

    "language":idioma_espanol,
    select: true
});
document.getElementById("tabla_tratamiento_filter").style.display="none";
$('input.global_filter').on( 'keyup click', function () {
     filterGlobal();
 } );
 $('input.column_filter').on( 'keyup click',function(){
     filterColumn( $(this).parents('tr').attr('data-column') );
 });

function filterGlobal(){
  $('#tabla_tratamiento').DataTable().search(
      $('#global_filter').val(),
  ).draw();
}
}


var tablecontrol;
function listar_control(idfua){
  tablecontrol = $("#tabla_control").DataTable({
    "ordering":false,   
    "bLengthChange":false,
    "searching": { "regex": false },
    "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    "pageLength": 5,
    "destroy":true,
    "async": false ,
    "processing": true,
    "ajax":{
        "url":"../controlador/historial/controlador_historial_vercontroles.php",
        type:'POST',
        data:{
          id:idfua
        }
    },
    "columns":[
        {"data":"Posicion"},
        {"data":"Nro_control"},
        {"data":"Descripcion"},
        {"data":"fecha"},       
        
      ],

    "language":idioma_espanol,
    select: true
});
document.getElementById("tabla_control_filter").style.display="none";
$('input.global_filter').on( 'keyup click', function () {
     filterGlobal();
 } );
 $('input.column_filter').on( 'keyup click',function(){
     filterColumn( $(this).parents('tr').attr('data-column') );
 });

function filterGlobal(){
  $('#tabla_control').DataTable().search(
      $('#global_filter').val(),
  ).draw();
}
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

  document.getElementById("txt_fecha").setAttribute('min',fecha_minimo);
}
