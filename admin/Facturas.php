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
        <h1 class="h3 mb-0 text-gray-800">Rentas</h1>
        </div>

     

      <div class="row">
        <!-- Vista de tablas -->
        <!-- vista de usuarios -->
        <!-- vista de usuarios -->
        <div class="col-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Rentar baño</h6>
              <div class="dropdown no-arrow show">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-156px, -155px, 0px);">
                  <div class="dropdown-header">Opciones:</div>
                    <a class="dropdown-item" href="CrearFactura.php">Rentar un baño</a>
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
                        
                        <th>Empresa</th>
                        <th># Baño</th>
                        <th>Monto Mensual Iva incluido</th>
                        <th>Forma de pago</th>
                        <th>Cuenta</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Finalizar Renta</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php        

                      #leer informacion en renta
                      $sql="SELECT * FROM renta" ;
                      $result = mysqli_query($con, $sql);

                      #informacion de cobros
                      $fecha_actual = date("Y-m-d"); 
                      $fecha_actualizada=date("Y-m-d",strtotime($fecha_actual."+ 1 month")); 

                      $sqlFechaFin="SELECT * FROM renta where fecha_cobro='$fecha_actual'" ;
                      $resultFechaFin = mysqli_query($con, $sqlFechaFin);
                      
                      while($fila = mysqli_fetch_array($resultFechaFin)){ 
                        #definir variables para cada una de las columnas 
                        $id_renta = $fila['id_renta']; 
                        $empresa = $fila['empresa']; 
                        $id_banio = $fila['id_banio']; 
                        $monto_mensual = $fila['monto_mensual'];
                        $tipo_pago = $fila['tipo_pago']; 
                        $cuenta = $fila['cuenta'];
                        $fecha_inicial = $fila['fecha_inicial'];
                        $fecha_cobro = $fila['fecha_cobro'];        
                        if($fila['fecha_cobro']=$fecha_actual)
                        {     
                          
                                          
                          $queryfechas = "UPDATE renta set fecha_inicial = '$fecha_actual' , fecha_cobro= '$fecha_actualizada' WHERE fecha_cobro='$fecha_actual'";
                          $resultadofechas = mysqli_query($con, $queryfechas);  
                          
                          $queryCobros = "INSERT INTO cobros(id_cobro, id_banio, empresa, monto_mensual, fecha_inicio, fecha_fin, estado, forma_pago) values (NULL, '$id_banio', '$empresa', '$monto_mensual', '$fecha_actual', '$fecha_actualizada', 'no cobrado','$tipo_pago')";
                          $resultadoCobros = mysqli_query($con, $queryCobros);
                
                          
                        }
                      }
                      
                      while($fila = mysqli_fetch_array($result)){ 
                        
                    ?>
                        <tr>
                            
                            <td><?php echo $fila['empresa']; ?></td>
                            <td><?php echo $fila['id_banio']; ?></td>
                            <td><?php echo $fila['monto_mensual']; ?></td>
                            <td><?php echo $fila['tipo_pago']; ?></td>
                            <td><?php echo $fila['cuenta']; ?></td>
                            <td><?php echo $fila['fecha_inicial']; ?></td>
                            <td><?php echo $fila['fecha_cobro']; ?></td>
                            <td>
                              
                              <!-- Añadir 2 id's a un mismo href -->
                              <a onClick="return confirm('¿Esta seguro que desea eliminar esta renta?, esta accion NO se puede revertir!')"
                              href="deleteRenta.php?codigo=<?php echo $fila['id_renta'];?> 
                              &codigoBanio=<?php echo $fila['id_banio'];?>"  
                              class="btn btn-danger"> Finalizar<i class="fas fa-ban"></i></a>
                                   
                                  
                            </td>                          
                        </tr>
                      <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                        
                        <th>Empresa</th>
                        <th># Baño</th>
                        <th>Monto Mensual Iva incluido</th>
                        <th>Forma de pago</th>
                        <th>Cuenta</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Finalizar Renta</th>
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