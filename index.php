<?php

require_once "autoload.php";
require_once "views/layouts/header.php";
require_once "views/layouts/sidebar.php";

if (isset($_GET['controller'])) {
    
    $nombre_controlador = $_GET['controller'].'Controller';

} else {

    echo "La página buscada no existe";
    exit();

}

if (isset($nombre_controlador) && class_exists($nombre_controlador)) {

    $controlador = new $nombre_controlador();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){

        $action = $_GET['action'];
        $controlador->$action();

    } else {

        echo "La página buscada no existe";

    }

} else {

    echo "La página buscada no existe";

}

require_once "views/layouts/footer.php";