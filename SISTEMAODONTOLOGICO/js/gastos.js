var tablegastos;
function lista_gastos(){
    tablegastos = $("#tabla_gastos").DataTable({
    
      //Botones----------------------------------------------------------------------
      "dom": 'Bfrtip',
      "buttons": [
      'excelHtml5',
     'pdfHtml5'
], 

      "ordering":false,   
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 10,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/gastos/controlador_gastos_listar.php",
          type:'POST',
          
      },
      responsive: "true",
      dom: 'Bfrtip',       
      buttons:[ 
    {
      extend:    'excelHtml5',
      text:      '<i class="fas fa-file-excel"></i> ',
      titleAttr: 'Exportar a Excel',
      
      filename: function() {
        return  "GASTOS"
      },
        title: function() {
          return  "GASTOS" }
  
    },
    {
      extend:    'pdfHtml5',
      text:      '<i class="fas fa-file-pdf"></i> ',
      titleAttr: 'Exportar a PDF',
      filename: function() {
        return  "GASTOS"
      },
    title: function() {
      return  "GASTOS"
    }
  },
    {
      extend:    'print',
      text:      '<i class="fa fa-print"></i> ',
      titleAttr: 'Imprimir',
      
    title: function() {
      return  "GASTOS"
  
    }
    }],
      "columns":[
          {"data":"Posicion"},
          {"data":"tipo_gasto",
          render: function (data, type, row ) {
            if(data=='ALQUILER'){
                return "<span class='badge badge-primary'>"+data+"</span>";               
            }else if(data=='MATERIAL'){
              return "<span class='badge badge-secondary'>"+data+"</span>";                 
            }else{
              return "<span class='badge badge-success'>"+data+"</span>";                 
            }
          }
        },
          {"data":"gasto"},
          {"data":"gasto_cantidad"},
          {"data":"fecha"},
          {"data":"monto",
          render: function (datatotal, type, row ) {
                return "<b>"+datatotal+"</b>";               
           
          }
        },          
              
          {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar gasto'><i class='fa fa-edit'></i></button>"}
        ],
        
      "language":idioma_espanol,
      select: true
      
  });
  document.getElementById("tabla_gastos_filter").style.display="none";
  $('input.global_filter').on( 'keyup click', function () {
       filterGlobal();
   } );
   $('input.column_filter').on( 'keyup click',function(){
       filterColumn( $(this).parents('tr').attr('data-column') );
   });
  }
  function filterGlobal(){
    $('#tabla_gastos').DataTable().search(
        $('#global_filter').val(),
    ).draw();
  }
  function AbrirModalRegistro(){
    $('#modal_registro').modal({backdrop:'static',keyboard:false})
    $('#modal_registro').modal('show');
  }
  function Registro_Gastos(){
    var tipo=$('#tipo').val();
    var descripcion=$('#descripcion').val();
    var cantidad=$('#cantidad').val();
    var monto=$('#monto').val();
    if(tipo.length==0  || descripcion.length==0|| cantidad.length==0|| monto.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../controlador/gastos/controlador_gastos_registrar.php",
        type:'POST',
        data:{
            tipo:tipo,
            descripcion:descripcion,
            cantidad:cantidad,
            monto:monto
        }
    }).done(function(resp){
      if(resp>0){
              $("#modal_registro").modal('hide');
              lista_gastos();
              return Swal.fire("Mensaje De Confirmación","Datos correctamente, nuevo gasto registrado","success").then((value)=>{
                tablegastos.ajax.reload();
                LimpiarRegistro();
              })       
      }
      else{
          return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar el registro","error");
      }
      
    })  
  }

  
  function LimpiarRegistro(){
    $('#descripcion').val("");
    $('#cantidad').val("");
    $('#monto').val("");
    }
    $('#tabla_gastos').on('click','.editar',function(){
        var data = tablegastos.row($(this).parents('tr')).data();
        if(tablegastos.row(this).child.isShown()){
            var data = tablegastos.row(this).data();
        }
        $("#modal_editar").modal({backdrop:'static',keyboard:false});
        $("#modal_editar").modal('show');
        $("#txtidgasto").val(data.id_gasto);
        $("#tipo_editar").val(data.tipo_gasto).trigger("change");
        $("#descripcion_editar").val(data.gasto);
        $("#cantidad_editar").val(data.gasto_cantidad);
        $("#monto_editar").val(data.gasto_monto);
      
      })
    function Edita_Gasto(){
        var idgasto=$('#txtidgasto').val();
        var tipo=$('#tipo_editar').val();
        var descripcion=$('#descripcion_editar').val();
        var cantidad=$('#cantidad_editar').val();
        var monto=$('#monto_editar').val();
        if(idgasto.length==0||tipo.length==0|| descripcion.length==0|| cantidad.length==0|| monto.length==0){
            return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
        }
        $.ajax({
            "url":"../controlador/gastos/controlador_gasto_editar.php",
            type:'POST',
            data:{
                idgasto:idgasto,
                tipo:tipo,
                descripcion:descripcion,
                cantidad:cantidad,
                monto:monto
            }
        }).done(function(resp){
          if(resp>0){
                  $("#modal_registro").modal('hide');
                  lista_gastos();
                  lista_total();
                  return Swal.fire("Mensaje De Confirmación","Datos correctamente modificados, gasto actualizado","success").then((value)=>{
                    tablegastos.ajax.reload();
                  })       
          }
          else{
              return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar la actualización","error");
          }
          
        })  
      }
     
      function listar_gasto_busqueda(){
        var finicio=$("#txtfechainicio").val();
        var ffin=$("#txtfechafin").val();
        lista_total_fechas();
        listar_diferencia();
        tablegastos = $("#tabla_gastos").DataTable({
             //Botones----------------------------------------------------------------------
      "dom": 'Bfrtip',
      "buttons": [
      'excelHtml5',
     'pdfHtml5'
],  responsive: "true",
dom: 'Bfrtip',       
buttons:[ 
{
extend:    'excelHtml5',
text:      '<i class="fas fa-file-excel"></i> ',
titleAttr: 'Exportar a Excel',

filename: function() {
  return  "GASTOS"
},
  title: function() {
    return  "GASTOS" }

},
{
extend:    'pdfHtml5',
text:      '<i class="fas fa-file-pdf"></i> ',
titleAttr: 'Exportar a PDF',
filename: function() {
  return  "GASTOS"
},
title: function() {
return  "GASTOS"
}
},
{
extend:    'print',
text:      '<i class="fa fa-print"></i> ',
titleAttr: 'Imprimir',

title: function() {
return  "GASTOS"

}
}],
        "ordering":false,   
        "bLengthChange":false,
        "searching": { "regex": false },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"../controlador/gastos/controlador_gastobusqueda_listar.php",
            type:'POST',
            data:{
                fechainicio:finicio,
                fechafin:ffin
            }
        },
        "columns":[
        {"data":"Posicion"},
        {"data":"tipo_gasto",
        render: function (data, type, row ) {
        if(data=='ALQUILER'){
            return "<span class='badge badge-primary'>"+data+"</span>";               
        }else if(data=='MATERIAL'){
          return "<span class='badge badge-secondary'>"+data+"</span>";                 
        }else{
          return "<span class='badge badge-success'>"+data+"</span>";                 
        }
        }
        },
        {"data":"gasto"},
        {"data":"gasto_cantidad"},
        {"data":"fecha"},
        {"data":"monto",
        render: function (datatotal, type, row ) {
              return "<b>"+datatotal+"</b>";               
         
        }
      },         {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar gasto'><i class='fa fa-edit'></i></button>"}
          ],
  
        "language":idioma_espanol,
        select: true
    });
    document.getElementById("tabla_gastos_filter").style.display="none";
  }


  ///////////////////////////////////////////////////////////////////

 
  var tabletotal;
  function lista_total(){
    tabletotal = $("#tabla_total").DataTable({
      "bPaginate": false,
      "paging": false,
      "pagingType": "simple",
      "bInfo": false,
      "ordering":false,   
      "bLengthChange":false,
      
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/gastos/controlador_gastos_total.php",
          type:'POST',
          
      },
      "columns":[
        {"data":"total",
        render: function (datatotal, type, row ) {
              return "<b>"+datatotal+"</b>";               
         
        }
      }, 
         
        ],
        
      "language":idioma_espanol,
      select: true

  });
  document.getElementById("tabla_total_filter").style.display="none";


  }

  var tabletotalfechas;
  function lista_total_fechas(){
    var finicio=$("#txtfechainicio").val();
        var ffin=$("#txtfechafin").val();
    tabletotalfechas = $("#tabla_total_fechas").DataTable({
      "bPaginate": false,
      "paging": false,
      "pagingType": "simple",
      "bInfo": false,
      "ordering":false,   
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 10,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/gastos/controlador_gastos_total_x_fechas.php",
          type:'POST',
          data:{
            fechainicio:finicio,
            fechafin:ffin
        }
      },
      "columns":[
          {"data":"FechaInicial"},  
          {"data":"FechaFinal"},  
          {"data":"total",
          render: function (datatotal, type, row ) {
                return "<b>"+datatotal+"</b>";               
           
          }
        },       
        ],
        
      "language":idioma_espanol,
      select: true

  });

  document.getElementById("tabla_total_fechas_filter").style.display="none";
  $('input.global_filter').on( 'keyup click', function () {
       filterGlobal();
   } );
   $('input.column_filter').on( 'keyup click',function(){
       filterColumn( $(this).parents('tr').attr('data-column') );
   });
  }

 
  function Total_gastos(){
    $.ajax({
      "url":"../controlador/gastos/controlador_total_gastos.php",
          type:'POST'
        }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
          $("#totalgastos").html(data[0][0]);
        }
        else{
            return Swal.fire("Mensaje de Error","No se pudo traer el tratamiento","error");
        }
    })
  }
 var tablediferencias;
  function listar_diferencia(){
    var finicio=$("#txtfechainicio").val();
        var ffin=$("#txtfechafin").val();
        tablediferencias = $("#tabla_diferencia").DataTable({
      "bPaginate": false,
      "paging": false,
      "pagingType": "simple",
      "bInfo": false,
      "ordering":false,   
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 10,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/gastos/controlador_ver_diferencia.php",
          type:'POST',
          data:{
            fechainicio:finicio,
            fechafin:ffin
        }
      },
      "columns":[
          {"data":"FechaInicial"},  
          {"data":"FechaFinal"},
          {"data":"totalingresos",render: function (data, type, row ) {
           
              return "<span class='badge badge-success'>"+data+"</span>";         
       
        }
        },            
      {"data":"totalgasto",render: function (data, type, row ) {
      
        return "<span class='badge badge-danger'>"+data+"</span>";
                  
 
         }
        },
          {"data":"Diferencia",render: function (data, type, row ) {
            if(data>='S/. 0.00'){
              return "<span class='badge badge-success'>"+data+"</span>";
              
            }            
        else{
          return "<span class='badge badge-danger'>"+data+"</span>";                 
        }
        }
    },        ],
        "rowDefs":[
          {
          "targets": [ 1 ],
          "visible": false,     
          } 
        ],
        
      "language":idioma_espanol,
      select: true

  });

  document.getElementById("tabla_diferencia_filter").style.display="none";
  $('input.global_filter').on( 'keyup click', function () {
       filterGlobal();
   } );
   $('input.column_filter').on( 'keyup click',function(){
       filterColumn( $(this).parents('tr').attr('data-column') );
   });
  }