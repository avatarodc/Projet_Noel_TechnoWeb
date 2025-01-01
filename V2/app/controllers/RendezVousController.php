<?php
require_once __DIR__ . '/../models/RendezVous.php';
require_once __DIR__ . '/../models/Client.php';

class RendezVousController {
    public function index() {
        $rendezVous = RendezVous::getAll();
        $title = 'Liste des rendez-vous';
        ob_start();
        require __DIR__ . '/../views/rendezvous/index.php';
        $content = ob_get_clean();
        require __DIR__ . '/../views/layouts/main.php';
    }

    public function create() {
        $clients = Client::getAll(); // Pour le select des clients
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $rendezVous = new RendezVous(
                $_POST['date'],
                $_POST['heure'],
                $_POST['description'],
                $_POST['client_id']
            );
            
            if ($rendezVous->save()) {
                $_SESSION['notification'] = [
                    'type' => 'success',
                    'message' => 'Rendez-vous ajouté avec succès'
                ];
                header('Location: /rendez-vous');
                exit;
            } else {
                $_SESSION['notification'] = [
                    'type' => 'danger',
                    'message' => 'Erreur lors de l\'ajout du rendez-vous'
                ];
            }
        }
        
        $title = 'Nouveau rendez-vous';
        ob_start();
        require __DIR__ . '/../views/rendezvous/create.php';
        $content = ob_get_clean();
        require __DIR__ . '/../views/layouts/main.php';
    }

    public function edit($id) {
        $rendezVous = RendezVous::getById($id);
        $clients = Client::getAll(); // Pour le select des clients
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (RendezVous::update(
                $id,
                $_POST['date'],
                $_POST['heure'],
                $_POST['description'],
                $_POST['client_id']
            )) {
                $_SESSION['notification'] = [
                    'type' => 'success',
                    'message' => 'Rendez-vous modifié avec succès'
                ];
                header('Location: /rendez-vous');
                exit;
            } else {
                $_SESSION['notification'] = [
                    'type' => 'danger',
                    'message' => 'Erreur lors de la modification du rendez-vous'
                ];
            }
        }
        
        $title = 'Modifier le rendez-vous';
        ob_start();
        require __DIR__ . '/../views/rendezvous/edit.php';
        $content = ob_get_clean();
        require __DIR__ . '/../views/layouts/main.php';
    }

    public function delete($id) {
        if (RendezVous::delete($id)) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Rendez-vous supprimé avec succès'
            ];
        } else {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Erreur lors de la suppression du rendez-vous'
            ];
        }
        header('Location: /rendez-vous');
        exit;
    }
}