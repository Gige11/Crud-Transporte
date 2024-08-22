<?php

namespace lib;

//este archivo maneja las rutas de la pagina web.
class  Route{
    private static $routes = [];

    //funcion que almacena las rutas get
    public static function get($uri,$callback){
        $uri = trim($uri,'/');
        self::$routes['GET'][$uri] = $callback;
    }

    //funcion que almacena las rutas post
    public static function post($uri,$callback){
        $uri = trim($uri,'/');
        self::$routes['POST'][$uri] = $callback;
    }

    //funcion encargada de despachar la solicitud a su ruta y ejecutar la llamada correspondiente.
    public static function dispatch(){
        $uri = $_SERVER['REQUEST_URI']; //obtiene la uri de la solicitud actual. 
        $uri = trim($uri,'/'); //elimina las barras "/" que pueden estar al principio o final 

        if(strpos($uri,'?')){
            $uri = (substr($uri,0,strpos($uri,'?')));
        }

        $method = $_SERVER['REQUEST_METHOD']; //recibe si el metodo es GET o POST

        foreach(self::$routes[$method] as $route => $callback){
            
            if(strpos($route, ':') !== false){
                $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z0-9]+)',$route);               
            }

            if(preg_match("#^$route$#",$uri,$matches)){
                
                $params = array_slice($matches,1);

                if(is_callable($callback)){ //si el callback es una funcion lo ejecuta pasando los parametros de la uri
                    $response = $callback(...$params);
                }

                if(is_array($callback)){ //si el callback es un array, crea un objeto de la clase y luego llama al metodo.
                    $controller = new $callback[0];
                    $response =  $controller->{$callback[1]}(...$params);
                }

                if(is_array($response) || is_object($response)){ //si la respuesta es un array o objeto se convierte en json y se imprime, sino se imprime directamente.
                    echo json_encode($response);
                }else{
                    echo $response;
                }
                
                return ;
            }
        }

        echo '404 NOT FOUND';
    }
}

