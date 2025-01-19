<?php
// var_dump($players);
// include './Utils/sidebar.php';

?>

<!-- Variables attendues sur cette vue :
 
- quelle seance ?
- quelle équipe ?

-->

<h1 class="text-center mt-5 text-lg">Noter présence</h1>

<div id="player-buttons ms-50">
    <?php foreach ($players as $p): ?>
        <button data-player-id="<?= htmlspecialchars($p->id_player); ?>" 
            class="player-button text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 
            font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
            <?= htmlspecialchars($p->firstname) . ' ' . htmlspecialchars($p->lastname); ?>
        </button>
    <?php endforeach; ?>
</div>

<form id="presenceForm" action="?controller=coach&action=set_presence" method="post">
    <input type="hidden" name="player_ids" value="">
    <button type="submit" id="submitButton" 
        class="text-gray-900 bg-white border border-gray-300 focus:outline-none 
        hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg 
        text-sm px-5 py-2.5 me-2 mb-2">Valider</button>
</form>

<button type="button" id="resetButton" 
        class="text-gray-900 bg-white border border-gray-300 focus:outline-none 
        hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg 
        text-sm px-5 py-2.5 me-2 mb-2">Reset</button>

<script src="./Content/js/scriptTeamPresence.js"></script>