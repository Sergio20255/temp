<?php

declare(strict_types=1);

use App\Jobs\ConversionJob;
use Predis\Client;

require_once __DIR__ . '/../vendor/autoload.php';

$redis = new Client([
    'scheme' => 'tcp',
    'host' => $_ENV['REDIS_HOST'] ?? '127.0.0.1',
    'port' => (int) ($_ENV['REDIS_PORT'] ?? 6379),
]);

$queue = $_ENV['REDIS_QUEUE'] ?? 'conversions';

echo "Worker listening on queue: {$queue}\n";

while (true) {
    $job = $redis->blpop([$queue], 10);

    if (!$job || !isset($job[1])) {
        continue;
    }

    $payload = json_decode($job[1], true, 512, JSON_THROW_ON_ERROR);
    (new ConversionJob($payload))->handle();
}
