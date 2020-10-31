<?php namespace Models;


class Theather
{
    private $idTheather;
    private $name;

    public function __construct($idTheather = '', $name = '')
    {

        $this->idTheather = $idTheather;
        $this->name = $name;
    }


    ////////////** SETTERS *//////////////////


    public function setId($id)
    {

        $this->id = $id;
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