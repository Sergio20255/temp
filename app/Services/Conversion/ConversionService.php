<?php

declare(strict_types=1);

namespace App\Services\Conversion;

use RuntimeException;

class ConversionService
{
    public function convert(string $inputPath, string $outputPath, string $from, string $to): void
    {
        if (!ConversionMap::isSupported($from, $to)) {
            throw new RuntimeException('Unsupported conversion pair.');
        }

        $command = $this->buildCommand($inputPath, $outputPath, $from, $to);
        exec($command . ' 2>&1', $output, $code);

        if ($code !== 0) {
            throw new RuntimeException('Conversion failed: ' . implode("\n", $output));
        }
    }

    private function buildCommand(string $input, string $output, string $from, string $to): string
    {
        $safeIn = escapeshellarg($input);
        $safeOut = escapeshellarg($output);

        if (in_array($from, ['mp4', 'avi', 'mov', 'mkv', 'webm', 'mp3', 'wav', 'aac', 'flac'], true)) {
            return "ffmpeg -y -i {$safeIn} {$safeOut}";
        }

        if (in_array($from, ['jpg', 'jpeg', 'png', 'webp', 'svg', 'heic'], true)) {
            return "magick {$safeIn} {$safeOut}";
        }

        if (in_array($from, ['docx', 'xlsx', 'pdf', 'txt'], true)) {
            $targetDir = escapeshellarg(dirname($output));
            return "libreoffice --headless --convert-to {$to} {$safeIn} --outdir {$targetDir}";
        }

        if (in_array($from, ['epub', 'mobi'], true)) {
            return "pandoc {$safeIn} -o {$safeOut}";
        }

        return "cp {$safeIn} {$safeOut}";
    }
}
