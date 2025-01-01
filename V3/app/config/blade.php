<?php
// app/config/blade.php

use Jenssegers\Blade\Blade;

$views = __DIR__ . '/../views';
$cache = __DIR__ . '/../../cache/views';

// Créer le dossier cache s'il n'existe pas
if (!file_exists($cache)) {
    mkdir($cache, 0777, true);
}

return new Blade($views, $cache);