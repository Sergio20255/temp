<?php

declare(strict_types=1);

$storage = __DIR__ . '/../storage/app/converted';
$retentionHours = (int) ($_ENV['FILE_RETENTION_HOURS'] ?? 24);
$cutoff = time() - ($retentionHours * 3600);

foreach (glob($storage . '/*') ?: [] as $file) {
    if (is_file($file) && filemtime($file) < $cutoff) {
        @unlink($file);
    }
}

echo "Cleanup complete\n";
