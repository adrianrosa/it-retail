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

    $request = new Request();
    $action =  $_GET['action']; //$request->action;
    switch($action){
        case "listar":
            listarCategorias($request);
        break;
        default:
        listarCategorias($request);
        break;
    }