<?php

declare(strict_types=1);

use App\Core\App;
use App\Core\Request;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new App(basePath: dirname(__DIR__));
$app->bootstrap();

$request = Request::capture();
$response = $app->router()->dispatch($request);
$response->send();
