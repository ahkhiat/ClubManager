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

    public function action_get_players() {
        $m = Coach::get_model();
        $players = $m->get_team_all_players();
        echo json_encode($players);
    }
}
