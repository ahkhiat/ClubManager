<?php
class Event extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Event();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
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