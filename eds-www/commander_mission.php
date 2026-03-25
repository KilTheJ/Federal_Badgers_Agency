<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'], $_SESSION['user_type']) || $_SESSION['user_type'] !== 'client') {
    header('Location: connexion.php');
    exit();
}

$id_client = $_SESSION['user_id'];
$mission_titre = trim($_POST['mission_titre'] ?? '');
$mission_description = trim($_POST['mission_description'] ?? '');
$mission_date = trim($_POST['mission_date'] ?? '');
$id_agent = trim($_POST['id_agent'] ?? '');

if (empty($mission_titre) || empty($mission_description) || empty($mission_date) || empty($id_agent)) {
    die("Tous les champs de la mission doivent être remplis.");
}

try {
    $sql = "INSERT INTO missions (mission_titre, mission_description, mission_date, id_client, id_agent)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$mission_titre, $mission_description, $mission_date, $id_client, $id_agent]);

    header('Location: espace_perso.php?success=1');
    exit();

} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}
?>