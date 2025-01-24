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
        return;
    }
    
    $m = Coach::get_model();
    $players = $m->get_team_all_players($teamId);
    echo json_encode($players);
}


}
