<?php

declare(strict_types=1);

namespace App\Services\Installer;

class LicenseValidator
{
    public function validate(string $purchaseCode, string $domain): bool
    {
        if ($purchaseCode === '' || $domain === '') {
            return false;
        }

        // Optional Envato API integration hook.
        return true;
    }
}
