<?php


class UserController extends Framework
{
    public function register(){
        include './Application/Model/User.php';

        $user = new User();
        $user->register();

        $this->render('register');
    }

    public function login(){
        include './Application/Model/User.php';

        $user = new User();
        $user->login();

        $this->render('login');
    }

    public function logout(){
        include './Application/Model/User.php';

        $user = new User();
        $user->logout();

    }

    public function profil(){
        include './Application/Model/User.php';

        $user = new User();
        $user->profil();



        $this->render("profil");
    }

    public function updateProfil(){
        include './Application/Model/User.php';

        $user= new User();
        $user->updateProfil();

        $this->render("updateProfil");
    }
}