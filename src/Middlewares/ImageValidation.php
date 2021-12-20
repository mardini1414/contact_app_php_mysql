<?php

namespace Mardini\ContactApp\Middlewares;

class ImageValidation
{
    public static function check(string $tmp, int $size, string $type): bool
    {

        if ($tmp == null) {
            return false;
        }

        $imageSize = getimagesize($tmp);
        $imageType = ['image/webp', 'image/jpg', 'image/jpeg'];


        if ($imageSize[0] == 40 && $imageSize[1] == 40 && $size <= 50000 && in_array($type, $imageType)) {
            return true;
        } else {
            return false;
        }
    }
}
