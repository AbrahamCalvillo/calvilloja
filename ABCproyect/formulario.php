
<?php
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<!--
 * Description of Productos
 *
 * @author tyrodeveloper
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario A-B-C</title>
        <!--Referencias CSS-->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body id="ng-producto-lista" ng-app="appCatalogos" ng-controller="cProductos">
        <!--PONER AQUÍ EL CÓDIGO HTML-->
        <div class="container-fluid">
            <h1>Formulario A-B-C</h1>
            <hr />
            <a href="#" class="btn btn-primary" ><i class="glyphicon glyphicon-plus"></i> Agregar nuevo producto</a>
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
                      <tr ng-repeat="producto in listaProductos">
                        <td class="text-center"><a href="#" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"></i></a></td>
                        <td class="text-center"><a href="#" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
                        <td>{{producto.codigo_barras}}</td>
                        <td>{{producto.nombre_producto}}</td>
                        <td class="text-right">{{producto.stock|number:2}}</td>
                        <td class="text-right">{{producto.precio_venta| currency}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
        <!--Referencias Javascript-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            var myApp = angular.module('appCatalogos', []);
            myApp.controller('cProductos', function ($scope, $http)
            {var myData = {textoBuscar: ''};
            $scope.producto = {id_producto: 0, codigo_barras: "", nombre_producto: "", stock: 0, precio_venta: 0};
            $http({
              method: "POST",
              url: 'cod-formulario-abc.php?functionToCall=buscar_producto',
              data: myData}).then(function (response) {
                $scope.listaProductos = response.data;
              });
              $scope.BuscarProducto = function () {
                var myData = {textoBuscar: String($("#txtTextoBuscar").val())};
                $http({
                  method: "POST",
                  url: 'cod-formulario-abc.php?functionToCall=buscar_producto',
                  data: myData}).then(function (response) {
                    $scope.listaProductos = response.data;
                  });
                };
              });
        </script>
    </body>
    </html>
