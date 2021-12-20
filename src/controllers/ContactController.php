<?php

namespace Mardini\ContactApp\Controllers;

use DateTime;
use Exception;
use Mardini\ContactApp\App\Db;
use Mardini\ContactApp\App\View;
use Mardini\ContactApp\Middlewares\ContactValidation;
use Mardini\ContactApp\Middlewares\ImageValidation;
use Mardini\ContactApp\Middlewares\UserValidation;
use Mardini\ContactApp\Models\Contact;
use PDO;

class ContactController
{
    public function showAdd(): void
    {
        if (UserValidation::getSession() == false) {
            header('Location: /login');
            exit();
        }

        View::render('add');
    }

    public function add(): void
    {
        $name = $_POST['name'];
        $phoneNumber = $_POST['phone_number'];
        $tmpFile = $_FILES['image']['tmp_name'];
        $imageType = $_FILES['image']['type'];
        $imageSize = $_FILES['image']['size'];

        if (ContactValidation::check($name, $phoneNumber) && ImageValidation::check($tmpFile, $imageSize, $imageType)) {

            $date = new DateTime();
            $image = strval($date->getTimestamp() . $_FILES['image']['name']);

            try {
                Contact::addContact($name, $phoneNumber, $image);
                move_uploaded_file($tmpFile, __DIR__ . '/../../public/img/avatar/' . $image);
                View::render('add', ['success' => true]);
            } catch (Exception $e) {
                View::render('add', ['success' => false]);
            }
        } else {
            View::render('add', ['success' => false]);
        }
    }

    public function showEdit(): void
    {
        if (UserValidation::getSession() == false) {
            header('Location: /login');
            exit();
        }

        $path = explode('/', $_SERVER['PATH_INFO']);
        $id = intval($path[count($path) - 1]);

        $query = "SELECT * FROM contacts WHERE id = $id";
        $connect = Db::getConnection();
        $statment = $connect->query($query);
        $model = [
            'data' => $statment->fetchAll(PDO::FETCH_ASSOC),
            'success' => false
        ];

        View::render('edit', $model);
    }

    public function edit(): void
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $phoneNumber = $_POST['phone_number'];
        $tmpFile = $_FILES['image']['tmp_name'];
        $imageType = $_FILES['image']['type'];
        $imageSize = $_FILES['image']['size'];

        $path = explode('/', $_SERVER['PATH_INFO']);
        $id = intval($path[count($path) - 1]);

        $query = "SELECT * FROM contacts WHERE id = $id";
        $connect = Db::getConnection();
        $statment = $connect->query($query);

        if (ContactValidation::check($name, $phoneNumber) && ImageValidation::check($tmpFile, $imageSize, $imageType)) {

            $date = new DateTime();
            $image = strval($date->getTimestamp() . $_FILES['image']['name']);


            try {
                Contact::editContact($name, $phoneNumber, $image, $id);
                $model = [
                    'data' => $statment->fetchAll(PDO::FETCH_ASSOC),
                    'success' => true
                ];
                $model['data'][0]['name'] = $name;
                $model['data'][0]['phone_number'] = $phoneNumber;
                move_uploaded_file($tmpFile, __DIR__ . '/../../public/img/avatar/' . $image);
                unlink(__DIR__ . '/../../public/img/avatar/' . $_POST['image']);
                View::render('edit', $model);
            } catch (Exception $e) {
                $model = [
                    'data' => $statment->fetchAll(PDO::FETCH_ASSOC),
                    'success' => false
                ];
            }
        } else {
            $model = [
                'data' => $statment->fetchAll(PDO::FETCH_ASSOC),
                'success' => false
            ];
            View::render('edit', $model);
        }
    }

    public function delete(): void
    {
        $path = explode('/', $_SERVER['PATH_INFO']);
        $id = intval($path[count($path) - 1]);
        unlink(__DIR__ . '/../../public/img/avatar/' . Contact::deleteImage($id));
        Contact::deleteContact($id);

        header('Location: /');
    }

    public function search(): void
    {
        $model = Contact::searchContact($_POST['search']);
        View::render('index', $model);
    }

    public function deleteAll(): void
    {
        Contact::deleteAllContact();
        $folder_path = __DIR__ . '/../../public/img/avatar';
        $files = glob($folder_path . '/*');

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        header('Location: /');
    }
}
