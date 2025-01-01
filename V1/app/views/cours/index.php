<?php 
$title = 'Liste des cours';
ob_start(); 
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Liste des cours</h2>
    <a href="/cours/create" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Ajouter un cours
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Code</th>
                        <th>Nom du cours</th>
                        <th class="text-center">Nombre d'heures</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($cours)): ?>
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            <p class="text-muted mb-0">Aucun cours enregistré</p>
                        </td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($cours as $c): ?>
                        <tr>
                            <td class="align-middle"><?php echo htmlspecialchars($c['code']); ?></td>
                            <td class="align-middle"><?php echo htmlspecialchars($c['nom']); ?></td>
                            <td class="align-middle text-center"><?php echo htmlspecialchars($c['nombre_heures']); ?> h</td>
                            <td class="text-end">
                                <div class="btn-group" role="group">
                                    <a href="/cours/edit/<?php echo $c['id']; ?>" 
                                       class="btn btn-warning btn-sm" 
                                       title="Modifier">
                                        <i class="bi bi-pencil"></i> Modifier
                                    </a>
                                    <a href="/cours/delete/<?php echo $c['id']; ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')"
                                       title="Supprimer">
                                        <i class="bi bi-trash"></i> Supprimer
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/main.php';
?>