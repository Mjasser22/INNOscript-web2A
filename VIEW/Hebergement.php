<?php

class Hebergement
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?float $prix = null;
    private ?string $ville = null;
    private ?string $adresse = null;
    private ?int $id_categorie = null;

    public function __construct($id = null, $n, $p, $v, $a, $id_cat)
    {
        $this->id = $id;
        $this->nom = $n;
        $this->prix = $p;
        $this->ville = $v;
        $this->adresse = $a;
        $this->id_categorie = $id_cat;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
        return $this;
    }

}
?>
