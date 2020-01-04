<?php

class Categoria{
    private $id;
    private $nombre;
    private $db;
    
    public function __construct() {
       $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->db->real_escape_string($this->nombre);
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getOne(){
        $query = "SELECT * FROM categorias WHERE id={$this->getId()};";
        $categoria = $this->db->query($query);
        return $categoria->fetch_object();
    }
    
    public function getAll(){
        $query = "SELECT * FROM categorias ORDER BY id DESC;";
        $categorias = $this->db->query($query);
        return $categorias;
    }
    
    public function save(){
        $query = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
        $save = $this->db->query($query);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

}