var tablapagos;
function listar_pagos(){
    tablapagos = $("#tabla_pagos").DataTable({
      "ordering":false,   
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 10,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/pagos/controlador_pagos_listar.php",
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
      return  "LISTADO DE PAGOS"
    },
      title: function() {
        return  "LISTADO DE PAGOS" }

  },
  {
    extend:    'pdfHtml5',
    text:      '<i class="fas fa-file-pdf"></i> ',
    titleAttr: 'Exportar a PDF',
    filename: function() {
      return  "LISTADO DE PAGOS"
    },
  title: function() {
    return  "LISTADO DE PAGOS"
  }
},
  {
    extend:    'print',
    text:      '<i class="fa fa-print"></i> ',
    titleAttr: 'Imprimir',
    
  title: function() {
    return  "LISTADO DE PAGOS"

  }
  }],
      "columns":[
          {"data":"Posicion"},
          {"data":"paciente"},
          {"data":"fecha"},
          {"data":"montototal"},
          {"data":"saldo",render: function (data, type, row ) {
            if(data=='S/. 0.00'){
              return "<span class='badge badge-success'>"+data+"</span>";
              
            }            
        else{
          return "<span class='badge badge-danger'>"+data+"</span>";                 
        }
        }
    },
          {"data":"estado",
            render: function (datae, type, row ) {
                  if(datae=='CANCELADO'){
                    return "<span class='badge badge-success'>"+datae+"</span>";
                  }            
              else{
                return "<span class='badge badge-danger'>"+datae+"</span>";                 
              }
            }
          },
          
          {"data":"estado",
            render: function (data, type, row ) {
              if(data=='CANCELADO'){
                  return "<button style='font-size:13px;'hidden disabled type='button' class='pagar btn btn-primary btn-sm' title='REALIZAR PAGO'><i class='fas fa-hand-holding-usd'></i></button>&nbsp;<button style='font-size:13px;' type='button' disabled hidden class='editar btn btn-warning btn-sm' title='EDITAR PAGO'><i class='fa fa-edit'></i></button>";             
              }else if(row["monto"] != row["saldo_pendiente"]){
                return "<button style='font-size:13px;' type='button'  class='pagar btn btn-primary btn-sm' title='REALIZAR PAGO'><i class='fas fa-hand-holding-usd'></i></button>&nbsp;<button style='font-size:13px;' type='button'  class='editar btn btn-warning btn-sm'  disabled hidden title='EDITAR PAGO'><i class='fa fa-edit'></i></button>";                 
              }else if(data=='PENDIENTE') {
                return "<button style='font-size:13px;' type='button'  class='pagar btn btn-primary btn-sm' title='REALIZAR PAGO'><i class='fas fa-hand-holding-usd'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='EDITAR PAGO'><i class='fa fa-edit'></i></button>";                 
              }
            }
          },   
        ],
        
      "language":idioma_espanol,
      select: true
  });
  document.getElementById("tabla_pagos_filter").style.display="none";
  $('input.global_filter').on( 'keyup click', function () {
       filterGlobal();
   } );
   $('input.column_filter').on( 'keyup click',function(){
       filterColumn( $(this).parents('tr').attr('data-column') );
   });

}

function filterGlobal(){
    $('#tabla_pagos').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
function AbrirModalRegistro(){
    $('#modal_registro').modal({backdrop:'static',keyboard:false})
    $('#modal_registro').modal('show');
}
function listar_combo_pacientes(){
    $.ajax({
        "url":"../controlador/pagos/controlador_combo_pacientes_listar.php",
          type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $('#cbm_pacientes').html(cadena);
            $('#cbm_pacientes_editar').html(cadena);
            $('#cbm_pacientes_pago').html(cadena);
            
        }
        else{
            cadena+="<option value=''>No se encontraron regitros</option>";
            $('#cbm_pacientes').html(cadena);
            $('#cbm_pacientes_editar').html(cadena);
        }
    })
}
function Registrar_pago(){
    var paciente=$('#cbm_pacientes').val();
    var total=$('#total').val();
    var descripcion=$('#descripcion').val();
    if(paciente.length==0 || total.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    if(parseInt(total)<0){
      return Swal.fire("Mensaje De Advertencia","el monto no deve ser menor a 0","warning");
  }
    $.ajax({
        "url":"../controlador/pagos/controlador_pagos_registrar.php",
        type:'POST',
        data:{
            paciente:paciente,
            total:total,
            descripcion:descripcion

        }
    }).done(function(resp){
        if(resp>0){
                $("#modal_registro").modal('hide');
                listar_pagos();
                return Swal.fire("Mensaje De Confirmación","Datos correctamente, Nuevo pago registrado","success").then((value)=>{
                LimpiarRegistro();
                tablapagos.ajax.reload();
                })
        }
        else{
            return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar el registro","error");
        }
        
    })    
}
function LimpiarRegistro(){
    $('#cbm_pacientes').val("");
    $('#total').val("");
    $('#descripcion').val("");
}
$('#tabla_pagos').on('click','.editar',function(){
    var data = tablapagos.row($(this).parents('tr')).data();
    if(tablapagos.row(this).child.isShown()){
        var data = tablapagos.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false});
    $("#modal_editar").modal('show');
    $("#txt_idpagos").val(data.id_precio_pactado);
    $("#cbm_pacientes_editar").val(data.id_paciente).trigger("change");
    $("#total_editar").val(data.monto);
    $("#descripcion_editar").val(data.descripcion);
})
function Modificar_Pago(){
    var idpago=$("#txt_idpagos").val();
    var paciente=$('#cbm_pacientes_editar').val();
    var total=$('#total_editar').val();
    var descripcion=$('#descripcion_editar').val();
    if(idpago.length==0||paciente.length==0||total.length==0||descripcion.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    if(parseInt(total)<0){
      return Swal.fire("Mensaje De Advertencia","el monto no deve ser menor a 0","warning");
  }
    $.ajax({
        "url":"../controlador/pagos/controlador_pagos_modificar.php",
        type:'POST',
        data:{
            idpago:idpago,
            paciente:paciente,
            total:total,
            descripcion:descripcion

        }
    }).done(function(resp){
        if(resp>0){
                $("#modal_editar").modal('hide');
                listar_pagos();
                return Swal.fire("Mensaje De Confirmación","Datos Actualizados correctamente","success").then((value)=>{
                    tablapagos.ajax.reload();
                })
        }
        
        else{
            return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar la actualización","error");
        }
        
    })   
}
$('#tabla_pagos').on('click','.pagar',function(){
    var data = tablapagos.row($(this).parents('tr')).data();
    if(tablapagos.row(this).child.isShown()){
        var data = tablapagos.row(this).data();
    }
    limpiarregistro2();
    $("#modal_pago").modal({backdrop:'static',keyboard:false});
    $("#modal_pago").modal('show');
    $("#txt_idpagopactado").val(data.id_precio_pactado);
    $("#saldo").val(data.saldo_pendiente);
    $("#cbm_pacientes_pago").val(data.id_paciente).trigger("change");
})
function Pagar(){
    var saldo_pendiente=$("#saldo").val();
    var idpreciopactado=$('#txt_idpagopactado').val();
    var monto=$('#total_cancelar').val();
    var saldopago=$('#saldopago').val();
    var saldoanterior=$('#saldo').val();
    if(idpreciopactado.length==0 || monto.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    if(parseInt(monto)>saldo_pendiente){
        return Swal.fire("Mensaje De Advertencia","el monto a pagar no deve ser mayor al saldo","warning");
    }
    if(parseInt(monto)<0){
      return Swal.fire("Mensaje De Advertencia","el monto no deve ser menor a 0","warning");
  }else{
    $.ajax({
        "url":"../controlador/pagos/controlador_pagos_cancelar_registrar.php",
        type:'POST',
        data:{
            idpreciopactado:idpreciopactado,
            monto:monto,
            saldopago:saldopago,
            saldoanterior:saldoanterior

        }
    }).done(function(resp){
      //alert(resp);
      if(resp>0){
            Swal.fire({
              title: 'Se realizo correctamente el pago, por favor revise su saldo',
              text: "Datos de Confirmación",
              icon: 'success',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Imprimir Boleta!'
            }).then((result) => {
              if (result.isConfirmed) {
                listar_pagos();
                window.open("../vista/libreporte/reportes/generar_boucher.php?id="+parseInt(resp)+"#zoom=100%","Boucher","scrollbars=NO");
                $("#modal_pago").modal('hide');
              }else{
                $("#modal_pago").modal('hide');
                listar_pagos();
                tablapagos.ajax.reload();
              }
            })
        
    }
    else{
      return Swal.fire("Mensaje De Advertencia","Lo sentimos, la hora que selecciono ya ah sido ocupada por otro paciente en el mismo día revise","warning");
    }
        
    })    
}
}
function limpiarregistro2(){
    $("#total_cancelar").val("");
}
function listar_pagos_por_fecha(){
    var finicio=$("#txtfechainicio").val();
      var ffin=$("#txtfechafin").val();
    tablapagos = $("#tabla_pagos").DataTable({
      "ordering":false,   
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 10,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/pagos/controlador_pagos_listar_por_fechas.php",
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
      return  "LISTADO DE PAGOS"
    },
      title: function() {
        return  "LISTADO DE PAGOS" }

  },
  {
    extend:    'pdfHtml5',
    text:      '<i class="fas fa-file-pdf"></i> ',
    titleAttr: 'Exportar a PDF',
    filename: function() {
      return  "LISTADO DE PAGOS"
    },
  title: function() {
    return  "LISTADO DE PAGOS"
  }
},
  {
    extend:    'print',
    text:      '<i class="fa fa-print"></i> ',
    titleAttr: 'Imprimir',
    
  title: function() {
    return  "LISTADO DE PAGOS"

  }
  }],
      "columns":[
          {"data":"Posicion"},
          {"data":"paciente"},
          {"data":"fecha"},
          {"data":"montototal"},
          {"data":"saldo",render: function (data, type, row ) {
            if(data=='S/. 0'){
              return "<span class='badge badge-success'>"+data+"</span>";
              
            }            
        else{
          return "<span class='badge badge-danger'>"+data+"</span>";                 
        }
        }
    },
          {"data":"estado",
            render: function (datae, type, row ) {
                  if(datae=='CANCELADO'){
                    return "<span class='badge badge-success'>"+datae+"</span>";
                  }            
              else{
                return "<span class='badge badge-danger'>"+datae+"</span>";                 
              }
            }
          },
          
          {"data":"estado",
            render: function (data, type, row ) {
              if(data=='CANCELADO'){
                  return "<button style='font-size:13px;'hidden disabled type='button' class='pagar btn btn-primary btn-sm' title='REALIZAR PAGO'><i class='fas fa-hand-holding-usd'></i></button>&nbsp;<button style='font-size:13px;' type='button' disabled hidden class='editar btn btn-warning btn-sm' title='EDITAR PAGO'><i class='fa fa-edit'></i></button>";             
              }else if(row["monto"] != row["saldo_pendiente"]){
                return "<button style='font-size:13px;' type='button'  class='pagar btn btn-primary btn-sm' title='REALIZAR PAGO'><i class='fas fa-hand-holding-usd'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm'  disabled title='EDITAR PAGO'><i class='fa fa-edit'></i></button>";                 
              }else if(data=='PENDIENTE') {
                return "<button style='font-size:13px;' type='button'  class='pagar btn btn-primary btn-sm' title='REALIZAR PAGO'><i class='fas fa-hand-holding-usd'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='EDITAR PAGO'><i class='fa fa-edit'></i></button>";                 
              }
            }
          },   
        ],
        
      "language":idioma_espanol,
      select: true
  });
  document.getElementById("tabla_pagos_filter").style.display="none";

}