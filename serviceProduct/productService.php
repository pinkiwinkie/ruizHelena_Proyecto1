<?php
include "../model/Bd.php";
include "./clases/Product.php";

$base = new Bd();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $dato = Product::getAll($base->link);
        $dato->setFetchMode(PDO::FETCH_ASSOC);

        $resultArray = [];

        while($row = $dato->fetch()){
            array_push($resultArray, $row);
        }

        header("HTTP/1.1 200 OK");
        echo json_encode($resultArray);
        exit();
}