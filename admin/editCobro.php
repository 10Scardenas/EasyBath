<?php
include("conection_database.php");
if(isset($_GET['codigo'])){
    $codigo= $_REQUEST['codigo'];
    $monto_mensual= $_REQUEST['monto_mensual'];
    $tipo_pago= $_REQUEST['tipo_pago'];
    $id_banio= $_REQUEST['id_banio'];
    $empresa= $_REQUEST['empresa'];

    #informacion de cobros
    $fecha_actual = date("Y-m-d"); 
    $mes_actual = strftime("%b");

    $queryCob = "UPDATE cobros set estado = 'cobrado' WHERE id_cobro = $codigo ";
   
    $resultadoCob = mysqli_query($con, $queryCob);   
    
    if (!$resultadoCob and !$resultado){
        die("Query Failed");
    }

    header("Location: Cobros.php");
}
?>

