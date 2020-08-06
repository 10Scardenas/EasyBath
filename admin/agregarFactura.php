<?php

include("conection_database.php");

if(isset($_POST['agregarFactura'])){
    #informacion de baño
    $id_banio = $_POST['id_banio'];
    $empresa = $_POST['empresa'];
    $fecha_inicial = $_POST['fecha_inicial'];
    $fecha_cobro = $_POST['fecha_cobro'];
    $monto_mensual = $_POST['monto_mensual'];
    $tipo_pago = $_POST['tipo_pago'];
    $cuenta = $_POST['cuenta']; 
    
    #informacion empresa
    
    $rfc = $_POST['rfc'];
    $contacto = $_POST['contacto'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $ubicacion = $_POST['ubicacion'];  
    
    
    $query = "INSERT INTO renta(id_renta, id_banio,empresa,fecha_inicial,fecha_cobro,monto_mensual,tipo_pago,cuenta,control_mensual) values (NULL, '$id_banio','$empresa','$fecha_inicial','$fecha_cobro','$monto_mensual','$tipo_pago','$cuenta','en mora')";
    
    $resultado = mysqli_query($con, $query);

    $queryban = "UPDATE banio set estado = 'rentado' WHERE id_banio = $id_banio ";
    
    $resultadoban = mysqli_query($con, $queryban);    

    $queryemp = "INSERT INTO cliente(empresa, rfc, contacto, correo,telefono, ubicacion, comentarios) values ('$empresa', '$rfc', '$contacto','$correo','$telefono','$ubicacion', 'sin comentarios para esta empresa')";
    
    $resultadoemp = mysqli_query($con, $queryemp);  
     
    $queryCobros = "INSERT INTO cobros(id_cobro, id_banio, empresa, monto_mensual, fecha_inicio, fecha_fin, estado, forma_pago ) 
    values (NULL, '$id_banio', '$empresa', '$monto_mensual', '$fecha_inicial', '$fecha_cobro', 'no cobrado','$tipo_pago')";
    
    $resultadoCobros = mysqli_query($con, $queryCobros); 

    if(!$resultado and !$resultadoban and !$resultadou and !$resultadoCobros){
        
        die("Query Failed");
        
    }
    
    $_SESSION['mensaje'] ='¡Se realizo la renta exitosamente!';
    $_SESSION['tipoMensaje'] ='success';

    header("Location: Facturas.php");
}

?>