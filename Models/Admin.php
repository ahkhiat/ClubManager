<?php

class Admin extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Admin();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }

    public function get_all_users()
    {

        try {
            $requete = $this->bd->prepare('SELECT * FROM user');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_event_types()
    {

        try {
            $requete = $this->bd->prepare('SELECT * FROM event_type');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_teams()
    {
        try {
            $requete = $this->bd->prepare('SELECT * FROM team');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_seasons()
    {
        try {
            $requete = $this->bd->prepare('SELECT * FROM season');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function set_user_add()
    {

        try {
            $requete = $this->bd->prepare('INSERT INTO user (firstname, lastname, email, birthdate, phone, role) VALUES (:fn, :ln, :email, :birth, :phone, :role)');
            $requete->execute(array(
                ':fn'=> $_POST['firstname'],
                ':ln'=> $_POST['lastname'],
                ':email'=> $_POST['email'],
                ':birth'=> $_POST['birthdate'],
                ':phone'=> $_POST['phone'],
                ':role'=> 6 // role


            ));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    

}