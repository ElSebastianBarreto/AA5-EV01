<?php
//configuracion para la conexion con la base de datos
class Connection
{
  public $host = 'localhost';
  public $dbname = 'prueba';
  public $port ="5432";
  public $user = 'postgres';
  public $password = 'root';
  public $driver = 'pgsql';
  public $connect;

  public static function getConnection()
  {
    try {
      $connection = new Connection();
      $connection->connect = new PDO("{$connection->driver}:host={$connection->host};port={$connection->port};dbname={$connection->dbname}", $connection->user, $connection->password);
      $connection->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $connection->connect;
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}
?>