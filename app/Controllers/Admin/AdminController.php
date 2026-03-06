<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $stats = [
            'users' => 1320,
            'conversions' => 53210,
            'storage_gb' => 244,
            'revenue' => 12340,
        ];

        return $this->view('admin.index', ['stats' => $stats]);
    }
}
