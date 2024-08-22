<?php

namespace app\Controllers;

use app\Models\Provincia;
use app\Models\Localidad;

class LocalidadesController extends Controller
{
    public function index(){

        $model = new Localidad;

        if(isset($_GET['search'])){
            $registros = $model->where('Nombre','LIKE','%' . $_GET['search'] . '%')->paginate(2);           
        }else{
            $registros = $model->paginate(2);
        }

        $modelProvincia = new Provincia;
        $provincias = $modelProvincia->all();

        return $this->view('localidades.index',['registros' =>$registros , 'provincias' =>$provincias
        ]);
    }

    public function create(){

        $model = new Provincia;

        $provincias = $model->all();

        return $this->view('localidades.create' ,['provincias' =>$provincias]);
    }

    //crear un registro en la base de datos
    public function save(){
      
        $data = $_POST; //parametros que se envian
        $model = new Localidad;
        
        $model->create($data);

        header('location: /localidades');

    }

    public function show($id){
        return "aqui se mostrara la localidad con id: {$id}";
    }

    public function edit($id){
        $model = new Localidad;
        $modelProvincia = new Provincia;

        $provincias = $modelProvincia->all();
        $localidad = $model->find($id);

        return $this->view('localidades.edit',['localidad' =>$localidad,'provincias' =>$provincias
        ]);


    }

    public function update($id){

        $data = $_POST; 

        $model = new Localidad;
        
        $model->update($id,$data);

        header('location: /localidades');  
        return $this->index();

    }

    public function delete($id){
        
        $model = new Localidad;
        $model->delete($id);

    
        header('location: /localidades');  

    }
}