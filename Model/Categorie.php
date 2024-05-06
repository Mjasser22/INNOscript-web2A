<?php
class categorie
{
    private ?int $id = null;
    private ?string $libelle= null;


    public function __construct($id = null, $libelle)
    {
        $this->id = $id;
        $this->libelle = $libelle;
    }

    public function getid()
    {
        return $this->id;
    }

    public function getlibelle()
    {
        return $this->libelle;
    }

    public function setlibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

}
