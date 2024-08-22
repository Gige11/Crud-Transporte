<?php

namespace app\Controllers;

class Controller{

    //el metodo view permite cargar y mostrar una vista
    public function view($route, $data = []){

        //route: es la ruta del archivo de la vista
        //data: es el array que contiene los datos que se deseen pasar a la vista, por ej variables a utilizar

        extract($data); //extrae los elementos del array, esto permite utilizarlos individualmente

        $route = str_replace('.','/',$route); // esto remplaza los puntos por barras, es util para luego usar los puntos para separar carpetas de las vistas (por convencion)
        
        if(file_exists("../resources/Views/{$route}.php")){ //se comprueba que el archivo existe
            
            ob_start(); //se inicia el almacenamiento en el bufer de salida
            include "../resources/views/{$route}.php"; //se incluye el archivo en el script actual, esto permite utilziar las variables dentro del archivo
            $content = ob_get_clean(); //se obtiene el contenido del bufer y se limpia. se caputa el contenido generado por la inclusion de la vista y se almacena en la variable.
             
            return $content; //se devuelve el contenido de la vista.

        }else{
            return "el archivo no existe";
        }
    }
}