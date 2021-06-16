<?php
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'crud/Conexion.php';
	$codigo = $_POST['txtCodigo'];
	$nombre = $_POST['txtNombre'];
	$stock = $_POST['txtStock'];
	$precio = $_POST['txtPrecio'];

	$sentencia = $bd->prepare("INSERT INTO productos(codigo,nombre,stock,precio) VALUES (?,?,?,?);");
	$resultado = $sentencia->execute([$codigo,$nombre,$stock,$precio]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>
