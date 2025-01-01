<?php
require_once "app/config/bootstrap.php";

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

// Les variables $entityManager devrait être disponible depuis bootstrap.php
ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);

