<?php

    require("../utils/request.php");

    function sendResponse($response){
        echo json_encode($response);
    }

    function listarProductos($request){
        require("../models/producto.php");
        $p = new Producto();
        if($productos = $p->obtenerTodosLosProductos()){
            sendResponse(array(
                "error" => false,
                "mensaje" => "",
                "data" => $productos
            ));
        }
        else{
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error al obtener Productos"
            ));
        }
    }

    function guardarArchivo($file, $imgId){
        $uploaddir = "../files/";
        $imgDir = $uploaddir . $imgId;
        if(mkdir($imgDir, 0777, true)){
            return move_uploaded_file($file['tmp_name'], $imgDir . "/" . $file['name']);
        }
        return false;
    }
    
    function nuevaImg($request){
        require("../models/imagen.php");
        $imgFile = $_FILES[0];
        $imgData = new Imagen();
        $result = $imgData->crearImagen(array(
            "path" => "files/",
            "file_name" => $imgFile['name']
        ));
        if( guardarArchivo($imgFile, $result['id']) ){
            //$img = $result['id'];
             sendResponse(array(
                "error" => false,
                "mensaje" => "Imagen guardada",
                "id" => $result['id']
            ));
        }else{
            //TODO: eliminar de la base la imagen creada para consistencia con fileSistem
            sendResponse(array(
                "error" => false,
                "mensaje" => "Error al guardar imagen en disco"
            ));
        }
    }

   function nueva($request){
     
        require("../models/producto.php");
        $p = new Producto();
        $producto = array();
        $producto["NombreProducto"] = $request->nombre;
        $producto["DescripcionCortaProducto"] = $request->descripcionCorta;
        $producto["DescripcionLargaProducto"] = $request->descripcionLarga;
        $producto["CantidadStockProducto"] = $request->stock;
        $producto["PrecioProducto"] = $request->precio;
        $producto["CategoriaProducto"] = $request->categoria;
        $esDestacado = isset($_REQUEST["esDestacado"]) ? true : false; 
        $producto["EsDestacado"] = $esDestacado;
        $producto["IdImagen"] = $request->IdImagen;
        if($nuevo = $p->crearProducto($producto)){
            sendResponse(array(
                "error" => false,
                "mensaje" => "Producto creado",
                "data" => $nuevo
            ));
        }else{
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error al crear producto"
            ));
        }
    }
    
    function actualizar($request, $idImg){
        require_once("../models/producto.php");
        $p = new Producto();
        $producto = array();
        $producto["IdProducto"] = $request->id;
        $producto["NombreProducto"] = $request->nombre;
        $producto["DescripcionCortaProducto"] = $request->descripcionCorta;
        $producto["DescripcionLargaProducto"] = $request->descripcionLarga;
        $producto["CantidadStockProducto"] = $request->stock;
        $producto["PrecioProducto"] = $request->precio;
        $producto["CategoriaProducto"] = $request->categoria;
        $esDestacado = isset($_REQUEST["esDestacado"]) ? true : false; 
        $producto["EsDestacado"] = $esDestacado;
        if( !empty($idImg) ){
            $producto["IdImagen"] = $idImg;
        } else {
	    $producto["IdImagen"] = null;
	}
        if($p->actualizarProducto($producto)){
            sendResponse(array(
                "error" => false,
                "mensaje" => "Producto actualizado",
                "data" =>  $producto
            ));
        }else{
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error ..."
            ));
        }
    }
    
    function eliminar($request){
        require("../models/producto.php");
        $p = new Producto();
        if($p->eliminarProducto($request->id)){
            sendResponse(array(
                "error" => false,
                "mensaje" => "Producto eliminado"
            ));
        }else{
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error ..."
            ));
        }
    }

    $request = new Request();
    $action =  $request->action;
    $idImg = $request->idImg;

    switch($action){
        case "guardar":
            nueva($request);
        break;
        case "subir":
            nuevaImg($request);
        break;
        case "actualizar":  
            if(isset($idImg) && $idImg !=null)
                actualizar($request, $idImg);
	    else
            	actualizar($request, 0);
        break;
        case "eliminar":
            eliminar($request);
        break;
        case "listar":
            listarProductos($request);
        break;
    }