<?php

declare(strict_types=1);

$paths = [
    __DIR__ . '/../storage/app/uploads',
    __DIR__ . '/../storage/app/converted',
    __DIR__ . '/../storage/app/tmp',
    __DIR__ . '/../storage/app/logs',
];

foreach ($paths as $path) {
    if (!is_dir($path)) {
        mkdir($path, 0775, true);
    }
}
