<?php
$title = 'Liste des rendez-vous';
ob_start();
?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Liste des rendez-vous</h2>
        <a href="/rendez-vous/create" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Nouveau rendez-vous
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($rendezVous)): ?>
            <div class="alert alert-info text-center">
                Aucun rendez-vous enregistré.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Description</th>
                            <th>Client</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rendezVous as $rv): ?>
                            <tr>
                                <td><?= htmlspecialchars($rv['id']) ?></td>
                                <td><?= htmlspecialchars(date('d/m/Y', strtotime($rv['date']))) ?></td>
                                <td><?= htmlspecialchars($rv['heure']) ?></td>
                                <td><?= htmlspecialchars($rv['description']) ?></td>
                                <td><?= htmlspecialchars($rv['client_nom'] . ' ' . $rv['client_prenom']) ?></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="/rendez-vous/edit/<?= $rv['id'] ?>" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil me-1"></i>Modifier
                                        </a>
                                        <a href="/rendez-vous/delete/<?= $rv['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce rendez-vous ?')">
                                            <i class="bi bi-trash me-1"></i>Supprimer
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
?>