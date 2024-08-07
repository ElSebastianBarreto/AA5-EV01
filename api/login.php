
<?php
    require_once('../claseUsuario/usuario.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST' 
        && isset($_GET['usuario'])  && isset($_GET['clave']) ){
            Client::login($_GET['usuario'], $_GET['clave']);
        }

?>