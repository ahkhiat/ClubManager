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

    public function action_get_all_events()
    {
        $teamId = json_decode(file_get_contents('php://input'), true)['teamId'] ?? null;
        if ($teamId === null) {
            echo json_encode(['error' => 'teamId is required']);
            http_response_code(400); // Mauvaise requête
            return;
        }
        
        $m = Event::get_model();
        $events = $m->get_all_events($teamId);
        if (empty($events)) {
            echo json_encode(['error' => 'No events found for the provided teamId'], JSON_UNESCAPED_UNICODE);
            http_response_code(404); // Ressource non trouvée
            exit;
        }
        echo json_encode($events,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function action_add_presence()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        $playerId = $input['player'] ?? null;
        $eventId = $input['event'] ?? null;
        $onTime = $input['on_time'] ?? null;

        if ($playerId === null || $eventId === null || $onTime === null) {
            echo json_encode(['error' => 'playerId, eventId, and onTime are required']);
            http_response_code(400); // Mauvaise requête
            return;
        }

        $m = Presence::get_model();
        $result = $m->add_presence($playerId, $eventId, $onTime);

        if ($result) {
            echo json_encode(['success' => 'Presence added successfully']);
            http_response_code(201); // Ressource créée
        } else {
            echo json_encode(['error' => 'Failed to add presence']);
            http_response_code(500); // Erreur serveur
        }
    }



}
