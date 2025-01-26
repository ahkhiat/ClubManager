<?php

require_once(dirname(__FILE__) . '/../Utils/functions.php');

class Auth extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Auth();
        }
        return self::$instance;
    }
    
    public function __construct() {
        parent::__construct(); 
    }


    public function get_login()
    { 
        try {
            $email = validData($_POST['email']);
            $requete = $this->bd->prepare('SELECT * FROM user WHERE email = :email');
            $requete->execute(array(':email' => $email));
            
            if($requete->rowCount() > 0) {
                $user = $requete->fetch(PDO::FETCH_OBJ);
                $password_hash = $user->password; 
                $password = $_POST['password']; 
                if (password_verify($password, $password_hash)) {
                    return $user;
                } else {
                    echo "<script>alert('Mot de passe incorrect !');</script>";
                    return false;
                }
            } else {
                echo "<script>alert('Adresse email non enregistrée. Veuillez vous inscrire !');</script>";
                return false;
            }
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage());
        } 
        
    }


    public function get_user_registration_valid()
    {   
        $email = validData($_POST['email']);
        $password = validData(password_hash($_POST['password'], PASSWORD_DEFAULT));
        $lastname = validData($_POST['lastname']);
        $firstname = validData($_POST['firstname']);
        $birthdate = validData($_POST['birthdate']);
         
        try {
            // Vérifier si l'email existe déjà dans la base de données
            $requete_verification = $this->bd->prepare('SELECT * FROM user WHERE email = :email');
            $requete_verification->execute(array(':email' => $email));
            
            if ($requete_verification->rowCount() > 0) {
                // L'email existe déjà, afficher un message d'erreur
            echo "<script>alert('Cet email est déjà utilisé. Veuillez choisir un autre email.');</script>";
                return null; // Arrêter le processus d'inscription
            } else {
                // L'email n'existe pas, il faut s'inscription
                //'user' is the default role
                $role = 6;
                $requete_insertion = $this->bd->prepare('INSERT INTO user ( email, role, password, firstname, lastname, birthdate) 
                    VALUES( :e, :utilisateur, :p, :f, :l, :b)');
                
                $requete_insertion->execute(array(
                    ':e' => $email,
                    ':utilisateur' => $role,
                    ':p' => $password,
                    ':l' => $lastname,
                    ':f' => $firstname,
                    ':b' => $birthdate
                    ));
    
                return $requete_insertion->fetchAll(PDO::FETCH_OBJ);
    
    }
        } catch (PDOException $e) {
            // Gestion des erreurs PDO
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage());
        }  
    
    }

  
    
    

}