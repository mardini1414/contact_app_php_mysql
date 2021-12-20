<?php

namespace Mardini\ContactApp\Middlewares;

class ContactValidation
{
    public static function check(string $name, string $phoneNumber): bool
    {
        if ($name != trim('') && $name != null && $phoneNumber != trim('') && $phoneNumber != null) {
            return true;
        } else {
            return false;
        }
    }
}
