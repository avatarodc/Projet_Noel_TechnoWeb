<?php
require_once __DIR__ . '/../models/Etudiant.php';

function index() {
    $etudiants = getAllEtudiants();
    require __DIR__ . '/../views/etudiants/index.php';
}

function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (addEtudiant($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['filiere'])) {
            setNotification('success', 'Étudiant ajouté avec succès');
            header('Location: /etudiants');
            exit;
        } else {
            setNotification('danger', 'Erreur lors de l\'ajout de l\'étudiant');
        }
    }
    $title = 'Ajouter un étudiant';
    ob_start();
    require __DIR__ . '/../views/etudiants/create.php';
    $content = ob_get_clean();
    require __DIR__ . '/../views/layouts/main.php';
}

function edit($id) {
    $etudiant = getEtudiantById($id);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $filiere = $_POST['filiere'] ?? '';
        
        if (updateEtudiant($id, $nom, $prenom, $email, $filiere)) {
            header('Location: /etudiants');
            exit;
        }
    }
    
    require __DIR__ . '/../views/etudiants/edit.php';
}

function delete($id) {
    if (deleteEtudiant($id)) {
        header('Location: /etudiants');
        exit;
    }
}