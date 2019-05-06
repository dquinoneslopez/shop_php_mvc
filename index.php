<?php

session_start();

require_once "autoload.php";
require_once "config/db.php";
require_once "helpers/utils.php";
require_once "config/parameters.php";
require_once "views/layouts/header.php";
require_once "views/layouts/sidebar.php";

// Conexión a la base de datos
// $db = Database::connect();

function showError() {
    $error = new ErrorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    
    $nombre_controlador = $_GET['controller'].'Controller';

} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    
    $nombre_controlador = DEFAULT_CONTROLLER;

} else {

    showError();
    exit();

}

if (isset($nombre_controlador) && class_exists($nombre_controlador)) {

    $controlador = new $nombre_controlador();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){

        $action = $_GET['action'];
        $controlador->$action();

    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        
        $default_action = DEFAULT_ACTION;
        $controlador->$default_action();
    
    } else {

        showError();

    }

} else {

    showError();

}

require_once "views/layouts/footer.php";