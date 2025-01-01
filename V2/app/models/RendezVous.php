<?php
require_once __DIR__ . '/../database.php';

class RendezVous {
    private $id;
    private $date;
    private $heure;
    private $description;
    private $client_id;

    public function __construct($date, $heure, $description, $client_id) {
        $this->date = $date;
        $this->heure = $heure;
        $this->description = $description;
        $this->client_id = $client_id;
    }

    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $query = "SELECT r.*, c.nom as client_nom, c.prenom as client_prenom 
                 FROM rendez_vous r 
                 JOIN clients c ON r.client_id = c.id 
                 ORDER BY r.date, r.heure";
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::getInstance()->getConnection();
        $query = "SELECT * FROM rendez_vous WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save() {
        $db = Database::getInstance()->getConnection();
        $query = "INSERT INTO rendez_vous (date, heure, description, client_id) 
                 VALUES (:date, :heure, :description, :client_id)";
        $stmt = $db->prepare($query);
        return $stmt->execute([
            ':date' => $this->date,
            ':heure' => $this->heure,
            ':description' => $this->description,
            ':client_id' => $this->client_id
        ]);
    }

    public static function update($id, $date, $heure, $description, $client_id) {
        $db = Database::getInstance()->getConnection();
        $query = "UPDATE rendez_vous 
                 SET date = :date, heure = :heure, description = :description, client_id = :client_id 
                 WHERE id = :id";
        $stmt = $db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':date' => $date,
            ':heure' => $heure,
            ':description' => $description,
            ':client_id' => $client_id
        ]);
    }

    public static function delete($id) {
        $db = Database::getInstance()->getConnection();
        $query = "DELETE FROM rendez_vous WHERE id = :id";
        $stmt = $db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}