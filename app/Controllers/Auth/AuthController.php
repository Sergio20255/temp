<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Core\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return $this->view('auth.login');
    }

    public function register(Request $request)
    {
        return $this->view('auth.register');
    }
}
