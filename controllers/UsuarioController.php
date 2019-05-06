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

            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {

            $nombre_validado = true;

            } else {

                $nombre_validado = false;
                $errores['nombre'] = "El nombre no es válido.";

            }

            if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {

                $apellidos_validado = true;

            } else {

                $apellidos_validado = false;
                $errores['apellidos'] = "Los apellidos no son válidos.";

            }

            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $email_validado = true;

            } else {

                $email_validado = false;
                $errores['email'] = "El email no es válido.";

            }

            if (!empty($password)) {

                $password_validado = true;

            } else {

                $password_validado = false;
                $errores['password'] = "El password está vacío.";
                
            }

            if (count($errores) === 0) {

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

}