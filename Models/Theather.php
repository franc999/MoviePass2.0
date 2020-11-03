<?php namespace Models;


class Theather
{
    private $idTheather;
    private $name;
    private $id_room;   // arreglo de salas

    public function __construct($idTheather = '', $name = '', $id_room = '')
    {

        $this->idTheather = $idTheather;
        $this->name = $name;
        $this->id_room = $id_room;
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

    ////////////** GETTERS *//////////////////

    public function getId()
    {

        return $this->idTheather;
    }

    public function getName()
    {

        return $this->name;
    }
}
?>