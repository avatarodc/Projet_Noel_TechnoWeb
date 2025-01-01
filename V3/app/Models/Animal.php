<?php
namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'animaux')]
class Animal {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string')]
    private $type;

    #[ORM\Column(type: 'integer')]
    private $age;

    #[ORM\Column(type: 'string')]
    private $sante;

    #[ORM\ManyToOne(targetEntity: Equipment::class)]
    private $equipement;

    // Getters and Setters
    public function getId() { return $this->id; }
    public function getType() { return $this->type; }
    public function setType($type) { $this->type = $type; }
    public function getAge() { return $this->age; }
    public function setAge($age) { $this->age = $age; }
    public function getSante() { return $this->sante; }
    public function setSante($sante) { $this->sante = $sante; }
    public function getEquipement() { return $this->equipement; }
    public function setEquipement($equipement) { $this->equipement = $equipement; }
}
