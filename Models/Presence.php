<?php
class Presence extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Presence();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }


    public function set_presence($player, $event, $on_time)
    {

        try {
            $requete = $this->bd->prepare('INSERT INTO `presence` (player, event, on_time) 
                                           VALUES (:player, :event, :ontime)');
            $requete->execute(array(
                ':player' => $player,
                ':event' => $event,
                ':ontime' => $on_time
            ));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $this->bd->lastInsertId();
    }

}