<?php

class ModeloUsuarios{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=trabajo_especial;charset=utf8', 'root', '');
    }

    public function obtenerUsuario($usuario){
        $query = $this->db->prepare('SELECT id, email, contraseña, admin
        FROM usuarios WHERE email = ?');
        $query->execute([$usuario]);
        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    
}