<?php
    require_once './libs/Router.php';
    require_once './app/controlador/ControladorVideojuegos.php';

    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

/**
 * ENDPOINTS
 * GET api/videojuegos
 * POST api/videojuegos
 * GET api/videojuegos/:ID (ej api/videojuegos/123)
 * PUT api/videojuegos/:ID (ej api/videojuegos/123)
 * DELETE api/videojuegos/:ID (ej api/videojuegos/123)
 */

    $router = new Router();

    $router->addRoute('videojuegos', 'GET', 'ControladorVideojuegos', 'VerVideojuegos');
    $router->addRoute('videojuegos', 'POST', 'ControladorVideojuegos', 'agregarJuego'); 
    $router->addRoute('videojuegos/:ID', 'GET', 'ControladorVideojuegos', 'VerVideojuegoId');
    $router->addRoute('videojuegos/:ID', 'PUT', 'ControladorVideojuegos', 'actualizarJuego');
    $router->addRoute('videojuegos/:ID', 'DELETE', 'ControladorVideojuegos', 'eliminarJuego');
     
    //ejecucion de la ruta
     $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
    