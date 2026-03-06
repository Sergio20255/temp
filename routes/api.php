<?php

declare(strict_types=1);

use App\Controllers\Api\ConversionApiController;

$router->get('/api/conversions/status', [ConversionApiController::class, 'status']);
