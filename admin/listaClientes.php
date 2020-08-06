<?php
include 'conection_database.php';
?>
<?php include_once '../estilo/includes/templates/headerAdmin.php' ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars text-dark"></i>
      </button>

      <!-- Topbar Buscador -->
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-info" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Buscador Dropdown (Visible solo en contexto movil) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Mensajes -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <div class="topbar-divider d-none d-sm-block d-lg-none"></div>

        <!-- Nav Item - Informacion de usuario -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usuario'];?></span>
            <i class="fas fa-user"></i>
          </a>
          <!-- Dropdown - Informacion de usuario -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Perfil
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Configuración
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Salir
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- Fin Topbar -->

    <!-- Inicio del contenido de la pagina -->
    <div class="container-fluid">
      <!-- Pagina heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lista Clientes</h1>
        </div>

     

      <div class="row">
        <!-- Vista de tablas -->
        <!-- vista de usuarios -->
        <div class="col-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              
              <div class="dropdown no-arrow show">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                
              </div>
            </div>

            <!-- Inicio de Tabla -->
            <div class="card-body" action="savetask.php" method="POST">
              <div class="table-responsive">
                <table class="table table-bordered" id="dtBasicExample" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Empresa</th>
                      <th>RFC</th>
                      <th>Contacto</th>
                      <th>Correo</th>
                      <th>Telefono</th>
                      <th>Ubicacion</th>
                      <th>Comentarios</th>
                      <th>Añadir comentarios</th>                
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql="SELECT * FROM cliente" ;
                      $result = mysqli_query($con, $sql);
                      
                      
                      while($fila = mysqli_fetch_array($result)){ 
                    ?>
                        <tr>
                            <td><?php echo $fila['empresa']; ?></td>
                            <td><?php echo $fila['rfc']; ?></td>
                            <td><?php echo $fila['contacto']; ?></td>
                            <td><?php echo $fila['correo']; ?></td>
                            <td><?php echo $fila['telefono']; ?></td>
                            <td><?php echo $fila['ubicacion']; ?></td>
                            <td><?php echo $fila['comentarios']; ?></td>


                            <td>
                            <a href ="modificarClientes.php?codigo=<?php echo $fila['empresa']?>" class="btn btn-primary"> 
                                  <i class="fas fa-user-edit"></i> </a>
                            </td>
                        </tr>
                      <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Empresa</th>
                      <th>RFC</th>
                      <th>Contacto</th>
                      <th>Correo</th>
                      <th>Telefono</th>
                      <th>Ubicacion</th>
                      <th>Comentarios</th>
                      <th>Añadir comentarios</th>                
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Content Column -->
          <div class="col-lg-6 mb-4">
          </div>

          <div class="col-lg-6 mb-4">

            
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- Fin Contenido principal -->

<?php include_once '../estilo/includes/templates/footerAdmin.php' ?>