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

            $errores = Utils::checkName($categoria->getNombre());            

            if (count($errores) === 0) {

                $save = $categoria->save();

                if ($save) {
                    
                    $_SESSION['create_category'] =  "complete";

                } else {

                    $_SESSION['create_category'] =  "failed";
                    
                }

                header("Location: ".BASE_URL."categoria/index");

            } else {

                $_SESSION['errores'] = $errores;
                header("Location: ".BASE_URL."categoria/crear");
        
            }

        } else {

            $_SESSION['create_category'] =  "failed";
            header("Location: ".BASE_URL."categoria/index");

        }

    }

    public function modificar(){

        Utils::isAdmin();
        require_once "views/categoria/modificar.php";

    }

    public function update(){

        Utils::isAdmin();

        if (isset($_POST) && isset($_POST['nombre']) && isset($_POST['nuevo_nombre'])) {
            
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);

            if (Categoria::exists($categoria)) {

                $categoria_nueva = new Categoria();
                $categoria_nueva->setNombre($_POST['nuevo_nombre']);

                $errores = Utils::checkName($categoria->getNombre()); 
                $errores_nueva = Utils::checkName($categoria_nueva->getNombre(),'_nuevo'); 

                if (count($errores) === 0 && count($errores_nueva) === 0) {

                    $update = $categoria->update($categoria_nueva);

                    if ($update) {
                        
                        $_SESSION['update_category'] =  "complete";

                    } else {

                        $_SESSION['update_category'] =  "failed";
                        
                    }

                    header("Location: ".BASE_URL."categoria/index");

                } else {

                    $_SESSION['errores'] = $errores;
                    $_SESSION['errores_nueva'] = $errores_nueva;
                    header("Location: ".BASE_URL."categoria/modificar");
            
                }

            } else {

                $errores['nombre'] = "No existe la categoría.";
                $_SESSION['errores'] = $errores;
                header("Location: ".BASE_URL."categoria/modificar");

            }

        } else {

            $_SESSION['update_category'] =  "failed";
            header("Location: ".BASE_URL."categoria/index");

        }

    }

    public function eliminar(){

        Utils::isAdmin();
        require_once "views/categoria/eliminar.php";

    }

    public function delete(){

        Utils::isAdmin();

        if (isset($_POST) && isset($_POST['nombre'])) {
            
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);

            if (Categoria::exists($categoria)) {

                $errores = Utils::checkName($categoria->getNombre()); 

                if (count($errores) === 0) {

                    $delete = $categoria->delete($categoria);

                    if ($delete) {
                        
                        $_SESSION['delete_category'] =  "complete";

                    } else {

                        $_SESSION['delete_category'] =  "failed";
                        
                    }

                    header("Location: ".BASE_URL."categoria/index");

                } else {

                    $_SESSION['errores'] = $errores;
                    header("Location: ".BASE_URL."categoria/eliminar");
            
                }

            } else {

                $errores['nombre'] = "No existe la categoría.";
                $_SESSION['errores'] = $errores;
                header("Location: ".BASE_URL."categoria/eliminar");

            }

        } else {

            $_SESSION['update_category'] =  "failed";
            header("Location: ".BASE_URL."categoria/index");

        }

    }

}