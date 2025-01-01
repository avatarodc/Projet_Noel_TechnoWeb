<?php 
$title = 'Modifier un étudiant';
ob_start(); 
?>

<div class="card">
    <div class="card-header">
        <h2>Modifier un étudiant</h2>
    </div>
    <?php require_once __DIR__ . '/partials/form.php'; ?>
</div>

<?php 
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/main.php';
?>