<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Federal Badgers Agency</title>
    <link rel="stylesheet" href="colors.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    echo "Bonjour";
    ?>
    <div class="container">
        <nav>
            <h2>Menu</h2>
            <ul>
                <li><a href="main.html" style="color:inherit; text-decoration:none;">Accueil</a></li>
                <li><a href="myAccount.html" style="color:inherit; text-decoration:none;">Mon espace</a></li>
            </ul>
        </nav>
        <main>
            <h1>Federal Badgers Agency</h1>
            <p>La FBA est la seule agence spécialisée dans l'investigation et la mission tactique
                de blaireaux. Connectez-vous pour accéder à nos services.


                <?php echo $_GET['page'] ;?>
            </p>
            <div style="text-align:center;">
            <img src="Logo_FBA.png" alt="LOGO_FBA" style="width:100%;height:auto;">
        </main>
        <aside>
            <h3>Informations</h3>
            <p>Side content</p>
        </aside>
        <footer>
            &copy; 2026 Federal Badgers Agency
        </footer>
    </div>
    <div class="right-banner">
        <a href="https://www.trouvetabelette.com" target="_blank" title="Trouve ta belette">
            <div style="text-align:center;">
                <p style="font-size:20px; font-weight:bold;">
                Trouve ta belette près de chez toi ! </p>
            <img src="trouve_ta_belette.png" alt="Trouve ta belette" style="width:100%;height:auto;">
        </a>
    </div>
</body>
</html>