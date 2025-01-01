<?php
$cours = $cours ?? [
    'code' => '',
    'nom' => '',
    'nombre_heures' => ''
];
$action = isset($cours['id']) ? "" : "/cours/create";
?>

<form method="POST" action="<?php echo $action; ?>">
    <div class="mb-3">
        <label class="form-label">Code du cours</label>
        <input type="text" name="code" class="form-control" value="<?php echo htmlspecialchars($cours['code']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nom du cours</label>
        <input type="text" name="nom" class="form-control" value="<?php echo htmlspecialchars($cours['nom']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre d'heures</label>
        <input type="number" name="heures" class="form-control" value="<?php echo htmlspecialchars($cours['nombre_heures']); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">
        <?php echo isset($cours['id']) ? 'Mettre à jour' : 'Enregistrer'; ?>
    </button>
    <a href="/cours" class="btn btn-secondary">Retour</a>
</form>