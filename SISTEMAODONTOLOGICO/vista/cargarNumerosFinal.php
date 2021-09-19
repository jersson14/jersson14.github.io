<?php

 require_once "../modelo/nuevaConexionfinal.php";

 
          $sql = 'SELECT *  FROM tbl_imagendientefinal';
          $sentencia = $pdo->prepare($sql);
          $sentencia->execute();
          $resultado = $sentencia->fetchAll();
       
 

     //**********************************************************************************************// 
     //-FUNCION QUE ASIGNA  ANCHO Y ALTO A LOS NÚMEROS DEL ODONTOGRAMA   
     //**********************************************************************************************//           
        function asignaAnchoYaltoAnumero($nombreImg){
          
                     
              $ruta = substr($nombreImg, 0, 23); 

              if($ruta == "img/imgDientes/numeros/"){
                  $w = 12; 
                  $h = 7; 

                  echo "width = '".$w."' "; 
                  echo "height = '".$h."' ";

               }else
                  { 
                    
                     //Consultamos si la ruta de imagen es diferente de 00.png  para dejar el mismo tamaño en ancho y alto de la imagen
                     if($ruta != "img/imgDientes/00.png"){
                       $w = 34; 
                       $h = 53; 
                       echo "width = '".$w."' ";
                       echo "height = '".$h."' "; 
                     }  

                     // Cuando detecte si la ruta es 00.png entonces cambia el ancho y el alto de la imagen
                     if($ruta == "img/imgDientes/00.png"){
                           $w = 12; 
                           $h = 7;  

                           echo "width = '".$w."' "; 
                           echo "height = '".$h."' ";
                       }


                       // Si la ruta que viene es difeente a img/imgDientes/numeros y a img/imgDientes/00.png, entonces asignamos las funciones a las imagenes y los eventos onmouseover y onmouserout 
                    if($ruta != "img/imgDientes/numeros/" && $ruta != "img/imgDientes/00.png"){
                        echo "onmouseover='this.width=31;this.height=50;'";
                        echo "onmouseout='this.width=34;this.height=50;'";
                        echo "onclick='javascript:ConsultarSimbologiafinal();'";
                    }
                       
                     
                    
                  }
            
          }
        //--------------------------------------------------------------------
   //*****************************************************************//