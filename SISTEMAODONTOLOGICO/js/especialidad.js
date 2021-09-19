var tablaespecialidad;
function listar_especialidad(){
    tablaespecialidad = $("#tabla_especialidad").DataTable({
      "ordering":false,   
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 5,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/especialidad/controlador_especialidad_listar.php",
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
      return  "ESPECIALIDADES"
    },
      title: function() {
        return  "ESPECIALIDADES" }

  },
  {
    extend:    'pdfHtml5',
    text:      '<i class="fas fa-file-pdf"></i> ',
    titleAttr: 'Exportar a PDF',
    filename: function() {
      return  "ESPECIALIDADES"
    },
  title: function() {
    return  "ESPECIALIDADES"
  }
},
  {
    extend:    'print',
    text:      '<i class="fa fa-print"></i> ',
    titleAttr: 'Imprimir',
    
  title: function() {
    return  "ESPECIALIDADES"

  }
  }],
      "order":[[1,'asc']],
      "columns":[
        {"data":"Posicion"},
        {"data":"nombre_servi"},
          {"data":"descripcion_servi"}, 
          {"data":"estatus_servi",
            render: function (data, type, row ) {
              if(data=='ACTIVO'){
                return "<span class='badge badge-success'>"+data+"</span>";
       
              }else{
                return "<span class='badge badge-danger'>"+data+"</span>";                 
              }
            }
          },
          {"data":"estatus_servi",
          render: function (data, type, row ) {
            if(data=='ACTIVO'){
              return "<button style='font-size:13px;' type='button' class='modificar btn btn-warning btn-sm' title='Editar especialidad'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;'title='Desactivar especialidad' type='button' id='desactivar' class='desac btn btn-danger btn-sm'><i class='fas fa-minus-circle'></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Activar especialidad' id='activar' hidden disabled class='activar btn btn-success btn-sm'><i class='fa fa-check'></i></button>";
     
            }else{
              return "<button style='font-size:13px;' type='button' class='modificar btn btn-warning btn-sm' title='Editar especialidad'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;'title='Desactivar especialidad' type='button' id='desactivar' hidden disabled class='desac btn btn-danger btn-sm'><i class='fas fa-minus-circle'></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Activar especialidad' id='activar' class='activar btn btn-success btn-sm'><i class='fa fa-check'></i></button>";                 
            }
          }},
        ],
        
      "language":idioma_espanol,
      select: true
  });
  $('#tabla_especialidad').on('click','.activar',function(){

    var data = tablaespecialidad.row($(this).parents('tr')).data();
    if(tablaespecialidad.row(this).child.isShown()){
        var data = tablaespecialidad.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de activar la especialidad?',
        text: "Una vez hecho esto la especialidad se podra registrar en otros formularios",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, activar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            Modificar_Estatus(data.servicio_id,'ACTIVO');
        }
      })
    })


    $('#tabla_especialidad').on('click','.desac',function(){
    var data = tablaespecialidad.row($(this).parents('tr')).data();
    if(tablaespecialidad.row(this).child.isShown()){
        var data = tablaespecialidad.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de desactivar la especialidad?',
        text: "Una vez hecho esto la especialidad no se podra registrar en otros formularios",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, desactivar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            Modificar_Estatus(data.servicio_id,'INACTIVO');
        }
      })
    })

    function Modificar_Estatus(servicio_id,estatus){
    var mensaje ="";
    if(estatus=='INACTIVO'){
        mensaje="desactivo";
    }else{
        mensaje="activo";
    }
    $.ajax({
        "url":"../controlador/especialidad/controlador_modificar_estatus_especialidad.php",
        type:'POST',
        data:{
            servicio_id:servicio_id,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            listar_especialidad();
            Swal.fire("Mensaje De Confirmacion","La especialidad se "+mensaje+" con exito","success")            
            .then ( ( value ) =>  {
                tablaespecialidad.ajax.reload();
            }); 
        }
    })
    }
  document.getElementById("tabla_especialidad_filter").style.display="none";
  $('input.global_filter').on('keyup click', function () {
       filterGlobal();
   } );
   $('input.column_filter').on('keyup click',function(){
       filterColumn( $(this).parents('tr').attr('data-column') );
   });
   function filterGlobal(){
    $('#tabla_especialidad').DataTable().search(
        $('#global_filter').val(),
    ).draw();
    }

   tablaespecialidad.on( 'draw.dt', function () {
    var PageInfo = $('#tabla_especialidad').DataTable().page.info();
    tablaespecialidad.column(0, { page: 'current' }).nodes().each( function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        } );
    } );
    }
    function AbrirModalRegistro(){
    $('#modal_registro').modal({backdrop:'static',keyboard:false})
    $('#modal_registro').modal('show');
    }
    function Registro_Especialidad(){
    var nombre=$('#especialidad').val();
    var descripcion=$('#descripcion').val();
    if(nombre.length==0  || descripcion.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../controlador/especialidad/controlador_especialidad_registrar.php",
        type:'POST',
        data:{
            nombre:nombre,
            descripcion:descripcion

        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                $("#modal_registro").modal('hide');
                listar_especialidad();
                return Swal.fire("Mensaje De Confirmación","Datos correctamente, Nueva especialidad registrada","success").then((value)=>{
                LimpiarRegistro();
                tablaespecialidad.ajax.reload();
                })
            }else{
                return Swal.fire("Mensaje De Advertencia","Lo sentimos, el nombre de la especialidad ya se encuentra en la base de datos","warning");

            }
            
        }
        else{
            return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar el registro","error");
        }
        
    })  
    }
    function LimpiarRegistro(){
    $('#especialidad').val("");
    $('#descripcion').val("");
    }
    $('#tabla_especialidad').on('click','.modificar',function(){
    var data = tablaespecialidad.row($(this).parents('tr')).data();
    if(tablaespecialidad.row(this).child.isShown()){//es para buscar en tamaño responsivo
        var data = tablaespecialidad.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#txtidespecialidad").val(data.servicio_id);
    $("#especialidad_editar").val(data.nombre_servi);
    $("#descripcion_editar").val(data.descripcion_servi);

    })

    function Modificar_Especialidad(){
    var idespecialidad=$('#txtidespecialidad').val();
    var nombre=$('#especialidad_editar').val();
    var descripcion=$('#descripcion_editar').val();
    if(idespecialidad.length==0 || nombre.length==0 || descripcion.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../controlador/especialidad/controlador_especialidad_modificar.php",
        type:'POST',
        data:{
            idespecialidad:idespecialidad,
            nombre:nombre,
            descripcion:descripcion

        }
    }).done(function(resp){
        if(resp>0){
                listar_especialidad();
                $("#modal_editar").modal('hide');
                return Swal.fire("Mensaje De Confirmación","Datos Actualizados correctamente","success").then((value)=>{
                tablaespecialidad.ajax.reload();
                
                })
        }
        else{
            return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar la actualización","error");
        }
        
    })   
}
