<?php
require_once __DIR__ . '/../database.php';

function getAllCours() {
    $conn = getConnection();
    $query = "SELECT * FROM cours";
    $result = $conn->query($query);
    $cours = [];
    
    if ($result) {
        while($row = $result->fetch_assoc()) {
            $cours[] = $row;
        }
    }
    $conn->close();
    return $cours;
}

function addCours($code, $nom, $heures) {
    $conn = getConnection();
    $query = "INSERT INTO cours (code, nom, nombre_heures) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Erreur de préparation : " . $conn->error);
    }
    $stmt->bind_param("ssi", $code, $nom, $heures);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function updateCours($id, $code, $nom, $heures) {
    $conn = getConnection();
    $query = "UPDATE cours SET code=?, nom=?, nombre_heures=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssii", $code, $nom, $heures, $id);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function deleteCours($id) {
    $conn = getConnection();
    $query = "DELETE FROM cours WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function getCoursById($id) {
    $conn = getConnection();
    $query = "SELECT * FROM cours WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cours = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $cours;
}