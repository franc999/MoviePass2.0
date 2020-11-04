<?php namespace Controllers;

use Models\Movie as Movie;
use Models\Genre as Genre;
use DAO\DAOMovie as Dao;

use Controllers\ViewController as C_View;

class MovieController
{
    protected $dao;
    private $viewController;

    function __construct()
    {
       // $this->dao = Dao::getInstance();
       $this->dao= new Dao;
       $this->viewController = new C_View;
    }
    /*
    *
    */

    public function create($title, $id_genre, $age, $img){  
            
            $genre = new Genre($id_genre,'');

            $foto = $_FILES['foto']['name']; // obtiene el nombre 
            $ruta = $_FILES['foto']['tmp_name']; // obtiene el archivo
            $destino = "Views/layout/img/".$foto;

            $verifica = copy($ruta, $destino);
            //= move_uploaded_file($foto, $destino);

            if($verifica == true){
                $movie = new Movie("", $title, $genre, $age, $destino);
                
            }else{
                $movie = new Movie("", $title, $genre, $age, "");
            }
            $this->dao->create($movie);
            $this->viewController->adminCartelera();
    }


    public function readAll(){

        //guarda todos los user de la base de datos en la variable list

        $list = $this->dao->readAll();

        if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
        }else if($list ==false){
            $list=[];

        }
        
        return $list;
    }
    

    public function read($id){

        //DEVUELVE EL user CON ESE EMAIL EN CASO DE EXSISTIR

        return $movie = $this->dao->read($id);
    }


    public function readForCategory($cat){

        return $list = $this->dao->readForCategory($cat);
    }


    public function getId_for_name($name){

        //DEVUELVE EL user CON ESE EMAIL EN CASO DE EXSISTIR

         $movie = $this->dao->readForName($name);

         return $movie->getId();

    }


    public function delete($id){
        
        $this->dao->delete($id);
        $this->viewController->adminCartelera();
    }

    public function edit($id){

        $this->dao->edit($id);
        $this->viewController->adminCartelera();
    }

}?>