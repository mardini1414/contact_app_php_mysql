<?php

namespace Mardini\ContactApp\Models;

use Mardini\ContactApp\App\Db;
use PDO;

class Contact
{
    public static function getAllContacts(): array
    {
        $query = "SELECT * FROM contacts ORDER BY id DESC LIMIT 0, 5";
        $connect = Db::getConnection();
        $statment = $connect->query($query);
        $model = $statment->fetchAll(PDO::FETCH_ASSOC);
        $connect = null;
        return $model;
    }

    public static function addContact(string $name, string $phoneNumber, string $image): void
    {
        $query = "INSERT INTO contacts(name, phone_number, image)  VALUE(?, ?, ?)";
        $connect = Db::getConnection();
        $statment = $connect->prepare($query);
        $statment->execute([$name, $phoneNumber, $image]);
        $connect = null;
    }

    public static function editContact(string $name, string $phoneNumber, string $image, int $id): void
    {
        $query = "UPDATE contacts SET name = ?, phone_number = ?, image = ? WHERE id = ?";
        $connect = Db::getConnection();
        $statment = $connect->prepare($query);
        $statment->execute([$name, $phoneNumber, $image, $id]);
        $connect = null;
    }

    public static function deleteContact(int $id): void
    {
        $query = "DELETE FROM contacts WHERE id = ?";
        $connect = Db::getConnection();
        $statment = $connect->prepare($query);
        $statment->execute([$id]);
        $connect = null;
    }

    public static function deleteImage(int $id): string
    {
        $query = "SELECT image FROM contacts WHERE id = ?";
        $connect = Db::getConnection();
        $statment = $connect->prepare($query);
        $statment->execute([$id]);
        $image = $statment->fetchAll(PDO::FETCH_ASSOC);
        $connect = null;
        return $image[0]['image'];
    }

    public static function searchContact(string $name): array
    {
        $query = "SELECT * FROM contacts WHERE name LIKE '%$name%'";
        $connect = Db::getConnection();
        $statment = $connect->query($query);
        $model = $statment->fetchAll(PDO::FETCH_ASSOC);
        $connect = null;
        return $model;
    }

    public static function deleteAllContact(): void
    {
        $query = "DELETE FROM contacts WHERE id > 0";
        $connect = Db::getConnection();
        $connect->exec($query);
        $connect = null;
    }

    public static function numberOfContacts(): int
    {
        $query = "SELECT * FROM contacts";
        $connect = Db::getConnection();
        $statment = $connect->query($query);
        $num = count($statment->fetchAll(PDO::FETCH_ASSOC));
        $connect = null;
        return $num;
    }
}
