<?php

declare(strict_types=1);

namespace App\Middleware;

class RateLimitMiddleware
{
    public function allow(string $key, int $limit = 60): bool
    {
        $bucket = sys_get_temp_dir() . '/ff_rate_' . md5($key . date('YmdH'));
        $count = file_exists($bucket) ? (int) file_get_contents($bucket) : 0;

        if ($count >= $limit) {
            return false;
        }

        file_put_contents($bucket, (string) ($count + 1));
        return true;
    }
}
