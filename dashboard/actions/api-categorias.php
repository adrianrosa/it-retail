<?php

    require("../utils/request.php");

    function sendResponse($response){
        echo json_encode($response);
    }

    function listarCategorias($request){
        require("../models/categoria.php");
        $c = new Categoria();
        if($categorias = $c->obtenerTodasLasCategorias()){
            sendResponse(array(
                "error" => false,
                "mensaje" => "",
                "data" => $categorias
            ));
        }
        else{
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error al obtener Categorías"
            ));
        }
    }
    
    function nueva($request){
        require("../models/categoria.php");
        $c = new Categoria();
        $categoria = array();
        $categoria["NombreCategoria"] = $request->nombre;
        $categoria["DescripcionCategoria"] = $request->descripcion;
        $categoria["OrdenCategoria"] = $request->orden;
        if($nueva = $c->crearCategoria($categoria)){
            sendResponse(array(
                "error" => false,
                "mensaje" => "Categoria creada",
                "data" => $nueva
            ));
        }else{
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error al crear categoría"
            ));
        }
    }
    
    function actualizar($request){
        require("../models/categoria.php");
        $c = new Categoria();
        $categoria = array();
        $categoria["IdCategoria"] = $request->id;
        $categoria["NombreCategoria"] = $request->nombre;
        $categoria["DescripcionCategoria"] = $request->descripcion;
         $categoria["OrdenCategoria"] = $request->orden;
        if($c->actualizarCategoria($categoria)){
            sendResponse(array(
                "error" => false,
                "mensaje" => "Categoria actualizada"
            ));
        }else{
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error ..."
            ));
        }
    }
    
    function eliminar($request){
        require("../models/categoria.php");
        $c = new Categoria();
        if($c->eliminarCategoria($request->id)){
            sendResponse(array(
                "error" => false,
                "mensaje" => "Categoria eliminada"
            ));
        }else{
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error ..."
            ));
        }
    }

    $request = new Request();
    $action =  $_GET['action']; //$request->action;
    switch($action){
        case "guardar":
            nueva($request);
        break;
        case "actualizar":
            actualizar($request);
        break;
        case "eliminar":
            eliminar($request);
        break;
        case "listar":
            listarCategorias($request);
        break;
    }