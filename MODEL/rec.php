<?php
class Reclamation
{
    private ?int $Id_R = NULL;
    private ?int $Id_E = NULL;
    private ?int $Id_U = NULL;
    private ?int $descrip = NULL;
    

    public function __construct($Id_R = NULL, $Id_E, $Id_U, $descrip)
    {
        $this->Id_E = $Id_E;
        $this->Id_U = $Id_U;
        $this->descrip = $descrip;
       
    
    }

    public function getId_R()
    {
        return $this->Id_R;
    }

    public function setId_R($Id_R)
    {
        $this->Id_R = $Id_R;

        return $this;
    }

    public function getId_E()
    {
        return $this->Id_E;
    }

    public function setId_E($Id_E)
    {
        $this->Id_E = $Id_E;

        return $this;
    }

    public function getId_U()
    {
        return $this->Id_U;
    }

    public function setId_U($Id_U)
    {
        $this->Id_U = $Id_U;

        return $this;
    }
    
    public function getdescrip()
    {
        return $this->descrip;
    }

    public function setdescrip($descrip)
    {
        $this->descrip = $descrip;

        return $this;
    }

    
}


