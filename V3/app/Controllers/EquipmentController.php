<?php
namespace App\Controllers;

use App\Models\Equipment;
use Exception;

class EquipmentController
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
            $equipments = $this->entityManager->getRepository(Equipment::class)->findAll();
            return $this->blade->render('equipment.index', ['equipments' => $equipments]);
        } catch (Exception $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function create()
    {
        return $this->blade->render('equipment.create');
    }

    public function store($request)
    {
        $equipment = new Equipment();
        $equipment->setNom($request['nom']);
        $equipment->setEtat($request['etat']);
        $equipment->setDisponibilite(isset($request['disponibilite']));

        $this->entityManager->persist($equipment);
        $this->entityManager->flush();

        return header('Location: /equipment');
    }

    public function edit($id)
    {
        $equipment = $this->entityManager->getRepository(Equipment::class)->find($id);
        return $this->blade->render('equipment.edit', ['equipment' => $equipment]);
    }

    public function update($id, $request)
    {
        $equipment = $this->entityManager->getRepository(Equipment::class)->find($id);
        $equipment->setNom($request['nom']);
        $equipment->setEtat($request['etat']);
        $equipment->setDisponibilite(isset($request['disponibilite']));

        $this->entityManager->flush();

        return header('Location: /equipment');
    }

    public function delete($id)
    {
        $equipment = $this->entityManager->getRepository(Equipment::class)->find($id);
        $this->entityManager->remove($equipment);
        $this->entityManager->flush();

        return header('Location: /equipment');
    }
}