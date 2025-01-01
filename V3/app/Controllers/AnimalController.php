<?php
namespace App\Controllers;

use App\Models\Animal;
use App\Models\Equipment;
use Exception;

class AnimalController
{
    private $entityManager;
    private $blade;

    public function __construct($entityManager, $blade)
    {
        $this->entityManager = $entityManager;
        $this->blade = $blade;
    }

    public function index()
    {
        try {
            $animals = $this->entityManager->getRepository(Animal::class)->findAll();
            return $this->blade->render('animal.index', ['animals' => $animals]);
        } catch (Exception $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function create()
    {
        try {
            $equipements = $this->entityManager->getRepository(Equipment::class)->findAll();
            return $this->blade->render('animal.create', ['equipements' => $equipements]);
        } catch (Exception $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function store($request)
    {
        try {
            $animal = new Animal();
            $animal->setType($request['type']);
            $animal->setAge($request['age']);
            $animal->setSante($request['sante']);
            
            if (!empty($request['equipement_id'])) {
                $equipement = $this->entityManager->find(Equipment::class, $request['equipement_id']);
                if ($equipement) {
                    $animal->setEquipement($equipement);
                }
            }

            $this->entityManager->persist($animal);
            $this->entityManager->flush();

            return header('Location: /animals');
        } catch (Exception $e) {
            return "Erreur lors de la création : " . $e->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            $animal = $this->entityManager->find(Animal::class, $id);
            $equipements = $this->entityManager->getRepository(Equipment::class)->findAll();
            return $this->blade->render('animal.edit', [
                'animal' => $animal,
                'equipements' => $equipements
            ]);
        } catch (Exception $e) {
            return "Erreur lors de l'édition : " . $e->getMessage();
        }
    }

    public function update($id, $request)
    {
        try {
            $animal = $this->entityManager->find(Animal::class, $id);
            $animal->setType($request['type']);
            $animal->setAge($request['age']);
            $animal->setSante($request['sante']);
            
            if (!empty($request['equipement_id'])) {
                $equipement = $this->entityManager->find(Equipment::class, $request['equipement_id']);
                if ($equipement) {
                    $animal->setEquipement($equipement);
                }
            } else {
                $animal->setEquipement(null);
            }

            $this->entityManager->flush();

            return header('Location: /animals');
        } catch (Exception $e) {
            return "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $animal = $this->entityManager->find(Animal::class, $id);
            $this->entityManager->remove($animal);
            $this->entityManager->flush();

            return header('Location: /animals');
        } catch (Exception $e) {
            return "Erreur lors de la suppression : " . $e->getMessage();
        }
    }
}