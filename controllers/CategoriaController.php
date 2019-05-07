<?php

require_once "models/categoria.php";

class CategoriaController {

    public function index(){

        Utils::isAdmin();

        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once "views/categoria/index.php";

    }

    public function crear(){

        Utils::isAdmin();
        require_once "views/categoria/crear.php";

    }

    public function save(){

        Utils::isAdmin();

        if (isset($_POST) && isset($_POST['nombre'])) {

            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);

            $errores = [];

            if (empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)) {

                $errores['nombre'] = "El nombre no es válido.";
            }

            if (count($errores) === 0) {

                $save = $categoria->save();

                if ($save) {
                    
                    $_SESSION['create_category'] =  "complete";

                } else {

                    $_SESSION['create_category'] =  "failed";
                    
                }

            } else {

                $_SESSION['errores'] = $errores;
        
            }

        } else {

            $_SESSION['create_category'] =  "failed";

        }
        
        header("Location: ".BASE_URL."categoria/index");

    }

}