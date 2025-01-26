<?php

class Controller_api extends Controller {

    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }

    public function action_get_players()
{
    $teamId = json_decode(file_get_contents('php://input'), true)['teamId'] ?? null;
    if ($teamId === null) {
        echo json_encode(['error' => 'teamId is required']);
        http_response_code(400); // Mauvaise requête
        return;
    }
    
    $m = Coach::get_model();
    $players = $m->get_team_all_players($teamId);
    if (empty($players)) {
        echo json_encode(['error' => 'No players found for the provided teamId'], JSON_UNESCAPED_UNICODE);
        http_response_code(404); // Ressource non trouvée
        exit;
    }
    echo json_encode($players,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}


}
