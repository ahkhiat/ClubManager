<?php

class Controller_auth extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }

    public function action_form_login()
    {
        $this->render('login');
    }

    public function action_login()
    {
        $m = Auth::get_model();                      

        $data = ['user' => $m->get_login()];

        if ($data['user']) {
            $_SESSION['user'] = [
                'email'     => $data['user']->email,
                'lastname'  => $data['user']->lastname,
                'firstname' => $data['user']->firstname,
                'birthdate' => $data['user']->birthdate,
                'role'      => $data['user']->role,
                'id'        => $data['user']->user_id,
            ];
            

            if ($data['user']->role === 6) {
                $this->render("logged");
            } else {
                $this->render("login");
            }
        } else {
            $data['error'] = "Invalid login credentials.";
            $this->render("login", $data);
        }
    }


    // ......................connection.......................

    public function action_user_connection()
    {
        $this->render('user_connection');
    }



//.............................disconnection...............................

    public function action_disconnection()
    {
        $this->render('disconnection');
    }
// ...........make registration.............
    public function action_user_registration()
    {
        $this->render('register');
    }

//.........................registration valid.............................




    // version Nadia 15 04 2024
    public function action_user_registration_valid()
    {   
        if(isset($_POST['submit_registration']))
        {
            if (!empty($_POST['lastname']) && 
                !empty($_POST['firstname']) && 
                !empty($_POST['birthdate']) &&
                !empty($_POST['email']) && 
                !empty($_POST['password']))
                {
                    if(strlen($_POST['password']) < 11) {
                        $message = " ";
                        echo "<script>alert('Votre mot de passe est trop court.');</script>";
                        }

                    $data=''; // initialiser la variable data a vide
                    if(empty($message)) {
                    // Registration is OK. 
                        $email = $_POST['email'];

                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $message = 'L\'adresse e-mail n\'est pas valide.';
                            $this->action_error($message);
                           
                        }
                        
                        // Validation du mot de passe
                        $password = $_POST['password'];
                        if (!preg_match('/^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*[a-zA-Z]).{11,}$/', $password)) {
                            $message = 'Votre mot de passe doit contenir au moins une lettre majuscule, un caractère spécial et avoir une longueur d\'au moins 11 caractères.';
                            
                            $this->action_error($message);
                        }
                        
                        // Validation de la date de naissance (format YYYY-MM-DD)
                        $birthdate = $_POST['birthdate'];
                        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthdate)) {
                            $message = 'La date de naissance n\'est pas au bon format. Utilisez YYYY-MM-DD.';
                            $this->action_error($message);

                        }

                        $m = Auth::get_model();
                        $data = ['identification'=>$m->get_user_registration_valid()];

                            if($data){
                                $email = $_POST['email'];
                                $data = ['user'=>$m->get_login()];
                            }
                    
                    } else {
                    // Sinon, afficher le message d'erreur
                    echo $message;
                    }
            } else {
                echo "<script>alert('Veuillez compléter tous les champs !');</script>";
            }
        }
    
        $this->render('login', $data);
    }






}