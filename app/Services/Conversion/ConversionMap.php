<?php

declare(strict_types=1);

namespace App\Services\Conversion;

class ConversionMap
{
    public static function all(): array
    {
        return [
            'pdf' => ['docx', 'xlsx'],
            'docx' => ['pdf'],
            'txt' => ['docx'],
            'jpg' => ['png'],
            'png' => ['jpg', 'webp'],
            'svg' => ['png'],
            'heic' => ['jpg'],
            'mp4' => ['avi', 'mov'],
            'mkv' => ['mp4'],
            'webm' => ['mp4'],
            'mp3' => ['wav', 'aac'],
            'wav' => ['mp3', 'flac'],
            'zip' => ['rar', '7z'],
            'epub' => ['pdf'],
            'mobi' => ['epub'],
        ];
    }

    public static function isSupported(string $from, string $to): bool
    {
        return in_array($to, self::all()[$from] ?? [], true);
    }
}
