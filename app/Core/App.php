<?php

declare(strict_types=1);

namespace App\Core;

use Dotenv\Dotenv;

class App
{
    private Router $router;

    public function __construct(private readonly string $basePath)
    {
        $this->router = new Router();
    }

    public function bootstrap(): void
    {
        if (file_exists($this->basePath . '/.env')) {
            Dotenv::createImmutable($this->basePath)->safeLoad();
        }

        date_default_timezone_set($_ENV['APP_TIMEZONE'] ?? 'UTC');

        $router = $this->router;
        require $this->basePath . '/routes/web.php';
        require $this->basePath . '/routes/api.php';
    }

    public function router(): Router
    {
        return $this->router;
    }

    public function basePath(string $path = ''): string
    {
        return rtrim($this->basePath . '/' . ltrim($path, '/'), '/');
    }
}
