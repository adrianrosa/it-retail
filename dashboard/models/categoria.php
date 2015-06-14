<?php 
require('conexion.php');

class Categoria
{
    private $conexion;
    
    public function __construct(){
        $this->conexion = Conexion::obtenerInstancia();
    }
    
    public function obtenerTodasLasCategorias(){
        $query = "SELECT IdCategoria, NombreCategoria, DescripcionCategoria, OrdenCategoria FROM Categoria";
        $categorias = array();
        if( $result = $this->conexion->query($query) ){
            while( $fila = $result->fetch_assoc() ){
                $categorias[] = $fila;
            }
            $result->free();
        }
        return $categorias;
    }

    public function obtenerCategoria($idCategoria){
        $id = (int) $this->conexion->real_escape_string($idCategoria);
        $query = "SELECT IdCategoria, NombreCategoria, DescripcionCategoria, OrdenCategoria FROM Categoria WHERE IdCategoria = " . $idCategoria;
        $result = $this->conexion->query($query);
        return $result->fetch_assoc();
    }
                                                        
    public function crearCategoria($categoria){
        $nombre = $this->conexion->real_escape_string($categoria['NombreCategoria']);
        $descripcion = $this->conexion->real_escape_string($categoria['DescripcionCategoria']);
        $orden = (int) $this->conexion->real_escape_string($categoria['OrdenCategoria']);
        $query = "INSERT INTO Categoria VALUES( DEFAULT, '".$nombre."', '".$descripcion."', ".$orden.")";
        if( $this->conexion->query($query) ){
            $categoria['IdCategoria'] = $this->conexion->insert_id;
            return $categoria;
        }
        return false;
    }
                                                        
    public function actualizarCategoria($categoria){
        $id = (int) $this->conexion->real_escape_string($categoria['IdCategoria']);
        $nombre = $this->conexion->real_escape_string($categoria['NombreCategoria']);
        $descripcion = $this->conexion->real_escape_string($categoria['DescripcionCategoria']);
        $orden = (int) $this->conexion->real_escape_string($categoria['OrdenCategoria']);
        $query = "UPDATE Categoria SET NombreCategoria = '".$nombre."', DescripcionCategoria = '".$descripcion."', OrdenCategoria = ".$orden." WHERE IdCategoria = ".id;
        return $this->conexion->query($query);
    }
    
    public function eliminarCategoria($idCategoria){
        $id = (int) $this->conexion->real_escape_string($idCategoria);
        $query = "DELETE FROM Categoria WHERE IdCategoria = ".$id;
        return $this->conexion->query($query);
    }
}
?>