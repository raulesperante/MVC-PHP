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
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getAll(){
        $query = "SELECT * FROM categorias;";
        $categorias = $this->db->query($query);
        return $categorias;
    }


}