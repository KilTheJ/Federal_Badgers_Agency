<?php
// ==================================================
// PARAMETRES GET
// - page   : change le contenu principal
// - poeme  : affiche ou non le poème belette
// ==================================================
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$poeme = isset($_GET['poeme']) ? $_GET['poeme'] : '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Federal Badgers Agency</title> -->

    <!-- Fichier des couleurs -->
    <link rel="stylesheet" href="colors.css">

    <!-- Fichier du style général -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Couche sombre -->
    <div class="page-overlay"></div>

    <div class="container">
        <?php include 'header.php'; ?>
        <?php include 'main.php'; ?>
        <?php include 'footer.php'; ?>
    </div>

</body>
</html>