<?php
    include("conection_database.php");

    if(isset($_POST['update'])){
        $codigo = $_GET['codigo'];
        $comentarios = $_POST['comentarios'];
        
        $query = "UPDATE cliente set comentarios = '$comentarios' WHERE empresa = '$codigo' ";
        mysqli_query($con, $query);

        header("Location: listaClientes.php");

    
    }   
?>
