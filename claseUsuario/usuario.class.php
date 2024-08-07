<?php
    require_once('../connection/connection.php');

    class Client{
        public static function crearUsuario($usuario, $nombre,$clave){
            $connection = new Connection();
            $conn = $connection->getConnection();

            $stmt = $conn->prepare('INSERT INTO usuarios(usuario, nombre, clave)
                VALUES(:usuario, :nombre, :clave)');
            $stmt->bindParam(':usuario',$usuario);
            $stmt->bindParam(':nombre',$nombre);
            $stmt->bindParam(':clave',$clave);
         

            if($stmt->execute()){
                header('HTTP/1.1 201 Cliente creado correctamente');
            } else {
                header('HTTP/1.1 404 Cliente no se ha creado correctamente');
            }
        }


        public static function infoUsuario($usuario){
            $database = new Connection();
            $conn = $database->getConnection();
            $stmt = $conn->prepare('SELECT * FROM usuarios where usuario=:usuario');
            $stmt->bindParam(':usuario',$usuario);
            if($stmt->execute()){
                $result = $stmt->fetchAll();
                echo json_encode($result);
                header('HTTP/1.1 201 OK');
            } else {
                header('HTTP/1.1 404 No se ha podido consultar la info');
            }
        }

    }
