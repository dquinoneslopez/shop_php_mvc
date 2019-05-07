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

    function showError($errores, $campo) {

        $alerta = "";
    
        if (isset($errores[$campo]) && !empty($campo)) {
            
            $alerta = "<div class='alert_red'>". $errores[$campo] ."</div>";
    
        }
    
        return $alerta;
    
    }
    
    function deleteErrors() {
    
        if (isset($_SESSION['errores'])) {
    
            unset($_SESSION['errores']);
    
        }
    
        if (isset($_SESSION['errores_entrada'])) {
    
            unset($_SESSION['errores_entrada']);
    
        }
    
        if (isset($_SESSION['errores_categoria'])) {
    
            unset($_SESSION['errores_categoria']);
    
        }
    
        if (isset($_SESSION['registrado'])) {
            
            unset($_SESSION['registrado']);
    
        }  
        
        if (isset($_SESSION['actualizado'])) {
            
            unset($_SESSION['actualizado']);
    
        }
    
    }

}