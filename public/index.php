<?php

use Mardini\ContactApp\App\Router;
use Mardini\ContactApp\Controllers\ContactController;
use Mardini\ContactApp\Controllers\HomeController;
use Mardini\ContactApp\Controllers\UserController;

require_once __DIR__ . '/../vendor/autoload.php';

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/login', UserController::class, 'index');
Router::add('POST', '/login', UserController::class, 'login');
Router::add('GET', '/logout', UserController::class, 'logout');
Router::add('GET', '/add', ContactController::class, 'showAdd');
Router::add('POST', '/add', ContactController::class, 'add');
Router::add('GET', '/edit/id/([0-9]*)', ContactController::class, 'showEdit');
Router::add('POST', '/edit/id/([0-9]*)', ContactController::class, 'edit');
Router::add('GET', '/delete/id/([0-9]*)', ContactController::class, 'delete');
Router::add('GET', '/delete_all', ContactController::class, 'deleteAll');
Router::add('POST', '/search', ContactController::class, 'search');

Router::run();
