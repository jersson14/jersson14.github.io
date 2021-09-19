var tablamedico;
function listar_doctor(){
    tablamedico = $("#tabla_doctor").DataTable({
      "ordering":false,
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 10,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/doctor/controlador_doctor_listar.php",
          type:'POST'
      },
      "columns":[
          {"data":"Posicion"},
          {"data":"medico_dni"},
          {"data":"COP"},
          {"data":"medico"},
          {"data":"medico_direccion"}, 
          {"data":"medico_celular"},
          {"data":"medico_sexo"},
          {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar usuario'><i class='fa fa-edit'></i></button>"}
        ],

      "language":idioma_espanol,
      select: true
  });
  document.getElementById("tabla_doctor_filter").style.display="none";
  $('input.global_filter').on('keyup click', function () {
       filterGlobal();
   } );
   $('input.column_filter').on( 'keyup click',function(){
       filterColumn( $(this).parents('tr').attr('data-column') );
   });

}
function filterGlobal(){
    $('#tabla_doctor').DataTable().search(
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
$('#tabla_doctor').on('click','.editar',function(){
    var data = tablamedico.row($(this).parents('tr')).data();
    if(tablamedico.row(this).child.isShown()){//es para buscar en tamaño responsivo
        var data = tablamedico.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false});
    $("#modal_editar").modal('show');
    $("#txt_iddoctor").val(data.medico_id);
    $("#dni_editar_actual").val(data.medico_dni);
    $("#dni_editar_nuevo").val(data.medico_dni);
    $("#nombres_editar").val(data.medico_nombre);
    $("#apellidos_editar").val(data.medico_apellidos);
    $("#sexo_editar").val(data.medico_sexo).trigger("change");
    $("#celular_editar").val(data.medico_celular);
    $("#direccion_editar").val(data.medico_direccion);
    $("#celular_editar").val(data.medico_celular);


    })

    function listar_combo_rol(){
        $.ajax({
            "url":"../controlador/usuario/controlador_combo_rol_listar.php",
              type:'POST'
        }).done(function(resp){
            var data = JSON.parse(resp);
            var cadena="";
            if(data.length>0){
                for(var i=0; i < data.length; i++){
                    if(data[i][0]=='2'){
                        cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                    }
                }
                $('#cbm_rol_editar').html(cadena);
                $('#cbm_rol').html(cadena);
                
            }
            else{
                cadena+="<option value=''>No se encontraron regitros</option>";
                $('#cbm_rol_editar').html(cadena);
                $('#cbm_rol').html(cadena);
            }
        })
    }
    function LimpiarRegistro(){
        $('#dni').val("");
        $('#nombres').val("");
        $('#apellidos').val("");
        $('#usuario').val("");
        $('#celular').val("");
        $('#direccion').val("");
        $('#email').val("");
        $('#contraseña').val("");
    }
    function Registro_Doctor(){
        var dni=$('#dni').val();
        var nombres=$('#nombres').val();
        var apellidos=$('#apellidos').val();
        var direccion=$('#direccion').val();
        var celular=$('#celular').val();
        var sexo=$('#sexo').val();
        var usuario=$('#usuario').val();
        var contraseña=$('#contraseña').val();
        var rol=$('#cbm_rol').val();
        var email=$('#email').val();
        var validademail=$("#validar_email").val();
        if(validademail=="incorrecto")
        {
            return Swal.fire("Mensaje De Advertencia","El email ingresado no tiene el formato correcto","warning");

        }
        if(dni.length==0  || nombres.length==0||apellidos.length==0|| sexo.length==0||
            celular.length==0 || direccion.length==0 || usuario.length==0||
            contraseña.length==0||rol.length==0||email.length==0){
            return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
        }
        $.ajax({
            "url":"../controlador/doctor/controlador_doctor_registrar.php",
            type:'POST',
            data:{
                dni:dni,
                nombres:nombres,
                apellidos:apellidos,
                direccion:direccion,
                celular:celular,
                sexo:sexo,
                usuario:usuario,
                contraseña:contraseña,
                rol:rol,
                email:email
    
            }
        }).done(function(resp){
            if(resp>0){
                if(resp==1){
                    $("#modal_registro").modal('hide');
                    listar_doctor();
                    return Swal.fire("Mensaje De Confirmación","Datos correctamente, Nuevo doctor registrado","success").then((value)=>{
                    LimpiarRegistro();
                    tablamedico.ajax.reload();
                    })
                }else{
                    return Swal.fire("Mensaje De Advertencia","Lo sentimos, puede que el DNI, usuario o correo ya se encuenten registrados en la base de datos por favor revise.","warning");
    
                }
                
            }
            else{
                return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar el registro","error");
            }
            
        })  
    }
    function Editar_Doctor(){
        var idmedico=$('#txt_iddoctor').val();
        var dni_actual=$('#dni_editar_actual').val();
        var dni_nuevo=$('#dni_editar_nuevo').val();
        var nombres=$('#nombres_editar').val();
        var apellidos=$('#apellidos_editar').val();
        var direccion=$('#direccion_editar').val();
        var celular=$('#celular_editar').val();
        var sexo=$('#sexo_editar').val();
        if(idmedico.length==0|| dni_actual.length==0  ||dni_nuevo.length==0  || nombres.length==0||apellidos.length==0|| sexo.length==0||
            celular.length==0 || direccion.length==0){
            return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
        }
        $.ajax({
            "url":"../controlador/doctor/controlador_doctor_editar.php",
            type:'POST',
            data:{
                idmedico:idmedico,
                dni_actual:dni_actual,
                dni_nuevo:dni_nuevo,
                nombres:nombres,
                apellidos:apellidos,
                direccion:direccion,
                celular:celular,
                sexo:sexo
    
            }
        }).done(function(resp){
            if(resp>0){
                if(resp==1){
                    $("#modal_editar").modal('hide');
                    listar_doctor();
                    return Swal.fire("Mensaje De Confirmación","Se actualizo correctamento los datos, Datos actualizados","success").then((value)=>{
                    tablamedico.ajax.reload();
                    })
                }else{
                    return Swal.fire("Mensaje De Advertencia","Lo sentimos, el DNI del médico ya se encuenten registrado en la base de datos por favor revise.","warning");
    
                }
                
            }
            else{
                return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar la actualización","error");
            }
            
        })  
    }