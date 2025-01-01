<?php
require_once __DIR__ . '/../models/Client.php';

class ClientController {
    public function index() {
        $clients = Client::getAll();
        $title = 'Liste des clients';
        ob_start();
        require __DIR__ . '/../views/clients/index.php';
        $content = ob_get_clean();
        require __DIR__ . '/../views/layouts/main.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $client = new Client(
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                $_POST['telephone']
            );
            
            if ($client->save()) {
                $_SESSION['notification'] = [
                    'type' => 'success',
                    'message' => 'Client ajouté avec succès'
                ];
                header('Location: /clients');
                exit;
            }
        }
        
        $title = 'Ajouter un client';
        ob_start();
        require __DIR__ . '/../views/clients/create.php';
        $content = ob_get_clean();
        require __DIR__ . '/../views/layouts/main.php';
    }

    public function edit($id) {
        $client = Client::getById($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (Client::update(
                $id,
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                $_POST['telephone']
            )) {
                $_SESSION['notification'] = [
                    'type' => 'success',
                    'message' => 'Client modifié avec succès'
                ];
                header('Location: /clients');
                exit;
            }
        }
        
        $title = 'Modifier un client';
        ob_start();
        require __DIR__ . '/../views/clients/edit.php';
        $content = ob_get_clean();
        require __DIR__ . '/../views/layouts/main.php';
    }

    public function delete($id) {
        if (Client::delete($id)) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Client supprimé avec succès'
            ];
        }
        header('Location: /clients');
        exit;
    }
}