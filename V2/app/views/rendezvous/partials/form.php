<?php

// Valeurs par défaut pour le formulaire
$rendezVous = $rendezVous ?? [
    'id' => null,
    'date' => '',
    'heure' => '',
    'description' => '',
    'client_id' => null
];

// Déterminer l'action du formulaire
$action = $rendezVous['id'] ? "/rendez-vous/edit/{$rendezVous['id']}" : "/rendez-vous/create";

// Déterminer le titre et le texte du bouton
$title = $rendezVous['id'] ? 'Modifier le rendez-vous' : 'Planifier un nouveau rendez-vous';
$buttonText = $rendezVous['id'] ? 'Mettre à jour' : 'Enregistrer';
$buttonClass = $rendezVous['id'] ? 'btn-warning' : 'btn-primary';
$buttonIcon = $rendezVous['id'] ? 'bi-pencil' : 'bi-save';
?>

<div class="card">
    <div class="card-header">
        <h2><?= htmlspecialchars($title) ?></h2>
    </div>
    <div class="card-body">
        <form method="POST" action="<?= htmlspecialchars($action) ?>">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" required
                           value="<?= htmlspecialchars($rendezVous['date']) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Heure</label>
                    <input type="time" name="heure" class="form-control" required
                           value="<?= htmlspecialchars($rendezVous['heure']) ?>">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3" 
                          placeholder="Détails du rendez-vous"><?= 
                    htmlspecialchars($rendezVous['description']) 
                ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Client</label>
                <select name="client_id" class="form-select" required>
                    <option value="">Sélectionnez un client</option>
                    <?php foreach ($clients as $client): ?>
                        <option value="<?= $client['id'] ?>" <?= 
                            $client['id'] == $rendezVous['client_id'] ? 'selected' : '' 
                        ?>>
                            <?= htmlspecialchars($client['nom'] . ' ' . $client['prenom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn <?= $buttonClass ?>">
                    <i class="bi <?= $buttonIcon ?> me-1"></i><?= $buttonText ?>
                </button>
                <a href="/rendez-vous" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Retour à la liste
                </a>
            </div>
        </form>
    </div>
</div>