<?php 
$title = 'Modifier un cours';
ob_start(); 
?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Modifier un cours</h1>
    </div>
    <div class="card-body">
        <?php require_once __DIR__ . '/partials/form.php'; ?>
    </div>
</div>

<?php 
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/main.php';
?>