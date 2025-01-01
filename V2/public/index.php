<?php
session_start();

require_once __DIR__ . '/../app/database.php';
require_once __DIR__ . '/../app/controllers/ClientController.php';
require_once __DIR__ . '/../app/controllers/RendezVousController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Configuration des routes
$routes = [
    '/' => ['controller' => 'ClientController', 'method' => 'index'],
    '/clients' => ['controller' => 'ClientController', 'method' => 'index'],
    '/clients/create' => ['controller' => 'ClientController', 'method' => 'create'],
    '/clients/edit' => ['controller' => 'ClientController', 'method' => 'edit'],
    '/clients/delete' => ['controller' => 'ClientController', 'method' => 'delete'],
    '/rendez-vous' => ['controller' => 'RendezVousController', 'method' => 'index'],
    '/rendez-vous/create' => ['controller' => 'RendezVousController', 'method' => 'create'],
    '/rendez-vous/edit' => ['controller' => 'RendezVousController', 'method' => 'edit'],
    '/rendez-vous/delete' => ['controller' => 'RendezVousController', 'method' => 'delete']
];

// Extraction de l'ID pour les routes edit et delete avec une approche plus robuste
$id = null;
foreach (['clients', 'rendez-vous'] as $module) {
    if (preg_match("/\/$module\/(edit|delete)\/(\d+)/", $uri, $matches)) {
        $id = $matches[2];
        $uri = "/$module/{$matches[1]}";
        break;
    }
}

try {
    if (isset($routes[$uri])) {
        $controllerName = $routes[$uri]['controller'];
        $method = $routes[$uri]['method'];
        $controller = new $controllerName();

        if ($id !== null && in_array($method, ['edit', 'delete'])) {
            $controller->$method($id);
        } else {
            $controller->$method();
        }
    } else {
        http_response_code(404);
        $title = 'Page non trouvée';
        $content = '<h1 class="text-center">Page non trouvée</h1>';
        require __DIR__ . '/../app/views/layouts/main.php';
    }
} catch (Exception $e) {
    http_response_code(500);
    error_log($e->getMessage());
    $title = 'Erreur serveur';
    $content = '<h1 class="text-center text-danger">Une erreur est survenue</h1>';
    require __DIR__ . '/../app/views/layouts/main.php';
}


// php -S localhost:8000 -t public