<?php
$title = 'Liste des clients';
ob_start();
?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Liste des clients</h2>
        <a href="/clients/create" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Ajouter un client
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($clients)): ?>
            <div class="alert alert-info text-center">
                Aucun client enregistré.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $client): ?>
                            <tr>
                                <td><?= htmlspecialchars($client['id']) ?></td>
                                <td><?= htmlspecialchars($client['nom']) ?></td>
                                <td><?= htmlspecialchars($client['prenom']) ?></td>
                                <td><?= htmlspecialchars($client['email']) ?></td>
                                <td><?= htmlspecialchars($client['telephone']) ?></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="/clients/edit/<?= $client['id'] ?>" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil me-1"></i>Modifier
                                        </a>
                                        <a href="/clients/delete/<?= $client['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce client ?')">
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