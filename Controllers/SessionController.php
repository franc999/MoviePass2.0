<?php

namespace Controllers;

use Models\Session as Session;
use Models\Ticket as Ticket;
use Models\Room as Room;
use Models\Theather as Theather;
use Models\Movie as Movie;

use Controllers\MovieController as C_Movie;
use Controllers\TheatherController as C_Theather;
use Controllers\RoomController as C_Room;
use Controllers\ViewController as C_View;
use Controllers\TicketController as C_Ticket;

use DAO\DAOSession as Dao;
use DAO\Connection as connection;

class SessionController
{

    protected $dao;
    private $movieController;
    private $roomController;
    private $ticketController;
    private $viewController;
    private $theatherController;

    function __construct()
    {
        $this->dao = new Dao;
        $this->movieController = new C_Movie;
        $this->roomController = new C_Room;
        $this->viewController = new C_View;
        $this->ticketController = new C_Ticket;
        $this->theatherController = new C_Theather;
    }

    /*public function create($id_movie, $id_theather, $date, $time, $name_room){  ////// ARREGLAR 

        $id_room = $this->roomController->getId_for_name_theather($name_room, $id_theather); // traemos el id de la sala del cine correcto

        $room = $this->roomController->read($id_room);         // retornamos la sala por id

        $price = $room->getTicketPrice();           // solicitamos el precio de entrada de la sala seleccionada


        ///////// VERIFICAMOS //////////

        $flag = $this->dao->readForTickets($time, $date, $id_theather, $id_movie, $id_room, $price); /// VERIFICA SI EXISTE LA TABLA PARA NO PONER LA MISMA.

        if(is_array($flag) == true){
            
            echo 'existe';
            $this->viewController->viewAddSession();

        }else  {

            // SE PUEDE CREAR LA SESSION ///

            $session = new Session($id_theather, $id_room, $id_movie, $date, $time, $price); // creamos objeto SESSION

            $this->dao->create($session);   // creamos la sesion 

            $session2 = new Session();

            $session2 = $this->dao->readForTickets($time, $date, $id_theather, $id_movie, $id_room, $price);

            //echo 'ID :' . $session2->getId_session();

            $session->setId_session($session2);

            //echo $session->getId_Session();

            if ($session2 != false){
              $this->dao->createTicket($session, $price);            // creamos el ticket
            }else{
                echo 'la cree.';
            }

            //$ticket = new Ticket();

            //$ticket= $this->ticketController->readTicket($session);
            //echo "$ticket";
            //echo $ticket->getId_ticket();
            $this->viewController->viewList_sessions();
        }
    }*/

    public function create ($id_movie, $id_theather, $id_room, $date, $time, $timeEnd){

        $room = new Room('','','','','','');
        $room = $this->roomController->read($id_room);  /// necesitamos precio, tamaño de sala y nombre para el ticket.

        $theather = new Theather();
        $theather = $this->theatherController->read($id_theather);

        $movie = new Movie();
        $movie = $this->movieController->read($id_movie);
    
        $session = new Session($theather, $room, $movie, '', $date, $time, $timeEnd); // creamos objeto SESSION


        /*echo $session->getMovie()->getId().'\n';
        echo $session->getTimeEnd().'\n';
        echo $session->getDate();*/

        $this->dao->create($session);   // creamos la sesion        // todo perfecto.
        $id = $this->dao->readLastid();
        $session->setId_session($id);

        $ticket = new Ticket('', '', $session);

        //id_user='0', $id_ticket='', $id_room='', $id_movie='',  $id_theather='', $id_session=''
        //$id_user='0', $id_ticket='', $id_room='', $id_movie='',  $id_theather='', $date='', $time='', $timeEnd='', $price=''

        $this->ticketController->create($ticket);
    }

    public function readMovieDate($id_movie, $date){

        $flag = $this->dao->readMovieDate($id_movie, $date);
        return $flag;
    }


    public function checkTimeStart($date, $timeStart){

        $list = $this->dao->readAll();
        
        if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
            
        }else if($list ==false){
            $list=[];
        }

        $flag = false;

        foreach ($list as $sesion){

            if ($sesion->getDate() == $date){

                $time= $sesion->getTime();
                $time = time();
                echo "$time";
            }
        }

        return $flag;
    }

    
    public function readAll()
    {
        //guarda todos los user de la base de datos en la variable list

        $list = $this->dao->readAll();


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

    public function readForMovie($movie)
    {
        //guarda todos los user de la base de datos en la variable list

        $list = $this->dao->readSessionsByMovie($movie);

/*
        if (!is_array($list) && $list != false) { // si no hay nada cargado, readall devuelve false
            $array[] = $list;
            $list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false

        } else if ($list == false) {
            $list = [];
        }*/

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
