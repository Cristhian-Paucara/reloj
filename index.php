<?php
    include("conex.php");
    $funcionario = "select * from funcionarios";
    //https://www.youtube.com/watch?v=S8LxTlAQmk4 ---> video referencia para proceso
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reloj Digital</title>
</head>
<body>
    <div class="reloj">
        <p class="dia" id="dia">--</p>
        <p class="mes" id="mes">--</p>
        <div class="hora" id="hora">
            <p>00</p>
            <p>00</p>
            <p>00</p>
        </div>
    </div>
    <div class="boton">
        <li>
            <a type="submit" name="sofia" value="save"><span></span><span></span><span></span><span></span>SOFIA</a>
            <a type="submit" name="wilson" value="save"><span></span><span></span><span></span><span></span>WILSON</a>
            <a type="submit" name="freddy" value="save"><span></span><span></span><span></span><span></span>FREDDY</a>
            <a type="submit" name="edwin" value="save"><span></span><span></span><span></span><span></span>EDWIN</a>
            <a type="submit" name="carla" value="save"><span></span><span></span><span></span><span></span>CARLA</a>
            <a type="submit" name="cristhian" value="save"><span></span><span></span><span></span><span></span>CRISTHIAN</a>
        </li>
    </div>
    <dvi class="tabla">
        <div class="tb-title">Datos de Ingreso</div>
        <div class="tb-header">id</div>
        <div class="tb-header">Nombre</div>
        <div class="tb-header">Tipo Reg.</div>
        <div class="tb-header">Fecha</div>
        <div class="tb-header">Hora</div>
        <div class="tb-header">Justificacion</div>
        <?php 
        $select = "select b.id,(select a.nombre from funcionarios a where a.id=b.id) as nombre,b.tipo,b.fecha,b.hora,b.justificativo from registros b";
        $resultado = $db->query($select);
        while($row = $resultado->fetchArray()){
        ?>
        <div class="tb-item"><?php echo $row["id"];?></div>
        <div class="tb-item"><?php echo $row["nombre"];?></div>
        <div class="tb-item"><?php echo $row["tipo"];?></div>
        <div class="tb-item"><?php echo $row["fecha"];?></div>
        <div class="tb-item"><?php echo $row["hora"];?></div>
        <div class="tb-item"><?php echo $row["justificativo"];?></div>
        <?php }?>
    </dvi>
    <script src="app.js"></script>
</body>
</html>