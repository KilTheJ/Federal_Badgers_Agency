<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>

    <h1>Créer un compte</h1>

    <form action="traitement_inscription.php" method="post">

        <div>
            <label for="client_pseudo">Pseudonyme :</label><br>
            <input type="text" id="client_pseudo" name="client_pseudo" required>
        </div>

        <br>

        <div>
            <label for="client_mdp">Mot de passe :</label><br>
            <input type="password" id="client_mdp" name="client_mdp" required>
        </div>

        <br>

        <div>
            <label for="confirm_mdp">Confirmer le mot de passe :</label><br>
            <input type="password" id="confirm_mdp" name="confirm_mdp" required>
        </div>

        <br>

        <div>
            <label for="client_interet">Par quelle type de mission êtes vous intéressé ? :</label><br>
            <input type="text" id="client_interet" name="client_interet">
        </div>

        <br>

        <button type="submit">S'inscrire</button>

    </form>

</body>
</html>