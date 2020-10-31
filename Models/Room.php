<?php namespace Models;


class Room
{
    private $id_room;
    private $id_theather;
    private $name;
    private $ticketPrice;
    private $totalSeats;


    public function __construct($id_theather='',$name='',$id_room='', $totalSeats='', $ticketPrice=''){
        
        $this->id_room=$id_room;
        $this->id_theather=$id_theather;
        $this->name=$name;
        $this->ticketPrice=$ticketPrice;
        $this->totalSeats=$totalSeats;
    }

    ////////////** SETTERS *//////////////////

    public function setId_room($id_room)
    {
        $this->id_room->$id_room;
    }

    public function setId_theather($id_theather){

        $this->id_theather=$id_theather;
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

    public function getId_Room()
    {
        return $this->id_room;
    }

    public function getId_theather(){

        return $this->id_theather;
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
