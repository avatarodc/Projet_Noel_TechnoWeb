<?php
session_start();

require_once __DIR__ . '/../app/controllers/EtudiantController.php';
require_once __DIR__ . '/../app/controllers/CoursController.php';

// Fonction pour définir une notification
function setNotification($type, $message) {
    $_SESSION['notification'] = [
        'type' => $type,
        'message' => $message
    ];
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Configuration des routes
$routes = [
    '/' => ['controller' => 'EtudiantController', 'action' => 'index'],
    '/etudiants' => ['controller' => 'EtudiantController', 'action' => 'index'],
    '/etudiants/create' => ['controller' => 'EtudiantController', 'action' => 'create'],
    '/etudiants/edit' => ['controller' => 'EtudiantController', 'action' => 'edit'],
    '/etudiants/delete' => ['controller' => 'EtudiantController', 'action' => 'delete'],
    '/cours' => ['controller' => 'CoursController', 'action' => 'index'],
    '/cours/create' => ['controller' => 'CoursController', 'action' => 'create'],
    '/cours/edit' => ['controller' => 'CoursController', 'action' => 'edit'],
    '/cours/delete' => ['controller' => 'CoursController', 'action' => 'delete']
];

// Extraction de l'ID
$id = null;
foreach (['etudiants', 'cours'] as $module) {
    if (preg_match("/\/$module\/(edit|delete)\/(\d+)/", $uri, $matches)) {
        $id = $matches[2];
        $uri = "/$module/{$matches[1]}";
        break;
    }
}

// Traitement de la route
if (isset($routes[$uri])) {
    $route = $routes[$uri];
    if ($id && in_array($route['action'], ['edit', 'delete'])) {
        $function = $route['action'];
        if ($route['controller'] === 'EtudiantController') {
            $function($id);
        } else {
            $function = 'cours_' . $route['action'];
            $function($id);
        }
    } else {
        $function = $route['action'];
        if ($route['controller'] === 'CoursController') {
            $function = 'cours_' . $function;
        }
        $function();
    }
} else {
    header("HTTP/1.0 404 Not Found");
    $title = 'Page non trouvée';
    $content = '<h1>Page non trouvée</h1>';
    require __DIR__ . '/../app/views/layouts/main.php';
}

//php -S localhost:8000 -t public