<?php

namespace Mardini\ContactApp\Models;

class User
{
    private static string $username = 'mardini1414';
    private static string $password = 'zxcvb';

    public static function getUsername(): string
    {
        return self::$username;
    }

    public static function getPassword(): string
    {
        return self::$password;
    }
}
