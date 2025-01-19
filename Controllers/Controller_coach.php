<?php

class Controller_coach extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }

    public function action_show_team()
    {
        $m=Coach::get_model();
        $data=['players'=>$m->get_team_all_players()];
        $this->render("team",$data);
    }

    public function action_get_presence()
    {
        $m=Coach::get_model();
        $data=['players'=>$m->get_team_all_players()];
        $this->render("get_presence",$data);
    }

    public function action_set_presence()
    {
        $mc=Coach::get_model();
        $me=Event::get_model();

        // 1- Créer un event

        $date = date('Y-m-d');
        $type = 1; // entrainement
        $team = 7; // U11F1
        $stadium = 1; // stade de la fourragère
        $season = 1; // 24/25


        $eventId = $me->create_event($date, $type, $team, $stadium, $season);
        

        // 2- Inserer des présences en ayant récuperer l'id de l'event tout juste crée

        if (isset($_POST['player_ids']) && !empty($_POST['player_ids'])) {
            $presentPlayersIds = explode(',', $_POST['player_ids']);

            foreach ($presentPlayersIds as $playerId) {
                $mc->set_player_presence($playerId, $eventId); 
            }


        } else {
            $presentPlayersIds = [];
        }
       
        $this->render("presence", ['presentPlayers' => $presentPlayersIds]);
    
    }

    public function action_create_event()
    {
        $ma = Admin::get_model();
        $data=[
            'events'=>$ma->get_all_event_types(),
            'teams'=>$ma->get_all_teams(),
            'seasons'=>$ma->get_all_seasons()
        ];
        $this->render("create_event", $data);
    }

}