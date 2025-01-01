<?php
$etudiant = $etudiant ?? [
    'nom' => '',
    'prenom' => '',
    'email' => '',
    'filiere' => ''
];
$action = isset($etudiant['id']) ? "" : "/etudiants/create";
?>

<form method="POST" action="<?php echo $action; ?>" class="card-body">
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" value="<?php echo htmlspecialchars($etudiant['nom']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Prénom</label>
        <input type="text" name="prenom" class="form-control" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($etudiant['email']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Filière</label>
        <input type="text" name="filiere" class="form-control" value="<?php echo htmlspecialchars($etudiant['filiere']); ?>" required>
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary"><?php echo isset($etudiant['id']) ? 'Mettre à jour' : 'Enregistrer'; ?></button>
        <a href="/etudiants" class="btn btn-secondary">Retour</a>
    </div>
</form>