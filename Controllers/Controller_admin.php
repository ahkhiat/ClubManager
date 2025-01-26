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

    private function check_admin()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 1) {
        $this->render('error_access_denied');
        exit;
    }
}
    public function action_dashboard_admin()
    {
        // $this->check_admin();
        $m=Admin::get_model();
        $data=['users'=>$m->get_all_users()];
        $this->render("dashboard_admin", $data);
    }

    public function action_show_all_users()
    {
        $m=Admin::get_model();
        $data=['users'=>$m->get_all_users()];
        $this->render("all_users", $data);
    }

    public function action_user_add() 
    {
        $this->render('user_add');
    }

    public function action_user_add_request()
    {
        $m=Admin::get_model();
        $data=[$m->set_user_add()];
        $this->render("all_users", $data);
    }
    

}