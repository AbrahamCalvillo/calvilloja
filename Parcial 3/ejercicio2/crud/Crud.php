<?php
    require_once "conexion.php";
    class Crud extends Conexion{
      public function MostrarDatos(){
        $sql = "SELECT id,
                       nombre,
                       puesto,
                       turno
                 from empleados";
        $query = Conexion::conectar()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
        $query->close();
      }
    }

?>
