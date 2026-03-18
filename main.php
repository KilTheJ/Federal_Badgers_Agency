<main>
    <h1>Federal Badgers Agency</h1>

    <?php
    // =========================
    // PAGE ACCUEIL
    // =========================
    if ($page == 'home') {
        echo "<p>
        La FBA est la seule agence spécialisée dans l'investigation et la mission tactique
        opérée par des blaireaux professionnels. Connectez-vous pour accéder à nos services.
        </p>";
    }

    // =========================
    // PAGE MON ESPACE
    // =========================
    if ($page == 'account') {

        echo "<h2>Mon espace</h2>";
        echo "<p>Bienvenue. Inscrivez vous si vous n'avez pas encore de compte, sinon connectez vous :</p>";

        echo "<div style='text-align:center; margin-top:20px;'>";

        echo "<a href='index.php?page=login' style='margin:10px; padding:10px 20px; background:#2c3e50; color:white; text-decoration:none; border-radius:5px;'>
                Se connecter
              </a>";

        echo "<a href='inscription.php' style='margin:10px; padding:10px 20px; background:#27ae60; color:white; text-decoration:none; border-radius:5px;'>
                S'inscrire
              </a>";

        echo "</div>";
    }

 
    // =========================
    // POÈME
    // =========================
    if ($poeme == 'belette') {
        echo "<h2>Le poème secret des belettes</h2>";

        echo "<p>";
        echo "Dans un sous-bois discret marchait une belette,<br>";
        echo "Fine comme un secret, vive comme une comète.<br>";
        echo "Au détour d'un vieux chêne apparut une autre âme,<br>";
        echo "Une belette au regard doux, élégant comme une flamme.<br>";
        echo "L'une venait du nord, l'autre d'un terrier doré,<br>";
        echo "Et pourtant, dès l'instant, leurs pas se sont accordés.<br>";
        echo "Elles ont ri du vent, des feuilles et de la lune,<br>";
        echo "Comme si le destin n'en faisait déjà plus qu'une.<br>";
        echo "Depuis ce soir tranquille au parfum de noisette,<br>";
        echo "L'histoire parle encore des amours de deux belettes.";
        echo "</p>";

        echo "<div style='text-align:center; margin-top:20px;'>";
        echo "<a href='https://www.quebec.ca/agriculture-environnement-et-ressources-naturelles/faune/animaux-sauvages-quebec/fiches-especes-fauniques/belette-longue-queue' target='_blank' style='padding:10px 20px; background-color:#333; color:white; text-decoration:none; border-radius:5px;'>";
        echo "Pour plus de jolis poèmes consulte le site...";
        echo "</a>";
        echo "</div>";
    }
    ?>

    <div style="text-align:center;">
        <img src="Logo_FBA.png" alt="LOGO_FBA" style="width:100%; height:auto;">
    </div>
</main>

<aside>
    <h3>Informations</h3>
    <p>Agence fédérale d’intervention blaireautique.</p>

    <?php
    if ($poeme == 'belette') {
        echo "<p>Mode belette activé 🦦</p>";
    } else {
        echo "<p>Aucune mission spéciale en cours.</p>";
    }
    ?>
</aside>

<div class="right-banner">
    <a href="index.php?poeme=belette" title="Trouve ta belette">
        <div style="text-align:center;">
            <p style="font-size:20px; font-weight:bold;">
                Trouve ta belette près de chez toi !
            </p>
            <img src="trouve_ta_belette.png" alt="Trouve ta belette" style="width:100%; height:auto;">
        </div>
    </a>
</div>