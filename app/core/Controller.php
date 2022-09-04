<?php 

class Controller {
    public function view($view, $data = [])
    {
        //Kita panggil viewnya(index.php) yang ada di dalam folder views:
        require_once '../app/views/' . $view . '.php';
        
    }
    // Ini Class model :
    public function model($model) // nama modelnya User_model di dalam $model
    {
        // kira require file model yang ada di dalam folder models 
        require_once '../app/models/' . $model . '.php';
        // Kalo model isinya class,kita harus instansiasi dulu, supaya bisa kita pake.
        return new $model;
    }
    
}