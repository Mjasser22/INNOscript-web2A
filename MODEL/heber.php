<?php
class heber
{
    private ?int $id= null;
    private ?string $prix = null;
    private ?string $datedispo = null;
    private ?string $locationn= null;
    private ?string $descc = null;

    public function __construct($id = null, $n, $p, $a, $d)
    {
        $this->id= $id;
        $this->prix = $n;
        $this->datedispo = $p;
        $this-> locationn= $a;
        $this->descc = $d;
    }


    public function getId()
    {
        return $this->id;
    }



    public function getprix()
    {
        return $this->prix;
    }
    public function getdatedispo()
    {
        return $this->datedispo;
    }
    public function getlocation()
    {
        return $this->locationn;
    }
    public function getdesc()
    {
        return $this->descc;
    }






    
    public function setprix()
    {
        $this->prix = $prix;
        return $this;
    }
    public function setdatedispo()
    {
        $this->datedispo = $datedispo;
        return $this;
    }
    public function setlocation()
    {
        $this->locationn = $locationn;
        return $this;
    }
    public function setdesc()
    {
        $this->descc = $descc;
        return $this;
    }




  
}
