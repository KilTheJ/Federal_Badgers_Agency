<?php

$pseudo = $_POST["client_pseudo"] ?? "";

echo "<h1>Inscription réussie</h1>";

echo "<p>Bienvenue " . $pseudo . "</p>";

echo "<p>Votre inscription est finalisée,<br>
connectez-vous dans \"Mon espace\" pour commanditer vos missions.</p>";

?>