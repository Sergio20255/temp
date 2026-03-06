<?php

declare(strict_types=1);

namespace App\Services\Seo;

use App\Services\Conversion\ConversionMap;

class SeoPageGenerator
{
    public function pages(): array
    {
        $pages = [];

        foreach (ConversionMap::all() as $from => $targets) {
            foreach ($targets as $to) {
                $slug = sprintf('/%s-to-%s', $from, $to);
                $pages[] = [
                    'slug' => $slug,
                    'title' => strtoupper($from) . ' to ' . strtoupper($to) . ' Converter',
                    'description' => sprintf('Convert %s files to %s online with secure processing and fast downloads.', strtoupper($from), strtoupper($to)),
                ];
            }
        }

        return $pages;
    }
}
