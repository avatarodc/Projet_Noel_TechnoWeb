<?php

require_once __DIR__ . '/../database.php';


class Client {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;

    public function __construct($nom, $prenom, $email, $telephone) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
    }

    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $query = "SELECT * FROM clients ORDER BY nom, prenom";
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::getInstance()->getConnection();
        $query = "SELECT * FROM clients WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save() {
        $db = Database::getInstance()->getConnection();
        $query = "INSERT INTO clients (nom, prenom, email, telephone) VALUES (:nom, :prenom, :email, :telephone)";
        $stmt = $db->prepare($query);
        return $stmt->execute([
            ':nom' => $this->nom,
            ':prenom' => $this->prenom,
            ':email' => $this->email,
            ':telephone' => $this->telephone
        ]);
    }

    public static function update($id, $nom, $prenom, $email, $telephone) {
        $db = Database::getInstance()->getConnection();
        $query = "UPDATE clients SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone WHERE id = :id";
        $stmt = $db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':telephone' => $telephone
        ]);
    }

    public static function delete($id) {
        $db = Database::getInstance()->getConnection();
        $query = "DELETE FROM clients WHERE id = :id";
        $stmt = $db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}