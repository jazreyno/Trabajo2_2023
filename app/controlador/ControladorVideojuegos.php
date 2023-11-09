<?php 
    require_once './app/vista/vista.api.php';
    require_once './app/modelo/modelo.juegos.php';
    require_once './app/controlador/controlador.api.php';
    
    class ControladorVideojuegos extends ControladorApi
    {
        private $modelojuegos;
        private $vistajuegos;
  
        function __construct(){
            parent::__construct();
            $this->modelojuegos=new ModeloJuegos();
            $this->vistajuegos=new vistaAPI();
        }
    

        function VerVideojuegos($params = null){
           if (empty($params)){
            $videojuegos = $this->modelojuegos->verJuegos($params);
            return $this->vistajuegos->response($videojuegos, 200);
           }
           else {
            $videojuego = $this->modelojuegos->verJuegos($params[":'ID"]);
            if(!empty($videojuego)) {
                return $this->vistajuegos->response($videojuego, 200);
            }
           }
        }

        function VerVideojuegoId($params=null){
            $id = $params[':ID'];
            $videojuegos=$this->modelojuegos->verJuegosId($id); 
            if($videojuegos){
                $this->vistajuegos->response($videojuegos);
            }
            else{
                $this->vistajuegos->response ("el producto del id=$id no existe :c", 404);
            }
        }


        function agregarJuego($params = []){
            // devuelve el objeto JSON enviado por POST
            $body = $_POST;

            //Inserta el juego
            $nombre = $body["nombre"];
            $genero = $body["genero"];
            $empresa = $body["empresa"];
            
            if (empty($nombre) || empty($genero) || empty($empresa)){
                $this->vistajuegos->response("error", 404);
            } 
            else {
                $id = $this->modelojuegos->agregarJuego($nombre, $genero, $empresa);
                $videojuegos=$this->modelojuegos->verJuegosId($id);
                $this->vistajuegos->response($videojuegos,201);

            }
        }

        // function agregarJuego(){
        //    $videojuegos=$this->getData();

        //     if (empty($videojuegos-> nombre) || empty($videojuegos->genero) || empty($videojuegos->empresa)) {
        //         $this->vistajuegos->response("Completar los campos vacios", 400 );
        //     }
        //     else{
        //         $id = $this->modelojuegos->agregarJuego($videojuegos-> nombre,$videojuegos->genero, $videojuegos->empresa);
        //         $videojuegos=$this->modelojuegos->verJuegosId($id);
        //         $this->vistajuegos->response($videojuegos,201);
        //     } 
        // }

        function eliminarJuego($params=null){
            $id = $params[':ID'];
            $videojuegos=$this->modelojuegos->verJuegosId($id);
            if ($videojuegos){
            $this->modelojuegos->eliminarJuego($id);
            $this->vistajuegos->response($videojuegos);
           }
           else{
            $this->vistajuegos->response ("el videojuego del id= $id no ha sido encontrado. :c", 404);
           }

        }
    }