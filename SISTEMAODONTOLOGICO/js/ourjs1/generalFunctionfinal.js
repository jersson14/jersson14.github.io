function CargarOdontogramaDeDiagnosticofinal(){
          
    //alert("Seee");
     $.ajax({ 
                 type:'POST',
                 url:'../vista/listarOdontogramaDeDiagnosticofinal.php',
                 //data:('idServicio='+idServicio), //Opcional
                 success:function(mensaje){
  
                       //alert(mensaje);
                           
                                  $('#odontogramafinal').html(mensaje);     
                               
                             }
             })
  
            
  
  } 
  //---  Esta función lee la imagen y la pasa a la función Cargartabla() --------------------------
  function cargarSimbolosFinal(){
      let cont = 0;
      //alert(cont);
      $("#opcionesfinal").on("click", "img", function(){
          if(cont==0){    
          
              let imagen = $(this).attr("src");  //rutade imagen        
              cont++;
              //alert(imagen);
                //Si las imagenes que vienen son las siguientes, las guardamos de una en la tablabla tbl_auxiliar  
                if(imagen === "../img/simbolos1/check.png"){
                  imagen = "../img/opciones1/procedimientoRealizado.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones
                  //alert(imagen);
                  GuardaNombreDeSimbolo(imagen)
             }else{
              if(imagen === "../img/simbolos1/cuadradoAzul.png"){
                 imagen = "../img/opciones1/protesisremovible.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones
                 GuardaNombreDeSimbolo(imagen)
                 //alert(imagen);
            }else{
               if(imagen === "../img/simbolos1/NAzul.png"){
                  imagen = "../img/opciones1/nucleoEnBuenEstado.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones
                  GuardaNombreDeSimbolo(imagen)
                  //alert(imagen);
             }else{
              if(imagen === "../img/simbolos1/protesistotal.png"){
                 imagen = "../img/opciones1/protesistotales.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones
                 GuardaNombreDeSimbolo(imagen)
                 //alert(imagen);
            }else{
              if(imagen === "../img/simbolos1/extruida.png"){
                 imagen = "../img/opciones1/extruidas.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones
                 GuardaNombreDeSimbolo(imagen)
                 //alert(imagen);
            }else{
              if(imagen === "../img/simbolos1/intruida.png"){
                 imagen = "../img/opciones1/intruidas.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones
                 GuardaNombreDeSimbolo(imagen)
                 //alert(imagen);
            }else{
              if(imagen === "../img/simbolos1/microdoncia.png"){
                 imagen = "../img/opciones1/microdoncias.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones
                 GuardaNombreDeSimbolo(imagen)
                 //alert(imagen);
            }else{
                  if(imagen === "../img/simbolos1/Nroja.png"){
                  imagen = "../img/opciones1/nucleoEnMalEstado.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones    
                  GuardaNombreDeSimbolo(imagen)
                  //alert(imagen);
             }else{
              if(imagen === "../img/simbolos1/superficiedesgastada.png"){
              imagen = "../img/opciones1/superficiedesgastadas.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones    
              GuardaNombreDeSimbolo(imagen)
              //alert(imagen);
         }
             else{
              if(imagen === "../img/simbolos1/impactacion.png"){
              imagen = "../img/opciones1/impactaciones.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones    
              GuardaNombreDeSimbolo(imagen)
              //alert(imagen);
         }else{
              if(imagen === "../img/simbolos1/extopica.png"){
              imagen = "../img/opciones1/piezadentariaectopica.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones    
              GuardaNombreDeSimbolo(imagen)
              //alert(imagen);
         }
         else{
          if(imagen === "../img/simbolos1/remanenteradi.png"){
          imagen = "../img/opciones1/remanenteradicular.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones    
          GuardaNombreDeSimbolo(imagen)
          //alert(imagen);
     }else{
      if(imagen === "../img/simbolos1/implanteden.png"){
      imagen = "../img/opciones1/implantedental.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones    
      GuardaNombreDeSimbolo(imagen)
      //alert(imagen);
  }
         else{
          if(imagen === "../img/simbolos1/macrodoncia.png"){
          imagen = "../img/opciones1/macrodoncias.png"; //Debemos cambiar el nombre de la imagen por el que está en la carpeta opciones    
          GuardaNombreDeSimbolo(imagen)
          //alert(imagen);
     }else{
                      Cargartabla(imagen);// pasamos la imagen para que sea guardada
                      //alert(imagen);
             }
            }
          }
        }
        }
             }
             
            }
          }
        }
          }
        }
            }
             }
            }
          }
      })
  }
  
  
  function GuardaNombreDeSimbolo(n){ 
       
      //La variable n me sirve para verificar si se ha presionado una imagen diferente a 
       // check.png, circulorojo.png, circuloazul.png, NRoja.png y NAzul.png, las cuales no despliegan submenu
       //alert(n)
  
       if(n != 0){
  
           //alert("La imagen es:" + imagen);
           $('#tablaSimbolosfinal').empty();
            
            $.ajax({
                     type:'POST',
                     url:'../ajax/actualizarSimbolofinal.ajax.php',
                     data:('imgSimbolo='+n),
                     //x
  
                     success:function(dato){
                               //alert(dato);
                                
                         }
                  })
  
          }
          let cont = 0;// Contador para  evitar que se dispare el evento click varias veces de la funcion on()
          $("#tablaSimbolosfinal").on("click", "img", function(){
          
            if(cont==0){ // contador para que el evento on no se dispare varias veces
                  let imagenSimbolo = $(this).attr("src"); 
                 //alert(imagenSimbolo);
                 cont++; // Contador de eventos click
  
                    $.ajax({
                            type:'POST',
                            url:'../ajax/actualizarSimbolofinal.ajax.php',
                            data:('imgSimbolo='+imagenSimbolo),
  
                            success:function(dato){
                                      //alert(dato);
                                          /*if(mensaje != ""){
                                                        
                                                 $('#tablaSimbolos').html(mensaje); 
                                                      
                                              }*/
                                            }
                         })
  
                 //ActualizaSimbolo(imagenSimbolo); // Se pasa la variable imagenSimbolo, que guarda la ruta de la imagen a... 
                 //la funcion  ActualizaSimbolo()
                 //alert(imagenSimbolo);
             }
                
          })
  }
  //------------------------------------------------------
  function  Cargartabla(imagen){  
                  
      //alert("Imagen recibida" + imagen);
  
      //let imagen = "../img/cuadradoRojo.png";
  
              $.ajax({
                  type:'POST',
                  url:'../vista/simbolosfinal.php',
                  data:('imagen='+imagen), 
                  success:function(mensaje){
              
                  //alert(mensaje);
                     if(mensaje != ""){
                                  
                              $('#tablaSimbolosfinal').html(mensaje); 
                                  
                          }
                      }
                    })
  
  }
  
  
  //-----------------------------------------------------------------------------------------------------------------
  function ConsultarSimbologia(){ //Esta funcion se encuentra en el documento cargarNumreos.php y es llamada cuando se da clic a cualquier simbolo de la grilla
          
    //alert("Funciona perfectamente");
    
  let cont = 0;
  
  $(document).on("click", "img", function(){//se detecta  en que imagen se hace click y se extrae el id y la ruta
   
   //let imagenSimbolo = $(this).attr("src"); 
  
   //alert(imagenSimbolo);
  
    if(cont==0){ // contador para que el evento on no se dispare varias veces
         let imagen = $(this).attr("src");  //ruta de imagen
         let idImg =  $(this).attr("id"); // id de Imagen seleccionada
         let col =  $(this).attr("alt"); 
         cont++; // Contador de eventos click
         //alert(imagen); 
         //alert(idImg); 
         //alert(col); 
         
        
         
          cambiarImagen(imagen, idImg, col);// pasamos ruta, id y columna de imagen a la funciòn, para que se realice el cambio
    }
        
  })
  }
  //FUNCIÓN QUE PERMITE EL CAMBIO DE IMAGENES EN EL ODONTOGRAMA
  
  function cambiarImagen(imagen, idImg, col){ //Esta funcion envia estos parametros a al  documento cambiarImagen.ajax.php             
            
    //alert(imagen);
    //alert(idImg);
    //alert("col="+ col);
    //alert(imagenSimbolo + "grilla");
     
        
  $.ajax({
             type:'POST',
             url:'../ajax/cambiarImagenfinal.ajax.php',
             data:('imagen='+imagen+'&idImg='+idImg+'&col='+col), //
  
             success:function(respuesta)
                {
                    //alert(respuesta);
  
                     //Mandamos a actualizar el monitor en cero (tabla tbl_monitor)
                    let monitor = 1;
                    actualizaMonitor(monitor);
  
                    CargarOdontogramaDeDiagnosticofinal();
                }
  
      })
    
   
  }
  
   /***************************************************************
     ACTUALIZA MONITOR EN CERO
   ***************************************************************/   
     function actualizaMonitor(monitor){
     
      //alert(monitor);
       
     $.ajax({
                   type:'POST',
                   url:'../ajax/actualizaMonitorfinal.ajax.php',
                   data:('monitor='+monitor), 
  
                   success:function(dato){
  
  
                          //alert(dato);
  
                    /*swal({
                             type: "success",
                             title: "Monitor actualizado",
                             showConfirmButton: true,
                             confirmButtonText: "Cerrar"
                     })*/
  
                  }
  
               })
  
  
  }
  
   /***************************************************************
     NUEVO ODONTOGRAMA
   ***************************************************************/   
  
     function nuevoOdontograma(){
  
      //alert("nuevo odontograma");
  
       let nuevo = $(this).attr("nuevo");
  
       $.ajax({
              type:'POST',
              url:'../ajax/nuevoOdontogramafinal.ajax.php',
              data:('nuevo='+nuevo), 
  
              success:function(respuesta){
               
              //alert(respuesta);
                    
                 if(respuesta == "ok"){   
                    
                    //alert("La respuesta es un si");
                     // Aqui hacemos el llamado al modelo que va a llenar la tabla con las nuevas imagenes
               
                   $.ajax({
                            type:'POST',
                            url:'../ajax/actualizaGrillaOdontogramafinal.ajax.php',
                            data:('nuevo='+nuevo), 
  
                            success:function(respuesta){
                                  
                                  //alert(respuesta);
  
                                   CargarOdontogramaDeDiagnosticofinal();// Llamamos a esta función para que actualice la grilla
                                   
                                   //Mandamos a actualiza el monitor en cero (tabla tbl_monitor)
                                   let monitor = 0;
                                   actualizaMonitor(monitor);
  
                           }
  
                        })
  
              //-----------------------------------------------------------------------------------  
  
  
                    
                                 
                   }
  
                }
  
          })
  }
  
  
  function guardarOdontograma(){
  
    //alert("Guardado odontograma");
   var consulta_id = $("input#txtid_consulta").val();
   var especificaciones =$('textarea#especificaciones').val();
   var observaciones = $("textarea#observaciones").val();
   //alert(consulta_id);
  
  $.ajax({
           type:'POST',
           url:'../ajax/consultarMonitorfinal.ajax.php',
           //dataType: "json",
           
  
           success:function(dato){
            
              //alert(dato);
                if(dato == 0){
                  Swal.fire("Mensaje De Error","Debe rellenar el odontograma","error");
                 
  
                }else{
  
                   
                   
                    //------------------------------------------------------------------
  
                        $.ajax({
                                type:'POST',
                                url:'../ajax/guardarOdontogramafinal.ajax.php',
                                data:(
                                       'guardar='+guardar+
                                       '&consulta_id='+consulta_id+
                                       '&especificaciones='+especificaciones+
                                       '&observaciones='+observaciones
  
  
                                      ), 
  
                                success:function(respuesta){
                                 
                                 //alert(respuesta);
                                      
                                    if(respuesta == 1){   
                                      Swal.fire("Mensaje De Confirmación","Odontograma guardado correctamente","success");
                                         
                                         // Realizamos el llamado a la funcion cargarOdontogramaDeDiagnostico() para que deje
                                         //la grilla lista
                                         CargarOdontogramaDeDiagnosticofinal();
  
                                         //Actualizamos monitor
                                         let monitor = 0;
                                         actualizaMonitor(monitor);
                                  
  
                                     }else{
                                       if(respuesta == 2)
                                       {
                                        Swal.fire("Mensaje De Error","No se pudo guardar, la consulta no se encuentra registrada","error");
  
       
                                       }else{
                                             if(respuesta == 3)
                                               {
                                                Swal.fire("Mensaje De Error","Los datos de la consulta del paciente no debe ir vacia","error");
  
                                               }
  
                                            }
                                     }
  
                                  }
  
                            })
  
                    //-----------------------------------------------------------------
                }
  
             }
  
       })
  
  
  
  }
  /***************************************************************
     ALERTAS
   ***************************************************************/   
     function swalert(mensaje, tipoDato){
    
      swal.fire({
              type: tipoDato,
              title: mensaje,
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
       })
   }
   