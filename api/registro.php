<?php
    require_once('../claseUsuario/usuario.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST' 
        && isset($_GET['usuario']) && isset($_GET['nombre']) && isset($_GET['clave']) ){
            Client::crearUsuario($_GET['usuario'], $_GET['nombre'], $_GET['clave']);
        }

?>