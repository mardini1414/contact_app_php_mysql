<?php

namespace Mardini\ContactApp\App;

use PDO;

class Db
{
    public static function getConnection(): PDO
    {
        return new PDO('mysql:host=localhost;dbname=contact_app', 'root', '');
    }
}
