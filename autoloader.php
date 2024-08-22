<?php

//este archivo se utiliza para cargar automaticamente las clases del proyecto


spl_autoload_register(function($clase){
    $ruta = '../' .str_replace("\\","/",$clase .".php");

    if(file_exists($ruta)){
        require_once $ruta;
    }else{
        die("No se pudo cargar la clase $clase");
    }
});