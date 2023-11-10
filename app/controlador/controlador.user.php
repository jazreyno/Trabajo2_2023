<?php

require_once './app/controlador/controlador.api.php';
require_once './helper/api.auth.helper.php';
require_once './app/modelo/modelo.usuarios.php';

class UserAPIController extends ControladorApi
{
    private $modelo;
    private $auth;

    function __construct()
    {
        parent::__construct();
        $this->modelo = new ModeloUsuarios();
        $this->auth = new APIAuthHelper();
    }

    function getToken($params = [])
    {
        $basic = $this->auth->getAuthHeaders(); // Darnos el header 'Authorization:' 'Basic: base64(usr:pass)'

        
        if (empty($basic)) {
            $this->vista->response('No envió encabezados de autenticación.', 401);
            return;
        }

        $basic = explode(" ", $basic); // ["Basic", "base64(usr:pass)"]

        if ($basic[0] != "Basic") {
            $this->vista->response('Los encabezados de autenticación son incorrectos.', 401);
            return;
        }

        $userpass = base64_decode($basic[1]); // usr:pass
        $userpass = explode(":", $userpass); // ["usr", "pass"]

        $username = $userpass[0];
        $password = $userpass[1];

        $userdata = $this->modelo->obtenerUsuario($username);

        if ($userdata->username === $username && password_verify($password, $userdata->password)) {
            $token = $this->auth->createJWTToken(["userid" => $userdata->id, "email" => $userdata->username, "admin" => $userdata->isAdmin]);
            $this->vista->response(["token" => $token], 200);
        } else {
            $this->vista->response('El usuario o contraseña son incorrectos.', 401);
        }


    }
}

