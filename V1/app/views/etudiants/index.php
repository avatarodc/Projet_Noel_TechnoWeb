<?php 
$title = 'Liste des étudiants';
ob_start(); 
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Liste des étudiants</h2>
    <a href="/etudiants/create" class="btn btn-success">Ajouter un étudiant</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Filière</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($etudiants as $etudiant): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($etudiant['nom']); ?></td>
                        <td><?php echo htmlspecialchars($etudiant['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($etudiant['email']); ?></td>
                        <td><?php echo htmlspecialchars($etudiant['filiere']); ?></td>
                        <td>
                            <a href="/etudiants/edit/<?php echo $etudiant['id']; ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Modifier
                            </a>
                            <a href="/etudiants/delete/<?php echo $etudiant['id']; ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">
                                <i class="bi bi-trash"></i> Supprimer
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/main.php';
?>