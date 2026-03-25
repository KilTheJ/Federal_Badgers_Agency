<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_type'])) {
    header('Location: connexion.php');
    exit();
}

$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];

try {
    if ($userType == 'client') {
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE client_id = ?");
        $stmt->execute(array($userId));
        $user = $stmt->fetch();

        $stmtAgents = $pdo->query("SELECT agent_id, agent_pseudo, agent_prix, agent_devise, agent_type FROM agents");
        $agents = $stmtAgents->fetchAll();
    } else {
        $stmt = $pdo->prepare("SELECT * FROM agents WHERE agent_id = ?");
        $stmt->execute(array($userId));
        $user = $stmt->fetch();
    }

    if (!$user) {
        session_unset();
        session_destroy();
        header('Location: connexion.php');
        exit();
    }

} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace personnel - FBA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 750px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }

        h1, h2 {
            text-align: center;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 12px 20px;
            background: #222;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #444;
        }

        .section {
            margin-top: 35px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .logout {
            text-decoration: none;
            color: white;
            background: #b30000;
            padding: 10px 15px;
            border-radius: 6px;
        }

        .logout:hover {
            background: #d10000;
        }

        .success {
            color: green;
            text-align: center;
            margin-top: 15px;
        }

        .info-line {
            margin: 10px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="topbar">
        <div>
            <strong>Connecté en tant que :</strong>
            <?php echo htmlspecialchars($_SESSION['user_pseudo']); ?>
            (<?php echo htmlspecialchars($userType); ?>)
        </div>
        <a class="logout" href="deconnexion.php">Déconnexion</a>
    </div>

    <h1>Mon espace personnel</h1>

    <?php if (isset($_GET['success'])) { ?>
        <div class="success">Modification enregistrée avec succès.</div>
    <?php } ?>

    <div class="section">
        <h2>Mes informations</h2>

        <?php if ($userType == 'client') { ?>
            <div class="info-line"><strong>Pseudo :</strong> <?php echo htmlspecialchars($user['client_pseudo']); ?></div>
            <div class="info-line"><strong>Date d'inscription :</strong> <?php echo htmlspecialchars($user['client_date_inscription']); ?></div>
        <?php } else { ?>
            <div class="info-line"><strong>Pseudo :</strong> <?php echo htmlspecialchars($user['agent_pseudo']); ?></div>
            <div class="info-line"><strong>Prix :</strong> <?php echo htmlspecialchars($user['agent_prix']); ?></div>
            <div class="info-line"><strong>Âge :</strong> <?php echo htmlspecialchars($user['agent_age']); ?></div>
            <div class="info-line"><strong>Devise :</strong> <?php echo htmlspecialchars($user['agent_devise']); ?></div>
            <div class="info-line"><strong>Spécialité :</strong> <?php echo htmlspecialchars($user['agent_specialite']); ?></div>
            <div class="info-line"><strong>Date d'inscription :</strong> <?php echo htmlspecialchars($user['agent_date_inscription']); ?></div>
        <?php } ?>
    </div>

    <?php if ($userType == 'client') { ?>
        <div class="section">
            <h2>Commander une mission</h2>

            <form action="commander_mission.php" method="POST">
                <label for="mission_titre">Titre de la mission</label>
                <input type="text" name="mission_titre" id="mission_titre" required>

                <label for="mission_description">Description</label>
                <textarea name="mission_description" id="mission_description" rows="5" required></textarea>

                <label for="mission_date">Date de la mission</label>
                <input type="date" name="mission_date" id="mission_date" required>

                <label for="agent_id">Choisir un blaireau</label>
                <select name="agent_id" id="agent_id" required>
                    <option value="">-- Sélectionner un blaireau --</option>
                    <?php
                    foreach ($agents as $agent) {
                        echo '<option value="' . htmlspecialchars($agent['agent_id']) . '">';
                        echo htmlspecialchars($agent['agent_pseudo'] . ' - ' . $agent['agent_type'] . ' - ' . $agent['agent_prix'] . ' ' . $agent['agent_devise']);
                        echo '</option>';
                    }
                    ?>
                </select>

                <button type="submit">Commander la mission</button>
            </form>
        </div>
    <?php } ?>
</div>

</body>
</html>