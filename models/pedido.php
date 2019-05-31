<?php

class Pedido {

    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
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
     * Get the value of usuario_id
     */ 
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     *
     * @return  self
     */ 
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of provincia
     */ 
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set the value of provincia
     *
     * @return  self
     */ 
    public function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);

        return $this;
    }

    /**
     * Get the value of localidad
     */ 
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set the value of localidad
     *
     * @return  self
     */ 
    public function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);

        return $this;
    }

    /**
     * Get the value of coste
     */ 
    public function getCoste()
    {
        return $this->coste;
    }

    /**
     * Set the value of coste
     *
     * @return  self
     */ 
    public function setCoste($coste)
    {
        $this->coste = $coste;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }
    

    public function getAll(){

        $pedidos = $this->db->query("SELECT * 
                                     FROM pedidos 
                                     ORDER BY id DESC");

        return $pedidos;

    }

    public function getOne(){

        $producto = $this->db->query("SELECT * 
                                      FROM pedidos 
                                      WHERE id = {$this->getId()}");

        return $producto->fetch_object();

    }

    public function getOneByUser(){

        $query = "SELECT p.id, p.coste  
                  FROM pedidos p 
                  WHERE p.usuario_id = {$this->getUsuario_id()} 
                  ORDER BY id DESC LIMIT 1;";
        
        $pedido = $this->db->query($query);
    
        return $pedido->fetch_object();
    
    }

    public function getAllByUser(){

        $query = "SELECT * 
                  FROM pedidos 
                  WHERE usuario_id = {$this->getUsuario_id()} 
                  ORDER BY id DESC;";
        
        $pedidos = $this->db->query($query);

        return $pedidos;

    }

    public function getProductosByPedido($id){

        $query = "SELECT pr.*, lp.unidades
                  FROM productos pr
                  INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id
                  WHERE lp.pedido_id = {$id};";

        $productos = $this->db->query($query);
            
        return $productos;

    }

    public function save(){

        $query = "INSERT INTO pedidos VALUES (NULL,'{$this->getUsuario_id()}','{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'confirmed', CURDATE(), CURTIME());";
        $save = $this->db->query($query);

        $result = false;

        if ($save) {

            $query = "SELECT LAST_INSERT_ID() AS 'pedido';";
            $result = $this->db->query($query);
            $id = $result->fetch_object()->pedido;
            $this->setId($id);
                
            $result = true;

        }

        return $result;

    }

    public function updateOne(){

        $query = "UPDATE pedidos SET estado = '{$this->getEstado()}'
                  WHERE id = {$this->getId()};";
        
        $update = $this->db->query($query);

        $result = false;

        if ($update) {
            
            $result = true;
        } 
        
        return $result;        

    }

}