<?php

require_once "models/producto.php";

class CarritoController {

    public function index(){

        // echo "Controlador Carrito, Acción Index";

        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
            
            $carrito = $_SESSION['carrito'];

        } else {

            $carrito = array();

        }

        require_once "views/carrito/index.php";

    }

    public function add(){

        if (isset($_GET['id'])) {
            
            $producto_id = $_GET['id'];

        } else {

            Utils::redirection(BASE_URL);

        }

        if (isset($_SESSION['carrito'])) {
            
            $counter = 0;

            foreach($_SESSION['carrito'] as $indice => $elemento){

                if ($elemento['id_producto'] == $producto_id) {
                    
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;

                }

            }

        }
        
        if(!isset($counter) || $counter === 0){

            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            if (is_object($producto)) {
                
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );

            }

        }

        Utils::redirection(BASE_URL."carrito/index");

    }

    public function delete(){

        if(isset($_GET['index'])){

            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);

        }

        Utils::redirection(BASE_URL."carrito/index");

    }

    public function delete_all(){

        Utils::deleteSession('carrito');
        Utils::redirection(BASE_URL."carrito/index");

    }



}