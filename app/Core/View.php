<?php

declare(strict_types=1);

namespace App\Core;

class View
{
    public static function make(string $view, array $data = []): Response
    {
        $path = dirname(__DIR__, 2) . '/resources/views/' . str_replace('.', '/', $view) . '.php';

        if (!file_exists($path)) {
            return new Response('<h1>View not found</h1>', 500);
        }

        extract($data, EXTR_SKIP);
        ob_start();
        include $path;
        $content = (string) ob_get_clean();

        return new Response($content);
    }
}
