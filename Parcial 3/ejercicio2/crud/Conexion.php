<?php

$servername = "127.0.0.1";
$database = "calvilloja1";
$username = "root";
$password = "";

  class Conexion{
    public function conectar(){
      $conexion = new PDO(mysqli_connect($servername, $username, $password, $database));
      if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
      }
      echo "Connected successfully";
      return $conexion;
    }
  }

?>
