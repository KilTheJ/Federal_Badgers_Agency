<?php
// =========================
// CONNEXION A LA BASE DE DONNEES
// =========================

// Nom du serveur MySQL
$host = "localhost";

// Nom de la base
$dbname = "fba_db";

// Utilisateur MySQL
$user = "root";

// Mot de passe MySQL
$pass = "";

// =========================
// CREATION DE LA CONNEXION PDO
// =========================
try {
    $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>