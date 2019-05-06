<?php

class Database {

    static function connect(){

        $db = new mysqli('localhost', 'root', '', 'master_php_tienda');
        $db->query("SET NAMES 'utf8'");
        return $db;

    }

}