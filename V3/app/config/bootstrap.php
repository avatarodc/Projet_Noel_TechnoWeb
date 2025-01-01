<?php
// app/config/bootstrap.php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . "/../../vendor/autoload.php";

// Configuration Doctrine
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . "/../Models"],
    isDevMode: true,
);

// Configuration base de données
$dbParams = require_once 'database.php';

// Création de l'EntityManager
$entityManager = EntityManager::create($dbParams, $config);

// Configuration Blade
$blade = require_once 'blade.php';

return [
    'entityManager' => $entityManager,
    'blade' => $blade
];