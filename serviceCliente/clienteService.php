<?php

include "../model/Bd.php";
include "./clases/Cliente.php";

$base = new Bd();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['dniCliente']) && isset($_GET['pwd'])) {
        $cli = new Cliente($_GET['dniCliente'], $_GET['pwd']);
        $dato = $cli->search($base->link);
        if ($dato) {
            echo json_encode('confirmado');
            exit();
        } else {
            echo json_encode('noConfirmado');
            exit();
        }
    } else {
        $dato = Cliente::getAll($base->link);
        $dato->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($dato->fetchAll());
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cli = new Cliente($_POST['dniCliente'], $_POST['nombre'], $_POST['direccion'], $_POST['email'], $_POST['pwd']);
    if ($cli->search($base->link)) {
        echo json_encode('noInsertado');
        exit();
    } else {
        $cli->insertCliente($base->link);
        echo json_encode('insertado');
        exit();
    }
}
