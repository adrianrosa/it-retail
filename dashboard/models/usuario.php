<?php 
include_once('conexion.php');

class Usuario
{
    private $conexion;
    
    public function __construct(){
        $this->conexion = Conexion::obtenerInstancia();
    }
    
    public function obtenerUsuario($idUsuario){
        $id = (int) $this->conexion->real_escape_string($idUsuario);
        $query = "SELECT U.*, C.*, L.Nombre as NombreLoc FROM Usuario as U, Cliente as C, Localidad as L WHERE U.IdUsuario = " . $id . " AND C.Usuario = U.IdUsuario AND L.IdLocalidad = C.Localidad;";
        $result = $this->conexion->query($query);
        return $result->fetch_assoc();
    }
    
}

?>