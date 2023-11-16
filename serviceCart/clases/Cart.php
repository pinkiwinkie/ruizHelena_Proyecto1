<?php

class Cart
{
    private $idCarrito;
    private $idUnico;
    private $idProducto;
    private $cantidad;
    private $dniCliente;

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
            LEFT JOIN productos p ON c.idProducto = p.idProducto
            ";
            $result = $link->prepare($query);
            $result->execute();
            $resultados = $result->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }
    }

    function obtenerLineaCarritoPorId($link, $idCarrito)
    {
        try {
            $query = "SELECT * FROM carrito WHERE idCarrito = :idCarrito";
            $result = $link->prepare($query);
            $result->bindParam(':idCarrito', $idCarrito);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            //require "vistas/mensaje.php";
            die();
        }
    }


    function insertarLineaCarrito($link){
        try {
            $query = "INSERT INTO carrito (idUnico, idProducto, cantidad, dniCliente) VALUES (:idUnico, :idProducto, :cantidad, :dniCliente)";
            $result = $link->prepare($query);
            $result->bindParam(':idUnico', $this->idUnico);
            $result->bindParam(':idProducto', $this->idProducto);
            $result->bindParam(':cantidad', $this->cantidad);
            $result->bindParam(':dniCliente', $this->dniCliente);
            $result->execute();

            // Devuelve la fila recién insertada
            $this->idCarrito = $link->lastInsertId();
            return $this->obtenerLineaCarritoPorId($link, $this->idCarrito);
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
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

    static function deleteCarrito($link, $idUnico) {
        try {
            $query = "DELETE FROM carrito WHERE idUnico = :idUnico";
            $result = $link->prepare($query);
            $result->bindParam(':idUnico', $idUnico);
            return $result->execute();
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            die();
        }
    }

    function updateCarrito($link)
    {
        try {
            $query = "UPDATE carrito SET cantidad = :cantidad WHERE idCarrito = :idCarrito ";
            $result = $link->prepare($query);
            $result->bindParam(':cantidad', $this->cantidad);
            $result->bindParam(':idCarrito', $this->idCarrito);
            return $result->execute();
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            //require "vistas/mensaje.php";
            die();
        }
    }

    function updateDni($link){
        try {
            $query = "UPDATE carrito SET dniCliente = :dniCliente WHERE idUnico = :idUnico ";
            $result = $link->prepare($query);
            $result->bindParam(':dniCliente', $this->dniCliente);
            $result->bindParam(':idUnico', $this->idUnico);
            return $result->execute();
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            echo $dato;
            //require "vistas/mensaje.php";
            die();
        }
    }
}
