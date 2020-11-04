<?php

namespace Models;

class Genre
{

    private $id_genre;
    private $name;


    public function __construct($id_genre = '', $name = ''){

        $this->id_genre = $id_genre;
        $this->name = $name;
    }


    ////////////** SETTERS *//////////////////


    public function setId_genre($id_genre)
    {
        $this->id_genre = $id_genre;
    }
    
    public function setName($name)
    {

        $this->name = $name;
    }

    ////////////** GETTERS *//////////////////

    public function getId_genre()
    {
        return $this->id_genre;
    }
    public function getName()
    {

        return $this->name;
    }
}

?>