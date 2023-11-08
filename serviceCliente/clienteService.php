<?php

include "../model/Bd.php";
include "./clases/Cliente.php";

$base = new Bd();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if (isset($_GET['dniCliente']) && isset($_GET['pwd'])) {
        $dniCliente = $_GET['dniCliente'];
        $pwd = $_GET['pwd'];
        
        $cliente = new Cliente($dniCliente, $pwd);
        $clienteInfo = $cliente->validarUsuario($base->link);

        if ($clienteInfo) {
            //password_verify($pwd, $clienteInfo['pwd']);
            echo json_encode($clienteInfo);
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
    $cli = new Cliente($_POST['dniCliente'], $_POST['pwd'], $_POST['nombre'], $_POST['direccion'], $_POST['email']);
    if ($cli->search($base->link)) {
        //$passwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
        echo json_encode('noInsertado');
        exit();
    } else {
        $cli->insertCliente($base->link);
        echo json_encode('insertado');
        exit();
    }
}