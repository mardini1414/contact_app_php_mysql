<?php

namespace Mardini\ContactApp\Controllers;

use Mardini\ContactApp\App\View;
use Mardini\ContactApp\Middlewares\UserValidation;

class UserController
{
    public function index(): void
    {
        if (UserValidation::getSession() == true) {
            header('Location: /');
            exit();
        }
        View::render('login');
    }

    public function login(): void
    {
        UserValidation::login($_POST['username'], $_POST['password']);
    }

    public function logout(): void
    {
        UserValidation::destroySession();
        header('Location: /login');
    }
}
