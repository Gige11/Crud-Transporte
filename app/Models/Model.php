<?php

namespace app\Models;

use mysqli;

//de esta clase extenderan el resto de modelos

class Model{

    //se declaran las variables correspondientes a los datos de la base de datos
    protected $db_host = DB_HOST;
    protected $db_user = DB_USER;
    protected $db_pass = DB_PASS;
    protected $db_name = DB_NAME;

    protected $connection;
    protected $query;
    protected $table;

    protected $sql;
    protected $data = [];
    protected $params = null;

    //cuando se crea una instancia de la clase se establecera la conexion a la bd
    public function __construct(){
        $this->connection();
    }
    
    //metodo para conectarse a la base de datos
    public function connection(){

        $this->connection = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);

        if($this->connection->connect_error){
            die('Error de conexion: ' . $this->connection->connect_error);
        }
    }

    //metodo para ejecutar consultas SQL en la BD, el resultado se guarda en la propiedad query
    public function query($sql, $data = [], $params = null){   

        if($data){

            if($params == null){
                $params = str_repeat('s', count($data));
            }
            
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param($params,...$data);
            $stmt->execute();

            $this->query = $stmt->get_result();
            
        }else{

            $this->query = $this->connection->query($sql); 

        }
                
        return $this; //se devuelve a si misma para poder encadenar metodos         
    }

    //devuelve la primera fila de la consulta sql
    public function first(){

        if(empty($this->query)){
            $this->query($this->sql,$this->data,$this->params);
        }

        return $this->query->fetch_assoc();
    }

    //devuelve todas las filas de una consulta sql
    public function get(){

        if(empty($this->query)){
            $this->query($this->sql,$this->data,$this->params);
        }

        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    //funcion para paginar los datos. 
    public function paginate($cant = 5){

        $page = isset( $_GET['page']) ? $_GET['page'] : 1;

        if($this->sql){
            $sql = $this->sql . " LIMIT " . ($page - 1) * $cant . ",{$cant}";
            $data = $this->query($sql, $this->data, $this->params)->get();
        }else{
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM {$this->table} LIMIT " . ($page - 1) * $cant . ",{$cant}";
            $data = $this->query($sql)->get();
        }

        $total = $this->query("SELECT FOUND_ROWS() as total") ->first()['total'];

        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri,'/');

        if(strpos($uri,'?')){
            $uri = substr($uri, 0, strrpos($uri,'?'));
        }

        $last_page = ceil($total / $cant);

        return [
            'uri' => $uri,
            'total' => $total,
            'from' => ($page -1) * $cant + 1, 
            'current_page' => $page,
            'last_page' => $last_page,
            'to' => ($page -1) * $cant + count($data),
            'next_page_url' => $page <$last_page ? '/' . $uri.'?page=' . $page +1 : null,
            'prev_page_url' => $page > 1 ? '/' . $uri . '?page=' . $page -1 : null,
            'data' => $data
        ];
    }

    //funcion para traer todos los datos de una tabla. 
    public function all(){

        $sql = "SELECT * FROM {$this->table}";
        return $this->query($sql)->get();

    }

    //funcion para buscar por id.
    public function find($id){
        $sql = "SELECT * FROM {$this->table} WHERE ID = ?";
        return $this->query($sql, [$id],'i')->first();
    }

    //funcion para filtrar por culumna y dato en especifico.
    public function where($column,$operator,$value=null){ 

        if($value ==null){
            $value = $operator;
            $operator = '=';
        }

        $this->sql = "SELECT SQL_CALC_FOUND_ROWS * FROM {$this->table} WHERE {$column} {$operator} ?";     
        $this->data[] = $value;
        //$this->query($sql,[$value]);

        return $this;

    }
    
    //funcion para guardar un registro en la base de datos
    public function create($data){

        $columns = array_keys($data); //crea un array con las key del array pasado. 
        $columns = implode(', ',$columns); //crea un string con los elementos de un array, los separa por una ','

        $values = array_values($data); //crea un array con los valores del array pasado.

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES (" .str_repeat('?, ', count($values) - 1) . "?)";

        
        $this->query($sql,$values);

    }

    //funcion para modificar un registro en la base de datos

    public function update($id,$data){
        
        $fields = [];

        foreach($data as $key => $value){
            $fields[] = "{$key} = ?";
        }

        $fields = implode(', ',$fields);

        $sql = "UPDATE {$this->table} SET {$fields} WHERE ID = ?";

        $values = array_values($data);
        $values[] = $id;

        $this->query($sql, $values);

        return $this->find($id);
    }

    public function delete($id){

        $sql = "DELETE FROM {$this->table} WHERE ID = ?";
        $this->query($sql,[$id],'i');
        
    }
}