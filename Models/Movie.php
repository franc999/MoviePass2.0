<?php

namespace Models;

class Movie
{

    private $id;
    private $title;
    private $category;
    private $age;
    private $img;


    public function __construct($id = '', $title = '', $category = '', $age = '', $img = '')
    {

        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
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

    public function setCategory($category)
    {

        $this->category = $category;
    }

    public function setAge($age)
    {

        $this->age = $age;
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

    public function getCategory()
    {

        return $this->category;
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