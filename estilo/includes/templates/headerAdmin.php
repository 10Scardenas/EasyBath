<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">-->
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../estilo/css/all.min.css">
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css" />
  <link rel="stylesheet" href="../estilo/css/admin.min.css">
  <link rel="stylesheet" href="../estilo/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../estilo/css/bootstrap.min.css">

  <title>MOBIDORO</title>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - titulo -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admin/admin.php">
        <div class="sidebar-brand-icon">
        <i class="fas fa-file-contract"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MOBIDORO</div>
      </a>
      

      
      <!-- Heading -->
      <div class="sidebar-heading">
        Interfaz
      </div>

      <!-- Baños - opciones -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBaños" aria-expanded="true"
          aria-controls="collapseBaños">
          <i class="fas fa-user"></i>
          <span>Baños</span>
        </a>
        <div id="collapseBaños" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="listaBanios.php">Lista de Baños</a>
            <a class="collapse-item" href="#">Gestionar Limpiezas</a>
          </div>
        </div>
      </li>

      <!-- Clientes - opciones -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true"
          aria-controls="collapseClientes">
          <i class="fas fa-user"></i>
          <span>Clientes</span>
        </a>
        <div id="collapseClientes" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="listaClientes.php">Lista de Clientes</a>
            <a class="collapse-item" href="Facturas.php">Rentas</a>
            <a class="collapse-item" href="Cobros.php">Cobros</a>
            <a class="collapse-item" href="Historial.php">Historial</a>
            
          </div>
        </div>
      </li>
      
      <!-- Costos - opciones -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCosto" aria-expanded="true"
          aria-controls="collapseCosto">
          <i class="fas fa-user"></i>
          <span>Costos</span>
        </a>
        <div id="collapseCosto" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="Ingresos.php">Ingresos</a>
            <a class="collapse-item" href="Gastos.php">Gastos</a>
          </div>
        </div>
      </li>
      
      <hr class="sidebar-divider d-none d-md-block"></hr>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- Fin Sidebar -->
    