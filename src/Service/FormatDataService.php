<?php

namespace App\Service;

class FormatDataService
{
    public static function formatPhone(string $phone): string
    {
        return trim(chunk_split($phone, 2, ' '));
    }
}
