<?php
require '../../middlewares/AuthMiddleware.php'; // Vérifie l’authentification JWT
require '../../models/Artisan.php';
require '../../models/Stand.php';

AuthMiddleware::check(); // 🔐 Empêche l’accès aux non-admins

$artisanModel = new Artisan();
$standModel = new Stand();

$artisans = $artisanModel->getAll();
$stands = $standModel->getAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion de la Foire Artisanale</title>
    <script src="/public/js/dashboard.js"></script>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <header>
        <h1>Tableau de bord Administrateur</h1>
        <a href="/logout.php">Déconnexion</a>
    </header>

    <section>
        <h2>Artisans inscrits</h2>
        <table>
            <tr><th>Nom</th><th>Email</th><th>Produit</th><th>Actions</th></tr>
            <?php foreach ($artisans as $artisan): ?>
            <tr>
                <td><?= htmlspecialchars($artisan['nom']) ?></td>
                <td><?= htmlspecialchars($artisan['email']) ?></td>
                <td><?= htmlspecialchars($artisan['produit']) ?></td>
                <td>
                    <button class="validate" data-id="<?= $artisan['id'] ?>">Valider</button>
                    <button class="reject" data-id="<?= $artisan['id'] ?>">Rejeter</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <section>
        <h2>Gestion des stands</h2>
        <table>
            <tr><th>Numéro</th><th>Disponibilité</th><th>Réserver</th></tr>
            <?php foreach ($stands as $stand): ?>
            <tr>
                <td><?= $stand['id'] ?></td>
                <td><?= $stand['disponible'] ? 'Libre' : 'Réservé' ?></td>
                <td>
                    <?php if ($stand['disponible']): ?>
                        <button class="reserve" data-id="<?= $stand['id'] ?>">Réserver</button>
                    <?php else: ?>
                        <button class="cancel" data-id="<?= $stand['id'] ?>">Annuler la réservation</button>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="/api/controllers/PDFController.php" class="pdf-btn">Télécharger la liste en PDF</a>
    </section>
</body>
</html>