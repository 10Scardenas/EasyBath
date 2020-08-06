<?php
    include("conection_database.php");

    if(isset($_POST['update'])){
        $codigo = $_GET['codigo'];
        $id_banio = $_POST['id_banio'];
        $empresa = $_POST['empresa'];
        $monto_mensual = $_POST['monto_mensual'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        $estado = $_POST['estado'];
       
        
        
        $query = "UPDATE COBROS set id_banio = '$id_banio', empresa= '$empresa', monto_mensual='$monto_mensual', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin',estado='$estado' WHERE id_cobro = $codigo ";
        mysqli_query($con, $query);
        
        header("Location: Cobros.php");

    
    }   
?>
