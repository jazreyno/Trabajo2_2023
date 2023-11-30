<?php

require_once './app/vista/vista.api.php';

abstract class ControladorApi {
    protected $vista;
    private $data; 

    public function __construct() {
        $this->vista = new vistaAPI();

        //Permite leer la entrada enviada en formato RAW
        $this->data=file_get_contents("php://input"); 

    }
    
    function getData(){ 
        return json_decode($this->data); 
    }  
}
