<?php

require_once 'models/pedido.php';
require_once 'models/linea_pedido.php';

class PedidoController {

    public function hacer(){

        // echo "Controlador Pedidos, Acción Index";

        require_once "views/pedido/hacer.php";

    }

    public function add(){

        Utils::isIdentity();

        $usuario_id = $_SESSION['identity']->id;
        $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
        $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
        $stats = Utils::statsCarrito();
        $coste = $stats['total'];
        
        if ($provincia && $localidad && $direccion) {
            
            $pedido = new Pedido();
            $pedido->setProvincia($provincia);
            $pedido->setLocalidad($localidad);
            $pedido->setDireccion($direccion);
            $pedido->setUsuario_id($usuario_id);
            $pedido->setCoste($coste);

            $save = $pedido->save();

            foreach ($_SESSION['carrito'] as $elemento) {
        
                $producto = $elemento['producto'];
                $linea_pedido = new Linea_Pedido();
                $linea_pedido->setProducto_id($producto->id);
                $linea_pedido->setPedido_id($pedido->getId());
                $linea_pedido->setUnidades($elemento['unidades']);

                $save_linea = $linea_pedido->save();
    
            }

            if ($save && $save_linea) {
                
                $_SESSION['pedido'] = 'completed';
                
            } else {

                $_SESSION['pedido'] = 'failed';

            }

        } else {

            $_SESSION['pedido'] = 'failed';

        }

        Utils::redirection(BASE_URL.'pedido/confirmado');

    }

    public function confirmado(){

        Utils::isIdentity();

        $identity = $_SESSION['identity'];

        $pedido = new Pedido();
        $pedido->setUsuario_id($identity->id);
        
        $pedido = $pedido->getOneByUser();

        $pedido_productos = new Pedido();
        $productos = $pedido_productos->getProductosByPedido($pedido->id);

        require_once "views/pedido/confirmado.php";

    }

    public function mis_pedidos(){

        Utils::isIdentity();

        $usuario_id = $_SESSION['identity']->id;

        $pedido = new Pedido();
        $pedido->setUsuario_id($usuario_id);

        $pedidos = $pedido->getAllByUser();

        require_once "views/pedido/mis_pedidos.php";

    }

    public function detalle(){

        Utils::isIdentity();

        if (isset($_GET)) {

            $id = $_GET['id'];

            $pedido = new Pedido();
            $pedido->setId($id);
            
            $pedido = $pedido->getOne();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);

            require_once "views/pedido/detalle.php";

        } else {

            Utils::redirection(BASE_URL."pedido/mis_pedidos");

        }

    }

}