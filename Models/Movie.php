<?php

namespace Models;

class Movie
{

    private $id;
    private $title;
    private $genre;
    private $age;
    private $img;


    public function __construct($id = '', $title = '', $genre = '', $age = '', $img = ''){

        $this->id = $id;
        $this->title = $title;
        $this->genre = $genre;
        $this->age = $age;
        $this->img = $img;
    }


    ////////////** SETTERS *//////////////////


    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitle($title)
    {

        $this->title = $title;
    }

    public function setGenre($genre)
    {

        $this->genre = $genre;
    }

    public function setAge($age)
    {

        $this->age = $age;
    }

    public function setImg($img){

        $this->img = $img;
    }


    ////////////** GETTERS *//////////////////

    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {

        return $this->title;
    }

    public function getGenre()
    {

        return $this->genre;
    }

    public function getAge()
    {

        return $this->age;
    }

    public function getImg()
    {
        return $this->img;
    }
}

?>