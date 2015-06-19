<?php
require("conexion.php");

class Imagen
{
    private $conexion;
    
    public function __construct(){
        $this->conexion = conexion::obtenerInstancia();
    }
    
    public function crearImagen($imagen){
        $path = $this->conexion->real_escape_string($imagen['path']);
        $file_name = $this->conexion->real_escape_string($imagen['file_name']);
        $query = "INSERT INTO Imagen VALUES (
                    DEFAULT,
                    '$path',
                    '$file_name')";
        if($this->conexion->query($query)){
            $imagen['id'] = $this->conexion->insert_id;
            return $imagen;
        }else{
            return false;
        }
    }
    
}