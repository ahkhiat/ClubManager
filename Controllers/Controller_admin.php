<?php

class Controller_admin extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }
    public function action_dashboard_admin()
    {
        $m=Admin::get_model();
        $data=['users'=>$m->get_all_users()];
        $this->render("dashboard_admin", $data);
    }

    public function action_user_add() 
    {
        $m=Admin::get_model();
        $data=['']
    }
    

}