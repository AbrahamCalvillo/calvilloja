<?php
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set("display_errors", "1");
date_default_timezone_set("America/Mexico_City");
spl_autoload_register(function( $NombreClase ) {
    require_once $NombreClase . '.php';
});

class Productos {

    public $id_producto = 0;
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
                $id_producto, $codigo_barras, $nombre_producto, $stock, $precio_venta
        );
        while ($query->fetch()) {
            $producto = new Productos();
            $producto->id_producto = $id_producto;
            $producto->codigo_barras = $codigo_barras;
            $producto->nombre_producto = $nombre_producto;
            $producto->stock = $stock;
            $producto->precio_venta = $precio_venta;
            array_push($retorno, $producto);
        }
        $query->close();
        $cnn->close();
        return $retorno;
    }
    function ArrayMessage($status, $message) {
       $retorno = array("status" => $status, "message" => $message, "date" => date("Y-m-d H:i:s"));
       return $retorno;
    }
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
