<?php
$title = 'Nouveau rendez-vous';
ob_start();

require __DIR__ . '/partials/form.php';

$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
?>