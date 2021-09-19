<?php
session_start();
if(isset($_SESSION['S_IDUSUARIO'])){
	header('Location: ../vista/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>INICIAR SESIÓN</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" href="../css/animate.min.css">
	<link rel="icon" href="../img/house.png" type="image/png">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/sweetalert2/sweetalert2.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/sweetalert2/sweetalert2.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/css/all.min.css">
</head>


<body >
	
<img class="wave " src="img/cental.jpg" alt="">
<div class="contenedor animate__animated animate__zoomIn" style="text-align:center">
    <div class="img">
        <img src="img/bg.svg" alt="">
    </div>
    <div class="contenido-login" style="text-align:center">
	<form autocomplete="false" onsubmit="return false" >

            <img src="img/dental.png" alt="">
            <h2 style="color:#17191A;margin-top: 15px;">CONSULTORIO DENTAL ODONTO STETIC "Collavino"</h2><br>
            <div class="input-div dni">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
				<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Usuario</span>
						<input class="input" type="text" name="username" placeholder="" id="txt_usu">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
				<div class="wrap-input100 validate-input div" data-validate="Password is required">
						<span class="label-input100">Contraseña</span>
						<input class="input" type="password" name="pass" placeholder="" id="txt_con">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
               
            </div>
			<div class="text-right p-t-8 p-b-31">
						<a href="#" onclick="AbrirModalRestablecer()" style="color: blue;text-align:center;margin-top: 20px;">
							¿Olvidaste tu contraseña?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn btn" id="entrar" onclick="VerificarUsuario()">
							<i class='fas fa-share-square ml-1 mr-1'></i>&nbsp;Iniciar Sesión
							</button>
						</div>
					</div>
			</form>
    	</div>
	</div>
<div id="dropDownSelect1"></div>

<form autocomplete="false" onsubmit="return false">
	<div class="modal fade animate__animated animate__slideInDown" id="modal_restablecer_contra" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><b>Restablecer Contraseña</b></h3>
                <button data-dismiss="modal" aria-label="close" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body"> 
					<label for=""><b>Ingrese el email registrado en el sistema para enviarle una nueva contraseña</b></label>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text"></div>
                    </div>
                    <input type="text" class="form-control" id="txt_email" name="txt_email"placeholder="Ingrese email" required>
                    <div class="valid-input invalid-feedback"></div>              
            </div>
            <div class="modal-footer">
            <button onclick="Restablecer_Contra()" class="btn btn-primary float-right m-1"><i class="fa fa-check"></i>&nbsp;Enviar</button>
            <button type="button" data-dismiss="modal" class="btn btn-danger float-right m-1"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
            </div>
        </div>
    </div>
  </div>
</div>
</form>
	<!--===============================================================================================-->
	<script src="vendor/sweetalert2/sweetalert2.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="vendor/sweetalert2/sweetalert2.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="../js/usuario.js"></script>
	



</body>
<script>
txt_usu.focus();
var input = document.getElementById("txt_con");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("entrar").click();
  }
});
</script>
</html>
<?php
