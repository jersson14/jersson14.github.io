var tablatratamiento;
function listar_tratamiento(){
    tablatratamiento = $("#tabla_tratamiento").DataTable({
      "ordering":false,   
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 5,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/tratamiento/controlador_tratamiento_listar.php",
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
      return  "TRATAMIENTOS"
    },
      title: function() {
        return  "TRATAMIENTOS" }

  },
  {
    extend:    'pdfHtml5',
    text:      '<i class="fas fa-file-pdf"></i> ',
    titleAttr: 'Exportar a PDF',
    filename: function() {
      return  "TRATAMIENTOS"
    },
  title: function() {
    return  "TRATAMIENTOS"
  }
},
  {
    extend:    'print',
    text:      '<i class="fa fa-print"></i> ',
    titleAttr: 'Imprimir',
    
  title: function() {
    return  "TRATAMIENTOS"

  }
  }],
      "columns":[
          {"data":"Posicion"},
          {"data":"nombre_trata"},
          {"data":"descripcion_trata"},
          {"data":"nombre_servi"},
          {"data":"tarifa"},
          {"data":"estado_trata",
            render: function (data, type, row ) {
              if(data=='ACTIVO'){
                  return "<span class='badge badge-success'>"+data+"</span>";             
              }else{
                return "<span class='badge badge-danger'>"+data+"</span>";                 
              }
            }
          },  
          {"data":"estado_trata",
          render: function (data, type, row ) {
            if(data=='ACTIVO'){
              return "<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar tratamiento'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;'title='Desactivar tratamiento' type='button' id='desactivar' class='desac btn btn-danger btn-sm'><i class='fas fa-minus-circle'></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Activar tratamiento' id='activar' hidden disabled class='activar btn btn-success btn-sm'><i class='fa fa-check'></i></button>";
     
            }else{
              return "<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar tratamiento'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;'title='Desactivar tratamiento' type='button' id='desactivar' hidden disabled class='desac btn btn-danger btn-sm'><i class='fas fa-minus-circle'></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Activar tratamiento' id='activar' class='activar btn btn-success btn-sm'><i class='fa fa-check'></i></button>";                 
            }
          }},        ],

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

}
function filterGlobal(){
    $('#tabla_tratamiento').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
function AbrirModalRegistro(){
    $('#modal_registro').modal({backdrop:'static',keyboard:false})
    $('#modal_registro').modal('show');
}
function listar_combo_tratamiento(){
    $.ajax({
        "url":"../controlador/tratamiento/controlador_como_tratamiento_listar.php",
          type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $('#cbm_especialidad').html(cadena);
            $('#cbm_especialidad_editar').html(cadena);
            
        }
        else{
            cadena+="<option value=''>No se encontraron regitros</option>";
            $('#cbm_especialidad').html(cadena);
            $('#cbm_especialidad_editar').html(cadena);
        }
    })
}
function Registrar_Tratamiento(){
    var tratamiento=$('#tratamiento').val();
    var descripcion=$('#descripcion').val();
    var especialidad=$('#cbm_especialidad').val();
    var precio=$('#precio').val();
    if(tratamiento.length==0  || descripcion.length==0  || especialidad.length==0 || precio.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../controlador/tratamiento/controlador_tratamiento_registrar.php",
        type:'POST',
        data:{
            tratamiento:tratamiento,
            descripcion:descripcion,
            especialidad:especialidad,
            precio:precio

        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                $("#modal_registro").modal('hide');
                listar_tratamiento();
                return Swal.fire("Mensaje De Confirmación","Datos correctamente, Nuevo tratamiento registrado","success").then((value)=>{
                LimpiarRegistro();
                tablatratamiento.ajax.reload();
                })
            }else{
                return Swal.fire("Mensaje De Advertencia","Lo sentimos, el tratamiento ya se encuentra en la base de datos","warning");

            }
            
        }
        else{
            return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar el registro","error");
        }
        
    })    
}
function LimpiarRegistro(){
    $('#tratamiento').val("");
    $('#descripcion').val("");
    $('#precio').val("");
}
$('#tabla_tratamiento').on('click','.editar',function(){
    var data = tablatratamiento.row($(this).parents('tr')).data();
    if(tablatratamiento.row(this).child.isShown()){
        var data = tablatratamiento.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false});
    $("#modal_editar").modal('show');
    $("#txtidtratamiento").val(data.tratamiento_id);
    $("#tratamiento_editar").val(data.nombre_trata);
    $("#descripcion_editar").val(data.descripcion_trata);
    $("#cbm_especialidad_editar").val(data.especialidad_id).trigger("change");
    $("#precio_editar").val(data.tarifa_trata);
})
function Modificar_Tratamiento(){
    var idtratamiento=$('#txtidtratamiento').val();
    var tratamiento=$('#tratamiento_editar').val();
    var descripcion=$('#descripcion_editar').val();
    var especialidad=$('#cbm_especialidad_editar').val();
    var precio=$('#precio_editar').val();
    if(idtratamiento.length==0||tratamiento.length==0 || descripcion.length==0||especialidad.length==0|| precio.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../controlador/tratamiento/controlador_tratamiento_modificar.php",
        type:'POST',
        data:{
            idtratamiento:idtratamiento,
            tratamiento:tratamiento,
            descripcion:descripcion,
            especialidad:especialidad,
            precio:precio

        }
    }).done(function(resp){
        if(resp>0){
                $("#modal_editar").modal('hide');
                listar_tratamiento();
                return Swal.fire("Mensaje De Confirmación","Datos Actualizados correctamente","success").then((value)=>{
                tablatratamiento.ajax.reload();
                })
        }
        
        else{
            return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar la actualización","error");
        }
        
    })   
}
function Modificar_Estatus(tratamiento_id,estatus){
    var mensaje ="";
    if(estatus=='INACTIVO'){
        mensaje="desactivo";
    }else{
        mensaje="activo";
    }
    $.ajax({
        "url":"../controlador/tratamiento/controlador_modificar_estatus_tratamiento.php",
        type:'POST',
        data:{
            tratamiento_id:tratamiento_id,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            listar_tratamiento();
            Swal.fire("Mensaje De Confirmacion","El tratamiento se "+mensaje+" con exito","success")            
            .then ( ( value ) =>  {
                tablatratamiento.ajax.reload();
            }); 
        }
    })
    }
    $('#tabla_tratamiento').on('click','.activar',function(){
        var data = tablatratamiento.row($(this).parents('tr')).data();
        if(tablatratamiento.row(this).child.isShown()){
            var data = tablatratamiento.row(this).data();
        }
        Swal.fire({
            title: 'Esta seguro de activar el tratamiento?',
            text: "Una vez hecho esto el tratamiento se podra registrar en otros formularios",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, activar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {
                Modificar_Estatus(data.tratamiento_id,'ACTIVO');
            }else{
                Swal.fire("Cancelado","El tratamiento no se activo","error");
            }  
            
          })
        })
    
    
        $('#tabla_tratamiento').on('click','.desac',function(){
        var data = tablatratamiento.row($(this).parents('tr')).data();
        if(tablatratamiento.row(this).child.isShown()){
            var data = tablatratamiento.row(this).data();
        }
        Swal.fire({
            title: 'Esta seguro de desactivar el tratamiento?',
            text: "Una vez hecho esto el tratamiento no se podra registrar en otros formularios",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, desactivar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {
                Modificar_Estatus(data.tratamiento_id,'INACTIVO');
            }else{
                Swal.fire("Cancelado","El tratamiento no se desactivo","error");
            }  
          })
     })