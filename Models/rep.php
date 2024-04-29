<?php

class Reponse
{
    private ?int $Id_Rep = NULL;
    private ?string $Id_R;
    private ?int $description ;
    private ?int $eval=0 ;

    public function __construct($Id_Rep=NULL, $Id_R, $description ,$eval)
    {

        $this->Id_R = $Id_R;
        $this->description = $description;
        $this->eval = $eval;
    }

    public function getId_Rep()
    {
        return $this->Id_R;
    }

    public function setId_Rep($Id_R)
    {
        $this->Id_R = $Id_R;

        return $this;
    }

    public function getdescription()
    {
        return $this->description;
    }

    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }
    
    public function geteval()
    {
        return $this->eval;
    }

    public function seteval($eval)
    {
        $this->eval = $eval;

        return $this;
    }

}