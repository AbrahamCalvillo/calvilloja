<?php
	if (!isset($_GET['id'])) {
		exit();
	}

	$codigo = $_GET['id'];
	include 'crud/Conexion.php';
	$sentencia = $bd->prepare("DELETE FROM productos WHERE id = ?;");
	$resultado = $sentencia->execute([$codigo]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo "Error";
	}

?>
