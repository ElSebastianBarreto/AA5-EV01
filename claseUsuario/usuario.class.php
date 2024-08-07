<?php
    require_once('../connection/connection.php');

    class Client{
        //funcion de crear usuarios
        public static function crearUsuario($usuario, $nombre,$clave){
            $connection = new Connection();
            $conn = $connection->getConnection();
//query para insertar el usuario a la tabla usuarios
            $stmt = $conn->prepare('INSERT INTO usuarios(usuario, nombre, clave)
                VALUES(:usuario, :nombre, :clave)');
            $stmt->bindParam(':usuario',$usuario);
            $stmt->bindParam(':nombre',$nombre);
            $stmt->bindParam(':clave',$clave);
         
//mostrar si es correcto la creacion de usuarios o si hubo un error
            if($stmt->execute()){
                header('HTTP/1.1 201 Usuario creado correctamente');
            } else {
                header('HTTP/1.1 404 Usuario no se ha creado correctamente');
            }
        }

//funcion de obtener la informacion de un usuario
        public static function infoUsuario($usuario) {
            $database = new Connection();
            $conn = $database->getConnection();
            //query para obtener la informacion del usuario
            $stmt = $conn->prepare('SELECT * FROM usuarios WHERE usuario=:usuario');
            $stmt->bindParam(':usuario', $usuario);
            //mostrar si es correcto o no se encuentra el usuario
            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                echo json_encode($result);
                header('HTTP/1.1 200 OK');
            } else {
                header('HTTP/1.1 404 No se ha podido consultar la info');
            }
        }

        //funcion de login
public static function login($usuario,$clave){    
    $database = new Connection();
    $conn = $database->getConnection();
    $stmt = $conn->prepare('SELECT * FROM usuarios WHERE usuario=:usuario AND clave=:clave');
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':clave', $clave);
    //mostrar si es correcto o no el login
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $result = $stmt->fetch();
        echo json_encode(["message" => "Login correcto", "usuario" => $result['usuario']]);
        header('HTTP/1.1 200 OK');
    } else {
        echo json_encode(["message" => "la clave o usuario son incorrectos"]);
        header('HTTP/1.1 401 Unauthorized');
    }

}
    }
