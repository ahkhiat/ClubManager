<?php

class Coach extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Coach();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }

    public function get_team_all_players()
    {

        try {
            $requete = $this->bd->prepare('SELECT * FROM user u 
                                            JOIN player p 
                                            ON u.id_user = p.user
                                            WHERE p.plays_in_team = 7');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function set_player_presence($playerId, $eventId)
    {

        try {
            $requete = $this->bd->prepare('INSERT INTO presence (player, event) VALUES (:pid, :eid)');
            $requete->execute(array(
                ':pid' => $playerId,
                ':eid' => $eventId
            ));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    
    

}