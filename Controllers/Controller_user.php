<?php
class Controller_User extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }


    public function action_show_all_users()
    {
        $m=User::get_model();
        $data=['users'=>$m->get_all_users()];
        $this->render("users",$data);
    }


}