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

    $query= "DELETE FROM cobros WHERE id_cobro = $codigo";
    $result = mysqli_query($con, $query);
    
    $queryIngresos = "INSERT INTO ingresos(id_ingresos, mes,cantidad,fecha_ingreso,forma_pago,id_banio,empresa) 
    values (NULL, '$mes_actual','$monto_mensual','$fecha_actual','$tipo_pago','$id_banio','$empresa')";
    $resultadoIngresos = mysqli_query($con, $queryIngresos);

    $queryFlujo = "INSERT INTO flujo(id_flujo, mes,cantidad_renta,cantidad_compras,cantidad_mantenimiento,cantidad_imagen,cantidad_pagos,cantidad_otros) 
    values (NULL, '$fecha_actual','$monto_mensual','0','0','0','0','0')";
    $resultado = mysqli_query($con, $queryFlujo);

    $queryHistorial = "INSERT INTO historial (id_historial, id_banio, empresa, monto_mensual, fecha) 
    values (NULL, '$id_banio','$empresa','$monto_mensual','$fecha_actual')";
    $resultadoHistorial = mysqli_query($con, $queryHistorial);
    
    if (!result and !resultado){
        die("Query Failed");
    }

    $_SESSION['mensaje'] = 'Pago efectuado de manera exitosa';
    $_SESSION['tipoMensaje'] = 'succes';
    header("Location: Cobros.php");
}
?>

