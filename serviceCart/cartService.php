<?php

include "../model/Bd.php";
include "./clases/Cart.php";

$base = new Bd();
$vector=json_decode( file_get_contents("php://input"),true);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $datos = Cart::getAll($base->link);
    header("HTTP/1.1 200 OK");
    echo json_encode($datos);
    exit();
}

/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lineaCarrito = new Cart(0, $_POST['idUnico'], $_POST['idProducto'], $_POST['cantidad'], $_POST['dniCliente']);
    $lineaCarrito->insertarLineaCarrito($base->link);
    
    // Obtén la fila recién insertada después de la inserción
    $idCarritoInsertado = $base->link->lastInsertId();
    $filaInsertada = $lineaCarrito->obtenerLineaCarritoPorId($base->link, $idCarritoInsertado);
    header('Content-Type: application/json');
    // Devuelve la fila como JSON
    echo json_encode($filaInsertada);
    exit();
} */


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lineaCarrito = new Cart('', $vector['idUnico'], $vector['idProducto'], $vector['cantidad'], $vector['dniCliente']);
    if($lineaCarrito->insertarLineaCarrito($base->link)){
        http_response_code(200);
        echo json_encode("insertado");
    }else {
        http_response_code(500); 
        echo json_encode("no insertado");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $idCarrito = $_GET['idCarrito'];

    $cart = new Cart($idCarrito, 0, 0, 0, 0);
    
    if ($cart->deleteLineaCarrito($base->link)) {
        http_response_code(200); 
        echo json_encode(["message" => "Eliminación exitosa"]);
    } else {
        http_response_code(500); 
        echo json_encode(["message" => "Error en la eliminación"]);
    }
}

if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    $idProducto = $_GET['idProducto'];
    $cantidad = $_GET['cantidad'];

    $cart = new Cart(0,0,$idProducto,$cantidad,0);

    if($cart->updateCarrito($base->link)){
        http_response_code(200); 
        echo json_encode(["message" => "update exitoso"]);
    }else {
        http_response_code(500); 
        echo json_encode(["message" => "Error en el update"]);
    }
}