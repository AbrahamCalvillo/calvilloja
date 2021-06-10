<?php
//     class Conexion{
//       private $host = "localhost";
//       private $user = "abraham";
//       private $password = "calvillo";
//       private $db = "calvilloja1";
//       private $conect;
// }
//       public function_construct(){
//         $conectionString = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
//         try{
//           $this->conect = new PDO($conectionString, $this->user, $this->password);
//           $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         }catch(PDOException $e){
//           $this->conect = 'Error de conexion';
//           echo "Error: " . $e->getMessage();
//         }
//       }
//       public function conect(){
//         return $this->conect;
//       }
//     }
// }

	      $contrasena = 'calvillo';
	      $usuario = 'abraham';
	      $nombrebd= 'calvilloja1';

	      try {
		      $bd = new PDO(
			      'mysql:host=localhost;
			      dbname='.$nombrebd,
			      $usuario,
			      $contrasena,
			      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		      );
	      } catch (Exception $e) {
		      echo "Error de conexión ".$e->getMessage();
	      }
?>
