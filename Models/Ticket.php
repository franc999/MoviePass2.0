<?php

namespace Models;


class Ticket
{
    private $id_ticket;
    private $id_user;
    //private $id_room;
    private $id_movie;
    private $id_theather;
    /*private $code;
    private $date;
    private $time;
    private $price;*/

    public function __construct($id_ticket = '', $id_user = '0', $id_movie = '',  $id_theather = '')
    {
        $this->id_ticket = $id_ticket;
        $this->id_user = $id_user;
        /*$this->id_room = $id_room;*/
        $this->id_theather = $id_theather;
        $this->id_movie = $id_movie;
        /*$this->code = $code;
        $this->date = $date;
        $this->time = $time;
        $this->price = $price;*/
    }


    ////////////** SETTERS *//////////////////

    public function setId_ticket($id_ticket)
    {

        $this->id_ticket = $id_ticket;
    }

    public function setId_user($id_user){

        $this->id_user = $id_user;
    }

    /*public function setid_room($id_room)
    {

        $this->id_room = $id_room;
    }

    public function setCode($code)
    {

        $this->code = $code;
    }*/

    public function setid_movie($id_movie)
    {

        $this->id_movie = $id_movie;
    }

    /*
    public function setDate($date)
    {

        $this->date = $date;
    }
*/
    public function setid_theather($id_theather)
    {

        $this->id_theather = $id_theather;
    }
    /*
    public function setTime($time){

        $this->time = $time;
    }

    public function setPrice($price)
    {

        $this->price = $price;
    }*/



    ////////////** GETTERS *//////////////////

    public function getId_ticket()
    {

        return $this->id_ticket;
    }

    public function getId_user()
    {

        return $this->id_user;
    }

    public function getid_room()
    {

        return $this->id_room;
    }

    public function getCode()
    {

        return $this->code;
    }

    public function getid_movie()
    {

        return $this->id_movie;
    }


    public function getTime(){

        return $this->time;
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
