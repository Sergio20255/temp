<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Services\Security\FileValidator;
use App\Services\Security\MalwareScanner;
use App\Services\Conversion\ConversionMap;
use Predis\Client;
use Ramsey\Uuid\Uuid;

class ConversionController extends Controller
{
    public function tool(Request $request)
    {
        $slug = trim($request->path, '/');

        return $this->view('conversion.tool', ['slug' => $slug]);
    }

    public function upload(Request $request)
    {
        $file = $request->files['file'] ?? null;
        $from = strtolower((string) $request->input('from'));
        $to = strtolower((string) $request->input('to'));

        if (!$file || !ConversionMap::isSupported($from, $to)) {
            return $this->json(['message' => 'Invalid conversion request'], 422);
        }

        $validator = new FileValidator();
        $errors = $validator->validate($file, (int) ($_ENV['MAX_UPLOAD_MB'] ?? 100));
        if ($errors) {
            return $this->json(['message' => 'Validation failed', 'errors' => $errors], 422);
        }

        $scanner = new MalwareScanner();
        if (!$scanner->scan($file['tmp_name'])) {
            return $this->json(['message' => 'File failed malware scan'], 422);
        }

        $name = Uuid::uuid4()->toString();
        $inputPath = dirname(__DIR__, 2) . '/storage/app/uploads/' . $name . '.' . $from;
        $outputPath = dirname(__DIR__, 2) . '/storage/app/converted/' . $name . '.' . $to;
        move_uploaded_file($file['tmp_name'], $inputPath);

        $job = [
            'conversion_id' => random_int(1, 1000000),
            'input_path' => $inputPath,
            'output_path' => $outputPath,
            'from_format' => $from,
            'to_format' => $to,
        ];

        $redis = new Client([
            'scheme' => 'tcp',
            'host' => $_ENV['REDIS_HOST'] ?? '127.0.0.1',
            'port' => (int) ($_ENV['REDIS_PORT'] ?? 6379),
        ]);

        $redis->rpush($_ENV['REDIS_QUEUE'] ?? 'conversions', [json_encode($job, JSON_THROW_ON_ERROR)]);

        return $this->json([
            'message' => 'Conversion queued',
            'status' => 'processing',
            'download_url' => '/download/' . basename($outputPath),
        ]);
    }
}
