<?php
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}


	include 'crud/Conexion.php';
	$id2 = $_POST['id2'];
	$nombre2 = $_POST['txt2Nombre'];
	$puesto2 = $_POST['txt2Puesto'];
	$turno2 = $_POST['txt2Turno'];

	$sentencia = $bd->prepare("UPDATE empleados SET nombre = ?, puesto = ?, turno = ? WHERE id = ?;");
	$resultado = $sentencia->execute([$nombre2,$puesto2,$turno2, $id2]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>
