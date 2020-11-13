<?php

namespace Controllers;

use Models\Ticket as Ticket;

use Controllers\MovieController as C_Movie;
use Controllers\RoomController as C_Room;
use Controllers\ViewController as C_View;

use DAO\DAOTicket as Dao;


class TicketController
{

    protected $dao;
    private $movieController;
    private $roomController;
    private $viewController;

    function __construct()
    {
        $this->dao = new Dao;
        $this->movieController = new C_Movie;
        $this->roomController = new C_Room;
        $this->viewController = new C_View;
    }

    public function create($ticket){

        //$ticket = new Ticket('', '', $room, $movie, $theather, $session);
        $this->dao->create($ticket);
    }

    public function readTicket ($id){

        $list = $this->dao->readId($id);

        if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
        }else if($list ==false){
            $list=[];
        }

        return $list;
    }

    public function readAllForSession ($id_rm){

        $list = $this->dao->readAllForSession($id_rm);

        if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
        }else if($list ==false){
            $list=[];
        }

        return $list;
    }

    public function readAllWhitoutUser($id_rm){

        $T_list = $this->dao->readAllWhitoutUser($id_rm);

        if($T_list != false){
            
            $i=0;
            foreach($T_list as $list){$i++;}
            return $i;

        }else{

            return 0;
        }
    }

    public function asignUser($id_ticket, $id_user){

        return $flag = $this->dao->asignUser($id_ticket, $id_user);
    }
}