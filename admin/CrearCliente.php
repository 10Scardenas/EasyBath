<?php include("agregarCliente.php") ?>
<?php include_once '../estilo/includes/templates/headerAdmin.php' ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars text-info"></i>
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
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
      <h1 class="h3 mb-4 text-info 800"> Añadir Cliente </h1>

      <div class="row">
        <!-- vista de usuarios -->
        <div class="col-12 col-md-8">
          <div class="card mb-4 py-3 border-top-info">
            <div class="card-body">
              <form id="createUserForm" class="needs-validation" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" action="agregarCliente.php" method="POST" novalidate>
                <h5 class="mb-3 font-weight-bold text-info">Agregar Baño</h5>

                <!-- Nuevo Campo -->
                <div class="form-group">
                  <label for="nombreUsuario">Empresa</label>
                  <input name="empresa" type="text" class="form-control" id="nombreUsuario" placeholder="agregue un punto en caso de no haber lugar" required>
                  <div class="invalid-feedback">
                    Invalido.
                  </div>
                </div>

                <!-- Nuevo Campo -->
                <div class="form-group">
                  <label for="passwordUser">Contacto</label>
                  <input name="contacto" type="text" class="form-control" id="passwordUser" placeholder="Agregue un numero valido" required>
                  <div class="invalid-feedback">
                    Invalido.
                  </div>
                </div>

                <!-- Nuevo Campo -->
                <div class="form-group">
                  <label for="passwordUser">Ubicacion</label>
                  <input name="ubicacion" type="text" class="form-control" id="passwordUser" placeholder="Agregue un numero valido" required>
                  <div class="invalid-feedback">
                    Invalido.
                  </div>
                </div>

                <!-- Nuevo Campo -->
                <div class="form-group">
                  <label for="passwordUser">Comentarios</label>
                  <input name="comentarios" type="text" class="form-control" id="passwordUser" placeholder="Monto del baño" required>
                  <div class="invalid-feedback">
                    Invalido.
                  </div>
                </div>
                
                <div class="pt-2">
                  <button name ="agregarCliente" value="agregarCliente" class="btn btn-info btn-lg font-weight-bold" type="submit">Agregar Cliente</button>
                </div>
              </form>
            </div>
          </div>

          <?php if(isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-<?= $_SESSION['tipoMensaje'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>

        </div>
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- Fin Contenido principal -->

<?php include_once '../estilo/includes/templates/footerAdmin.php' ?>