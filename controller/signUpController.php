<?php
require "../../app/model/ClienteModel.php";
require "../../app/model/Bd.php";
if(isset($_POST['register'])){
    $link = new Bd;
    $cli = new ClienteModel($_POST['dniCliente'],$_POST['nombre'],$_POST['direccion'],$_POST['email'],$_POST['pwd']);
    if($cli->search($link->link)){
        $dato="El cliente ya existe";
        require "../views/messageError.php";
    } else{
        $cli->insertCliente($link->link);
        $dato="El cliente se ha insertado correctamente";
        require "../views/messageError.php";
    }
} else require "../../public/html/login.php";