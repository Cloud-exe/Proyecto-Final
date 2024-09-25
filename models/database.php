<?php
class DataBase
{
  //Constantes de la base de datos
  const SERVIDOR = 'localhost';
  const USUARIODB = 'root';
  const PASSDB = '';
  const NOMBREDB = 'gestion_biblioteca';

  //Conexión a la base de datos
  public static function Conectar()
  {
    try {
      $con = new PDO("mysql:host=" . self::SERVIDOR . ";dbname=" . self::NOMBREDB, self::USUARIODB, self::PASSDB);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $con;
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }
}
