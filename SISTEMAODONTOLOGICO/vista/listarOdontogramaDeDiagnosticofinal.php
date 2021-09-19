<?php 

require_once "../vista/cargarNumerosFinal.php";

?>
 
     
 <div class="row">
                <div class="col espacio-1 "> &nbsp </div>     
  </div>


    <!-- Inicio de la card-->
<div class="card ">

<form name="frmlistar" id="frmlistar" enctype="multipart/form-data" accept-charset="utf-8"  method="post">
 
    <h5 class="card-header">
      <a type="button" name="nuevo" id="nuevo" class="btn btn-info btn-sm" onclick="javascript:nuevoOdontogramafinal(); ">Nuevo</a>


      
     <button type="button" name ="guardar" id="guardar" class="btn btn-success btn-sm" onclick="javascript:guardarOdontogramafinal(); ">Guardar</button>

    </h5>
      

<div id="container">
<div class="row">

<div class="card-body">


<div class="table-responsive">


 <div   class=" table-responsive col-12  col-sm-12 col-md-12  col-lg-12 col-xl-12  ">
  

 <table class="table-responsive table table-bordered">
  <!-- <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead> -->
  <tbody>      
  
 <?php  foreach($resultado as $imagenDiente): ?> 
    
 

    <tr>
      
      <td  align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"    alt="img1"  src="<?php  echo $imagenDiente["img1"];?>" <?php  asignaAnchoYaltoAnumero($imagenDiente["img1"]);  ?> ></td>


      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"   alt="img2" src="<?php  echo $imagenDiente["img2"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img2"]); ?>></td>


      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>" alt="img3"  src="<?php  echo $imagenDiente["img3"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img3"]); ?> ></td>



      <td align="center"><img class="pointer"  id="<?php  echo $imagenDiente["idimagen"];?>"  alt="img4"  src="<?php  echo $imagenDiente["img4"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img4"]); ?>></td>


      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"  alt="img5"  src="<?php  echo $imagenDiente["img5"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img5"]); ?>></td>


      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"  alt="img6"  src="<?php  echo $imagenDiente["img6"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img6"]); ?>></td>



      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"  alt="img7"  src="<?php  echo $imagenDiente["img7"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img7"]); ?>></td>


      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"  alt="img8"  src="<?php  echo $imagenDiente["img8"];?>"<?php   asignaAnchoYaltoAnumero($imagenDiente["img8"]); ?> ></td>


      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"  alt="img9"  src="<?php  echo $imagenDiente["img9"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img9"]); ?>></td>




      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"  alt="img10"  src="<?php  echo $imagenDiente["img10"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img10"]); ?>></td>


      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"   alt="img11"  src="<?php  echo $imagenDiente["img11"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img11"]); ?>></td>


      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"  alt="img12"  src="<?php  echo $imagenDiente["img12"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img12"]); ?>></td>


      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"  alt="img13"  src="<?php  echo $imagenDiente["img13"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img13"]); ?>></td>

      
      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"  alt="img14"  src="<?php  echo $imagenDiente["img14"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img14"]); ?>></td>


      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>" alt="img15"  src="<?php  echo $imagenDiente["img15"];?>" <?php  asignaAnchoYaltoAnumero($imagenDiente["img15"]); ?>></td>


      <td align="center"><img class="pointer" id="<?php  echo $imagenDiente["idimagen"];?>"  alt="img16" src="<?php  echo $imagenDiente["img16"];?>" <?php   asignaAnchoYaltoAnumero($imagenDiente["img16"]); ?>></td>


  
    </tr>

  

<?php  endforeach ?>

</tbody>

</table>
<div class="col-12 col-md-12">
  <div class="form-group">
     <label for="especificacionesfinal">Especificaciones:</label>
            <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
            </div>
          <textarea type="text" class="form-control" style="resize:none" id="especificacionesfinal" rows="3"name="especificaciones"></textarea>
          <div class="valid-input invalid-feedback"></div>
          </div>
    </div>
</div>


    
<div class="col-12 col-md-12">
  <div class="form-group">
     <label for="observacionesfinal">Observaciones:</label>
            <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
            </div>
          <textarea type="text" class="form-control" style="resize:none" id="observacionesfinal" rows="3"name="observaciones"></textarea>
          <div class="valid-input invalid-feedback"></div>
          </div>
    </div>
</div>

</div>

</div>

</div>

</div>

<style>

.pointer {cursor: pointer;}

</style>
  
</form>

 
<!-- cierre de card -->
</div> 
