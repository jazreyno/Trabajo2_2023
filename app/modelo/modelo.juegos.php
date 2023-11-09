<?php 

    class ModeloJuegos{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=trabajo_especial;charset=utf8', 'root', '');
        }

        function verJuegos($order){
            
            $query = $this->db->prepare("SELECT * FROM videojuegos LEFT JOIN companias on videojuegos.id_empresa = companias.id_empresa");
            $query->execute();

            //Obtengo arreglo de juegos
            $videojuegos= $query->fetchAll(PDO::FETCH_OBJ);
            
            return $videojuegos;
        }
  

        function verEmpresaID($id_empresa){
            $query=$this->db->prepare("SELECT * FROM companias  WHERE id_empresa = ? ");
            $query->execute([$id_empresa]);
            $empresa = $query->fetch(PDO::FETCH_OBJ);
            return $empresa;
        }


        
        function agregarJuego($nombre,$genero,$empresa){
            $query=$this->db->prepare("INSERT INTO `videojuegos`(`videojuego`, `genero`, `id_empresa`) VALUES(?,?,?)");
            $query->execute([$nombre,$genero,$empresa]);

            return $this->db->lastInsertId();
        }

        function eliminarJuego($id){            
            $query = $this->db->prepare('DELETE FROM `videojuegos` WHERE id_videojuegos = ?'); //Verificar los nombres si estan bien.
            $query->execute([$id]);
        }

        
        function verJuegosId($id){
            $query =$this->db->prepare("SELECT * FROM videojuegos INNER JOIN companias on videojuegos.id_empresa = companias.id_empresa WHERE id_videojuegos = ?");
            $query->execute([$id]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

            
        function actualizarJuego($nombre, $genero, $empresa, $id){
            $query=$this->db->prepare("UPDATE `videojuegos` SET videojuego = ? ,genero = ? ,id_empresa = ?  WHERE id_videojuegos = ?");
            $query->execute([$nombre,$genero,$empresa,$id]);
        }

        
    }
