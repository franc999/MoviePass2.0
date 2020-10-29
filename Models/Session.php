<?php namespace Models;


class Session
{
    private $id_session;
    private $theather;
    private $room;
    private $movie;
    private $date;
    private $time;
    private $id_movie;
    private $id_ticket;



    public function __construct($theather='',$room='',$movie='',$date='',$time='',$id_movie='',$id_session='',$id_ticket='', $price=''){
        
        $this->id_session=$id_session;
        $this->theather=$theather;
        $this->room=$room;
        $this->movie=$movie;
        $this->date=$date;
        $this->time=$time;
        $this->$id_movie=$id_movie;
        $this->id_ticket=$id_ticket;
        $this->price=$price;
    }

    ////////////** SETTERS *//////////////////

    public function setId($id_session)
    {
        $this->id_session=$id_session;
    }

    public function setTheather($theather){

        $this->theather=$theather;
    }

    public function setRoom($room)
    {
        $this->room=$room;
    }

    public function setMovie($movie)
    {
        $this->movie=$movie;
    }

    public function setDate($date)
    {
        $this->date=$date;
    }

    public function setTime($time)
    {
        $this->time=$time;
    }

    public function setId_movie($id_movie){
        
        $this->id_movie=$id_movie;
    }

    public function setid_ticket($id_ticket)
    {
        $this->id_ticket=$id_ticket;
    }

    public function setPrice($price){

        $this->price=$price;
    }

    ////////////** GETTERS *//////////////////

    public function getId()
    {
        return $this->id_session;
    }

    public function getTheather(){

        return $this->theather;
    }

    public function getRoom()
    {
        return $this->room;
    }

    public function getMovie()
    {
        return $this->movie;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getid_ticket()
    {
        return $this->id_ticket;
    }

    public function getId_movie(){
        
        return $this->id_movie;
    }

    public function getPrice(){

        return $this->price;
    }
}

?>