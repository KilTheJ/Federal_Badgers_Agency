<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'], $_SESSION['user_type'])) {
    header('Location: connexion.php');
    exit();
}

$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];

$pseudo = trim($_POST['pseudo'] ?? '');
$prix = trim($_POST['prix'] ?? '');
$age = trim($_POST['age'] ?? '');
$devise = trim($_POST['devise'] ?? '');
$specialite = trim($_POST['specialite'] ?? '');

if (empty($pseudo)) {
    die("Le pseudo est obligatoire.");
}

try {
    if ($userType === 'client') {
        $stmtVerif = $pdo->prepare("SELECT id_client FROM clients WHERE client_pseudo = ? AND id_client != ?");
        $stmtVerif->execute([$pseudo, $userId]);

        $stmtVerif2 = $pdo->prepare("SELECT id_agent FROM agents WHERE agent_pseudo = ?");
        $stmtVerif2->execute([$pseudo]);

        if ($stmtVerif->fetch() || $stmtVerif2->fetch()) {
            die("Ce pseudo est déjà utilisé.");
        }

        $sql = "UPDATE clients
                SET client_pseudo = ?
                WHERE id_client = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$pseudo, $userId]);

    } else {
        if ($prix === '' || $age === '' || $devise === '' || $specialite === '') {
            die("Tous les champs agent doivent être remplis.");
        }

        $stmtVerif = $pdo->prepare("SELECT id_agent FROM agents WHERE agent_pseudo = ? AND id_agent != ?");
        $stmtVerif->execute([$pseudo, $userId]);

        $stmtVerif2 = $pdo->prepare("SELECT id_client FROM clients WHERE client_pseudo = ?");
        $stmtVerif2->execute([$pseudo]);

        if ($stmtVerif->fetch() || $stmtVerif2->fetch()) {
            die("Ce pseudo est déjà utilisé.");
        }

        $sql = "UPDATE agents
                SET agent_pseudo = ?, agent_prix = ?, agent_age = ?, agent_devise = ?, agent_specialite = ?
                WHERE id_agent = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $pseudo,
            (float)$prix,
            (int)$age,
            $devise,
            $specialite,
            $userId
        ]);
    }

    $_SESSION['user_pseudo'] = $pseudo;

    header('Location: espace_perso.php?success=1');
    exit();

} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}
?>