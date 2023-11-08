<?php
    require_once './libs/Router.php';
    require_once './app/controlador/ControladorVideojuegos.php';

    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $router = new Router();
    //obtengo los videojuegos
     $router->addRoute('videojuegos', 'GET', 'ControladorVideojuegos', 'VerVideojuegos');
     //elimino los productos por id
     $router->addRoute('videojuegos/:ID', 'DELETE', 'ControladorVideojuegos', 'eliminarJuego');
     //obtengo los productos por id
     $router->addRoute('videojuegos/:ID', 'GET', 'ControladorVideojuegos', 'VerVideojuegoId');
     //inserto los productos por id
     $router->addRoute('productos', 'POST', 'ControladorVideojuegos', 'agregarJuego');


    //ejecucion de la ruta
     $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);