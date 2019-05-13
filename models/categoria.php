<?php

class Categoria {

    private $id;
    private $nombre;
    private $db;

    public function __construct(){

        $this->db = Database::connect();

    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    public function getAll(){

        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");

        return $categorias;

    }

    public function getOne(){

        $categoria = $this->db->query("SELECT * FROM categorias WHERE id = {$this->getId()};");

        return $categoria->fetch_object();
    }

    public function save(){

        $query = "INSERT INTO categorias VALUES (NULL,'{$this->getNombre()}');";
        $save = $this->db->query($query);

        $result = false;

        if ($save) {
            
            $result = true;

        }

        return $result;

    }

    public function update($nuevo){

        $exists = $this->exists($this);

        if ($exists->num_rows === 1) {

            $this->setId($exists->fetch_object()->id);
            
            $query = "UPDATE categorias SET nombre = '{$nuevo->getNombre()}' 
                      WHERE id = '{$this->getId()}';";
            $update = $this->db->query($query);

        } 
        
        $result = false;

        if ($update) {
            
            $result = true;

        }

        return $result;

    }

    public function delete($categoria){

        $exists = $this->exists($categoria);

        if ($exists->num_rows === 1) {

            $this->setId($exists->fetch_object()->id);
            
            $query = "DELETE FROM categorias 
                      WHERE id = '{$this->getId()}';";
            $delete = $this->db->query($query);

        } 
        
        $result = false;

        if ($delete) {
            
            $result = true;

        }

        return $result;

    }

    public static function exists($categoria){

        $query = "SELECT id FROM categorias WHERE nombre = '{$categoria->getNombre()}';";
        $result = $categoria->db->query($query);

        if ($result->num_rows === 1) {

            return $result;

        }

        return false;

    }
}