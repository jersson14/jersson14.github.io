var tableingresos;
function lista_ingresos(){
    
  tableingresos = $("#tabla_ingresos").DataTable({
    

      "ordering":false,   
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 10,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/ingresos/controlador_ingresos_listar.php",
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
      return  "INGRESOS"
    },
      title: function() {
        return  "INGRESOS" }

  },
  {
    extend:    'pdfHtml5',
    text:      '<i class="fas fa-file-pdf"></i> ',
    titleAttr: 'Exportar a PDF',
    filename: function() {
      return  "INGRESOS"
    },
  title: function() {
    return  "INGRESOS"
  }
},
  {
    extend:    'print',
    text:      '<i class="fa fa-print"></i> ',
    titleAttr: 'Imprimir',
    
  title: function() {
    return  "INGRESOS"

  }
  }],
      "columns":[
          {"data":"Posicion"},
          {"data":"paciente"},
          {"data":"fecha"},
          {"data":"monto",
          render: function (datatotal, type, row ) {
                return "<b>"+datatotal+"</b>";               
           
          }
        },          {"defaultContent":"<button style='font-size:13px;' type='button' class='imprimir btn btn-warning btn-sm' title='Imprimir boleta de pago'><i class='fa fa-print'></i></button>"}
   
        ],
        
      "language":idioma_espanol,
      select: true
      
  });
  document.getElementById("tabla_ingresos_filter").style.display="none";
  $('input.global_filter').on( 'keyup click', function () {
       filterGlobal();
   } );
   $('input.column_filter').on( 'keyup click',function(){
       filterColumn( $(this).parents('tr').attr('data-column') );
   });
  }
  function filterGlobal(){
    $('#tabla_ingresos').DataTable().search(
        $('#global_filter').val(),
    ).draw();
  }
  function listar_ingresos_busqueda(){
    lista_total_fechas();
    listar_diferencia();
    var finicio=$("#txtfechainicio").val();
    var ffin=$("#txtfechafin").val();
    tableingresos = $("#tabla_ingresos").DataTable({
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
        "url":"../controlador/ingresos/controlador_ingreso_por_fechas_listar.php",
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
      return  "INGRESOS"
    },
      title: function() {
        return  "INGRESOS" }

  },
  {
    extend:    'pdfHtml5',
    text:      '<i class="fas fa-file-pdf"></i> ',
    titleAttr: 'Exportar a PDF',
    filename: function() {
      return  "INGRESOS"
    },
  title: function() {
    return  "INGRESOS"
  }
},
  {
    extend:    'print',
    text:      '<i class="fa fa-print"></i> ',
    titleAttr: 'Imprimir',
    
  title: function() {
    return  "INGRESOS"

  }
  }],
  "columns":[
    {"data":"Posicion"},
    {"data":"paciente"},
    {"data":"fecha"},
    {"data":"monto",
    render: function (datatotal, type, row ) {
          return "<b>"+datatotal+"</b>";               
     
    }
  },          {"defaultContent":"<button style='font-size:13px;' type='button' class='imprimir btn btn-warning btn-sm' title='Imprimir boleta de pago'><i class='fa fa-print'></i></button>"}

  ],

    "language":idioma_espanol,
    select: true
});
document.getElementById("tabla_ingresos_filter").style.display="none";
$('input.global_filter').on( 'keyup click', function () {
     filterGlobal();
 } );
 $('input.column_filter').on( 'keyup click',function(){
     filterColumn( $(this).parents('tr').attr('data-column') );
 });
}

//////////////////////////////////////////////////////////////////////
$('#tabla_ingresos').on('click','.imprimir',function(){
  var data = tableingresos.row($(this).parents('tr')).data();
  if(tableingresos.row(this).child.isShown()){
      var data = tableingresos.row(this).data();
  }
  window.open("../vista/libreporte/reportes/generar_boucher.php?id="+parseInt(data.id_pago)
  +"#zoom=100%","Boucher","scrollbars=NO");

})
  var tabletotal;
function lista_ingresos_total(){
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
          "url":"../controlador/ingresos/controlador_ingresos_total.php",
          type:'POST',
          
      },
      "columns":[
        {"data":"total",
        render: function (datatotal, type, row ) {
              return "<b>"+datatotal+"</b>";               
         
        }
      },        ],
        
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
        "url":"../controlador/ingresos/controlador_ingresos_total_x_fechas.php",
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
      },      ],
      
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
function Total_ingresos(){
  $.ajax({
    "url":"../controlador/ingresos/controlador_total_ingresos.php",
        type:'POST'
      }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena="";
      if(data.length>0){
        $("#totalingresos").html(data[0][0]);
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