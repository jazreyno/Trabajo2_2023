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
    

        function VerVideojuegos($params = []){
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

        function VerVideojuegoId($params = []){
            $id = $params[':ID'];
            $videojuegos=$this->modelojuegos->verJuegosId($id); 
            if($videojuegos){
                $this->vistajuegos->response($videojuegos);
            }
            else{
                $this->vistajuegos->response ("el producto del id=$id no existe :c", 404);
            }
        }

        function agregarJuego($params = []){;
            $body = $_POST;
            //print_r($_POST);

            //Insertamos el juego
            $nombre = $body['videojuego'];
            $genero = $body['genero'];
            $empresa = $body['id_empresa'];
            
            if (empty($nombre) || empty($genero) || empty($empresa)){
                $this->vistajuegos->response("error", 400);
            } else {
                $id_empresa = $this->modelojuegos->verEmpresaID($empresa);

                if ($id_empresa){
                    $id = $this->modelojuegos->agregarJuego($nombre, $genero, $empresa);
                    $videojuegos = $this->modelojuegos->verJuegosId($id);
                    $this->vistajuegos->response($videojuegos,200);
                }
                else {
                    $this->vistajuegos->response(["Error", 400]);
                }
            }
        }

        // function eliminarJuego($params = []){
        //     $id = $params[':ID'];
        //     $videojuegos=$this->modelojuegos->verJuegosId($id);
        //     if ($videojuegos){
        //     $this->modelojuegos->eliminarJuego($id);
        //     $this->vistajuegos->response($videojuegos);
        //    }
        //    else{
        //     $this->vistajuegos->response ("el videojuego del id= $id no ha sido encontrado. :c", 404);
        //    }
        // }

        function editarVideojuego($params = []){
            $body = $this->getData();
            $id = $body['id'];

            $videojuego = $this->modelojuegos->verJuegos($id);

            if ($videojuego){
                $nombre = $body['videojuego'];
                $genero = $body['genero'];
                $empresa = $body['id_empresa'];
                
                $this->modelojuegos->actualizarJuego($id, $nombre, $genero, $empresa);
                $videojuego = $this->modelojuegos->verJuegosId($id);
                
                $this->vistajuegos->response(["El videojuego $id ha sido actualizado :D"], 200);
                
            }
            else {
                $this->vistajuegos->response ("el videojuego $id no ha sido encontrado. :c", 404);
            }
        }





}