<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\Conversion;
use App\Services\Conversion\ConversionService;

class ConversionJob
{
    public function __construct(private readonly array $payload) {}

    public function handle(): void
    {
        $service = new ConversionService();
        $model = new Conversion();

        $service->convert(
            inputPath: $this->payload['input_path'],
            outputPath: $this->payload['output_path'],
            from: $this->payload['from_format'],
            to: $this->payload['to_format']
        );

        $model->markCompleted((int) $this->payload['conversion_id'], $this->payload['output_path']);
    }
}
