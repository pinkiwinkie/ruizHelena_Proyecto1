<?php

class Cart
{
    private $idCarrito;
    private $idUnico;
    private $dniCliente;
    private $idProducto;
    private $cantidad;

    function __construct($idCarrito, $idUnico, $idProducto = "", $cantidad = "", $dniCliente = "")
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
            $query = "SELECT c.*, p.nombre, p.precio, p.foto FROM carrito c
            JOIN productos p ON c.idProducto = p.idProducto";
            $result = $link->prepare($query);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
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
            $query = "DELETE FROM carrito WHERE idCarrito = :idCarrito";
            $result = $link->prepare($query);
            $result->bindParam(':idCarrito', $this->idCarrito);
            return $result->execute();
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            //require "vistas/mensaje.php";
            die();
        }
    }

    function updateCarrito($link)
    {
        try{
            $query= "UPDATE carrito SET cantidad = :cantidad WHERE idCarrito = :idCarrito";
            $result =$link->prepare($query);
            $result->bindParam(':cantidad', $this->cantidad);
            $result->bindParam(':idCarrito', $this->idCarrito);
            return $result->execute();
        }catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            //require "vistas/mensaje.php";
            die();
        }
    }
}
