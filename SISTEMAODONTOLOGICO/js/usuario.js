function VerificarUsuario(){
    var usu = $("#txt_usu").val();
    var con = $("#txt_con").val();

    if(usu.length==0 || con.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    $.ajax({
        url:'../controlador/usuario/controlador_verificar_usuario.php',
        type:'POST',
        data:{
            user:usu,
            pass:con
        }
    }).done(function(resp){
        if(resp==0){
             Swal.fire("Mensaje De Error",'Usuario y/o contrase\u00f1a incorrecta',"error");
            $.ajax({
                url:'../controlador/usuario/controlador_intento_modificar.php',
                type:'POST',
                data:{
                    usuario:usu
                }
            }).done(function(resp){

                if(resp==2){
                    return Swal.fire("Mensaje de Advertencia","Usuario y/o contrase\u00f1a incorrecta, intentos fallidos: "+(parseInt(resp)+1)+" - Para poder acceder a su cuenta restablesca la contrase&#241;a","warning");

                }else{
                    return Swal.fire("Mensaje de Advertencia","Usuario y/o contrase\u00f1a incorrecta, intentos fallidos: "+(parseInt(resp)+1)+"","warning");

                }
            })
        }else{
            var data= JSON.parse(resp);
            if(data[0][6]=='INACTIVO'){
                return Swal.fire("Mensaje De Advertencia","Lo sentimos el usuario "+usu+" se encuentra suspendido, comuniquese con el administrador","warning");
            }
            if(data[0][7]==2){
                return Swal.fire("Mensaje de Advertencia","Su cuenta actualmente esta bloqueada, para desbloquear restablesca su contrase\u00f1a","warning");
            }
            $.ajax({
                url:'../controlador/usuario/controlador_crear_session.php',
                type:'POST',
                data:{
                    idusuario:data[0][0],
                    user:data[0][1],
                    rol:data[0][5]
                }
            }).done(function(resp){
                let timerInterval
                Swal.fire({
                title: 'BIENVENIDO AL SISTEMA',
                html: 'Usted sera redireccionado en <b></b> milisegundos.',
                icon: 'success',
                timer: 1200,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                    const content = Swal.getHtmlContainer()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                        b.textContent = Swal.getTimerLeft()
                        }
                    }
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    location.reload();
                }
                })
            })
        }
    })
}
var table;
function listar_usuario(){
      table = $("#tabla_usuario").DataTable({
      "ordering":false,   
      "bLengthChange":false,
      "searching": { "regex": false },
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
      "pageLength": 10,
      "destroy":true,
      "async": false ,
      "processing": true,
      "ajax":{
          "url":"../controlador/usuario/controlador_usuario_listar.php",
          type:'POST'
      },
      "columns":[
          {"data":"Posicion"},
          {"data":"usuario_usu"},
          {"data":"correo_usu"},
          {"data":"sexo_usu"},
          {"data":"nombre_tipo_usu"},
          {"data":"usu_status",
            render: function (data, type, row ) {
              if(data=='ACTIVO'){
                  return "<span class='badge badge-success'>"+data+"</span>";
                                   
              }else{
                return "<span class='badge badge-danger'>"+data+"</span>";                 
              }
            }
          },  
          {"data":"usu_status",
          render: function (data, type, row ) {
            if(data=='ACTIVO'){
              return "<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar usuario'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;'title='Desactivar usuario' type='button' id='desactivar' class='desac btn btn-danger btn-sm'><i class='fas fa-user-times'></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Activar usuario' id='activar' hidden disabled class='activar btn btn-success'><i class='fa fa-check'></i></button>";
     
            }else{
              return "<button style='font-size:13px;' type='button' class='editar btn btn-warning btn-sm' title='Editar usuario'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;'title='Desactivar usuario' type='button' id='desactivar' hidden disabled class='desac btn btn-danger btn-sm'><i class='fas fa-user-times'></i></button>&nbsp;<button style='font-size:13px;' type='button' title='Activar usuario' id='activar' class='activar btn btn-success'><i class='fa fa-check'></i></button>";                 
            }
          }},        ],

      "language":idioma_espanol,
      select: true
  });
  document.getElementById("tabla_usuario_filter").style.display="none";
  $('input.global_filter').on( 'keyup click', function () {
       filterGlobal();
   } );
   $('input.column_filter').on( 'keyup click',function(){
       filterColumn( $(this).parents('tr').attr('data-column') );
   });

}
$('#tabla_usuario').on('click','.activar',function(){
    var data = table.row($(this).parents('tr')).data();
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de activar al usuario?',
        text: "Una vez hecho esto el usuario tendra acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, activar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            Modificar_Estatus(data.usuario_id,'ACTIVO');
        }
      })
})


$('#tabla_usuario').on('click','.desac',function(){
    var data = table.row($(this).parents('tr')).data();
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de desactivar al usuario?',
        text: "Una vez hecho esto el usuario no tendra acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, desactivar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            Modificar_Estatus(data.usuario_id,'INACTIVO');
        }
      })
})

function Modificar_Estatus(idusuario,estatus){
    var mensaje ="";
    if(estatus=='INACTIVO'){
        mensaje="desactivo";
    }else{
        mensaje="activo";
    }
    $.ajax({
        "url":"../controlador/usuario/controlador_modificar_estatus_usuario.php",
        type:'POST',
        data:{
            idusuario:idusuario,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            Swal.fire("Mensaje De Confirmacion","El usuario se "+mensaje+" con exito","success")            
            .then ( ( value ) =>  {
                table.ajax.reload();
            }); 
        }
    })


}
function Eliminar_Usuario(idusuario){
    $.ajax({
        "url":"../controlador/usuario/controlador_eliminar_usuario.php",
        type:'POST',
        data:{
            idusuario:idusuario,
        }
    }).done(function(resp){
        if(resp>0){
            Swal.fire("Mensaje De Confirmacion","El usuario se elimino con exito","success")            
            .then ( ( value ) =>  {
                table.ajax.reload();
            }); 
        }
    })


}

$('#tabla_usuario').on('click','.editar',function(){
    var data = table.row($(this).parents('tr')).data();
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false});
    $("#modal_editar").modal('show');
    $("#txtidusuario").val(data.usuario_id);
    $("#usuarioactual").val(data.usuario_usu);
    $("#usuario_nuevo").val(data.usuario_usu);
    $("#correo_editar_actual").val(data.correo_usu);
    $("#correo_editar_nuevo").val(data.correo_usu);
    $("#sexo_editar1").val(data.sexo_usu).trigger("change");
    $("#cbm_rol_editar").val(data.id_tipo_usu).trigger("change");
})
function filterGlobal(){
    $('#tabla_usuario').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
function AbrirModalRegistro(){
    $('#modal_registro').modal({backdrop:'static',keyboard:false})
    $('#modal_registro').modal('show');
    $("·txt_email").focus();

}
function listar_combo_rol(){
    $.ajax({
        "url":"../controlador/usuario/controlador_combo_rol_listar.php",
          type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
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
function Registrar_Usuario(){
    var usuario=$('#usuario').val();
    var contrasena=$('#contraseña').val();
    var correo=$('#correo').val();
    var sexo=$('#sexo').val();
    var rol=$('#cbm_rol').val();
    var validaremail=$('#validar_email').val();
    if(usuario.length==0  || contraseña.length==0  || correo.length==0 ){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    if(validaremail=="incorrecto"){
        return Swal.fire("Mensaje De Advertencia","El formato del correo es incorrecto, ingrese un correo valido","warning");
    }
    $.ajax({
        "url":"../controlador/usuario/controlador_usuario_registrar.php",
        type:'POST',
        data:{
            usuario:usuario,
            contra:contrasena,
            correo:correo,
            sexo:sexo,
            rol:rol

        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                $("#modal_registro").modal('hide');
                return Swal.fire("Mensaje De Confirmación","Datos correctamente, Nuevo usuario registrado","success").then((value)=>{
                LimpiarRegistro();
                table.ajax.reload();
                })
            }else{
                return Swal.fire("Mensaje De Advertencia","Lo sentimos, el nombre de usuario o correo ya se encuentra en la base de datos","warning");
            }
            
        }
        else{
            return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar el registro","error");
        }
        
    })    
}
function Modificar_Usuario(){
    var idusuario=$('#txtidusuario').val();
    var usuarioactual=$('#usuarioactual').val();
    var usuarionuevo=$('#usuario_nuevo').val();
    var correoactual=$('#correo_editar_actual').val();
    var correonuevo=$('#correo_editar_nuevo').val();
    var sexo=$('#sexo_editar1').val();
    var rol=$('#cbm_rol_editar').val();
    var validaremail=$('#validar_email_editar').val();
    if(idusuario.length==0 || usuarioactual.length==0 ||usuarionuevo.length==0 || correoactual.length==0|| correonuevo.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    if(validaremail=="incorrecto"){
        return Swal.fire("Mensaje De Advertencia","El formato del correo es incorrecto, ingrese un correo valido","warning");
    }
    $.ajax({
        "url":"../controlador/usuario/controlador_usuario_modificar.php",
        type:'POST',
        data:{
            idusuario:idusuario,
            usuarioactual:usuarioactual,
            usuarionuevo:usuarionuevo,
            correoactual:correoactual,
            correonuevo:correonuevo,
            sexo:sexo,
            rol:rol

        }
    }).done(function(resp){    
        if(resp>0){
            if(resp==1){
                $("#modal_editar").modal('hide');
                listar_usuario();
                return Swal.fire("Mensaje De Confirmación","Datos Actualizados correctamente","success").then((value)=>{
                table.ajax.reload();
                })
            }else if(resp==2){
                return Swal.fire("Mensaje De Advertencia","Lo sentimos, el usuario o el correo que intenta ingresar ya se encuentra registrado en la base de datos","warning");

            }
        }
        
        else{
            return Swal.fire("Mensaje De Error","Lo sentimos, No se pudo completar la actualización","error");
        }
        
    })
}
function LimpiarRegistro(){
    $('#usuario').val("");
    $('#contraseña').val("");
    $('#correo').val("");
}
function TraerDatosUsuario(){
    var usuario = $("#usuarioprincipal").val();
    $.ajax({
        "url":"../controlador/usuario/controlador_traerdatos_usuario.php",
        type: 'POST',
        data:{
            usuario:usuario
        }
    }).done(function(resp){
        var data=JSON.parse(resp);
        if(data.length>0){
            $('#txtcontra_bd').val(data[0][2]);
            if(data[0][3]==="Masculino")
            {   
                $("#img_lateral").attr("src","../plantilla/dist/img/avatar5.png")
            }
            else{
                $("#img_lateral").attr("src","../plantilla/dist/img/avatar3.png")
            }
        }
    })
}  
function AbrirModalRestablecer(){
    $('#modal_restablecer_contra').modal({backdrop:'static',keyboard:false})
    $('#modal_restablecer_contra').modal('show');
    $('#modal_restablecer_contra').on('show.bs.modal',function(){
        $('#txt_email').focus();
    });
} 

function Restablecer_Contra(){
    var email=$('#txt_email').val();
    if(email.length==0)
    {
        return Swal.fire("Mensaje de Advertencia","Llene los campos vacios","warning");
    }
    var caracteres="abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMOPQRTUVWXYZ1234567890";
    var contrasena="";
    for(var i=0;i<6;i++){
        contrasena+=caracteres.charAt(Math.floor(Math.random()*caracteres.length));

    }
    $.ajax({
        url:'../controlador/usuario/controlador_restablecer_contra.php',
        type:'POST',
        data:{
            email:email,
            contrasena:contrasena
        }

    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                Swal.fire("Mensaje de Confirmaci&#243;n","Su contrase&#241;a fue restablecida con éxito al correo: "+email+"","success");
            }
            else{
                Swal.fire("Mensaje de Advertencia","El correo ingresado no se encuentra en nuestra base de datos","warning");

            }
        }
        else{
            Swal.fire("Mensaje de error","No se pudo restablecer su contrase&#241;a","error");
        }
    })
}
function AbrirModalEditarContra(){
    $('#modal_editar_contra').modal({backdrop:'static',keyboard:false})
    $('#modal_editar_contra').modal('show');
    $('#modal_editar_contra').on('shown.bs.modal',function(){
        $("#txtcontraactual").focus();
    })
}
function Editar_Contra(){
    var idusuario=$("#txtidprincipal").val();
    var contradb=$("#txtcontra_bd").val();
    var contraescrita=$("#txtcontraactual").val();
    var contranu=$("#txtcontranu_editar").val();
    var contrare=$("#txtcontrare_editar").val();
    if(contraescrita.length==0||contranu.length==0||contrare.length==0){
        return Swal.fire("Mensaje de Advertencia","Llene los campos vacios","warning");
    }
    if(contranu!=contrare){
        return Swal.fire("Mensaje de Advertencia","Debes ingresar la misma contraseña dos veces para confirmarla","warning");
    }
    $.ajax({
        url:'../controlador/usuario/controlador_modificar_contraseña_usuario.php',
        type:'POST',
        data:{
            idusuario:idusuario,
            contradb:contradb,
            contraescrita:contraescrita,
            contranu:contranu
        }
    }).done(function(resp){
        if(resp=>0){
            if(resp==1){
                $("#modal_editar_contra").modal('hide');
                LimpiarEditarContra();
                return Swal.fire("Mensaje De Confirmación","Contrase\u00f1a Actualizada Correctamente","success").then((value)=>{
                table.ajax.reload();
                TraerDatosUsuario();
                });
            }else{
                Swal.fire("Mensaje de Error","La contrase\u00f1a actual ingresada no coincide con la que tenemos en la base de datos","error");
            }
        }else{
         Swal.fire("Mensaje de Error","No se pudo actualizar la contrase\u00f1a","error");

        }
    })
}
function LimpiarEditarContra(){
    $("#txtcontraactual").val("");
    $("#txtcontranu_editar").val("");
    $("#txtcontrare_editar").val("");
}