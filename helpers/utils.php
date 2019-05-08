<?php

class Utils {

    public static function deleteSession($name){

        if (isset($_SESSION[$name])) {
            
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);

        }

    }

    public static function isAdmin(){

        if (isset($_SESSION['admin'])) {
            
            return true;

        } else {

            header("Location: ".BASE_URL);

        }

    }

    public static function showError($errores, $campo) {

        $alerta = "";
    
        if (isset($errores[$campo]) && !empty($campo)) {
            
            $alerta = "<div class='alert_red'>". $errores[$campo] ."</div>";
    
        }
    
        return $alerta;
    
    }
    
    public static function deleteErrors() {
    
        if (isset($_SESSION['errores'])) {
    
            unset($_SESSION['errores']);
    
        }
    
        if (isset($_SESSION['errores_nueva'])) {
    
            unset($_SESSION['errores_nueva']);
    
        }
    
    }

    public static function checkName($name, $nuevo = ''){
        $errores = [];

        if (empty($name)) {

            $errores['nombre'.$nuevo] = "El nombre no puede estar vacío.";

        } elseif (is_numeric($name)) {

            $errores['nombre'.$nuevo] = "El nombre no puede ser un número.";

        } elseif (preg_match("/[0-9]/", $name)) {

            $errores['nombre'.$nuevo] = "El nombre no puede contener números.";
            
        }

        return $errores;
    }

}