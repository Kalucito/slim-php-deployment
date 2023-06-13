<?php
    require_once("./Models/Usuario.php");

    class UsuarioController extends Usuario{

        public function cargarUno($request, $response, $args)
        {
            $parametros = $request->getParsedBody();
            
            $nombre = $parametros['nombre'];
            $clave = $parametros['clave'];
            $mail = $parametros['mail'];
            $rol = $parametros['rol'];

            //Creo el user
            
            $usuario = new Usuario();
            $usuario->nombre = $nombre;
            $usuario->clave = $clave;
            $usuario->mail = $mail;
            $usuario->rol = $rol;

            $usuario->guardarUsuario();

            $payload = json_encode(array("mensaje"=>"Usuario creado con exito"));

            $response->getBody()->write($payload);

            return $response->withHeader('Content-Type', 'application/json');

        }

        public function TraerTodos($request, $response, $args)
        {
            $lista = Usuario::obtenerTodos();
            $payload = json_encode(array("listaUsuario"=> $lista));

            $response->getBody()->write($payload);
            
            return $response->withHeader('Content-Type', 'application/json');

        }



    }


?>