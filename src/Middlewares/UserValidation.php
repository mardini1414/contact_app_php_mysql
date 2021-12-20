<?php

namespace Mardini\ContactApp\Middlewares;

use Mardini\ContactApp\App\View;
use Mardini\ContactApp\Models\User;

class UserValidation
{
    public static function login(string $username, string $password): void
    {
        session_start();

        if (User::getUsername() == $username && User::getPassword() == $password) {
            $_SESSION['username'] = $username;
            header('Location: /');
            exit();
        } else {
            View::render('login', ['message' => 'Oopss username or password not found!!!']);
        }
    }

    public static function getSession(): bool
    {
        session_start();
        if (isset($_SESSION['username'])) {
            return true;
        }
        return false;
    }

    public static function destroySession(): void
    {
        session_start();
        session_destroy();
    }
}
