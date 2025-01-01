<?php
// public/index.php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AnimalController;
use App\Controllers\EquipmentController;

try {
    $container = require __DIR__ . '/../app/config/bootstrap.php';
    
    if (!isset($container['entityManager']) || !isset($container['blade'])) {
        throw new Exception('Configuration incorrecte: EntityManager ou Blade non trouvé');
    }

    $entityManager = $container['entityManager'];
    $blade = $container['blade'];

    // Router simple
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $method = $_SERVER['REQUEST_METHOD'];

    // Routes pour les animaux
    if (preg_match('#^/animals#', $uri)) {
        $controller = new AnimalController($entityManager, $blade);
        
        switch (true) {
            case preg_match('#^/animals$#', $uri):
                if ($method === 'GET') echo $controller->index();
                elseif ($method === 'POST') $controller->store($_POST);
                break;
                
            case preg_match('#^/animals/create$#', $uri):
                echo $controller->create();
                break;
                
            case preg_match('#^/animals/(\d+)/edit$#', $uri, $matches):
                echo $controller->edit($matches[1]);
                break;
                
            case preg_match('#^/animals/(\d+)$#', $uri, $matches):
                if ($method === 'POST') $controller->update($matches[1], $_POST);
                break;
                
            case preg_match('#^/animals/(\d+)/delete$#', $uri, $matches):
                $controller->delete($matches[1]);
                break;
        }
    }
    // Routes pour les équipements
    elseif (preg_match('#^/equipment#', $uri)) {
        $controller = new EquipmentController($entityManager, $blade);
        
        switch (true) {
            case preg_match('#^/equipment$#', $uri):
                if ($method === 'GET') echo $controller->index();
                elseif ($method === 'POST') $controller->store($_POST);
                break;
                
            case preg_match('#^/equipment/create$#', $uri):
                echo $controller->create();
                break;
                
            case preg_match('#^/equipment/(\d+)/edit$#', $uri, $matches):
                echo $controller->edit($matches[1]);
                break;
                
            case preg_match('#^/equipment/(\d+)$#', $uri, $matches):
                if ($method === 'POST') $controller->update($matches[1], $_POST);
                break;
                
            case preg_match('#^/equipment/(\d+)/delete$#', $uri, $matches):
                $controller->delete($matches[1]);
                break;
        }
    }
    else {
        // Redirection par défaut vers la liste des animaux
        header('Location: /animals');
    }
} catch (Exception $e) {
    echo "<h1>Erreur</h1>";
    echo "<pre>";
    echo "Message : " . $e->getMessage() . "\n";
    echo "Fichier : " . $e->getFile() . "\n";
    echo "Ligne : " . $e->getLine() . "\n";
    echo "</pre>";
}


// php -S localhost:8000 index.php