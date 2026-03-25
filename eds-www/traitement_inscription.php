<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: inscription.php');
    exit();
}

$type_compte = isset($_POST['type_compte']) ? trim($_POST['type_compte']) : '';
$pseudo = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : '';
$prix = isset($_POST['prix']) ? trim($_POST['prix']) : '';
$age = isset($_POST['age']) ? trim($_POST['age']) : '';
$devise = isset($_POST['devise']) ? trim($_POST['devise']) : '';
$specialite = isset($_POST['specialite']) ? trim($_POST['specialite']) : '';
$mot_de_passe = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : '';
$confirm_mdp = isset($_POST['confirm_mdp']) ? $_POST['confirm_mdp'] : '';

if (empty($type_compte) || empty($pseudo) || empty($mot_de_passe) || empty($confirm_mdp)) {
    $_SESSION['erreur_inscription'] = "Les champs obligatoires doivent être remplis.";
    header('Location: inscription.php');
    exit();
}

if ($type_compte != 'client' && $type_compte != 'agent') {
    $_SESSION['erreur_inscription'] = "Type de compte invalide.";
    header('Location: inscription.php');
    exit();
}

if ($mot_de_passe != $confirm_mdp) {
    $_SESSION['erreur_inscription'] = "Les mots de passe ne correspondent pas.";
    header('Location: inscription.php');
    exit();
}

if ($type_compte == 'agent') {
    if ($prix === '' || $age === '' || $devise === '' || $specialite === '') {
        $_SESSION['erreur_inscription'] = "Tous les champs du blaireau doivent être remplis.";
        header('Location: inscription.php');
        exit();
    }

    if (!is_numeric($prix) || (float)$prix < 0) {
        $_SESSION['erreur_inscription'] = "Le prix doit être un nombre valide.";
        header('Location: inscription.php');
        exit();
    }

    if (!ctype_digit($age) || (int)$age <= 0) {
        $_SESSION['erreur_inscription'] = "L'âge doit être un entier positif.";
        header('Location: inscription.php');
        exit();
    }
}

$mdp_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

try {
    // Vérifie que le pseudo n'existe ni chez les clients ni chez les agents
    $stmtClient = $pdo->prepare("SELECT client_id FROM clients WHERE client_pseudo = ?");
    $stmtClient->execute(array($pseudo));

    $stmtAgent = $pdo->prepare("SELECT agent_id FROM agents WHERE agent_pseudo = ?");
    $stmtAgent->execute(array($pseudo));

    if ($stmtClient->fetch() || $stmtAgent->fetch()) {
        $_SESSION['erreur_inscription'] = "Ce pseudo est déjà utilisé.";
        header('Location: inscription.php');
        exit();
    }

    if ($type_compte == 'client') {
        $sql = "INSERT INTO clients (client_pseudo, client_mdp)
                VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($pseudo, $mdp_hash));
    } else {
        $sql = "INSERT INTO agents (agent_pseudo, agent_prix, agent_age, agent_devise, agent_type, agent_mdp)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            $pseudo,
            (float)$prix,
            (int)$age,
            $devise,
            $specialite,
            $mdp_hash
        ));
    }

    header('Location: connexion.php');
    exit();

} catch (PDOException $e) {
    $_SESSION['erreur_inscription'] = "Erreur SQL : " . $e->getMessage();
    header('Location: inscription.php');
    exit();
}
?>