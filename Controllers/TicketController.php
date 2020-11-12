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

    public function readTicket ($_session){

        $ticket = $this->dao->readId($_session);
        return $ticket;
    }
}
