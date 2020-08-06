<?php
include("conection_database.php");
if(isset($_GET['codigo'])){
    $codigo= $_REQUEST['codigo'];
    

    $query= "DELETE FROM COBROS WHERE id_cobro = $codigo";
    $result = mysqli_query($con, $query);
    
    
    
    if (!$result){
        die("Query Failed");
    }

    $_SESSION['mensaje'] = 'Cobro removido de manera exitosa';
    $_SESSION['tipoMensaje'] = 'success';
    header("Location: Cobros.php");
}

?>

