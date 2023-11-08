<?php 
    require_once './app/vista/vista.juegos.php';
    require_once './app/modelo/modelo.juegos.php';


    class ControladorVideojuegos{
        private $modelojuegos;
        private $data;
        private $vistajuegos;
  

        function __construct(){
            $this->modelojuegos=new ModeloJuegos();
            $this->vistajuegos=new VistaJuegos();

            $this->data = file_get_contents("php://input");
        }

        private function getData() {
            return json_decode($this->data);
        }
    

        function VerVideojuegos(){
            $params=[ 
                "field"=>"id_videojuegos",
                "sort"=>"asc",
                "where"=> "videojuegos.id_empresa",
                "limit"=>"18446744073709551610",
                "offset"=> "0",
            ]; 
            if(isset($_GET["field"])){
                $params["field"]= $_GET["field"];
            }
            if(isset($_GET["sort"])){
                $params["sort"]= $_GET["sort"];
            }
            
            if (isset($_GET['limit'])){
                $params["limit"] = $_GET['limit'];
                if (isset($_GET['offset'])){
                    $page = (($_GET['offset']-1)*$params["limit"]);
                    $params["offset"] = $page;
                }
            }


            $videojuegos = $this->modelojuegos->verJuegos($params);
            $this->vistajuegos->response($videojuegos);
        }

        function VerVideojuegoId($params=null){
            $id = $params[':ID'];
            $videojuegos=$this->modelojuegos->verJuegosId($id); 
            if($videojuegos){
                $this->vistajuegos->response($videojuegos);
            }
            else{
                $this->vistajuegos->response ("el producto del id=$id no existe", 404);
            }
           
         
        }

        function agregarJuego(){
           $videojuegos=$this->getData();

            if (empty($videojuegos-> nombre) || empty($videojuegos->genero) || empty($videojuegos->empresa)) {
                $this->vistajuegos->response("Completar los campos vacios", 400 );
             
            }
            else{
                $id = $this->modelojuegos->agregarJuego($videojuegos-> nombre,$videojuegos->genero, $videojuegos->empresa);
                $videojuegos=$this->modelojuegos->verJuegosId($id);
                $this->vistajuegos->response($videojuegos,201);
            } 
        }

        function eliminarJuego($params=null){
            $id = $params[':ID'];
           $videojuegos=$this->modelojuegos->verJuegosId($id);
           if($videojuegos){
            $this->modelojuegos->eliminarJuego($id);
            $this->vistajuegos->response($videojuegos);
           }
           else{
            $this->vistajuegos->response ("el videojuego del id=$id no existe", 404);
           }

        }
        


        

    }