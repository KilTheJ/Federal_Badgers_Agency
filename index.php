<?php
    $poeme = isset($_GET['poeme']) ? $_GET['poeme'] : '';
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Federal Badgers Agency</title>
    <link rel="stylesheet" href="colors.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <?php include 'header.php'; ?>
        <?php include 'main.php'; ?>
        <?php include 'footer.php'; ?>
    </div>

</body>
</html>