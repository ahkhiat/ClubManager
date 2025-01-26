<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../App/Model.php');
require_once('../Models/Coach.php');


$m = Coach::get_model();

$data = json_decode(file_get_contents('php://input'), true);

$teamId = $data['teamId'] ?? null;

if ($teamId === null) {
    echo json_encode(['error' => 'teamId is required'], JSON_UNESCAPED_UNICODE);
    http_response_code(400); // Mauvaise requête
    exit;
}


try {
    $m = Coach::get_model();
    $players = $m->get_team_all_players($teamId);

    if (empty($players)) {
        echo json_encode(['error' => 'No players found for the provided teamId'], JSON_UNESCAPED_UNICODE);
        http_response_code(404); // Ressource non trouvée
        exit;
    }

    echo json_encode($players, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode(['error' => 'Internal server error', 'details' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
    http_response_code(500); // Erreur interne du serveur
}

// $data = $m->get_team_all_players($teamId);

// $jsonData = json_encode($data);

// if ($jsonData === false) {
//     http_response_code(500); // Erreur interne du serveur
//     exit;
// }

// ob_clean();
// header('Content-Type: application/json');

// echo $jsonData;
exit;