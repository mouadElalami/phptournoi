<?php
// pages/equipes.php

// Récupérer les équipes depuis la base de données
$equipes = $pdo->query('SELECT * FROM equipes')->fetchAll();
?>

<h1>Liste des équipes</h1>
<a href="?page=ajouter_equipe">Ajouter une équipe</a>

<?php if (count($equipes) > 0): ?>
    <ul>
        <?php foreach ($equipes as $equipe): ?>
            <li>
                <?= htmlspecialchars($equipe['nom']) ?> (Ville: <?= htmlspecialchars($equipe['ville']) ?>)
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucune équipe n'a été ajoutée pour le moment.</p>
<?php endif; ?>
