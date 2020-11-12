<?php namespace Controllers;

use Models\Genre as Genre;
use DAO\DAOGenre as Dao;

use Controllers\ViewController as C_View;

class GenreController
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

    public function create($name){  
            
        $this->dao->create($name);
        $this->viewController->viewAddGenre();
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
        $list = $this->dao->readAll();
    }


    public function getId_for_name($name){

        //DEVUELVE EL user CON ESE EMAIL EN CASO DE EXSISTIR


    }


    public function delete($id){

    }

    public function edit($id){

    }
}?>