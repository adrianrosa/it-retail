<?php 
require('conexion.php');

class Producto
{
    private $conexion;
    
    public function __construct(){
        $this->conexion = Conexion::obtenerInstancia();
    }
    
    public function obtenerTodosLosProductos(){
        $query = "SELECT * FROM Producto;";
        $productos = array();
        if( $result = $this->conexion->query($query) ){
            while( $fila = $result->fetch_assoc() ){
                $productos[] = $fila;
            }
            $result->free();
        }
        return $productos;
    }
    
    public function obtenerProducto($idProducto){
        $id = (int) $this->conexion->real_escape_string($idProducto);
        $query = "SELECT IdProducto, NombreProducto, DescripcionCortaProducto, DescripcionLargaProducto, PrecioProducto, CantidadStockProducto, CategoriaProducto,  ProductoEsDestacado, UrlImagenProducto FROM Producto WHERE IdProducto =" . $idProducto;
        $result = $this->conexion->query($query);
        return $result->fetch_assoc();
    }
                                                        
    public function crearProducto($producto){
        $nombre = $this->conexion->real_escape_string($producto['NombreProducto']);
        $descripcionCorta = $this->conexion->real_escape_string($producto['DescripcionCortaProducto']);
        $descripcionLarga = $this->conexion->real_escape_string($producto['DescripcionLargaProducto']);
        $precio = (float) $this->conexion->real_escape_string($producto['PrecioProducto']);
        $cantidad = (int) $this->conexion->real_escape_string($producto['CantidadStockProducto']);
        $categoria = (int) $this->conexion->real_escape_string($producto['CategoriaProducto']);
        $esDestacado = (boolean) $this->conexion->real_escape_string($producto['ProductoEsDestacado']);
        $urlImagen = (boolean) $this->conexion->real_escape_string($producto['UrlImagenProducto']);
        $query = "INSERT INTO Producto VALUES( DEFAULT, '".$nombre."', '".$descripcionCorta."', '".$descripcionLarga."', ".$precio.", ".$cantidad.", ".$categoria.", ".$esDestacado.", '".$urlImagen."');";
        if( $this->conexion->query($query) ){
            $producto['IdProducto'] = $this->conexion->insert_id;
            return $producto;
        }
        return false;
    }
                                                        
    public function actualizarProducto($producto){
        $id = (int) $this->conexion->real_escape_string($producto['IdProducto']);
        $nombre = $this->conexion->real_escape_string($producto['NombreProducto']);
        $descripcionCorta = $this->conexion->real_escape_string($producto['DescripcionCortaProducto']);
        $descripcionLarga = $this->conexion->real_escape_string($producto['DescripcionLargaProducto']);
        $precio = (float) $this->conexion->real_escape_string($producto['PrecioProducto']);
        $cantidad = (int) $this->conexion->real_escape_string($producto['CantidadStockProducto']);
        $categoria = (int) $this->conexion->real_escape_string($producto['CategoriaProducto']);
        $esDestacado = (boolean) $this->conexion->real_escape_string($producto['ProductoEsDestacado']);
        $urlImagen = (boolean) $this->conexion->real_escape_string($producto['UrlImagenProducto']);
        $query = "UPDATE Producto SET NombreProducto = '".$nombre."', DescripcionCortaProducto = '".$descripcionCorta."', DescripcionLargaProducto = ' ".$descripcionLarga."', PrecioProducto = ".$precio.", CantidadStockProducto = ".$cantidad.", CategoriaProducto = ".$categoria.", ProductoEsDestacado = ".$esDestacado.", UrlImagenProducto = '".$urlImagen."'  WHERE IdProducto = ".id;
        return $this->conexion->query($query);
    }
    
    public function eliminarProducto($idProducto){
        $id = (int) $this->conexion->real_escape_string($idProducto);
        $query = "DELETE FROM Producto WHERE IdProducto = ".$id;
        return $this->conexion->query($query);
    }
}
?>