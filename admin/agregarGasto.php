<?php

include("conection_database.php");

if(isset($_POST['agregarGasto'])){
    
    $concepto = $_POST['concepto'];
    $tipo_gasto = $_POST['tipo_gasto'];
    $cantidad = $_POST['cantidad'];
    $fecha_gasto = $_POST['fecha_gasto'];
    $forma_pago = $_POST['forma_pago'];


    $cantidad_compras = 0;
    $cantidad_mantenimiento = 0;
    $cantidad_imagen = 0;
    $cantidad_pagos = 0;
    $cantidad_otro = 0;

    #informacion Flujo
    if ($tipo_gasto=='compras' )
    {
        $cantidad_compras = $cantidad;
    }
    else if($tipo_gasto=='mantenimiento' ){
        $cantidad_mantenimiento = $cantidad;
    }
    else if($tipo_gasto=='imagen' ){
        $cantidad_imagen = $cantidad;
    }
    else if($tipo_gasto=='pagos' ){
        $cantidad_pagos = $cantidad;
    }
    else if($tipo_gasto=='otros' ){
        $cantidad_otro = $cantidad;
    }
    
    
   #fecha del gasto
    $fechaComoEntero = strtotime($fecha_gasto);  
    $mes = date("m", $fechaComoEntero);



    $query = "INSERT INTO gastos(mes,concepto,tipo_gasto,cantidad,fecha_gasto,id_gasto,forma_pago) values ('$mes','$concepto','$tipo_gasto','$cantidad','$fecha_gasto',NULL,'$forma_pago')";
    
    $resultado = mysqli_query($con, $query);

    $queryFlujo = "INSERT INTO flujo(id_flujo, mes,cantidad_renta,cantidad_compras,	cantidad_mantenimiento,cantidad_imagen,cantidad_pagos,cantidad_otros) 
    values (NULL, '$fecha_gasto','0','$cantidad_compras','$cantidad_mantenimiento','$cantidad_imagen ','$cantidad_pagos','$cantidad_otro')";
    $resultado = mysqli_query($con, $queryFlujo);

    if(!$resultado){
        die("Query Failed");
    }
    
    $_SESSION['mensaje'] ='¡Se agrego El Gasto exitosamente!';
    $_SESSION['tipoMensaje'] ='success';

    header("Location: Gastos.php");
}


?>