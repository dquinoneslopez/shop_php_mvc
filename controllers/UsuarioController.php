<?php

require_once "models/usuario.php";

class UsuarioController {

    public function index(){

        echo "Controlador Usuarios, Acción Index";

    }

    public function registro(){

        require_once "views/usuario/registro.php";

    }

    public function save(){

        if(isset($_POST)){

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            $usuario = new Usuario();
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setEmail($email);
            $usuario->setPassword($password);

            $errores = [];

            if (empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)) {

                $errores['nombre'] = "El nombre no es válido.";

            }

            if (empty($apellidos) || is_numeric($apellidos) || preg_match("/[0-9]/", $apellidos)) {

                $errores['apellidos'] = "Los apellidos no son válidos.";

            } 

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $errores['email'] = "El email no es válido.";

            }

            if (empty($password)) {

                $errores['password'] = "El password está vacío.";

            }

            if (count($errores) == 0) {

                $save = $usuario->save();

                if ($save) {
                    
                    $_SESSION['register'] =  "complete";

                } else {

                    $_SESSION['register'] =  "failed";

                }

            } else {

                $_SESSION['errores'] = $errores;
        
            }

        } else {

            $_SESSION['register'] =  "failed";

        }
        
        header("Location:".BASE_URL."usuario/registro");

    }

    public function login(){

        if (isset($_POST)) {
            
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            $identity = $usuario->login();

            if ($identity && is_object($identity)) {

                $_SESSION['identity'] = $identity;
                $_SESSION['login'] = true;

                if($identity->role === 'admin'){

                    $_SESSION['admin'] = true;

                }
            } else {

                $_SESSION['login'] = false;

            }

        }

        header("Location: ".BASE_URL);

    }

    public function logout(){

        if(isset($_SESSION['identity'])) {

            unset($_SESSION['identity']);

        }

        if(isset($_SESSION['admin'])) {

            unset($_SESSION['admin']);

        }

        header("Location: ".BASE_URL);

    }

}