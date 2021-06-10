<?php
		include 'crud/Conexion.php';
		$sentencia = $bd->query("SELECT * FROM empleados;");
		$empleados = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>
	<title>PDO</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<div class="container">
		<div class="row">
			<h2>Ejercicio ABC</h2>
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						<ul class="nav nav-tabs card-header-tabs">
							<li class="nav-item">
								<a class="nav-link active" href="#">Empresa</a>
							</li>
						</ul>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<h2><small>Empleados</small></h2>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-dark">
										<thead>
											<tr class="font-weight-bold">
												<td>Id</td>
												<td>Nombre</td>
												<td>Puesto</td>
												<td>Turno</td>
												<td>Editar</td>
												<td>Eliminar</td>
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
														<td><a href="editar.php?id=<?php echo $dato->id; ?>"><span class="material-icons">edit</span></a></td>
														<td><a href="eliminar.php?id=<?php echo $dato->id; ?>"><span class="material-icons">delete</span></a></td>
													</tr>
													<?php
												}
												?>
												<td>
											</td>
										</tr>
									</tbody>
								</table>
								<hr>
									<h3>Ingresar empleado:</h3>
									<form method="POST" action="insertar.php">
										<table>
											<tr>
												<td>Nombre: </td>
												<td><input type="text" name="txtNombre" style="margin:18px auto; display:block;"></td>
											</tr>
											<tr>
												<td>Puesto: </td>
												<td><input type="text" name="txtPuesto"style="margin:18px auto; display:block;"></td>
											</tr>
											<tr>
												<td>Turno: </td>
												<td><input type="text" name="txtTurno"style="margin:18px auto; display:block;"></td>
											</tr>
											<input type="hidden" name="oculto" value="1">
											<tr>
												<td><input type="submit" value="Guardar" style="margin:18px auto; display:block;"></td>
											</tr>
										</form>
								</tr>
							</thead>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<script src="librerias/bootstrap4/jquery-3.4.1.min.js"></script>
<script src="librerias/bootstrap4/popper.min.js"></script>
<script src="librerias/bootstrap4/bootstrap.min.js"></script>
<script src="librerias/sweetalert.min.js"></script>

</body>
</html>
