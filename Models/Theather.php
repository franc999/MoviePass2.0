<?php namespace Models;


class Theather
{
    private $idTheather;
    private $name;
    private $id_room;   // arreglo de salas
    private $adress;

    public function __construct($idTheather = '', $name = '', $adress = '')
    {

        $this->idTheather = $idTheather;
        $this->name = $name;
        $this->id_room = array();
        $this->adress = $adress;
    }


    ////////////** SETTERS *//////////////////


    public function setId($id)
    {

        $this->idTheather = $id;
    }

    public function setName($name)
    {

        $this->name = $name;
    }

    public function setAdress($adress){

        $this->adress = $adress;
    }

    public function setId_room($room){

        array_push($this->id_room, $room);
    }

    ////////////** GETTERS *//////////////////

    public function getId()
    {

        return $this->idTheather;
    }

    public function getName()
    {

        return $this->name;
    }

    public function getAdress(){

        return $this->adress;
    }

    public function getId_room(){

        return $this->id_room;
    }
}
?>