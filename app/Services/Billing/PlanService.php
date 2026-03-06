<?php

declare(strict_types=1);

namespace App\Services\Billing;

class PlanService
{
    public function defaults(): array
    {
        return [
            'free' => ['price' => 0, 'monthly_conversions' => 25, 'max_file_mb' => 25, 'batch' => false, 'api_access' => false],
            'pro' => ['price' => 19, 'monthly_conversions' => 1000, 'max_file_mb' => 250, 'batch' => true, 'api_access' => true],
            'agency' => ['price' => 79, 'monthly_conversions' => 10000, 'max_file_mb' => 1024, 'batch' => true, 'api_access' => true],
        ];
    }
}
