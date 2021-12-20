<?php

namespace Mardini\ContactApp\Controllers;

use Mardini\ContactApp\App\View;
use Mardini\ContactApp\Middlewares\UserValidation;
use Mardini\ContactApp\Models\Contact;

class HomeController
{
    public function index(): void
    {
        if (UserValidation::getSession() == false) {
            header('Location: /login');
            exit();
        }

        $model = Contact::getAllContacts();
        View::render('index', $model);
    }
}
