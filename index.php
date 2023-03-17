<?php
    include("conex.php");
    include("reloj.php")
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Control QA</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
    <form action="" method="post">
        <div class="reloj">
            <p class="dia" id="dia">--</p>
            <p class="mes" id="mes">--</p>
            <div class="hora" id="hora">
                <p>00</p>
                <p>00</p>
                <p>00</p>
            </div>
            <input type="text" name="justifi" placeholder = "Justificacion">
        </div>
    
        <div class="boton">
                <input type="submit" name="sofia" id="sofia" value="SOFIA">
                <input type="submit" name="wilson" id="wilson" value="WILSON">
                <input type="submit" name="freddy" id="freddy" value="FREDDY">
                <input type="submit" name="edwin" id="edwin" value="EDWIN">
                <input type="submit" name="carla" id="carla" value="CARLA">
                <input type="submit" name="cristhian" id="cristhian" value="CRISTHIAN">
        </div>
    
        <div class="tabla">
            <div class="tb-title">Datos de Ingreso 
                <input type="date" name="filtro" id="filtrofecha">
                <input type="submit" name='b_fecha' value="buscar">
            </div>
            <div class="tb-header">Numero</div>
            <div class="tb-header">Nombre</div>
            <div class="tb-header">Tipo Reg.</div>
            <div class="tb-header">Fecha</div>
            <div class="tb-header">Hora</div>
            <div class="tb-header">Justificacion</div>
            <?php 
            $select = "select ROW_NUMBER () over () as fila,(select a.nombre from funcionarios a where a.id=b.id) as nombre,
            b.tipo,b.fecha,b.hora,b.justificativo from registros b 
            where b.fecha = '$fecha_actual'
            order by b.fecha desc, b.hora desc";
            $resultado = $db->query($select);
            while($row = $resultado->fetchArray()){
            ?>
            <div class="tb-item"><?php echo $row["fila"];?></div>
            <div class="tb-item"><?php echo $row["nombre"];?></div>
            <div class="tb-item"><?php echo $row["tipo"];?></div>
            <div class="tb-item"><?php echo $row["fecha"];?></div>
            <?php if($row["hora"]>strtotime("08:00:00")){?>
                    <div class="tb-item" id="hora"><?php echo $row["hora"];?></div><?php
                }else{?>
                    <div class="tb-item" ><?php echo $row["hora"];?></div><?php
                };?>
            <div class="tb-item"><?php echo $row["justificativo"];?></div>
            <?php }?>
        </div>
    </form>
    <div id="popup" style="display: none;">
            <h1>MENSAJE</h1>
        </div>
    <script src="app.js"></script>
</body>
</html>