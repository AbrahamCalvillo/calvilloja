<?php
		include 'crud/Conexion.php';
		$sentencia = $bd->query("SELECT * FROM productos;");
		$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	        <title>Formulario A-B-C</title>
	        <!--Referencias CSS-->
	        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<body id="ng-producto-lista" ng-controller="cProductos">
        <!--PONER AQUÍ EL CÓDIGO HTML-->
        <div class="container-fluid">
            <h1>Formulario A-B-C</h1>
            <hr />
						<div class="mo-title">&nbsp;</div>
						<div onClick="loadDynamicContentModal('modalProducto')"
            class="btn btn-success">Agregar Producto</div>
            <br /><br />
            <div class ="row">
                <div class="col-sm-6">
                    <div class="form-group input-group">
                      <input type="text" class="form-control" ng-keyup="$event.keyCode == 13 ? BuscarProducto() : null" id="txtTextoBuscar" placeholder="Código de barras, Nombre del producto" />
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    </div>
                </div>
            </div>
            <div class ="row">
                <div class="col-sm-12">
                  <table class="table table-bordered table-striped table-hover">
                     <thead>
                         <tr>
                             <th colspan="6" class="text-center">Listado de Productos</th>
                         </tr>
                         <tr>
                             <th class="text-center"><i class="glyphicon glyphicon-pencil"></i></th>
                             <th class="text-center"><i class="glyphicon glyphicon-trash"></i></th>
                             <th>Código de barras</th>
                             <th>Nombre Producto</th>
                             <th class="text-right">Stock</th>
                             <th class="text-right">Precio Venta</th>
                         </tr>
                      </thead>
                        <tbody>
                          <tr>
                            <?php
												     foreach ($productos as $dato) {
													     ?>
													     <tr>
                                 <td class="text-center"><a href="editar.php?id=<?php echo $dato->id; ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                 <td class="text-center"><a href="eliminar.php?id=<?php echo $dato->id; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
														     <td><?php echo $dato->codigo; ?></td>
														     <td><?php echo $dato->nombre; ?></td>
														     <td class="text-right"><?php echo $dato->stock; ?></td>
                                 <td class="text-right"><?php echo $dato->precio; ?></td>
														     </tr>
													     <?php
												     }
												     ?>
                          </tr>
                        </tbody>
                 </table>
							</div>
            </div>

						<div id="fondo">
						</div>
						<div class="modal fade" id="bootstrap-modal" role="dialog">
							<div class="modal-dialog modal-sm" role="document" style="witdh:400px">
								<!-- Modal contenido-->
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title">Ingresar producto nuevo</h3>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
									</div>
									<div class="modal-body">
									<form method="POST" action="insertar.php">
										<table>
											<tr>
												<td>Codigo Producto: </td>
												<td><input type="text" name="txtCodigo" style="margin:18px auto; display:block;"></td>
											</tr>
											<tr>
												<td>Nombre Producto: </td>
												<td><input type="text" name="txtNombre"style="margin:18px auto; display:block;"></td>
											</tr>
											<tr>
												<td>Stock: </td>
												<td><input type="text" name="txtStock"style="margin:18px auto; display:block;"></td>
											</tr>
											<tr>
												<td>Precio: </td>
												<td><input type="text" name="txtPrecio"style="margin:18px auto; display:block;"></td>
											</tr>

										<input type="hidden" name="oculto" value="1">
										<tr>
										</table>

												<td><input type="submit" value="Guardar" style="margin:18px auto; display:block;"></td>
											</tr>
										</form>
										<div id="conte-modal">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									</div>
								</div>
							</div>
						</div>

		<script>
		function loadDynamicContentModal(modal){
			var options = {
				modal: true,
				height:300,
				width:600
			};
			$('#conte-modal').load('ObtenerDatos.php?my_modal='+modal, function() {
				$('#bootstrap-modal').modal({show:true});
			});
		}
		$scope.BuscarProducto = function () {
        var myData = {textoBuscar: String($("#txtTextoBuscar").val())};
        $http({
            method: "POST",
            url: 'buscar.php?functionToCall=buscar_producto',
            data: myData}).then(function (response) {
            $scope.listaProductos = response.data;
        });
    };
	</script>


        </div>
				<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js" type="text/javascript"></script>
</body>
</html>
