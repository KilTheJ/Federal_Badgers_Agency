<main>

    <?php
    // =========================
    // PAGE ACCUEIL
    // =========================
    if ($page == 'home') {
        echo "<p>
        La FBA est la seule agence spécialisée dans l'investigation et la mission tactique
        opérée par des blaireaux professionnels. Connectez-vous pour accéder à nos services.
        </p>";

        echo "<h2>Notre histoire</h2>";

        echo "<p>
        Tout commence dans un contexte où les méthodes classiques d’investigation montraient leurs limites.
        Trop prévisibles, trop humaines, parfois trop lentes. C’est alors qu’un petit groupe d’esprits atypiques
        décide de repenser entièrement l’approche tactique. Leur idée ? S’appuyer sur des agents discrets,
        agiles et insoupçonnables : les blaireaux.
        </p>";

        echo "<p>
        Au départ, l’initiative pouvait sembler absurde. Et pourtant, les premiers résultats ont rapidement
        fait taire les doutes. Grâce à leur capacité à se déplacer sans être détectés, à analyser leur environnement
        avec précision et à opérer dans des conditions extrêmes, les agents blaireaux ont démontré une efficacité hors norme.
        </p>";

        echo "<p>
        Face à ces performances, la structure s’est rapidement développée. Ce qui n’était qu’un projet expérimental
        est devenu une véritable agence, structurée, organisée et reconnue : la Federal Badgers Agency.
        </p>";

        echo "<p>
        Aujourd’hui, la FBA intervient sur des missions variées, allant de la surveillance discrète à des opérations
        tactiques complexes. Derrière chaque mission réussie se cache une philosophie simple : combiner instinct,
        intelligence et discrétion.
        </p>";

        echo "<p>
        Mais au-delà des résultats, la FBA reste fidèle à ses origines. Une organisation née d’une idée audacieuse,
        portée par la volonté de faire autrement, et convaincue que les solutions les plus inattendues sont parfois
        les plus efficaces.
        </p>";
    }

    if ($page == 'account') {

        echo "<h1>Mon espace</h1>";
        echo "<p>Bienvenue. Inscrivez vous si vous n'avez pas encore de compte, sinon connectez vous :</p>";

        echo "<div style='text-align:center; margin-top:20px;'>";

        echo "<a href='connexion.php' style='margin:10px; padding:10px 20px; background:#2c3e50; color:white; text-decoration:none; border-radius:5px;'>
                Se connecter
              </a>";

        echo "<a href='inscription.php' style='margin:10px; padding:10px 20px; background:#27ae60; color:white; text-decoration:none; border-radius:5px;'>
                S'inscrire
              </a>";

        echo "</div>";
    }

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
</main>

<aside>
    <h2>Informations</h2>
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