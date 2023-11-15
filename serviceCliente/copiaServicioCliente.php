<?php

include "../model/Bd.php";
include "./clases/Cliente.php";

$base = new Bd();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['dniCliente']) && isset($_POST['pwd'])) {
        $dniCliente = $_POST['dniCliente'];
        $pwd = $_POST['pwd'];

        $cliente = new Cliente($dniCliente, $pwd);
        $clienteInfo = $cliente->validarUsuario($base->link, $dniCliente, $pwd);

        if ($clienteInfo) {
            $nombreUsuario = Cliente::obtenerNombreUsuario($base->link, $dniCliente);

            setcookie('nombre', $nombreUsuario, 0, '/');
            setcookie('dni', $dniCliente, 0, '/');

            echo json_encode('confirmado');
            exit();
        } else {
            echo json_encode('noConfirmado');
            exit();
        }
    } else {
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
}