<?php
    require_once('../claseUsuario/usuario.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET' 
        && isset($_GET['usuario']) ){
            Client::infoUsuario($_GET['usuario']);
        }

?>