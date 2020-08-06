<?php
include("conection_database.php");
if(isset($_GET['codigo'])){
    $codigo= $_REQUEST['codigo'];
    $codigoBanio= $_REQUEST['codigoBanio'];

    $query= "DELETE FROM renta WHERE id_renta = $codigo";
    $result = mysqli_query($con, $query);
    
    $queryban = "UPDATE banio set estado = 'inactivo' WHERE id_banio = $codigoBanio ";
    $resultadoban = mysqli_query($con, $queryban);   
    
    if (!$result and !$resultadoban){
        die("Query Failed");
    }

    $_SESSION['mensaje'] = 'Renta removido de manera exitosa';
    $_SESSION['tipoMensaje'] = 'succes';
    header("Location: Facturas.php");
}

?>

