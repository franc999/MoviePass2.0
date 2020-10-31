<?php

namespace Models;


class Ticket
{
    private $id_ticket;
    private $id_user;
    private $name_room;
    private $name_movie;
    private $name_theather;
    private $code;
    private $date;
    private $time;
    private $price;

    public function __construct($id_ticket = '', $id_user = '0', $name_room = '', $name_movie = '',  $name_theather = '', $code = '', $time = '', $date = '', $price = '')
    {
        $this->id_ticket = $id_ticket;
        $this->id_user = $id_user;
        $this->name_room = $name_room;
        $this->name_theather = $name_theather;
        $this->name_movie = $name_movie;
        $this->code = $code;
        $this->date = $date;
        $this->time = $time;
        $this->price = $price;
    }


    ////////////** SETTERS *//////////////////

    public function setId_ticket($id_ticket)
    {

        $this->id_ticket = $id_ticket;
    }

    public function setId_user($id_user){

        $this->id_user = $id_user;
    }

    public function setName_room($name_room)
    {

        $this->name_room = $name_room;
    }

    public function setCode($code)
    {

        $this->code = $code;
    }

    public function setName_movie($name_movie)
    {

        $this->name_movie = $name_movie;
    }


    public function setDate($date)
    {

        $this->date = $date;
    }

    public function setName_theather($name_theather)
    {

        $this->name_theather = $name_theather;
    }

    public function setTime($time){

        $this->time = $time;
    }

    public function setPrice($price)
    {

        $this->price = $price;
    }



    ////////////** GETTERS *//////////////////

    public function getId_ticket()
    {

        return $this->id_ticket;
    }

    public function getId_user()
    {

        return $this->id_user;
    }

    public function getName_room()
    {

        return $this->name_room;
    }

    public function getCode()
    {

        return $this->code;
    }

    public function getName_movie()
    {

        return $this->name_movie;
    }


    public function getTime(){

        return $this->time;
    }

    public function getDate()
    {

        return $this->date;
    }

    public function getName_theather()
    {

        return $this->name_theather;
    }

    public function getPrice()
    {

        return $this->price;
    }
}
