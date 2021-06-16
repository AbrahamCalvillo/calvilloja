<?php
class Productos {

    public $id = 0;
    public $codigo_barras = "";
    public $nombre_producto = "";
    public $stock = 0;
    public $precio_venta = 0;

    function Buscar($textoBuscar) {
        $mysql = new Connection();
        $cnn = $mysql->getConnection();
        $retorno = array();
        $query = $cnn->prepare("call proc_ProductoBuscar (?)");
        $query->bind_param("s", $textoBuscar);
        $query->execute();
        $producto = new Productos(); //Variable
        $query->bind_result(
                $id, $codigo, $nombre, $stock, $precio
        );
        while ($query->fetch()) {
            $producto = new Productos();
            $producto->id = $id;
            $producto->codigo = $codigo;
            $producto->nombre = $nombre;
            $producto->stock = $stock;
            $producto->precio = $precio;
            array_push($retorno, $producto);
        }
        $query->close();
        $cnn->close();
        return $retorno;
    }
}

if (isset($_GET["functionToCall"]) && !empty($_GET["functionToCall"])) {
    $functionToCall = $_GET["functionToCall"];
    $json_data = json_decode(file_get_contents('php://input'));
    switch ($functionToCall) {
        case "buscar_producto":
            $producto = new Productos();
            echo json_encode($producto->Buscar(utf8_decode($json_data->textoBuscar)));
            break;
    }
}
?>
