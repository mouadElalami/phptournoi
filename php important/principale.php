<?php
// index.php
session_start();

// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=tournoi_foot', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Page principale
if (!isset($_GET['page'])) {
    $_GET['page'] = 'accueil';
}

ob_start();
switch ($_GET['page']) {
    case 'accueil':
        include 'pages/accueil.php';
        break;
    case 'equipes':
        include 'pages/equipes.php';
        break;
    case 'matchs':
        include 'pages/matchs.php';
        break;
    case 'resultats':
        include 'pages/resultats.php';
        break;
    default:
        include 'pages/404.php';
}
$content = ob_get_clean();
include 'templates/default.php';
?>
