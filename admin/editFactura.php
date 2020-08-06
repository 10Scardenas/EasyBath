<?php
    include("conection_database.php");

    if(isset($_POST['update'])){
        $codigo = $_GET['codigo'];
        $control_mensual = $_POST['control_mensual'];

        $id_renta = $_GET['id_renta']; 
        $empresa = $_GET['empresa']; 
        $id_banio = $_GET['id_banio']; 
        $monto_mensual = $_GET['monto_mensual'];
        $tipo_pago = $_GET['tipo_pago']; 
        $fecha_inicial = $_GET['fecha_inicial'];
        $fecha_cobro = $_GET['fecha_cobro'];   
        
        #informacion de cobros
        $fecha_actual = date("Y-m-d"); 
        $fecha_actualizada=date("Y-m-d",strtotime($fecha_actual."+ 1 month")); 

        $sqlFechaFin="SELECT * FROM renta where fecha_cobro='$fecha_actual'" ;
        $resultFechaFin = mysqli_query($con, $sqlFechaFin);

        $queryfechas = "UPDATE renta set fecha_inicial = '$fecha_actual' , fecha_cobro= '$fecha_actualizada' WHERE fecha_cobro='$fecha_actual'";
        $resultadofechas = mysqli_query($con, $queryfechas);  
                          
        $queryCobros = "INSERT INTO cobros(id_cobro, id_renta, id_banio, empresa, monto_mensual, fecha_inicio, fecha_fin, estado, forma_pago) values (NULL, '$id_renta', '$id_banio', '$empresa', '$monto_mensual', '$fecha_inicial', '$fecha_cobro', 'en mora','$tipo_pago')";
        $resultadoCobros = mysqli_query($con, $queryCobros);



        header("Location: Facturas.php");

    
    }   
?>
