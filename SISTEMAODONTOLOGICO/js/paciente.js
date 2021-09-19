var tablapaciente;
function listar_paciente(){
      tablapaciente = $("#tabla_paciente").DataTable({
      "ordering":false,
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 5,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/paciente/controlador_paciente_listar.php",
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
      return  "LISTA DE PACIENTES"
    },
      title: function() {
        return  "LISTA DE PACIENTES" }

  },
  {
    extend:    'pdfHtml5',
    text:      '<i class="fas fa-file-pdf"></i> ',
    titleAttr: 'Exportar a PDF',
    filename: function() {
      return  "LISTA DE PACIENTES"
    },
  title: function() {
    return  "LISTA DE PACIENTES"
  }
},
  {
    extend:    'print',
    text:      '<i class="fa fa-print"></i> ',
    titleAttr: 'Imprimir',
    
  title: function() {
    return  "LISTA DE PACIENTES"

  }
  }],
      "columns":[
          {"data":"Posicion"},
          {"data":"dni_paci"},
          {"data":"Paciente"},
          {"data":"sexo_paci"},
          {"data":"celular_paci"},
          {"data":"direccion_paci"},
          {"data":"estado",
            render: function (data, type, row ) {
              if(data=='SI'){
                  return "<span class='badge badge-success'>"+data+"</span>";                              
              }else{
                return "<span class='badge badge-danger'>"+data+"</span>";                 
              }
            }
          },
          {"data":"estado",
            render: function (data, type, row ) {
              if(data=='SI'){
                  return "<button style='font-size:13px;' type='button' title='Llenar historia' id='historia' hidden class='historia btn btn-primary btn-sm'><i class='fas fa-file-medical'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar paciente'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;'title='Eliminar paciente' type='button' id='desactivar' class='desac btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>";                              
              }else{
                  return "<button style='font-size:13px;' type='button' title='Llenar historia' id='historia' class='historia btn btn-primary btn-sm'><i class='fas fa-file-medical'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar paciente'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;'title='Eliminar paciente' type='button' id='desactivar' class='desac btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>";
              }
            }
          },
        ],

      "language":idioma_espanol,
      select: true
  });
  document.getElementById("tabla_paciente_filter").style.display="none";
  $('input.global_filter').on('keyup click', function () {
       filterGlobal();
   } );
   $('input.column_filter').on( 'keyup click',function(){
       filterColumn( $(this).parents('tr').attr('data-column') );
   });

}
function filterGlobal(){
    $('#tabla_paciente').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
function AbrirModalRegistro(){
    $('#modal_registro').modal({backdrop:'static',keyboard:false})
    $('#modal_registro').modal('show');
}
function LimpiarRegistro(){
    $('#dni').val("");
    $('#nombres').val("");
    $('#apellidos').val("");
    $('#fechanacimiento').val("");
    $('#celular').val("");
    $('#direccion').val("");
}
$('#tabla_paciente').on('click','.editar',function(){
    var data = tablapaciente.row($(this).parents('tr')).data();
    if(tablapaciente.row(this).child.isShown()){//es para buscar en tamaño responsivo
        var data = tablapaciente.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false});
    $("#modal_editar").modal('show');
    $("#txtidpaciente").val(data.paciente_id);
    $("#dni_editar_actual").val(data.dni_paci);
    $("#dni_editar").val(data.dni_paci);
    $("#nombres_editar").val(data.nombres_paci);
    $("#apellidos_editar").val(data.apellidos_paci );
    $("#sexo_editar").val(data.sexo_paci);
    $("#fechanacimiento_editar").val(data.fecha_nacimiento);
    $("#lugarnacimiento_editar").val(data.lugar_nacimiento);
    $("#celular_editar").val(data.celular_paci);
    $("#direccion_editar").val(data.direccion_paci);

    })

    $('#tabla_paciente').on('click','.historia',function(){
        var data = tablapaciente.row($(this).parents('tr')).data();
        if(tablapaciente.row(this).child.isShown()){
        var data = tablapaciente.row(this).data();
    }
        cargar_contenido('contenido_principal','historial/registro_historia_clinica.php');
        $("#txtid_paciente").val(data.historia_id);
        $("#txt_paciente").val(data.paciente);
        $("#txt_dni").val(data.dni_paci);
        })
    

function Registro_Paciente(){
    var dni=$('#dni').val();
    var nombres=$('#nombres').val();
    var apellidos=$('#apellidos').val();
    var sexo=$('#sexo').val();
    var fechanacimiento=$('#fechanacimiento').val();
    var lugar_nacimiento=$('#lugarnacimiento').val();
    var celular=$('#celular').val();
    var direccion=$('#direccion').val();
    if(dni.length==0  || nombres.length==0||apellidos.length==0|| sexo.length==0||fechanacimiento.length==0 || celular.length==0 || direccion.length==0||lugar_nacimiento.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../controlador/paciente/controlador_paciente_registrar.php",
        type:'POST',
        data:{
            dni:dni,
            nombres:nombres,
            apellidos:apellidos,
            sexo:sexo,
            fechanacimiento:fechanacimiento,
            lugar_nacimiento:lugar_nacimiento,
            celular:celular,
            direccion:direccion

        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                $("#modal_registro").modal('hide');
                listar_paciente();
                return Swal.fire("Mensaje De Confirmación","Datos correctamente, Nuevo paciente registrado","success").then((value)=>{
                LimpiarRegistro();
                tablapaciente.ajax.reload();
                })
            }else{
                return Swal.fire("Mensaje De Advertencia","Lo sentimos, este paciente ya se encuentra registrado en la base de datos","warning");

            }
            
        }
        else{
            return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar el registro","error");
        }
        
    })  
}
function Modificar_Paciente(){
    var idpaciente=$('#txtidpaciente').val();
    var dniactual=$('#dni_editar_actual').val();
    var dni=$('#dni_editar').val();
    var nombres=$('#nombres_editar').val();
    var apellidos=$('#apellidos_editar').val();
    var sexo=$('#sexo_editar').val();
    var fechanacimiento=$('#fechanacimiento_editar').val();
    var lugar_nacimiento=$('#lugarnacimiento_editar').val();
    var celular=$('#celular_editar').val();
    var direccion=$('#direccion_editar').val();
    if(idpaciente.length==0||dni.length==0  || nombres.length==0||apellidos.length==0|| sexo.length==0||fechanacimiento.length==0 || celular.length==0 || direccion.length==0 || lugar_nacimiento.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    $.ajax({
        "url":"../controlador/paciente/controlador_paciente_modificar.php",
        type:'POST',
        data:{
            idpaciente:idpaciente,
            dniactual:dniactual,
            dni:dni,
            nombres:nombres,
            apellidos:apellidos,
            sexo:sexo,
            fechanacimiento:fechanacimiento,
            lugar_nacimiento:lugar_nacimiento,
            celular:celular,
            direccion:direccion

        }
    }).done(function(resp){
        alert(resp);
        if(resp>0){
            if(resp==1){
                $("#modal_editar").modal('hide');
                listar_paciente();
                return Swal.fire("Mensaje De Confirmación","Datos Actualizados correctamente","success").then((value)=>{
                table.ajax.reload();
                })
            }else if(resp==2){
                return Swal.fire("Mensaje De Advertencia","Lo sentimos, el DNI ya se encuentra registrado en la base de datos","warning");

            }
        }
        
        else{
            return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar la actualización","error");
        }
        
    })   
}
function Eliminar_Paciente(idpaciente){
    $.ajax({
        "url":"../controlador/paciente/controlador_eliminar_paciente.php",
        type:'POST',
        data:{
            idpaciente:idpaciente,
        }
    }).done(function(resp){
        if(resp>0){
            Swal.fire("Mensaje De Confirmacion","El paciente se elimino con exito","success")            
            .then ( ( value ) =>  {
                tablapaciente.ajax.reload();
            }); 
        }
        else{
            Swal.fire("Mensaje De Error","No se puede eliminar el paciente, tiene su historia clínica registrada","error");
        }
    })


}

$('#tabla_paciente').on('click','.desac',function(){
    var data = tablapaciente.row($(this).parents('tr')).data();
    if(tablapaciente.row(this).child.isShown()){
        var data = tablapaciente.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de eliminar al paciente?',
        text: "No podra revertir esto",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
            Eliminar_Paciente(data.paciente_id);
        }else{
            Swal.fire("Cancelado","El paciente no se elimino","error");
        }  
             
    })
})
function Total_pacientes(){
    $.ajax({
      "url":"../controlador/paciente/controlador_total_pacientes.php",
          type:'POST'
        }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
          $("#totalpacientes").html(data[0][0]);
        }
        else{
            return Swal.fire("Mensaje de Error","No se pudo traer el tratamiento","error");
        }
    })
  }