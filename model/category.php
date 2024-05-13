<?php

class Category
{
    private string $id;
    private string $name;    

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    
    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


}