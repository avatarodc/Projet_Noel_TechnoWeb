<?php
require_once __DIR__ . '/../models/Cours.php';

function cours_index() {
    $cours = getAllCours();
    require __DIR__ . '/../views/cours/index.php';
}

function cours_create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $code = $_POST['code'] ?? '';
        $nom = $_POST['nom'] ?? '';
        $heures = $_POST['heures'] ?? '';
        
        if (addCours($code, $nom, $heures)) {
            $notification = [
                'type' => 'success',
                'message' => 'Le cours a été créé avec succès.'
            ];
            header('Location: /cours');
            exit;
        } else {
            $notification = [
                'type' => 'danger',
                'message' => 'Une erreur est survenue lors de la création du cours.'
            ];
        }
    }
    require __DIR__ . '/../views/cours/create.php';
}

function cours_edit($id) {
    $cours = getCoursById($id);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $code = $_POST['code'] ?? '';
        $nom = $_POST['nom'] ?? '';
        $heures = $_POST['heures'] ?? '';
        
        if (updateCours($id, $code, $nom, $heures)) {
            header('Location: /cours');
            exit;
        }
    }
    require __DIR__ . '/../views/cours/edit.php';
}

function cours_delete($id) {
    if (deleteCours($id)) {
        header('Location: /cours');
        exit;
    }
}