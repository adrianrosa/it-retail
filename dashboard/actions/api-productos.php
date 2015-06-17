<?php

    require("../utils/request.php");

    function sendResponse($response){
        echo json_encode($response);
    }

    function listarProductos($request){
        require("../models/producto.php");
        $p = new Producto();
        if($productos = $p->obtenerTodasLosProductos()){
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

    $request = new Request();
    $action =  $_GET['action']; //$request->action;
    switch($action){
        case "listar":
            listarProductos($request);
        break;
    }