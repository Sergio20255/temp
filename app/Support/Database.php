<?php

declare(strict_types=1);

namespace App\Support;

use PDO;

class Database
{
    private static ?PDO $pdo = null;

    public static function connection(): PDO
    {
        if (self::$pdo instanceof PDO) {
            return self::$pdo;
        }

        $config = require dirname(__DIR__) . '/Config/database.php';
        $dsn = sprintf('%s:host=%s;port=%s;dbname=%s;charset=utf8mb4', $config['driver'], $config['host'], $config['port'], $config['database']);

        self::$pdo = new PDO($dsn, $config['username'], $config['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        return self::$pdo;
    }
}
