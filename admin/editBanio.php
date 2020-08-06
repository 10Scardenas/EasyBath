<?php
    include("conection_database.php");

    if(isset($_POST['update'])){
        $codigo = $_GET['codigo'];
        $estado = $_POST['estado'];
       
        $ciudad = $_POST['ciudad'];
        
        
        $query = "UPDATE banio set ciudad = '$ciudad' WHERE id_banio = $codigo ";
        mysqli_query($con, $query);

        header("Location: listaBanios.php");

    
    }   
?>
