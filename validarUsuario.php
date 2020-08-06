<?PHP
//Inicio la sesión
 include("admin/conection_database.php");
 extract($_POST);
$sql1="SELECT * from usuario  where usuario='$usuario' and contrasena='$contraseña'";

//echo $sql1;
				$result1 = mysqli_query($con,$sql1);
				$numrows4 = mysqli_num_rows($result1);
				if ($numrows4==0) 
				{
				header("Location: index.php?errorusuario=si");
				}
				else 
				{
				$row1 = mysqli_fetch_array($result1);
				$tipo_usuario1 = $row1["tipoUsuario"];
				$nombre1 = $row1["usuario"];
				$idusuario = $row1["idusuario"];
				$_SESSION["usuario"]= $usuario;
				$_SESSION["clave"]= $contraseña;
				/*La función PHP header nos permite enviar encabezados sin formato al cliente (robot, navegador…). Es una manera de forzar dicho envío antes de que se lean los encabezados de la propia página*/
				if ($tipo_usuario1=='Administrador')
				{
				header("Location: admin/admin.php");	
				}
				
				
	


	

}
?>