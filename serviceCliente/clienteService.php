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
            $dato = "El cliente ya existe";
            require "../views/messageError.php";
        } else {
            $cli->insertCliente($base->link);
            header("HTTP/1.1 200 OK");
            $dato = "El cliente se ha insertado correctamente";
            require "../views/messageError.php";
           // echo json_encode($_POST['dniCliente']);
            exit();
        }
    }
}
