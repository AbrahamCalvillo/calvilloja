<div id="modalProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Producto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Código de barras:</label>
                        <div class="form-group input-group">

                            <input type="text" id="txtCodigoBarras" ng-model="producto.codigo_barras" class="form-control" />
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nombre del producto:</label>
                            <input type="text" id="txtNombreProducto" ng-model="producto.nombre_producto" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Stock:</label>
                        <div class="form-group input-group">
                            <input type="text" id="txtStock" ng-model="producto.stock" class="form-control" />
                            <span class="input-group-addon">0.00</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label>Precio Venta:</label>
                        <div class="form-group input-group">

                            <input type="text" id="txtStock" ng-model="producto.precio_venta" class="form-control" />
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" ng-click="Grabar()" class="btn btn-primary" ><i class="glyphicon glyphicon-floppy-disk"></i> Grabar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancelar</button>
            </div>
        </div>

    </div>
</div>
