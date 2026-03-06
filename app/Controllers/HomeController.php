<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Services\Conversion\ConversionMap;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return $this->view('home.index', ['pairs' => ConversionMap::all()]);
    }

    public function pricing(Request $request)
    {
        return $this->view('pricing.index');
    }

    public function contact(Request $request)
    {
        return $this->view('contact.index');
    }
}
