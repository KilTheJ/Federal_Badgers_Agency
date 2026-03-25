<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: connexion.php');
    exit();
}

$pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
$mot_de_passe = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : '';

if (empty($pseudo) || empty($mot_de_passe)) {
    $_SESSION['erreur_connexion'] = "Veuillez remplir tous les champs.";
    header('Location: connexion.php');
    exit();
}

try {
    // Recherche dans clients
    $stmtClient = $pdo->prepare("SELECT * FROM clients WHERE client_pseudo = ?");
    $stmtClient->execute(array($pseudo));
    $client = $stmtClient->fetch();

    if ($client && password_verify($mot_de_passe, $client['client_mdp'])) {
        $_SESSION['user_id'] = $client['client_id'];
        $_SESSION['user_type'] = 'client';
        $_SESSION['user_pseudo'] = $client['client_pseudo'];

        header('Location: espace_perso.php');
        exit();
    }

    // Recherche dans agents
    $stmtAgent = $pdo->prepare("SELECT * FROM agents WHERE agent_pseudo = ?");
    $stmtAgent->execute(array($pseudo));
    $agent = $stmtAgent->fetch();

    if ($agent && password_verify($mot_de_passe, $agent['agent_mdp'])) {
        $_SESSION['user_id'] = $agent['agent_id'];
        $_SESSION['user_type'] = 'agent';
        $_SESSION['user_pseudo'] = $agent['agent_pseudo'];

        header('Location: espace_perso.php');
        exit();
    }

    $_SESSION['erreur_connexion'] = "Pseudo ou mot de passe incorrect.";
    header('Location: connexion.php');
    exit();

} catch (PDOException $e) {
    $_SESSION['erreur_connexion'] = "Erreur SQL : " . $e->getMessage();
    header('Location: connexion.php');
    exit();
}
?>