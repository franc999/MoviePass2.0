<?php namespace Models;

use Room as Room;
use Theather as Theather;
use Movie as Movie;

class Session
{
    private $id_session;
    private $id_theather;   /// guardar tambien el ID ROOM
    private $id_room;
    private $id_movie;
    private $time;
    private $timeEnd;
    private $date;

    public function __construct($id_theather='', $id_room='',$id_movie='',$id_session='', $date='', $time='', $timeEnd='', $availableSeats=''){
        
        $this->id_session = $id_session;
        $this->id_theather= $id_theather;
        $this->id_room=$id_room;
        $this->id_movie=$id_movie;
        $this->date=$date;
        $this->time=$time;
        $this->timeEnd=$timeEnd;
        $this->availableSeats=$availableSeats;
    }

    ////////////** SETTERS *//////////////////

    public function setId_session($id_session)
    {
        $this->id_session=$id_session;
    }

    public function setTheather($id_theather){

        $this->id_theather=$id_theather;
    }

    public function setRoom($id_room)
    {
        $this->id_room=$id_room;
    }

    public function setMovie($id_movie)
    {
        $this->id_movie=$id_movie;
    }

    public function setDate($date)
    {
        $this->date=$date;
    }

    public function setTime($time)
    {
        $this->time=$time;
    }

    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd=$timeEnd;
    }

    ////////////** GETTERS *//////////////////

    public function getId_session()
    {
        return $this->id_session;
    }
    
    public function getTheather(){

        return $this->id_theather;
    }

    public function getRoom()
    {
        return $this->id_room;
    }
    
    public function getMovie()
    {
        return $this->id_movie;
    }
   
    public function getDate()
    {
        return $this->date;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getTimeEnd()
    {
        return $this->timeEnd;
    }
}

?>