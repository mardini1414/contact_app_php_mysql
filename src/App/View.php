<?php

namespace Mardini\ContactApp\App;

class View
{
    public static function render(string $path, array $model = []): void
    {
        require_once __DIR__ . '/../Views/' . $path . '.php';
    }
}
