<?php

declare(strict_types=1);

use App\Controllers\Admin\AdminController;
use App\Controllers\Auth\AuthController;
use App\Controllers\ConversionController;
use App\Controllers\DashboardController;
use App\Controllers\HomeController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/pricing', [HomeController::class, 'pricing']);
$router->get('/contact', [HomeController::class, 'contact']);
$router->get('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'register']);
$router->get('/dashboard', [DashboardController::class, 'index']);
$router->get('/admin', [AdminController::class, 'index']);

$router->post('/convert', [ConversionController::class, 'upload']);

foreach ([
    '/pdf-to-docx', '/pdf-to-xlsx', '/docx-to-pdf', '/txt-to-docx',
    '/jpg-to-png', '/png-to-webp', '/svg-to-png', '/heic-to-jpg',
    '/mp4-to-avi', '/mp4-to-mov', '/mkv-to-mp4', '/webm-to-mp4',
    '/mp3-to-wav', '/mp3-to-aac', '/wav-to-flac', '/zip-to-rar',
    '/zip-to-7z', '/epub-to-pdf', '/mobi-to-epub'
] as $toolRoute) {
    $router->get($toolRoute, [ConversionController::class, 'tool']);
}
