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
        <h1 class="h3 mb-0 text-gray-800">Flujo de Caja</h1>
        </div>

     

      <div class="row">
        <!-- Vista de tablas -->
        <!-- vista de usuarios -->
        <div class="col-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Vista de Usuarios</h6>
              <div class="dropdown no-arrow show">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-156px, -155px, 0px);">
                  <div class="dropdown-header">Opciones:</div>
                 <a class="dropdown-item" href="#">Añadir nuevo Usuarioa</a>
                  <div class="dropdown-divider"></div>
                </div>
              </div>
            </div>
              
            <!-- Titulo de Tabla -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h3 class="h3 mb-0 text-gray-800">Flujo de caja</h1>
              </div>
            <!-- Inicio de Tabla -->
            <div class="card-body" action="savetask.php" method="POST">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTableUsuarios" width="100%" cellspacing="0">

                <?php
                #query para año del ingreso            
                $sqlAnio=" SELECT YEAR(mes) from flujo ";
                $resultAnio = mysqli_query($con, $sqlAnio);

                #query para sacar un mes de ingresos 
                #SET lc_time_names = es_MX; // para convertir a español           
                $sqlMes=" SELECT MONTHNAME(mes) from flujo";
                $resultMes = mysqli_query($con, $sqlMes);

                #query consulta de cantidad en flujo para compras
                $sqlCompras="SELECT sum(cantidad_compras) AS compras_fecha, mes, YEAR(mes), MONTHNAME(mes) 
                            FROM flujo GROUP BY YEAR(mes),monthname(mes) 
                            ORDER BY mes ASC";
                $resultCompras = mysqli_query($con, $sqlCompras);

                #query consulta de cantidad en flujo para mantenimiento
                $sqlMantenimiento="SELECT sum(cantidad_mantenimiento) AS mantenimiento_fecha, mes, YEAR(mes), MONTHNAME(mes) 
                                  FROM flujo GROUP BY YEAR(mes),monthname(mes) 
                                  ORDER BY mes ASC";
                $resultMantenimiento = mysqli_query($con, $sqlMantenimiento);

                #query consulta de cantidad en flujo para imagen
                $sqlImagen="SELECT sum(cantidad_imagen) AS imagen_fecha, mes, YEAR(mes), MONTHNAME(mes) 
                FROM flujo GROUP BY YEAR(mes),monthname(mes) 
                ORDER BY mes ASC";
                $resultImagen = mysqli_query($con, $sqlImagen);

                #query consulta de cantidad en flujo para pagos
                $sqlPagos="SELECT sum(cantidad_pagos) AS pagos_fecha, mes, YEAR(mes), MONTHNAME(mes) 
                FROM flujo GROUP BY YEAR(mes),monthname(mes) 
                ORDER BY mes ASC";
                $resultPagos = mysqli_query($con, $sqlPagos);

                #query consulta de cantidad en flujo para otro
                $sqlOtros="SELECT sum(cantidad_otros) AS otros_fecha, mes, YEAR(mes), MONTHNAME(mes) 
                FROM flujo GROUP BY YEAR(mes),monthname(mes) 
                ORDER BY mes ASC";
                $resultOtros = mysqli_query($con, $sqlOtros);

                 #query consulta de cantidad en flujo para renta
                 $sqlRenta="SELECT sum(cantidad_renta) AS renta_fecha, mes, YEAR(mes), MONTHNAME(mes) 
                 FROM flujo GROUP BY YEAR(mes),monthname(mes) 
                 ORDER BY mes ASC";
                 $resultRenta = mysqli_query($con, $sqlRenta);

                 #query consulta de cantidad en flujo para compras
                 $sqlDistinctAnio="SELECT DISTINCT YEAR(mes) AS 'year', MONTHNAME(mes) AS 'month' from flujo  ORDER BY mes ASC";
                 $resultDistinctAnio = mysqli_query($con, $sqlDistinctAnio);

                 #query consulta de cantidad en flujo para compras
                 $sqlDistinctMes="SELECT DISTINCT YEAR(mes) AS 'year', MONTHNAME(mes) AS 'month' from flujo  ORDER BY mes ASC";
                 $resultDistinctMes = mysqli_query($con, $sqlDistinctMes);

                 #query consulta de Egresos Totales
                 $sqlEgresosTotales="SELECT sum(cantidad_compras+cantidad_mantenimiento+cantidad_imagen+cantidad_pagos+cantidad_otros) 
                 AS egresos_totales,mes, YEAR(mes), MONTHNAME(mes) 
                 FROM flujo GROUP BY YEAR(mes),monthname(mes) 
                 ORDER BY mes ASC";
                 $resultEgresosTotales = mysqli_query($con, $sqlEgresosTotales);

                 #query consulta de  Flujo Mensual
                 $sqlFlujoMensual="SELECT sum(cantidad_renta-cantidad_compras-cantidad_mantenimiento-cantidad_imagen-cantidad_pagos-cantidad_otros) 
                 AS FlujoMensual,mes, YEAR(mes), MONTHNAME(mes) 
                 FROM flujo GROUP BY YEAR(mes),monthname(mes) 
                 ORDER BY mes ASC";
                 $resultFlujoMensual = mysqli_query($con, $sqlFlujoMensual);

                  #query consulta de  Flujo Acumulado (igual que mensual pero con otro nombre)
                  $sqlFlujoAcumulado="SELECT sum(cantidad_renta-cantidad_compras-cantidad_mantenimiento-cantidad_imagen-cantidad_pagos-cantidad_otros) 
                  AS FlujoAcumulado,mes, YEAR(mes), MONTHNAME(mes) 
                  FROM flujo GROUP BY YEAR(mes),monthname(mes) 
                  ORDER BY mes ASC";
                  $resultFlujoAcumulado = mysqli_query($con, $sqlFlujoAcumulado);

                                 
                ?>
                     
                      <tr>
                          <th rowspan="2" class="table-warning" >Flujo</th>
                          <th class="table-secondary">Año</th>
                          <?php while($fila = mysqli_fetch_array($resultDistinctAnio)){ ?>
                          <td class="table-secondary" ><?php echo $fila['year']; ?></td>
                          <?php } ?>
                      </tr>
                    
                      <tr>
                      
                          <th class="table-secondary" scope="row">mes</th>
                          <?php while($fila = mysqli_fetch_array($resultDistinctMes)){ ?>
                            <td class="table-secondary"><?php echo $fila['month']; ?></td>
                          <?php } ?>
                      </tr>
                      <tr>                        
                          <th rowspan="6" class="table-danger" >Egresos</th>
                          <th scope="row">compras</th>
                          <?php while($fila = mysqli_fetch_array($resultCompras)){ ?>
                          <td ><?php echo $fila['compras_fecha']; ?></td>
                          <?php } ?>
                      </tr>
                      <tr>
                        <th scope="row">mantenimiento</th>
                        <?php while($fila = mysqli_fetch_array($resultMantenimiento)){ ?>
                          <td ><?php echo $fila['mantenimiento_fecha']; ?></td>
                          <?php } ?>
                      </tr>
                      <tr>
                        <th scope="row">imagen</th>
                        <?php while($fila = mysqli_fetch_array($resultImagen)){ ?>
                          <td ><?php echo $fila['imagen_fecha']; ?></td>
                          <?php } ?>
                      </tr>
                        <tr>
                        <th scope="row">pagos</th>
                        <?php while($fila = mysqli_fetch_array($resultPagos)){ ?>
                          <td ><?php echo $fila['pagos_fecha']; ?></td>
                          <?php } ?>
                      </tr>
                      <tr>
                        <th scope="row">otros</th>
                        <?php while($fila = mysqli_fetch_array($resultOtros)){ ?>
                          <td ><?php echo $fila['otros_fecha']; ?></td>
                          <?php } ?>
                      </tr>
                      <tr>
                        <th class="table-secondary" scope="row">Total</th>
                        <?php while($fila = mysqli_fetch_array($resultEgresosTotales)){ ?>
                          <td class="table-secondary"><?php echo $fila['egresos_totales']; ?></td>
                          <?php } ?>
                      </tr>

                      <tr>
                        
                          <th rowspan="1" class="table-success">Ingresos</th>
                          <th class="table-secondary" scope="row">Renta</th>                         
                          <?php while($fila = mysqli_fetch_array($resultRenta)){ ?>
                          <td class="table-secondary"><?php echo $fila['renta_fecha']; ?></td>
                          <?php } ?>
                         
                      </tr>
                      
                      <tr>
                        <th colspan="2">Total flujo mensual</th>
                        <?php                         
                        while($fila = mysqli_fetch_array($resultFlujoMensual)){ 
                        ?>
                          <td ><?php echo $fila['FlujoMensual']; ?></td>

                        <?php } ?>
                      </tr>
                      <tr>
                        <th colspan="2">Total flujo acumulado</th>
                        <?php
                        $TotalAcumulado=0;                         
                        while($fila = mysqli_fetch_array($resultFlujoAcumulado)){ 
                        ?>
                          <td >
                          <?php 
                          $TotalAcumulado=$TotalAcumulado+$fila['FlujoAcumulado'];
                          echo $TotalAcumulado; 
                          ?></td>
                          
                        <?php } ?>
                      </tr>
                        
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