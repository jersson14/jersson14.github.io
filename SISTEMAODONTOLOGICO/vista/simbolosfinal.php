<?php
          require_once "../modelo/nuevaConexionfinal.php";



          $imagen = $_POST['imagen'];//ruta y nombre de imagen recibida
  
 
 //**********************************************************************************************// 
//  SE VERIFICA CUAL IMAGEN SE HA SELECCIONADO PARA SER PROCESADA EN EL SWICH
//**********************************************************************************************// 


          switch ($imagen) {// Recbimos la imagen a la que se le ha dado click en la tabla de opciones
            case '../img/simbolos1/cuadradoRojo.png':
                  $codigoImagen = 1;
              break;

            case '../img/simbolos1/cuadradoAzul.png':
                  $codigoImagen = 2;
              break;  

            case '../img/simbolos1/rayitaAzul.png':
                  $codigoImagen = 3;
              break; 

            case '../img/simbolos1/cruzRoja.png':
                  $codigoImagen = 4;
              break; 

            case '../img/simbolos1/rayitaAzulHorizontal.png':
                  $codigoImagen = 5;
              break;  

             case '../img/simbolos1/semiCirculo.png':
                  $codigoImagen = 6;
              break;  
 
              case '../img/simbolos1/sRojal.png':
                  $codigoImagen = 7;
              break; 

              case '../img/simbolos1/sAzul.png':
                  $codigoImagen = 8;
              break;

              case '../img/simbolos1/trianguloRojo.png':
                  $codigoImagen = 9;
              break;

              case '../img/simbolos1/trianguloAzul.png':
                  $codigoImagen = 10;
              break;

              case '../img/simbolos1/pRoja.png':
                  $codigoImagen = 11;
              break;

              case '../img/simbolos1/pAzul.png':
                  $codigoImagen = 12;
              break;

              case '../img/simbolos1/check.png':
                  $codigoImagen = 15;
              break;

              case '../img/simbolos1/Nroja.png':
                  $codigoImagen = 16;
              break;

              case '../img/simbolos1/NAzul.png':
                  $codigoImagen = 17;
              break;
              case '../img/simbolos1/protesistotal.png':
                $codigoImagen = 18;
            break;

            case '../img/simbolos1/tratamientopulpar.png':
                $codigoImagen = 19;
            break;
            case '../img/simbolos1/erupcion.png':
                $codigoImagen = 20;
            break;
            case '../img/simbolos1/extruida.png':
                $codigoImagen = 19;
            break;
            case '../img/simbolos1/intruida.png':
                $codigoImagen = 20;
            break;
            case '../img/simbolos1/giroversion.png':
                $codigoImagen = 21;
            break;
            case '../img/simbolos1/transposicion.png':
                $codigoImagen = 22;
            break;
            case '../img/simbolos1/circuloRojo.png':
                $codigoImagen = 23;
            break;
            case '../img/simbolos1/circuloAzul.png':
                $codigoImagen = 24;
            break;
            case '../img/simbolos1/dde.png':
                $codigoImagen = 25;
            break;
            case '../img/simbolos1/posiciondentaria.png':
                $codigoImagen = 26;
            break;
            case '../img/simbolos1/movilidadpato.png':
                $codigoImagen = 27;
            break;
            case '../img/simbolos1/migracion.png':
                $codigoImagen = 28;
            break;

            
            default:
              # code...
              break;
          }
      
          $sql = 'SELECT * FROM tbl_simbologiafinal WHERE  idRegistroImg = "'.$codigoImagen.'" ORDER BY idRegistroImg ASC  ';
          $sentencia = $pdo->prepare($sql);
          $sentencia->execute();
          $resultado = $sentencia->fetchAll();
          $registros_db = $sentencia->rowcount();
?>
 <div class="row">
    <div class="col espacio-1 "> &nbsp </div>     
  </div>


<!-- Inicio de la card     -->
<div class="card-success ">
   <h5 class="card-header">Opciones</h5>
       <div class="row">
                <div class="col espacio-1 "> &nbsp </div>     
        </div>

    <?php  foreach($resultado as $imagen): //Recorremos los registros   

     ?>
      <!-- primera fila -->
    <div class="container">
    <div class="row">
                
        

                <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1     ">
 
                 <a  ><img class="pointer"  src="<?php  echo $imagen["imagen1"];?>"  onmouseover="this.width=43;this.height=62;" onmouseout="this.width=48;this.height=65;" alt="<?php  echo $imagen["imagen1"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65" ></a>
                </div>
 
                <div  id="colum-1-izquierda" class="col-12 col-sm-1 col-md-1  col-lg-1 col-xl-1      ">
 
                 <a  ><img class="pointer"  id="<?php  echo $imagen["imagen2"];?>" src="<?php  echo $imagen["imagen2"];?>" onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65;" alt="<?php  echo $imagen["imagen2"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>
                 </div>   
 
                  
 
                 <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1     ">
                     <a  ><img class="pointer"  id="<?php  echo $imagen["imagen3"];?>" src="<?php  echo $imagen["imagen3"];?>" onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65;" alt="<?php  echo $imagen["imagen3"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>
                 </div>
 
                 
                 <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1      ">
                     <a  ><img class="pointer"  id="<?php  echo $imagen["imagen4"];?>" src="<?php  echo $imagen["imagen4"];?>" onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65; "alt="<?php  echo $imagen["imagen4"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>
 
                 </div>
 
 
                  <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1      ">
                      <a  ><img class="pointer"  id="<?php  echo $imagen["imagen5"];?>" src="<?php  echo $imagen["imagen5"];?>" <?php  echo $imagen["imagen5"];?> onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65;" alt="<?php  echo $imagen["imagen5"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>  
                         
                 </div>
                 <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1     ">
                     <a  ><img class="pointer"  id="<?php  echo $imagen["imagen6"];?>" src="<?php  echo $imagen["imagen6"];?>" onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65;" alt="<?php  echo $imagen["imagen6"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>
                 </div>
 
                 
                 <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1      ">
                     <a  ><img class="pointer"  id="<?php  echo $imagen["imagen7"];?>" src="<?php  echo $imagen["imagen7"];?>" onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65; "alt="<?php  echo $imagen["imagen7"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>
 
                 </div>
 
 
                  <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1      ">
                      <a  ><img class="pointer"  id="<?php  echo $imagen["imagen8"];?>" src="<?php  echo $imagen["imagen8"];?>" <?php  echo $imagen["imagen8"];?> onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65;" alt="<?php  echo $imagen["imagen8"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>  
                         
                 </div>
                 <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1      ">
                      <a  ><img class="pointer"  id="<?php  echo $imagen["imagen9"];?>" src="<?php  echo $imagen["imagen9"];?>" <?php  echo $imagen["imagen9"];?> onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65;" alt="<?php  echo $imagen["imagen9"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>  
                         
                 </div>
                 <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1     ">
                     <a  ><img class="pointer"  id="<?php  echo $imagen["imagen10"];?>" src="<?php  echo $imagen["imagen10"];?>" onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65;" alt="<?php  echo $imagen["imagen10"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>
                 </div>
 
                 
                 <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1      ">
                     <a  ><img class="pointer"  id="<?php  echo $imagen["imagen11"];?>" src="<?php  echo $imagen["imagen11"];?>" onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65; "alt="<?php  echo $imagen["imagen11"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>
 
                 </div>
 
 
                  <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1      ">
                      <a  ><img class="pointer"  id="<?php  echo $imagen["imagen12"];?>" src="<?php  echo $imagen["imagen12"];?>" <?php  echo $imagen["imagen12"];?> onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65;" alt="<?php  echo $imagen["imagen12"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>  
                         
                 </div> 
                 <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1      ">
                     <a  ><img class="pointer"  id="<?php  echo $imagen["imagen13"];?>" src="<?php  echo $imagen["imagen13"];?>" onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65; "alt="<?php  echo $imagen["imagen13"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>
 
                 </div>
 
 
                  <div  id="colum-1-izquierda" class="col-12  col-sm-1 col-md-1  col-lg-1 col-xl-1      ">
                      <a  ><img class="pointer"  id="<?php  echo $imagen["imagen14"];?>" src="<?php  echo $imagen["imagen14"];?>" <?php  echo $imagen["imagen14"];?> onmouseover="this.width=43;this.height=62;"  onmouseout="this.width=48;this.height=65;" alt="<?php  echo $imagen["imagen14"];?>" onclick="javascript:GuardaNombreDeSimbolofinal(n=0);" width="48" height ="65"></a>  
                         
                 </div> 
            
            
            
         </div> 
    </div>  
     <?php  endforeach ?>   
         <div class="row">
                <div class="col espacio-1 "> &nbsp&nbsp </div>     
        </div>

   
<!-- cierre de card -->
</div> 

<style>

.pointer {cursor: pointer;}

</style>
<?php

  // }
?>
