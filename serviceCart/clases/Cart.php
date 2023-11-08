<?php

class Cart{
    private $idCarrito;
    private $idUnico;
    private $dniCliente;
    private $idProducto;
    private $cantidad;

    function __construct($idCarrito,$idUnico,$dniCliente="",$idProducto="",$cantidad="")
    {
        $this->idCarrito = $idCarrito;
        $this->idUnico = $idUnico;
        $this->dniCliente = $dniCliente;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
    }

    static function getAll($link){
        try{
            $query = "SELECT * FROM carrito";
            $result = $link->prepare($query);
            $result->execute();
            return $result;
        }catch (PDOException $e){
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
			require "vistas/mensaje.php";
			die();
        }
    }

    function insertar($link){
        try{
            $query = "INSERT INTO carrito VALUES(:idUnico, :dniCliente, :idProducto, :cantidad)";
            $result = $link->prepare($query);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			require "vistas/mensaje.php";
			die();
		}
    }
}