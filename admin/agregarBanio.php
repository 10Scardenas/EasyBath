<?php

include("conection_database.php");

if(isset($_POST['agregarBanio'])){
    
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    

    $query = "INSERT INTO banio(id_banio, estado,ciudad) values (NULL, 'inactivo','$ciudad')";
    $resultado = mysqli_query($con, $query);
    if(!$resultado){
        die("Query Failed");
    }
    
    $_SESSION['mensaje'] ='¡Se agrego El baño exitosamente!';
    $_SESSION['tipoMensaje'] ='success';

    header("Location: listaBanios.php");
}


?>