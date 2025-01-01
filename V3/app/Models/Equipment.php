<?php
namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'equipements')]
class Equipment {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string')]
    private $nom;

    #[ORM\Column(type: 'string')]
    private $etat;

    #[ORM\Column(type: 'boolean')]
    private $disponibilite;

    // Getters and Setters
    public function getId() { return $this->id; }
    
    public function getNom() { return $this->nom; }
    public function setNom($nom) { $this->nom = $nom; }
    
    public function getEtat() { return $this->etat; }
    public function setEtat($etat) { $this->etat = $etat; }
    
    public function getDisponibilite() { return $this->disponibilite; }
    public function setDisponibilite($disponibilite) { $this->disponibilite = $disponibilite; }
}
