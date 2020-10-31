<?php

namespace Controllers;

use Models\Session as Session;
use Models\Ticket as Ticket;
use Models\Room as Room;

use Controllers\MovieController as C_Movie;
use Controllers\RoomController as C_Room;
use Controllers\ViewController as C_View;
use Controllers\TicketController as C_Ticket;

use DAO\DAOSession as Dao;

class SessionController
{

    protected $dao;
    private $movieController;
    private $roomController;
    private $ticketController;
    private $viewController;


    function __construct()
    {
        $this->dao = new Dao;
        $this->movieController = new C_Movie;
        $this->roomController = new C_Room;
        $this->viewController = new C_View;
        $this->ticketController = new C_Ticket;
    }


    public function returnSession($time, $date, $id_theather, $id_movie, $id_room){

        $session = new Session();
        $session = $this->dao->readForTickets($time, $date, $id_theather, $id_movie, $id_room);
        return $session;
    }

    public function create($id_movie, $id_theather, $date, $time, $name_room){

        $id_room = $this->roomController->getId_for_name_theather($name_room, $id_theather); // traemos el id de la sala del cine correcto

        $room = $this->roomController->read($id_room);         // retornamos la sala por id

        $price = $room->getTicketPrice();           // solicitamos el precio de entrada de la sala seleccionada
        $session = new Session($id_theather, $id_room, $id_movie, $date, $time, $price); // creamos objeto tipo funcion

        $this->dao->create($session);   // creamos la sesion 

        $sessionId = new Session();
        $sessionId = $this->dao->readForTickets($time, $date, $id_theather, $id_movie, $id_room);
        
        $rmId = $sessionId->getId_Session();

        $session->setId_session($rmId);

        $this->dao->createTicket($session, $price);            // creamos el ticket

        //$ticket = new Ticket();

        //$ticket= $this->ticketController->readTicket($session);
        //echo "$ticket";
        //echo $ticket->getId_ticket();

        $this->viewController->viewList_sessions();
    }



    public function readAll()
    {
        //guarda todos los user de la base de datos en la variable list

        $list = $this->dao->readAll_sessions();


        if (!is_array($list) && $list != false) { // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false

        } else if ($list == false) {
            $list = [];
        }

        return $list;
    }

    public function readAllByDate()
    {
        //guarda todos los user de la base de datos en la variable list

        $list = $this->dao->readAll_sessionsByDate();


        if (!is_array($list) && $list != false) { // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false

        } else if ($list == false) {
            $list = [];
        }

        return $list;
    }

    public function readForDate($date)
    {
        //guarda todos los user de la base de datos en la variable list

        $list = $this->dao->readSessionsByDate($date);


        if (!is_array($list) && $list != false) { // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false

        } else if ($list == false) {
            $list = [];
        }

        return $list;
    }


    public function readFor_theather($id_theather)
    {

        $list = $this->dao->readForTheather($id_theather);


        if (!is_array($list) && $list != false) { // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false

        } else if ($list == false) {
            $list = [];
        }

        return $list;
    }


    public function getSchedules_for_theather($id_theather)
    {

        $list = $this->dao->read($id_theather);


        if (!is_array($list) && $list != false) { // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false

        } else if ($list == false) {
            $list = [];
        }

        return $list;
    }

    public function getmovie_schedules($id_movie)
    {

        $list = $this->dao->readSessionsByMovie($id_movie);


        if (!is_array($list) && $list != false) { // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false

        } else if ($list == false) {
            $list = [];
        }

        return $list;
    }

    public function getSession_purchase($id_session)
    {

        $list = $this->dao->readSessionsForPurchase($id_session);


        if (!is_array($list) && $list != false) { // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false

        } else if ($list == false) {
            $list = [];
        }

        return $list;
    }

    public function delete($id)
    { }
}
