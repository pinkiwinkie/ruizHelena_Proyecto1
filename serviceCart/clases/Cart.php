<?php

class Cart
{
    private $idCarrito;
    private $idUnico;
    private $dniCliente;
    private $idProducto;
    private $cantidad;

    function __construct($idCarrito, $idUnico, $idProducto = "", $cantidad = "",$dniCliente = "")
    {
        $this->idCarrito = $idCarrito;
        $this->idUnico = $idUnico;
        $this->dniCliente = $dniCliente;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
    }

    static function getAll($link)
    {
        try {
            $query = "SELECT * FROM carrito";
            $result = $link->prepare($query);
            $result->execute();
            return $result;
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            //require "vistas/mensaje.php";
            die();
        }
    }

    function insertarLineaCarrito($link)
    {
        try {
            $query = "INSERT INTO carrito VALUES(:idCarrito, :idUnico, :dniCliente, :idProducto, :cantidad)";
            $result = $link->prepare($query);
            $result->bindParam(':idCarrito', $this->idCarrito);
            $result->bindParam(':idUnico', $this->idUnico);
            $result->bindParam(':dniCliente', $this->dniCliente);
            $result->bindParam(':idProducto', $this->idProducto);
            $result->bindParam(':cantidad', $this->cantidad);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            //require "vistas/mensaje.php";
            die();
        }
    }

    function deleteLineaCarrito($link)
    {
        try {
            $query = "DELETE FROM carrito WHERE idProducto = :idProducto";
            $result = $link->prepare($query);
            $result->bindParam(':idProducto', $this->idProducto);
            return $result->execute();
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            //require "vistas/mensaje.php";
            die();
        }
    }
}
