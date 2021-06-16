<?php
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}


	include 'crud/Conexion.php';
	$id2 = $_POST['id2'];
	$codigo2 = $_POST['txt2Codigo'];
	$nombre2 = $_POST['txt2Nombre'];
	$stock2 = $_POST['txt2Stock'];
	$precio2 = $_POST['txt2Precio'];

	$sentencia = $bd->prepare("UPDATE productos SET codigo = ?, nombre = ?, stock = ?, precio = ? WHERE id = ?;");
	$resultado = $sentencia->execute([$codigo2,$nombre2,$stock2,$precio2,$id2]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>
