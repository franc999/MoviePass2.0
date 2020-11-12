<?php

namespace Models;


class Ticket
{
    private $id_ticket;
    private $id_user;
    private $id_room;
    private $id_movie;
    private $id_theather;
    private $timeEnd;
    private $date;
    private $time;
    private $price;

    public function __construct($id_user='', $id_ticket='', $id_session='')
    {
        $this->id_ticket = '';
        $this->id_user = '';
        /*$this->id_room = $id_room;
        $this->id_theather = $id_theather;
        $this->id_movie = $id_movie;*/
        $this->id_session = $id_session;
        /*$this->date = $date;
        $this->time = $time;
        $this->timeEnd = $timeEnd;
        $this->price = $price;*/
    }

    /*public function __construct($id_user='0', $id_ticket='', $id_room='', $id_movie='',  $id_theather='', $date='', $time='', $timeEnd='', $price='')
    {
        $this->id_ticket = $id_ticket;
        $this->id_user = $id_user;
        $this->id_room = $id_room;
        $this->id_theather = $id_theather;
        $this->id_movie = $id_movie;
        $this->date = $date;
        $this->time = $time;
        $this->timeEnd = $timeEnd;
        $this->price = $price;
    }


    ////////////** SETTERS *//////////////////

    public function setId_session($id_session)
    {

        $this->id_session= $id_session;
    }

    public function setId_ticket($id_ticket)
    {

        $this->id_ticket = $id_ticket;
    }

    public function setId_user($id_user){

        $this->id_user = $id_user;
    }

    public function setId_room($id_room)
    {

        $this->id_room = $id_room;
    }

    public function setCode($code)
    {

        $this->code = $code;
    }

    public function setid_movie($id_movie)
    {

        $this->id_movie = $id_movie;
    }

    
    public function setDate($date)
    {

        $this->date = $date;
    }

    public function setId_theather($id_theather)
    {

        $this->id_theather = $id_theather;
    }
    
    public function setTime($time){

        $this->time = $time;
    }

    public function setTimeEnd($timeEnd){

        $this->timeEnd = $timeEnd;
    }

    public function setPrice($price)
    {

        $this->price = $price;
    }



    ////////////** GETTERS *//////////////////

    public function getId_session()
    {

        return $this->id_session;
    }

    public function getId_ticket()
    {

        return $this->id_ticket;
    }

    public function getId_user()
    {

        return $this->id_user;
    }

    public function getId_room()
    {

        return $this->id_room;
    }

    public function getCode()
    {

        return $this->code;
    }

    public function getId_movie()
    {

        return $this->id_movie;
    }


    public function getTime(){

        return $this->time;
    }

    public function getTimeEnd(){

        return $this->timeEnd;
    }

    public function getDate()
    {

        return $this->date;
    }

    public function getid_theather()
    {

        return $this->id_theather;
    }

    public function getPrice()
    {

        return $this->price;
    }
}
