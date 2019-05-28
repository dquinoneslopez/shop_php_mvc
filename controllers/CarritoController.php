<?php

require_once "models/producto.php";

class CarritoController {

    public function index(){

        echo "Controlador Carrito, Acción Index";

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

                if ($elemento['id_producto'] === $producto_id) {
                    
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
                    "id_producto" => $producto-id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );

            }

        }

        Utils::redirection(BASE_URL."carrito/index");

    }

    public function remove(){}

    public function delete_all(){

        unset($_SESSION['carrito']);

    }

}