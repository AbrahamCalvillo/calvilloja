<?php
		include 'crud/Conexion.php';
		$sentencia = $bd->query("SELECT * FROM empleados;");
		$empleados = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Proyect2</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<h2>Ejercicio 2</h2>
	<h2><small>Empleados</small></h2>
	<table>
		<thead>
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Puesto</td>
				<td>Turno</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php
				foreach ($empleados as $dato) {
					?>
					<tr>
						<td><?php echo $dato->id; ?></td>
						<td><?php echo $dato->nombre; ?></td>
						<td><?php echo $dato->puesto; ?></td>
						<td><?php echo $dato->turno; ?></td>
					</tr>
					<?php
				}
				?>
				<td>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
