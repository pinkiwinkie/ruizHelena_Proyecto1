<?php
include "../model/Bd.php";
include "./clases/Product.php";

$base = new Bd();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['idProducto'])) {
        $idProducto = $_GET['idProducto'];
        $product = new Product($idProducto);
        $productoEncontrado = $product->buscarProductoPorId($base->link);
        if($productoEncontrado){
            echo json_encode($productoEncontrado);
        }else {
            echo "Producto no encontrado"; //falta header-> codigo de estado
        }
        
    } else {
        $dato = Product::getAll($base->link);
        $dato->setFetchMode(PDO::FETCH_ASSOC);  //usar fecthAll
    
        $resultArray = [];
    
        while($row = $dato->fetch()){
            array_push($resultArray, $row);
        }
    
        header("HTTP/1.1 200 OK");
        echo json_encode($resultArray);
        exit();
    }
}