<?php

class Player {

    private $id_player, $id_user, $firstname, $lastname, $email, $birthdate, $adress, $postal_code, $town, $phone;

    public function __construct($id_player, $id_user, $firstname, $lastname, 
                                $email, $birthdate, $adress = null, $postal_code = null, 
                                $town = null, $phone = null)
    {
        $this->id_player = $id_player; 
        $this->id_user = $id_user; 
        $this->firstname = $firstname; 
        $this->lastname = $lastname; 
        $this->email = $email; 
        $this->birthdate = $birthdate; 
        $this->adress = $adress; 
        $this->postal_code = $postal_code; 
        $this->town = $town;
        $this->phone = $phone;
    }
    
    public function getId_player()
    {
        return $this->id_player;
    }

    public function setId_player($id_player)
    {
        $this->id_player = $id_player;

        return $this;
    }

    public function getId_user()
    {
        return $this->id_user;
    }

    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPostal_code()
    {
        return $this->postal_code;
    }

    public function setPostal_code($postal_code)
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getTown()
    {
        return $this->town;
    }

    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
}