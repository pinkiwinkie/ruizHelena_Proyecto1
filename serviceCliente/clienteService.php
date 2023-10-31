<?php

include "../model/Bd.php";
include "Cliente.php";

$base = new Bd();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $dato = Cliente::getAll($base->link);
    $dato->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    echo json_encode($dato->fetchAll());
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $cli = new Cliente($_POST['dniCliente'], $_POST['nombre'], $_POST['direccion'], $_POST['email'], $_POST['pwd']);
        if ($cli->search($base->link)) {
            $response = array('message' => 'El cliente ya existe');
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $cli->insertCliente($base->link);
            $response = array('message' => 'El cliente se ha insertado correctamente');
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }
    }
}
