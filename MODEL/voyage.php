<?php

class Voyage
{
    private string $id;
    private string $titre;
    private string $description;
    private string $country;
    private string $price;
    private string $population;
    private string $continent;
    private string $pathImage;
    private string $category;

    public function __construct($id, $titre, $description, $country, $price, $population, $continent, $pathImage,$category)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->country = $country;
        $this->price = $price;
        $this->population = $population;
        $this->continent = $continent;
        $this->pathImage = $pathImage;
        $this->category = $category;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getCategory()
    {
        return $this->category;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getPopulation()
    {
        return $this->population;
    }

    public function getContinent()
    {
        return $this->continent;
    }

    public function getPathImage()
    {
        return $this->pathImage;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setPopulation($population)
    {
        $this->population = $population;
    }

    public function setContinent($continent)
    {
        $this->continent = $continent;
    }

    public function setPathImage($pathImage)
    {
        $this->pathImage = $pathImage;
    }
}
