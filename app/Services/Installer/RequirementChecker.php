<?php

declare(strict_types=1);

namespace App\Services\Installer;

class RequirementChecker
{
    public function check(): array
    {
        return [
            'php_8_1' => version_compare(PHP_VERSION, '8.1.0', '>='),
            'pdo' => extension_loaded('pdo'),
            'fileinfo' => extension_loaded('fileinfo'),
            'ffmpeg' => !empty(shell_exec('command -v ffmpeg')),
            'imagemagick' => !empty(shell_exec('command -v magick')),
            'libreoffice' => !empty(shell_exec('command -v libreoffice')),
            'pandoc' => !empty(shell_exec('command -v pandoc')),
        ];
    }
}
