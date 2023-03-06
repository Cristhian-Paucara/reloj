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
            <a href="#"><span></span><span></span><span></span><span></span>SOFIA</a>
            <a href="#"><span></span><span></span><span></span><span></span>WILSON</a>
            <a href="#"><span></span><span></span><span></span><span></span>FREDDY</a>
            <a href="#"><span></span><span></span><span></span><span></span>EDWIN</a>
            <a href="#"><span></span><span></span><span></span><span></span>CARLA</a>
            <a href="#"><span></span><span></span><span></span><span></span>CRISTHIAN</a>
        </li>
    </div>
    <dvi class="tabla">
        <div class="tb-title">Datos de Ingreso</div>
        <div class="tb-header">id</div>
        <div class="tb-header">Nombre</div>
        <div class="tb-header">Apellido</div>
        <div class="tb-header">Cargo</div>
        <br>
        <?php 

        $select = "select id,nombre,apellido,cargo from funcionarios";
        $resultado = $db->query($select);
        while($row = $resultado->fetchArray()){
        ?>
        <div class="tb-item"><?php echo $row["id"];?></div>
        <div class="tb-item"><?php echo $row["nombre"];?></div>
        <div class="tb-item"><?php echo $row["apellido"];?></div>
        <div class="tb-item"><?php echo $row["cargo"];?></div><br>
        <?php }?>
    </dvi>
    <script src="app.js"></script>
</body>
</html>