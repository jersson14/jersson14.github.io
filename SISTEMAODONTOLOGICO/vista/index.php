<?php
session_start();
if(!isset($_SESSION['S_IDUSUARIO'])){
	header('Location: ../Login/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Odoto Stetic | Collavino</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plantilla/plugins/fontawesome-free/css/all.min.css">
  <link rel="icon" href="../img/logo1.png" type="image/png">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plantilla/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../Plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../plantilla/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plantilla/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plantilla/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../css/animate.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="../plantilla/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="../plantilla/plugins/datatables/datatables.min.css">
  <link rel="stylesheet" href="../plantilla/plugins/select2/select2.min.css">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
  <link rel="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
</head>
<style>
  .swal2-popup{
    font-size:1.6rem !important;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
 

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link animate__animated animate__zoomIn" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link animate__animated animate__zoomIn"><b><i class="fas fa-home mr-1"></i>INICIO</b></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
              
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        
          
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
  
      <!-- Notifications Dropdown Menu -->
      <ul class="navbar-nav ml-auto"> 
      <button class="btn bg-gradient-primary float-right m-1 animate__animated animate__zoomIn" onclick="AbrirModalEditarContra()" align="center">Cambiar Contraseña</button>
        <button type="button" class="btn bg-gradient-danger float-right m-1 animate__animated animate__zoomIn" onclick="location.href = '../controlador/usuario/controlador_cerrar_sesion.php'">Cerrar Sesión</button>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 animate__animated animate__zoomIn">
    <!-- Brand Logo -->
    <div style="text-align:left;">
    <a style="align:center" href="index.php" class="brand-link">
      
      <img style="text-align:left" src="../img/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 animate__animated animate__pulse" style="opacity: .8">
      <span style="text-align:left;font-size:18px;font-family:impact;" class="brand-text font-weight-light animate__animated animate__pulse"><b class="animate__animated animate__pulse">Odonto Stetic "Collavino"</b></span>
    </a>
</div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex animate__animated animate__zoomIn">
        <div class="image">
          <img id="img_lateral" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info animate__animated animate__zoomIn">
          <a style="text-align:center;" href="#" class="d-block">Bienvenido <b style="color:white"><?php echo $_SESSION['S_USER'];?></b></a>
          <a style="text-align:center;margin:5px;color:white" href="#" class="d-block"><i class="fa fa-circle text-success fa-0x "></i>&nbsp;&nbsp;<b style="text-align:center"><?php echo $_SESSION['S_ROL'];?></b></a>

        </div>
      </div>

     

      <!-- Sidebar Menu -->
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column animate__animated animate__zoomIn" data-widget="treeview" role="menu" data-accordion="true">
        <li class="header text-center" style="color:#FFFFFF;background-color:Gray;"><b>Menú de Navegación</b></li>  
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fas fa-calendar-alt"></i>
              <p>
                Citas
                <i class="right fas fa-angle-left"></i>
              </p>
          </a>
            <ul class="nav nav-treeview">
              <?php
                if($_SESSION['S_ROL']=='Administrador'){


              
              ?>
              <li class="nav-item">
              <a onclick="cargar_contenido('contenido_principal','cita/vista_cita_listar.php')"class="nav-link">
                <i class="nav-icon fas fa-calendar-check"></i>
                  <p>Gestión citas
                  </p>
              </a>
              </li>
            </ul>
            <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-medical"></i>
              <p>
                Consultas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','consulta/vista_consulta_listar.php')"class="nav-link">
                <i class="nav-icon fas fa-file-signature"></i>  
                  <p>Consulta Médica
                  </p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Pacientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','paciente/vista_paciente_listar.php')"class="nav-link">
                <i class="nav-icon fas fa-user-plus"></i>
                  <p>Gestión Paciente
                  </p>
                </a>
              </li>
              <li class="nav-item">
            <a onclick="cargar_contenido('contenido_principal','pagos/vista_pagos_listar.php')" class="nav-link">
            <i class="nav-icon fas fa-hand-holding-usd"></i>
                  <p>Pagos
                  </p>
                </a>
            </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Doctor
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','doctor/vista_doctor_listar.php')" class="nav-link">
                <i class="nav-icon fas fa-notes-medical"></i>
                  <p>Gestión Doctor
                  </p>
                </a>
            </li>
            </ul>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-medical"></i>
              <p>
                Historias clínicas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','historial/vista_HC.php')" class="nav-link">
                <i class="nav-icon fas fa-file-medical"></i>
                  <p>Gestión historia clínica
                  </p>
                </a>
            </li>
            </ul>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-medical"></i>
              <p>
                Atención al paciente
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','historial/vista_atencion_paciente.php')" class="nav-link">
                <i class="nav-icon fas fa-file-medical"></i>
                  <p>Gestión atención
                  </p>
                </a>
            </li>
            </ul>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-donate"></i>
              <p>
                Ingresos y gastos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','ingresos/vista_ingresos_listar.php')" class="nav-link">
                <i class="nav-icon fas fa-fast-forward"></i>
                  <p>Ingresos
                  </p>
                </a>
            </li>
            <li class="nav-item">
            <a onclick="cargar_contenido('contenido_principal','gastos/vista_gastos_listar.php')" class="nav-link">
                <i class="nav-icon fas fa-fast-backward"></i>
                  <p>Gastos
                  </p>
                </a>
            </li>
            </ul>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Gestión Usuario
                  </p>
                </a>
            </li>
            </ul>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fas fa-file-medical"></i>
              <p>
                Servicios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','especialidad/vista_especialidad_listar.php')"class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                  <p>Especialidades
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','tratamiento/vista_tratamiento_listar.php')"class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                  <p>Tratamientos
                  </p>
                </a>
              <?php

                }
                
                ?>
               <?php
                if($_SESSION['S_ROL']=='Doctor'){


              
              ?>
<li class="nav-item">
              <a onclick="cargar_contenido('contenido_principal','cita/vista_cita_listar.php')"class="nav-link">
                <i class="nav-icon fas fa-calendar-check"></i>
                  <p>Gestión citas
                  </p>
              </a>
              </li>
            </ul>
            <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-medical"></i>
              <p>
                Consultas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','consulta/vista_consulta_listar.php')"class="nav-link">
                <i class="nav-icon fas fa-file-medical"></i>  
                  <p>Consulta Médica
                  </p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Pacientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','paciente/vista_paciente_listar.php')"class="nav-link">
                <i class="nav-icon fas fa-user-plus"></i>
                  <p>Gestión Paciente
                  </p>
                </a>
              </li>
              <li class="nav-item">
            <a onclick="cargar_contenido('contenido_principal','pagos/vista_pagos_listar.php')" class="nav-link">
            <i class="nav-icon fas fa-hand-holding-usd"></i>
                  <p>Pagos
                  </p>
                </a>
            </li>
            </ul>
          
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-medical"></i>
              <p>
                Historias clínicas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','historial/vista_HC.php')" class="nav-link">
                <i class="nav-icon fas fa-file-medical"></i>
                  <p>Gestión historia clínica
                  </p>
                </a>
            </li>
            </ul>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-medical"></i>
              <p>
                Atención al paciente
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','historial/vista_atencion_paciente.php')" class="nav-link">
                <i class="nav-icon fas fa-file-medical"></i>
                  <p>Gestión atención
                  </p>
                </a>
            </li>
            </ul>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-donate"></i>
              <p>
                Ingresos y gastos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','ingresos/vista_ingresos_listar.php')" class="nav-link">
                <i class="nav-icon fas fa-fast-forward"></i>
                  <p>Ingresos
                  </p>
                </a>
            </li>
            <li class="nav-item">
            <a onclick="cargar_contenido('contenido_principal','gastos/vista_gastos_listar.php')" class="nav-link">
                <i class="nav-icon fas fa-fast-backward"></i>
                  <p>Gastos
                  </p>
                </a>
            </li>
            </ul>
            
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fas fa-file-medical"></i>
              <p>
                Servicios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','especialidad/vista_especialidad_listar.php')"class="nav-link">
                <i class=" nav-icon fas fa-arrow-circle-right"></i>
                  <p>Especialidades
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a onclick="cargar_contenido('contenido_principal','tratamiento/vista_tratamiento_listar.php')"class="nav-link">
                <i class="nav-icon fas fa-arrow-circle-right"></i>
                  <p>Tratamientos
                  </p>
                </a>
                
              <?php

                }

                ?>
              </li>
              
            </ul>

          </li>
          
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <input type="text" id="txtidprincipal" value="<?php echo $_SESSION['S_IDUSUARIO']?>" hidden >
          <input type="text" id="usuarioprincipal" value="<?php echo $_SESSION['S_USER']?>" hidden>
          
        <div class="row" id="contenido_principal">
        <div class="col-md-12">
        <div class="card card-success">
        
        
        <div class="card-header animate__animated animate__zoomIn">
            <h3 class="card-title"><i class="fas fa-home"></i>&nbsp;<b>BIENVENIDO AL CONTENIDO PRINCIPAL</b></h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        </div>
                <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body animate__animated animate__zoomIn">
            <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="total"><sup style="font-size: 20px"></sup></h3>
                <b>Citas para hoy</b>
              </div>
              <div class="icon">
              <i class="fas fa-calendar-alt"></i>
            </div>
              <a href="#"  onclick="cargar_contenido('contenido_principal','cita/vista_cita_listar.php')" class="small-box-footer"><b>Ver citas</b>&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="totalpacientes"><sup style="font-size: 20px"></sup></h3>
                <b>Total pacientes</b>
              </div>
              <div class="icon">
              <i class="fas fa-users"></i>
              </div>
              <a href="#" onclick="cargar_contenido('contenido_principal','paciente/vista_paciente_listar.php')" class="small-box-footer"><b>Ver pacientes</b>&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3 id="totalingresos"><sup style="font-size: 20px"></sup></h3>

                <b>Total ingresos de hoy</b>
              </div>
              <div class="icon">
              <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="#" onclick="cargar_contenido('contenido_principal','ingresos/vista_ingresos_listar.php')"class="small-box-footer"><b>Ver ingresos</b>&nbsp; <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3 id="totalgastos"><sup style="font-size: 20px"></sup></h3>

                <b>Total gastos de hoy</b>
              </div>
              <div class="icon">
              <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="#" onclick="cargar_contenido('contenido_principal','gastos/vista_gastos_listar.php')" class="small-box-footer"><b>Ver gastos</b>&nbsp; <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div><br><br>
          <div class="col-lg-4">
          <div class="col-12" style="text-align:center">
                        <h5 style="text-decoration: underline" ><b style=" font-size:18px;font-family:impact">GRAFICO EN BARRAS DE GASTOS</b></h5>
                        </div>
                        
          <canvas id="graficobar" width="400" height="400"></canvas>
          </div>
          <div class="col-lg-4">
          <div class="col-12" style="text-align:center">
                        <h5 style="text-decoration: underline"><b style=" font-size:18px;font-family: impact">GRAFICO HORIZONTAL DE GASTOS</b></h5>
                    </div>
          <canvas id="graficohorizontal" width="800" height="800"></canvas>
          </div>
          <div class="col-lg-4">
          <div class="col-12" style="text-align:center">
                        <h5 style="text-decoration: underline"><b style=" font-size:18px;font-family: impact">GRAFICO EN TORTA DE GASTOS</b></h5>
                    </div>
          <canvas id="graficotorta" width="400" height="400"></canvas>
          </div>
          <!-- ./col -->
        </div>
        </div>
              <!-- /.card-body -->
    </div>
            <!-- /.card -->
 </div>
        </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Sistema Web - Copyright &copy; 2021 <a href="https://www.facebook.com/jerzhitho.cm/" target="_blank">Desarrollado por JCM</a>.</strong>

    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<div class="modal fade animate__animated animate__slideInDown" id="modal_editar_contra"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " >
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                    <h4 class="modal-title text-center" id="titleModal"><i class="fas fa-user-lock"></i>&nbsp;<b>CAMBIAR PASSWORD</b></h>
                        <button data-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                              <input type="text" id="txtcontra_bd" hidden>
                                <label for="txtcontraactual">Contrase&ntilde;a actual:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-passport"></i></div>
                                </div>
                                <input type="password" class="form-control" id="txtcontraactual" name="txtcontraactual"placeholder="Ingrese contrase&ntilde;a actual" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="txtcontranu_editar">Nueva contrase&ntilde;a:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-passport"></i></div>
                                </div>
                                <input type="password" class="form-control" id="txtcontranu_editar" name="txtcontranu_editar"placeholder="Ingrese nueva contrase&ntilde;a" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="txtcontrare_editar">Repetir contrase&ntilde;a:</label>
                                <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-passport"></i></div>
                                </div>
                                <input type="password" class="form-control" id="txtcontrare_editar" name="txtcontrare_editar"placeholder="Repite contrase&ntilde;a nueva" required>
                                <div class="valid-input invalid-feedback"></div>
                                </div>
                            </div>
                            </div>

                            
                        </div>

                        </div>
                    <div class="card-footer">
                    <button class="btn bg-gradient-primary float-right m-1" onclick="Editar_Contra()"><i class="fas fa-check"><b>&nbsp;Modificar</b></i></button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger float-right m-1"><i class="fas fa-times ml-1"><b>&nbsp;Cerrar</b></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- jQuery -->
<script src="../plantilla/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plantilla/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  var idioma_espanol = {
			select: {
			rows: "%d fila seleccionada"
			},
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ning&uacute;n dato disponible en esta tabla",
			"sInfo":           "Registros del (_START_ al _END_) total de _TOTAL_ registros",
			"sInfoEmpty":      "Registros del (0 al 0) total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "<b>No se encontraron datos</b>",
			"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
			},
			"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
	 }
  function cargar_contenido(contenedor,contenido){
      $("#"+contenedor).load(contenido);
  }
  
  $.widget.bridge('uibutton', $.ui.button);
  function soloNumeros(e){

    tecla=(document.all) ? e.keyCode : e.which;
    if(tecla==8){

      return true;

    }

    patron=/[0-9]/;
    tecla_final= String.fromCharCode(tecla);

    return patron.test(tecla_final);
    return Swal.fire("Mensaje de Advertencia","Solo se permiten números","warning");

  }
  function soloLetras(e){
    key=e.keycode || e.which;
    tecla= String.fromCharCode(key).toLowerCase();
    letras=" áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSUVWXYZ";
    especiales="8-37-39-46";
    tecla_especial=false;
    for(var i in especiales)
    {
      if(key==especiales[i])
      {
        tecla_especial=true;
        break;

      }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
      return Swal.fire("Mensaje de Advertencia","Solo se permiten letras","warning");

      return false;
    }
  }
</script>
<!-- Bootstrap 4 -->
<script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plantilla/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plantilla/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plantilla/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plantilla/plugins/moment/moment.min.js"></script>
<script src="../plantilla/plugins/daterangepicker/daterangepicker.js"></script>

<script src="../plantilla/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="../plantilla/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plantilla/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plantilla/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../plantilla/dist/js/adminlte.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../plantilla/dist/js/demo.js"></script>
<script src="../plantilla/plugins/datatables/datatables.min.js"></script>
<script src="../plantilla/plugins/select2/select2.min.js"></script>
<script src="../plantilla/plugins/sweetalert2/sweetalert2.js"></script>
<script src="../js/usuario.js"></script>
<script src="../js/cita.js"></script>
<script src="../js/paciente.js"></script>
<script src="../js/ingresos.js"></script>
<script src="../js/gastos.js"></script>


<script>
Total_gastos();
TraerDatosUsuario();
Total_ingresos();
Total_pacientes();
Total_citas();
CargarDatosGraficoBar();
CargarDatosGraficoBarHorizontal();
CargarDatosGraficoBarPie();
function CargarDatosGraficoBar(){
  $ . ajax({
    url:'../controlador/graficos/controlador_grafico.php',
    type:'POST'
  }).done(function(resp){
    if(resp.length>0){
      var titulo=[];
      var cantidad=[];
      var colores=[];
      var data=JSON.parse(resp);
      for(var i=0;i < data.length;i++)
      {
        titulo.push(data[i][0]);
        cantidad.push(data[i][1]);
        colores.push(colorRGB());
      }
      CrearGrafico(titulo,cantidad,colores,'bar','GRAFICO EN BARRAS DE GASTOS','graficobar');
    }
 
  })
}
function CargarDatosGraficoBarHorizontal(){
  $ . ajax({
    url:'../controlador/graficos/controlador_grafico.php',
    type:'POST'
  }).done(function(resp){
    if(resp.length>0){
      var titulo=[];
      var cantidad=[];
      var colores=[];
      var data=JSON.parse(resp);
      for(var i=0;i < data.length;i++)
      {
        titulo.push(data[i][0]);
        cantidad.push(data[i][1]);
        colores.push(colorRGB());
      }
      CrearGrafico(titulo,cantidad,colores,'horizontalBar','GRAFICO HORIZONTAL DE GASTOS','graficohorizontal');
    }
  
  })
}
function CargarDatosGraficoBarPie(){
  $ . ajax({
    url:'../controlador/graficos/controlador_grafico.php',
    type:'POST'
  }).done(function(resp){
    if(resp.length>0){
      var titulo=[];
      var cantidad=[];
      var colores=[];
      var data=JSON.parse(resp);
      for(var i=0;i < data.length;i++)
      {
        titulo.push(data[i][0]);
        cantidad.push(data[i][1]);
        colores.push(colorRGB());
      }
      CrearGrafico(titulo,cantidad,colores,'pie','GRAFICO EN TORTA DE GASTOS','graficotorta');
    }
  
  })
}
function CrearGrafico(titulo,cantidad,colores,tipo,encabezado,id){
  var ctx = document.getElementById(id);
    var myChart = new Chart(ctx, {
    type: tipo,
    data: {
        labels: titulo,
        datasets: [{
            label: encabezado,
            data: cantidad,
            backgroundColor: colores,
            borderColor: colores,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
}
function generarNumero(numero){
	      return (Math.random()*numero).toFixed(0);
    }

    function colorRGB(){
        var coolor = "("+generarNumero(255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
        return "rgb" + coolor;
    }
</script>
</body>
</html>
