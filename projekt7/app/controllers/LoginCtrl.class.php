<?php

namespace app\controllers;

require_once dirname(__FILE__).'/../../core/functions.php';


use app\transfer\User;
use app\forms\LoginForm;

class LoginCtrl {
    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function getParams() {
        $this->form->login = getFromRequest('login');
        $this->form->pass = getFromRequest('pass');
    }

    public function validate() {
        $login = $this->form->login;
        $pass = $this->form->pass;

        if ($login === "admin" && $pass === "admin") {
            $user = new User($login, 'admin');
            $_SESSION['user'] = serialize($user);
            \addRole('admin');
            return true;
        }

        if ($login === "user" && $pass === "user") {
            $user = new User($login, 'user');
            $_SESSION['user'] = serialize($user);
            \addRole('user');
            return true;
        }

        return false;
    }

    public function action_login() {
        $this->getParams();

        if ($this->validate()) {
            header("Location: ".getConf()->app_url."/index.php?action=calc");
        } else {
            header("Location: ".getConf()->app_url."/#contact");
        }
    }

    public function action_logout() {
        session_destroy();
        header("Location: ".getConf()->app_url."/");
    }
}
