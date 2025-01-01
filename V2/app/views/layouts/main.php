<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?? 'Gestion des Rendez-vous'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Gestion des RDV</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'clients') !== false ? 'active' : ''; ?>" 
                           href="/clients">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'rendez-vous') !== false ? 'active' : ''; ?>" 
                           href="/rendez-vous">Rendez-vous</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php if (isset($_SESSION['notification'])): ?>
            <div class="alert alert-<?php echo $_SESSION['notification']['type']; ?> alert-dismissible fade show">
                <?php 
                    echo $_SESSION['notification']['message']; 
                    unset($_SESSION['notification']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php echo $content ?? ''; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
ob_start(); 
?>

    <?php require_once __DIR__ . '/partials/form.php'; ?>

<?php 
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/main.php';
?>

// app/views/clients/partials/form.php
<?php
$client = $client ?? [
    'nom' => '',
    'prenom' => '',
    'email' => '',
    'telephone' => ''
];
$action = isset($client['id']) ? "" : "/clients/create";
?>

<form method="POST" action="<?php echo $action; ?>" class="card-body">
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" value="<?php echo htmlspecialchars($client['nom']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Prénom</label>
        <input type="text" name="prenom" class="form-control" value="<?php echo htmlspecialchars($client['prenom']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($client['email']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Téléphone</label>
        <input type="tel" name="telephone" class="form-control" value="<?php echo htmlspecialchars($client['telephone']); ?>" required>
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            <?php echo isset($client['id']) ? 'Mettre à jour' : 'Enregistrer'; ?>
        </button>
        <a href="/clients" class="btn btn-secondary">Retour</a>
    </div>
</form>