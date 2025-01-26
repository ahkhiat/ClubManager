<?php
class Goal extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Goal();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }

    public function get_all_events($team)
    {
        try {
            $requete = $this->bd->prepare('SELECT * FROM event 
                                            JOIN event_type 
                                            ON event.type = event_type.id_event_type
                                            WHERE team = :team');
            $requete->execute(array(':team'=> $team));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function create_event($date, $type, $team, $stadium, $season)
    {

        try {
            $requete = $this->bd->prepare('INSERT INTO `event` (date, type, team, stadium, season) 
                                           VALUES (:date, :type, :team, :stadium, :season)');
            $requete->execute(array(
                ':date' => $date,
                ':type' => $type,
                ':team' => $team,
                ':stadium' => $stadium,
                ':season' => $season
                
            ));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $this->bd->lastInsertId();
    }

}