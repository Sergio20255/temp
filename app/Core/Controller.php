<?php

declare(strict_types=1);

namespace App\Core;

abstract class Controller
{
    protected function view(string $name, array $data = []): Response
    {
        return View::make($name, $data);
    }

    protected function json(array $payload, int $status = 200): Response
    {
        return Response::json($payload, $status);
    }
}
