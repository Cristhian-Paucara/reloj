
<?php
    date_default_timezone_set('America/Manaus'); //define la zona horaria
    $hora_actual = date("H:i:s",time());
    $fecha_actual = date("Y-m-d");
    $justificacion = isset($_POST["justifi"]);
    // $filtroFecha;
    // $filtroFecha = strtotime($_POST["filtro"]);
    // echo $filtroFecha;
    // if($filtroFecha){
    //     echo '<script language="javascript">console.log('.$filtroFecha.');</script>';
    //     //header('Location: ./');
    // };

    
    if(isset($_POST["cristhian"])){
        $insert = "insert into registros (id,tipo,fecha,justificativo,afavor,hora) values (582427,'ENTRADA', DATE('now'), '$justificacion', 0, '$hora_actual')";
        $db->exec($insert);//insertar datos a base de datos
        header('Location: ./'); //redirecciona al index despues de insertar
    }else if(isset($_POST["sofia"])){
        $insert = "insert into registros (id,tipo,fecha,justificativo,afavor,hora) values (157,'ENTRADA', DATE('now'), '$justificacion', 0, '$hora_actual')";
        $db->exec($insert);
        header('Location: ./');
    }else if(isset($_POST["wilson"])){
        $insert = "insert into registros (id,tipo,fecha,justificativo,afavor,hora) values (343,'ENTRADA', DATE('now'), '$justificacion', 0, '$hora_actual')";
        $db->exec($insert);
        header('Location: ./');
    }else if(isset($_POST["freddy"])){
        $insert = "insert into registros (id,tipo,fecha,justificativo,afavor,hora) values (628,'ENTRADA', DATE('now'), '$justificacion', 0, '$hora_actual')";
        $db->exec($insert);
        header('Location: ./');
    }else if(isset($_POST["edwin"])){
        $insert = "insert into registros (id,tipo,fecha,justificativo,afavor,hora) values (458741,'ENTRADA', DATE('now'), '$justificacion', 0, '$hora_actual')";
        $db->exec($insert);
        header('Location: ./');
    }else if(isset($_POST["carla"])){
        $insert = "insert into registros (id,tipo,fecha,justificativo,afavor,hora) values (652986,'ENTRADA', DATE('now'), '$justificacion', 0, '$hora_actual')";
        $db->exec($insert);
        header('Location: ./');
    };
    
    //https://www.youtube.com/watch?v=S8LxTlAQmk4 ---> video referencia para proceso
?>