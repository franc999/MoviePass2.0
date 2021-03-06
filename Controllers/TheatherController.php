<?php namespace Controllers;

use Models\Theather as Theather;
use DAO\DAOTheather as Dao;

use Controllers\ViewController as C_View;

class TheatherController
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

    
    public function create($name, $adress){

            $theather = new Theather('',$name, $adress);

            $this->dao->create($theather);
            $this->viewController->viewListTheather();
    }

    public function addRoom($room, $id_theather){

        $theather = new Theather();
        $theather = $this->dao->read($id_theather);

        echo $theather->getId();
        $theather->setId_room($room);

        $this->dao->addRoom($room, $id_theather);
        $this->viewController->viewListTheather();
    }


    public function readAll()
    {
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
    

    public function read($id)
    {
        //DEVUELVE EL user CON ESE EMAIL EN CASO DE EXSISTIR
        return $theather = $this->dao->read($id);
    }


    public function edit($name, $adress, $room){

        
    }

    public function readadress($cat){

        //DEVUELVE EL user CON ESE EMAIL EN CASO DE EXSISTIR
        return $list = $this->dao->readForadress($cat);
    }


    public function delete($id){
        
        $this->dao->delete($id);
        $this->viewController->viewListTheather();   
    }
}?>