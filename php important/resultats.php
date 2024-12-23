<?php
// pages/resultats.php

// Récupérer les résultats des matchs depuis la base de données
$resultats = $pdo->query('SELECT m.*, e1.nom AS equipe1, e2.nom AS equipe2 
                          FROM matchs m
                          JOIN equipes e1 ON m.equipe1_id = e1.id
                          JOIN equipes e2 ON m.equipe2_id = e2.id
                          WHERE m.score_equipe1 IS NOT NULL AND m.score_equipe2 IS NOT NULL')->fetchAll();
?>

<h1>Résultats des matchs</h1>

<?php if (count($resultats) > 0): ?>
    <ul>
        <?php foreach ($resultats as $resultat): ?>
            <li>
                <?= htmlspecialchars($resultat['equipe1']) ?> <?= htmlspecialchars($resultat['score_equipe1']) ?> - <?= htmlspecialchars($resultat['score_equipe2']) ?> <?= htmlspecialchars($resultat['equipe2']) ?><br>
                Date: <?= htmlspecialchars($resultat['date_match']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun résultat n'est disponible pour le moment.</p>
<?php endif; ?>
