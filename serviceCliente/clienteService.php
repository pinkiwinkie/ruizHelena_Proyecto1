<?php

include "../model/Bd.php";
include "./clases/Cliente.php";

$base = new Bd();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if (isset($_GET['dniCliente']) && isset($_GET['pwd'])) {
        $dniCliente = $_GET['dniCliente'];
        $cli= new Cliente($dniCliente);
        $cli= $cli->search($base->link);
        if($cli){
            $pwd = $_GET['pwd'];
            if(password_verify($pwd, $cli['pwd'])){
                echo json_encode($cli);
            exit();
            }else {
                echo json_encode('noConfirmado');
                exit();
            }
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
    $passwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
    $cli = new Cliente($_POST['dniCliente'], $passwd, $_POST['nombre'], $_POST['direccion'], $_POST['email']);
    if ($cli->search($base->link)) {
        echo json_encode('noInsertado');
        exit();
    } else {
        $cli->insertCliente($base->link);
        echo json_encode('insertado');
        exit();
    }
}