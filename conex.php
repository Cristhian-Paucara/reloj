<?php
    class BaseDatos extends SQLite3{
        function __construct()
        {
            $this->open("usuarios.db");
        }
    }
    
?>