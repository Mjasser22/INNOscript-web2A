<?php

class Commentaire {
    private $id_user;
    private $nom;
    private $prenom;
    private $avis;
    private $email;
    private $id_comment;

    // Constructeur
    public function __construct($id_user, $nom, $prenom, $avis, $email, $id_comment) {
        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->avis = $avis;
        $this->email = $email;
        $this->id_comment = $id_comment;
    }

    // Getters
    public function getIdUser() {
        return $this->id_user;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getavis() {
        return $this->avis;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getIdComment() {
        return $this->id_comment;
    }

    // Setters
    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setavis($avis) {
        $this->avis = $avis;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setIdComment($id_comment) {
        $this->id_comment = $id_comment;
    }
}
?>