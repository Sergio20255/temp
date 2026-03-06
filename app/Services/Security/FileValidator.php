<?php

declare(strict_types=1);

namespace App\Services\Security;

class FileValidator
{
    private const ALLOWED_EXTENSIONS = [
        'pdf','docx','xlsx','txt','jpg','jpeg','png','webp','svg','heic','mp4','avi','mov','mkv','webm','mp3','wav','aac','flac','zip','rar','7z','epub','mobi'
    ];

    public function validate(array $file, int $maxMb = 100): array
    {
        $errors = [];

        if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            $errors[] = 'Upload failed.';
        }

        $extension = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));
        if (!in_array($extension, self::ALLOWED_EXTENSIONS, true)) {
            $errors[] = 'File type not allowed.';
        }

        $maxSize = $maxMb * 1024 * 1024;
        if (($file['size'] ?? 0) > $maxSize) {
            $errors[] = 'File exceeds size limit.';
        }

        return $errors;
    }
}
