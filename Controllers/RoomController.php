<?php namespace Controllers;

use Models\Room as Room;
use Models\Theather as Theather;


use Controllers\ViewController as C_View;
use Controllers\TheatherController as C_Theather;

use DAO\DAOTheather as DaoT;
use DAO\DAORoom as Dao;

class RoomController{

    protected $dao;
    private $viewController;
    
    private $daoT;
    private $theatherController;

    function __construct()
    {
        $this->dao= new Dao;
        $this->viewController = new C_View;

        $this->daoT = new DaoT;
        $this->theatherController = new C_Theather;
    }


    public function create($name, $price, $seats, $id_theather)
    {       
            $theather = new Theather();
            $theather->setId($id_theather);

            if (is_numeric($price) && is_numeric($seats)){          /// SI NO SON NUMEROS NO AGREGA ******* VALIDACION *********///

                $room = new Room($name, $price, $seats, $theather);
                $this->dao->create($room);

                $this->theatherController->addRoom($room, $id_theather);

                $this->viewController->viewListRoom();
            }else{
                
                echo '<p class="alert alert-success agileits" role="alert"> El precio o los asientos ingresados no corresponden a un valor numerico.!p>';
                $this->viewController->viewListRoom();
            }
    }

    public function read($id){

        $room = new Room();
        $room = $this->dao->read($id);
        return $room;
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

    public function getId_for_name_theather($name_room, $id_theather)
    {
        $name_room=("'".$name_room."'");

        $room = $this->dao->readForNameTheather($name_room,$id_theather);
        
        return $room->getId_room();
    }


    public function readFor_theather($id_theather){

        $list = $this->dao->readForTheather($id_theather);
      
        
        if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
            
        }else if($list ==false){
            $list=[];

        }
        
        return $list;
    }

    
    public function readTotalSeats($name_room, $id_theather){

        $name_room=("'".$name_room."'");

        $room = $this->dao->readForNameTheather($name_room,$id_theather);
        
        return $room->getTotalSeats();
    }
}