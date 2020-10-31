<?php namespace Models;


class Session
{
    private $id_session;
    private $id_theather;
    private $id_room;
    private $id_movie;
    private $date;
    private $time;
    private $price;

    public function __construct($id_theather='',$id_room='',$id_movie='',$date='',$time='',  $price='', $id_session=''){
        
        $this->id_session=$id_session;
        $this->id_theather=$id_theather;
        $this->id_room=$id_room;
        $this->id_movie=$id_movie;
        $this->date=$date;
        $this->time=$time;
        $this->price=$price;
    }

    ////////////** SETTERS *//////////////////

    public function setId_session($id_session)
    {
        $this->id_session=$id_session;
    }

    public function setId_theather($id_theather){

        $this->id_theather=$id_theather;
    }

    public function setId_room($id_room)
    {
        $this->id_room=$id_room;
    }

    public function setId_movie($id_movie)
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

    public function setPrice($price){

        $this->price=$price;
    }

    ////////////** GETTERS *//////////////////

    public function getId_session()
    {
        return $this->id_session;
    }

    public function getId_theather(){

        return $this->id_theather;
    }

    public function getId_room()
    {
        return $this->id_room;
    }
    public function getId_movie()
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

    public function getPrice(){

        return $this->price;
    }
}

?>