
<?php
    //error_reporting(0);
    date_default_timezone_set('America/Manaus'); //define la zona horaria
    $hora_actual = date("H:i:s",time());
    $fecha_actual = date("Y-m-d");
    
    if(isset($_POST["justifi"])){
        $justificacion = $_POST["justifi"];
    };
    if(isset($_POST["filtro"])){
        $filtroFecha = $_POST["filtro"];
        
        // echo '<script language="javascript">console.log('.$filtroFecha.');</script>';
    }else{
        $filtroFecha = $fecha_actual;
        // $diasemana = date('N',strtotime($filtroFecha));
        // echo '<script language="javascript">console.log('.$filtroFecha.');</script>';
    };
    /*if($filtroFecha){
        echo '<script language="javascript">console.log('.$filtroFecha.');</script>';
        //header('Location: ./');
    };*/
    // echo '<script language="javascript">console.log('.$diasemana = date('N',strtotime($filtroFecha)).');</script>';
    
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
    }else if(isset($_POST["jhoselin"])){
        $insert = "insert into registros (id,tipo,fecha,justificativo,afavor,hora) values (99999,'ENTRADA', DATE('now'), '$justificacion', 0, '$hora_actual')";
        $db->exec($insert);
        header('Location: ./');
    };
    
    //https://www.youtube.com/watch?v=S8LxTlAQmk4 ---> video referencia para proceso
?>