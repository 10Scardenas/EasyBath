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
        <h1 class="h3 mb-0 text-gray-800">Cobros</h1>
        </div>

     

      <div class="row">
        <!-- Vista de tablas -->
        <!-- vista de usuarios -->
        <!-- vista de usuarios -->
        <div class="col-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
              <div class="dropdown no-arrow show">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-156px, -155px, 0px);">
                  <div class="dropdown-header">Opciones:</div>
                    <a class="dropdown-item" href="#"></a>
                  <div class="dropdown-divider"></div>
                </div>
              </div>
            </div>         


            <!-- Inicio de Tabla -->
            <div class="card-body" action="savetask.php" method="POST">
              <div class="table-responsive">
                <table class="table table-bordered" id="dtBasicExample" width="100%" cellspacing="0">
                  <thead>
                  <tr>                                               
                          <th># Baño</th>
                          <th>Empresa</th>
                          <th>Monto Mensual Iva incluido</th>
                          <th>Fecha inicio</th>
                          <th>Fecha Fin</th>                          
                          <th>Estado de Cobro</th>
                          <th>Pagar</th>
                          <th>Cobrar</th>
                          <th>Modificar</th>
                          <th>Eliminar</th>
                      </tr>
                  </thead>
                  
                   
                  
                  <tbody>
                        
                    <?php
                      $sql="SELECT * FROM cobros" ;
                      $result = mysqli_query($con, $sql);
                      
                      while($fila = mysqli_fetch_array($result)){ 
                        
                    ?>
                        <tr>
                                     
                            <td><?php echo $fila['id_banio']; ?></td>
                            <td><?php echo $fila['empresa']; ?></td>
                            <td><?php echo $fila['monto_mensual']; ?></td>
                            <td><?php echo $fila['fecha_inicio']; ?></td>
                            <td><?php echo $fila['fecha_fin']; ?></td>                            
                            <td><?php echo $fila['estado']; ?></td>
                            <td>
                            <a onClick="return confirm('¿Esta seguro que desea efectuar un pago?')"
                              href="editPago.php?codigo=<?php echo $fila['id_cobro'];?> 
                              &monto_mensual=<?php echo $fila['monto_mensual'];?>  
                              &tipo_pago=<?php echo $fila['forma_pago'];?> 
                              &id_banio=<?php echo $fila['id_banio'];?>
                              &empresa=<?php echo $fila['empresa'];?>"
                              class="btn btn-success"> Pagar<i class="fas fa-money-bill-wave"></i></a>
                            </td>
                            <td>
                            <a onClick="return confirm('¿Esta seguro que desea cobrar esta deuda?')"
                              href="editCobro.php?codigo=<?php echo $fila['id_cobro'];?>"
                              class="btn btn-success"> Cobrar<i class="fas fa-money-bill-wave"></i></a>
                            </td>
                            <td>
                            <a onClick="return confirm('¿Esta seguro que desea modificar esta cobro?')"
                            href ="modificarCobro.php?codigo=<?php echo $fila['id_cobro']?>" 
                            class="btn btn-primary"> Modificar<i class="fas fa-edit"></i> </a>
                            </td>
                            <td>
                            <a onClick="return confirm('¿Esta seguro que desea eliminar esta deuda?')"
                            href ="deleteCobro.php?codigo=<?php echo $fila['id_cobro']?>" 
                            class="btn btn-danger"> Eliminar<i class="fas fa-edit"></i> </a>
                            </td>
                        </tr>
                      <?php } ?>
                      
                  </tbody>
                  <tfoot>
                  <tr>            
                          <th># Baño</th>
                          <th>Empresa</th>
                          <th>Monto Mensual Iva incluido</th>
                          <th>Fecha inicio</th>
                          <th>Fecha Fin</th>                          
                          <th>Estado de Cobro</th>
                          <th>Pagar</th>
                          <th>Cobrar</th>
                          <th>Modificar</th>
                          <th>Eliminar</th>
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

