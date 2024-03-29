<?php
    include("conex.php");
    include("reloj.php");
    
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
    <script src="app.js"></script>
</head>
<body>
    <form action="" method="post">
        <div class="cont_principal">
            <div class="cont_registro">
                <div class="reloj">
                    <p class="dia" id="dia">--</p>
                    <p class="mes" id="mes">--</p>
                    <div class="hora" id="hora">
                        <p>00</p>
                        <p class="separador">:</p>
                        <p>00</p>
                        <p class="separador">:</p>
                        <p>00</p>
                    </div>
                    <input type="text" name="justifi"  placeholder = "Justificacion">
                </div>
                <div class="boton">
                    <input type="submit" name="sofia" id="sofia" value="SOFIA">
                    <input type="submit" name="wilson" id="wilson" value="WILSON">
                    <input type="submit" name="freddy" id="freddy" value="FREDDY">
                    <input type="submit" name="edwin" id="edwin" value="EDWIN">
                    <input type="submit" name="carla" id="carla" value="CARLA">
                    <input type="submit" name="cristhian" id="cristhian" value="CRISTHIAN">
                    <input type="submit" name="jhoselin" id="jhoselin" value="JHOSELIN">
                </div>
            </div>
            <div class="general">
                <div class="detalle_total">
                    <div class="det_titulo">
                        <h2>Detalle General</h2>
                    </div>
                    <div class="subtitulos">
                        <p>NOMBRE</p>
                        <p>ATRASOS</p>
                        <p>A FAVOR</p>
                        <p>T. Pagar</p>
                        <p>Cancelado</p>
                        <p>Saldo</p>
                    </div>
                    <div class="informacion">
                        <?php 
                            $select2 = "select (select a.nombre from funcionarios a where a.id=c.id) as nombre,
                            ((select count(*) from registros b where cast((strftime('%w', b.fecha)) as integer) <> 6 and b.hora > '08:05:59' and c.id = b.id and justificativo = '' or justificativo is null) 
                            +
                            (select count(*) from registros b where cast((strftime('%w', b.fecha)) as integer) = 6 and b.hora > '08:35:59' and c.id = b.id and justificativo = '' or justificativo is null)) as total,
                            (select count(*) from registros where afavor <> 0 and id = c.id) as afavor,
                            (((select count(*) from registros b where cast((strftime('%w', b.fecha)) as integer) <> 6 and b.hora > '08:05:59' and c.id = b.id and justificativo = '' or justificativo is null)  
                            +
                            (select count(*) from registros b where cast((strftime('%w', b.fecha)) as integer) = 6 and b.hora > '08:35:59' and c.id = b.id and justificativo = '' or justificativo is null))*5) as t_general,
                            '1' as cancelado,'2' as saldo
                            from registros c 
                            GROUP BY 1
                            order by id;";
                            $resultado2 = $db->query($select2);
                            while($row2 = $resultado2->fetchArray()){
                        ?>
                            <div class="td_nombre"><?php echo $row2["nombre"];?></div>
                            <div class="td_dato"><?php echo $row2["total"];?></div>
                            <div class="td_dato"><?php echo $row2["afavor"];?></div>
                            <div class="td_dato"><?php echo $row2["t_general"];?></div>
                            <div class="td_dato"><?php echo $row2["cancelado"];?></div>
                            <div class="td_dato"><?php echo $row2["saldo"];?></div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabla">
            <div class="tb-title">Datos de Ingreso 
                <input type="date" name="filtro" id="filtrofecha" value="<?php echo $filtroFecha?>">
                <input type="submit" name="b_fecha" value="Buscar" id="btnbuscar">
            </div>
            <div class="tb-header">Numero</div>
            <div class="tb-header">Nombre</div>
            <div class="tb-header">Tipo Reg.</div>
            <div class="tb-header">Fecha</div>
            <div class="tb-header">Hora</div>
            <div class="tb-header">Justificacion</div>
            <?php 
                $select = "select '1' as fila,
                (select a.nombre from funcionarios a where a.id=b.id) as nombre,
                b.tipo,b.fecha,b.hora,b.justificativo 
                from registros b 
                where b.fecha = '$filtroFecha' 
                order by b.fecha desc, b.hora desc";
                $resultado = $db->query($select);
                //$num_registros = 8;
                $select3 = $db->query("select count(*) from registros where fecha = '$filtroFecha'");
                $result = $select3->fetchArray();
                $num_registros = $result[0] + 1;
                while($row = $resultado->fetchArray()){
                    $num_registros--;
                    // echo "<script>console.log('$num_registros');</script>";
            ?>
            <div class="tb-item"><?php echo $num_registros;?></div>
            <div class="tb-item"><?php echo $row["nombre"];?></div>
            <div class="tb-item"><?php echo $row["tipo"];?></div>
            <div class="tb-item"><?php echo $row["fecha"];?></div>
            <?php 
            
                if (($diasemana = date('N',strtotime($filtroFecha))) == 6){                    
                    if(strtotime($row["hora"]) > strtotime("08:35:59")){
            ?>
                        <div class="tb-item" id="hora"><?php echo $row["hora"];?></div>
            <?php
                    }else{
            ?>
                        <div class="tb-item" ><?php echo $row["hora"];?></div>
            <?php
                    }
                }else{
                    
                    if(strtotime($row["hora"]) > strtotime("08:05:59")){
            ?>
                        <div class="tb-item" id="hora"><?php echo $row["hora"];?></div>
            <?php
                    }else{
            ?>
                        <div class="tb-item" ><?php echo $row["hora"];?></div>
            <?php
                    }
                }
            ?>
            <div class="tb-item"><?php echo $row["justificativo"];?></div>
            <?php
                }
                //echo "<script>console.log('$num_registros');</script>";
            ?>
        </div>
    </form>
    <div id="popup" style="display: none;">
            <h1>MENSAJE</h1>
    </div>
    <!-- <script src="app.js"></script> -->
</body>
</html>