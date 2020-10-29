<?php namespace Models;


class Room
{
    private $id_room;
    private $theather;
    private $name;
    private $ticketPrice;
    private $totalSeats;


    public function __construct($theather='',$name='',$id_room='', $totalSeats='', $ticketPrice=''){
        
        $this->id_room=$id_room;
        $this->theather=$theather;
        $this->name=$name;
        $this->ticketPrice=$ticketPrice;
        $this->totalSeats=$totalSeats;
    }

    ////////////** SETTERS *//////////////////

    public function setId($id_room)
    {
        $this->id_room->$id_room;
    }

    public function setTheather($theather){

        $this->theather=$theather;
    }

    public function setName($name)
    {
        $this->name=$name;
    }

    public function setTicketPrice($ticketPrice)
    {
        $this->ticketPrice=$ticketPrice;
    }

    public function setTotalSeats($totalSeats){

        $this->totalSeats=$totalSeats;
    }    

    ////////////** GETTERS *//////////////////

    public function getId()
    {
        return $this->id_room;
    }

    public function getTheather(){

        return $this->theather;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTicketPrice()
    {
        return $this->ticketPrice;
    }

    public function getTotalSeats(){
        return $this->totalSeats;
    }
}
