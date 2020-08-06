<?php

include("conection_database.php");

if(isset($_POST['agregarCliente'])){
    $empresa = $_POST['empresa'];
    $contacto = $_POST['contacto'];
    $ubicacion = $_POST['ubicacion'];
    $comentarios = $_POST['comentarios'];
    

    $query = "INSERT INTO cliente(empresa,contacto,ubicacion,comentarios) values ('$empresa','$contacto','$ubicacion','$comentarios')";
    
    $resultado = mysqli_query($con, $query);
    if(!$resultado){
        die("Query Failed");
    }
    
    $_SESSION['mensaje'] ='¡Se agrego El Cliente exitosamente!';
    $_SESSION['tipoMensaje'] ='success';

    header("Location: listaClientes.php");
}


?>