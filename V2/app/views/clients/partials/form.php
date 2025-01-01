<?php

// Valeurs par défaut pour le formulaire
$client = $client ?? [
    'id' => null,
    'nom' => '',
    'prenom' => '',
    'email' => '',
    'telephone' => ''
];

// Déterminer l'action du formulaire
$action = $client['id'] ? "/clients/edit/{$client['id']}" : "/clients/create";

// Déterminer le titre et le texte du bouton
$title = $client['id'] ? 'Modifier un client' : 'Ajouter un nouveau client';
$buttonText = $client['id'] ? 'Mettre à jour' : 'Enregistrer';
$buttonClass = $client['id'] ? 'btn-warning' : 'btn-primary';
$buttonIcon = $client['id'] ? 'bi-pencil' : 'bi-save';
?>

<div class="card">
    <div class="card-header">
        <h2><?= htmlspecialchars($title) ?></h2>
    </div>
    <div class="card-body">
        <form method="POST" action="<?= htmlspecialchars($action) ?>">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" 
                           value="<?= htmlspecialchars($client['nom']) ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" 
                           value="<?= htmlspecialchars($client['prenom']) ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" 
                           value="<?= htmlspecialchars($client['email']) ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Téléphone</label>
                    <input type="tel" name="telephone" class="form-control" 
                           value="<?= htmlspecialchars($client['telephone']) ?>" required>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn <?= $buttonClass ?>">
                    <i class="bi <?= $buttonIcon ?> me-1"></i><?= $buttonText ?>
                </button>
                <a href="/clients" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Retour à la liste
                </a>
            </div>
        </form>
    </div>
</div>