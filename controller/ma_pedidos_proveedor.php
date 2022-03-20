<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: aplication/json');
    require_once("../config/conexion.php");
    require_once("../models/MA_Pedidos_proveedor.php");
    $pedidos= new Pedidos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

    case "GetPedidos":
        $datos=$pedidos->get_pedidos();
        echo json_encode($datos);
    break;
    
    case "GetUno":
        $datos=$pedidos->get_pedido($body["ID"]);
        echo json_encode($datos);
    break;

    case "InsertarPedido":
        $datos=$pedidos->insert_pedido($body["ID_SOCIO"], $body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
        echo json_encode("Pedido Agregado");
    break;

    case "UpdatePedido":
        $datos=$pedidos->update_pedido($body["ID_SOCIO"],$body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"],$body["ID"]);
        echo json_encode("Pedido Actualizado");
    break;

    case "deletePedido":
    $datos=$pedidos->delete_pedido($body["ID"]);
    echo json_encode("Pedido borrado");
    break;
}
?>