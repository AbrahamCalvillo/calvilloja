<?php
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'crud/Conexion.php';
	$nombre = $_POST['txtNombre'];
	$puesto = $_POST['txtPuesto'];
	$turno = $_POST['txtTurno'];

	$sentencia = $bd->prepare("INSERT INTO empleados(nombre,puesto,turno) VALUES (?,?,?);");
	$resultado = $sentencia->execute([$nombre,$puesto,$turno]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>
