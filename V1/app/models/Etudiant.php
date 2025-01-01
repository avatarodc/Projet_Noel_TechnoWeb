<?php
require_once __DIR__ . '/../database.php';

function getAllEtudiants() {
    $conn = getConnection();
    $query = "SELECT * FROM etudiants";
    $result = $conn->query($query);
    $etudiants = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $etudiants[] = $row;
        }
    }
    $conn->close();
    return $etudiants;
}

function addEtudiant($nom, $prenom, $email, $filiere) {
    $conn = getConnection();
    $query = "INSERT INTO etudiants (nom, prenom, email, filiere) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $nom, $prenom, $email, $filiere);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function updateEtudiant($id, $nom, $prenom, $email, $filiere) {
    $conn = getConnection();
    $query = "UPDATE etudiants SET nom=?, prenom=?, email=?, filiere=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $nom, $prenom, $email, $filiere, $id);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function deleteEtudiant($id) {
    $conn = getConnection();
    $query = "DELETE FROM etudiants WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function getEtudiantById($id) {
    $conn = getConnection();
    $query = "SELECT * FROM etudiants WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $etudiant = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $etudiant;
}