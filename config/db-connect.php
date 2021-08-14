<?php
  
class dbConnect {

  public static function connection() {
    try {
      $connect = new PDO('mysql:host=localhost; dbname=prueba', 'root', ''); 
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $connect->exec("SET CHARACTER SET UTF8");
    } catch (Exception $e) {
      die("Error al conectar con la Base de datos ". $e->getMessage());
    }
    return $connect;
  }
}
?>