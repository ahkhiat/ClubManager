<?php
var_dump($presentPlayers);
?>

Liste des joueurs présent

<?php if (!empty($presentPlayers)): ?>
    <ul>
        <?php foreach ($presentPlayers as $playerId): ?>
            <li>Joueur avec l'ID: <?= htmlspecialchars($playerId); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun joueur sélectionné.</p>
<?php endif; ?>