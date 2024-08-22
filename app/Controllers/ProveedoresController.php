<?php

namespace app\Controllers;

use app\Models\Proveedor;
use app\Models\Localidad;

class ProveedoresController extends Controller
{
    public function index(){

        $model = new Proveedor;
        $modelLocalidad = new Localidad;

        $registros = $model->paginate(10);
        $localidades = $modelLocalidad->all();
       
        return $this->view('proveedores.index',['registros' =>$registros,'localidades' => $localidades
        ]);
    }

    public function create(){

        $model = new Localidad;

        $localidades = $model->all();

        return $this->view('proveedores.create',['localidades' =>$localidades
        ]);
    }

    //crear un registro en la base de datos
    public function save(){
      
        $data = $_POST; //parametros que se envian
        $model = new Proveedor;
        
        $model->create($data);

        header('location: /proveedores');

        $_SESSION['mensaje'] = 'Proveedor guardado correctamente.';

    }

    public function show($id){
        return "aqui se mostrara el proveedor con id: {$id}";
    }

    public function edit($id){
        $model = new Proveedor;
        $modelLocalidad = new Localidad;

        $localidades = $modelLocalidad->all();
        $proveedores = $model->find($id);

        return $this->view('proveedores.edit',['proveedores' =>$proveedores,'localidades' =>$localidades
        ]);


    }

    public function update($id){

        $data = $_POST; 

        $model = new Proveedor;
        
        $model->update($id,$data);

        header('location: /proveedores');  
        return $this->index();

    }

    public function delete($id){
        
        $model = new Proveedor;
        $model->delete($id);

    
        header('location: /proveedores');  

    }
}