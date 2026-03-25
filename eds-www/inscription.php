<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - FBA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background: #222;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #444;
        }

        .erreur {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }

        .lien {
            text-align: center;
            margin-top: 20px;
        }
    </style>

    <script>
        function gererTypeCompte() {
            const type = document.getElementById('type_compte').value;
            const blocAgent = document.getElementById('bloc_agent');

            if (type === 'agent') {
                blocAgent.style.display = 'block';
            } else {
                blocAgent.style.display = 'none';
            }
        }

        window.onload = gererTypeCompte;
    </script>
</head>
<body>

<div class="container">
    <h1>Inscription FBA</h1>

    <?php
    if (isset($_SESSION['erreur_inscription'])) {
        echo '<div class="erreur">' . htmlspecialchars($_SESSION['erreur_inscription']) . '</div>';
        unset($_SESSION['erreur_inscription']);
    }
    ?>

    <form action="traitement_inscription.php" method="POST">
        <label for="type_compte">Type de compte</label>
        <select name="type_compte" id="type_compte" onchange="gererTypeCompte()" required>
            <option value="client">Client</option>
            <option value="agent">Blaireau</option>
        </select>

        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" required>

        <div id="bloc_agent" style="display:none;">
            <label for="prix">Prix</label>
            <input type="number" step="0.01" name="prix" id="prix" placeholder="Ex : 150.00">

            <label for="age">Âge</label>
            <input type="number" name="age" id="age" placeholder="Ex : 32">

            <label for="devise">Devise</label>
            <input type="text" name="devise" id="devise" placeholder="Ex : EUR">

            <label for="specialite">Spécialité</label>
            <input type="text" name="specialite" id="specialite" placeholder="Ex : infiltration">
        </div>

        <label for="mot_de_passe">Mot de passe</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required>

        <label for="confirm_mdp">Confirmer le mot de passe</label>
        <input type="password" name="confirm_mdp" id="confirm_mdp" required>

        <button type="submit">S'inscrire</button>
    </form>

    <div class="lien">
        <a href="connexion.php">Déjà inscrit ? Se connecter</a>
    </div>
</div>

</body>
</html>