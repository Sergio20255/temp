<?php

declare(strict_types=1);

namespace App\Controllers\Api;

use App\Core\Controller;
use App\Core\Request;

class ConversionApiController extends Controller
{
    public function status(Request $request)
    {
        return $this->json([
            'conversion_id' => $request->input('id'),
            'status' => 'processing',
            'progress' => 65,
        ]);
    }
}
