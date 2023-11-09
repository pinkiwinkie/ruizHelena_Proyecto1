<?php
class Product{
    private $idProducto;
    private $nombre;
    private $descripcion;
    private $foto;
    private $marca;
    private $categoria;
    private $unidades;
    private $precio;
    private $cantidad;

    function __construct($idProducto, $nombre="",$descripcion="",$foto="",$marca="",$categoria="",$unidades="",$precio="",$cantidad="")
    {   
        $this->idProducto=$idProducto;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->foto=$foto;
        $this->marca=$marca;
        $this->categoria=$categoria;
        $this->unidades=$unidades;
        $this->precio=$precio;
        $this->cantidad=$cantidad;
    }

    static function getAll($link){
        try{
            $query = "SELECT * FROM productos";
            $result=$link->prepare($query);
            $result->execute();
            return $result;
        } catch(PDOException $e){
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            require "../views/messageError.php";
            die();
        }
    }

    function buscarProductoPorId($link){
        try {
            $query = "SELECT * FROM productos WHERE idProducto = :idProducto";
            $result = $link->prepare($query);
            $result->bindParam(':idProducto', $this->idProducto);
            $result->execute();
            return $result->fetch(PDO::FETCH_OBJ);
        } catch(PDOException $e){
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            require "../views/messageError.php";
            die();
        }
    }
}