<?php

    require("../utils/request.php");

    function sendResponse($response){
        echo json_encode($response);
    }

    function listarSliders($request){
        require("../models/slider.php");
        $s = new Slider();
        if($sliders = $s->obtenerTodosLosSliders()){
            sendResponse(array(
                "error" => false,
                "mensaje" => "",
                "data" => $sliders
            ));
        }
        else{
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error al obtener Sliders"
            ));
        }
    }

    function guardarArchivo($file, $imgId){
        $uploaddir = "../files/sliders/";
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
            "path" => "files/sliders/",
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
     
        require("../models/slider.php");
        $s = new Slider();
        $slider = array();
        $slider["TituloImagen"] = $request->titulo;
        $slider["OrdenImagen"] = $request->orden;
        $slider["IdImagen"] = $request->IdImagen;
        if($nuevo = $s->crearSlider($slider)){
            sendResponse(array(
                "error" => false,
                "mensaje" => "Slider creado",
                "data" => $nuevo
            ));
        }else{
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error al crear slider"
            ));
        }
    }
    
    function actualizar($request, $idImg){
        require_once("../models/slider.php");
        $s = new Slider();
        $slider = array();
        $slider["IdSlider"] = $request->id;
        $slider["TituloImagen"] = $request->titulo;
        $slider["OrdenImagen"] = $request->orden;
        if( !empty($idImg) ){
            $slider["IdImagen"] = $idImg;
        } else {
	    $slider["IdImagen"] = null;
	}
        if($s->actualizarSlider($slider)){
            sendResponse(array(
                "error" => false,
                "mensaje" => "Slider actualizado",
                "data" =>  $slider
            ));
        }else{
            sendResponse(array(
                "error" => true,
                "mensaje" => "Error ..."
            ));
        }
    }
    
    function eliminar($request){
        require("../models/slider.php");
        $s = new Slider();
        if($s->eliminarSlider($request->id)){
            sendResponse(array(
                "error" => false,
                "mensaje" => "Slider eliminado"
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
            	actualizar($request, null);
        break;
        case "eliminar":
            eliminar($request);
        break;
        case "listar":
            listarSliders($request);
        break;
    }