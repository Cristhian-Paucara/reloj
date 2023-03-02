<?php
    class BaseDatos extends SQLite3{
        function_contruct(){
            $this->open('usuarios.db');
        }
    }
    $db = new BaseDatos();
    if($db){
        echo"<p> La base de datos usuarios fue abierta exitosamente</p>";
    }else{
        echo"<p>EROOR al abrir la base de datos usuarios</p>";
    }
?>