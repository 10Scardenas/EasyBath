<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="estilo/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo/css/all.min.css"> <!--font awesome-->
    <link rel="stylesheet" href="estilo/css/main.css">

    <title>MOBIDORO</title>
</head>

<body >
  
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
              <div class="image" >
                 <img src="estilo/img/login/Logo_CMYK.png"  width="600" height=500>
                 </div>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center d-flex">
                    <a href="index.php">
                      
                      <span class="login-logo h4 mb-3"><strong>MOBIDORO</strong></span>
                    </a>
                  </div>
                  <div class="intro-login my-4">
                    <h1 class="h4 font-weight-bold">Inicia Sesión</h1>
                    </div>
				  <!--Inicio Formualario-->
                  <form action="validarUsuario.php" method="POST" class="user">
				  <!--Funcion que verifica si los datos ingresados son correctos-->
                      <?php 
                  
                    /*La función isset() nos permite comprobar si una variable está definida,
                    devolviendo true si lo encuentra. es decir si la variable fué instanciada 
                    previamente utilizada o separada su espacio en memoria (declarada).*/
                      if (isset($_GET["errorusuario"])=="si")
                      {
                    ?> 
                      <b>Datos incorrectos</b> 
                    <?php
                      }
                      else
                      {
                    ?> 
                      Ingrese sus datos
                    <?php 
                      }
                    ?>
                    <div class="form-group">
                      <input name="usuario" type="text" class="form-control form-control-user" id="exampleInputEmail"placeholder="Ingrese su correo eléctronico">
                    </div>
                    <div class="form-group">
                      <input name="contraseña" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        
                      </div>
                    </div>
                    <button name="validar" type="submit" class="btn btn-primary btn-user btn-block">
                      Ingresar
                    </button>
                  </form>
                  <div class="text-center field-btn">
                    <a class="medium" href="#">Olvidaste la Contraseña?</a>
                  </div>
                  <div class="text-center field-btn">
                    <a class="medium" href="#">Crear una Cuenta!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- scripts -->
  <script src="estilo/jQuery/jquery-3.4.1.min.js"></script>
  <script src="estilo/js/popper.min.js"></script>
  <script src="estilo/js/bootstrap.min.js"></script>
  <script src="estilo/jQuery/jquery.easing.min.js"></script>
  <script src="estilo/js/validarFormularios.js"></script>
  <script src="estilo/jQuery/main.js"></script>
</body>
</html>