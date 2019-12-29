<?php
class Adminstration{
    private $conn;
    private $table = 'adminstration';
    public $id;
    public $nom;
    public $region;
    public $departement;
    public $commune;
    public $localite;
    public $nomservice;
    public $latitude;
    public $longitude;
    public $telephone;
    public $email;
    public $heure;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create(){
        $query = 'INSERT INTO'. $this->table . ' SET nom = :nom, region = :region, departement = :department, commune = :commune,
         localite = :localite, nomservice = :nomservice, latitude = :latitude, longitude = :longitude, telephone = :telephone, email = :email, heure = :heure';
        $connexion = $this->conn->prepare($query);
        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->region = htmlspecialchars(strip_tags($this->region));
        $this->departement = htmlspecialchars(strip_tags($this->departement));
        $this->commune = htmlspecialchars(strip_tags($this->commune));
        $this->localite = htmlspecialchars(strip_tags($this->localite));
        $this->nomservice = htmlspecialchars(strip_tags($this->nomservice));
        $this->latitude = htmlspecialchars(strip_tags($this->latitude));
        $this->longitude = htmlspecialchars(strip_tags($this->longitude));
        $this->telephone = htmlspecialchars(strip_tags($this->telephone));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->heure = htmlspecialchars(strip_tags($this->heure));
        $connexion->bindParam(':nom', $this->nom);
        $connexion->bindParam(':region', $this->region);
        $connexion->bindParam(':departement', $this->departement);
        $connexion->bindParam(':commune', $this->commune);
        $connexion->bindParam(':localite', $this->localite);
        $connexion->bindParam(':nomservice', $this->nomservice);
        $connexion->bindParam(':latitude', $this->latitude);
        $connexion->bindParam(':longitude', $this->longitude);
        $connexion->bindParam(':telephone', $this->telephone);
        $connexion->bindParam(':email', $this->email);
        $connexion->bindParam(':heure', $this->heure);
        if($connexion->execute()) {
            return true;
        }
        //printf("Error: %s.\n", $connexion->error);

        return false;


    }
}
