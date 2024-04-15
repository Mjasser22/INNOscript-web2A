<?php
class User {
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $email;
    private $password;
    private $telephone;
    private $num_passport;
    private $genre;
    private $pays;


    public function __construct($id, $nom, $prenom, $adresse, $email, $password, $telephone, $num_passport, $genre, $pays) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
        $this->num_passport = $num_passport;
        $this->genre = $genre;
        $this->pays = $pays;
    }

    // Méthodes pour accéder aux propriétés privées

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getNumPassport() {
        return $this->num_passport;
    }

    public function setNumPassport($num_passport) {
        $this->num_passport = $num_passport;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function getPays() {
        return $this->pays;
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }
}
?>
