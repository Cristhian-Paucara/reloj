<?php
    class BaseDatos extends SQLite3{
        function __construct()
        {
            $this->open("usuarios.db");
        }
    }

    $db = new BaseDatos();
    if($db){
        echo"<p> La base de datos usuarios fue abierta exitosamente</p>";
    }else{
        echo"<p>EROOR al abrir la base de datos usuarios</p>";
    }
    //en caso de error por sqlite3 revisar este link para corregir
    //https://parzibyte.me/blog/2018/02/07/habilitar-extension-sqlite3-php/
    $q = <<<sql
    create table if not exists funcionarios 
    (id int,
    nombre text,
    apellido text,
    cargo text);
    sql;
    $r = $db->exec($q);
    if($r){
        echo"<p> La tabla funcionarios fue creada exitosamente</p>";
    }else{
        echo"<p>EROOR al crear tabla usuarios</p>";
    }
    $db->close();

?>